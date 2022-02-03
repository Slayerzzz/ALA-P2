<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
</head>
<link rel="stylesheet" href="css/contact.css">

<body>
    <body>
<?php

if (isset($_POST['Email'])) {

    
    $email_to = "6003599@mborijnland.nl";
    $email_subject = "Nieuwe opmerking";

    function problem($error)
    {
        echo "sorry er zit een fout in de form ";
        echo "These errors appear below.<br><br>";
        echo $error . "<br><br>";
        echo "Please go back and fix these errors.<br><br>";
        die();
    }

   
    if (
        !isset($_POST['Name']) 
        !isset($_POST['mail']) 
        !isset($_POST['text'])
    ) {
        problem('sorry er zit een fout in de form');
    }

    $name = $_POST['Name']; 
    $email = $_POST['mail']; 
    $message = $_POST['text']; 

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if (!preg_match($email_exp, $email)) {
        $error_message .= 'Deze mail bestaat niet.<br>';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if (!preg_match($string_exp, $name)) {
        $error_message .= 'Dit is geen echte naam.<br>';
    }

    if (strlen($message) < 2) {
        $error_message .= 'voer een echte opmerking in.<br>';
    }

    if (strlen($error_message) > 0) {
        problem($error_message);
    }

    $email_message = "Form details below.\n\n";

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message .= "Name: " . clean_string($name) . "\n";
    $email_message .= "mail: " . clean_string($email) . "\n";
    $email_message .= "text: " . clean_string($message) . "\n";

    // create email headers
    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
?>
    bedankt we nemen zo snel mogelijk contact met je op

<?php
}
?>
   