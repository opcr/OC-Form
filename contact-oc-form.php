<?php
// CODE IMPORTANT À PLACER EN PREMIER SANS AUCUN AUTRE CODE QUELCONQUE AVANT. VEUILLEZ DONC À BIEN POSITIONNER L'OUVERTURE DE LA BALISE "<?php" À LA LIGNE 1 DU FICHIER CONTENANT VOTRE FORMULAIRE.
	
// "session_start();" EST UNE INSTRUCTION SERVANT À TRANSMÊTRE LES VALEURS DES CHAMPS DE FORMULAIRE LORS DE L'ENVOI DES DONNÉS POSTÉES.
	session_start();
	
// "require'recaptcha.php';" SERT à IMPORTER LES DONNéES DU FICHIER "recaptcha.php", NéCéSSAIRES à L'INTéGRATION DU RECAPTCHA AU SEIN DU FORMULAIRE
/** CELUI-CI SE CHARGE DE CONSTRUIRE LES ÉLÉMENTS TELS QUE LE CDN "<script src="https://www.google.com/recaptcha/api.js"></script>", À INTRODUIRE DANS LA BALISE <head> DU FORMULAIRE ET LE CODE HTML À L'INTéRIEUR DE LA BALISE "<div id="google-recaptcha">" CONTENANT LE CAPTCHA */
	require'recaptcha.php';
	
// CETTE LIGNE CONTIENT LA CLéF DU SITE (SITEKEY) ET LA CLéF SECRèTE (PRIVATEKEY) AFIN DE VéRIFIER L'AUTENTICITé DU RECAPTCHA. VEUILLEZ à INTRODUIRE VOS CLÉS DANS L'ORDRE ENTRE LES APOSTROPHES. POUR PROCÉDER À L'OPTENTION DE CES CLÉS VEUILLEZ CONSULTER LA DOCUMENTATION Y FAISANT RÉFÉRENCE.
	// $captcha = new Recaptcha('CLÉF DU SITE', 'CLÉF SECRÈTE'); 
	// !!! MESSAGE À L'ATTENTION DU GROUPE OC-FORM, CETTE LIGNE CI-DESSUS RESTE EN COMMENTAIRE LE TEMPS DE LA PHASE DE TEST. UNE FOIS APROUVÉ, LA LIGNE CI-DESSOUS SERA AUSSI SUPPRIMÉE.
	$captcha = new Recaptcha('6LeRqw4TAAAAACv2cu5bykspQ3leI2pycWGXkOO6', '6LeRqw4TAAAAAGq9G-4-ScUabLerK2RKDMiPQbRB');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Portfolio template</title>

<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap/bootstrap.css">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

	<!-- le code PHP ci-dessous sert à afficher la balise script contenant le cdn de Google reCaptcha généré par le fichier "recaptcha.php" -->
	<?php echo $captcha->script(); ?>
</head>

<body>
	
<!-- Navigation de la page -->
<nav class="navbar navbar-default">
	<div class="container"> 
	
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myDefaultNavbar1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
			<a class="navbar-brand" href="#">Brand</a>
		</div>
		
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="myDefaultNavbar1">
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
				<li><a href="#">Link</a></li>
				<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">Dropdown <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">Action</a></li>
						<li><a href="#">Another action</a></li>
						<li><a href="#">Something else here</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="#">Separated link</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="#">One more separated link</a></li>
					</ul>
				</li>
			</ul>
			<form class="navbar-form navbar-right" role="search">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
		<!-- /.navbar-collapse --> 
	</div>
	<!-- /.container-fluid --> 
</nav>

