<?php
$errors = [];

if(!array_key_exists('firstname', $_POST) || $_POST['firstname'] == ''){
	$errors['firstname'] = "Veuillez saisir votre prénom";
}

if(!array_key_exists('lastname', $_POST) || $_POST['lastname'] == ''){
	$errors['lastname'] = "Veuillez saisir votre nom de famille";
}

if(!array_key_exists('adressmail', $_POST) || $_POST['adressmail'] == '' || !filter_var($_POST['adressmail'], FILTER_VALIDATE_EMAIL)){
	$errors['adressmail'] = "Veuillez saisir un e-mail valide";
}

if(!array_key_exists('sexe', $_POST) || $_POST['sexe'] == ''){
	$errors['sexe'] = "Veuillez entrer votre sexe";
}

if(!array_key_exists('alimentation', $_POST) || $_POST['alimentation'] == ''){
	$errors['alimentation'] = "Veuillez entrer votre alimentation";
}

if(!array_key_exists('message', $_POST) || $_POST['message'] == ''){
	$errors['message'] = "Veuillez saisir un message";
}
if(!array_key_exists('g-recaptcha-response', $_POST) || $_POST['g-recaptcha-response'] == false){
	$errors['g-recaptcha-response'] = "Veuillez valider le captcha";
}
session_start();
	
if(!empty($errors)){
	header('location: contact-oc-form.php');
	$_SESSION['errors'] = $errors;
	$_SESSION['inputs'] = $_POST;
}else{
	header('location: contact-oc-form.php');
	$_SESSION['success'] = 1;
	$mailto = "info@dvwdesign.ch";
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$adressmail = $_POST['adressmail'];
    $sexe=$_POST['sexe'];
    $alimentation=$_POST['alimentation']
	$message = $_POST['message'];
	$headers = "From: \"$firstname $lastname\" <$adressmail>\r\n";
	$headers .="Reply-To: $adressmail";
   mail($mailto, 'Formulaire de contact OC-Form', $message, $headers);
}
?>
