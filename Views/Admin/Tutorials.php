<?php session_start() ?>
<?php 
  include_once("../../Constants.php");
  include_once("../../Config/Config.php");
  include_once("../../Services/TutorialService.php");
  include_once("../../Models/Tutorail.php");
  include_once("../../Functions/IsLLogged.php") ;
  include_once("../../Functions/IsAdmin.php")  ;

?>

<?php

  $tt = new TutorialService($pdo);
  if(isAdmin($pdo)){ 
    $tutorials = $tt->getAllTutorials();
  }
  else if(!(isAdmin($pdo)) & isset($_SESSION["userid"])) 
  {
    $userid = $_SESSION["userid"];
    $tutorials = $tt->getTutorialsForUser($userid);
  }
  else{
    Header("Location : /Tutorial/Views/Auth/login.php");
  }
  
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../Assets/img/favIcon.png" type="image/x-icon">
    <title>LearnHub | Dashbord</title>
    <script src="https://cdn.tailwindcss.com"></script>    
</head>
<body>

   
<div>
   <?php  include("../../Components/NavBar.php") ?>
    <div class="flex overflow-hidden bg-white pt-16">
       <?php  include("../../Includes/SideBar.php") ?>
       <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>
       <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
          <main class="mx-5 my-5">
            <div class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row">
              <h1 class="text-2xl font-semibold whitespace-nowrap">Tutorials</h1>
              <div class="space-y-6 md:space-x-2 md:space-y-0">
                <a
                href="./AddTutorial.php"
                target="_blank"
                class="inline-flex items-center justify-center px-4 py-2 space-x-1 bg-blue-800 rounded-md shadow hover:bg-opacity-20"
              >
                <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256"><g fill="none" stroke="#aeb4be" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"><circle cx="128" cy="128" r="112"/><path d="M 79.999992,128 H 176.0001"/><path d="m 128.00004,79.99995 v 96.0001"/></g></svg>
                </span>
                <span class="text-white">Add Tutorial</span>
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
                          <th
                            scope="col"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                          >
                            Title
                          </th>
                          <th
                            scope="col"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                          >
                            Complete
                          </th>
                          <th
                            scope="col"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                          >
                            Viewrs
                          </th>
                          
                          <th
                            scope="col"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                          >
                            Writer
                          </th>
                          <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                          </th>
                        </tr>
                      </thead>
                      <tbody class="bg-white divide-y divide-gray-200">
                        <!-- <template x-for="i in 10" :key="i"> -->
                        <?php 
                            foreach ($tutorials as $tutorial) { ?>
                              <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                                <td class="px-6 py-4 whitespace-nowrap">
                                  <div class="flex items-center">
                                    <div class="flex-shrink-0 w-10 h-10">
                                      <img
                                        class="w-10 h-10 rounded-full"
                                        src="<?php echo $tutorial->getImage() ?>"
                                        alt=""
                                      /> 
                                      
                                    </div>
                                    <div class="ml-4">
                                      <div class="text-sm font-medium text-gray-900"><?php $tutorial->getImage() ?></div>
                                      <div class="text-sm text-gray-500"><?php echo $tutorial->getTitle() ?></div>
                                    </div>
                                  </div>
                                </td>
                                <!-- <td class="px-6 py-4 whitespace-nowrap">
                                  <div class="text-sm text-gray-900">Regional Paradigm Technician</div>
                                  <div class="text-sm text-gray-500">Optimization</div>
                                </td> -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                  <span
                                    class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full"
                                  >
                                    False
                                  </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap"><?php echo rand(0,100) ?></td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap"><?php echo "Hamza" ?></td>
                                
                                <td width="10" class="px-4 py-4 text-sm font-medium text-right whitespace-nowrap ">
                                  <a href="#" class="text-indigo-600 pr-10 hover:text-indigo-900 hidden">EDIT</a>
                                  <a href="#" class="text-red-600 hover:text-red-900">DELETE</a>
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