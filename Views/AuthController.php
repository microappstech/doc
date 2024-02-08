
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/soumwej/assets/images/logo.png" type="image/x-icon">
    <title>Soumwej</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <style>

* {
     margin: 0;
     padding: 0;
     box-sizing: border-box;
   }
    body {
      font-family: 'IBM Plex Mono', sans-serif;
    }
    [x-cloak] {
      display: none;
    }

    .line {
      background: repeating-linear-gradient(
        to bottom,
        #eee,
        #eee 1px,
        #fff 1px,
        #fff 8%
      );
    }
    .tick {
      background: repeating-linear-gradient(
        to right,
        #eee,
        #eee 1px,
        #fff 1px,
        #fff 5%
      );
    }
    
   body {
     font-family: "Inter", sans-serif;
   }
   .formbold-mb-5 {
     margin-bottom: 20px;
   }
   .formbold-pt-3 {
     padding-top: 12px;
   }
   .formbold-main-wrapper {
     display: flex;
     align-items: center;
     justify-content: center;
     padding: 48px;
   }
 
   .formbold-form-wrapper {
     margin: 0 auto;
     max-width: 550px;
     width: 100%;
     background: white;
   }
   .formbold-form-label {
     display: block;
     font-weight: 500;
     font-size: 16px;
     color: #07074d;
     margin-bottom: 12px;
   }
   .formbold-form-label-2 {
     font-weight: 600;
     font-size: 20px;
     margin-bottom: 20px;
   }
 
   .formbold-form-input {
     width: 100%;
     padding: 12px 24px;
     border-radius: 6px;
     border: 1px solid #e0e0e0;
     background: white;
     font-weight: 500;
     font-size: 16px;
     color: #6b7280;
     outline: none;
     resize: none;
   }
   .formbold-form-input:focus {
     border-color: #6a64f1;
     box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
   }
 
   .formbold-btn {
     text-align: center;
     font-size: 16px;
     border-radius: 6px;
     padding: 14px 32px;
     border: none;
     font-weight: 600;
     background-color: #6a64f1;
     color: white;
     cursor: pointer;
   }
   .formbold-btn:hover {
     box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
   }
 
   .formbold--mx-3 {
     margin-left: -12px;
     margin-right: -12px;
   }
   .formbold-px-3 {
     padding-left: 12px;
     padding-right: 12px;
   }
   .flex {
     display: flex;
   }
   .flex-wrap {
     flex-wrap: wrap;
   }
   .w-full {
     width: 100%;
   }
   .formbold-radio {
     width: 20px;
     height: 20px;
   }
   .formbold-radio-label {
     font-weight: 500;
     font-size: 16px;
     padding-left: 12px;
     color: #070707;
     padding-right: 20px;
   }
   @media (min-width: 540px) {
     .sm\:w-half {
       width: 50%;
     }
   }
 </style>
</head>
<body>

   
<div>
   <?php require("../Includes/NavBar.php") ?>
    <div class="flex overflow-hidden bg-white pt-16">
       <?php require("../Includes/SideBar.php") ?>
       <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>
       <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
          <main>
             <div class="pt-6 px-4">
                
                <div class=" my-4">
                   <div class="bg-white shadow rounded-lg mb-4 p-2 sm:p-6 h-full">
                      <div class="flex items-center justify-between mb-4">
                         <h3 class="text-xl font-bold leading-none text-gray-900"> Liste de categories </h3>
                         
                        <a href="/soumwej/pages/admin/CreateCategorie.php" class="sm:inline-flex ml-5 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center items-center mr-3">
                           <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="white" fill-rule="evenodd" clip-rule="evenodd"><path d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12m10-8a8 8 0 1 0 0 16a8 8 0 0 0 0-16"/><path d="M13 7a1 1 0 1 0-2 0v4H7a1 1 0 1 0 0 2h4v4a1 1 0 1 0 2 0v-4h4a1 1 0 1 0 0-2h-4z"/></g></svg>
                           <span class="px-1 hidden sm:block">Ajouter Categories</span>
                        </a>
                      </div>
                      <!-- component -->
                     <div class="flex flex-wrap -mx-3 mb-5">
                     <div class="w-full max-w-full px-3 mb-6  mx-auto">
                        <div class="relative flex-[1_auto] flex flex-col break-words min-w-0 bg-clip-border rounded-[.95rem] bg-white sm:m-5">
                           <div class="relative flex flex-col min-w-0 break-words border border-dashed bg-clip-border rounded-2xl border-stone-200 bg-light/30">
                           
                           <!-- component -->
                                    <div class="overflow-scroll rounded-lg border border-gray-200 shadow-md sm:m-5">
                                    <table class="w-full border-collapse bg-white text-left text-md text-gray-500">
                                       <thead class="bg-gray-50">
                                          <tr>
                                          <th scope="col" class="px-6 py-4 font-medium text-gray-900">Name</th>
                                          <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                                          </tr>
                                       </thead>
                                       <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                                        
                                       
                                       </tbody>
                                    </table>
                                    </div>
                          
                           </div>
                        </div>
                     </div>
                     </div>
                   </div>
                </div>
             </div>
          </main>
          
          <p class="text-center text-sm text-gray-500 my-10">
             &copy; 2024 <a href="#" class="hover:underline" target="_blank">soumwej</a>. Tous droits réservés.
          </p>
       </div>
    </div>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://demo.themesberg.com/windster/app.bundle.js"></script>
 </div>

</body>
</html>