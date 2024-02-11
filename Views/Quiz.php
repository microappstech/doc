<?php
    include_once("../Config/Config.php");
    include_once('../Services/QuizService.php');
    include_once("../Models/Quiz.php");
    include_once("../Models/Answer.php");
    include_once("../Models/Question.php");

?>
<?php 
    $QuizName = "React Js";
    
if (isset($_GET['qid'])) {
    $qs = new QuizService($pdo);
    $quizId = $_GET['qid'];
    $quiz = $qs->getQuizById($quizId);
    $QuizName = $quiz->Name;

}else{
    header("Location: /Tutorial/Views/Quizzes.php");
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
    <style>
        /* @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;400&display=swap"); */

:root {
  --accent-color: #c7b0c3;
}

* {
  box-sizing: border-box;
}

body {
  background-color: #eee;
  font-family: "Poppins", sans-serif;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh;
  overflow: hidden;
  margin: 0;
}

.quiz-container {
  background-color: #fff;
  border-radius: 20px;
  box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
  width: 650px;
  padding: 4rem;
}

.loading-bar {
  width: 100%;
  height: 5px;
  background-color: #eee;
  border-radius: 5px;
  overflow: hidden;
}

.loading-bar-progress {
  background-color: var(--accent-color);
  height: 100%;
  width: 0;
  transition: 0.3s ease;
}

h2 {
  font-size: 22px;
  text-align: center;
}

ul {
  list-style-type: none;
  padding: 0;
}

ul li {
  font-size: 1.2rem;
  margin: 1rem 0;
}

ul li input {
  display: none;
}

ul li label {
  cursor: pointer;
  display: block;
  color: #666;
  width: 100%;
  padding: 10px 20px;
  border-radius: 50px;
  box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
  transition: 0.1s ease;
}

ul li input:hover + label {
  box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 15px -3px,
    rgba(0, 0, 0, 0.05) 0px 4px 6px -2px;
}

ul li input:checked + label {
  outline: 2px solid var(--accent-color);
  color: var(--accent-color);
}

button {
  color: var(--accent-color);
  background-color: transparent;
  font-family: inherit;
  border: none;
  display: block;
  cursor: pointer;
  margin: auto;
  font-size: 1.1rem;
  font-family: inherit;
  padding: 1rem;
  transition: 0.1s ease;
}

button:hover {
  transform: translateY(-3px);
}

button:active {
  transform: translateY(2px);
}

    </style>
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
        
        <div class="quiz-container" id="quiz">
        <h2 id="question">Question</h2>
        <div class="loading-bar">
            <div class="loading-bar-progress" id="loading-bar-progress"></div>
        </div>
        <ul>
            <li>
            <input type="radio" name="answer" id="a" class="answer">
            <label for="a" id="a_text">Answer</label>
            </li>
            <li>
            <input type="radio" name="answer" id="b" class="answer">
            <label for="b" id="b_text">Answer</label>
            </li>
            <li>
            <input type="radio" name="answer" id="c" class="answer">
            <label for="c" id="c_text">Answer</label>
            </li>
            <li>
            <input type="radio" name="answer" id="d" class="answer">
            <label for="d" id="d_text">Answer</label>
            </li>
        </ul>
        <button id="submit">Next <i class="fa-solid fa-chevron-right"></i></button>
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