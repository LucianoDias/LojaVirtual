<?php
class homeController extends controller {


	public function __construct(){
		parent::__construct();
		$adm = new Admins();

		if($adm->isLogged() == false){
			echo "false";exit;
			header("Location: /lojaVirtual/painel/login");

		}
	}

	public function index(){
		$dados = array();

		$this->loadTemplate('home',$dados);
	}

	public function login(){
		echo "Jesus";
	}
}