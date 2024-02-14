<?php
    
    include_once('../Services/QuizService.php');
    include_once("../Models/Quiz.php");
    include_once("../Models/Answer.php");
    include_once("../Models/Question.php");

?>
<?php 
    $QuizName = "React Js";
    
if (isset($_GET['qid']) && false ) {
    $qs = new QuizService($pdo);
    $quizId = $_GET['qid'];
    $quiz = $qs->getQuizById($quizId);
    $QuizName = $quiz->Name;

}else{
    // header("Location: /Tutorial/Views/Quizzes.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz || <?php echo $QuizName ?> </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    
</head>
<body>
    <div class="main">
        <!-- <h1 className="text-3xl font-sans mt-32 md:mt-48 lg:mt-64 font-bold text-gray-800 dark:text-gray-300 text-center">
            <?php // echo $quiz->Name ?>
        </h1>
        <div className="bg-gray-50 dark:bg-gray-800 shadow-lg dark:shadow-dark rounded-2xl min-w-80 w-148">
            <div className="pt-6 pb-2">
                <?php foreach($quiz->Questions as $question){ ?>
                    <div className="bg-gray-100 dark:bg-gray-900 mx-6 h-16 w-auto mb-4 rounded-md flex items-center">
                        <input type="radio" name="answer" value={props.answer} className="ml-5 dark:bg-gray-800" />
                        <label className="text-gray-700 dark:text-gray-400 text-lg ml-4">
                            props.answer
                        </label>
                    </div>
                <?php } ?>
            </div>
        </div> -->


        <!--=============== FONT AWESOME ===============-->
        
        <div class="col-8 my-5 mx-auto p-5 border border-secondary">
                    <div class=" text-center p-3 border border-success my-2" >
                        <h1>@currentQuestion.Description</h1>
                    </div>
                    <div class=" ">
                        @foreach(var answer in currentQuestion.Answers){
                            <div class="form-check p-0">
                                <input type="radio" required class="btn-check" @onchange="@((args)=>Checked(currentQuestion.Id, answer.IsOk))" name="@($"{currentQuestion.Id}")" id="@($"{currentQuestion.Id}-{answer.Id}")" autocomplete="off" checked="false" >
                                <label class="btn btn-light  border border-secondary w-100" for="@($"{currentQuestion.Id}-{answer.Id}")">@answer.Description</label>
                            </div>
                        }
                    </div>
                    @if(pos<questions.Count()-1){
                        @if(!answered){
                            <div class="row mx-auto col-4 my-5">
                                <button @onclick="@(()=>Next())" class="btn btn-secondary">Next</button>
                            </div>
                        }
                    }else{
                        <div class="row mx-auto col-8 mb-5">
                            <button @onclick="check" class="btn btn-primary w-100 " type="button">Submit</button>
                        </div>
                    }
            </div>
    </div>
    <script>
        const quizData = [
  {
    question: "Which language runs in a web browser?",
    a: "Java",
    b: "C",
    c: "Python",
    d: "JavaScript",
    correct: "d"
  },
  {
    question: "What does CSS stand for?",
    a: "Central Style Sheets",
    b: "Cascading Style Sheets",
    c: "Cascading Simple Sheets",
    d: "Cars SUVs Sailboats",
    correct: "b"
  },
  {
    question: "What does HTML stand for?",
    a: "Hypertext Markup Language",
    b: "Hypertext Markdown Language",
    c: "Hyperloop Machine Language",
    d: "Helicopters Terminals Motorboats Lamborginis",
    correct: "a"
  },
  {
    question: "What year was JavaScript launched?",
    a: "1996",
    b: "1995",
    c: "1994",
    d: "none of the above",
    correct: "b"
  }
];

const quiz = document.getElementById("quiz");
const answerEls = document.querySelectorAll(".answer");
const questionEl = document.getElementById("question");
const a_text = document.getElementById("a_text");
const b_text = document.getElementById("b_text");
const c_text = document.getElementById("c_text");
const d_text = document.getElementById("d_text");
const submitBtn = document.getElementById("submit");
const loadingProgress = document.getElementById("loading-bar-progress");

let currentQuiz = 0;
let score = 0;

loadQuiz();

function loadQuiz() {
  deselectAnswers();

  const currentQuizData = quizData[currentQuiz];

  questionEl.innerText = currentQuizData.question;
  a_text.innerText = currentQuizData.a;
  b_text.innerText = currentQuizData.b;
  c_text.innerText = currentQuizData.c;
  d_text.innerText = currentQuizData.d;
}

function deselectAnswers() {
  answerEls.forEach((answerEl) => (answerEl.checked = false));
}

function getSelected() {
  let answer;

  answerEls.forEach((answerEl) => {
    if (answerEl.checked) {
      answer = answerEl.id;
    }
  });

  return answer;
}

submitBtn.addEventListener("click", () => {
  const answer = getSelected();

  if (answer) {
    if (answer === quizData[currentQuiz].correct) {
      score++;
    }

    currentQuiz++;
    loadingProgress.style.width = `${(currentQuiz * 100) / quizData.length}%`;

    if (currentQuiz < quizData.length) {
      loadQuiz();
    } else {
      quiz.innerHTML = `
                <h2>You answered ${score}/${quizData.length} questions correctly</h2>

                <button onclick="location.reload()">Reload <i class="fa-solid fa-arrows-rotate"></i></button>
            `;
    }
  }
});

    </script>
</body>
</html>