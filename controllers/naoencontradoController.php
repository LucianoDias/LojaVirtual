<?php
class naoencontradoController extends controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
        
        $data = array();
		$this->loadTemplate('naoencontrado',$data);
	}
}