<?php 
    include("../Config/Config.php");
    include("../Services/SectionService.php");
    include("../Models/Section.php");

 $tutorialid = isset($_GET["TutoId"]) ? intval($_GET["TutoId"]):0;


 if($tutorialid!= 0) {
    $sectionService = new SectionService($pdo);
    $sections = $sectionService->getSectionsByTutoId($tutorialid);
    echo json_encode($sections);
}else{
    echo "zero";
}

