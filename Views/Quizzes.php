<?php session_start(); ?>
<?php
    include_once("../Config/Config.php");
    include_once('../Models/Quiz.php');
    include_once("../Services/QuizService.php");
?>
<?php
    $qs = new QuizService($pdo);
    $quizzes = $qs->getAllQuizzes();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="/Assets/img/favIcon.png" type="image/x-icon">
    <title>LearnHub</title>
</head>
<body>
    <?php //include_once('../Includes/NavBar.php') ?>
    <?php require_once("../Components/NavBar.php") ?>
    <div class="main"> 
        <div class='flex min-h-screen'>
            <div class="w-full bg-gray-100">
               <?php include("../Components/HeaderBar.php") ?>
                <div class="" id="frameworks-integration">
                    <!-- -------------------------------------------- -->
                    <section class="bg-gray-50  py-24 px-4"> 
                        <div class="container mx-auto px-[12px]">
                            <h1 class="text-center text-5xl pb-12 my-20 md:my-10">Quizzes</h1>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-4 gap-y-28 lg:gap-y-16">
                                <?php
                                foreach($quizzes as $quiz ){ ?>
                                    <div class="relative group h-48 flex   flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
                                    <a href="<?php echo "/Views/Quiz2.php?qid=".$quiz->Id; ?>" class="block">
                                        <div class="h-28">
                                            <div class="absolute -top-20 lg:top-[-10%] left-[5%] z-40  group-hover:top-[-40%] group-hover:opacity-[0.9] duration-300 w-[90%] bg-gray-100  h-48 bg-light-600 rounded-xl justify-items-center align-middle">
                                                <img src="<?php echo $quiz->Image ?>"
                                                    class="w-36 h-36  mt-6 m-auto" alt="Automotive" title="Automotive" loading="lazy"
                                                    width="200" height="200">
                                            </div>
                                        </div>
                                        <div class="p-6 z-10 w-full   ">
                                            <p class="mb-2 inline-block text-tg text-center w-full  text-xl  font-sans  font-semibold leading-snug tracking-normal   antialiased">
                                            <?php echo $quiz->Name ?>
                                            </p>
                                        </div>
                                    </a>
                                </div>
                                <?php } ?>
                                
                                
                            </div>
                        </div>
                    </section>
                    <!-- --------------------------------------------- -->
                </div>
            </div>
        </div>
    </div>
    <?php include("../Includes/Footer2.php") ?>
</body>
</html>