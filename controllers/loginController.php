<?php
class loginController extends controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){

		$dados = array('aviso'=>''
			);

		if(isset($_POST['email']) && !empty($_POST['email'])){

			$email = addslashes($_POST['email']);
			$senha = md5($_POST['senha']);
            
            //var_dump($email,$senha); exit;
			$usuario= new usuario();
			if($usuario->usuarioExiste($email,$senha)){
				$_SESSION['cliente'] = $usuario-> buscarUsuarioPorId($email);
				header("Location: /lojaVirtual/pedidos");
			} else{
				$dados['aviso'] = "E-mail ou senha não estão corrento !";
			}

		}


		$this->loadTemplate("login",$dados);
	}

	public function logout(){
		unset($_SESSION['cliente']);
		header("Location: /lojaVirtual/login");
	}
}