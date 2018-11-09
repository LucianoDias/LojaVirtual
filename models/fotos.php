<?php
class fotos extends model {

	/* sobre carregar um construtor no model
	public function __construct(){
	parent::__construct();
	
	}
	*/

	public function buscarFotos(){

		$data = array();

		$sql = "SELECT * FROM fotos";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0 ){
			$data =$sql->fetchAll();
		}
        
		return $data;
	}


}