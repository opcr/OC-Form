<?php
/*$mailadmin = 'admin@dvwdesign.ch';
$mailservicevente = 'service-vente@dvwdesign.ch';
$mailinfo = 'info@dvwdesign.ch';
*/


// TABLEAU DES MESSAGES D'ERREUR
$errors = [];

//SI RIEN N'EST RENSEIGNE AU NIVEAU DU CIVILITE--> MESSAGE D'ERREUR

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

// SI LE MESSAGE N'EST PAS RENSEIGNE --> MESSAGE D'ERREUR
if(!array_key_exists('phone', $_POST) || $_POST['phone'] == ''){
	$errors['phone'] = "Veuillez saisir votre numéro de téléphone";
}


if(!array_key_exists('alimentation', $_POST) || $_POST['alimentation'] == ''){
	$errors['alimentation'] = "Veuillez entrer votre alimentation";
}

// SI LE MESSAGE N'EST PAS RENSEIGNE --> MESSAGE D'ERREUR
if(!array_key_exists('destinataire', $_POST) || !isset($_POST['destinataire'])){
	$errors['destinataire'] = "Veuillez choisir le service à contacter";
}

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
	$mailto = $_POST['destinataire'];
	
	//ADRESSE MAIL QUE VOUS SOUHAITEZ:
	//$mailto = 'info@dvwdesign.ch';
	$civilite = $_POST['civilite'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$adressmail = $_POST['adressmail'];
	$phone = $_POST['phone'];
	$roadnumber = $_POST['roadnumber'];
	$road = $_POST['road'];
	$codepostal = $_POST['codepostal'];
	$color = $_POST['color'];
   $alimentation = $_POST['alimentation'];
	$city = $_POST['city'];
	$message = $_POST['message'];
	$headers = "From: $civilite \"$firstname $lastname\" <$adressmail>\r\n";
	$headers .="Reply-To: $adressmail";
   mail($mailto, 'Formulaire de contact OC-Form', $message, $headers);
}
?>
