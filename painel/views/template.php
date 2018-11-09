<!DOCTYPE html>
<html>
<head>
	<title>Nossa Loja</title>
	<meta charset="utf-8">
	<link rel="icon" href="<?php echo BASE_URL;?>/assets/icones/portfolio.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/css/template.css"/> 
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/css/bootstrap.min.css"/> 
</head>
<body id="page-top" class="index">
    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
               
                <a class="navbar-brand" href="#page-top">Home</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    
                    <li class="page-scroll">
                        <a href="/lojaVirtual/painel/Produtos">Produtos</a>
                    </li>
                    <li class="page-scroll">
                        <a href="/lojaVirtual/painel/Categorias"> Categorias</a>
                    </li>
                    <li class="page-scroll">
                        <a href="/lojaVirtual/painel/vendas">Vendas</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contact">Usúarios</a>
                    </li>
                    <li class="page-scroll">
                        <a href="/lojaVirtual/painel/login/sair">Sair</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <br/><br/>

<!-- ___________________________________________________________________________________  -->

<div class="container">

<!-- Onde entra o conteúdo dinamico da pagina detro do template-->

   <?php $this->loadViewInTemplate($viewName,$viewData); ?> 

<!-- END conteúndo -->


</div>
<!-- ___________________________________________________________________________________  -->


<div class="rodape"></div>
</body>
</html>