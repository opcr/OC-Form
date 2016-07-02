<?php
// TABLEAU DES ADRESSES MAILS D'ENVOI (CHAMP SELECT DU FORMULAIRE)
$mailto = ['admin@dvwdesign.ch', 'service@dvwdesign.ch', 'info@dvwdesign.ch'];


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
// SI DES CARACTÈRES NON ALPHABETIQUES SONT SAISIS, (SAUF EXCEPTIONS AUTORISÉES: espaces, trait d'union, appostrophes) --> MESSAGE D'ERREUR
elseif(preg_match('~[^[:alpha:]\s-]~u', $_POST['firstname'])){
    $errors['firstname'] = "Veuillez saisir uniquement des caractères alphabétiques";
}
//SI RIEN N'EST RENSEIGNE AU NIVEAU DU NOM DE FAMILLE--> MESSAGE D'ERREUR
if(!array_key_exists('lastname', $_POST) || $_POST['lastname'] == ''){
	$errors['lastname'] = "Veuillez saisir votre nom de famille";
}
// SI DES CARACTÈRES NON ALPHABETIQUES SONT SAISIS, (SAUF EXCEPTIONS AUTORISÉES: espaces, trait d'union, appostrophes) --> MESSAGE D'ERREUR

elseif(preg_match('~[^[:alpha:]\s-]~u', $_POST['lastname'])){
    $errors['lastname'] = "Veuillez saisir uniquement des caractères alphabétiques";
}

//SI RIEN N EST RENSEIGNE AU NIVEAU DE L'ADRESSE MAIL OU SI ELLE N'EST PAS VALIDE--> MESSAGE D'ERREUR
if(!array_key_exists('adressmail', $_POST) || $_POST['adressmail'] == '' || !filter_var($_POST['adressmail'], FILTER_VALIDATE_EMAIL)){
	$errors['adressmail'] = "Veuillez saisir un e-mail valide";
}

// SI LE MESSAGE N'EST PAS RENSEIGNE --> MESSAGE D'ERREUR
if(!array_key_exists('phone', $_POST) || $_POST['phone'] == ''){
	$errors['phone'] = "Veuillez saisir votre numéro de téléphone";
}

// SI UNE CASE N'EST PAS COCHÉE --> MESSAGE D'ERREUR
if(!array_key_exists('alimentation', $_POST) || $_POST['alimentation'] == ''){
	$errors['alimentation'] = "Veuillez entrer votre alimentation";
}

// SI LE SERVICE DEMANDÉ N'EST PAS CHOISIS OU ERRONÉ --> MESSAGE D'ERREUR
if(!array_key_exists('service', $_POST) || !isset($mailto[$_POST['service']])){
	$errors['destinataire'] = "Veuillez choisir le service à contacter";
}

// SI LE SUJET N'EST PAS RENSEIGNÉ --> MESSAGE D'ERREUR
if(!array_key_exists('sujet', $_POST) || $_POST['sujet'] == ''){
	$errors['sujet'] = "Veuillez saisir la raison de votre contact";
}

//SI LE MESSAGE N'EST PAS RENSEIGNÉ --> MESSAGE D'ERREUR
if(!array_key_exists('message', $_POST) || $_POST['message'] == ''){
	$errors['message'] = "Veuillez saisir un message";
}
// SI LE RECAPTCHA N'EST PAS RENSEIGNE OU S'IL EST MAL RENSEIGNE --> MESSAGE D'ERREUR
/*if(!array_key_exists('g-recaptcha-response', $_POST) || $_POST['g-recaptcha-response'] == false){
	$errors['g-recaptcha-response'] = "Veuillez valider le captcha";
}*/

// ON DEMARRE UNE SESSION
session_start();

