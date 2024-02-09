<?php session_start() ?> 


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/soumwej/assets/images/logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="../../../Assets/img/favIcon.png" type="image/x-icon">
    <title>Tutorial | Dashbord</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
   <?php  include("../../../Includes/NavBar.php") ?>
    <div class="flex overflow-hidden bg-white pt-16">
       <?php  include("../../../Includes/SideBar.php") ?>
       <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>
       <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
       <main class="flex-1 max-h-full p-5 overflow-hidden overflow-y-scroll">
          <!-- Main content header -->
          <div class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row">
            <h1 class="text-2xl font-semibold whitespace-nowrap text-gray-500">Add Quiz</h1>
          </div>
            <section class="bg-white pb-20 lg:pb-[120px] overflow-hidden relative z-10">
                <div class="container mx-auto">
                    <div class=" mx-6 my-5">
                        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 mx-auto   ">
                           <form action="">
                            <div class="-mx-3 md:flex mb-6">
                                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-first-name">
                                            Quiz Name
                                        </label>
                                        <input name="quizname" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="text" placeholder="Name">
                                    </div>
                                    <div class="md:w-1/2 px-3">
                                        <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-last-name">
                                            Quiz Description
                                        </label>
                                        <input name="quizdescription" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-last-name" type="text" placeholder="Description">
                                    </div>
                                </div>
                                <div class="question p-5  border border-4 border-top border-yellow-600">
                                    <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-first-name">
                                        Question 1
                                    </label>
                                    <div class="border border-1 border-gray-200 mx-6 p-6 rounded-lg">
                                        <div class="-mx-3 md:flex mb-6">
                                            <div class="md:w-full px-3">
                                                <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-password">
                                                    Description
                                                </label>
                                                <input name="questionone" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" id="grid-password" type="text" placeholder="description de votre question" >                                        
                                            </div>
                                        </div>
                                        <div class="-mx-3 mb-2 px-4">
                                            <div class="flex row">
                                                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                                    <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-first-name">
                                                        Answer 1 :
                                                    </label>
                                                    <input name="answer1q1" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="text" placeholder="the 1rt answer">
                                                </div>
                                                <div class="md:w-1/2 px-3">
                                                    <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-last-name">
                                                        Answer 2 :
                                                    </label>
                                                    <input name="answer2q1" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-last-name" type="text" placeholder="the 2nd answer">
                                                </div>
                                            </div>
                                            <div class="flex row">
                                                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                                    <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-first-name">
                                                        Answer 3 :
                                                    </label>
                                                    <input name="answer3q1" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="text" placeholder="the 3rd answer">
                                                </div>
                                                <div class="md:w-1/2 px-3">
                                                    <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-last-name">
                                                        Answer 4 :
                                                    </label>
                                                    <input name="answer4q1" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-last-name" type="text" placeholder="the 4th answer">
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="question p-5  border border-4 border-top border-yellow-600">
                                    <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-first-name">
                                        Question 2
                                    </label>
                                    <div class="border border-1 border-gray-200 mx-6 p-6 rounded-lg">
                                        <div class="-mx-3 md:flex mb-6">
                                            <div class="md:w-full px-3">
                                                <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-password">
                                                    Description
                                                </label>
                                                <input name="question2" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" id="grid-password" type="text" placeholder="description de votre question" >                                        
                                            </div>
                                        </div>
                                        <div class="-mx-3 mb-2 px-4">
                                            <div class="flex row">
                                                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                                    <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-first-name">
                                                        Answer 1 :
                                                    </label>
                                                    <input name="answer1q2" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="text" placeholder="the 1rt answer">
                                                </div>
                                                <div class="md:w-1/2 px-3">
                                                    <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-last-name">
                                                        Answer 2 :
                                                    </label>
                                                    <input name="answer2q2" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-last-name" type="text" placeholder="the 2nd answer">
                                                </div>
                                            </div>
                                            <div class="flex row">
                                                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                                    <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-first-name">
                                                        Answer 3 :
                                                    </label>
                                                    <input name="answer3q2" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="text" placeholder="the 3rd answer">
                                                </div>
                                                <div class="md:w-1/2 px-3">
                                                    <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-last-name">
                                                        Answer 4 :
                                                    </label>
                                                    <input name="answer4q2" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-last-name" type="text" placeholder="the 4th answer">
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="question p-5  border border-4 border-top border-yellow-600">
                                    <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-first-name">
                                        Question 3
                                    </label>
                                    <div class="border border-1 border-gray-200 mx-6 p-6 rounded-lg">
                                        <div class="-mx-3 md:flex mb-6">
                                            <div class="md:w-full px-3">
                                                <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-password">
                                                    Description
                                                </label>
                                                <input name="question3" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" id="grid-password" type="text" placeholder="description de votre question" >                                        
                                            </div>
                                        </div>
                                        <div class="-mx-3 mb-2 px-4">
                                            <div class="flex row">
                                                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                                    <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-first-name">
                                                        Answer 1 :
                                                    </label>
                                                    <input name="answer1q3" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="text" placeholder="the 1rt answer">
                                                </div>
                                                <div class="md:w-1/2 px-3">
                                                    <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-last-name">
                                                        Answer 2 :
                                                    </label>
                                                    <input name="answer2q3" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-last-name" type="text" placeholder="the 2nd answer">
                                                </div>
                                            </div>
                                            <div class="flex row">
                                                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                                    <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-first-name">
                                                        Answer 3 :
                                                    </label>
                                                    <input name="answer3q3" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="text" placeholder="the 3rd answer">
                                                </div>
                                                <div class="md:w-1/2 px-3">
                                                    <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-last-name">
                                                        Answer 4 :
                                                    </label>
                                                    <input name="answer4q3" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-last-name" type="text" placeholder="the 4th answer">
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="question p-5  border border-4 border-top border-yellow-600">
                                    <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-first-name">
                                        Question 4
                                    </label>
                                    <div class="border border-1 border-gray-200 mx-6 p-6 rounded-lg">
                                        <div class="-mx-3 md:flex mb-6">
                                            <div class="md:w-full px-3">
                                                <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-password">
                                                    Description
                                                </label>
                                                <input name="question4" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" id="grid-password" type="text" placeholder="description de votre question" >                                        
                                            </div>
                                        </div>
                                        <div class="-mx-3 mb-2 px-4">
                                            <div class="flex row">
                                                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                                    <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-first-name">
                                                        Answer 1 :
                                                    </label>
                                                    <input name="answer1q4" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="text" placeholder="the 1rt answer">
                                                </div>
                                                <div class="md:w-1/2 px-3">
                                                    <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-last-name">
                                                        Answer 2 :
                                                    </label>
                                                    <input name="answer2q4" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-last-name" type="text" placeholder="the 2nd answer">
                                                </div>
                                            </div>
                                            <div class="flex row">
                                                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                                    <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-first-name">
                                                        Answer 3 :
                                                    </label>
                                                    <input name="answer3q4" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="text" placeholder="the 3rd answer">
                                                </div>
                                                <div class="md:w-1/2 px-3">
                                                    <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-last-name">
                                                        Answer 4 :
                                                    </label>
                                                    <input name="answer4q4" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-last-name" type="text" placeholder="the 4th answer">
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="but my-10 text-center ">
                                    <button class="btn btn-primary px-20 w-full text-white py-2 hover:bg-orange-500 bg-yellow-700 duration-5 rounded-lg">Save</button>
                                </div>
                           </form>



                        </div>


                    </div>
                    
                </div>
            </section>
        </main>
        
       </div>
    </div>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://demo.Tutorial.com/windster/app.bundle.js"></script>
 


</body>
</html>