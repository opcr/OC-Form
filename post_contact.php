<?php
$errors = [];
if(!array_key_exists('civilite', $_POST) || $_POST['civilite'] == ''){
	$errors['civilite'] = "Veuillez spécifier votre \"Civilité\"";
}

//SI RIEN N'EST RENSEIGNE AU NIVEAU DU PRENOM--> MESSAGE D'ERREUR

if(!array_key_exists('firstname', $_POST) || $_POST['firstname'] == ''){
	$errors['firstname'] = "Veuillez saisir votre prénom";
}

//SI RIEN N'EST RENSEIGNE AU NIVEAU DU NOM DE FAMILLE--> MESSAGE D'ERREUR

if(!array_key_exists('lastname', $_POST) || $_POST['lastname'] == ''){
	$errors['lastname'] = "Veuillez saisir votre nom de famille";
}

//SI RIEN N EST RENSEIGNE AU NIVEAU DE L'ADRESSE MAIL OU SI ELLE N'EST PAS VALIDE--> MESSAGE D'ERREUR

if(!array_key_exists('adressmail', $_POST) || $_POST['adressmail'] == '' || !filter_var($_POST['adressmail'], FILTER_VALIDATE_EMAIL)){
	$errors['adressmail'] = "Veuillez saisir un e-mail valide";
}

<<<<<<< a454b4cbf5e8427fcc1100419ec71fb0d226ab50
if(!array_key_exists('phone', $_POST) || $_POST['phone'] == ''){
	$errors['phone'] = "Veuillez saisir votre numéro de téléphone";
}
if(!array_key_exists('alimentation', $_POST) || $_POST['alimentation'] == ''){
	$errors['alimentation'] = "Veuillez entrer votre alimentation";
}
=======
// SI LE MESSAGE N'EST PAS RENSEIGNE --> MESSAGE D'ERREUR
>>>>>>> ajouts de commentaires au fichier post_contact.php

if(!array_key_exists('message', $_POST) || $_POST['message'] == ''){
	$errors['message'] = "Veuillez saisir un message";
}
// SI LE RECAPTCHA N'EST PAS RENSEIGNE OU S'IL EST MAL RENSEIGNE --> MESSAGE D'ERREUR
if(!array_key_exists('g-recaptcha-response', $_POST) || $_POST['g-recaptcha-response'] == false){
	$errors['g-recaptcha-response'] = "Veuillez valider le captcha";
}

// ON DEMARRE UNE SESSION
session_start();

// S'IL Y A DES ERREURS, ON AFFICHE LES MESSAGES D'ERREURS DEFINIS PRECEDEMMENT
if(!empty($errors)){
	header('location: contact-oc-form.php');
	$_SESSION['errors'] = $errors;
	$_SESSION['inputs'] = $_POST;
}
//SINON ON ENVOIE UN MAIL A L'ADRESSE QUE VOUS INDIQUEZ
else{
	header('location: contact-oc-form.php');
	$_SESSION['success'] = 1;
	
	//ADRESSE MAIL QUE VOUS SOUHAITEZ:
	$mailto = "info@dvwdesign.ch";
	
<<<<<<< a454b4cbf5e8427fcc1100419ec71fb0d226ab50
	$civilite = $_POST['civilite'];
=======
>>>>>>> ajouts de commentaires au fichier post_contact.php
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$adressmail = $_POST['adressmail'];
   $alimentation = $_POST['alimentation'];
	$message = $_POST['message'];
	
	$headers = "From: $civilite \"$firstname $lastname\" <$adressmail>\r\n";
	$headers .="Reply-To: $adressmail";
   mail($mailto, 'Formulaire de contact OC-Form', $message, $headers);
}
?>
