<?php

 // Check if form was submitted:
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {

    // Build POST request:
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_secret = '6LegOuAUAAAAAAeAeearl1ANcXiYRL-bEXqlLouk';
    $recaptcha_response = $_POST['recaptcha_response'];

    // Make and decode POST request:
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $recaptcha = json_decode($recaptcha);

    // Take action based on the score returned:
    if ($recaptcha->score >= 0.5) {
        // Verified - send email
    } else {
        // Not verified - show form error
    }

} 


if(isset($_POST['submit'])) {
	$subject=$_POST['subject'];
    $name=$_POST['name'];
    $mailFrom=$_POST['email'];
    $message=$_POST['message'];
    $mailTo="editor@kabakkoapp.ml";
    $headers = "From:".$mailFrom;
    $txt = "You have received an e-mail from "  .$name.".\n\n".$message;

   mail($mailTo, $subject, $txt, $headers);
   header("Location:index.php?mailsend");
    
   }?>

