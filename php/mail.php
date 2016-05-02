

<?php
// The message

$from_email = $_POST["from_email"];
$to_email = $_POST["to_email"];
$message = $_POST["message"];



// In case any of our lines are larger than 70 characters, we should use wordwrap()
$message = wordwrap($message, 70, "\r\n");
$headers = 'From: ALIVE@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();


// Send
mail($email, 'New Notification', $message, $headers);
?>

