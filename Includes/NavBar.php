<nav class="bg-white border-b border-gray-200 w-full " style="position: absolute; z-index:60;">
       <div class="px-3 py-3 lg:px-5 lg:pl-3">
          <div class="flex items-center justify-between">
             <div class="flex items-center justify-start">
                <button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar" class="lg:hidden mr-2 text-gray-600 hover:text-gray-900 cursor-pointer p-2 hover:bg-gray-100 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100 rounded">
                   <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                   </svg>
                   <svg id="toggleSidebarMobileClose" class="w-6 h-6 hidden" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                   </svg>
                </button>
                  <a href="/Tutorial" class="text-xl font-bold flex items-center lg:ml-2.5">
                     <img src="/Tutorial/Assets/img/logo.png" class="h-6 mr-2" alt="Windster Logo">
                     <span class="self-center whitespace-nowrap">Tutorial</span>
                  </a>
             </div>
             
             <?php if(isset($_SESSION["logged"])){  ?>
               <a class="px-6 py-2 bg-orange-500 text-white rounded" href="/Tutorial/Views/logout.php">Disconnect</a>
               <?php }else{?>
                  <div class="flex">
                     <a class="px-6 py-2 text-orange-500 " href="/Tutorial/Views/Auth/login.php">Login</a>
                     <a class="px-6 py-2 text-orange-500 " href="/Tutorial/Views/Register.php">Sing Up</a>
                  </div>
             <?php } ?>
          </div>
       </div>
    </nav>