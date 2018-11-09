<?php
class contatoController extends controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$dados = array('msgresp' => '');

		if(isset($_POST['nome']) && !empty($_POST['nome'])){

			$nome = addslashes($_POST['nome']);
			$email = addslashes($_POST['email']);
			$mensagem = $_POST['msg'];
            
			// strutura do envio
			$html = "Nome: ".$nome." <br/> E-mail : ".$email."<br/> Mensagem : ".$mensagem;
			$headers = 'From: lucianoloopdias@desenvolvimento.webege.com'."\r\n\r\n";
			$headers .='Reply-To: '.$email."\r\n\r\n";
			$headers .= 'X-Mailer: PHP/'.phpversion();
			//mail("lucianoloopdias@gmail.com","Contato pelo site em".date("d/m/Y"),$html,$headers);
			$dados['msgresp'] = "E-mail enviado com sucesso!";
			
		}

		

		$this->loadTemplate('contato',$dados);

	}
}


