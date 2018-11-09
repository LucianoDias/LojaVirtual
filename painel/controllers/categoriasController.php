<?php
class categoriasController extends controller {

	public function __construct(){
		parent::__construct();
	}


	public function index(){

		$dados = array();
		$cat = new categorias();

		$dados['categorias'] = $cat->listarCategoria();

		$this->loadTemplate('categorias',$dados);
	}

	public function del($id_categoria){

		if(isset($id_categoria) && !empty($id_categoria)){

			$idcat = addslashes($id_categoria);
			$cat = new categorias();
			$cat->deletarCategoria($idcat);
		    header("Location: /lojaVirtual/painel/categorias");

		}
	}

	public function add(){

		$dados = array();

		if(isset($_POST['titulo']) && !empty($_POST['titulo'])){

			$titulo = ucfirst(addslashes($_POST['titulo']));
			$cat = new categorias();
			$cat->addicionarCategoria($titulo);
			header("Location: /lojaVirtual/painel/categorias");
		}

		$this->loadTemplate('novaCategoria',$dados);
	}

	public function editar($idcat){

		$dados = array();
		$cat = new categorias();

		if(isset($_POST['titulo']) && !empty($_POST['titulo'])){

			$titulo = ucfirst(addslashes($_POST['titulo']));
			
			$cat->editarCategoria($titulo , $idcat);
			header("Location: /lojaVirtual/painel/categorias");
		}
		$dados['categoria'] = $cat->buscarCategoriaPorId($idcat);

		$this->loadTemplate('editarCategoria',$dados);
	}




}