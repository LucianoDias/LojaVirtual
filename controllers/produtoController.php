<?php
class produtoController extends controller {

     public function __construct(){
		parent::__construct();
		}

		public function ver($id){

			if(!empty($id)){

				$data = array();
                $produtox = new produtos();
                $data['produto'] = $produtox->buscaInfor($id);
                if( $data['produto'] > 0){

                	$this->loadTemplate('produto',$data);
                } else{
                	header("Location: /lojaVirtual/naoencontrado");
                }

			}

		}




}