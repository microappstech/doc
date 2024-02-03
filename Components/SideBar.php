<aside id="sidebar" class="fixed z-20 h-full top-0 left-0 pt-16 flex lg:flex flex-shrink-0 flex-col w-64 transition-width duration-75 hidden" aria-label="Sidebar">
          <div class="relative flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white pt-0">
             <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
                <div class="flex-1 px-3 bg-white divide-y space-y-1" id="sidesection">
                   <ul class="space-y-2 pb-2">
                      <li>
                         <form action="#" method="GET" class="hidden">
                            <label for="mobile-search" class="sr-only">Search</label>
                            <div class="relative">
                               <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                  
                               </div>
                               <input type="text" name="email" id="mobile-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-600 focus:ring-cyan-600 block w-full pl-10 p-2.5" placeholder="Search">
                            </div>
                         </form>
                         <a href="/" class="d-flex align-items-center flex-shrink-0 p-3 link-dark text-decoration-none border-bottom">
                            <img class="w-16" src="<?php echo $Tutorial->getImage() ?>">
                         </a>
                      </li>
                      

                      
                           <?php if ($DataReady) {
                              foreach ($sections as $section) {
                                    ?>
                                    <li>
                                          <a  href="#" onclick="loadContent(<?php echo $section->Id ?>, <?php echo $tutorialId ?>, this)" class="text-base text-gray-900 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 group">
                                          <img class="w-5" src="<?php echo $Tutorial->getImage() ?>">
                                             <span class="ml-3"><?php echo $section->Title ?></span>
                                          </a>
                                    </li>
                                    <?php
                                    }
                                 }
                                 ?>
                   </ul>
                   <div class="space-y-2 pt-2">
                   
                   
                      <!-- <a href="/soumwej/pages/admin/Facturer2.php" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group transition duration-75 flex items-center p-2">
                         <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                         </svg>
                         <span class="ml-3">Factuer</span>
                      </a> -->
                   </div>
                </div>
             </div>
          </div>
       </aside>