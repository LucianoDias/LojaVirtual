<div class="contato">
 
  	  <h2>Contato</h2>
  
   <form method="post">
   <fieldset class="infousuario"><legend>Informações o Usuário</legend>
   <?php if(!empty($msgresp)): ?>
   	<div class="aviso"> <?php echo $msgresp; ?> </div>
    <?php endif;?>
    <div class="row">
      <div class="col-md-7">
   	    <label>Nome :</label><br/>
   	    <input type="text" name="nome" required placeholder="Seu nome" autofocus  class="form-control"><br/>
      </div>
      <div class="col-md-7">
   	    <label>E-mail :</label><br/>
   	    <input type="email" name="email" required placeholder="Seu email" class="form-control"><br/>
      </div>
      <div class="col-md-9">
   	    <label>Mensagem :</label><br/>
   	    <textarea name="msg" class="form-control"></textarea><br/>
   	    <input type="submit" id="enviar" value="Enviar" class="btn btn-success"> 
      </div>
    </div>
    </fieldset>
    <br/>
   </form>
</div>
<div style="clear: both;"> </div>