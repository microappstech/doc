<?php
    
    class TutorialService {
        private $pdo;
        public function __construct($dbo) {
            $this->pdo = $dbo;
        }

        // Crud operations 
        public function CreateTutorial($Title,$Content,$Image,$Author,$writerid) {
            $stmp = $this->pdo->prepare("insert into tutorials(title,content,image,author,writerid) values(?,?,?,?,?)");
            $stmp->execute([$Title, $Content, $Image, $Author,$writerid]);
            return $this->pdo->lastInsertId();
        }
        public function getTutorial($id) {
            $stmt = $this->pdo->prepare("SELECT * FROM tutorials WHERE id = ?");
            $stmt->execute([$id]);
            $Tuto = $stmt->fetch(PDO::FETCH_ASSOC);
            $Tutorial = new Tutorial(
                $Tuto["id"],
                $Tuto["title"],
                $Tuto["content"],
                $Tuto["image"],
                $Tuto["author"],
            );
            return $Tutorial;
        }

        public function getAllTutorials() {
            $stmt = $this->pdo->query("SELECT * FROM tutorials ORDER BY active DESC");
            $tutorials = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $tutorialObjects = [];

            foreach ($tutorials as $tutorialData) {
                // Create Tutorial objects and add them to the array
                $tutorialObjects[] = new Tutorial(
                    $tutorialData["id"],
                    $tutorialData["title"],
                    $tutorialData["content"],
                    $tutorialData["image"],
                    $tutorialData["author"],
                    $tutorialData["active"],
                );
            }

            return $tutorialObjects;
        }

        public function getTutorialsForUser($userid) {
            // if(empty()){

            // }else{
                
            // }
            $stmt = $this->pdo->prepare("SELECT * FROM tutorials WHERE writerid = ?");
            $stmt->execute([$userid]);
            $tutorials = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $tutorialObjects = [];

            foreach ($tutorials as $tutorialData) {
                $tutorialObjects[] = new Tutorial(
                    $tutorialData["id"],
                    $tutorialData["title"],
                    $tutorialData["content"],
                    $tutorialData["image"],
                    $tutorialData["author"],
                    $tutorialData["active"],
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
