<?php
class pagamentos extends model{

	public function __construct(){
		parent::__construct();
	}


	public function getPagamentos(){

        $dados = array();
		$sql = "SELECT * FROM pagamentos  ORDER BY nome  Asc";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){
			$dados = $sql->fetchAll();
		}
		return $dados;
	}



}