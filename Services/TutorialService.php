<?php
    require_once("../Config/Config.php");
    require_once("../Models/Tutorail.php");
    class TutorialService {
        private $pdo;
        public function __construct($dbo) {
            $this->pdo = $dbo;
        }

        // Crud operations 
        public function CreateTutorial(Tutorial $tutorial) {
            $stmp = $this->pdo->prepare("insert into tutorials(title,content,image,author) values(?,?,?,?)");
            $stmp->execute(array("title"=> $tutorial->getTitle(),"content"=> $tutorial->getContent(),"image"=> $tutorial->getImage(),"author"=> $tutorial->getAuthor()));
            return $this->pdo->lastInsertId();
        }
        public function getTutorial($id) {
            $stmt = $this->pdo->prepare("SELECT * FROM tutorials WHERE id = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function getAllTutorials() {
            $stmt = $this->pdo->query("SELECT * FROM tutorials");
            $tutorials = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $tutorialObjects = [];

            foreach ($tutorials as $tutorialData) {
                // Create Tutorial objects and add them to the array
                $tutorialObjects[] = new Tutorial(
                    $tutorialData['id'],
                    $tutorialData['title'],
                    $tutorialData['content'],
                    $tutorialData['image'],
                    $tutorialData['author']
                );
            }

            return $tutorialObjects;
        }
        public function updateTutorial($id, $title, $content, $author) {
            $stmt = $this->pdo->prepare("UPDATE tutorials SET title = ?, content = ?, author = ? WHERE id = ?");
            return $stmt->execute([$title, $content, $author, $id]);
        }
    
        public function deleteTutorial($id) {
            $stmt = $this->pdo->prepare("DELETE FROM tutorials WHERE id = ?");
            return $stmt->execute([$id]);
        }
    }
