



<aside
        x-transition:enter="transition transform duration-300"
        x-transition:enter-start="-translate-x-full opacity-30  ease-in"
        x-transition:enter-end="translate-x-0 opacity-100 ease-out"
        x-transition:leave="transition transform duration-300"
        x-transition:leave-start="translate-x-0 opacity-100 ease-out"
        x-transition:leave-end="-translate-x-full opacity-0 ease-in"
        class="fixed inset-y-0 z-10 flex flex-col flex-shrink-0 w-64 max-h-screen overflow-hidden transition-all transform bg-white border-r shadow-lg lg:z-auto lg:static lg:shadow-none"
        :class="{'-translate-x-full lg:translate-x-0 lg:w-20': !isSidebarOpen}"
      >
        <!-- sidebar header -->
        <div class="flex items-center justify-between flex-shrink-0 p-2" :class="{'lg:justify-center': !isSidebarOpen}">
          <span class="p-2 text-xl font-semibold leading-8 tracking-wider uppercase whitespace-nowrap">
            K<span :class="{'lg:hidden': !isSidebarOpen}">-WD</span>
          </span>
          <button @click="toggleSidbarMenu()" class="p-2 rounded-md lg:hidden">
            <svg
              class="w-6 h-6 text-gray-600"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <!-- Sidebar links -->
        <nav class="flex-1 overflow-hidden hover:overflow-y-auto">
          <ul class="p-2 overflow-hidden">
            <li>
              <a
                href="<?php echo("/Tutorial/Views/Admin/"); ?>"
                class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
                :class="{'justify-center': !isSidebarOpen}"
              >
              
              
                <span>
                  <svg
                    class="w-6 h-6 text-gray-400"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                    />
                  </svg>
                </span>
                <span :class="{ 'lg:hidden': !isSidebarOpen }">Dashboard</span>
              </a>
            </li>
            <li>
              <a
                href="<?php echo "/Tutorial/Views/Admin/Tutorials.php" ?>" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100" :class="{'justify-center': !isSidebarOpen}">
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="#aeb4be" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"/></svg>                </span>
                <span :class="{ 'lg:hidden': !isSidebarOpen }">Tutorials</span>
              </a>
            </li>
            
            <li>
              <a
                href="<?php echo "/Tutorial/Views/Admin/Sections.php" ?>" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100" :class="{'justify-center': !isSidebarOpen}">
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g transform="rotate(-90 12 12)"><path fill="#aeb4be" d="M2 21c0 .6.4 1 1 1h5V10H2zm14 1h5c.6 0 1-.4 1-1V10h-6zm-6 0h4V10h-4zM21 2H3c-.6 0-1 .4-1 1v5h20V3c0-.6-.4-1-1-1"/></g></svg>
                </span>
                <span :class="{ 'lg:hidden': !isSidebarOpen }">Sections</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- Sidebar footer -->
        <div class="flex-shrink-0 p-2 border-t max-h-14">
          <button
            class="flex items-center justify-center w-full px-4 py-2 space-x-1 font-medium tracking-wider uppercase bg-gray-100 border rounded-md focus:outline-none focus:ring"
          >
            <span>
              <svg
                class="w-6 h-6"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                />
              </svg>
            </span>
            <span :class="{'lg:hidden': !isSidebarOpen}"> Logout </span>
          </button>
        </div>
      </aside>