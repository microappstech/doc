<?php
    class SectionService {
        private $pdo;
        public function __construct($dbo) {
            $this->pdo = $dbo;
        }

        // Crud operations 
        public function CreateSection($Title,$Description,$Content,$TutorialId) {
            $stmp = $this->pdo->prepare("INSERT INTO sections (Title, Description,Content,TutorialId)VALUES (?,?,?,?)");
            $stmp->execute([ $Title, $Description, $Content, $TutorialId]);
            return $this->pdo->lastInsertId();
        }
        public function getSectionById($id) {
            $stmt = $this->pdo->prepare("SELECT * FROM sections WHERE Id = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function getAllSections() {
            $stmt = $this->pdo->query("SELECT * FROM Sections");
            $sections = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $SectionObjects = [];
            foreach ($sections as $sectionData) {
                // Create Tutorial objects and add them to the array
                $SectionObjects[] = new Section(                    
                    $sectionData["Id"],
                    $sectionData["Title"],
                    $sectionData["Description"],
                    $sectionData["Content"],
                    $sectionData["TutorialId"],
                );
            }

            return $SectionObjects;
        }
        public function getSectionsByTutorialId($TutorialId) {
            $stmt = $this->pdo->query("SELECT * FROM sections WHERE TutorialId=$TutorialId");
            //$stmt->execute([$TutorialId]);
            $sections = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $SectionObjects = [];
            foreach ($sections as $sectionData) {
                // Create Tutorial objects and add them to the array
                $SectionObjects[] = new Section(                    
                    $sectionData["Id"],
                    $sectionData["Title"],
                    $sectionData["Description"],
                    $sectionData["Content"],
                    $sectionData["TutorialId"],
                );
            }

            return $SectionObjects;
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
