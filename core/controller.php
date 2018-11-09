<?php
class controller {
    
    protected $db;
    public function __construct(){
    	global $config;
    	$this->db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'],$config['dbuser'],$config['dbpass']);

    }
    //@carregar a view especifica
	public function loadView($viewName, $viewData = array()){
        extract($viewData);
		include 'views/'.$viewName.'.php';
	}

	//carrager um template com as views
	public function loadTemplate($viewName, $viewData = array()){
		$sql = "SELECT * FROM categorias ";
		$sql = $this->db->query($sql);
		$menu = array();

		if($sql->rowCount() > 0){
			$menu =	$sql->fetchAll();
		}
		include 'views/template.php';
	}

	//ser usando o virw denteo template
	public function loadViewInTemplate($viewName, $viewData = array()){
		extract($viewData);
		include 'views/'.$viewName.'.php';
	}






}