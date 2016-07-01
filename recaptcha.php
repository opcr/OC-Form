<?php 
//CE FICHIER DOIT ÊTRE INTRODUIT DANS LE MÊME DOSSIER QUE LE FORMULAIRE DE CONTACT.

/* IL EST IMPÉRATIF DE NE PAS TOUCHER AU CODE CI-DESSOUS. CELUI-CI SERT À GÉRER LA CONSTRUCTION DU CONTENU DES BALISES PHP RELATIVES AU RECPTCHA, À SON TRAITEMENT ET SA VALIDATION (RÉPONSE FOURNIE PAR LE SERVICE DE GOOGLE).

VEUILLEZ DONC À INTRODUIRE VOS CLÉS À L'EMPLACEMENT PRÉVU À CET EFFET DANS LE FICHIER CONTENANT VOTRE FORMULAIRE ENTRE LES PARENTHÈSES À LA VARIABLE "$captcha".

POUR DE PLUS AMPLES INFORMATIONS SUR L'OPTENTION ET LA GESTION DES CLÉS GOOGLE RECAPTCHA, VEUILLEZ CONSULTER LA DOCUMENTATION Y FAISANT RÉFÉRENCE. */
	
	class Recaptcha {

		private $api_secret;
		private $api_site;
	
		function __construct($api_site, $api_secret){
			$this->api_secret = $api_secret;
			$this->api_site = $api_site;
		}
		
		
		/**
		* Permet de générer le code HTML du recaptcha google
		* @return string
		*/
		public function html(){
			return '<div class="g-recaptcha" data-sitekey="' . $this->api_site . '"></div>';
		}
		
		/**
		* Génère la balise script pour le recaptcha
		* @return string
		*/
		public function script(){
			return '<script src="https://www.google.com/recaptcha/api.js"></script>';
		}
		
		
		/**
		* Transmet la requette pour vérifier la réponse fournie par le recaptcha
		* @param string $code
		* @return bool
		*/
		public function is_valid($code, $ip = null){
			if(empty($code)){
				return false;
			}
			$params = [
				'secret' => $this->api_secret,
				'response' => $code,
			];			
			if($ip){
				$params['remoteip'] = $ip;
			}
			
			
			$url = "https://www.google.com/recaptcha/api/siteverify?" . http_build_query($params);
			if(function_exists('curl_version')){
				$curl = curl_init($url);
				curl_setopt($curl, CURLOPT_HEADER, false);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl, CURLOPT_TIMEOUT, 1);
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
				$response = curl_exec($curl);
			}else{
				$response = file_get_contents($url);
			}
			
			if(empty($response) || is_null($response)) {
				return false;
			}
			$json = json_decode($response);
			return $json->success;
		}
	} 
?>