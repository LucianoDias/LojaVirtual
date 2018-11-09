<?php if(!empty($aviso)):?>
    <div style="color:red; padding-left: 10px; font-size: 18px"> 
      <?php echo $aviso;?> 
    </div>
  <?php endif;?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Página para realizar logim">
    <meta name="author" content="Luciano Dias">
    <link rel="icon" href="iicone/lu.ico">
    <title>Área para Usuário Cadastrado</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link href="assets/css/signin.css" rel="stylesheet">
    <script src="assets/js/ie-emulation-modes-warning.js"></script>
  </head>

  <body>
    <div class="container">
      <form class="form-signin" method="POST">
        <h2 class="form-signin-heading text-center">Área para Usuário Cadastrado </h2>
        <label for="inputEmail" class="sr-only">Usuário </label>
        <input type="text" name="usuario" class="form-control" placeholder="Digitar o Usuário" required autofocus>
        <label for="senha" class="sr-only">Sennha</label>
        <input type="password" name="senha" class="form-control" placeholder="Digitar a Senha" required>
      
        <button class="btn btn-lg btn-primary btn-block" type="submit">Logar</button>
      </form>

    </div> 
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