<!-- Contenu de page -->
<section class="container">

	<!-- ================================================================================================ -->
										<!-- Container des messages d'erreur ou succès -->
	<!-- ================================================================================================ -->
	<div class="row">
		<div class="col-xs-11 col-xs-centered col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
			
			<!-- On cherche dans les données de la session si il existe un ou plusieurs message(s) d'erreur et s'il en existe, on l'affiche -->
			<!-- Attention!!! Ne pas modifier le code ci-dessous -->
			<?php if(array_key_exists('errors', $_SESSION)): ?>
				<div class="alert alert-danger">
					<? echo implode('<br>', $_SESSION['errors']); ?>
				</div>
			<?php endif; ?>
	
			<!-- On cherche dans les données de la session s'il existe un message de réussite et si oui on confirme l'envoi du mail -->
			<?php if(array_key_exists('success', $_SESSION)): ?>
				<div class="alert alert-success">
				<!-- Modifiez ci-dessous le message de confirmation si vous le désirez -->
					<p>Votre email a bien été envoyé</p>
				</div>
			<?php endif; ?>
		</div>
	</div>

	<!-- ================================================================================================ -->
										<!-- fin du Container des messages d'erreur ou succès -->
	<!-- ================================================================================================ -->
	
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-lg-8 col-lg-offset-2">
			
	<!-- ================================================================================================ -->
														<!-- Formulaire de contact -->
	<!-- ================================================================================================ -->
			
			<h2>Formulaire</h2>
			
			<!-- Le formulaire sera géré par le fichier post_contact.php-->
			
			<form id="formulaire" action="post_contact.php" method="post">
				<div class="row">
					
					<!-- Civilités -->
					<!-- Boutons radio pour le choix de la civilité avec vérification du choix et réinjection de la valeur si le formulaire n'est pas soummis -->
					<div class="col-xs-12 form-group">
						<!-- Monsieur -->
						<label for="civilite-homme" class="radio-inline">
							<input type="radio" name="civilite" id="civilite-homme" value="monsieur" <?= isset($_SESSION['inputs']['civilite']) && $_SESSION['inputs']['civilite'] == 'monsieur' ? checked : ''; ?>>Monsieur
						</label>
						<!-- Madame -->
						<label for="civilite-femme" class="radio-inline">
						  <input type="radio" name="civilite" id="civilite-femme" value="madame" <?= isset($_SESSION['inputs']['civilite']) && $_SESSION['inputs']['civilite'] == 'madame' ? checked : ''; ?>>Madame
						</label>
					</div>
					
					
					<!-- Prénom et nom-->
					<!-- Champ prénom avec la vérification qu'il est bien renseigné et réinjection de la valeur si le formulaire n'est pas soummis -->
					<div class="col-xs-12 col-sm-6 form-group">
						<!-- Prénom -->
						<label class="control-label" for="firstname">Prénom <span class="glyphicon glyphicon-asterisk"></span></label>
						<input name="firstname" id="firstname" class="form-control" type="text" required="required" placeholder="Votre Prénom" title="Veuillez saisir votre prénom" autocomplete="on" value="<?= isset($_SESSION['inputs']['firstname']) ? $_SESSION['inputs']['firstname'] : ''; ?>">
					</div>
					
					<!-- Champ nom avec la vérification qu'il est bien renseigné et réinjection de la valeur si le formulaire n'est pas soummis -->
					<div class="col-xs-12 col-sm-6 form-group">
						<!-- Nom de famille -->
						<label class="control-label" for="lastname">Nom <span class="glyphicon glyphicon-asterisk"></span></label>
						<input name="lastname" id="lastname"class="form-control"  type="text" required="required" placeholder="Votre nom" title="Veuillez saisir votre nom" autocomplete="on" value="<?= isset($_SESSION['inputs']['lastname']) ? $_SESSION['inputs']['lastname'] : ''; ?>">
					</div>
				</div>
				
				
				<!-- Champs de coordonnées-->
				<div class="row">
					<!-- Champ : adresse mail avec la vérification qu'il est bien renseigné et réinjection de la valeur si le formulaire n'est pas soummis -->
					<div class="col-xs-12 col-sm-6 form-group">
						<label class="control-label" for="adressmail">Adresse e-mail <span class="glyphicon glyphicon-asterisk"></span></label>
						<input name="adressmail" id="adressmail" class="form-control" type="email" required="required" placeholder="Votre email" title="Veuillez saisir votre email" autocomplete="on" value="<?= isset($_SESSION['inputs']['adressmail']) ? $_SESSION['inputs']['adressmail'] : ''; ?>">
					</div>
					
					<!-- Champ: téléphone avec la vérification qu'il est bien renseigné et réinjection de la valeur si le formulaire n'est pas soummis -->
					<div class="col-xs-12 col-sm-6 form-group">
						<label class="control-label" for="phone">N° de Téléphone</label>
						<input name="phone" id="phone" class="form-control" type="tel" placeholder="Votre numéro de téléphone" tabindex="4" title="Veuillez saisir votre numéro de téléphone" autocomplete="on" value="<?= isset($_SESSION['inputs']['phone']) ? $_SESSION['inputs']['phone'] : ''; ?>">
					</div>
					
					
					<!-- Adresse Postale-->
					<!-- Champ:numero de rue avec la vérification qu'il est bien renseigné et réinjection de la valeur si le formulaire n'est pas soummis -->
					<div class="col-xs-4 col-sm-2 form-group">
						<label class="control-label" for="roadnumber">N°<span class="glyphicon glyphicon-asterisk"></span></label>
						<input name="roadnumber" id="roadnumber" class="form-control" type="text" required="required" placeholder="N°" title="Veuillez saisir le numéro de votre immeuble" autocomplete="on" value="<?= isset($_SESSION['inputs']['roadnumber']) ? $_SESSION['inputs']['roadnumber'] : ''; ?>">
					</div>
					
					<!-- Champ:nom de la rue avec la vérification qu'il est bien renseigné et réinjection de la valeur si le formulaire n'est pas soummis -->
					<div class="col-xs-8 col-sm-4 form-group">
						<label class="control-label" for="road">Rue <span class="glyphicon glyphicon-asterisk"></span></label>
						<input name="road" id="road" class="form-control" type="text" required="required" placeholder="Votre rue" title="Veuillez saisir votre rue" autocomplete="on" value="<?= isset($_SESSION['inputs']['road']) ? $_SESSION['inputs']['road'] : ''; ?>">
					</div>
					
					<!-- Champ:code postal avec la vérification qu'il est bien renseigné et réinjection de la valeur si le formulaire n'est pas soummis -->
					<div class="col-xs-4 col-sm-2 form-group">
						<label class="control-label" for="codepostal">CP<span class="glyphicon glyphicon-asterisk"></span></label>
						<input name="codepostal" id="codepostal" class="form-control" type="number" required="required" autofocus placeholder="Code Postal" title="Veuillez saisir le code postal de votre ville" autocomplete="on" value="<?= isset($_SESSION['inputs']['codepostal']) ? $_SESSION['inputs']['codepostal'] : ''; ?>">
					</div>
					
					<!-- Champ:nom de la commune avec la vérification qu'il est bien renseigné et réinjection de la valeur si le formulaire n'est pas soummis -->
					<div class="col-xs-8 col-sm-4 form-group">
						<label class="control-label" for="city">Ville <span class="glyphicon glyphicon-asterisk"></span></label>
						<input name="city" id="city" class="form-control" type="text" required="required" autofocus placeholder="Votre Ville" title="Veuillez saisir votre localité" autocomplete="on" value="<?= isset($_SESSION['inputs']['city']) ? $_SESSION['inputs']['city'] : ''; ?>">
					</div>
					
					
					<!-- Date de naissance-->
					<!-- Champ:date de naissance avec la vérification avec la vérification de type "date" HTML et réinjection de la valeur si le formulaire n'est pas soummis -->
					<div class="col-xs-12 col-sm-6 form-group">
						<label class="control-label" for="naissance">Votre date de naissance</label>
						<input name="naissance" id="naissance" class="form-control" type="date" placeholder="JJ.MM.AAAA" title="Veuillez saisir votre date de naissance" autocomplete="on" value="<?= isset($_SESSION['inputs']['naissance']) ? $_SESSION['inputs']['naissance'] : ''; ?>">
					</div>
					
					<!-- Champ:nom de site web avec la vérification de type "url" HTML et réinjection de la valeur si le formulaire n'est pas soummis -->
					<div class="col-xs-12 col-sm-6 form-group">
						<label class="control-label" for="website">Votre site web</label>
						<div class="input-group">
							<!-- input add for "#website" -->
							<span class="input-group-addon">http://</span>
							<!-- input "#website" -->
							<input name="website" id="website" class="form-control" type="url" placeholder="Votre site web" tabindex="5" title="Veuillez saisir votre site web si vous en avez un" autocomplete="on" value="<?= isset($_SESSION['inputs']['website']) ? $_SESSION['inputs']['website'] : ''; ?>">
						</div>
					</div>
				</div>
				
				<!-- Champ alimentation-->
				<div class="row">
					
					<div class="col-xs-6">
						<p><strong>Quelle est votre alimentation ?</strong></p>
						<div class="checkbox">
							<!-- case à cocher Viande avec réinjection de la valeur si le formulaire n'est pas soummis -->
							<label>
								<input type="checkbox" name="alimentation[]" value="Viande" <?= isset($_SESSION['inputs']['alimentation']) && $_SESSION['inputs']['alimentation'] == 'Viande' ? checked : ''; ?>>
								Viande
							</label>
						</div>
						<div class="checkbox">
						<!-- case à cocher légumes avec réinjection de la valeur si le formulaire n'est pas soummis -->
						<label>
							<input type="checkbox" name="alimentation[]" value="Legumes" <?= isset($_SESSION['inputs']['alimentation']) && $_SESSION['inputs']['alimentation'] == 'Legumes' ? checked : ''; ?>>
								légumes
							</label>
						</div>
						<div class="checkbox">
							<!-- case à cocher Fruits avec réinjection de la valeur si le formulaire n'est pas soummis -->
							<label>
								<input type="checkbox" name="alimentation[]" value="Fruits" <?= isset($_SESSION['inputs']['alimentation']) && $_SESSION['inputs']['alimentation'] == 'Fruits' ? checked : ''; ?>>
								Fruits
							</label>
						</div>
					</div>
					<div class="col-xs-6 form-group">
						<!-- choix de la couleur sur une tablette avec la vérification de type "color§" HTML et réinjection de la valeur si le formulaire n'est pas soummis -->
					<!-- Champ:nom de site web -->
						<label class="visible-xs-block visible-sm-block visible-md-block visible-lg-block" for="color">Quelle est votre couleur préférée ?</label>
						<input name="color" id="color" type="color" value="<?= isset($_SESSION['inputs']['color']) ? $_SESSION['inputs']['color'] : ''; ?>">
					</div>					
				</div>
				
				
				<!-- Champ de contact -->
				<div class="row">
					<div class="col-xs-12 col-sm-6 form-group">
					
					<!-- Menu déroulant avec les différents services de contact. Les adresses mails seront attribuées au travers du tableau $mailto[] dans le fichier "post_contact.php" -->	
						<label class="control-label" for="service">Veuillez choisir un service<span class="glyphicon glyphicon-asterisk"></span></label>
						<select class="form-control" name="service" required id="service">
							<!-- Option de choix 1 désactivéé et selectionnée -->
							<option value="" disabled>choisissez...</option>
							<option value="0" <?= isset($_SESSION['inputs']['service']) && $_SESSION['inputs']['service'] == '0' ? selected : ''; ?> >Administration</option>
							<option value="1" <?= isset($_SESSION['inputs']['service']) && $_SESSION['inputs']['service'] == '1' ? selected : ''; ?> >Service après-vente</option>
							<option value="2" <?= isset($_SESSION['inputs']['service']) && $_SESSION['inputs']['service'] == '2' ? selected : ''; ?> >Infos</option>
						</select>
					</div>
				</div>
				
				<!-- Champs: sujet et message de l'e-mail. -->
				<div class="row">
					<div class="col-xs-12 form-group">
						<!-- Champ:sujet du message avec la vérification qu'il est bien renseigné et réinjection de la valeur si le formulaire n'est pas soummis. Ce texte s'insère dans l'emplacement réservé à cet effet dans les e-mails. -->
						<label class="control-label" for="sujet">Sujet <span class="glyphicon glyphicon-asterisk"></span></label>
						<input name="sujet" id="sujet" class="form-control" type="text" required="required" placeholder="Veuillez saisir le sujet du message" title="Veuillez saisir le sujet du message" autocomplete="on" value="<?= isset($_SESSION['inputs']['sujet']) ? $_SESSION['inputs']['sujet'] : ''; ?>">
					</div>
					
					<!-- Champ:message avec la vérification qu'il est bien renseigné et réinjection de la valeur si le formulaire n'est pas soummis. -->
					<div class="col-xs-12 form-group">
					<label class="control-label" for="message">Message <span class="glyphicon glyphicon-asterisk"></span></label>
					<textarea name="message" rows="10" required class="form-control" id="message" placeholder="Indiquez-nous votre requête ici" tabindex="4" title="Veuillez saisir votre message"><?= isset($_SESSION['inputs']['message']) ? $_SESSION['inputs']['message'] : ''; ?></textarea>
					</div>
				</div>
				
				
				<!-- Affichage de google reCaptcha version 2 -->
				
				<div class="row">
					<div class="col-xs-12 form-group">
						<div id="google-recaptcha">
							<?php echo $captcha->html(); ?>
						</div>
					</div>
				</div>
				<!-- Boutons réinitialisation et validation-->
				<div class="row">
					<div class="col-xs-12 form-group">					
						<button type="reset" class="pull-left btn btn-default">Réinitialiser</button>
						<button type="submit" id="submit" class="pull-right btn btn-default">Envoyer</button>
					</div>
				</div>
			</form>
		</div>

		<!-- Elements cachés à utiliser pour débugger. Cette div sera supprimée lors de la phase de production --> 
		<div class="col-xs-12">
			<h2>Debug</h2>
			<!-- affichage des variables de la session -->	
			<?php
				echo var_dump($_SESSION);
			?>
		</div>
	</div>
</section>
	
<!-- pied de page-->	
<footer class="text-center">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <p>Copyright © MyCompany. All rights reserved.</p>
      </div>
    </div>
  </div>
</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.3.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
<!-- Other plugins for document -->
	<script src='https://www.google.com/recaptcha/api.js'></script>
</body>
</html>
<!-- Déconnexion: on supprime les données principales de la session-->
<?php
	unset($_SESSION['inputs']);
	unset($_SESSION['errors']); 
	unset($_SESSION['success']);
?>