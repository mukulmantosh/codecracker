<?php require 'header.php'; ?>

<style type="text/css">

textarea {
    resize: none;
}

</style>


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
								<h4 class="page-title">Submit Questions</h4>
								<ol class="breadcrumb"></ol>
							</div>
						</div>
						


<?php

$request= $db->selectCollection('stud_access');
$requestfind= $request->find();
foreach($requestfind as $req)
{
	$req["access"];
}

if($req["access"]==='NOTALLOW')

{
	echo "<div class='row'>";
	echo "<div class='col-md-4'></div>";
	echo "<div class='col-md-3'>";
	echo "<center><img src='icons/angry.svg' class='img-responsive' width='293' height='293'></center><br>";
	echo "</div>";
	echo "</div>";

	echo "<center><strong><p style='font-size:40px;color:#ff4d88;'>UNAUTHORIZED ACCESS PROHIBITED !!!</p></strong></center>";

}
else
{

?>





<form method="post" id="form" class="form-horizontal form-row-separated">






<textarea name="question" id="question" placeholder="Enter Question" rows="10"  class="form-control" required></textarea>



Category:<select class="form-control" name="category" id="category">
<?php
$category= $db->selectCollection('test');
$categoryfind= $category->find(array("testtype" => "mcq"));


foreach($categoryfind as $cat)
{
?>

<option value="<?php echo $cat["testname"]; ?>"><?php echo strtoupper($cat["testname"]); ?></option>

<?php
}

?>

</select>

<br>
<input class="form-control" type="text" id="option1" name="option1" placeholder="OPTION 1" />
<br>
<input class="form-control" type="text" id="option2" name="option2" placeholder="OPTION 2" />
<br>
<input class="form-control" type="text" id="option3" name="option3" placeholder="OPTION 3" />
<br>
<input class="form-control" type="text" id="option4" name="option4" placeholder="OPTION 4" />
<br>
<input class="form-control" type="text" id="answer" name="answer" placeholder="ANSWER(ENTER OPTION NUMBER)" />

<center>
<p><strong><span style="color:red;">*</span> THE ANSWER SHOULD MATCH WITH THE OPTION (PLEASE GIVE ATTENTION TO CASE-SENSITIVE)</strong></p>
</center>
<br>
<div class="form-group last">
   <center><button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit Question</button></center>
 

 </form> 


<script>

function enableTab(id) {
    var el = document.getElementById(id);
    el.onkeydown = function(e) {
        if (e.keyCode === 9) { // tab was pressed

            // get caret position/selection
            var val = this.value,
                start = this.selectionStart,
                end = this.selectionEnd;

            // set textarea value to: text before caret + tab + text after caret
            this.value = val.substring(0, start) + '\t' + val.substring(end);

            // put caret at right position again
            this.selectionStart = this.selectionEnd = start + 1;

            // prevent the focus lose
            return false;

        }
    };
}

// Enable the tab character onkeypress (onkeydown) inside textarea...
// ... for a textarea that has an `id="my-textarea"`
enableTab('question');


</script>
<script type="text/javascript">
    $('#submit').click(function() {

 
        $.ajax({

            type: "post",
            url: "acceptquestion.php",
            data: $('#form').serialize(),
            cache: false,
            success: function(data,status) {
                var msg= data;
                  $('#form')[0].reset();
                if(status!="success") {

                    alert('Something went wrong.');
                }else{
                    if(msg=="success")
                    {
                        $.Notification.autoHideNotify('success', 'top left', 'Exam Notification', 'Question Received Successfully');
                    }else
                    {
                        $.Notification.autoHideNotify('error', 'top right', 'ERROR', '' + msg + '');
                    }

                }




               
            }
        });
        return false;
    });
</script>

<?php } ?>

<?php require 'footer.php'; ?>