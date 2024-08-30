<body>
<?php
	
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

@include '../controller/controller.php';
	
if(isset($_POST["submit"])){
	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->Host = "smtp.gmail.com";
	$mail->SMTPAuth = true;
	$mail->Username = "apply@beeparty.net";
	$mail->Password = $password;

	$mail->setFrom("globaldev.info.de@gmail.com", "BEEPARTY.NET - Neue Bewerbung");
	$mail->addAddress("ardayusufkivilcim@gmail.com", "BEEPARTY.NET - Neue Bewerbung ".$_POST['apply_type']);

	$mail->isHTML(true);
	$mail->Subject = $_POST["Vorname"];
	$mail->Body = "Eine neue Bewerbung ist eingetroffen.<br>Bewerbung als: ".$_POST['apply_type']."<br>Bewerber: ".$_POST['Vorname']." ".$_POST['Nachname']."<br>E-Mail-Adresse: ".$_POST['E-Mail-Adresse']."<br>Telefon Nummer: ".$_POST['Telefon']."<br><br>Bewerbung:<br>".$_POST['message'];

	if($mail->send()){
		session_start();
		session_unset();
		session_destroy();
		
		?><center><h3><b><font color="green" size="3">Deine Bewerbung wurde erfolgreich abgesendet.<br>Bitte schauen Sie innerhalb 48 Studen auf ihren Email Postfach.</font></b></h3></center><?php
	} else {
		echo "Es gab einen Fehler ".$mail->ErrorInfo;
	}
}
?>
</body>
	
	
<style>

#save{
	margin: 5px;
	padding: 10px 20px;
	font-size: 18px;
	background-color: #27ae60;
	color: #fff;
	border: none;
	border-radius: 5px;
	cursor: pointer;
	transition: background-color 0.3s ease;
}
	
#save:hover{
	background-color: #219d54;
	transform: scale(1.05);
	box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}
	
</style>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />


  <title>BEEPARTY.NET - Bewerbungsformular</title>
  <meta name="description" content="BEEPARTY.NET - Bewerbungsformular">
  <meta name="theme-color" content="#000000">
	
	
  <link rel="stylesheet" href="css/fonts/font-awesome.min.css">
  <link rel="stylesheet" href="css/fonts/ionicons.min.css">
  <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Dosis:400,600,700|Poppins:400,600,700&display=swap" rel="stylesheet" />
</head>
	
<div id="contact">
	<center>
		<form action="" method="post">	
		<?php
		$user_agent = $_SERVER["HTTP_USER_AGENT"];
		if(preg_match("/(android|webos|avantgo|iphone|ipod|ipad|bolt|boost|cricket|docomo|fone|hiptop|opera mini|mini|kitkat|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i",$user_agent )){?>
			<div style="width: 100%">
		<?php
		}else{?>
			<div style="width: 50%">
		<?php
		}?>
				<div class="team-clean" style="background: #c36728;">
					<div class="container" style="filter: blur(0px);padding-bottom: 2%;"></div>
					<center><font face="Cormorant SC"><h3><b><font color="white" size="7">BEWERBUNG</font></b></h3></font></center>
					<div class="container" style="filter: blur(0px);padding-bottom: 2%;"></div>
				</div>
					
				<div class="team-clean" style="background: #4b4b4b;">
					<div class="container" style="filter: blur(0px);padding-bottom: 2%;"></div>
				</div>

				<div class="team-clean" style="background: #4b4b4b;">
					<div class="container" style="filter: blur(0px);padding-bottom: 0%;">
						<div class="contact-card">
							<center>
								<div class="contact-pos-center">
									<input class="contact-text-1" style="width: 30%;" type="text" name="Vorname" required placeholder="&nbsp;&nbsp;Vorname">
									<input class="contact-text-2" style="width: 30%;" type="text" name="Nachname" required placeholder="&nbsp;&nbsp;Nachname">
								</div>
								<div class="contact-pos-center">
									<input class="contact-text-1" style="width: 30%;" type="text" name="Telefon" placeholder="&nbsp;&nbsp;Telefon">
									<input class="contact-text-2" style="width: 30%;" type="email" name="E-Mail-Adresse" required placeholder="&nbsp;&nbsp;E-Mail-Adresse">
								</div>
								<br>
								<div class="contact-pos-center">
									<div class="row">
										<textarea class="contact-text-1" name="message" rows="10%" cols="50%" placeholder="&nbsp;Ihre Bewerbung.."></textarea>
									</div>
								</div>
								<div class="team-clean" style="background: #4b4b4b;">
									<div class="container" style="filter: blur(0px);padding-bottom: 2%;"></div>
								</div>
							</center>
						</div>
					</div>
				</div>
				<div class="team-clean" style="background: #4b4b4b;">
					<div class="container" style="filter: blur(0px);padding-bottom: 2%;"></div>
					<center>
						
						<select name="apply_type">
							<option value="Moderation">Moderation</option>
							<option value="Builder">Builder</option>
							<option value="Developer">Developer</option>
						</select>
						
						<h3><b><input id="save" type="submit" name="submit" value="Abschicken" class="form-btn"></b></h3>
					</center>
					<div class="container" style="filter: blur(0px);padding-bottom: 2%;"></div>
				</div>
			</div>
			</div>
		</form>
	</center>
</div>
	
	
