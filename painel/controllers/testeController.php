<?php
class testeController extends controller{

	public function index(){

		$data = array();

		$this->loadTemplate('sobre',$data);
	}

	public function foi(){
		echo "foi criando um novo teste ";
	}




}