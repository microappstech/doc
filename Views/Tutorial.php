<?php //include("../Includes/NavBar.php") 
?>
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
    $DataReady = true;
} else { ?>
    <a href="<?php echo $routes["/tutorials"] ?>" class="bg-primary px-10 py-2">Back</a>
<?php
}

?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Loopple/loopple-public-assets@main/riva-dashboard-tailwind/riva-dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="/Tutorial/Assets/css/customize.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>

<body class="bg-gray-100 w-full">
    <!-- navbar -->
    <div class="navbar">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img src="/Tutorial/Assets/img/logo.png" alt="" width="180" class="d-inline-block align-text-top">
                </a>
            </div>
        </nav>
    </div>
    <!-- end navbar -->

    <!-- side bar and content -->
    <div class="w-full flex">
        <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white border" id="sidesection" style="width: 20%; height:100vh">
            <a href="/" class="d-flex align-items-center flex-shrink-0 p-3 link-dark text-decoration-none border-bottom">
                <img class="h-16" src="<?php echo $Tutorial->getImage() ?>">
            </a>

            <div class="list-group list-group-flush scrollarea ">
                <?php if ($DataReady) {
                    foreach ($sections as $section) {
                        ?>
                        <a href="#" onclick="loadContent(<?php echo $section->Id ?>, <?php echo $tutorialId ?>, this)" class="list-group-item d-block py-3 sections" aria-current="true">
                            <div class="d-flex w-100 align-items-center justify-content-between">
                                <strong class="mb-1"><?php echo $section->Title ?></strong>
                            </div>
                            <div class="col-10 mb-1 small">Some placeholder content in a paragraph</div>
                        </a>
                        <?php
                        }
                    }
                ?>
            </div>
        </div>

        <section class="w-full px-6 py-8 mx-auto bg-white dark:bg-gray-900">
            <!-- header ads start -->
            <header class="ads w-full border-2 border-solid border-1 border-orange-300" style="height:100px">
                <a href="#">
                    <img class="w-auto h-full" src=" data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAyEAAAEqCAYAAAACtl8ZAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAAEnQAABJ0Ad5mH3gAACSpSURBVHhe7d09kFzlvSfgMzPSSJqRYGQQtkXdQpe1WUrUFtSu5NrCAQS2y1cOLgGQbGAc3AQcbHAhRaTghCobBxtcnGwAJAQo4QYoobYMbEFtoeBy2RUBokAGSaAZSaMZaft/5hzU0zr98Xb3vNMzep6qrukzM919vrr7/b1fZ+p6SwEAAJDJdPUTAAAgCyEEAADISggBAACyEkIAAICshBAAACArIQQAAMhKCAEAALISQgAAgKyEEAAAICshBAAAyEoIAQAAshJCAACArIQQAAAgKyEEAADISggBAACyEkIAAICshBAAACArIQQAAMhKCAEAALISQgAAgKyEEAAAICshBAAAyEoIAQAAshJCAACArIQQAAAgKyEEAADISggBAACyEkIAAICshBAAACArIQQAAMhKCAEAALISQgAAgKyEEAAAICshBAAAyEoIAQAAshJCAACArIQQAAAgKyEEAADISggBAACyEkIAAICshBAAACArIQQAAMhKCAEAALISQgAAgKyEEAAAICshBAAAyEoIAQAAshJCAACArIQQAAAgKyEEAADISggBAACyEkIAAICshBAAACArIQQAAMhKCAEAALISQgAAgKyEEAAAICshBAAAyEoIAQAAshJCAACArIQQAAAgKyEEAADISggBAACyEkIAAICshBAAACArIQQAAMhKCAEAALISQgAAgKyEEAAAICshBAAAyGrqekt1HwBgLL5+48nq3uTa/+uXi+m9P66Wmi1+8Odi9eKX1dJk2nP/Y8XOHz5ULTVb/uKDYuXcp9XSZJpZuLfYdfBItcR2pyUEAADISggBAACyEkIAAICshBAAACArIQQAAMhKCAEAALISQgAAgKyEEAAAICshBAAAyEoIAQAAshJCAACArIQQAAAgKyEEAADISggBAACyEkIAAICshBAAACArIQQAAMhKCAEAALISQgAAgKyEEACYACtnTxVXPnunuLb0VfUbgO1LCAGAjCJkLJ95r7h06vXiu3dfKs6//Vzx9RtPFhdOHi8uvvdKsbp4tvpPgO1LCAGADRShI8LFt62QEWHj3Infl+FjqRVCIoys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AQAAshJCAACArIQQAAAgKyEEAADIaup6S3UfAABgw2kJAQAAshJCAACArIQQAAAgKyEEAADISggBAACyEkIAAICshBAAACArIQQAAMhKCAEAALISQgAAgKyEEAAAICshBAAAyEoIAQAAshJCAACArIQQAAAgKyEEAADISggBAACyEkIAAICshBAAACArIQQAAMhKCAEAALISQgAAgKyEEAAAICshBAAAyEoIAQAAshJCAACArIQQAAAgKyEEAADISggBAACyEkIAAICshBAAACArIQQAAMhKCAEAALISQgAAgKyEEAAAICshBAAAyEoIAQAAshJCAACArIQQAAAgKyEEAADISggBAACyEkIAAICshBAAACArIQQAAMhKCAEAALISQgAAgKyEEAAAICshBAAAyEoIAQAAshJCAACArIQQAAAgKyEEAADISggBAACyEkIAAICshBAAACArIQQAAMhKCAEAALISQgAAgKyEEAAAICshBAAAyEoIAQAAshJCAACArIQQAAAgKyEEAADISggBAACyEkIAAICshBAAACArIQQAAMhKCAEAALISQgAAgKyEEAAAICshBAAAyEoIAQAAshJCAACArIQQAAAgKyEEAADIqCj+P8Tjc3vvto/QAAAAAElFTkSuQmCC" alt="Learn hub logo">
                </a>
            </header>
            <!-- header ads end -->

            <!-- buttons navigation start -->
            <div class="navbaar w-full px-8 py-2 ">
                <div class="buttons flex m-2 justify-between">
                    <button class="text-base  rounded-r-none  hover:scale-110 focus:outline-none flex justify-center px-4 py-2 rounded font-bold cursor-pointer 
                            hover:bg-gray-200  
                            bg-gray-100 
                            text-gray-700 
                            border duration-200 ease-in-out 
                            border-gray-600 transition">
                        <div class="flex leading-5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left w-5 h-5">
                                <polyline points="15 18 9 12 15 6"></polyline>
                            </svg>
                            Back
                        </div>
                    </button>
                    <button class="text-base  rounded-r-none  hover:scale-110 focus:outline-none flex justify-center px-4 py-2 rounded font-bold cursor-pointer 
                            hover:bg-gray-200  
                            bg-gray-100 
                            text-gray-700 
                            border duration-200 ease-in-out 
                            border-gray-600 transition">
                        <div class="flex leading-5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left w-5 h-5">
                                <polyline points="15 18 9 12 15 6"></polyline>
                            </svg>
                            Next
                        </div>
                    </button>
                </div>
            </div>
            <!-- button navigation end  -->

            <!-- The main content -->
            <?php if ($DataReady) { ?>
                <div class="main flex float-right" id="FathMainContent">
                    <main class="mt-8 p-6 w-full" id="mainContent">

                    </main>
                    <div class="leftside width-100 ">

                    </div>
                </div>

            <?php } ?>
            <!-- end the main content -->
        </section>
        
    </div>




    <script>
        function loadContent(sectionsid, tutorialid, element) {
            setActiveSection(element);
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('mainContent').innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "load_sectionContent.php?sectionid=" + sectionsid + "&&tutorialid=" + tutorialid, true);
            xhttp.send();
        }

        function setActiveSection(element) {
            let sections = document.querySelectorAll(".sections");
            sections.forEach(section => {
                section.classList.remove("activesection");
            });
            console.log(element)
            element.classList.add("activesection");
            let func = element.getAttribute("onclick");
            func = func.replace("this", element);
            localStorage.setItem("loadContent", func);
            localStorage.setItem("element", element);
        }

        function fixSideBar() {}
        
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
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
<html>