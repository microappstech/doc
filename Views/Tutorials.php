    <?php include("../Includes/NavBar.php") ?>
    <?php include("../Services/TutorialService.php") ?>
    <?php include("../Config/Config.php") ?>
    <?php include("../Models/Tutorail.php") ?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Loopple/loopple-public-assets@main/motion-tailwind/motion-tailwind.css" rel="stylesheet">
  <link rel="shortcut icon" href="/Assets/img/favIcon.png" type="image/x-icon">
</head>
<body class="bg-gray-100">
    <div class="main"> 
        <div class='flex min-h-screen items-center justify-center px-24'>
            <div class="w-full">
                <div class="mt-8 grid grid-cols-4 gap-4 md:grid-cols-4" id="frameworks-integration">
                <?php 
                    $tt = new TutorialService($pdo);
                    $tutorials = $tt->getAllTutorials();
                    
                    foreach ($tutorials as $tutorial) { ?>
                        <?php if($tutorial->Active) { ?>
                            <a href="<?php echo "/Tutorial/Views/Tutorial.php?id=".$tutorial->getId(); ?>" class="grid w-full min-w-1/3 transform cursor-pointer place-items-center rounded-xl border border-blue-gray-50 bg-white px-3 py-2 transition-all hover:scale-105 hover:border-blue-gray-100 hover:bg-blue-gray-50 hover:bg-opacity-25">
                                <img src="<?php echo $tutorial->getImage() ?>"/>
                            </a>
                        <?php } else{ ?>
                        <span class="grid w-full min-w-1/3 transform cursor-default place-items-center rounded-xl border border-blue bg-gray-500 bg-white px-3 py-2 transition-all hover:scale-105 hover:border-blue-gray-100 hover:bg-blue-gray-50 hover:bg-opacity-25">
                            <div class="absolute w-full h-full z-100 bg-gray-500 bg-opacity-25">
                                <span class=" absolute bottom-6 left-[36%]  text-gray-600 size-xl weight-bold">Comming Soon </span>
                            </div>
                            <img src="<?php echo $tutorial->getImage() ?>"/>
                        </span>
                        <?php
                            }
                        }
                        ?>
                </div>
            </div>
        </div>
    </div>
</body>