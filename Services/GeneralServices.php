<?php 
class GeneralServices{
    private $pdo;
    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function getNbUsers(){
        $stmp = $this->pdo->query("SELECT COUNT(*) as NbUsers from users ");
        $NbUsers = $stmp->fetch(PDO::FETCH_ASSOC);
        return $NbUsers;
    }
    public function getNbTutorials(){
        $stmp = $this->pdo->query("SELECT COUNT(*) as NbTutorials from tutorials");
        $NbTutorials = $stmp->fetch(PDO::FETCH_ASSOC);
        return $NbTutorials;
    }

    public function getNbTutorialsByUserId($userid){
        $stmp = $this->pdo->prepare("SELECT COUNT(*) as NbTutorials from tutorials where writerid = ?");
        $stmp->execute([$userid]);
        $NbTutorials = $stmp->fetch(PDO::FETCH_ASSOC);
        return $NbTutorials;
    }

    public function getNbQuizzes(){
        $stmp = $this->pdo->query("SELECT COUNT(*) as NbQuizzes from quiz");
        $NbQuizzes = $stmp->fetch(PDO::FETCH_ASSOC);
        return $NbQuizzes;
    }

    public function getNbQuizzesByUser($userid){
        $stmp = $this->pdo->prepare("SELECT COUNT(*) as NbQuizzes from quiz where writerid = ?");
        $stmp->execute([$userid]);
        $NbQuizzes = $stmp->fetch(PDO::FETCH_ASSOC);
        return $NbQuizzes;
    }

    
    

    

}