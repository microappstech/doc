<?php session_start() ?> 
<?php include_once("../../Constants.php"); ?> 
<?php include_once("../../Models/Tutorail.php"); ?> 
<?php require_once("../../Config/Config.php"); ?> 
<?php require_once("../../Services/TutorialService.php"); ?>
<?php require_once("../../Functions/IsLLogged.php"); ?> 


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/soumwej/assets/images/logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="../../Assets/img/favIcon.png" type="image/x-icon">
    <title>Tutorial | Dashbord</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>

   
<div>
   <?php  include("../../Includes/NavBar.php") ?>
    <div class="flex overflow-hidden bg-white pt-16">
       <?php  include("../../Includes/SideBar.php") ?>
       <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>
       <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
       <main class="flex-1 max-h-full p-5 overflow-hidden overflow-y-scroll">
          <!-- Main content header -->
          <div
            class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row"
          >
            <h1 class="text-2xl font-semibold whitespace-nowrap text-gray-500">Add Tutorial</h1>
          </div>
            <section class="bg-white pb-20 lg:pb-[120px] overflow-hidden relative z-10">
                <div class="container">
                    <div class="flex flex-wrap lg:justify-between -mx-4">
                        <div class="w-full lg:w-1/2 xl:w-6/12 px-4 pt-6">
                            <div class="lg:mb-0 mx-2">
                                <span class="block mb-4 text-base text-primary font-light text-muted">
                                    Demo
                                </span>
                                <div class="border border-1 border-gray-100 w-full min-h-screen rounded shadow-lg ">

                                </div>
                            </div>
                        </div> 
                        <div class="w-full lg:w-1/2 xl:w-5/12 px-4 pt-12">
                            <div class="bg-white relative rounded-lg p-8 sm:p-12 shadow-lg">
                                <?php 
                                require_once("../../Services/TutorialService.php");
                                
                                
                                if(isset($_POST["submit"])){
                                    $TutorialService = new TutorialService($pdo);
                                    $result = false;
                                    
                                    $result = $TutorialService->CreateTutorial($_POST["Title"],$_POST["content"],$_POST["image"],"User".$_SESSION["userid"], $_SESSION["userid"]);                                    
                                    if($result){
                                        echo "<script>window.alert('Craeted Successfuly')</script>";
                                    }
                                }
                                 ?>
                            <form method="post">
                                <div class="mb-6">
                                    <input
                                        type="text"
                                        placeholder="Title"
                                        name="Title"
                                        class="
                                        w-full
                                        rounded
                                        py-3
                                        px-[14px]
                                        text-body-color text-base
                                        border border-[f0f0f0]
                                        outline-none
                                        focus-visible:shadow-none
                                        focus:border-primary
                                        "
                                        />
                                </div>
                                <div class="mb-6">
                                    <input
                                        type="text"
                                        name="image"
                                        placeholder="Thank you to write a svg code"
                                        class="
                                        w-full
                                        rounded
                                        py-3
                                        px-[14px]
                                        text-body-color text-base
                                        border border-[f0f0f0]
                                        outline-none
                                        focus-visible:shadow-none
                                        focus:border-primary
                                        "
                                        />
                                </div>
                                <div class="mb-6">
                                    <textarea
                                        rows="6"
                                        name="content"
                                        placeholder="Tutorial's content"
                                        class="
                                        w-full
                                        rounded
                                        py-3
                                        px-[14px]
                                        text-body-color text-base
                                        border border-[f0f0f0]
                                        resize-none
                                        outline-none
                                        focus-visible:shadow-none
                                        focus:border-primary
                                        "
                                        ></textarea>
                                </div>
                                <div>
                                    <button
                                        type="submit"
                                        name="submit"
                                        class="
                                        w-full
                                        text-white
                                        bg-blue-400
                                        rounded
                                        border border-primary
                                        p-3
                                        transition
                                        hover:bg-opacity-90
                                        "
                                        >
                                    Create
                                    </button>
                                </div>
                            </form>
                            <div>
                                <span class="absolute -top-10 -right-9 z-[-1]">
                                    <svg
                                        width="100"
                                        height="100"
                                        viewBox="0 0 100 100"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        >
                                        <path
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M0 100C0 44.7715 0 0 0 0C55.2285 0 100 44.7715 100 100C100 100 100 100 0 100Z"
                                        fill="#3056D3"
                                        />
                                    </svg>
                                </span>
                                <span class="absolute -right-10 top-[90px] z-[-1]">
                                    <svg
                                        width="34"
                                        height="134"
                                        viewBox="0 0 34 134"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        >
                                        <circle
                                        cx="31.9993"
                                        cy="132"
                                        r="1.66667"
                                        transform="rotate(180 31.9993 132)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="31.9993"
                                        cy="117.333"
                                        r="1.66667"
                                        transform="rotate(180 31.9993 117.333)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="31.9993"
                                        cy="102.667"
                                        r="1.66667"
                                        transform="rotate(180 31.9993 102.667)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="31.9993"
                                        cy="88"
                                        r="1.66667"
                                        transform="rotate(180 31.9993 88)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="31.9993"
                                        cy="73.3333"
                                        r="1.66667"
                                        transform="rotate(180 31.9993 73.3333)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="31.9993"
                                        cy="45"
                                        r="1.66667"
                                        transform="rotate(180 31.9993 45)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="31.9993"
                                        cy="16"
                                        r="1.66667"
                                        transform="rotate(180 31.9993 16)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="31.9993"
                                        cy="59"
                                        r="1.66667"
                                        transform="rotate(180 31.9993 59)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="31.9993"
                                        cy="30.6666"
                                        r="1.66667"
                                        transform="rotate(180 31.9993 30.6666)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="31.9993"
                                        cy="1.66665"
                                        r="1.66667"
                                        transform="rotate(180 31.9993 1.66665)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="17.3333"
                                        cy="132"
                                        r="1.66667"
                                        transform="rotate(180 17.3333 132)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="17.3333"
                                        cy="117.333"
                                        r="1.66667"
                                        transform="rotate(180 17.3333 117.333)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="17.3333"
                                        cy="102.667"
                                        r="1.66667"
                                        transform="rotate(180 17.3333 102.667)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="17.3333"
                                        cy="88"
                                        r="1.66667"
                                        transform="rotate(180 17.3333 88)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="17.3333"
                                        cy="73.3333"
                                        r="1.66667"
                                        transform="rotate(180 17.3333 73.3333)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="17.3333"
                                        cy="45"
                                        r="1.66667"
                                        transform="rotate(180 17.3333 45)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="17.3333"
                                        cy="16"
                                        r="1.66667"
                                        transform="rotate(180 17.3333 16)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="17.3333"
                                        cy="59"
                                        r="1.66667"
                                        transform="rotate(180 17.3333 59)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="17.3333"
                                        cy="30.6666"
                                        r="1.66667"
                                        transform="rotate(180 17.3333 30.6666)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="17.3333"
                                        cy="1.66665"
                                        r="1.66667"
                                        transform="rotate(180 17.3333 1.66665)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="2.66536"
                                        cy="132"
                                        r="1.66667"
                                        transform="rotate(180 2.66536 132)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="2.66536"
                                        cy="117.333"
                                        r="1.66667"
                                        transform="rotate(180 2.66536 117.333)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="2.66536"
                                        cy="102.667"
                                        r="1.66667"
                                        transform="rotate(180 2.66536 102.667)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="2.66536"
                                        cy="88"
                                        r="1.66667"
                                        transform="rotate(180 2.66536 88)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="2.66536"
                                        cy="73.3333"
                                        r="1.66667"
                                        transform="rotate(180 2.66536 73.3333)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="2.66536"
                                        cy="45"
                                        r="1.66667"
                                        transform="rotate(180 2.66536 45)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="2.66536"
                                        cy="16"
                                        r="1.66667"
                                        transform="rotate(180 2.66536 16)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="2.66536"
                                        cy="59"
                                        r="1.66667"
                                        transform="rotate(180 2.66536 59)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="2.66536"
                                        cy="30.6666"
                                        r="1.66667"
                                        transform="rotate(180 2.66536 30.6666)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="2.66536"
                                        cy="1.66665"
                                        r="1.66667"
                                        transform="rotate(180 2.66536 1.66665)"
                                        fill="#13C296"
                                        />
                                    </svg>
                                </span>
                                <span class="absolute -left-7 -bottom-7 z-[-1]">
                                    <svg
                                        width="107"
                                        height="134"
                                        viewBox="0 0 107 134"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        >
                                        <circle
                                        cx="104.999"
                                        cy="132"
                                        r="1.66667"
                                        transform="rotate(180 104.999 132)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="104.999"
                                        cy="117.333"
                                        r="1.66667"
                                        transform="rotate(180 104.999 117.333)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="104.999"
                                        cy="102.667"
                                        r="1.66667"
                                        transform="rotate(180 104.999 102.667)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="104.999"
                                        cy="88"
                                        r="1.66667"
                                        transform="rotate(180 104.999 88)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="104.999"
                                        cy="73.3333"
                                        r="1.66667"
                                        transform="rotate(180 104.999 73.3333)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="104.999"
                                        cy="45"
                                        r="1.66667"
                                        transform="rotate(180 104.999 45)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="104.999"
                                        cy="16"
                                        r="1.66667"
                                        transform="rotate(180 104.999 16)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="104.999"
                                        cy="59"
                                        r="1.66667"
                                        transform="rotate(180 104.999 59)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="104.999"
                                        cy="30.6666"
                                        r="1.66667"
                                        transform="rotate(180 104.999 30.6666)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="104.999"
                                        cy="1.66665"
                                        r="1.66667"
                                        transform="rotate(180 104.999 1.66665)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="90.3333"
                                        cy="132"
                                        r="1.66667"
                                        transform="rotate(180 90.3333 132)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="90.3333"
                                        cy="117.333"
                                        r="1.66667"
                                        transform="rotate(180 90.3333 117.333)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="90.3333"
                                        cy="102.667"
                                        r="1.66667"
                                        transform="rotate(180 90.3333 102.667)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="90.3333"
                                        cy="88"
                                        r="1.66667"
                                        transform="rotate(180 90.3333 88)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="90.3333"
                                        cy="73.3333"
                                        r="1.66667"
                                        transform="rotate(180 90.3333 73.3333)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="90.3333"
                                        cy="45"
                                        r="1.66667"
                                        transform="rotate(180 90.3333 45)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="90.3333"
                                        cy="16"
                                        r="1.66667"
                                        transform="rotate(180 90.3333 16)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="90.3333"
                                        cy="59"
                                        r="1.66667"
                                        transform="rotate(180 90.3333 59)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="90.3333"
                                        cy="30.6666"
                                        r="1.66667"
                                        transform="rotate(180 90.3333 30.6666)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="90.3333"
                                        cy="1.66665"
                                        r="1.66667"
                                        transform="rotate(180 90.3333 1.66665)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="75.6654"
                                        cy="132"
                                        r="1.66667"
                                        transform="rotate(180 75.6654 132)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="31.9993"
                                        cy="132"
                                        r="1.66667"
                                        transform="rotate(180 31.9993 132)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="75.6654"
                                        cy="117.333"
                                        r="1.66667"
                                        transform="rotate(180 75.6654 117.333)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="31.9993"
                                        cy="117.333"
                                        r="1.66667"
                                        transform="rotate(180 31.9993 117.333)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="75.6654"
                                        cy="102.667"
                                        r="1.66667"
                                        transform="rotate(180 75.6654 102.667)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="31.9993"
                                        cy="102.667"
                                        r="1.66667"
                                        transform="rotate(180 31.9993 102.667)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="75.6654"
                                        cy="88"
                                        r="1.66667"
                                        transform="rotate(180 75.6654 88)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="31.9993"
                                        cy="88"
                                        r="1.66667"
                                        transform="rotate(180 31.9993 88)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="75.6654"
                                        cy="73.3333"
                                        r="1.66667"
                                        transform="rotate(180 75.6654 73.3333)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="31.9993"
                                        cy="73.3333"
                                        r="1.66667"
                                        transform="rotate(180 31.9993 73.3333)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="75.6654"
                                        cy="45"
                                        r="1.66667"
                                        transform="rotate(180 75.6654 45)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="31.9993"
                                        cy="45"
                                        r="1.66667"
                                        transform="rotate(180 31.9993 45)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="75.6654"
                                        cy="16"
                                        r="1.66667"
                                        transform="rotate(180 75.6654 16)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="31.9993"
                                        cy="16"
                                        r="1.66667"
                                        transform="rotate(180 31.9993 16)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="75.6654"
                                        cy="59"
                                        r="1.66667"
                                        transform="rotate(180 75.6654 59)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="31.9993"
                                        cy="59"
                                        r="1.66667"
                                        transform="rotate(180 31.9993 59)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="75.6654"
                                        cy="30.6666"
                                        r="1.66667"
                                        transform="rotate(180 75.6654 30.6666)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="31.9993"
                                        cy="30.6666"
                                        r="1.66667"
                                        transform="rotate(180 31.9993 30.6666)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="75.6654"
                                        cy="1.66665"
                                        r="1.66667"
                                        transform="rotate(180 75.6654 1.66665)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="31.9993"
                                        cy="1.66665"
                                        r="1.66667"
                                        transform="rotate(180 31.9993 1.66665)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="60.9993"
                                        cy="132"
                                        r="1.66667"
                                        transform="rotate(180 60.9993 132)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="17.3333"
                                        cy="132"
                                        r="1.66667"
                                        transform="rotate(180 17.3333 132)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="60.9993"
                                        cy="117.333"
                                        r="1.66667"
                                        transform="rotate(180 60.9993 117.333)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="17.3333"
                                        cy="117.333"
                                        r="1.66667"
                                        transform="rotate(180 17.3333 117.333)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="60.9993"
                                        cy="102.667"
                                        r="1.66667"
                                        transform="rotate(180 60.9993 102.667)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="17.3333"
                                        cy="102.667"
                                        r="1.66667"
                                        transform="rotate(180 17.3333 102.667)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="60.9993"
                                        cy="88"
                                        r="1.66667"
                                        transform="rotate(180 60.9993 88)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="17.3333"
                                        cy="88"
                                        r="1.66667"
                                        transform="rotate(180 17.3333 88)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="60.9993"
                                        cy="73.3333"
                                        r="1.66667"
                                        transform="rotate(180 60.9993 73.3333)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="17.3333"
                                        cy="73.3333"
                                        r="1.66667"
                                        transform="rotate(180 17.3333 73.3333)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="60.9993"
                                        cy="45"
                                        r="1.66667"
                                        transform="rotate(180 60.9993 45)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="17.3333"
                                        cy="45"
                                        r="1.66667"
                                        transform="rotate(180 17.3333 45)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="60.9993"
                                        cy="16"
                                        r="1.66667"
                                        transform="rotate(180 60.9993 16)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="17.3333"
                                        cy="16"
                                        r="1.66667"
                                        transform="rotate(180 17.3333 16)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="60.9993"
                                        cy="59"
                                        r="1.66667"
                                        transform="rotate(180 60.9993 59)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="17.3333"
                                        cy="59"
                                        r="1.66667"
                                        transform="rotate(180 17.3333 59)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="60.9993"
                                        cy="30.6666"
                                        r="1.66667"
                                        transform="rotate(180 60.9993 30.6666)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="17.3333"
                                        cy="30.6666"
                                        r="1.66667"
                                        transform="rotate(180 17.3333 30.6666)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="60.9993"
                                        cy="1.66665"
                                        r="1.66667"
                                        transform="rotate(180 60.9993 1.66665)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="17.3333"
                                        cy="1.66665"
                                        r="1.66667"
                                        transform="rotate(180 17.3333 1.66665)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="46.3333"
                                        cy="132"
                                        r="1.66667"
                                        transform="rotate(180 46.3333 132)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="2.66536"
                                        cy="132"
                                        r="1.66667"
                                        transform="rotate(180 2.66536 132)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="46.3333"
                                        cy="117.333"
                                        r="1.66667"
                                        transform="rotate(180 46.3333 117.333)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="2.66536"
                                        cy="117.333"
                                        r="1.66667"
                                        transform="rotate(180 2.66536 117.333)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="46.3333"
                                        cy="102.667"
                                        r="1.66667"
                                        transform="rotate(180 46.3333 102.667)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="2.66536"
                                        cy="102.667"
                                        r="1.66667"
                                        transform="rotate(180 2.66536 102.667)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="46.3333"
                                        cy="88"
                                        r="1.66667"
                                        transform="rotate(180 46.3333 88)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="2.66536"
                                        cy="88"
                                        r="1.66667"
                                        transform="rotate(180 2.66536 88)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="46.3333"
                                        cy="73.3333"
                                        r="1.66667"
                                        transform="rotate(180 46.3333 73.3333)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="2.66536"
                                        cy="73.3333"
                                        r="1.66667"
                                        transform="rotate(180 2.66536 73.3333)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="46.3333"
                                        cy="45"
                                        r="1.66667"
                                        transform="rotate(180 46.3333 45)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="2.66536"
                                        cy="45"
                                        r="1.66667"
                                        transform="rotate(180 2.66536 45)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="46.3333"
                                        cy="16"
                                        r="1.66667"
                                        transform="rotate(180 46.3333 16)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="2.66536"
                                        cy="16"
                                        r="1.66667"
                                        transform="rotate(180 2.66536 16)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="46.3333"
                                        cy="59"
                                        r="1.66667"
                                        transform="rotate(180 46.3333 59)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="2.66536"
                                        cy="59"
                                        r="1.66667"
                                        transform="rotate(180 2.66536 59)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="46.3333"
                                        cy="30.6666"
                                        r="1.66667"
                                        transform="rotate(180 46.3333 30.6666)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="2.66536"
                                        cy="30.6666"
                                        r="1.66667"
                                        transform="rotate(180 2.66536 30.6666)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="46.3333"
                                        cy="1.66665"
                                        r="1.66667"
                                        transform="rotate(180 46.3333 1.66665)"
                                        fill="#13C296"
                                        />
                                        <circle
                                        cx="2.66536"
                                        cy="1.66665"
                                        r="1.66667"
                                        transform="rotate(180 2.66536 1.66665)"
                                        fill="#13C296"
                                        />
                                    </svg>
                                </span>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
          <footer class="bg-white md:flex md:items-center md:justify-between shadow rounded-lg p-4 md:p-6 xl:p-8 my-6 mx-4">
       
          </footer>
          <p class="text-center text-sm text-gray-500 my-10">
             &copy; 2024 <a href="#" class="hover:underline" target="_blank">LearnHub</a>. All rights reserved.
          </p>
       </div>
    </div>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://demo.Tutorial.com/windster/app.bundle.js"></script>
 </div>


</body>
</html>