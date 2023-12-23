<?php include_once("../../Constants.php"); ?> 
<?php include_once("../../Models/Section.php"); ?> 
<?php include_once("../../Models/Tutorail.php"); ?> 
<?php require_once("../../Config/Config.php"); ?> 
<?php require_once("../../Services/SectionService.php"); ?> 
<?php require_once("../../Services/TutorialService.php"); ?> 
<?php
  $sectionId = isset($_GET["SecId"]) ? intval($_GET["SecId"]) :0;
  
  $DataReady = false;
  if($sectionId !==null && $sectionId > 0){
    $sectionService = new SectionService($pdo);
    $section = $sectionService->getSectionById($sectionId);
    if($section===null){
      Header("location:/Views/Admin/Sections.php");
    }else{
      $service = new TutorialService($pdo);
      $tutorials = $service->getAllTutorials();
      $DataReady = true;
      }
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="../../Assets/img/favIcon.png" type="image/x-icon">
    <title>Tutorial | Dashbord</title>
    <script src="https://cdn.tiny.cloud/1/1nsjvij0ax0do9hxr8dls5xcprj83fplbppgs433utmmndp7/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
  <!-- component -->
  <div>
    <div class="flex h-screen overflow-y-hidden bg-white" x-data="setup()" x-init="$refs.loading.classList.add('hidden')">
      
        <div
          x-ref="loading"
          class="fixed inset-0 z-50 flex items-center justify-center text-white bg-black bg-opacity-50"
          style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"
        >
          Loading.....
        </div>

      
      <div
        x-show.in.out.opacity="isSidebarOpen"
        class="fixed inset-0 z-10 bg-black bg-opacity-20 lg:hidden"
        style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"
      ></div>

      <!-- Sidebar -->
      <?php include("./layouts/sidebar.php"); ?>

      <div class="flex flex-col flex-1 h-full overflow-hidden">
        <!-- Navbar -->
        <header class="flex-shrink-0 border-b">
          <div class="flex items-center justify-between p-2">
            
          <div class="flex items-center space-x-3">
              <span class="p-2 text-xl font-semibold tracking-wider uppercase lg:hidden">K-WD</span>
              <!-- Toggle sidebar button -->
              <button @click="toggleSidbarMenu()" class="p-2 rounded-md focus:outline-none focus:ring">
                <svg
                  class="w-4 h-4 text-gray-600"
                  :class="{'transform transition-transform -rotate-180': isSidebarOpen}"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                </svg>
              </button>
            </div>
            
            <div
              x-show.transition="isSearchBoxOpen"
              class="fixed inset-0 z-10 bg-black bg-opacity-20"
              style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"
            >
              <div
                @click.away="isSearchBoxOpen = false"
                class="absolute inset-x-0 flex items-center justify-between p-2 bg-white shadow-md"
              >
                <div class="flex items-center flex-1 px-2 space-x-2">
                  <!-- search icon -->
                  <span>
                    <svg
                      class="w-6 h-6 text-gray-500"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                      />
                    </svg>
                  </span>
                  <input
                    type="text"
                    placeholder="Search"
                    class="w-full px-4 py-3 text-gray-600 rounded-md focus:bg-gray-100 focus:outline-none"
                  />
                </div>
                <!-- close button -->
                <button @click="isSearchBoxOpen = false" class="flex-shrink-0 p-4 rounded-md">
                  <svg
                    class="w-4 h-4 text-gray-500"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>
              </div>
            </div>

            <!-- Desktop search box -->
            <div class="items-center hidden px-2 space-x-2 md:flex-1 md:flex md:mr-auto md:ml-5">
              <!-- search icon -->
              <span>
                <svg
                  class="w-5 h-5 text-gray-500"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                  />
                </svg>
              </span>
              <input
                type="text"
                placeholder="Search"
                class="px-4 py-3 rounded-md hover:bg-gray-100 lg:max-w-sm md:py-2 md:flex-1 focus:outline-none md:focus:bg-gray-100 md:focus:shadow md:focus:border"
              />
            </div>

            <!-- Navbar right -->
            <div class="relative flex items-center space-x-3">
              <!-- Search button -->
              <button
                @click="isSearchBoxOpen = true"
                class="p-2 bg-gray-100 rounded-full md:hidden focus:outline-none focus:ring hover:bg-gray-200"
              >
                <svg
                  class="w-6 h-6 text-gray-500"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                  />
                </svg>
              </button>


              <!-- avatar button -->
              <div class="relative" x-data="{ isOpen: false }">
                <button @click="isOpen = !isOpen" class="p-1 bg-gray-200 rounded-full focus:outline-none focus:ring">
                  <img
                    class="object-cover w-8 h-8 rounded-full"
                    src="https://avatars0.githubusercontent.com/u/57622665?s=460&u=8f581f4c4acd4c18c33a87b3e6476112325e8b38&v=4"
                    alt="Ahmed Kamel"
                  />
                </button>
                <div class="absolute right-0 p-1 bg-green-400 border border-white rounded-full bottom-3"></div>

                <!-- Dropdown card -->
                <div
                  @click.away="isOpen = false"
                  x-show.transition.opacity="isOpen"
                  class="absolute mt-3 transform -translate-x-full bg-white rounded-md shadow-lg min-w-max z-10"
                >
                  <div class="flex flex-col p-4 space-y-1 font-medium border-b">
                    <span class="text-gray-800">Ahmed Kamel</span>
                    <span class="text-sm text-gray-400">ahmed.kamel@example.com</span>
                  </div>
                  <ul class="flex flex-col p-2 my-2 space-y-1">
                    <li>
                      <a href="#" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Link</a>
                    </li>
                    <li>
                      <a href="#" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Another Link</a>
                    </li>
                  </ul>
                  <div class="flex items-center justify-center p-4 text-blue-700 underline border-t">
                    <a href="#">Logout</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </header>
        <!-- Main content -->
        <main class="flex-1 max-h-full p-5 overflow-hidden overflow-y-scroll">
          <!-- Main content header -->
          <div
            class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row"
          >
            <h1 class="text-2xl font-semibold whitespace-nowrap text-gray-500">Edit Section</h1>
          </div>
            <section class="bg-white pb-20 lg:pb-[120px] overflow-hidden relative z-10">
                <div class="container">
                    <div class="flex flex-wrap lg:justify-between -mx-4">
                        <div class="w-full  px-4 pt-12">
                            <div class="bg-white relative rounded-lg p-8 sm:p-12 shadow-lg">
                                <?php 
                                
                                if(isset($_POST["submit"])){
                                    $TutorialService = new SectionService($pdo);
                                    $result = false;                                    
                                    $result = $TutorialService->UpdateSection($sectionId,$_POST["Title"],$_POST["Description"],$_POST["Content"],$_POST["TutorialId"]);                                    
                                    
                                    if($result){
                                        echo "<script>window.alert('Craeted Successfuly')</script>";
                                    }else{
                                      echo "<script>window.alert('Error : Something wrong happen')</script>";
                                    }
                                  }
                                  
                                 ?>
                            <form method="post">
                              <div class="flex">
                                <div class="mb-6 lg:w-1/2 xl:w-5/12">
                                    <input
                                        type="text"
                                        placeholder="Title"
                                        name="Title"
                                        value=<?php echo $section->Title ?>
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
                                      <div class="mb-6  lg:w-1/2 xl:w-5/12 xl:ml-16">
                                          <select
                                              type="text"
                                              name="TutorialId"
                                              placeholder="Dscription or small resume"
                                              class="w-full rounded py-3 px-[14px] text-body-color text-base border border-[f0f0f0] outline-none focus-visible:shadow-none focus:border-primary">
      
                                              <?php foreach($tutorials as $tuto) {?>
                                                  <option <?php if($tuto->getId()===$section->TutorialId){echo "selected";} ?>  value="<?php echo $tuto->getId() ?>"><?php echo $tuto->getTitle() ?></option>
                                                <?php } ?>
                                            </select>
                                      </div>
                                    </div>
                                <div class="mb-6">
                                    <input
                                        type="text"
                                        name="Description"
                                        value=<?php echo $section->Description ?> 
                                        placeholder="Dscription or small resume"
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
                                        id="editor"
                                        name="Content"
                                        value=<?php echo $section->Content ?>
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
        <!-- Main footer -->
        <footer class="flex items-center justify-between flex-shrink-0 p-4 border-t max-h-14">
          <div>T-utorials &copy; 2020</div>
          <div class="text-sm">
            Made by
            <a
              class="text-blue-400 underline"
              href="https://hamza-mouddakir.tech"
              target="_blank"
              rel="noopener noreferrer"
              >Hamza mouddakir</a
            >
          </div>
          <div>
            <!-- Github svg -->
            <a
              href="https://github.com/microappstech"
              target="_blank"
              class="flex items-center space-x-1"
            >
              <svg class="w-6 h-6 text-gray-400" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
                <path
                  fill-rule="evenodd"
                  d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"
                ></path>
              </svg>
              <span class="hidden text-sm md:block">View on Github</span>
            </a>
          </div>
        </footer>
      </div>
      <div
        x-show="isSettingsPanelOpen"
        @click.away="isSettingsPanelOpen = false"
        x-transition:enter="transition transform duration-300"
        x-transition:enter-start="translate-x-full opacity-30  ease-in"
        x-transition:enter-end="translate-x-0 opacity-100 ease-out"
        x-transition:leave="transition transform duration-300"
        x-transition:leave-start="translate-x-0 opacity-100 ease-out"
        x-transition:leave-end="translate-x-full opacity-0 ease-in"
        class="fixed inset-y-0 right-0 flex flex-col bg-white shadow-lg bg-opacity-20 w-80"
        style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"
      >
        <div class="flex items-center justify-between flex-shrink-0 p-2">
          <h6 class="p-2 text-lg">Settings</h6>
          <button @click="isSettingsPanelOpen = false" class="p-2 rounded-md focus:outline-none focus:ring">
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
        <div class="flex-1 max-h-full p-4 overflow-hidden hover:overflow-y-scroll">
          <span>Settings Content</span>
          <!-- Settings Panel Content ... -->
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
    <script>
      const setup = () => {
        return {
          loading: true,
          isSidebarOpen: false,
          toggleSidbarMenu() {
            this.isSidebarOpen = !this.isSidebarOpen
          },
          isSettingsPanelOpen: false,
          isSearchBoxOpen: false,
        }
      }
      tinymce.init({
    selector: '#editor',
    plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
    menubar: 'file edit view insert format tools table help',
    toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
    toolbar_sticky: true,
    autosave_ask_before_unload: true,
    autosave_interval: '30s',
    autosave_prefix: '{path}{query}-{id}-',
    autosave_restore_when_empty: false,
    autosave_retention: '2m',
    image_advtab: true,
    link_list: [
      { title: 'My page 1', value: 'https://www.codexworld.com' },
      { title: 'My page 2', value: 'http://www.codexqa.com' }
    ],
    image_list: [
      { title: 'My page 1', value: 'https://www.codexworld.com' },
      { title: 'My page 2', value: 'http://www.codexqa.com' }
    ],
    image_class_list: [
      { title: 'None', value: '' },
      { title: 'Some class', value: 'class-name' }
    ],
    importcss_append: true,
    file_picker_callback: (callback, value, meta) => {
      /* Provide file and text for the link dialog */
      if (meta.filetype === 'file') {
        callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
      }
  
      /* Provide image and alt text for the image dialog */
      if (meta.filetype === 'image') {
        callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
      }
  
      /* Provide alternative source and posted for the media dialog */
      if (meta.filetype === 'media') {
        callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
      }
    },
    templates: [
      { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
      { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
      { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
    ],
    template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
    template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
    height: 400,
    image_caption: true,
    quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
    noneditable_class: 'mceNonEditable',
    toolbar_mode: 'sliding',
    contextmenu: 'link image table',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
});
      </script>
</div>
</body>
</html>