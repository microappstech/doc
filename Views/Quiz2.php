
<?php
    
    include_once('../Services/QuizService.php');
    include_once("../Models/Quiz.php");
    include_once("../Models/Answer.php");
    include_once("../Models/Question.php");
    include_once("../Config/Config.php")
?>
<?php 
    $QuizName = "";
    
if (isset($_GET['qid'])) {
    $qs = new QuizService($pdo);
    $quizId = $_GET['qid'];
    $quiz = $qs->getQuizById($quizId);
    $NameQuiz = $quiz->Name;

}else{
     header("Location: /Tutorial/Views/Quizzes.php");
}

$questions = [
    [
        "Id" => 1,
        "Description" => "What challenge did codepen have in the month of March 2023? ??????? ???????? ????????? ?????????",
        "answer" => "Buttons",
        "Answers" => [
            "Shape",
            "Buttons",
            "Texture",
            "The typography of quotes"
        ]
    ],
    [
        "Id" => 2,
        "Description" => "What color shade is this hex #ffff00?",
        "answer" => "yellow",
        "Answers" => [
            "orange",
            "red",
            "yellow",
            "pink"
        ]
    ],
    [
        "Id" => 3,
        "Description" => "How does a FOR loop start?",
        "answer" => "for (i = 0; i <= 5; i++)",
        "Answers" => [
            "for (i = 0; i <= 5; i++)",
            "for (i <= 5; i++)",
            "for i = 1 to 5",
            "for (i = 0; i <= 5)"
        ]
    ],
    [
        "Id" => 4,
        "Description" => "How do you round the number 7.25, to the nearest integer?",
        "answer" => "Math.round(7.25)",
        "Answers" => [
            "Math.rnd(7.25)",
            "rnd(7.25)",
            "round(7.25)",
            "Math.round(7.25)"
        ]
    ],
    [
        "Id" => 5,
        "Description" => "What is the default value of the position property?",
        "answer" => "static",
        "Answers" => [
            "relative",
            "fixed",
            "static",
            "absolute"
        ]
    ],
    [
        "Id" => 6,
        "Description" => "How do you make each word in a text start with a capital letter?",
        "answer" => "text-transform:capitalize",
        "Answers" => [
            "text-transform:capitalize",
            "text-style:capitalize",
            "transform:capitalize",
            "You can't do that with css"
        ]
    ],
    [
        "Id" => 7,
        "Description" => "How do you group selectors?",
        "answer" => "Separate each selector with a comma",
        "Answers" => [
            "Separate each selector with a slash",
            "Separate each selector with a plus sign",
            "Separate each selector with a space",
            "Separate each selector with a comma"
        ]
    ],
    [
        "Id" => 8,
        "Description" => "How to write an IF statement in JavaScript?",
        "answer" => "if (i == 5)",
        "Answers" => [
            "if (i == 5)",
            "if i = 5 then",
            "if i = 5",
            "if i == 5 then"
        ]
    ],
    [
        "Id" => 9,
        "Description" => "How do you select all p elements inside a div element?",
        "answer" => "div p",
        "Answers" => [
            "p,div",
            "div.p",
            "div + p",
            "div p"
        ]
    ],
    [
        "Id" => 10,
        "Description" => "How can you detect the client's browser name?",
        "answer" => "navigator.appName",
        "Answers" => [
            "client.browserName",
            "client.navName",
            "navigator.appName",
            "browser.name"
        ]
    ],
    [
        "Id" => 11,
        "Description" => "Just another quetion !!!!!!!!! !!!!!!!!! !!!!!!!!!! !!!!!!!!!! !!!!!!!!!",
        "answer" => "navigator.appName",
        "Answers" => [
            "client.browserName !!!!!!!! !!!!!!!!!! !!!!!!!!!!!! !!!!!!!! !!!!!!!!!!!!! !!!!!!!!!!!! !!!!!!!!!!! !!!!!!!! !!!!!!!!!! !!!!!!!!! !!!!!!!!! !!!!!!!!!",
            "client.navName nnnn nnnnnn kkkkkkk llllll kj hjk jhkd sjqkldsfgqhdjf qdfgsjdhgf qsdghjgsdfquyze dhgfsdq ",
            "navigator.appName",
            "browser.name skfjhqd ueizy dsqsdhjfjqkdfh qsjhfdezoy qshdfsbcjqk qsfhiuoezhfs hjqhkjsdfhqlfh sdjfhqezfb hjkdhqlfhhiu jshcjkhsd jhljqfpoh "
        ]
    ]

];



