<?php 
include("../Config/Config.php");
 include("../Services/SectionService.php");
// include_once("./Models/Section.php");
$sectionContent = array(
    3 => 'This is the content for Section 1.',
    4 => 'This is the content for Section 2.',
    // Add more sections as needed
);
 $sectionid = isset($_GET["sectionid"]) ? intval($_GET["sectionid"]) :0;
 $tutorialid = isset($_GET["tutorialid"]) ? intval($_GET["tutorialid"]):0;


 if($sectionid!=0 || $tutorialid!= 0) {
    $sectionService = new SectionService($pdo);
    $section = $sectionService->getSectionByIdTutorialId($sectionid, $tutorialid);
    if($section !== null) {
        echo $section["Content"];
    }else{
        echo "Section not found";
    }
}
