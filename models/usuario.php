<?php
class usuario  extends model {

	public function __construct(){
		parent::__construct();
	}

	public function usuarioExiste($email,$senha =''){

		if(empty($senha)){
			$sql = "SELECT email FROM usuarios WHERE email ='$email' ";
		} else{
			$sql = "SELECT email,senha FROM usuarios WHERE email ='$email' AND senha ='$senha'" ;
		}
		$sql = $this->db->query($sql);
        
		if($sql->rowCount() > 0){
			return true;
		} else{
			return false;
		}
	}

	public function buscarUsuarioPorId($email){
        
        $usuarioId = 0;
		$sql = "SELECT idusuario FROM usuarios WHERE email = '$email'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){
			 $sql = $sql->fetch();
			 $usuarioId = $sql['idusuario'];
		}
		return  $usuarioId;
	}

	public function criarNovo($nome,$email,$senha){
        
		$sql = "INSERT INTO usuarios SET nome ='$nome', email ='$email', senha ='$senha'";
	    $this->db->query($sql);
	    return $this->db->lastInsertId();
	}



	
		
}