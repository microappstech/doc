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
                    $quizData["description"]
                );
            }

            return $QuizObjects;
    }
    public function getQuizById($id){

    }
    public function CreateQuiz($name,$Description){
        $stmp = $this->pdo->prepare("INSERT INTO quiz (name, description) VALUES (?,?)");
        $stmp->execute([$name, $Description]);
        return $stmp;
    }
    public function DeleteQuiz($id){}

    // -------------- Answer service -------------
    public function createAnswer($desc,$quest){
        $stmp = $this->pdo->prepare("INSERT INTO answer (description,questid)VALUES (?,?)");
        $stmp->execute([ $$desc, $quest]);
        return $stmp;
    }

    // --------------- Question Service -----------
    public function createQuestion($desc,$quizid){
        $stmp = $this->pdo->prepare("INSERT INTO question (description,quizid)VALUES (?,?)");
        $stmp->execute([ $$desc, $quizid]);
        return $stmp;
    }
}