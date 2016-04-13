<?php
	session_start();
	require'recaptcha.php';
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
<link rel="stylesheet" href="css/bootstrap.css">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	 <?php echo $captcha->script(); ?>
</head>

<body>
<nav class="navbar navbar-default">
  <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myDefaultNavbar1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="#">Brand</a> </div>
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
<section>
	<div class="row">
			<div class="col-xs-11 col-xs-centered col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
				<?php if(array_key_exists('errors', $_SESSION)): ?>
				<div class="alert alert-danger">
					<? echo implode('<br>', $_SESSION['errors']); ?>
				</div>
				<?php endif; ?>
				
				
				<?php if(array_key_exists('success', $_SESSION)): ?>
				<div class="alert alert-success">
					Votre email a bien été envoyé
				</div>
				<?php endif; ?>
		</div>
	</div>
	<div class="row">
			<div class="col-xs-11 col-xs-centered col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
				<h2>Formulaire</h2>
				<form id="formulaire" action="post_contact.php" method="post" class="row">
					<div class="col-xs-12">
						<div class="row">
							<div class="col-xs-12 col-sm-6 form-group">
								<label class="control-label" for="firstname">Prénom <span class="glyphicon glyphicon-asterisk"></span></label>
								<input name="firstname" type="text" data-validation="alphanumeric" data-validation-error-msg="Veuillez saisir votre Prénom" required="required" autofocus class="form-control" id="firstname" placeholder="Votre Prénom" tabindex="1" title="Veuillez saisir votre prénom" autocomplete="on" value="<?= isset($_SESSION['inputs']['firstname']) ? $_SESSION['inputs']['firstname'] : ''; ?>">
								<div class="has_error"></div>
							</div>
							<div class="col-xs-12 col-sm-6 form-group">
								<label class="control-label" for="lastname">Nom <span class="glyphicon glyphicon-asterisk"></span></label>
								<input name="lastname" type="text" data-validation="alphanumeric" data-validation-error-msg="Veuillez saisir votre nom de famille" required="required" class="form-control" id="lastname" placeholder="Votre nom" tabindex="2" title="Veuillez saisir votre nom" autocomplete="on" value="<?= isset($_SESSION['inputs']['lastname']) ? $_SESSION['inputs']['lastname'] : ''; ?>">
								<div class="has_error"></div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-6 form-group">
								<label class="control-label" for="adressmail">Adresse e-mail <span class="glyphicon glyphicon-asterisk"></span></label>
								<input name="adressmail" type="email" data-validation="email" data-validation-error-msg="Veuillez saisit votre adresse mail" required="required" class="form-control" id="adressmail" placeholder="Votre email" tabindex="3" title="Veuillez saisir votre email" autocomplete="on" value="<?= isset($_SESSION['inputs']['adressmail']) ? $_SESSION['inputs']['adressmail'] : ''; ?>">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 form-group">
								<label class="control-label" for="message">Message <span class="glyphicon glyphicon-asterisk"></span></label>
								<textarea name="message" rows="10" required class="form-control" id="message" placeholder="Indiquez-nous votre requête ici" tabindex="4" title="Veuillez saisir votre message"><?= isset($_SESSION['inputs']['message']) ? $_SESSION['inputs']['message'] : ''; ?></textarea>
							</div>
						</div>
						
						
					
						<div class="row">
							<div class="col-xs-12 form-group">
								<div id="google-recaptcha">
								<?php echo $captcha->html(); ?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 form-group">
								<button type="reset" class="pull-left btn btn-default">Réinitialiser</button>
								<button type="submit" id="submit" class="pull-right btn btn-default">Envoyer</button>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="col-xs-12 hidden">
				<h2>Debug</h2>
				<?php
					echo var_dump($_SESSION);
				?>
			</div>
		</div>
</section>
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
<?php
	unset($_SESSION['inputs']);
	unset($_SESSION['errors']); 
	unset($_SESSION['success']);
?>