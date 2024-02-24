<nav class="bg-white border-b border-gray-200 w-full " style="position: fixed; z-index:60;">
   <div class="px-3 py-3 lg:px-5 lg:pl-3">
      <div class="flex items-center justify-between">
         <div class="flex items-center justify-start">
            
            <a href="/Tutorial" class="text-xl font-bold flex items-center lg:ml-2.5">
               <img src="/Tutorial/Assets/img/logo.png"  class="h-10 mr-2" alt="Windster Logo">
               <!-- <span class="self-center whitespace-nowrap">Tutorial</span> -->
            </a>
         </div>
         
         <?php if(isset($_SESSION["logged"])){  ?>
         <a class="px-6 py-2 bg-orange-500 text-white rounded" href="/Tutorial/Views/logout.php">Disconnect</a>
         <?php }else{?>
            <div class="flex">
               <a class="px-6 py-2 text-orange-500 " href="/Tutorial/Views/Auth/login.php">Login</a>
               <a class="px-6 py-2 text-orange-500 " href="/Tutorial/Views/Register.php">Sign Up</a>
            </div>
         <?php } ?>
      </div>
   </div>
</nav> 