<?php 
include("../Config/Config.php");
 include("../Services/SectionService.php");

 $tutorialid = isset($_GET["TutoId"]) ? intval($_GET["TutoId"]):0;


 if($tutorialid!= 0) {
    $sectionService = new SectionService($pdo);
    $sections = $sectionService->getSectionsByTutoId($tutorialid);
    echo "not zero";
}else{
    echo "zero";
}

