<?php
class categorias extends model{

	public function __construct(){
		parent::__construct();
	}

	public function listarCategoria(){
        
        $dados = array();
		$sql = "SELECT * FROM categorias ORDER BY titulo asc";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){
			$dados = $sql->fetchAll();
		}
		return $dados;
	}

	public function buscarCategoriaPorId($idcat){
        $dados = array();
        if(!empty($idcat) && isset($idcat)){
        	$idcat = addslashes($idcat);
			$sql = "SELECT * FROM categorias WHERE idcategoria ='$idcat'";
			$sql = $this->db->query($sql);
			if($sql->rowCount() > 0){
				$dados = $sql->fetch();

			}
		}
		return $dados;
	}

	public function deletarCategoria($idcat){
        
		$sql = "DELETE FROM categorias WHERE idcategoria ='$idcat'";
		$this->db->query($sql);

		$sql = "DELETE  FROM produtos WHERE id_categoria = '$idcat'";
		$this->db->query($sql);
	}

	public function addicionarCategoria($nome){

        $titulo = utf8_decode($nome);
		$sql =" INSERT INTO categorias SET titulo = '$titulo'";
		$sql = $this->db->query($sql);
	}

	public function editarCategoria($nome,$idcat){

		if(!empty($nome) && !empty($idcat)){

            $idcat = addslashes($idcat);
            $titulo = addslashes($nome);
		    $titulo = utf8_decode($nome);
		    $sql =" UPDATE categorias SET titulo = '$titulo' WHERE idcategoria ='$idcat'";
			$sql = $this->db->query($sql);
		}


	}


}