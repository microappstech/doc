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
                    $quizData["Image"]
                );
            }

            return $QuizObjects;
    }
    public function getQuizById($id){

    }

    public function CraeteFullQuiz($image,$quizName, $quizDescription, $QuizData){
        $quiz = $this->CreateQuiz($image,$quizName,$quizDescription);
        foreach($QuizData["questions"] as $quest){
            $TempAnswer = 1;
            $questionId = $this->createQuestion($quest['description'],$quiz);
            foreach($quest["answers"] as $Answer){
                echo $Answer;
                $this->createAnswer($Answer,$questionId);
                $TempAnswer = $TempAnswer+1;
            }
        }
        return true;
    }
    
    public function CreateQuiz($image,$name,$Description){
        $stmp = $this->pdo->prepare("INSERT INTO quiz (name, description,image) VALUES (?,?,?)");
        $stmp->execute([$name, $Description,$image]);
        return $this->pdo->lastInsertId();
    }
    public function DeleteQuiz($id){}

    // -------------- Answer service -------------
    public function createAnswer($desc,$quest){
        echo "------------------ crzeate answer ------------------- <br/>";
        echo "------------------ description $desc ------------------- <br/>";
        $stmp = $this->pdo->prepare("INSERT INTO answer (description,questid)VALUES (?,?)");
        $stmp->execute([ $desc, $quest]);
        return $stmp;
    }

    // --------------- Question Service -----------
    public function createQuestion($desc,$quizid){
        $stmp = $this->pdo->prepare("INSERT INTO question (description,quizid)VALUES (?,?)");
        $stmp->execute([ $desc, $quizid]);
        return $this->pdo->lastInsertId();
    }

}