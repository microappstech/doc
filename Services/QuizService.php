<?php 

class QuizService{
    private $pdo;
    public function __construct($pdo ){
        $this->pdo=$pdo;
    }
    public function getAllQuizzes(){
        $stmt = $this->pdo->query("SELECT * from quiz");
        $quizzes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $QuizObjects = [];

            foreach ($quizzes as $quizData) {
                $QuizObjects[] = new Quiz(
                    $quizData["id"],
                    $quizData["name"],
                    $quizData["description"],
                    $quizData["Image"],
                    $quizData["description"],
                    $quizData["Image"]
                );
            }

            return $QuizObjects;
    }
    public function getAllQuizzesForUser($userid){
        $stmt = $this->pdo->prepare("SELECT * from quiz WHERE writerid = ?");
        $stmt->execute([$userid]);
        $quizzes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $QuizObjects = [];

            foreach ($quizzes as $quizData) {
                $QuizObjects[] = new Quiz(
                    $quizData["id"],
                    $quizData["name"],
                    $quizData["description"],
                    $quizData["Image"],
                    $quizData["description"],
                    $quizData["Image"]
                );
            }

            return $QuizObjects;
    }
    public function getQuizById($id){
        $stmp = $this->pdo->prepare("SELECT * from quiz where id =?");
        $stmp->execute([$id]);
        $quiz = $stmp->fetch(PDO::FETCH_ASSOC);
        $questions = $this->GetQuestionByQuizId($id);

        $quizObjects = new Quiz(
            $quiz["id"],
            $quiz["name"],
            $quiz["description"],
            $quiz["Image"],
            $questions
        );
        return $quizObjects;
    }

    public function CraeteFullQuiz($image,$quizName, $quizDescription, $QuizData,$userid){
        $quiz = $this->CreateQuiz($image,$quizName,$quizDescription,$userid);
        foreach($QuizData["questions"] as $quest){
            $TempAnswer = 1;
            $questionId = $this->createQuestion($quest['description'],$quiz);
            foreach($quest["answers"] as $Answer){
            
            $this->createAnswer($Answer,$questionId);
            $TempAnswer = $TempAnswer+1;
            }
        }
        return true;
    }
    
    public function CreateQuiz($image,$name,$Description,$userid){
        $stmp = $this->pdo->prepare("INSERT INTO quiz (name, description,image,writerid) VALUES (?,?,?,?)");
        $stmp->execute([$name, $Description,$image,$userid]);
        return $this->pdo->lastInsertId();
    }
 
    
    public function DeleteQuiz($id){}

    // -------------- Answer service -------------
    public function createAnswer($Answer,$quest){
        $stmp = $this->pdo->prepare("INSERT INTO answer (description,questid,IsOk)VALUES (?,?,?)");
        $stmp->execute([ $Answer->content, $quest,$Answer->isOk]);
        return $stmp;
    }
    public function GetAnswersByQuId($id){
        $stmp = $this->pdo->prepare("SELECT * from answer where questid =?");
        $stmp->execute([$id]);
        $answers = $stmp->fetchAll(PDO::FETCH_ASSOC);
        $AnswerObjects = [];
        foreach ($answers as $answerData) {
            $AnswerObjects[] = new Answer(
                $answerData["id"],
                $answerData["description"],
                $answerData["questid"],
                $answerData["IsOk"]
            );
        }
        return $AnswerObjects;
    }
    // --------------- Question Service -----------
    public function createQuestion($desc,$quizid){
        $stmp = $this->pdo->prepare("INSERT INTO question (description,quizid)VALUES (?,?)");
        $stmp->execute([ $desc, $quizid]);
        return $this->pdo->lastInsertId();
    }
    public function GetQuestionByQuizId($id){
        $stmp = $this->pdo->prepare("SELECT * from question where quizid =?");
        $stmp->execute([$id]);
        $questions = $stmp->fetchAll(PDO::FETCH_ASSOC);
        
            $QuestionsObjects = [];

            foreach ($questions as $question) {
                $answers = $this->GetAnswersByQuId($question["id"]);
                $QuestionsObjects[] = new Question(
                    $question["id"],
                    $question["quizid"],                    
                    $question["description"],
                    $answers 
                );
            }

            return $QuestionsObjects;
    }

}