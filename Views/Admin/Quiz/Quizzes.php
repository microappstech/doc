<?php session_start() ?>
<?php 
  include_once("../../../Constants.php");
  include_once("../../../Config/Config.php");
  include_once("../../../Models/Quiz.php");
  include_once("../../../Services/QuizService.php");
  include_once("../../../Models/Question.php");
  include_once("../../../Functions/IsAdmin.php");
 ?>

<?php
  $qs = new QuizService($pdo);
  if(isAdmin($pdo)){
    $quizzes = $qs->getAllQuizzes();

  }
  else if(!isAdmin($pdo) & isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
    $quizzes = $qs->getAllQuizzesForUser($userid);
  }else{
    Header("Location: /Views/Auth/Login.php");
  }
// echo $_SESSION["userid"];
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../../Assets/img/favIcon.png" type="image/x-icon">
    <title>
    <?php echo defined("PROJECT_NAME") ? PROJECT_NAME :  "LearnHub"; ?> | Quizzes
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    

    
    

</head>
<body>

   
<div>
   <?php  include("../../../Includes/NavBar.php") ?>
    <div class="flex overflow-hidden bg-white pt-16">
       <?php  include("../../../Includes/SideBar.php") ?>
       <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>
       <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
          <main class="mx-5 my-5">
            <div class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row">
              <h1 class="text-2xl font-semibold whitespace-nowrap">Quizzes</h1>
              <div class="space-y-6 md:space-x-2 md:space-y-0">
                <a
                href="./AddQuiz.php"
                class="inline-flex items-center justify-center px-4 py-2 space-x-1 bg-blue-800 rounded-md shadow hover:bg-opacity-20"
              >
                <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256"><g fill="none" stroke="#aeb4be" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"><circle cx="128" cy="128" r="112"/><path d="M 79.999992,128 H 176.0001"/><path d="m 128.00004,79.99995 v 96.0001"/></g></svg>
                </span>
                <span class="text-white">Add Quiz</span>
              </a>
              </div>
            </div>
            <div class="flex flex-col mt-6">
              <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                  <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md">
                    <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                      <thead class="bg-gray-50">
                        <tr>
                          <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Title
                          </th>
                          <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase" >
                            Description
                          </th>
                          <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase" >
                            Viewrs
                          </th>                          
                          <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase" >
                            Writer
                          </th>
                          <th scope="col" class=" py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase" >
                            Manage
                          </th>
                        </tr>
                      </thead>
                      <tbody class="bg-white divide-y divide-gray-200">
                        <!-- <template x-for="i in 10" :key="i"> -->
                        <?php 
                            foreach ($quizzes as $quiz) { ?>
                              <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                                <td class="px-6 py-4 whitespace-nowrap">
                                  <div class="flex items-center">
                                    <img src="<?php echo $quiz->Image ?>" width="30" alt="">
                                    <div class="ml-4">
                                      <div class="text-sm text-gray-500"><?php echo $quiz->Name ?></div>
                                    </div>
                                  </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap"><?php echo $quiz->Description ?></td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap"><?php echo 0 ?></td>
                                
                                <td class="px-1 py-4 text-sm font-medium text-right whitespace-nowrap">
                                  <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                </td>
                                <td class="px-1 py-4 text-sm font-medium text-right whitespace-nowrap">
                                  <a href="#" class="text-indigo-600 hover:text-indigo-900">Delete</a>
                                </td>
                              </tr>
                          <?php } ?>
                        <!-- </template> -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/9000.0.1/prism.min.js" integrity="sha512-UOoJElONeUNzQbbKQbjldDf9MwOHqxNz49NNJJ1d90yp+X9edsHyJoAs6O4K19CZGaIdjI5ohK+O2y5lBTW6uQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 </div>

 
</body>
</html>