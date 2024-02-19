<?php session_start() ?> 
<?php 
    include_once("../../../Config/Config.php");
    include_once("../../../Models/Question.php");
    include_once("../../../Models/Quiz.php");
    include_once("../../../Services/QuizService.php");
    
?>

<?php
    if(isset($_POST['saveQuiz'])){
        $data_uri ="";
        if (isset($_FILES['cover']) && $_FILES['cover']['error'] == UPLOAD_ERR_OK) {
            $img_data = file_get_contents($_FILES['cover']['tmp_name']);
            $base64_img = base64_encode($img_data);

            $mime_type = mime_content_type($_FILES['cover']['tmp_name']);
            $data_uri = 'data:' . $mime_type . ';base64,' . $base64_img;
        } 

        $userid = $_SESSION["userid"];
        $sq = new QuizService($pdo);
        $quizData = array("questions" => array());
        for ($i = 1; $i <= 4; $i++) {
            $questionKey = "question" . $i;
            $questionDesc = $_POST[$questionKey];
            $answers = array();
            for ($j = 1; $j <= 4; $j++) {
                $answerKey = "answer" . $j . "q" . $i;
                $answerContent = $_POST[$answerKey];
                $answerObject = new stdClass();
                $answerObject->content = $answerContent;
                $answerObject->description = "";
                $answerObject->isOk = 0;

                if ($_POST["CorrectAnswerq".$i] =="answer" . $j . "q" . $i) {
                    $answerObject->isOk = 1;
                }
                $answers["answer" . $j] = $answerObject;
                
            }
            $quizData["questions"][$questionKey] = array("description" => $questionDesc, "answers" => $answers);
        }
        $pdo->beginTransaction();
        $result = $sq->CraeteFullQuiz($data_uri, $_POST['quizname'], $_POST['quizdescription'],$quizData,$userid);

        if($result==="true" || $result === true){
             $pdo->commit();
             header("Location: /Tutorial/Views/Admin/Quiz/Quizzes.php");
                echo "<script>window.alert('Quiz Created Successful')</script>";
        }else{
            $pdo->rollBack();
            echo "<script>window.alert('something wrong')</script>";
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../../Assets/img/favIcon.png" type="image/x-icon">
    <title>Tutorial | Dashbord</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
.radio input ~ label {
  background-color: rgb(233, 225, 225);
  color: rgb(158, 146, 146);
}
.radio input:checked ~ label {
  background-color: darkgreen;
  color: white;
}
</style>
</head>
<body>
   <?php  include("../../../Includes/NavBar.php") ?>
    <div class="flex overflow-hidden bg-white pt-16">
       <?php  //include("../../../Includes/SideBar.php") ?>
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
                           <form method="post" enctype="multipart/form-data">
                            
                            <div class="w-full px-3 border-b-2 border-orange-500 pb-2 mb-4">
                                    <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-last-name">
                                        Image
                                    </label>
                                    <input name="cover" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-last-name" type="file" required placeholder="Description">
                                </div>
                            <div class="-mx-3 md:flex mb-6">
                                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-first-name">
                                            Quiz Name
                                        </label>
                                        <input name="quizname" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="text" required="true" placeholder="Name" required>
                                    </div>
                                    <div class="md:w-1/2 px-3">
                                        <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-last-name">
                                            Quiz Description
                                        </label>
                                        <input name="quizdescription" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-last-name" type="text" required="true" placeholder="Description" required>
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
                                                <input name="question1" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" id="grid-password" type="text" required="true" placeholder="description de votre question"  required>
                                            </div>
                                        </div>
                                        <div class="mb-2 px-4">
                                            <div class="md:flex md:row">
                                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                                    <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-first-name">
                                                        Answer 1 :
                                                    </label>
                                                    <div class="flex">
                                                        <input name="answer1q1" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3 mr-2" id="grid-first-name" type="text" required="true" placeholder="the 1rt answer">
                                                        <div class="inline-block radio">
                                                            <input name="CorrectAnswerq1" type="radio" id="answer1q1" hidden="hidden" value="answer1q1" />
                                                            <label for="answer1q1" class="px-2 py-1 rounded-lg flex justify-center items-center font-bold w-10 h-10 lg:w-14 lg:h-14 cursor-pointer" >
                                                                true
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" w-full md:w-1/2 px-3">
                                                    <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-last-name">
                                                        Answer 2 :
                                                    </label>
                                                    <div class="flex">
                                                        <input name="answer2q1" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mr-2" id="grid-last-name" type="text" required="true" placeholder="the 2nd answer" required >
                                                        <div class="inline-block radio">
                                                            <input name="CorrectAnswerq1" type="radio" id="answer2q1" hidden="hidden" value="answer2q1" />
                                                            <label for="answer2q1" class="px-2 py-1 rounded-lg flex justify-center items-center font-bold w-10 h-10 lg:w-14 lg:h-14 cursor-pointer" >
                                                                true
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="md:flex row">
                                                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                                    <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-first-name">
                                                        Answer 3 :
                                                    </label>
                                                    <div class="flex">
                                                        <input name="answer3q1" class="mr-2 appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="text" required="true" placeholder="the 3rd answer">
                                                        <div class="inline-block radio">
                                                            <input name="CorrectAnswerq1" type="radio" id="answer3q1" hidden="hidden" value="answer3q1" />
                                                            <label for="answer3q1" class="px-2 py-1 rounded-lg flex justify-center items-center font-bold w-10 h-10 lg:w-14 lg:h-14 cursor-pointer" >
                                                                true
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="md:w-1/2 px-3">
                                                    <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-last-name">
                                                        Answer 4 :
                                                    </label>
                                                    <div class="flex">
                                                        <input name="answer4q1" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mr-2" id="grid-last-name" type="text" required="true" placeholder="the 4th answer">
                                                        <div class="inline-block radio">
                                                            <input name="CorrectAnswerq1" type="radio" id="answer4q1" hidden="hidden" value="answer4q1" />
                                                            <label for="answer4q1" class="px-2 py-1 rounded-lg flex justify-center items-center font-bold w-10 h-10 lg:w-14 lg:h-14 cursor-pointer" >
                                                                true
                                                            </label>
                                                        </div>
                                                    </div>
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
                                        <di class="-mx-3 md:flex mb-6">
                                            <div class="md:w-full px-3">
                                                <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-password">
                                                    Description
                                                </label>
                                                <input name="question2" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3 mr-2" id="grid-password" type="text" required="true" placeholder="description de votre question" >                                        
                                            </div>
                                        </di requiredv>
                                        <div class="-mx-3 mb-2 px-4">
                                            <div class="flex row">
                                                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                                    <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-first-name">
                                                        Answer 1 :
                                                    </label>
                                                    <div class="flex">
                                                        <input name="answer1q2" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3 mr-2" id="grid-first-name" type="text" required="true" placeholder="the 1rt answer">
                                                        <div class="inline-block radio">
                                                            <input name="CorrectAnswerq2" type="radio" id="answer1q2" hidden="hidden" value="answer1q2" required/>
                                                            <label for="answer1q2" class="px-2 py-1 rounded-lg flex justify-center items-center font-bold w-10 h-10 lg:w-14 lg:h-14 cursor-pointer">
                                                                true
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="md:w-1/2 px-3">
                                                    <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-last-name">
                                                        Answer 2 :
                                                    </label>
                                                    <div class="flex">
                                                        <input name="answer2q2" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mr-2" id="grid-last-name" type="text" required="true" placeholder="the 2nd answer">
                                                        <div class="inline-block radio">
                                                            <input name="CorrectAnswerq2" type="radio" id="answer2q2" hidden="hidden" value="answer2q2" required/>
                                                            <label for="answer2q2" class="px-2 py-1 rounded-lg flex justify-center items-center font-bold w-10 h-10 lg:w-14 lg:h-14 cursor-pointer">
                                                                true
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex row">
                                                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                                    <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-first-name">
                                                        Answer 3 :
                                                    </label>
                                                    <div class="flex">
                                                        <input name="answer3q2" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3 mr-2" id="grid-first-name" type="text" required="true" placeholder="the 3rd answer">
                                                        <div class="inline-block radio">
                                                            <input name="CorrectAnswerq2" type="radio" id="answer3q2" hidden="hidden" value="answer3q2" required/>
                                                            <label for="answer3q2" class="px-2 py-1 rounded-lg flex justify-center items-center font-bold w-10 h-10 lg:w-14 lg:h-14 cursor-pointer">
                                                                true
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="md:w-1/2 px-3">
                                                    <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-last-name">
                                                        Answer 4 :
                                                    </label>
                                                    <div class="flex">
                                                        <input name="answer4q2" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mr-2" id="grid-last-name" type="text" required="true" placeholder="the 4th answer">
                                                        <div class="inline-block radio">
                                                            <input name="CorrectAnswerq2" type="radio" id="answer4q2" hidden="hidden" value="answer4q2" required/>
                                                            <label for="answer4q2" class="px-2 py-1 rounded-lg flex justify-center items-center font-bold w-10 h-10 lg:w-14 lg:h-14 cursor-pointer">
                                                                true
                                                            </label>
                                                        </div>
                                                    </div>
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
                                        <di class="-mx-3 md:flex mb-6">
                                            <div class="md:w-full px-3">
                                                <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-password">
                                                    Description
                                                </label>
                                                <input name="question3" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3 mr-2" id="grid-password" type="text" required="true" placeholder="description de votre question" >                                        
                                            </div>
                                        </di requiredv>
                                        <div class="-mx-3 mb-2 px-4">
                                            <div class="flex row">
                                                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                                    <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-first-name">
                                                        Answer 1 :
                                                    </label>
                                                    <div class="flex">
                                                        <input name="answer1q3" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3 mr-2" id="grid-first-name" type="text" required="true" placeholder="the 1rt answer">
                                                        <div class="inline-block radio">
                                                            <input name="CorrectAnswerq3" type="radio" id="answer1q3" hidden="hidden" value="answer1q3" required/>
                                                            <label for="answer1q3" class="px-2 py-1 rounded-lg flex justify-center items-center font-bold w-10 h-10 lg:w-14 lg:h-14  cursor-pointer">
                                                                true
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="md:w-1/2 px-3">
                                                    <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-last-name">
                                                        Answer 2 :
                                                    </label>
                                                    <div class="flex">
                                                        <input name="answer2q3" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mr-2" id="grid-last-name" type="text" required="true" placeholder="the 2nd answer">
                                                        <div class="inline-block radio">
                                                            <input name="CorrectAnswerq3" type="radio" id="answer2q3" hidden="hidden" value="answer2q3" required/>
                                                            <label for="answer2q3" class="px-2 py-1 rounded-lg flex justify-center items-center font-bold w-10 h-10 lg:w-14 lg:h-14 cursor-pointer" >
                                                                true
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex row">
                                                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                                    <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-first-name">
                                                        Answer 3 :
                                                    </label>
                                                    <div class="flex">
                                                        <input name="answer3q3" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3 mr-2" id="grid-first-name" type="text" required="true" placeholder="the 3rd answer">
                                                        <div class="inline-block radio">
                                                            <input name="CorrectAnswerq3" type="radio" id="answer3q3" hidden="hidden" value="answer3q3" required/>
                                                            <label for="answer3q3" class="px-2 py-1 rounded-lg flex justify-center items-center font-bold w-10 h-10 lg:w-14 lg:h-14 cursor-pointer" >
                                                                true
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="md:w-1/2 px-3">
                                                    <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-last-name">
                                                        Answer 4 :
                                                    </label>
                                                    <div class="flex">
                                                        <input name="answer4q3" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mr-2" id="grid-last-name" type="text" required="true" placeholder="the 4th answer">
                                                        <div class="inline-block radio">
                                                            <input name="CorrectAnswerq3" type="radio" id="answer4q3" hidden="hidden" value="answer4q3" required/>
                                                            <label for="answer4q3" class="px-2 py-1 rounded-lg flex justify-center items-center font-bold w-10 h-10 lg:w-14 lg:h-14 cursor-pointer" >
                                                                true
                                                            </label>
                                                        </div>
                                                    </div>
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
                                        <di class="-mx-3 md:flex mb-6">
                                            <div class="md:w-full px-3">
                                                <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-password">
                                                    Description
                                                </label>
                                                <input name="question4" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3 mr-2" id="grid-password" type="text" required="true" placeholder="description de votre question" >                                        
                                            </div>
                                        </di requiredv>
                                        <div class="-mx-3 mb-2 px-4">
                                            <div class="flex row">
                                                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                                    <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-first-name">
                                                        Answer 1 :
                                                    </label>
                                                    <div class="flex">
                                                        <input name="answer1q4" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3 mr-2" id="grid-first-name" type="text" required="true" required placeholder="the 1rt answer">
                                                            <div class="inline-block radio">
                                                            <input name="CorrectAnswerq4" type="radio" id="answer1q4" hidden="hidden" value="answer1q4" required/>
                                                            <label for="answer1q4" class="px-2 py-1 rounded-lg flex justify-center items-center font-bold w-10 h-10 lg:w-14 lg:h-14 cursor-pointer" >
                                                                true
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="md:w-1/2 px-3">
                                                    <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-last-name">
                                                        Answer 2 :
                                                    </label>
                                                    <div class="flex">
                                                        <input name="answer2q4" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mr-2" id="grid-last-name" type="text" required="true" placeholder="the 2nd answer">
                                                            <div class="inline-block radio">
                                                            <input name="CorrectAnswerq4" type="radio" id="answer2q4" hidden="hidden" value="answer2q4" required/>
                                                            <label for="answer2q4" class="px-2 py-1 rounded-lg flex justify-center items-center font-bold w-10 h-10 lg:w-14 lg:h-14 cursor-pointer" >
                                                                true
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex row">
                                                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                                    <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-first-name">
                                                        Answer 3 :
                                                    </label>
                                                    <div class="flex">
                                                        <input name="answer3q4" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3 mr-2" id="grid-first-name" type="text" required="true" placeholder="the 3rd answer">
                                                            <div class="inline-block radio">
                                                            <input name="CorrectAnswerq4" type="radio" id="answer3q4" hidden="hidden" value="answer3q4" required/>
                                                            <label for="answer3q4" class="px-2 py-1 rounded-lg flex justify-center items-center font-bold w-10 h-10 lg:w-14 lg:h-14 cursor-pointer" >
                                                                true
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="md:w-1/2 px-3">
                                                    <label class="block  tracking-wide text-grey-darker   mb-2" for="grid-last-name">
                                                        Answer 4 :
                                                    </label>
                                                    <div class="flex">
                                                        <input name="answer4q4" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mr-2" id="grid-last-name" type="text" required="true" placeholder="the 4th answer">
                                                            <div class="inline-block radio">
                                                            <input name="CorrectAnswerq4" type="radio" id="answer4q4" hidden="hidden" value="answer4q4" required/>
                                                            <label for="answer4q4" class="px-2 py-1 rounded-lg flex justify-center items-center font-bold w-10 h-10 lg:w-14 lg:h-14" >
                                                                true
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="but my-10 text-center ">
                                    <button type="submit" name="saveQuiz" class="btn btn-primary px-20 w-full text-white py-2 hover:bg-orange-500 bg-yellow-700 duration-5 rounded-lg">Save</button>
                                </div>
                           </form>



                        </div>


                    </div>
                    
                </div>
            </section>
        </main>
        
       </div>
    </div>
</body>
</html>