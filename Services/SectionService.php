<?php
    require_once("../Config/Config.php");
    require_once("../Models/Tutorail.php");
    class SectionService {
        private $pdo;
        public function __construct($dbo) {
            $this->pdo = $dbo;
        }

        // Crud operations 
        public function CreateSection(Section $section) {
            $stmp = $this->pdo->prepare("INSERT INTO section (Title, Description,Content,TutorialId)VALUES (?,?,?,?)");
            $stmp->execute(array("Title"=> $section->Title,"Description"=> $section->Description, "Content"=> $section->Content,"TutorialId"=> $section->TutorialId));
            return $this->pdo->lastInsertId();
        }
        public function getSectionById($id) {
            $stmt = $this->pdo->prepare("SELECT * FROM section WHERE Id = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function getAllSections() {
            $stmt = $this->pdo->query("SELECT * FROM Sections");
            $sections = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $SectionObjects = [];

            foreach ($sections as $sectionData) {
                // Create Tutorial objects and add them to the array
                $SectionObjects[] = new Section($sectionData);
                // $tutorialObjects[] = new Tutorial(
                //     $tutorialData['id'],
                //     $tutorialData['title'],
                //     $tutorialData['content'],
                //     $tutorialData['image'],
                //     $tutorialData['author']
                // );
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
