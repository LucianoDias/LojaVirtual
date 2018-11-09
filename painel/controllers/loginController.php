<?php
class loginController extends controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$dados = array('aviso'=>''
			);

		if(isset($_POST['usuario']) && !empty($_POST['usuario'])){
            
			$user = addslashes($_POST['usuario']);
			$pass = md5($_POST['senha']);
            
			$sql = "SELECT * FROM admins WHERE usuario ='$user'AND senha ='$pass'";

			$sql = $this->db->query($sql);
			if($sql->rowCount() >0){
				$sql = $sql->fetch();
				$_SESSION['admlogin'] = $sql['id'];
				header("Location: /lojaVirtual/painel");
			} else{
				$dados['aviso'] = "Usúario ou senha não estão corrento !";
			}

		}

        
		$this->loadView("login",$dados);
	}

	public function sair(){
		unset($_SESSION['admlogin']);
		header("Location: /lojaVirtual/painel/login");
	}
}