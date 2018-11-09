<?php
class vendas extends model {

	public function __construct(){
		parent::__construct();
	}

	public function novaVenda($usuarioId,$endereco,$subtotal,$tip_pg,$produts){
    
       
		$status ='1';
		$link ='';

		$sql ="INSERT INTO vendas SET id_usuario ='$usuarioId', endereco ='$endereco', valor='$subtotal', forma_pg ='$tip_pg', status_pg ='$status', pg_link ='$link'";
		$this->db->query($sql);
		$id_venda = $this->db->lastInsertId();


		if($tip_pg == '1'){
			$status = '2';
			$link = '/lojaVirtual/carrinho/obrigado';
			$this->db->query("UPDATE  vendas SET status_pg = '$tip_pg' WHERE idvenda = '".$id_venda."'");


		} elseif($tip_pg == '2'){

			require 'libraries/PagSeguroLibrary/PagSeguroLibrary.php';

			$paymentRequest = new PagSeguroPaymentRequest();
			
			foreach ($produts as $prod) {
				$paymentRequest->addItem($prod['idproduto'],$prod['nome'],1,$prod['preco']);
			}
			$paymentRequest->setCurrency("BRL");
			$paymentRequest->setReference($id_venda);
			$paymentRequest->setRedirectUrl("http://localhost:8080/lojaVirtual/carrinho/obrigado");
			$paymentRequest->addParameter("notificationURL","http://localhost:8080/lojaVirtual/carrinho/notificacao");

			try{
				$cred = PagSeguroConfig::getAccountCredentials();
				$link = $paymentRequest->register($cred);
			}catch(PagSeguroServiceException $e){
				echo $e->getMessage();
			}

		}
		$n=1;
        $qto = number_format($n,2,',','');
		foreach ($produts as $prod) {
			$sql = "INSERT INTO vendas_proutos SET id_venda = '$id_venda' ,id_prouto = '".($prod['idproduto'])."' , quantidade = ' ".$qto."'";
			$this->db->query($sql);
		}
		//$_SESSION['carrinho'] = array();
		unset($_SESSION['carrinho']);
		return $link;
		
	}

	public function verificarVendas(){

		require 'libraries/PagSeguroLibrary/PagSeguroLibrary.php';
		$code = '';
		$type = '';

		if(isset($_POST['notificationCode']) && isset($_POST['notificationType'])){

			$code = trim($_POST['notificationType']);
			$type = trim($_POST['notificationCode']);

			$notificationType = new PagSeguroNotificationType($type);
			$strType = $notificationType->getTypeFromValue();
			$cedentials = PagSeguroConfig::getAccountCredentials();

			try{
				$transaction = PagSeguroNotificationService::checkTransaction($cedentials,$code);
				$ref = $transaction->getReference();
				$status = $transaction->getStatus()->getValue();

				$novoStatus = 0;
				switch($status){
					case '1'://Aquardao Pg
					case '2'://Em análise
						$novoStatus = '1';
						break;
					case '3': //Pago
					case '4': //Disponivel
						$novoStatus = '2';
						break;
					case '6': //Devolvida
					case '7': //Cancelada
						$novoStatus = '3';
						break;
				}
				$this->db->query("UPDATE vendas SET status_pg ='$novoStatus' WHERE idvenda ='$ref'");

			}catch(PagSeguroServiceException $e){
				echo "FALHA :".$e->getMessage();
			}
		}
	}


	public function getPedidosDoUsuario($id_usuario){

		$data = array();

		if(isset($id_usuario) && !empty($id_usuario)){

			$sql = "SELECT *,
			(select pagamentos.nome from pagamentos 
			 where pagamentos.idpagamento = vendas.forma_pg) as tipo_pgto
			 FROM vendas WHERE id_usuario ='$id_usuario'";
			$sql = $this->db->query($sql);

			if($sql->rowCount() > 0){
				$data = $sql->fetchAll();
			}	
		}
		return $data;
	}

	public function buscarDetalhesVendas( $idcompra,$idusuario){

		$dados = array();

		if(!empty($idcompra) && !empty($idusuario)){

			$idvenda = addslashes($idcompra);
			$id_usuario = addslashes($idusuario);
			$sql = "SELECT * ,
			(select pagamentos.nome from pagamentos 
			 where pagamentos.idpagamento = vendas.forma_pg) as tipo_pgto

			FROM vendas WHERE idvenda ='$idvenda' AND id_usuario ='$id_usuario'";
			$sql = $this->db->query($sql);

			if($sql->rowCount() > 0){
				$dados = $sql->fetch();
				$dados['produtos'] = $this->buscarProdutoCompraPorId($idvenda);
			}
		}
		return $dados;	
	}

