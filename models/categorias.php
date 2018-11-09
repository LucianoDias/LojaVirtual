<?php
class categorias extends model{

	public function __construct(){
		parent::__construct();
	}

	public function getNome($id){

		$sql = "SELECT titulo FROM categorias cat  where cat.idcategoria ='$id'";
		$sql = $this->db->query($sql);
		$nome = '';

		if($sql->rowCount() > 0){
			$sql = $sql->fetch();
			$nome = $sql['titulo'];
		}
		return $nome;
	}



}