$questions2 = $quiz->Questions;
    
echo "<pre>";
print_r($questions2);
echo "</pre>"

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz | <?php echo $NameQuiz; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>    
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Poppins', sans-serif;
            }

            body{
                background:black;
                /* color : white; */
            }


            svg {
                font-family: 'Monoton', cursive;
                width: 100%; height: 100%;
                margin-top:2%;
            }
            svg text {
                animation: stroke 5s infinite alternate;
                stroke-width: 2;
                stroke: #FF71F9;
                font-size: 100px;
            }


            @keyframes stroke {
                0%   {
                    fill: rgba(27,174,255,0); stroke: rgba(240,211,98,1);
                    stroke-dashoffset: 25%; stroke-dasharray: 0 50%; stroke-width: 2;
                }
                70%  {fill: rgba(27,174,255,0); stroke: rgba(240,211,113,1); }
                80%  {fill: rgba(27,174,255,0); stroke: rgba(240,211,98,1); stroke-width: 3; }
                100% {
                    fill: orange; stroke: rgba(240,211,98,1);
                    stroke-dashoffset: -25%; stroke-dasharray: 50% 0; stroke-width: 0;
                }
            }

            ::selection{
                color: #fff;
                background: rgba(255,170,1,1);
            }

            .exit_btn, .start_btn, .info_box, .quiz_box, .result_box{
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 
                            0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }


            .info_box.activeInfo,
            .quiz_box.activeQuiz,
            .result_box.activeResult{
                opacity: 1;
                z-index: 5;
                pointer-events: auto;
                transform: translate(-50%, -50%) scale(1);
            }



            .start_btn {
                top: 77%;
                left: calc( ( 100% - 300px ) / 2 );
                box-shadow: none;
                -webkit-animation-name: bounceInRight;
                animation-name: bounceInRight;
                -webkit-animation-duration: 2s;
                animation-duration: 2s;
                -webkit-animation-fill-mode: both;
                animation-fill-mode: both;
                }

                @-webkit-keyframes bounceInRight {
                0%, 60%, 75%, 90%, 100% {
                -webkit-transition-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
                transition-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
                }
                0% {
                opacity: 0;
                -webkit-transform: translate3d(3000px, 0, 0);
                transform: translate3d(3000px, 0, 0);
                }
                60% {
                opacity: 1;
                -webkit-transform: translate3d(-25px, 0, 0);
                transform: translate3d(-25px, 0, 0);
                }
                75% {
                -webkit-transform: translate3d(10px, 0, 0);
                transform: translate3d(10px, 0, 0);
                }
                90% {
                -webkit-transform: translate3d(-5px, 0, 0);
                transform: translate3d(-5px, 0, 0);
                }
                100% {
                -webkit-transform: none;
                transform: none;
                }
                }
                @keyframes bounceInRight {
                0%, 60%, 75%, 90%, 100% {
                -webkit-transition-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
                transition-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
                }
                0% {
                opacity: 0;
                -webkit-transform: translate3d(3000px, 0, 0);
                transform: translate3d(3000px, 0, 0);
                }
                60% {
                opacity: 1;
                -webkit-transform: translate3d(-25px, 0, 0);
                transform: translate3d(-25px, 0, 0);
                }
                75% {
                -webkit-transform: translate3d(10px, 0, 0);
                transform: translate3d(10px, 0, 0);
                }
                90% {
                -webkit-transform: translate3d(-5px, 0, 0);
                transform: translate3d(-5px, 0, 0);
                }
                100% {
                -webkit-transform: none;
                transform: none;
                }
                } 

            /* START BUTTON FOR GAME */
            .start_btn button, .exit_btn button{
                font-size: 25px;
                font-weight: 500;
                color: orange;
                padding: 15px 30px;
                outline: none;
                border: none;
                width:150px;
                height:150px;
                background: #000000;
                cursor: pointer;
            }

            .start_btn button:hover {
                color: orange;
                opacity: 0.9;
            }

            .info_box{
                width: 540px;
                border:5px solid orange;
                border-radius: 5px;
                transform: translate(-50%, -50%) scale(0.9);
                opacity: 0;
                pointer-events: none;
                transition: all 0.3s ease;
                background: #f1f1f1;
            
            }

            .info_box .info-title{
                height: 60px;
                width: 100%;
                border-bottom: 1px solid lightgrey;
                display: flex;
                align-items: center;
                padding: 0 30px;
                border-radius: 5px 5px 0 0;
                font-size: 20px;
                font-weight: 500;
            }

            .info_box .info-list{
                padding: 15px 30px;
            }

            .info_box .info-list .info{
                margin: 5px 0;
                font-size: 17px;
            }

            .info_box .info-list .info span{
                font-weight: 600;
                color: orange;
            }
            .info_box .buttons{
                height: 60px;
                display: flex;
                align-items: center;
                justify-content: flex-end;
                padding: 0 30px;
                border-top: 1px solid lightgrey;
            }

            .info_box .buttons button{
                margin: 0 5px;
                height: 40px;
                width: 100px;
                font-size: 16px;
                font-weight: 500;
                cursor: pointer;
                border: none;
                outline: none;
                border-radius: 5px;
                border: 1px solid rgba(255,170,1,1);
                transition: all 0.3s ease;
            }

            .quiz_box{
                width: 550px;
                border:5px solid orange;
                border-radius: 5px;
                transform: translate(-50%, -50%) scale(0.9);
                opacity: 0;
                pointer-events: none;
                transition: all 0.3s ease;
                background-color: #ffffff;

            }

            .quiz_box header{
                position: relative;
                z-index: 2;
                height: 70px;
                padding: 0 30px;
                background: #fff;
                border-radius: 5px 5px 0 0;
                display: flex;
                align-items: center;
                justify-content: space-between;
                box-shadow: 0px 3px 5px 1px rgba(0,0,0,0.1);
            }

            .quiz_box header .title{
                font-size: 20px;
                font-weight: 600;
            }

            .quiz_box header .timer{
                color: #004085;
                background: #ffe9cc;
                border: 1px solid #b8daff;
                height: 45px;
                padding: 0 8px;
                border-radius: 5px;
                display: flex;
                align-items: center;
                justify-content: space-between;
                width: 145px;
            }

            .quiz_box header .timer .time_left_txt{
                font-weight: 400;
                font-size: 17px;
                user-select: none;
            }

            .quiz_box header .timer .timer_sec{
                font-size: 18px;
                font-weight: 500;
                height: 30px;
                width: 45px;
                color: #fff;
                border-radius: 5px;
                line-height: 30px;
                text-align: center;
                background: #343a40;
                border: 1px solid #343a40;
                user-select: none;
            }

            .quiz_box header .time_line{
                position: absolute;
                bottom: 0px;
                left: 0px;
                height: 3px;
                background: orange;
            }

            section{
                padding: 25px 30px 20px 30px;
                background: #fff;
                background: #f1f1f1;
            }

            section .que_text{
                font-size: 25px;
                font-weight: 600;
            }

            section .option_list{
                padding: 20px 0px;
                display: block;   
            }

            section .option_list .option{
                background: aliceblue;
                border: 1px solid #84c5fe;
                border-radius: 5px;
                padding: 8px 15px;
                font-size: 17px;
                margin-bottom: 15px;
                cursor: pointer;
                transition: all 0.3s ease;
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            section .option_list .option:last-child{
                margin-bottom: 0px;
            }

            section .option_list .option:hover{
                color: #004085;
                background: #cce5ff;
                border: 1px solid #b8daff;
            }

            section .option_list .option.correct{
                color: #155724;
                background: #d4edda;
                border: 1px solid #c3e6cb;
            }

            section .option_list .option.incorrect{
                color: #721c24;
                background: #f8d7da;
                border: 1px solid #f5c6cb;
            }

            section .option_list .option.disabled{
                pointer-events: none;
            }

            section .option_list .option .icon{
                height: 26px;
                width: 26px;
                border: 2px solid transparent;
                border-radius: 50%;
                text-align: center;
                font-size: 13px;
                pointer-events: none;
                transition: all 0.3s ease;
                line-height: 24px;
            }
            .option_list .option .icon.tick{
                color: #23903c;
                border-color: #23903c;
                background: #d4edda;
            }

            .option_list .option .icon.cross{
                color: #a42834;
                background: #f8d7da;
                border-color: #a42834;
            }

            footer{
                height: 60px;
                padding: 0 30px;
                display: flex;
                align-items: center;
                justify-content: space-between;
                border-top: 1px solid lightgrey;
            }

            footer .total_que span{
                display: flex;
                user-select: none;
            }

            footer .total_que span p{
                font-weight: 500;
                padding: 0 5px;
            }

            footer .total_que span p:first-child{
                padding-left: 0px;
            }

            footer button{
                height: 40px;
                padding: 0 13px;
                font-size: 18px;
                font-weight: 400;
                cursor: pointer;
                border: none;
                outline: none;
                color: #fff;
                border-radius: 5px;
                background: orange;
                border: 1px solid orange;
                line-height: 10px;
                opacity: 0;
                pointer-events: none;
                transform: scale(0.95);
                transition: all 0.3s ease;
            }

            footer button:hover{
                background: orange;
            }

            footer button.show{
                opacity: 1;
                pointer-events: auto;
                transform: scale(1);
            }

            .result_box{
                background: #fff;
                border-radius: 5px;
                display: flex;
                padding: 25px 30px;
                width: 450px;
                align-items: center;
                flex-direction: column;
                justify-content: center;
                transform: translate(-50%, -50%) scale(0.9);
                opacity: 0;
                pointer-events: none;
                transition: all 0.3s ease;
                border:5px solid #FF71F9;
            }

            .result_box .icon{
                font-size: 100px;
                color: orange;
                margin-bottom: 10px;
            }

            .result_box .complete_text{
                font-size: 20px;
                font-weight: 500;
            }

            .result_box .score_text span{
                display: flex;
                margin: 10px 0;
                font-size: 18px;
                font-weight: 500;
            }

            .result_box .score_text span p{
                padding: 0 4px;
                font-weight: 600;
            }

            .result_box .buttons{
                display: flex;
                margin: 20px 0;
            }

            .result_box .buttons button{
                margin: 0 10px;
                height: 45px;
                padding: 0 20px;
                font-size: 18px;
                font-weight: 500;
                cursor: pointer;
                border: none;
                outline: none;
                border-radius: 5px;
                border: 1px solid orange;
                transition: all 0.3s ease;
            }

            .buttons button.restart{
                color: #fff;
                background: orange;
            }

            .buttons button.restart:hover{
                background: orange;
            }

            .buttons button.quit{
                color: orange;
                background: #fff;
            }

            .buttons button.quit:hover{
                color: #fff;
                background: orange;
            }
    </style>
</head>
<body>
<div class="wrapper">
        <svg>
            <text x="50%" y="50%" dy=".35em" text-anchor="middle">
                <?php echo $NameQuiz ?>
            </text>
        </svg>
        </div>


    <!-- start Quiz button -->
    <div class="start_btn">
        <button>Start</button>
        <button onclick="history.back()">Exit</button>
    </div>
    
    

    <!-- Info Box -->
    <div class="info_box">
        <div class="info-title"><span>Some Rules of this Quiz</span></div>
        <div class="info-list">
            <div class="info">1. You will have only <span>15 seconds</span> per each question.</div>
            <div class="info">2. Once you select your answer, it can't be undone.</div>
            <div class="info">3. You can't select any option once time goes off.</div>
            <div class="info">4. You can't exit from the Quiz while you're playing.</div>
            <div class="info">5. You'll get points on the basis of your correct answers.</div>
        </div>
        <div class="buttons">
            <button class="quit">Exit Quiz</button>
            <button class="restart">Continue</button>
        </div>
    </div>

    <!-- Quiz Box -->
    <div class="quiz_box">
        <header>
            <div class="title">Quiz By LearnHub</div>
            <div class="timer">
                <div class="time_left_txt">Time Left</div>
                <div class="timer_sec">15</div>
            </div>
            <div class="time_line"></div>
        </header>
        <section>
            <div class="que_text">
                <!-- Here I've inserted question from JavaScript -->
            </div>
            <div class="option_list">
                <!-- Here I've inserted options from JavaScript -->
            </div>
        </section>

        <!-- footer of Quiz Box -->
        <footer>
            <div class="total_que">
                <!-- Here I've inserted Question Count Number from JavaScript -->
            </div>
            <button class="next_btn">Next</button>
        </footer>
    </div>


    <!-- Result Box -->
    <div class="result_box">
        <div class="icon">
            <i class="fas fa-crown"></i>
        </div>
        <div class="complete_text">You've completed the Quiz!</div>
        <div class="score_text">
            <!-- Here I've inserted Score Result from JavaScript -->
        </div>
        <div class="buttons">
            <button class="restart">Replay Quiz</button>
            <button class="quit">Quit Quiz</button>
        </div>
    </div>


    <script>
        
        let questions = <?php echo json_encode($questions); ?>;
        let questions2 = <?php echo json_encode($questions2); ?>;
        console.log(questions);
        console.log(questions2);

        //selecting all required elements
        const start_btn = document.querySelector(".start_btn button");
        const info_box = document.querySelector(".info_box");
        const exit_btn = info_box.querySelector(".buttons .quit");
        const continue_btn = info_box.querySelector(".buttons .restart");
        const quiz_box = document.querySelector(".quiz_box");
        const result_box = document.querySelector(".result_box");
        const option_list = document.querySelector(".option_list");
        const time_line = document.querySelector("header .time_line");
        const timeText = document.querySelector(".timer .time_left_txt");
        const timeCount = document.querySelector(".timer .timer_sec");

        
        start_btn.onclick = ()=>{
            info_box.classList.add("activeInfo"); //show info box
        }

        
        exit_btn.onclick = ()=>{
            info_box.classList.remove("activeInfo"); //hide info box
        }

        
        continue_btn.onclick = ()=>{
            info_box.classList.remove("activeInfo"); //hide info box
            quiz_box.classList.add("activeQuiz"); //show quiz box
            showQuetions(0); //calling showQestions function
            queCounter(1); //passing 1 parameter to queCounter
            startTimer(15); //calling startTimer function
            startTimerLine(0); //calling startTimerLine function
        }

        let timeValue =  15;
        let que_count = 0;
        let que_numb = 1;
        let userScore = 0;
        let counter;
        let counterLine;
        let widthValue = 0;

        const restart_quiz = result_box.querySelector(".buttons .restart");
        const quit_quiz = result_box.querySelector(".buttons .quit");

        // if restartQuiz button clicked
        restart_quiz.onclick = ()=>{
            quiz_box.classList.add("activeQuiz"); 
            result_box.classList.remove("activeResult"); 
            timeValue = 15; 
            que_count = 0;
            que_numb = 1;
            userScore = 0;
            widthValue = 0;
            showQuetions(que_count); 
            queCounter(que_numb); 
            clearInterval(counter); 
            clearInterval(counterLine); 
            startTimer(timeValue); 
            startTimerLine(widthValue); 
            timeText.textContent = "Time Left"; 
            next_btn.classList.remove("show"); 
        }

        
        quit_quiz.onclick = ()=>{
            window.location.reload();
        }

        const next_btn = document.querySelector("footer .next_btn");
        const bottom_ques_counter = document.querySelector("footer .total_que");

        
        next_btn.onclick = ()=>{
            if(que_count < questions2.length - 1){
                que_count++; 
                que_numb++;
                showQuetions(que_count);
                queCounter(que_numb); 
                clearInterval(counter);
                clearInterval(counterLine);
                startTimer(timeValue); 
                startTimerLine(widthValue);
                timeText.textContent = "Time Left";
                next_btn.classList.remove("show");
            }else{
                clearInterval(counter); 
                clearInterval(counterLine);
                showResult();
            }
        }

        
        function showQuetions(index){
            
            const que_text = document.querySelector(".que_text");
            console.log(questions2[index].Answers);

            let que_tag = '<span>'+ questions2[index].Id + ". " + questions2[index].Description +'</span>';
            let option_tag = '<div class="option" data-x="'+ questions2[index].Answers[0].IsOk +'"><span>'+ questions2[index].Answers[0].Description +'</span></div>'
            + '<div class="option" data-x="'+ questions2[index].Answers[1].IsOk +'"><span>'+ questions2[index].Answers[1].Description +'</span></div>'
            + '<div class="option" data-x="'+ questions2[index].Answers[2].IsOk +'"><span>'+ questions2[index].Answers[2].Description +'</span></div>'
            + '<div class="option" data-x="'+ questions2[index].Answers[3].IsOk +'"><span>'+ questions2[index].Answers[3].Description +'</span></div>';
            que_text.innerHTML = que_tag; 
            option_list.innerHTML = option_tag; 
            
            const option = option_list.querySelectorAll(".option");

            for(i=0; i < option.length; i++){
                option[i].setAttribute("onclick", "optionSelected(this)");
            }
        }
        
        let tickIconTag = '<div class="icon tick"><i class="fas fa-check" style="line-height: unset;"></i></div>';
        let crossIconTag = '<div class="icon cross"><i class="fas fa-times"  style="line-height: unset;"></i></div>';

        
        function optionSelected(answer){
            clearInterval(counter); 
            clearInterval(counterLine); 
            let userAns = answer.textContent;
            let correcAns = questions[que_count].answer; 
            const allOptions = option_list.children.length; 
            let isOk = answer.getAttribute('data-x');
            
            if(isOk==1){ 
                userScore += 1; 
                answer.classList.add("correct"); 
                answer.insertAdjacentHTML("beforeend", tickIconTag); 
                console.log("Correct Answer");
                console.log("Your correct answers = " + userScore);
            }else{
                answer.classList.add("incorrect"); 
                answer.insertAdjacentHTML("beforeend", crossIconTag); 
                

                for(i=0; i < allOptions; i++){
                    if(option_list.children[i].textContent == correcAns){ 
                        option_list.children[i].setAttribute("class", "option correct"); 
                        option_list.children[i].insertAdjacentHTML("beforeend", tickIconTag); 
                        console.log("Auto selected correct answer.");
                    }
                }
            }
            for(i=0; i < allOptions; i++){
                option_list.children[i].classList.add("disabled"); 
            }
            next_btn.classList.add("show"); 
        }

        function showResult(){
            info_box.classList.remove("activeInfo"); 
            quiz_box.classList.remove("activeQuiz"); 
            result_box.classList.add("activeResult"); 
            const scoreText = result_box.querySelector(".score_text");
            if (userScore > 3){                 
                let scoreTag = '<span>Congrats!, You got <p>'+ userScore +'</p> out of <p>'+ questions2.length +'</p></span>';
                scoreText.innerHTML = scoreTag;  
            }
            else if(userScore > 1){ 
                let scoreTag = '<span>and nice 😎, You got <p>'+ userScore +'</p> out of <p>'+ questions2.length +'</p></span>';
                scoreText.innerHTML = scoreTag;
            }
            else{ 
                let scoreTag = '<span>and sorry 😐, You got only <p>'+ userScore +'</p> out of <p>'+ questions2.length +'</p></span>';
                scoreText.innerHTML = scoreTag;
            }
        }

        function startTimer(time){
            counter = setInterval(timer, 1000);
            function timer(){
                timeCount.textContent = time; 
                time--; 
                if(time < 9){ 
                    let addZero = timeCount.textContent; 
                    timeCount.textContent = "0" + addZero; 
                }
                if(time < 0){ 
                    clearInterval(counter); 
                    timeText.textContent = "Time Off"; 
                    const allOptions = option_list.children.length;
                    let correcAns = questions[que_count].answer;
                    for(i=0; i < allOptions; i++){
                        if(option_list.children[i].textContent == correcAns){ 
                            option_list.children[i].setAttribute("class", "option correct"); 
                            option_list.children[i].insertAdjacentHTML("beforeend", tickIconTag); 
                            console.log("Time Off: Auto selected correct answer.");
                        }
                    }
                    for(i=0; i < allOptions; i++){
                        option_list.children[i].classList.add("disabled"); 
                    }
                    next_btn.classList.add("show"); 
                }
            }
        }

        function startTimerLine(time){
            counterLine = setInterval(timer, 29);
            function timer(){
                time += 1; 
                time_line.style.width = time + "px"; 
                if(time > 549){ 
                    clearInterval(counterLine);
                }
            }
        }

        function queCounter(index){
            
            let totalQueCounTag = '<span><p>'+ index +'</p> of <p>'+ questions2.length +'</p> Questions</span>';
            bottom_ques_counter.innerHTML = totalQueCounTag; 
        }
    </script>
</body>
</html>