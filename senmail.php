<?php

$to = "yoruageha@gmail.com"; // this is your Email address
$from = "yoruageha@gmail.com"; // this is the sender's Email address
$first_name = "ghina";
$last_name = "garces";
$subject = "Form submission";
$message = "hola";
$subject2 = "Copy of your form submission";
$message2 = "Here is a copy of your message \n\n";
$headers = "From:" . $from;
$headers2 = "From:" . $to;
mail($to,$subject,$message,$headers);
mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
// You can also use header('Location: thank_you.php'); to redirect to another page.
?>