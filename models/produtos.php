
<?php
	class produtos extends model {

		public function __construct(){
			parent::__construct();
		}

		public function listaProduto($limit = 0){

			$sql = "SELECT * FROM produtos ORDER BY RAND() ";
			
			if($limit >0){
				$sql .="LIMIT ".$limit;
			}
			$sql = $this->db->query($sql);
			$dados = array();

			if($sql->rowCount() > 0){
				$dados  = $sql->fetchAll();
			}
			return $dados;
		}

		public function buscarProdutoPorCat($id){

			$sql = "SELECT * FROM produtos WHERE id_categoria ='$id'";
			$sql = $this->db->query($sql);
			$data = array();

			if($sql->rowCount() > 0){
				$data  = $sql->fetchAll();
			}	
            return $data;
		}

		public function buscaInfor($id){
            
            $id = addslashes($id);
			$sql = "SELECT * FROM produtos WHERE idproduto ='$id'";
			$sql = $this->db->query($sql);
            $produto = array();
           
			if($sql->rowCount() > 0){
				$produto = $sql->fetch();
				return $produto;
			}else{
                 return false;
			}     
			
		}

		public function produtosCarrinho($produtos){
            
            if(count($produtos)) {
				$sql ="SELECT * FROM produtos WHERE idproduto IN (".implode(',', $produtos).")";
				$sql = $this->db->query($sql);
				if($sql->rowCount() > 0){
					$dados = $sql->fetchAll();
				}
				return $dados;
			}else{

				return $dados = array();
			}

       }

       public function buscarProdutosPorId($prods = array()){
       	$array = array(); 
            
	       	if(is_array($prods) && count($prods) > 0){
	       		$sql ="SELECT * FROM produtos WHERE idproduto IN (".implode(',', $prods).")";
	       		$sql = $this->db->query($sql);
					if($sql->rowCount() > 0){
						$array = $sql->fetchAll();
					}
			}
			return $array;
       }




   }