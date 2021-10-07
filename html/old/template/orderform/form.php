<?
include('kcaptcha/kcaptcha.php');
session_start();
require_once("config.php");
require_once("kcaptcha/util/script.php");

if ($_POST['act']== "y")
{
    if(isset($_SESSION['captcha_keystring']) && $_SESSION['captcha_keystring'] ==  $_POST['keystring'])
    {
        
        if (isset($_POST['posName']) && $_POST['posName'] == "")
        {
         $statusError = "$errors_name";
        }
        elseif (isset($_POST['posTel']) && $_POST['posTel'] == "")
        {
         $statusError = "$errors_tel";
        }
        elseif (isset($_POST['posDen']) && $_POST['posDen'] == "")
        {
         $statusError = "$errors_den";
        }
        elseif (isset($_POST['posVremy']) && $_POST['posVremy'] == "")
        {
         $statusError = "$errors_vremy";
        }

elseif (!empty($_POST))
{   
 $headers  = "MIME-Version: 1.0\r\n";
 $headers .= "Content-Type: $content  charset=$charset\r\n";
 $headers .= "Date: ".date("Y-m-d (H:i:s)",time())."\r\n";

 $headers .= "X-Mailer: My Send E-mail\r\n";

 mail("$mailto","$subject","$message","$headers");
 /* clean variables */
 unset($name, $mailto, $subject, $posDen, $posTel, $posVremy, $message);

 $statusSuccess = "$send";
}

       }else{
             $statusError = "$captcha_error";
             unset($_SESSION['captcha_keystring']);
        }
}
?>
<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1251">
<title>Oder form</title>
<style>
#j {border:1px solid #e1e1e1; background-color:#efefef; text-align:justify; padding:3px; width:330px;}
#q {border:1px solid #e1e1e1; background-color:#ffffff; text-align:justify; padding:3px;}
html,body{font-family:Tahoma;}
#recom {width:220px;padding:10px; position:absolute; text-align:justify}
fieldset {border:0;margin:0;padding:10;} fieldset b{font-size:90%}
label {display:block;}
input,textarea {width:300px;padding:3px;margin:1px 0;border:solid 1px #000}
</style>
</head>
<body>

<div id="j">
<p id="emailSuccess"><strong style="color:green;"><?php echo $statusSuccess.$r0; ?></strong></p>
<p id="emailError"><strong style="color:red;"><?php echo $statusError.$r1; ?></strong></p>
<!--<div id="recom"></div> -->
<div id="q"><form action="form.php" method="post" id="cForm">
<input type="hidden" name="act" value="y" />
<fieldset>
<label for="posName"><b>Your name:</b></label>
<input class="inputIE" type="text" size="47" name="posName" id="posName" required />
<label for="posTel"><b>Phone number:</b></label>
<input class="inputIE" type="text" size="47" name="posTel" id="posTel" required />
<label for="posDen"><b>Date:</b></label>
<input class="inputIE" type="text" size="47" name="posDen" id="posDen" required />
<label for="posVremy"><b>Time:</b></label>
<input class="inputIE" type="text" size="47" name="posVremy" id="posVremy" required />
<label for="table"><b>The number of table:</b></label>
<input class="inputIE" type="text" size="47" name="table" value="<?= $_GET['table'] ?>" placeholder="<?= $_GET['table'] ?>" />
</div>
<div id="q"><label for="posCaptcha"><b>The digits on the picture</b>:</label>
<img src="kcaptcha/index.php?<?php echo session_name()?>=<?php echo session_id()?>"><?php echo $r1; ?><br>
<input class="inputIE" type="text" size="47" name="keystring" id="keystring" /></div>
<div id="q"><label><input class="inputIE" type="submit" name="selfCC" value=" Отправить " /></label>
</fieldset>
</form>
</div></div>
</body>
</html>