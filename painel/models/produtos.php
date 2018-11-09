<?php 
class produtos extends model {

	public function __construct(){
		parent::__construct();
	}
/*metodo pegar o total de produtos no banco*/
	public function buscarTotalProdutos(){

		$total = 0;
		$sql = "SELECT COUNT(*) as cont from produtos";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){
			$total =$sql->fetch();
			$total = $total['cont'];
		}
		return $total;
	}
/*Metoo de buscar os produtos no banco dois paramentro o inicio da busca e e quantidade */
	public function buscarProdutos($offset,$limit){
        
        $data = array();
		$sql = "SELECT *,
		(select categorias.titulo from categorias where categorias.idcategoria = produtos.id_categoria ) as categoria
		 FROM produtos LIMIT $offset,$limit";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){
			$data = $sql->fetchAll();
		}
		return $data;
	}
/*Mento para Inserir Produto no  banco da loja*/
	public function inserirProduto($nome,$descricao,$categoria,$preco,$quantidade,$md5imagem){

		$sql = "INSERT INTO produtos SET id_categoria ='$categoria',nome ='$nome',imagem ='$md5imagem',preco ='$preco',quantidade ='$quantidade',descricao ='$descricao'";
		$sql = $this->db->query($sql);
	}
/*Metodo de busca pro Id o produto */
	public function buscarProdutoPorId($idproduto){

		$data = array();
		$idproduto = addslashes($idproduto);
		$sql = "SELECT * FROM produtos WHERE idproduto ='$idproduto'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() >0){
			$data = $sql->fetch();
		}
		return $data;
	}
/*Metodo de atualizar o produto */
	public function updateProduto($idproduto,$nome,$descricao,$categoria,$preco,$quantidade){

		$sql ="UPDATE produtos SET id_categoria ='$categoria',nome ='$nome',preco ='$preco',quantidade ='$quantidade',descricao ='$descricao' WHERE idproduto ='$idproduto'"; 
		$sql = $this->db->query($sql);
	}
	public function updateImagem($idproduto,$imagem){

		$sql = "UPDATE produtos SET imagem ='$imagem' WHERE idproduto = '$idproduto'";
		$this->db->query($sql);
	}
/*Metodo de exluir os produto o banco*/
	public function deletarProduto($idproduto){
        $img =0;
		$sql = "SELECT imagem FROM produtos WHERE idproduto ='$idproduto'";
		$sql = $this->db->query($sql);
		if($sql->rowCount() > 0){
           $img = $sql->fetch();
           $img = $img['imagem'];
       
           unlink('../../lojaVirtual/assets/imagens/produtos/'.$img);
           $this->db->query("DELETE FROM produtos WHERE idproduto ='$idproduto'");
		}
	}



}