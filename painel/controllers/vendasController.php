<?php
class vendasController extends controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){

		$dados = array();
		$vendas = new vendas();
		$dados['vendas'] = $vendas->buscarVendas();
		$this->loadTemplate('vendas',$dados);
	}
/*Mostrar Detalhes da venda*/
	public function detalhes($idvenda){

		$dados = array(
			'detalhes' => array(),
			'produtos' => array()
		);
		if(!empty($idvenda)){

			$idvenda = addslashes($idvenda);
			$vendas = new vendas();
			$dados['detalhes'] = $vendas->buscarVendasPorId($idvenda);
			$dados['produtos'] = $vendas->buscarProdutoVenda($idvenda);
		}
		$this->loadTemplate('detalhesCompra',$dados);

		
	}
}