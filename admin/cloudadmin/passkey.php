<?php 

require 'header.php'; 



function getRandomString($length = 4) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string = '';

    for ($i = 0; $i < $length; $i++) {
        $string .= $characters[mt_rand(0, strlen($characters) - 1)];
    }

    return $string;
}

$passkey= getRandomString();

?>
 <script type="text/javascript">

                function chk(){

                  var passkey=document.getElementById('passkey').value;
                  var dataString='passkey='+passkey;
                  $.ajax({

                    type:"post",
                    url:"changepasskey.php",
                    data:dataString,
                    cache:false,
                    success:function(html){

                      $('#ack').html(html);
                       $('#submit').prop('disabled', true);
                       $('#submit').hide();
                    }


                  });

                    return false;
                }


                </script>  
<div class="wrapper">
<div class="container">

 <!-- Forms -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="row">
                            	<div class="col-md-5"></div>
                                <div class="col-md-6">
                                     <br>
                                     <p>Passkey is valid upto 30 Mins.</p>
                                     <form role="form" method="post">
                                    <input type="hidden" name="passkey" id="passkey" value="<?php echo $passkey; ?>"/>   
                                    <button type="submit" id="submit" onclick="return chk()" class="btn btn-lg btn-purple waves-effect waves-light">Generate Passkey</button>
                                    </form>
                                    <br>

                                    <div class="col-md-1"></div>
                                    <div id="ack" style="font-size:40px;"></div>
                               		

                                </div>



</div>
</div>
</div>
<?php require 'footer.php'; ?>