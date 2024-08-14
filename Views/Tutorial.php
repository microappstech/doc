<!DOCTYPE html>

<?php include("../Services/TutorialService.php") ?>
<?php include("../Services/SectionService.php") ?>
<?php include("../Config/Config.php") ?>
<?php include("../Models/Section.php") ?>
<?php include("../Models/Tutorail.php") ?>
<?php include("../Route.php") ?>
<?php

$DataReady = false;
if (isset($_GET['id'])) {
    $tutorialId = $_GET['id'];
    $TutorialService = new TutorialService($pdo);
    $Tutorial = $TutorialService->getTutorial($tutorialId);
    $SectionSer = new SectionService($pdo);
    $sections = $SectionSer->getSectionsByTutorialId($tutorialId);
    // var_dump($sections);
    $DataReady = true;
} else { ?>
    <a href="<?php echo $routes["/tutorials"] ?>" class="bg-primary px-10 py-2">Back</a>
<?php
}

?>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Assets/img/favIcon.png" type="image/x-icon">
    <title>LearnHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">
   <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
   <link rel="shortcut icon" href="../Assets/img/favIcon.png" type="image/x-icon">
    <link rel="stylesheet" href="../Assets/css/csharp/csharp.css">
    <link rel="stylesheet" href="../Assets/css/customize.css">

</head>
<body>
   
<div>
   
   <?php require("../Components/NavBar.php") ?>
    <div class="flex overflow-hidden bg-white pt-16">
       <?php require("../Components/SideBar.php") ?>
       <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>
    <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
       <div class="mainHeader h-40 bg-white  border border-1 border-gray-50">
            <img src="../Assets/img/logo2.png" class="w-50 mx-auto" style="height: 100%;" />
       </div>
           <?php if ($DataReady) { ?>
            <div class="main flex pr-3" id="FathMainContent">
                <main class="mt-8 p-6 w-full" id="mainContent">
                    
                </main>
                <div class="ads d-none hidden w-[25%] px-2 text-justify" style="border:8px #f6f6f6 solid">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem laboriosam et nemo sapiente deserunt ab iste fugiat totam magnam nisi exercitationem illum minima quas porro inventore a, sed itaque! Quam.
                </div>
                <div class="leftside width-100 h-screen ">
                    
                </div> 
            </div>
                    
            <?php } ?>

            <!-- buttons navigation start -->
            <div class="navbaar w-full px-8 mt-5 py-2 ">
                <div class="buttons flex m-2 justify-between">
                    <button class="text-base  rounded-r-none  hover:scale-110 focus:outline-none flex justify-center px-4 py-2 rounded font-bold cursor-pointer 
                            hover:bg-gray-200  
                            bg-gray-100 
                            text-gray-700 hidden
                            border duration-200 ease-in-out 
                            border-gray-300 transition" onclick="Precedent()" >
                            <div class="flex leading-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/><path fill="gray" d="M8.293 12.707a1 1 0 0 1 0-1.414l5.657-5.657a1 1 0 1 1 1.414 1.414L10.414 12l4.95 4.95a1 1 0 0 1-1.414 1.414z"/></g></svg>
                            Back
                        </div>
                    </button>
                    <button onclick="Next()" class="text-base  rounded-r-none  hover:scale-110 focus:outline-none flex justify-center px-4 py-2 rounded font-bold cursor-pointer 
                            hover:bg-gray-200 bg-gray-100  text-gray-700  border duration-200 ease-in-out border-gray-300 transition hidden">
                            <div class="flex leading-5">
                        Next
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/><path fill="gray" d="M15.707 11.293a1 1 0 0 1 0 1.414l-5.657 5.657a1 1 0 1 1-1.414-1.414l4.95-4.95l-4.95-4.95a1 1 0 0 1 1.414-1.414z"/></g></svg>
                        </div>
                    </button>
                </div>
            </div>
            <!-- button navigation end  -->
            <?php include_once("../Includes/Footer2.php") ?>
        </div>
    </div>
            
        </div>
        
        <script>
            const firstSectionId = <?php echo $sections[0]->Id ?>;
            const lastSectionId = <?php echo $sections[count($sections) -  1]->Id ?> ;

        window.addEventListener("DOMContentLoaded",()=>{
            loadContent(firstSectionId, <?php echo $tutorialId ?>, document.querySelectorAll("#sidesection ul li a")[1]);
        });
        
        function loadContent(sectionsid, tutorialid, element) {
            localStorage.setItem("sectionsid", sectionsid);
            setActiveSection(element);
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('mainContent').innerHTML = this.responseText;
                    Prism.highlightAll()
                }
            };
            xhttp.open("GET", "load_sectionContent.php?sectionid=" + sectionsid + "&&tutorialid=" + tutorialid, true);
            xhttp.send();
        }

        function setActiveSection(element) {
            let sections = document.querySelectorAll("#sidesection ul li a");
            sections.forEach(section => {
                section.classList.remove("activesection");
            });
            element.classList.add("activesection");
            let func = element.getAttribute("onclick");
            func = func.replace("this", element);
            localStorage.setItem("loadContent", func);
            localStorage.setItem("element", element);
            
        }

        function fixSideBar() {

           let sidesection =document.getElementById("sidesection");
           let sideTopPosition =sidesection.offsetTop;
           window.addEventListener("scroll",function(){
               if(window.pageYOffset>=sideTopPosition){
                   sidesection.style.position = "fixed";
                   sidesection.style.top = '0';
                   document.getElementById('FathMainContent').style.width = "80%"
               }else{
                   sidesection.style.position = "static";
                   sidesection.style.top ="auto";
                   document.getElementById('FathMainContent').style.width = "100%"
               }
           });
        }
        
        function Next(){
            let sectionsid_t = localStorage.getItem('sectionsid');
            let sectionsid = parseInt(sectionsid_t,  10);
            if(parseInt(lastSectionId) > sectionsid_t){
                sectionsid =sectionsid+1;                
            }
            localStorage.setItem("sectionsid",sectionsid)
            loadContent(sectionsid, <?php echo $tutorialId ?>, document.querySelectorAll("#sidesection ul li a")[1]);
        }
        function Precedent(){
            let sectionsid_t = localStorage.getItem('sectionsid');
            let sectionsid = parseInt(sectionsid_t,  10);
            if(parseInt(firstSectionId) < sectionsid_t){
                sectionsid =sectionsid-1;                
            }
            localStorage.setItem("sectionsid",sectionsid)
            
            loadContent(sectionsid, <?php echo $tutorialId ?>, document.querySelectorAll("#sidesection ul li a")[1]);
            
        }
    </script>
    <script src="../Assets/js/csharp/csharp.js"></script>
    <!-- <script async defer src="https://buttons.github.io/buttons.js"></script>    -->
    <script src="https://demo.Tutorial.com/windster/app.bundle.js"></script>
</body>
</html>