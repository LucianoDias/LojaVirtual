<?php
class carrinhoController extends controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){

		$dados = array();
		$produtos = array();

		if(isset($_SESSION['carrinho'])){
			$produtos = $_SESSION['carrinho'];
		}
		$prod = new  produtos();
		$dados['produtos'] = $prod->produtosCarrinho($produtos);

		if( empty($dados['produtos'])){
			header("Location: /lojaVirtual");
		}	
		$this->loadTemplate('carrinho',$dados);
	}

	public function add($id =''){

		if(!empty($id)){
			if(!isset($_SESSION['carrinho'])){
				$_SESSION['carrinho'] = array();
			}
			$_SESSION['carrinho'] [] = $id;
			header("Location: /LojaVirtual/carrinho");
		}		
	}

	public function del($id){

		if(!empty($id)){
           
			foreach($_SESSION['carrinho'] as $carchave => $carvalor) {

				if($id == $carvalor){
					unset($_SESSION['carrinho'][$carchave]);
				}
			}
			header("Location: /LojaVirtual/carrinho");
		}
	}

	public function finalizar(){

		$dados = array(
			'total' => 0,
			'sessionId' =>'',
			'erro' =>'',
			'produtos' => array()
		);
		require 'libraries/PagSeguroLibrary/PagSeguroLibrary.php';
		$prods = array();
		if(isset($_SESSION['carrinho'])){
			$prods = $_SESSION['carrinho'];
		}
		if(count($prods) > 0){
			$produtos = new produtos();
			$dados['produtos'] = $produtos->buscarProdutosPorId($prods);
            
			foreach($dados['produtos'] as $prod){
 				$dados['total'] += $prod['preco'];
			}
		}

		if(isset($_POST['pg_form']) && !empty($_POST['pg_form'])){ //if  principal

			$nome = addslashes($_POST['nome']);
			$email = addslashes($_POST['email']);
			$senha = md5(addslashes($_POST['senha']));
			$sessionId = addslashes($_POST['sessionId']);
				
				if(!empty($email) && !empty($senha)){ // if  segundario

					$user = new usuario();
			        $usuarioId = 0;    
		            if($user-> usuarioExiste($email)){ // if analisar usuario

				               	if($user->usuarioExiste($email,$senha)){
				               		$usuarioId = $user->buscarUsuarioPorId($email);
				                }else{
				               		 $dados['msgerro']  ="Usúario ou senha errado !";
				                }
	                }else{ // end if analisar usuario
	        	        $usuarioId = $user->criarNovo($nome,$email,$senha);    
	                } // end if analisar usuario

	                if($usuarioId > 0){ // if analisar comprar
	                	$vendas = new vendas();
	                	$venda = $vendas->setVendaCkTrasparente($_POST, $usuarioId,$sessionId,$dados['produtos'],$dados['total']);
	                	$ipo = $venda->getPaymentMethod()->getType()->getValue();
	                	if($ipo == '4'){
	                		$link = $venda->getPaymentLink();
	                		$vendas->setLinkBySession($link,$sessionId);
	                		header("Location:".$link);
	                	} else{
	                		header("Location: /lojaVirtual/carrinho/obrigado");
	                	}

	                }// if analisar comprar


				} else{ //  end if  segundario
                        $dados['error'] = "Preecha todos os Campos !";
				}// end if  segundario



		} else{ //if  principal
				try{
					$credentials = PagSeguroConfig::getAccountCredentials();
					$dados['sessionId'] = PagSeguroSessionService::getSession($credentials);
				}catch(PagSeguroServiceException $e){
	               die($e->getMessage());
			    }
		} //if  principal

		

		$this->loadTemplate("finalizar_compra",$dados);	
	}

	public function notificacao(){

		$venda = new vendas();
		$venda->verificarVendas();
	} 

	public function obrigado(){
        
        $dados = array();
		$this->loadTemplate("obrigado",$dados);

	}




}