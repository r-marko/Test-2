<?php
    define ("FRONTEND","Front End Developer");
    define ("BACKEND","Back End Developer");
    define ("ANGULAR","Angular");
    define ("REACT","React");
    define ("VUE","Vue");
    define ("PHP","Php");
    define ("NODEJS","NodeJs");
    define ("ANGULARJS","AngularJs");
    define ("ANGULAR2","Angular 2");
    define ("REACTNATIVE","React native");
    define ("SIMFONY","Simfony");
    define ("LARAVEL","Laravel");
    define ("EXPRESS","Express");
    define ("NESTJS","NestJs");
    define ("SILEX","Silex");
    define ("LUMEN","Lumen");


echo '
<label for="select">Select your field:</label> <br>
<select class="select" name="frontback" id="FrontBack" value=""> 
<option value="front-end">'.FRONTEND.'</option>
<option value="back-end">'.BACKEND.'</option>
</select><br>
<label for="frontend_subclass1">Select your subfield:</label> <br>
<select class="select" name="subclass1" id="subclass1" value=""> 
<option value="null"></option>
<option value="angular">'.ANGULAR.'</option>
<option value="react">'.REACT.'</option>
<option value="vue">'.VUE.'</option>
<option value="php">'.PHP.'</option>
<option value="nodejs">'.NODEJS.'</option>
</select>
<br>
<label for="frontend_subclass2">Select your subfield:</label> <br>
<select class="select" name="subclass2" id="subclass2" value=""> 
<option value="null"></option>
<option value="angularjs">'.ANGULARJS.'</option>
<option value="angular2">'.ANGULAR2.'</option>
<option value="reactnative">'.REACTNATIVE.'</option>
<option value="simfony">'.SIMFONY.'</option>
<option value="laravel">'.LARAVEL.'</option>
<option value="express">'.EXPRESS.'</option>
<option value="nestjs">'.NESTJS.'</option>
</select>
<br>
<label for="frontend_subclass3">Select your subfield:</label> <br>
<select class="select" name="subclass3" id="subclass3" value=""> 
<option value="null"></option>
<option value="silex">'.SILEX.'</option>
<option value="lumen">'.LUMEN.'</option>
</select>
<br>'
?>
<!-- <script>

// let selectFrontBack = document.getElementById("FrontBack");
// let option;
// document.addEventListener("onchange", setInterval(()=>{option = selectFrontBack.options[selectFrontBack.selectedIndex].text;
// /*console.log(option)  // Testing if the option tag works*/},1000));

// if (option == <?php /*echo FRONTEND; */ ?>){ 
//     document.getElementById("selectBar").innerHTML = 
//     <?php  /*echo '
// <label for="frontend_subclass">Select your subfield:</label> <br>
// <select class="select" id="frontend_subclass" value=""> 
// <option value="angular">'.ANGULAR.'</option>
// <option value="react">'.REACT.'</option>
// <option value="vue">'.VUE.'</option>
// </select>
// <br>'; */?>
// }
// </script>  -->
