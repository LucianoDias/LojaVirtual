<?php
class vendas extends model{

	public function __construct(){
		parent::__construct();
	}
/*exibir todas as compras dos clientes*/
	public function buscarVendas(){
		$data = array();
		 
        $sql = "SELECT vendas.idvenda,vendas.valor,vendas.status_pg,
					   usuarios.nome as usuario,
					   pagamentos.nome as forma 
				FROM vendas 
				LEFT JOIN usuarios ON usuarios.idusuario = vendas.id_usuario
	            LEFT JOIN pagamentos ON pagamentos.idpagamento = vendas.forma_pg
	            ORDER BY vendas.idvenda ASC";
       
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){
			$data = $sql->fetchAll();
		}
		return $data;
	}
/*Busca vendas por Id*/
	public function buscarVendasPorId($idvenda){
        
        $data = array();
		if(isset($idvenda) && !empty($idvenda)){
			$sql = "SELECT 	vendas.idvenda,vendas.valor,vendas.status_pg,
							vendas.endereco,vendas.pg_link,
							usuarios.nome as usuario,usuarios.email,
							pagamentos.nome as forma 
					FROM vendas 
					LEFT JOIN usuarios ON usuarios.idusuario = vendas.id_usuario
	                LEFT JOIN pagamentos ON pagamentos.idpagamento = vendas.forma_pg
	                WHERE idvenda ='$idvenda'
	                ORDER BY vendas.idvenda ASC";
        }
        $sql = $this->db->query($sql);

		if($sql->rowCount() > 0){
			$data = $sql->fetch();
		}
		return $data;
	}
/* Buscar produtos na tabela venda_produtos por id*/
	public function buscarProdutoVenda($idvenda){
        
        $data = array();
		$sql = "SELECT id_produto,quantidade_compra FROM vendas_produtos WHERE id_venda ='$idvenda'";
		$sql = $this->db->query($sql);
        //var_dump($sql); exit;
		if($sql->rowCount() > 0){
			$prods = $sql->fetchAll();
            
			$pds = new produtos();
			foreach($prods as $prod){
				$pdsinfo = $pds->buscarProdutoPorId($prod['id_produto']);
				$data[] = array(
					'id_produto' => $pdsinfo['idproduto'],
					'quantidade_compra' => $pdsinfo['quantidade'],
					'nome' => $pdsinfo['nome'],
					'imagem' => $pdsinfo['imagem'],
					'preco' => $pdsinfo['preco']
				);

			}
		}
		return $data;

	}


}