	public function buscarProdutoCompraPorId($id_venda){
        
        $dados = array();
		$sql = " SELECT 
						vendas_produtos.id_prouto,vendas_produtos.quantidade_compra,
						produtos.nome,produtos.imagem,produtos.preco,produtos.quantidade,
						produtos.descricao
						FROM vendas_produtos
						LEFT JOIN produtos ON vendas_produtos.id_prouto = produtos.idproduto
						WHERE vendas_produtos.id_venda = '$id_venda'";
		$sql = $this->db->query($sql);
		
		if($sql->rowCount() > 0 ){
			 $dados = $sql->fetchAll();
		}
		return  $dados;
	}
/*Salvar a venda  do pagseguro trasparente
$_POST, $usuarioId,$sessionId,$dados['produtos'],$dados['total']*/
	public function setVendaCkTrasparente($params,$uid,$sessionId,$prods,$subtotal){
		require 'libraries/PagSeguroLibrary/PagSeguroLibrary.php';

		$status ='1';
		$link ='';
		$end = implode(',', $params['endereco']);
		$tip_pg = 6;

		$sql ="INSERT INTO vendas SET id_usuario ='$uid', endereco ='$end', valor='$subtotal', forma_pg ='$tip_pg', status_pg ='$status', pg_link ='$sessionId'";
		$this->db->query($sql);
		$id_venda = $this->db->lastInsertId();

        // inserir os produtos da venda
		foreach ($produts as $prod) {
			$sql = "INSERT INTO vendas_proutos SET id_venda = '$id_venda' ,id_prouto = '".($prod['idproduto'])."' , quantidade = ' ".$qto."'";
			$this->db->query($sql);
		}
		//$_SESSION['carrinho'] = array();
		unset($_SESSION['carrinho']);

		$directPaymentRequest = new PagSeguroDirectyPaymentRequest();
		$directPaymentRequest->setPaymentMode('DEFAULT');
		$directPaymentRequest->setPaymentMethod($params['pg_form']);
		$directPaymentRequest->setReference($id_venda);
		$directPaymentRequest->setCurrency("BRL");
		$directPaymentRequest->addParameter("notificationURL","http://localhost:8080/lojaVirtual/carrinho/notificacao");

		foreach($prods as $prod){
			$directPaymentRequest->addItem($prod['idproduto'],$prod['nome'],1,$prod['preco']);
		}

		$directPaymentRequest->setSender(
			$params['nome'],
			$params['email'],
			$params['ddd'],
			$params['telefone'],
			'Cpf',
			$params['cpf_titular']
			);

		$directPaymentRequest->setSenderHash($params['shash']);
		$directPaymentRequest->setShippingType(3);
		$directPaymentRequest->setShippingCost(0);
		$directPaymentRequest->setShippingAddress(

			$params['endereco']['cep'],
			$params['endereco']['rua'],
			$params['endereco']['numero'],
			$params['endereco']['comp'],
			$params['endereco']['bairro'],
			$params['endereco']['cidade'],
			$params['endereco']['estado'],
			'BRA'
			);

		$billingAddress = new PagSeguroBilling(
			array(
				'postalCode' => $params['endereco']['cep'],
				'street' => $params['endereco']['rua'],
				'number' => $params['endereco']['numero'],
				'complement' => $params['endereco']['comp'],
				'district' => $params['endereco']['bairro'],
				'city' => $params['endereco']['cidade'],
				'state' => $params['endereco']['estado'],
				'country' => 'BRA'
				)
			);

		if($params['pg_form'] == 'CREDIT_CARD'){
			$parc = explode(',', $params['parcela']);

			$installments = new PagSeguroInstallmen(
				'',
				$parc[0],
				$parc[1],
				'',
				''
				);
			$creditCardData = new PagSeguroCreditCardCheckout(
				array(
					'token' => $params['ctoken'],
					'installment' => $installments,
					'billing' => $billingAddress,
					'holder' => new PagSeguroCreditCardHolder(

						array(
							'name' => $params['c_titular'],
							'birthData' => date('01/10/1979'),
							'areaCode' => $params['ddd'],
							'number' => $params['telefone'],
							'documents' => array(
								'type' => 'CPF',
								'value' => $params['cpf_titular']
								)
							)
						)
					)
				);
			$directPaymentRequest->setCreditCard($creditCardData);

		}

		try{
			$credentials = PagSeguroConfig::getAccountCredentials();
			$result = $directPaymentRequest->register($credentials);
			return $result;
		}catch(PagSeguroServiceException $e){
            die($e->getMessage());
		}
	}

	public function setLinkBySession($link,$sessionId){

		$this->db->query("UPDATE vendas SET pg_link ='$link' WHERE pg_link ='$sessionId'");
	}






}