<!DOCTYPE html>
<html>
<head>
	<title>Nossa Loja</title>
	<meta charset="utf-8">
	<link rel="icon" href="<?php echo BASE_URL;?>/assets/icones/portfolio.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/css/template.css"/> 
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/painel/assets/css/bootstrap.min.css"	
</head>
<body>
    <div class="topo"> 
        <div class="topoint">
         <a href="<?php echo BASE_URL;?>/">
             <img src="<?php echo BASE_URL;?>/assets/imagens/carrinho.png" border="0"/><strong>My Store </strong>
         </a>
         </div>
    </div>
    <div class="menu">
        <div class="menuint">
	    	<ul>
	    		<li><a href="<?php echo BASE_URL;?>/">home</a></li>
	    		<li><a href="<?php echo BASE_URL;?>/empresa">empresa</a></li>
                <li><a href="/lojaVirtual/contato">Maquiagem </a></li>
                <li><a href="/lojaVirtual/contato">contato </a></li>

                
                <li><a href="/lojaVirtual/pedidos">Pedidos</a></li>
                <li>
                 <a href="/lojaVIrtual/carrinho"><button>
                <div class="carrinhocomp"> 
                     Carrinho<br/> 
                     <?php echo (isset($_SESSION['carrinho'])) ?count($_SESSION['carrinho']): '0 ';?>
                     <small> Itens</small>
                </div>
                </button>
            </a>
            </li>
                <li>
                    Categoria 
                    <div class="submenu">

                        <?php foreach($menu as $menuitem):?>
                        <a href="<?php echo BASE_URL;?>/categoria/mostrar/<?php echo $menuitem['idcategoria'];?>"><div class="submenuitem"><?php echo utf8_encode( $menuitem['titulo']);?> </div></a>
                       <?php endforeach;?>
                    </div>
                </li>

	    		
	    	</ul>
            
	    </div>
    </div>

<!-- ___________________________________________________________________________________  -->

<div class="container1">

<!-- Onde entra o conteúdo dinamico da pagina detro do template-->

   <?php $this->loadViewInTemplate($viewName,$viewData); ?> 

<!-- END conteúndo -->


</div>
<!-- ___________________________________________________________________________________  -->


<div class="rodape"></div>
</body>
</html>