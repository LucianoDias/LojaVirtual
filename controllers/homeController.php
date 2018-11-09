<?php
class homeController extends controller{

    public function  __construct(){
    	parent::__construct();
        
    }

	public function index(){

        $data = array(); 
        $produto = new produtos();
        $data['produtos'] = $produto->listaProduto(8); 
		$this->loadTemplate('home',$data);	
    }

    

}