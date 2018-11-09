<?php
class produtosController extends controller {

	public function __construct(){
		parent::__construct();
	}
/* Função de Index Produto na loja*/
	public function index(){
        
        $offset =0;
        $limit =10;
		$dados = array();
        //var_dump($_GET);exit;
		if(isset($_GET['p']) && !empty($_GET['p'])){
			$p = addslashes($_GET['p']);
			$offset = ($limit * $p) - $limit;
		}

		$prods = new produtos();
		$dados['limit_produtos'] = $limit;
		$dados['total_produtos'] = $prods->buscarTotalProdutos();
		$dados['produtos'] = $prods->buscarProdutos($offset,$limit);
		$this->loadTemplate('produtos',$dados);
	}
/* Função de addicionar Produto na loja*/
	public function addProduto(){

		$dados = array(
			'categorias' => array()
		);
		$cat = new categorias();
		$dados['categorias'] = $cat->listarCategoria();

		if(isset($_POST['nome']) && !empty($_POST['nome']) && isset($_FILES['imagem']) && !empty($_FILES['imagem']['tmp_name'])){

			$nome = addslashes($_POST['nome']);
			$descricao = addslashes($_POST['descricao']);
			$categoria = addslashes($_POST['categoria']);
			$preco = addslashes($_POST['preco']);
			$quantidade = addslashes($_POST['quantidade']);
			$imagem = $_FILES['imagem'];
			
			if(in_array($imagem['type'], array('image/jpeg','image/jpg','image/png'))){
                $extensao ='jpg';
                if($imagem['type'] == 'imagem/png'){ $extensao = 'png';}
                $md5imagem = md5(time().rand(0,9999)).'.'.$extensao;
				move_uploaded_file($imagem['tmp_name'], '../assets/imagens/produtos/'.$md5imagem);

				$prod = new produtos();
				$prod->inserirProduto($nome,$descricao,$categoria,$preco,$quantidade,$md5imagem);
				header("Location: /lojaVirtual/painel/produtos");
			}
		}
		$this->loadTemplate('novoProdutos',$dados);	
	}
 /*função para editar os produtos da loja*/
	public function editar($idproduto){

		$dados = array(
			'categorias' => array(),
			'produto' => array()
		);
		$cat = new categorias();
		$dados['categorias'] = $cat->listarCategoria();
		$prod = new produtos();
		$dados['produto'] = $prod->buscarProdutoPorId($idproduto);
        /* Primeiro a atualização dos dados */
		if(isset($_POST['nome']) && !empty($_POST['nome'])){

			$nome = addslashes($_POST['nome']);
			$descricao = addslashes($_POST['descricao']);
			$categoria = addslashes($_POST['categoria']);
			$preco = addslashes($_POST['preco']);
			$quantidade = addslashes($_POST['quantidade']);
			$imagem = $_FILES['imagem'];
			$prod->updateProduto($idproduto,$nome,$descricao,$categoria,$preco,$quantidade);
            /* segudno a atualização a imagem */
			if(isset($_FILES['imagem']) && !empty($_FILES['imagem']['tmp_name'])){

				if(in_array($imagem['type'], array('image/jpeg','image/jpg','image/png'))){

		            $extensao ='jpg';
		            if($imagem['type'] == 'imagem/png'){ $extensao = 'png';}
		            $md5imagem = md5(time().rand(0,9999)).'.'.$extensao;
					move_uploaded_file($imagem['tmp_name'], '../assets/imagens/produtos/'.$md5imagem);
					$prod->updateImagem($idproduto,$md5imagem);
				}
			}	
			header("Location: /lojaVirtual/painel/produtos");		 
		}
		
		$this->loadTemplate('editarProduto',$dados);	
	}
/* Função excluir o Produto da loja*/
	public function del($idproduto){

		if(isset($idproduto) && !empty($idproduto)){

			$idproduto = addslashes($idproduto);
			$prod = new produtos();
			$prod->deletarProduto($idproduto);
		}
		
		header("Location: /lojaVirtual/painel/produtos");	

	}



	


}