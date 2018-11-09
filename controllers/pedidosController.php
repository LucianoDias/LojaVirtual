<?php
class pedidosController extends controller {

	public function __construct(){
		parent::__construct();
	}

	public  function index(){

		$dados = array();

		if(isset($_SESSION['cliente']) && !empty($_SESSION['cliente'])){

			$vemda = new  vendas();
            
			$dados['pedidos'] = $vemda->getPedidosDoUsuario($_SESSION['cliente']);
			$this->loadTemplate("pedidos",$dados);
		} else{

			header("Location: /lojaVirtual/login");

		}
 
	}

	public function detalhes($idvenda){

		if(isset($idvenda) && !empty($idvenda)){
			$dados = array();

			$detalhes = new vendas();
			$dados['detalhes'] = $detalhes->buscarDetalhesVendas($idvenda,$_SESSION['cliente']);

				if(!empty($dados['detalhes']) ){
					$this->loadTemplate('detalhes',$dados);
				} else{
					header("Location: /lojaVirtual/pedidos");
				}

		} else{
			header("Location: /lojaVirtual/pedidos");

		}

	
	}




}