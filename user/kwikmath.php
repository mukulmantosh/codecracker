<?php require 'header.php'; ?>
<style>
a:link
{
color:#FFF;
 font-family: 'Audiowide', cursive;
 font-size: 15px;
}
a:visited
{
color:#FFF;
}

</style>
<link rel="stylesheet" type="text/css" href="assets/css/orbitron.css">
		
	 <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
  
  <div class="content-page">
<!-- Start content -->
<div class="content">
<div class="container">
   <!-- Page-Title -->
   <div class="row">
      <div class="col-sm-12">
         <h4 class="page-title">Kwik Math</h4>
         <p class="text-muted page-title-alt">Solve math operations as fast as possible</p>
      </div>
   </div>
   <div class="container">
      <div class="row">
         <div class="col-md-4"></div>
         <div class="col-md-2">

         <select id="questions" class="form-control">
         <option value="10">10 Questions</option>
         <option value="20">20 Questions</option>
         <option value="30">30 Questions</option>
         <option value="40">40 Questions</option>
         <option value="50">50 Questions</option>
         </select>
         <br>
         </div>

         <div class="col-md-3">
            <button id="start_game" class="btn btn-primary btn-lg">START GAME</button>

         </div>
      </div>
      <div style="margin-top:10%;"></div>
      <div class="row">
         <div class="col-md-5"></div>
         <div class="col-md-1">
            <div id="num1" style="font-size:50px;color:#ff9933;font-family: 'Orbitron', sans-serif;text-align:center;">0</div>
         </div>
         <div class="col-sm-1">
            <div id="operator" style="font-size:50px;font-family: 'Orbitron', sans-serif;text-align:center;"></div>
         </div>
         <div class="col-md-1">
            <div id="num2" style="font-size:50px;color:#ff9933;font-family: 'Orbitron', sans-serif;text-align:center;">0
         </div>
      </div>
   </div>
   <div class="col-md-3"></div>
   <div class="col-lg-6">
      <div id="show" style="font-size:60px;font-family: 'Orbitron', sans-serif;color:#33ccff;text-align:center;"></div>
   </div>
</div>

<script>
$(document).ready(function(){

$('#start_game').click(function() {

    $('#start_game').hide();
    $('#questions').hide();
  

    var right_score = 0; 
    var wrong_score = 0;
    var res; 
    var questions = $('#questions').val();
    var data1 = new Array();
    var data2 = new Array();

    for (var i = 0; i < questions; i++) {

        var random1 = Math.floor((Math.random() * 200) + 1);
        var random2 = Math.floor((Math.random() * 200) + 1);
        data1.push(random1);
        data2.push(random2);

    }

    for (var k = 0; k < questions; k++) {

      


        $('#num1').html(data1[k]);
        $('#num2').html(data2[k]);


          var operators = [{
            sign: "+",
            method: function(a, b) {
                return a + b;
            }
        }, {
            sign: "-",
            method: function(a, b) {
                return a - b;
            }
        }, {
            sign: "*",
            method: function(a, b) {
                return a * b;
            }
        }];

        var selectedOperator = Math.floor(Math.random() * operators.length);



        $('#operator').html(operators[selectedOperator].sign);

        res = operators[selectedOperator].method(data1[k], data2[k]);
        var result = prompt("What is the answer ?");

        if (result == res) {
            right_score = right_score + 5;
            
        } else {
           
            wrong_score++;
        }
    }

    var score = right_score - wrong_score;
    $('#show').html("You scored " + score);

});


    
});


</script>


<?php require 'footer.php'; ?>