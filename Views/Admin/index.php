<?php session_start() ?>
<?php 
   include_once("../../Constants.php");
   include_once("../../Config/Config.php");
   include_once("../../Constants.php");
   include_once('../../Services/Auth/SecurityService.php');
   include_once("../../Services/GeneralServices.php");
   include_once("../../Functions/IsLLogged.php") ?>

<?php  
   $secSer = new SecurityService($pdo);
   $GenService = new GeneralServices($pdo);
   $userRoles = $secSer->GetUserRole($_SESSION["userid"]);
   $roles = array_column($userRoles, 'Rolename');
   $IsAdmin = in_array('Admin', $roles);
   
   if($IsAdmin){
      $NbQuizzes = $GenService->getNbQuizzes();
      $NbTutorials = $GenService->getNbTutorials();
      $NbUsers = $GenService->getNbUsers();
   }else{
      $NbQuizzes = $GenService->getNbQuizzesByUser($_SESSION["userid"]);
      $NbTutorials = $GenService->getNbTutorialsByUserId($_SESSION["userid"]);
   }
   
   ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../Assets/img/favIcon.png" type="image/x-icon">
    <title>
      <?php echo defined("PROJECT_NAME") ? PROJECT_NAME :  "LearnHub"; ?>
   </title>
    
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  
</head>
<body>
   <?php  include("../../Includes/NavBar.php") ?>
    <div class="flex overflow-hidden bg-white pt-16">
       <?php  include("../../Includes/SideBar.php") ?>
       <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>
       <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
          <main>
             <div class="pt-6 px-4">
                
               <div class="mt-4 w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                   <?php if($IsAdmin){?>
                     <div class="bg-orange-300 shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                      <div class="flex items-center">
                         <div class="flex-shrink-0">
                            <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900"><?php echo $NbUsers["NbUsers"] ?></span>
                            <h3 class="text-base font-normal text-gray-900">Users Number</h3>
                         </div>
                        
                      </div>
                   </div> 
                   <?php } ?>
                   <div class="bg-purple-300 shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                      <div class="flex items-center">
                         <div class="flex-shrink-0">
                            <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900"><?php echo $NbTutorials["NbTutorials"] ?> </span>
                            <h3 class="text-base font-normal text-gray-900">Tutorials Number </h3>
                         </div>
                      </div>
                   </div>
                   <div class="bg-green-300 shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                      <div class="flex items-center">
                         <div class="flex-shrink-0">
                            <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900"><?php echo $NbQuizzes["NbQuizzes"] ?></span>
                            <h3 class="text-base font-normal text-gray-900">Quizzes Numbers</h3>
                         </div>
                  
                      </div>
                   </div>
                </div>
                <div class="grid grid-cols-1 2xl:grid-cols-2 xl:gap-4 my-4 hidden">
                   <div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
                      <!-- Charts -->
                      <div class="flow-root">
                      <div class="md:flex md:justify-between md:items-center">
                           <div>
                              <h2 class="text-xl text-gray-800 font-bold leading-tight">Statistique de commandes</h2>
                              <p class="mb-2 text-gray-600 text-sm">Par mois</p>
                           </div>

                           <!-- Legends -->
                           <div class="mb-4">
                              <div class="flex items-center">
                              <div class="w-2 h-2 bg-blue-600 mr-2 rounded-full"></div>
                              <div class="text-sm text-gray-700">commandes</div>
                              </div>
                           </div>
                        </div>
                        <div class="antialiased sans-serif w-lg ">
                           <div x-data="app()" x-cloak class="px-4">
                              <div class="max-w-lg mx-auto py-10">
                                 <div class="shadow p-6 rounded-lg bg-white">
                                 


                                 <div class="line my-8 relative">
                                    <!-- Tooltip -->
                                    <template x-if="tooltipOpen == true">
                                       <div x-ref="tooltipContainer" class="p-0 m-0 z-10 shadow-lg rounded-lg absolute h-auto block"
                                          :style="`bottom: ${tooltipY}px; left: ${tooltipX}px`"
                                          >
                                       <div class="shadow-xs rounded-lg bg-white p-2">
                                          <div class="flex items-center justify-between text-sm">
                                             <div>Sales:</div>
                                             <div class="font-bold ml-2">
                                             <span x-html="tooltipContent"></span>
                                             </div>
                                          </div>
                                       </div>
                                       </div>
                                    </template>

                                    <!-- Bar Chart -->
                                    <div class="flex -mx-2 items-end mb-2">
                                       <template x-for="data in chartData">

                                       <div class="px-2 w-1/6">
                                          <div :style="`height: ${10*data}px`" 
                                                class="transition ease-in duration-200 bg-blue-600 hover:bg-blue-400 relative"
                                                @mouseenter="showTooltip($event); tooltipOpen = true" 
                                                @mouseleave="hideTooltip($event)"
                                                >
                                             <div x-text="data" class="text-center absolute top-0 left-0 right-0 -mt-6 text-gray-800 text-sm"></div>
                                          </div>
                                       </div>

                                       </template>
                                    </div>

                                    <!-- Labels -->
                                    <div class="border-t border-gray-400 mx-auto" :style="`height: 1px; width: ${ 100 - 1/chartData.length*100 + 3}%`"></div>
                                    <div class="flex -mx-2 items-end">
                                       <template x-for="data in labels">
                                       <div class="px-2 w-1/6">
                                          <div class="bg-red-600 relative">
                                             <div class="text-center absolute top-0 left-0 right-0 h-2 -mt-px bg-gray-400 mx-auto" style="width: 1px"></div>
                                             <div x-text="data" class="text-center absolute top-0 left-0 right-0 mt-3 text-gray-700 text-sm"></div>
                                          </div>
                                       </div>
                                       </template>	
                                    </div>

                                 </div>
                                 </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                   </div>
                   <!-- Liste d'avancements -->
                     <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                      <h3 class="text-xl leading-none font-bold text-gray-900 mb-10">Liste des meilleurs clients </h3>
                        <div class="block w-full overflow-x-auto">
                           <table class="items-center w-full bg-transparent border-collapse">
                            <thead>
                               <tr>
                                  <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Client</th>
                                  <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Nombre de commandes</th>
                                  
                               </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                               <?php // foreach($ClientsCmds as $cliCmd ){ ?>
                                 <tr class="text-gray-500">
                                    <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?php echo "cliCmd[clientName]" ?></th>
                                    <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4"><?php echo "cliCmd['NbCmds]" ?></td>
                                 </tr>

                              <?php //} ?>
                               
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
    

    
    <script async="" defer="" src="https://buttons.github.io/buttons.js"></script>
    <script src="https://demo.themesberg.com/windster/app.bundle.js"></script>   

<script>
    function app() {
      return {
         chartData: [10,12],
         labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],

        tooltipContent: '',
        tooltipOpen: false,
        tooltipX: 0,
        tooltipY: 0,
        showTooltip(e) {
          console.log(e);
          this.tooltipContent = e.target.textContent
          this.tooltipX = e.target.offsetLeft - e.target.clientWidth;
          this.tooltipY = e.target.clientHeight + e.target.clientWidth;
        },
        hideTooltip(e) {
          this.tooltipContent = '';
          this.tooltipOpen = false;
          this.tooltipX = 0;
          this.tooltipY = 0;
        }
      }
    }
  </script>
</body>
</html>