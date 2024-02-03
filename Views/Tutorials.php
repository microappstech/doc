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
        <div class='flex min-h-screen items-center justify-center md-px-24'>
            <div class="w-full px-16">
                <div class=" mt-20">
                    <div class="">
                    <div class="mx-auto lg:px-8">
                    <section class="bg-center bg-no-repeat bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/conference.jpg')] bg-gray-700 bg-blend-multiply">
                        <div class="px-4 mx-auto max-w-screen-xl text-center py-20 ">
                            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">We invest in the world’s learning</h1>
                            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-68">Thank you for byuing a donate for us.</p>
                        </div>
                    </section>
                        <!-- <div class="text-3xl font-bold tracking-tight text-white ">
                            <h2 class="inline sm:block lg:inline xl:block text-center">Tutorials</h2>
                        </div> -->
                    <!-- 
                        <div class="max-w-xl text-3xl font-bold tracking-tight text-white sm:text-4xl lg:col-span-7">
                            <h2 class="inline sm:block lg:inline xl:block">Want product news and updates?</h2>
                            <p class="inline sm:block lg:inline xl:block">Sign up for our newsletter.</p>
                        </div>
                        <form class="w-full max-w-md lg:col-span-5 lg:pt-2">
                        <div class="flex gap-x-4">
                            <label for="email-address" class="sr-only">Email address</label>
                            <input id="email-address" name="email" type="email" autocomplete="email" required class="min-w-0 flex-auto rounded-md border-0 bg-white/10 px-3.5 py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 placeholder:text-white/75 focus:ring-2 focus:ring-inset focus:ring-white sm:text-sm sm:leading-6" placeholder="Enter your email">
                            <button type="submit" class="flex-none rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-indigo-600 shadow-sm hover:bg-indigo-50 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Subscribe</button>
                        </div>
                        <p class="mt-4 text-sm leading-6 text-gray-300">We care about your data. Read our <a href="#" class="font-semibold text-white hover:text-indigo-50">privacy&nbsp;policy</a>.</p>
                        </form> -->
                    </div>
                    </div>
                </div>
                <div class="mt-8 grid gap-4 sm:grid-cols-2 md:grid-cols-4 " id="frameworks-integration">
                <?php 
                    $tt = new TutorialService($pdo);
                    $tutorials = $tt->getAllTutorials();
                    
                    foreach ($tutorials as $tutorial) { ?>
                        <?php if($tutorial->Active) { ?>
                            <a href="<?php echo "/Tutorial/Views/Tutorial.php?id=".$tutorial->getId(); ?>" class="grid w-full min-w-1/3 transform cursor-pointer place-items-center rounded-xl border border-blue-gray-50 bg-white px-3 py-2 transition-all hover:scale-105 hover:border-blue-gray-100 hover:bg-blue-gray-50 hover:bg-opacity-25">
                                <img src="<?php echo $tutorial->getImage() ?>"/>
                            </a>
                        <?php } else{ ?>
                        <span class="grid w-full min-w-1/3 transform cursor-default place-items-center rounded-xl border border-blue bg-white px-3 py-2 transition-all hover:scale-105 hover:border-blue-gray-100 hover:bg-blue-gray-50 hover:bg-opacity-25">
                            <div class="absolute w-full h-full z-100 bg-gray-500 bg-opacity-25 rounded-xl">
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
    <?php include_once("../Includes/Footer2.php") ?>
</body>