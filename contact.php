<?php 
$errors = '';
$myemail = 'giantrotta@me.com';//<-----Put Your email address here.
if(empty($_POST['form'][0]['name'])  || 
   empty($_POST['form'][0]['email']) || 
   empty($_POST['form'][0]['subject']) || 
   empty($_POST['form'][0]['message']))
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['form'][0]['name']; 
$email_address = $_POST['form'][0]['email']; 
$subject = $_POST['form'][0]['subject']; 
$message = $_POST['form'][0]['message']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = $subject;
	$email_body = "You have received a new message. ".
	" Here are the details:\n Name: $name \n Email: $email_address \n Message \n $message"; 
	
	$headers = "From: $myemail\n"; 
	$headers .= "Reply-To: $email_address";
	
	$sent = mail($to,$email_subject,$email_body,$headers);

	if ($sent) {
		echo "<p class=\"success\">Message sent succesfully.</p>";
	} else {
		echo "<p class=\"error\">There was problem while sending E-Mail.</p>";
	}
} 
?>
