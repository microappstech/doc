<?php session_start(); ?>
<?php 

    include_once("./Config/Config.php");
    include_once("./Models/Tutorail.php");
    include_once('./Services/TutorialService.php');

?>
<?php 
    $tt = new TutorialService($pdo);
    $tutorials = $tt->getAllTutorials();

?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./Assets/img/favIcon.png" type="image/x-icon">
    <title>LearnHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" href="./Assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Loopple/loopple-public-assets@main/motion-tailwind/motion-tailwind.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <?php require_once("./Components/NavBar.php") ?>
    <div class="main bg-white w-[94%] mx-auto">

        <div class="bg-white relative   flex items-center  n justify-center overflow-hidden z-50 ">

            <div class="relative mx-auto h-full px-4  sm:max-w-xl md:max-w-full md:px-24 lg:max-w-screen-xl">
                <div class="flex flex-col items-center justify-between lg:flex-row pt-16">
                    <div class=" relative ">
                        <div class="lg:max-w-xl lg:pr-5 relative z-40">
                            <h2 class="mb-6 max-w-lg text-5xl font-light leading-snug tracking-tight text-g1 sm:text-5xl sm:leading-snug">
                                We make Learning
                                <span class="my-1 inline-block border-b-8 border-g4 bg-white px-4 font-bold text-g4 animate__animated animate__flash">different</span>
                            </h2>
                            <p class="text-base text-gray-700">The illiterate of the 21st century will not be those who cannot read and write, but those who cannot learn, unlearn, and relearn.</p>
                            <div class="mt-10 flex flex-col items-center md:flex-row">
                                <a href="/Views/Tutorials.php" class="mb-3 inline-flex h-12 w-full items-center justify-center rounded bg-[#EC9131] px-6 font-medium tracking-wide text-white shadow-md transition hover:bg-[#884907] focus:outline-none md:mr-4 md:mb-0 md:w-auto">
                                    Start Learning</a>
                                <a href="/Views/Quizzes.php" class="group inline-flex items-center font-semibold text-g1 underline text-[#EC9131]">
                                    Test Yourself
                                </a>
                            </div>
                        </div>


                    </div>
                    <div class="relative hidden lg:ml-32 lg:block lg:w-1/2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="my-6 mx-auto h-10 w-10 animate-bounce rounded-full bg-white p-2 lg:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 17l-4 4m0 0l-4-4m4 4V3"></path>
                        </svg>
                        <div class="abg-orange-400 mx-auto w-fit overflow-hidden rounded-[6rem] rounded-br-none rounded-tl-none">
                            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" width="500" height="500" viewBox="0 0 850.53801 740.82953" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <path d="M941.609,465.12478a354.2104,354.2104,0,0,1-98.85,245.9q-5.74494,6.015-11.8,11.74-9.225,8.775-19.07,16.87a353.93418,353.93418,0,0,1-217.58,80.69q-3.97494.09-7.98.09c-63.43,0-143.21-33.87994-215.61-80.78q-8.985-5.82-17.81-11.91-4.125-2.82-8.21-5.72a730.42959,730.42959,0,0,1-79.32-64.8,514.11633,514.11633,0,0,1-45.75-48.92c-55.63-68.62006-67.9-130.45,11.41-143.16q14.085-2.25,27.34-4.81,19.20008-3.69,36.75-7.97,23.64-5.745,44.42005-12.46,6.99-2.25,13.66-4.59c65.74-23.09,109.74-53.19995,139.69-85.87q7.62-8.295,14.05-16.79a236.05512,236.05512,0,0,0,17.83-27.12,254.89845,254.89845,0,0,0,18.41-41.05l.27-.78c23.83-68.74,16.58-132.5,42.87-153.84,112.38-91.23,252.29,38.69,317.96,191.9q4.965,11.58,9.34,23.3,1.965,5.23507,3.79,10.49,4.79992,13.69491,8.71,27.46,1.5,5.25,2.86005,10.49c.97,3.77,1.9,7.53,2.76,11.29C938.139,412.30478,941.609,439.4548,941.609,465.12478Z" transform="translate(-174.73099 -79.58524)" fill="#f2f2f2" />
                                <path d="M594.309,820.3248q-3.97494.09-7.98.09c-63.43,0-143.21-33.87994-215.61-80.78q-8.985-5.82-17.81-11.91l5.16-31.4,156.21-20.74,78.4,59.95Z" transform="translate(-174.73099 -79.58524)" fill="#2f2e41" />
                                <path d="M601.82894,259.63486h-22.26a2.601,2.601,0,0,0-2.59985,2.59985v22.27a2.59264,2.59264,0,0,0,2.59985,2.59009h22.26a2.59918,2.59918,0,0,0,2.6001-2.59009v-22.27A2.60761,2.60761,0,0,0,601.82894,259.63486Z" transform="translate(-174.73099 -79.58524)" fill="#fff" />
                                <path d="M601.82894,297.58481h-22.26a2.60105,2.60105,0,0,0-2.59985,2.6v22.27a2.59253,2.59253,0,0,0,2.59985,2.59h22.26a2.59907,2.59907,0,0,0,2.6001-2.59v-22.27A2.60763,2.60763,0,0,0,601.82894,297.58481Z" transform="translate(-174.73099 -79.58524)" fill="#e6e6e6" />
                                <path d="M601.82894,335.53476h-22.26a2.60116,2.60116,0,0,0-2.59985,2.6001v22.26a2.59464,2.59464,0,0,0,2.59985,2.59985h22.26a2.60116,2.60116,0,0,0,2.6001-2.59985v-22.26A2.60774,2.60774,0,0,0,601.82894,335.53476Z" transform="translate(-174.73099 -79.58524)" fill="#e6e6e6" />
                                <path d="M604.389,375.62485a2.61714,2.61714,0,0,0-2.56006-2.14014h-22.26a2.60124,2.60124,0,0,0-2.59985,2.6001v22.26a2.59474,2.59474,0,0,0,2.59985,2.6h22.26a2.60126,2.60126,0,0,0,2.6001-2.6v-22.26A2.31271,2.31271,0,0,0,604.389,375.62485Z" transform="translate(-174.73099 -79.58524)" fill="#e6e6e6" />
                                <path d="M602.839,411.63486a2.634,2.634,0,0,0-1.01-.20008h-22.26a2.59475,2.59475,0,0,0-2.59985,2.6v22.26a2.58836,2.58836,0,0,0,2.59985,2.6001h22.26a2.60137,2.60137,0,0,0,2.6001-2.6001v-22.26A2.61575,2.61575,0,0,0,602.839,411.63486Z" transform="translate(-174.73099 -79.58524)" fill="#e6e6e6" />
                                <path d="M648.589,259.63486h-22.26a2.601,2.601,0,0,0-2.59985,2.59985v22.27a2.59264,2.59264,0,0,0,2.59985,2.59009h22.26a2.59918,2.59918,0,0,0,2.6001-2.59009v-22.27A2.60761,2.60761,0,0,0,648.589,259.63486Z" transform="translate(-174.73099 -79.58524)" fill="#e6e6e6" />
                                <path d="M648.589,297.58481h-22.26a2.60105,2.60105,0,0,0-2.59985,2.6v22.27a2.59253,2.59253,0,0,0,2.59985,2.59h22.26a2.59907,2.59907,0,0,0,2.6001-2.59v-22.27A2.60763,2.60763,0,0,0,648.589,297.58481Z" transform="translate(-174.73099 -79.58524)" fill="#f9a826" />
                                <path d="M648.589,335.53476h-22.26a2.60116,2.60116,0,0,0-2.59985,2.6001v22.26a2.59464,2.59464,0,0,0,2.59985,2.59985h22.26a2.60116,2.60116,0,0,0,2.6001-2.59985v-22.26A2.60774,2.60774,0,0,0,648.589,335.53476Z" transform="translate(-174.73099 -79.58524)" fill="#f9a826" />
                                <path d="M648.589,373.48471h-22.26a2.59261,2.59261,0,0,0-2.46,1.78,2.47846,2.47846,0,0,0-.13989.82007v22.26a2.59474,2.59474,0,0,0,2.59985,2.6h22.26a2.60126,2.60126,0,0,0,2.6001-2.6v-22.26A2.60782,2.60782,0,0,0,648.589,373.48471Z" transform="translate(-174.73099 -79.58524)" fill="#f9a826" />
                                <path d="M648.589,411.43478h-22.26a2.59475,2.59475,0,0,0-2.59985,2.6v22.26a2.59485,2.59485,0,0,0,2.59985,2.6001h22.26a2.60137,2.60137,0,0,0,2.6001-2.6001v-22.26A2.60127,2.60127,0,0,0,648.589,411.43478Z" transform="translate(-174.73099 -79.58524)" fill="#e6e6e6" />
                                <path d="M695.349,259.63486h-22.26a2.601,2.601,0,0,0-2.59985,2.59985v22.27a2.59264,2.59264,0,0,0,2.59985,2.59009h22.26a2.59918,2.59918,0,0,0,2.6001-2.59009v-22.27A2.60761,2.60761,0,0,0,695.349,259.63486Z" transform="translate(-174.73099 -79.58524)" fill="#f9a826" />
                                <path d="M695.349,297.58481h-22.26a2.60105,2.60105,0,0,0-2.59985,2.6v22.27a2.59253,2.59253,0,0,0,2.59985,2.59h22.26a2.59907,2.59907,0,0,0,2.6001-2.59v-22.27A2.60763,2.60763,0,0,0,695.349,297.58481Z" transform="translate(-174.73099 -79.58524)" fill="#f9a826" />
                                <path d="M695.349,335.53476h-22.26a2.60116,2.60116,0,0,0-2.59985,2.6001v22.26a2.59464,2.59464,0,0,0,2.59985,2.59985h22.26a2.60116,2.60116,0,0,0,2.6001-2.59985v-22.26A2.60774,2.60774,0,0,0,695.349,335.53476Z" transform="translate(-174.73099 -79.58524)" fill="#e6e6e6" />
                                <path d="M695.349,373.48471h-22.26a2.60124,2.60124,0,0,0-2.59985,2.6001v22.26a2.59474,2.59474,0,0,0,2.59985,2.6h22.26a2.60126,2.60126,0,0,0,2.6001-2.6v-22.26A2.60782,2.60782,0,0,0,695.349,373.48471Z" transform="translate(-174.73099 -79.58524)" fill="#f9a826" />
                                <path d="M695.349,411.43478h-22.26a2.59475,2.59475,0,0,0-2.59985,2.6v22.26a2.59485,2.59485,0,0,0,2.59985,2.6001h22.26a2.60137,2.60137,0,0,0,2.6001-2.6001v-22.26A2.60127,2.60127,0,0,0,695.349,411.43478Z" transform="translate(-174.73099 -79.58524)" fill="#f9a826" />
                                <path d="M742.109,259.63486h-22.26a2.60113,2.60113,0,0,0-2.6,2.59985v22.27a2.59275,2.59275,0,0,0,2.6,2.59009h22.26a2.59918,2.59918,0,0,0,2.6001-2.59009v-22.27A2.60761,2.60761,0,0,0,742.109,259.63486Z" transform="translate(-174.73099 -79.58524)" fill="#f9a826" />
                                <path d="M742.109,297.58481h-22.26a2.60116,2.60116,0,0,0-2.6,2.6v22.27a2.59264,2.59264,0,0,0,2.6,2.59h22.26a2.59907,2.59907,0,0,0,2.6001-2.59v-22.27A2.60763,2.60763,0,0,0,742.109,297.58481Z" transform="translate(-174.73099 -79.58524)" fill="#fff" />
                                <path d="M742.109,335.53476h-22.26a2.60126,2.60126,0,0,0-2.6,2.6001v22.26a2.59474,2.59474,0,0,0,2.6,2.59985h22.26a2.60116,2.60116,0,0,0,2.6001-2.59985v-22.26A2.60774,2.60774,0,0,0,742.109,335.53476Z" transform="translate(-174.73099 -79.58524)" fill="#fff" />
                                <path d="M742.109,373.48471h-22.26a2.60134,2.60134,0,0,0-2.6,2.6001v22.26a2.59485,2.59485,0,0,0,2.6,2.6h22.26a2.60126,2.60126,0,0,0,2.6001-2.6v-22.26A2.60782,2.60782,0,0,0,742.109,373.48471Z" transform="translate(-174.73099 -79.58524)" fill="#e6e6e6" />
                                <path d="M742.109,411.43478h-22.26a2.59485,2.59485,0,0,0-2.6,2.6v22.26a2.595,2.595,0,0,0,2.6,2.6001h22.26a2.60137,2.60137,0,0,0,2.6001-2.6001v-22.26A2.60127,2.60127,0,0,0,742.109,411.43478Z" transform="translate(-174.73099 -79.58524)" fill="#f9a826" />
                                <path d="M788.869,259.63486h-22.27a2.599,2.599,0,0,0-2.59,2.59985v22.27a2.59059,2.59059,0,0,0,2.59,2.59009h22.27a2.59918,2.59918,0,0,0,2.6001-2.59009v-22.27A2.60761,2.60761,0,0,0,788.869,259.63486Z" transform="translate(-174.73099 -79.58524)" fill="#fff" />
                                <path d="M788.869,297.58481h-22.27a2.599,2.599,0,0,0-2.59,2.6v22.27a2.59048,2.59048,0,0,0,2.59,2.59h22.27a2.59907,2.59907,0,0,0,2.6001-2.59v-22.27A2.60763,2.60763,0,0,0,788.869,297.58481Z" transform="translate(-174.73099 -79.58524)" fill="#fff" />
                                <path d="M788.869,335.53476h-22.27a2.59915,2.59915,0,0,0-2.59,2.6001v22.26a2.59261,2.59261,0,0,0,2.59,2.59985h22.27a2.60116,2.60116,0,0,0,2.6001-2.59985v-22.26A2.60774,2.60774,0,0,0,788.869,335.53476Z" transform="translate(-174.73099 -79.58524)" fill="#fff" />
                                <path d="M788.869,373.48471h-22.27a2.59923,2.59923,0,0,0-2.59,2.6001v22.26a2.59271,2.59271,0,0,0,2.59,2.6h22.27a2.60126,2.60126,0,0,0,2.6001-2.6v-22.26A2.60782,2.60782,0,0,0,788.869,373.48471Z" transform="translate(-174.73099 -79.58524)" fill="#f9a826" />
                                <path d="M788.869,411.43478h-22.27a2.59272,2.59272,0,0,0-2.59,2.6v22.26a2.59282,2.59282,0,0,0,2.59,2.6001h22.27a2.60137,2.60137,0,0,0,2.6001-2.6001v-22.26A2.60127,2.60127,0,0,0,788.869,411.43478Z" transform="translate(-174.73099 -79.58524)" fill="#e6e6e6" />
                                <path d="M835.629,259.63486h-22.27a2.599,2.599,0,0,0-2.59,2.59985v22.27a2.59059,2.59059,0,0,0,2.59,2.59009h22.27a2.59927,2.59927,0,0,0,2.6001-2.59009v-22.27A2.60769,2.60769,0,0,0,835.629,259.63486Z" transform="translate(-174.73099 -79.58524)" fill="#fff" />
                                <path d="M835.629,297.58481h-22.27a2.599,2.599,0,0,0-2.59,2.6v22.27a2.59048,2.59048,0,0,0,2.59,2.59h22.27a2.59916,2.59916,0,0,0,2.6001-2.59v-22.27A2.60772,2.60772,0,0,0,835.629,297.58481Z" transform="translate(-174.73099 -79.58524)" fill="#fff" />
                                <path d="M835.629,335.53476h-22.27a2.59915,2.59915,0,0,0-2.59,2.6001v22.26a2.59261,2.59261,0,0,0,2.59,2.59985h22.27a2.60124,2.60124,0,0,0,2.6001-2.59985v-22.26A2.60782,2.60782,0,0,0,835.629,335.53476Z" transform="translate(-174.73099 -79.58524)" fill="#f9a826" />
                                <path d="M835.629,373.48471h-22.27a2.59923,2.59923,0,0,0-2.59,2.6001v22.26a2.59271,2.59271,0,0,0,2.59,2.6h22.27a2.60134,2.60134,0,0,0,2.6001-2.6v-22.26A2.60791,2.60791,0,0,0,835.629,373.48471Z" transform="translate(-174.73099 -79.58524)" fill="#e6e6e6" />
                                <path d="M835.629,411.43478h-22.27a2.59272,2.59272,0,0,0-2.59,2.6v22.26a2.59282,2.59282,0,0,0,2.59,2.6001h22.27a2.60146,2.60146,0,0,0,2.6001-2.6001v-22.26A2.60135,2.60135,0,0,0,835.629,411.43478Z" transform="translate(-174.73099 -79.58524)" fill="#fff" />
                                <path d="M882.389,259.63486h-22.27a2.599,2.599,0,0,0-2.59,2.59985v22.27a2.59059,2.59059,0,0,0,2.59,2.59009h22.27a2.59927,2.59927,0,0,0,2.6001-2.59009v-22.27A2.60769,2.60769,0,0,0,882.389,259.63486Z" transform="translate(-174.73099 -79.58524)" fill="#f9a826" />
                                <path d="M882.389,297.58481h-22.27a2.599,2.599,0,0,0-2.59,2.6v22.27a2.59048,2.59048,0,0,0,2.59,2.59h22.27a2.59916,2.59916,0,0,0,2.6001-2.59v-22.27A2.60772,2.60772,0,0,0,882.389,297.58481Z" transform="translate(-174.73099 -79.58524)" fill="#f9a826" />
                                <path d="M882.389,335.53476h-22.27a2.59915,2.59915,0,0,0-2.59,2.6001v22.26a2.59261,2.59261,0,0,0,2.59,2.59985h22.27a2.60124,2.60124,0,0,0,2.6001-2.59985v-22.26A2.60782,2.60782,0,0,0,882.389,335.53476Z" transform="translate(-174.73099 -79.58524)" fill="#e6e6e6" />
                                <path d="M882.389,373.48471h-22.27a2.59923,2.59923,0,0,0-2.59,2.6001v22.26a2.59271,2.59271,0,0,0,2.59,2.6h22.27a2.60134,2.60134,0,0,0,2.6001-2.6v-22.26A2.60791,2.60791,0,0,0,882.389,373.48471Z" transform="translate(-174.73099 -79.58524)" fill="#fff" />
                                <path d="M882.389,411.43478h-22.27a2.59272,2.59272,0,0,0-2.59,2.6v22.26a2.59282,2.59282,0,0,0,2.59,2.6001h22.27a2.60146,2.60146,0,0,0,2.6001-2.6001v-22.26A2.60135,2.60135,0,0,0,882.389,411.43478Z" transform="translate(-174.73099 -79.58524)" fill="#f9a826" />
                                <path d="M929.149,259.63486h-22.27a2.599,2.599,0,0,0-2.59,2.59985v22.27a2.59059,2.59059,0,0,0,2.59,2.59009h22.27a2.59916,2.59916,0,0,0,2.6-2.59009v-22.27A2.60759,2.60759,0,0,0,929.149,259.63486Z" transform="translate(-174.73099 -79.58524)" fill="#f9a826" />
                                <path d="M929.149,297.58481h-22.27a2.599,2.599,0,0,0-2.59,2.6v22.27a2.59048,2.59048,0,0,0,2.59,2.59h22.27a2.59906,2.59906,0,0,0,2.6-2.59v-22.27A2.60761,2.60761,0,0,0,929.149,297.58481Z" transform="translate(-174.73099 -79.58524)" fill="#f9a826" />
                                <path d="M929.149,335.53476h-22.27a2.59915,2.59915,0,0,0-2.59,2.6001v22.26a2.59261,2.59261,0,0,0,2.59,2.59985h22.27a2.60114,2.60114,0,0,0,2.6-2.59985v-22.26A2.60772,2.60772,0,0,0,929.149,335.53476Z" transform="translate(-174.73099 -79.58524)" fill="#e6e6e6" />
                                <path d="M929.149,373.48471h-22.27a2.59923,2.59923,0,0,0-2.59,2.6001v22.26a2.59271,2.59271,0,0,0,2.59,2.6h22.27a2.60124,2.60124,0,0,0,2.6-2.6v-22.26A2.6078,2.6078,0,0,0,929.149,373.48471Z" transform="translate(-174.73099 -79.58524)" fill="#f9a826" />
                                <path d="M929.149,411.43478h-22.27a2.59272,2.59272,0,0,0-2.59,2.6v22.26a2.59282,2.59282,0,0,0,2.59,2.6001h22.27a2.60135,2.60135,0,0,0,2.6-2.6001v-22.26A2.60125,2.60125,0,0,0,929.149,411.43478Z" transform="translate(-174.73099 -79.58524)" fill="#f9a826" />
                                <path d="M975.909,259.63486h-22.27a2.599,2.599,0,0,0-2.59,2.59985v22.27a2.59059,2.59059,0,0,0,2.59,2.59009h22.27a2.59916,2.59916,0,0,0,2.6-2.59009v-22.27A2.60759,2.60759,0,0,0,975.909,259.63486Z" transform="translate(-174.73099 -79.58524)" fill="#e6e6e6" />
                                <path d="M975.909,297.58481h-22.27a2.599,2.599,0,0,0-2.59,2.6v22.27a2.59048,2.59048,0,0,0,2.59,2.59h22.27a2.59906,2.59906,0,0,0,2.6-2.59v-22.27A2.60761,2.60761,0,0,0,975.909,297.58481Z" transform="translate(-174.73099 -79.58524)" fill="#f9a826" />
                                <path d="M975.909,335.53476h-22.27a2.59915,2.59915,0,0,0-2.59,2.6001v22.26a2.59261,2.59261,0,0,0,2.59,2.59985h22.27a2.60114,2.60114,0,0,0,2.6-2.59985v-22.26A2.60772,2.60772,0,0,0,975.909,335.53476Z" transform="translate(-174.73099 -79.58524)" fill="#f9a826" />
                                <path d="M975.909,373.48471h-22.27a2.59923,2.59923,0,0,0-2.59,2.6001v22.26a2.59271,2.59271,0,0,0,2.59,2.6h22.27a2.60124,2.60124,0,0,0,2.6-2.6v-22.26A2.6078,2.6078,0,0,0,975.909,373.48471Z" transform="translate(-174.73099 -79.58524)" fill="#f9a826" />
                                <path d="M975.909,411.43478h-22.27a2.59272,2.59272,0,0,0-2.59,2.6v22.26a2.59282,2.59282,0,0,0,2.59,2.6001h22.27a2.60135,2.60135,0,0,0,2.6-2.6001v-22.26A2.60125,2.60125,0,0,0,975.909,411.43478Z" transform="translate(-174.73099 -79.58524)" fill="#e6e6e6" />
                                <path d="M1022.669,259.63486h-22.27a2.59913,2.59913,0,0,0-2.59009,2.59985v22.27a2.5907,2.5907,0,0,0,2.59009,2.59009h22.27a2.59916,2.59916,0,0,0,2.6-2.59009v-22.27A2.60759,2.60759,0,0,0,1022.669,259.63486Z" transform="translate(-174.73099 -79.58524)" fill="#e6e6e6" />
                                <path d="M1022.669,297.58481h-22.27a2.59916,2.59916,0,0,0-2.59009,2.6v22.27a2.59059,2.59059,0,0,0,2.59009,2.59h22.27a2.59906,2.59906,0,0,0,2.6-2.59v-22.27A2.60761,2.60761,0,0,0,1022.669,297.58481Z" transform="translate(-174.73099 -79.58524)" fill="#e6e6e6" />
                                <path d="M1022.669,335.53476h-22.27a2.59926,2.59926,0,0,0-2.59009,2.6001v22.26a2.59272,2.59272,0,0,0,2.59009,2.59985h22.27a2.60114,2.60114,0,0,0,2.6-2.59985v-22.26A2.60772,2.60772,0,0,0,1022.669,335.53476Z" transform="translate(-174.73099 -79.58524)" fill="#f9a826" />
                                <path d="M1022.669,373.48471h-22.27a2.59934,2.59934,0,0,0-2.59009,2.6001v22.26a2.59282,2.59282,0,0,0,2.59009,2.6h22.27a2.60124,2.60124,0,0,0,2.6-2.6v-22.26A2.6078,2.6078,0,0,0,1022.669,373.48471Z" transform="translate(-174.73099 -79.58524)" fill="#e6e6e6" />
                                <path d="M1022.669,411.43478h-22.27a2.59283,2.59283,0,0,0-2.59009,2.6v22.26a2.59293,2.59293,0,0,0,2.59009,2.6001h22.27a2.60135,2.60135,0,0,0,2.6-2.6001v-22.26A2.60125,2.60125,0,0,0,1022.669,411.43478Z" transform="translate(-174.73099 -79.58524)" fill="#e6e6e6" />
                                <polygon points="336.095 660.051 335.475 660.051 336.005 659.981 336.095 660.051" fill="#2f2e41" />
                                <circle id="b6132315-04e2-4cdb-a713-107c9cd58b0b" data-name="ab6171fa-7d69-4734-b81c-8dff60f9761b" cx="282.81438" cy="176.73277" r="68.32185" fill="#ffb6b6" />
                                <path id="f4304bdd-ba2d-4fff-b404-410205410c5d-236" data-name="bf427902-b9bf-4946-b5d7-5c1c7e04535e" d="M517.37694,206.2256s17.8694-34.16091-21.44383-37.26649c0,0-33.51489-30.40228-67.6758-5.558,0,0-18.63322,0-28.82254,21.08567,0,0-14.655-5.558-17.87551,9.31661,0,0-10.72349,31.05546,0,59.00533,10.72348,27.94992,14.28537,31.05537,14.28537,31.05537s-17.6209-58.59838,25.26991-61.704,90.8867-29.90942,94.46114,4.25144,8.95329,42.57784,8.95329,42.57784S558.47855,220.2006,517.37694,206.2256Z" transform="translate(-174.73099 -79.58524)" fill="#2f2e41" />
                                <path d="M634.279,424.69479l-.2201,1.16-2.47,13.04-17.06994,90.2-1.01,5.31006-2.12,11.23-2.8999,15.31994-6.43018,33.95008-1.83984,9.73-.69006,3.6499-.24,1.28-1.91,10.07007-.58,3.03991-4.66,34.53-4.07007,30.09,13.62012,13.62-8.12012,8.12-5.32983,30.53.00989.07007H370.71908q-13.20008-8.55012-26.02-17.63013l1.79-13.3999s6.15991-23.93006,3.56982-26.79c-2.57983-2.86-8.24-7.97-8.24-7.97l7.13013-16.64.99-2.30993-1.66-34.43006-.03992-.83-.55-11.3501-.07007-1.46-.11-2.18994-2.11-43.68006-.04-.72009-.63989-13.24-.6001-12.58984-.26-5.31006-2.56994-53.13-1.74-36.07995-1.52-31.41,6.11-2.06994,65.3501-22.21009,27.06982-35.19006,56.34009.42,27.58008.21009,46.0199,42.67993,10.47009,5,.08.04,7.50988,3.59,19.04,9.09,20.13013,9.62012,10.32983,4.92993Z" transform="translate(-174.73099 -79.58524)" fill="#cacaca" />
                                <path d="M443.83985,637.13612a30.28588,30.28588,0,0,1-40.66389-22.43L296.61714,599.5882l37.0428-41.902,95.511,20.7803a30.45,30.45,0,0,1,14.66891,58.66964Z" transform="translate(-174.73099 -79.58524)" fill="#ffb6b6" />
                                <path d="M396.32894,560.9548a13.52249,13.52249,0,0,0-7.88989-4.87l-43.72-9.09009-4.49-.92993a18.93267,18.93267,0,0,1-12.53009-9.07007,19.16055,19.16055,0,0,1-2.45-7.8999,18.89456,18.89456,0,0,1,.89-7.48l15.15-45.65,9.82995-29.62a41.79215,41.79215,0,0,0,2.09009-11.05,43.34878,43.34878,0,0,0-9.07007-28.88989,42.69326,42.69326,0,0,0-49.01-13.64014c-.25.09009-.51.19006-.76.29a42.58322,42.58322,0,0,0-25.31,28.41l-10.68,38.85-22.03,80.09009a57.7664,57.7664,0,0,0,48.96,72.67993l62.97,7.38,29.14,3.42a13.49651,13.49651,0,0,0,14.84-10.73,4.89544,4.89544,0,0,0,.11-.55005l.7-4.32007,5.93006-36.37988.05993-.37012A13.47483,13.47483,0,0,0,396.32894,560.9548Z" transform="translate(-174.73099 -79.58524)" fill="#cacaca" />
                                <path d="M511.71356,638.30236a30.28592,30.28592,0,0,0,37.09449-27.9402l103.362-29.99367L609.5885,544.10893l-91.62614,34.04148a30.45,30.45,0,0,0-6.2488,60.152Z" transform="translate(-174.73099 -79.58524)" fill="#ffb6b6" />
                                <path d="M703.4891,513.27475,654.32894,400.13486a42.819,42.819,0,0,0-20.27-21.3501,43.35617,43.35617,0,0,0-8.7799-3.2c-.4701-.12-.94007-.23-1.41-.32007a42.1319,42.1319,0,0,0-19.48.36011,42.81378,42.81378,0,0,0-27.34,21.73,1.00376,1.00376,0,0,0-.08.13989,43.10025,43.10025,0,0,0-.37012,38.8501l.61011,1.22,34.74,69.77a18.90046,18.90046,0,0,1-10.5,26.18994l-2.44006.88013-43.88,15.84985a13.4969,13.4969,0,0,0-8.33,16.79l.11.3501,12.3,39.35986c.05994.18005.11987.36011.18994.54a7.0543,7.0543,0,0,0,.4.99,13.48177,13.48177,0,0,0,15.80993,7.53l23.68006-6.25,4.82995-1.28,61.15-16.1499a57.76037,57.76037,0,0,0,38.22009-78.86011Z" transform="translate(-174.73099 -79.58524)" fill="#cacaca" />
                                <path d="M219.629,608.28482a514.11633,514.11633,0,0,0,45.75,48.92h451.97a16.44588,16.44588,0,0,1,16.42,16.43l.65,114.53a355.4301,355.4301,0,0,0,77.47-48.53q9.84-8.085,19.07-16.87,6.045-5.73,11.8-11.74a355.62853,355.62853,0,0,0,68.82-102.74Z" transform="translate(-174.73099 -79.58524)" fill="#3f3d56" />
                                <path d="M842.759,711.02475q-5.74494,6.015-11.79993,11.74H734.749v-11.74Z" transform="translate(-174.73099 -79.58524)" fill="#fff" />
                                <path d="M633.379,335.53476a5.53766,5.53766,0,0,0-4.87-2.8999H300.669a5.55451,5.55451,0,0,0-5.54,5.54992v196.2201H634.05892V338.18478A5.38548,5.38548,0,0,0,633.379,335.53476Z" transform="translate(-174.73099 -79.58524)" fill="#3f3d56" />
                                <path d="M294.83213,529.09239V553.3062a7.64384,7.64384,0,0,0,7.64382,7.64392H427.57266v47.78659h-1.66185a.9929.9929,0,0,0-.993.99292v3.32374a.9929.9929,0,0,0,.993.993h77.6584a.99291.99291,0,0,0,.993-.993v-3.32374a.9929.9929,0,0,0-.993-.99292h-1.66185V560.95012H627.00407a7.64384,7.64384,0,0,0,7.64382-7.64392V529.09239Z" transform="translate(-174.73099 -79.58524)" fill="#3f3d56" />
                                <circle cx="285.90293" cy="348.70373" r="31.30642" fill="#f9a826" />
                                <path d="M540.399,252.58481h-5c0-37.8-37.41-62.57-75.15-62.59a82.38227,82.38227,0,0,0-16.35,1.59c-6.06,1.21-12.35,2.66-18.53,4.55-24.37,7.47-46.97,21.91-46.97,56.45a78.591,78.591,0,0,0,2.54,19.88l-4.84,1.26a83.87572,83.87572,0,0,1-2.7-21.14c0-30.18,12.39-50.91,33.79-63.27,11.25-6.5,24.98-10.69,40.71-12.73a97.13079,97.13079,0,0,1,19.75-.6C511.049,179.10477,540.399,212.38479,540.399,252.58481Z" transform="translate(-174.73099 -79.58524)" fill="#f9a826" />
                                <path d="M548.729,255.35477l-1.97-14.56a15.71013,15.71013,0,0,0-5-9.56,15.81566,15.81566,0,0,0-13.25-4l-3.13.43a6.52426,6.52426,0,0,0-4.35,2.53,6.548,6.548,0,0,0-1.29,4.87l4.55,33.54a6.57712,6.57712,0,0,0,5.3,5.57,6.15442,6.15442,0,0,0,1.22.12,6.49883,6.49883,0,0,0,.88-.06l3.5-.47a15.79135,15.79135,0,0,0,10.74-6.43c.27-.38.53-.77.77-1.17005A16.7484,16.7484,0,0,0,548.729,255.35477Z" transform="translate(-174.73099 -79.58524)" fill="#f9a826" />
                                <path d="M523.359,228.27481a6.4317,6.4317,0,0,0-2.33,1.92,6.548,6.548,0,0,0-1.29,4.87l4.55,33.54a6.57712,6.57712,0,0,0,5.3,5.57Z" transform="translate(-174.73099 -79.58524)" fill="#fff" />
                                <path d="M548.729,255.35477l-1.97-14.56a15.71013,15.71013,0,0,0-5-9.56l4.53,33.37a6.17592,6.17592,0,0,0,.41,1.56A16.7484,16.7484,0,0,0,548.729,255.35477Z" transform="translate(-174.73099 -79.58524)" fill="#3f3d56" />
                                <ellipse cx="532.21834" cy="258.90901" rx="2.5" ry="7" transform="translate(-204.70468 -5.69071) rotate(-7.72549)" fill="#3f3d56" />
                                <ellipse cx="529.21834" cy="240.90901" rx="2.5" ry="7" transform="translate(-202.31223 -6.25736) rotate(-7.72549)" fill="#3f3d56" />
                                <ellipse cx="548.21834" cy="247.90901" rx="2.5" ry="7" transform="translate(-203.08076 -3.63971) rotate(-7.72549)" fill="#3f3d56" />
                                <path d="M460.249,189.99478a82.38227,82.38227,0,0,0-16.35,1.59c-6.06,1.21-12.35,2.66-18.53,4.55-9.65-.47-16.75-2.97-18.18-6.82,11.25-6.5,24.98-10.69,40.71-12.73a97.13079,97.13079,0,0,1,19.75-.6,5.727,5.727,0,0,1,2.72,3.82C470.839,183.28482,466.869,186.98477,460.249,189.99478Z" transform="translate(-174.73099 -79.58524)" fill="#3f3d56" />
                                <path d="M396.409,287.28482l-7.7-32.01a6.02367,6.02367,0,0,0-4.88-4.55,6.73326,6.73326,0,0,0-1-.08,6.02576,6.02576,0,0,0-1.4.17l-2.98.72a14.904,14.904,0,0,0-10.99,17.96l3.45,14.36a15.84509,15.84509,0,0,0,5.34,8.62005,14.045,14.045,0,0,0,1.36.97,14.80921,14.80921,0,0,0,11.37,1.84l2.97-.72a5.84014,5.84014,0,0,0,2.17-1.01A5.99327,5.99327,0,0,0,396.409,287.28482Z" transform="translate(-174.73099 -79.58524)" fill="#f9a826" />
                                <ellipse cx="378.62896" cy="274.52323" rx="2.5" ry="7" transform="translate(-228.45065 16.61926) rotate(-13.53051)" fill="#3f3d56" />
                                <ellipse cx="368.62896" cy="277.52323" rx="2.5" ry="7" transform="translate(-229.43008 14.36289) rotate(-13.53051)" fill="#3f3d56" />
                                <path d="M396.899,287.16476l-7.7-32.01a6.53174,6.53174,0,0,0-5.29-4.92l10.51,43.72A6.5111,6.5111,0,0,0,396.899,287.16476Z" transform="translate(-174.73099 -79.58524)" fill="#fff" />
                                <path d="M369.199,263.15481a6.476,6.476,0,0,0-1.17-2.45,14.72545,14.72545,0,0,0-.57,8.79l3.45,14.36a15.84509,15.84509,0,0,0,5.34,8.62005Z" transform="translate(-174.73099 -79.58524)" fill="#3f3d56" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden text-9xl varien absolute top-6 left-1/4 text-g/10 z-40    ">
                About Us
            </div>
            <div class=" absolute -bottom-24 left-10 z-0  opacity-10 ">
                <svg width="800px" height="800px" viewBox="0 0 24 24" class="w-96 z-0  h-full    object-fill fill-gray-300 text-gray-300" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12 6C12 5.44772 11.5523 5 11 5C10.4477 5 10 5.44772 10 6V16C10 16.5523 10.4477 17 11 17C11.5523 17 12 16.5523 12 16V6ZM9 9C9 8.44772 8.55228 8 8 8C7.44772 8 7 8.44772 7 9V16C7 16.5523 7.44772 17 8 17C8.55228 17 9 16.5523 9 16V9ZM15 9C15 8.44772 14.5523 8 14 8C13.4477 8 13 8.44772 13 9V16C13 16.5523 13.4477 17 14 17C14.5523 17 15 16.5523 15 16V9ZM18 13C18 12.4477 17.5523 12 17 12C16.4477 12 16 12.4477 16 13V16C16 16.5523 16.4477 17 17 17C17.5523 17 18 16.5523 18 16V13ZM6 15C6 14.4477 5.55228 14 5 14C4.44772 14 4 14.4477 4 15V16C4 16.5523 4.44772 17 5 17C5.55228 17 6 16.5523 6 16V15ZM21 15C21 14.4477 20.5523 14 20 14C19.4477 14 19 14.4477 19 15V16C19 16.5523 19.4477 17 20 17C20.5523 17 21 16.5523 21 16V15ZM4 18C3.44772 18 3 18.4477 3 19C3 19.5523 3.44772 20 4 20H21C21.5523 20 22 19.5523 22 19C22 18.4477 21.5523 18 21 18H4Z"></path>
                </svg>
            </div>

            <div class=" absolute -bottom-0 left-3/4 z-0  opacity-10 ">
                <svg width="800px" height="800px" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg" class="w-48 z-0  h-full -rotate-90   object-fill fill-red-300 text-red-300">
                    <path d="M32 225h12.993A4.004 4.004 0 0 0 49 220.997V138.01c0-4.976.724-5.04 1.614-.16l12.167 66.708c.397 2.177 2.516 3.942 4.713 3.942h8.512a3.937 3.937 0 0 0 3.947-4S79 127.5 80 129s14.488 52.67 14.488 52.67c.559 2.115 2.8 3.83 5.008 3.83h8.008a3.993 3.993 0 0 0 3.996-3.995v-43.506c0-4.97 1.82-5.412 4.079-.965l10.608 20.895c1.001 1.972 3.604 3.571 5.806 3.571h9.514a3.999 3.999 0 0 0 3.993-4.001v-19.49c0-4.975 2.751-6.074 6.155-2.443l6.111 6.518c1.51 1.61 4.528 2.916 6.734 2.916h7c2.21 0 5.567-.855 7.52-1.92l9.46-5.16c1.944-1.06 5.309-1.92 7.524-1.92h23.992a4.002 4.002 0 0 0 4.004-3.992v-7.516a3.996 3.996 0 0 0-4.004-3.992h-23.992c-2.211 0-5.601.823-7.564 1.834l-4.932 2.54c-4.423 2.279-12.028 3.858-16.993 3.527l2.97.198c-4.962-.33-10.942-4.12-13.356-8.467l-11.19-20.14c-1.07-1.929-3.733-3.492-5.939-3.492h-7c-2.21 0-4 1.794-4 4.001v19.49c0 4.975-1.14 5.138-2.542.382l-12.827-43.535c-.625-2.12-2.92-3.838-5.127-3.838h-8.008c-2.207 0-3.916 1.784-3.817 4.005l1.92 42.998c.221 4.969-.489 5.068-1.585.224l-15.13-66.825c-.488-2.155-2.681-3.902-4.878-3.902h-8.512a3.937 3.937 0 0 0-3.947 4s.953 77-.047 75.5-13.937-92.072-13.937-92.072C49.252 34.758 47.21 33 45 33H31.999" fill-rule="evenodd"></path>
                </svg>
            </div>

        </div>
        <!-- intro  -->
        <div class="intro bg-white rounded-lg pt-5">
            <div class="container flex flex-col mx-auto bg-white rounded-lg">
                <div class="container flex flex-col items-center gap-16 mx-auto mt-10">
                    <div class="flex flex-col gap-7">
                        <div class="flex flex-col gap-2 px-6 text-center w-10/12 mx-auto">
                            <h2 class="text-3xl font-extrabold leading-tight lg:text-4xl text-dark-grey-900"> Well, Here you can learn and help others to learn </h2>
                            <p class="text-base font-medium leading-7 text-dark-grey-600">Enjoy learning and test you skills with all quizes, and don't forget to add your knowledge for others people <span class="font-extrabold text-[#EC9131]">All Free</span>.</p>
                        </div>
                        <div class="flex items-center justify-center">
                            <button class="flex items-center justify-center py-4 text-white px-7 rounded-2xl bg-[#EC9131] hover:bg-[#884907] focus:ring-4 focus:ring-[#884907] transition duration-300">Don't forget to Support Us</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end intro -->
        <!-- Cards Techologies -->
        <div class='flex min-h-screen  px-24'>
            <div class="w-full mt-10  ">
                <!-- here should title be -->
                <div class="text-left  pb-12">
                    <h2 class="text-base font-bold text-indigo-600">
                        Tutorials
                    </h2>
                    <h1 class="font-bold text-3xl md:text-4xl lg:text-5xl font-heading text-gray-900">
                        The popular Tutorials
                    </h1>
                </div>

                <div class="mt-8 grid grid-cols-2 gap-6 md:grid-cols-4" id="frameworks-integration">
                <?php foreach($tutorials as $tuto){ ?>    
                    <a class="grid w-full min-w-[7rem] transform cursor-pointer place-items-center rounded-xl border border-blue-gray-50 bg-white px-3 py-2 transition-all hover:scale-105 hover:border-blue-gray-100 hover:bg-blue-gray-50 hover:bg-opacity-25" href="/Views/Tutorials.php">
                        <span class="my-6 grid h-24 w-24 place-items-center">
                            <img src="<?php echo $tuto->getImage(); ?>" alt="">
                        </span>
                    </a>
                <?php } ?>    
                <?php ?>    
                <?php ?>    
                
                </div>
            </div>
        </div>
        <!-- End Cards Technologies -->
        
        <!-- Cards Techologies -->
        <div class='flex  px-24'>
            <div class="w-full mb-20  ">
                <!-- component -->
                <section class="mx-auto  py-12">
                    <div class="text-left pb-12">
                        <h2 class="text-base font-bold text-indigo-600">
                            Contrubitters
                        </h2>
                        <h1 class="font-bold text-3xl md:text-4xl lg:text-5xl font-heading text-gray-900">
                            The Best Contributors
                        </h1>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        <div class="w-full bg-yellow-400 rounded-lg p-2 flex flex-col justify-center items-center">
                            <div class="mb-8">
                                <img class="object-center object-cover rounded-full h-36 w-36" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1170&q=80" alt="photo">
                            </div>
                            <div class="text-center">
                                <p class="text-xl text-gray-700 font-bold mb-2">Dany Bailey</p>
                                <p class="text-base  font-normal">Software Engineer</p>
                            </div>
                        </div>
                        <div class="w-full bg-yellow-300 rounded-lg p-2 flex flex-col justify-center items-center">
                            <div class="mb-8">
                                <img class="object-center object-cover rounded-full h-36 w-36" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1170&q=80" alt="photo">
                            </div>
                            <div class="text-center">
                                <p class="text-xl text-gray-700 font-bold mb-2">Lucy Carter</p>
                                <p class="text-base text-gray-400 font-normal">Graphic Designer</p>
                            </div>
                        </div>
                        <div class="w-full bg-yellow-300 rounded-lg p-2 flex flex-col justify-center items-center">
                            <div class="mb-8">
                                <img class="object-center object-cover rounded-full h-36 w-36" src="https://images.unsplash.com/photo-1499952127939-9bbf5af6c51c?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1176&q=80" alt="photo">
                            </div>
                            <div class="text-center">
                                <p class="text-xl text-gray-700 font-bold mb-2">Jade Bradley</p>
                                <p class="text-base text-gray-400 font-normal">Dev Ops</p>
                            </div>
                        </div>
                        <div class="w-full bg-yellow-200 rounded-lg p-2 flex flex-col justify-center items-center">
                            <div class="mb-8">
                                <img class="object-center object-cover rounded-full h-36 w-36" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1170&q=80" alt="photo">
                            </div>
                            <div class="text-center">
                                <p class="text-xl text-gray-700 font-bold mb-2">Dany Bailey</p>
                                <p class="text-base text-gray-400 font-normal">Software Engineer</p>
                            </div>
                        </div>
                        <div class="w-full bg-yellow-50 rounded-lg p-2 flex flex-col justify-center items-center">
                            <div class="mb-8">
                                <img class="object-center object-cover rounded-full h-36 w-36" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1170&q=80" alt="photo">
                            </div>
                            <div class="text-center">
                                <p class="text-xl text-gray-700 font-bold mb-2">Lucy Carter</p>
                                <p class="text-base text-gray-400 font-normal">Graphic Designer</p>
                            </div>
                        </div>
                        <div class="w-full bg-yellow-50 rounded-lg p-2 flex flex-col justify-center items-center">
                            <div class="mb-8">
                                <img class="object-center object-cover rounded-full h-36 w-36" src="https://images.unsplash.com/photo-1499952127939-9bbf5af6c51c?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1176&q=80" alt="photo">
                            </div>
                            <div class="text-center">
                                <p class="text-xl text-gray-700 font-bold mb-2">Jade Bradley</p>
                                <p class="text-base text-gray-400 font-normal">Dev Ops</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- End Cards Technologies -->
    </div>
    </div>
    <?php include("./Includes/Footer.php") ?>
</body>

</html>
