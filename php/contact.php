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
    <header>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="merch.html">Merch</a></li>
            <li><a href="rating.html">Rating</a></li>
            <li><a href="review.html">Reviews</a></li>
            <li><a href="over ons.html">About us</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
        <article class="winkelwagen">

        </article>
        <article class="balk1">
            <p> .</p>
        </article>
    </header>
    <body>
<?php

$errors = [];
$errorMessage = '';

if (!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['mail'];
    $message = $_POST['text'];

    if (empty($name)) {
        $errors[] = 'vul een naam in';
    }

    if (empty($mail)) {
        $errors[] = 'vul een E-mail in';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is invalid';
    }

    if (empty($text)) {
        $errors[] = 'Vul een text in';
    }


    if (empty($errors)) {
        $toEmail = '6003599@mborijnland.nl';
        $emailSubject = 'New email from your contant form';
        $headers = ['From' => $mail, 'Reply-To' => $mail, 'Content-type' => 'text/html; charset=iso-8859-1'];

        $bodyParagraphs = ["Name: {$name}", "Email: {$mail}", "Message:", $text];
        $body = join(PHP_EOL, $bodyParagraphs);

        if (mail($toEmail, $emailSubject, $body, $headers)) {
            header('Location: .html');
        } else {
            $errorMessage = 'Oops, iets ging mis probeer het later nog een keer';
        }
    } else {
        $allErrors = join('<br/>', $errors);
        $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
    }
}


?>
    </Body>