// À LA SOUMMISSION DU FORMULAIRE ON RENVOIE LE VISITEUR SUR LA PAGE DU FORMULAIRE
//S'IL Y A DES ERREURS($_SESSION['errors']), ON AFFICHE LES MESSAGES D'ERREURS DEFINIS PRECEDEMMENT. SI DES CHAMPS AVAIENT ÉTÉ CORRECTEMENT REMPLIS, CEUX-CI RETROUVERONT LES VALEURS SAISIES AUPARAVANT ($_SESSION['INPUTS']).
if(!empty($errors)){
	header('location: contact-oc-form.php');
	$_SESSION['errors'] = $errors;
	$_SESSION['inputs'] = $_POST;
}
//SINON ON ENVOIE LE VISITEUR SUR LA PAGE DU FORMULAIRE AVEC UN MESSAGE DE SUCCES.
else{
	header('location: contact-oc-form.php');
	$_SESSION['success'] = 1;	
	
	
//TRAITEMENT DU FORULAIRE POUR ENVOI
	
	
	//LISTE DES VARIABLES DES CHAMPS DU FORMULAIRE:
	
	// Champs principaux du mail
	$sujet = $_POST['sujet'];
	$message = $_POST['message'];
	
	//informations complémentaires ou personnelles du client.
	$civilite = $_POST['civilite'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$adressmail = $_POST['adressmail'];
	$phone = $_POST['phone'];
	$roadnumber = $_POST['roadnumber'];
	$road = $_POST['road'];
	$codepostal = $_POST['codepostal'];
	$city = $_POST['city'];
	$color = $_POST['color'];
	
	
	// Traitement de champs particuliers
	/* $_POST['alimentation'] contient les valeurs des checkbox cochées. Le traitement de valeurs multiples associées à un groupe nécéssite l'utilisation d'un "foreach". Comme vous l'avez constaté, l'attribut "name" des checkbox du groupe "alimentation" est suivi de 2crochets (name="alimentation[]"). Celà signifie que les valeurs atribuées seront stockées dans un tableau. Le "foreach" est une fonction PHP qui permet de parcourir un tableau. L'objectif est de passer en "boucle" le tableau créé par les checkbox ayant pour atribut name "alimentation[]" */
	$aliment = '';
	foreach($_POST['alimentation'] as $aliments) {
		$aliment.= $aliments.', ';
	}
	
	// headers du mail
	$headers = "From: \"$firstname $lastname\" <$adressmail>\r\n";
	$headers .="Reply-To: $adressmail";
	
	
	// Construction du mail
	
	/* Petits points important lors de la construction de l'e-mail:
	1 " $retour_ligne = "\n"; " pour les retours à la ligne dans l'e-mail et " $retour_paragraphe = "\r\n\r\n"; " procéde à un double retour à la ligne provocant une mise en forme d'un nouveau paragraphe à la suite.
	2 Evitez les indentations pour qu'elles ne se répercutent pas sur le contenu de votre e-mail.*/
	
	// Déclaration des la variables de retour à la ligne et paragraphe
	$retour_ligne = "\n";
	$retour_paragraphe = "\r\n\r\n";
	
	//construction du tableau des données complémentaires.
	$complementarydata = "Tableau de données complémentaires:".$retour_ligne;
	$complementarydata .="Civilité: $civilite".$retour_ligne;
	$complementarydata .="Prénom: $firstname".$retour_ligne; 
	$complementarydata .="Nom de famille: $lastname".$retour_ligne; 
	$complementarydata .="Adresse e-mail: $adressmail".$retour_ligne; 
	$complementarydata .="N° de téléphonne: $phone".$retour_ligne;
	$complementarydata .="N° de la rue: $roadnumber".$retour_ligne;  
	$complementarydata .="Adresse: $road".$retour_ligne; 
	$complementarydata .="Code Postal: $codepostal".$retour_ligne; 
	$complementarydata .="Ville: $city".$retour_ligne; 
	$complementarydata .="Alimentation: $aliment".$retour_ligne; 
	$complementarydata .="Couleur préférée: $color".$retour_ligne; 
	
	
	// Construction du message de l'email
	$contentmsg = "Message reçu:".$retour_ligne;
	$contentmsg .= $message.$retour_paragraphe;
	$contentmsg .= $complementarydata;


	//Organisation des informations d'envoi
   mail($mailto[$_POST['service']], $sujet, $contentmsg, $headers);
}
?>
