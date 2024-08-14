<?php session_start(); ?>
<?php

  include_once("../../Constants.php");
  include_once("../../Config/Config.php");
  include_once("../../Services/SectionService.php");
  include_once("../../Models/Section.php");
  include_once("../../Models/Tutorail.php");
  include_once('../../Services/TutorialService.php');
  include_once('../../Functions/IsLLogged.php');
  include_once("../../Functions/IsAdmin.php");
 
 ?>
<?php
  $tt = new SectionService($pdo);
  $tutoServ = new TutorialService($pdo);
    
  if(isAdmin($pdo)){     
    $sections = $tt->getAllSections();
    $Tutorials = $tutoServ->getAllTutorials();
  }
  else if(!(isAdmin($pdo)) & isset($_SESSION["userid"])) 
  {
    $sections = $tt->getAllSections();
    $userid = $_SESSION["userid"];
    $Tutorials = $tutoServ->getTutorialsForUser($userid);
  }
  else{
    Header("Location : /Views/Auth/login.php");
  }
  
  
  if(isset($_POST["delete"])){
    $result = $tt->deleteSection($_POST["sectionToDelete"]);
    if($result){
      echo("<script>window.alert(' Successfully Deleted')</script>");
    }
  }

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/soumwej/assets/images/logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="../../Assets/img/favIcon.png" type="image/x-icon">
    <title> <?php echo defined("PROJECT_NAME") ? PROJECT_NAME :  "LearnHub"; ?> | Sections</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.4/dist/flowbite.min.css" />
</head>
<body>

   
<div>
   <?php  include("../../Includes/NavBar.php") ?>
    <div class="flex overflow-hidden bg-white pt-16">
       <?php  include("../../Includes/SideBar.php") ?>
       <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>
       <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
          <main>
             <div class="pt-6 px-4">
             <div
            class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row"
          >
            <h1 class="text-2xl font-semibold whitespace-nowrap">Sections</h1>
            <div class="form-control px-5 w-full">
              <div class="max-w-2xl mx-auto ">
                  <select id="tutorials" onchange="TuroialChanged" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option selected>Choose a tutorial</option>
                    <?php foreach($Tutorials as $tuto) { ?>    
                      <option value="<?php echo $tuto->getId() ?>"><?php echo $tuto->getTitle() ?></option>
                    <?php } ?>
                  </select>
                
              </div>
            </div>
            <div class="px-5 md:w-60">
              <a
              href="<?php echo "/Views/Admin/AddSection.php" ?>"
              class="inline-flex items-center justify-center px-4 py-2 space-x-1 bg-blue-800 rounded-md shadow hover:bg-opacity-20"
            >
              <span>
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256"><g fill="none" stroke="#aeb4be" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"><circle cx="128" cy="128" r="112"/><path d="M 79.999992,128 H 176.0001"/><path d="m 128.00004,79.99995 v 96.0001"/></g></svg>
              </span>
              <span class="text-white hidden sm:block ">Add Section</span>
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
                        <!-- <th
                          scope="col"
                          class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                        >
                          Description
                        </th> -->
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
                      
                      <?php foreach ($sections as $section) { ?>
                            <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                              <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                  <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900"><?php echo $section->Title ?></div>
                                    <div class="text-sm text-gray-500"><?php echo $section->Title ?></div>
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
                              <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap"><?php echo $section->Id ?></td>
                              
                              <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                <a href="/Views/Admin/EditSection.php?SecId=<?php echo $section->Id ?>" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <form  method="post">
                                  <input name="sectionToDelete" value="<?php echo $section->Id ?>" class="hidden"/>
                                  <button type="delete" 
                                        name="delete" class="text-red-600">Delete</button>
                                      </form>
                                
                              </td>
                              <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
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
 </div>

<script>
  document.getElementById('tutorials').addEventListener('change', function() {
      var selectedTutorialId = this.value;     
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
          if (xhr.readyState === XMLHttpRequest.DONE) {
              if (xhr.status === 200) {
                  console.log(" xhr.responseText");
                  var sections = (xhr.responseText);

                  // Send the data back to the server with another XMLHttpRequest
                   var xhr2 = new XMLHttpRequest();
                   xhr2.open('POST',"/Views/Admin/Sections.php",  true);
                   xhr2.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                   xhr2.onload = function(){
                    if(xhr2.status === 200){
                      
                      
                    }else{
                      console.error('Request failed: ' + xhr2.status);
                    }
                   }
                   xhr2.send('sections=' + encodeURIComponent(JSON.stringify(sections)));

              } else {
                  console.error('Request failed: ' + xhr.status);
              }
          }
      };
      xhr.open('GET', '/Tutorial/Functions/LoadSectionOfTuto.php?TutoId=' + selectedTutorialId, true);
      xhr.send();
  });
</script>
</body>
</html>