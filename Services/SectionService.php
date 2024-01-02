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
            return $stmp;
        }
        public function UpdateSection($Id,$Title,$Description,$Content,$TutorialId) {
            $stmp = $this->pdo->prepare("UPDATE sections SET Title =?, Description = ?,Content = ?,TutorialId = ? where id = ?);");
            $tt = str_replace("'"," ",$Content);
             $stmp->execute([$Title, $Description,$tt, $TutorialId, $Id]);
            
             return $this->pdo->lastInsertId();

        }
        public function getSectionById($id) {
            $stmt = $this->pdo->prepare("SELECT * FROM sections WHERE Id = ?");
            $stmt->execute([$id]);
            $sec = $stmt->fetch(PDO::FETCH_ASSOC);
            if( $sec !== null) {
                $Section = new Section(
                    $sec["Id"],
                    $sec["Title"],
                    $sec["Description"],
                    $sec["Content"],
                    $sec["TutorialId"],
                );             
            return $Section;
        } else {
            return null;
        }
        }
        public function getSectionByIdTutorialID($sectionId, $tutorialId) {
            $stmt = $this->pdo->prepare("SELECT * FROM sections WHERE id = ? AND tutorialid = ?");
            $stmt->execute([$sectionId, $tutorialId]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function getAllSections() {
            $stmt = $this->pdo->query("SELECT * FROM sections");
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
    
        public function deleteTutorial($id) {
            $stmt = $this->pdo->prepare("DELETE FROM tutorials WHERE id = ?");
            return $stmt->execute([$id]);
        }
    }
