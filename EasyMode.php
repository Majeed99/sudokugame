<?php
session_start();
if (!isset($_SESSION['username']))
    header('location:signin.php?error=Please login again!');
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel="stylesheet" media="all" type="text/css" href="sudokuJS.css">
    <style>
        body {
            background-image: url("EasyMode.png");
            background-size: cover;
            background-repeat: no-repeat;
        }
        * {
            margin:0; padding:0;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }
        .wrap {
            padding: 2em 1em;
            width: 400px;
            max-width: 100%;
            margin-left: auto;
            margin-right: auto;
        }

        @media(min-width: 30em){
            .wrap{
                width: 490px;
            }
            .sudoku-board input {
                font-size: 24px;
                font-size: 1.5rem;
            }
            .sudoku-board .candidates {
                font-size: .8em;
            }
        }

    </style>

    <title>Easy Mode</title>


    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="sudokuJS.js"></script>
    <script language="JavaScript">
        function Undo() { document.execCommand("undo", false, null); }
        function Redo() { document.execCommand("redo", false, null); }
    </script>
</head>

<body>

<div class="wrap">


    <!--show candidates toggle-->
    <label class="showcand" for="toggleCandidates">Show candidates </label><input id="toggleCandidates" class="js-candidate-toggle" type="checkbox"/>


    <div class="textId" contentEditable="true"></div>
    <input type="button" class="undobtn"  onmouseup="Undo()"/ value="Undo">
    <input type="button" class="redobtn" onmouseup="Redo()"/ value="Redo">

    <input class="sb" onclick="sb()" type="button"  value="Submit">
    <!--genrate board btns-->
    <!--New:
    <button type="button" class="sudokubutton1 js-generate-board-btn--easy">Easy</button>
    <button type="button" class="sudokubutton2 js-generate-board-btn--medium">Medium</button>
    <button type="button" class="sudokubutton3 js-generate-board-btn--hard">Hard</button>
    <button type="button" class="sudokubutton4 js-generate-board-btn--very-hard">Very Hard</button>
       -->

    <!--the only required html-->
    <div id="sudoku" class="sudoku-board">
    </div>


</div>

<script>
    var	$candidateToggle = $(".js-candidate-toggle"),
        $generateBoardBtnEasy = $(".js-generate-board-btn--easy"),
        $generateBoardBtnMedium = $(".js-generate-board-btn--medium"),
        $generateBoardBtnHard = $(".js-generate-board-btn--hard"),
        $generateBoardBtnVeryHard = $(".js-generate-board-btn--very-hard"),

        $solveStepBtn = $(".js-solve-step-btn"),
        $solveAllBtn = $(".js-solve-all-btn"),
        $clearBoardBtn = $(".js-clear-board-btn"),

        mySudokuJS = $("#sudoku").sudokuJS({
            difficulty: "very hard"
            //change state of our candidate showing checkbox on change in sudokuJS
            ,candidateShowToggleFn : function(showing){
                $candidateToggle.prop("checked", showing);
            }
        });

   /* $solveStepBtn.on("click", mySudokuJS.solveStep);
    $solveAllBtn.on("click", mySudokuJS.solveAll);
    $clearBoardBtn.on("click", mySudokuJS.clearBoard);*/

   /* $generateBoardBtnEasy.on("click", function(){
        mySudokuJS.generateBoard("easy");
    });*/

    $(document).ready( function() {
        mySudokuJS.generateBoard("easy");
    });
    /*
    $generateBoardBtnMedium.on("click", function(){
        mySudokuJS.generateBoard("medium");
    });
    $generateBoardBtnHard.on("click", function(){
        mySudokuJS.generateBoard("hard");
    });
    $generateBoardBtnVeryHard.on("click", function(){
        mySudokuJS.generateBoard("very hard");
    });
*/

    $candidateToggle.on("change", function(){
        if($candidateToggle.is(":checked"))
            mySudokuJS.showCandidates();
        else
            mySudokuJS.hideCandidates();
    });
    $candidateToggle.trigger("change");




    function sb(){
        if(checkSubmit && cheker)
            window.location.assign("congrats.php")
    };

</script>
</body>
</html>

