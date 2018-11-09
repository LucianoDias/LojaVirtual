<?php 
class categoriaController extends controller{

    public function  __construct(){
    	parent::__construct();
        
    }

	public function mostrar($id){

		if(!empty($id) && $id < 6){

	        $data = array(
	        	'categoria' => '',
	        	'produtos' => array()
	        	);
	        $produtos = new produtos();
	        $data['produtos'] = $produtos->buscarProdutoPorCat($id);
	        $cat = new categorias();
	        $data['categoria'] = $cat->getNome($id);
			$this->loadTemplate('categoria',$data);
		} else{
			header("Location: /lojaVirtual/naoencontrado");
		}

			
    }
}
?>