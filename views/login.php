
   <h2>Login</h2>
	<?php if(!empty($aviso)):?>
		<div style="color:red; padding-left: 10px; font-size: 18px"> 
			<?php echo $aviso;?> 
		</div>
	<?php endif;?>
	
<form method="post">
<fieldset class="infousuario"><legend>Inoformação de Usúario</legend>
	 <div class="row">
        <div class="col-md-6">
		   <label>E-mail :</label><br/>
		   <input type="email" name="email" autofocus  class="form-control"><br/>
		</div>
	</div>
	 <div class="row">
		<div class="col-md-6">
		   <label>Senha :</label><br/>
		   <input type="password" name="senha" class="form-control"><br/><br/>
		</div>
		<div class="col-md-9">
		   <input type="submit" value="Logar" id="logar" class="btn btn-success">
		</div>
	</div>
</fieldset>
</form>

<div style="clear: both;"> </div>
<div class="spance"> </div>
