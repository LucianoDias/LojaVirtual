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

		$dados = array("papamentos" =>array(),
			           "total" =>0,
			           "msgerro" => '' );
		$tipo_pg = new pagamentos();
		$dados['pagamentos'] = $tipo_pg->getPagamentos();
		$produtos = array();

		if(isset($_SESSION['carrinho'])){
			$produtos = $_SESSION['carrinho'];
		}
		if(count($produtos)){
			$prod = new  produtos();
			$dados['produtos'] = $prod->produtosCarrinho($produtos);

			foreach ($dados['produtos'] as $prod) {
				$dados['total'] += $prod['preco'];
			}

	    }

	    if(isset($_POST['nome']) && !empty($_POST['nome'])){

	    	$nome = addslashes($_POST['nome']);
	    	$email = addslashes($_POST['email']);
	    	$senha = md5(addslashes($_POST['nome']));
	    	$endereco = addslashes($_POST['endereco']);
	    	$tip_pg = addslashes($_POST['pg']);
            
		    if(!empty($email) && !empty($senha) && !empty($endereco) && !empty($tip_pg)){

			        $user = new usuario();
			        $usuarioId = 0;
		                
		            if($user-> usuarioExiste($email)){
			               	if($user->usuarioExiste($email,$senha)){
			               		$usuarioId = $user->buscarUsuarioPorId($email);
			                }else{
			               		 $dados['msgerro']  ="Usúario ou senha errado !";
			                }

	                }else{
	        	        $usuarioId = $user->criarNovo($nome,$email,$senha);    
	                }
                   
	                if($usuarioId > 0 ){

                            $subtotal =0;
	                		$produtos = array();

							if(isset($_SESSION['carrinho'])){
								$produtos = $_SESSION['carrinho'];
							}
							if(count($produtos)){
								$produto= new  produtos();
								$produts = $produto->produtosCarrinho($produtos);

								foreach ($produts as $prod) {
									$subtotal += $prod['preco'];
								}
						    }
						    $venda = new vendas();
						    $link = $venda->novaVenda($usuarioId,$endereco,$subtotal,$tip_pg,$produts );
						    header("Location: ".$link);



	                }



	        } else{
		    	 $dados['msgerro'] = "Preechar todos os campos ! ";
		    }

	    }

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