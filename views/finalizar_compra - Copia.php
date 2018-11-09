<div class="finalizar_compra">
	<h1>Finalizar Compra</h1>
	
	<form method="post">
		<?php if(!empty($msgerro)):?>
			<div class="msgerro"> <?php echo $msgerro;?></div>
	    <?php endif;?>
		<fieldset class="infousuario"><legend>Informações o Usuário</legend>
			<label>Nome :</label><br/>
			<input type="name"  name="nome" required  autofocus><br/>
			<label>E-mail:</label><br/>
			<input type="email" name="email" required><br/>
			<label>Senha:</label><br/>
			<input type="password" name="senha" required>
		</fieldset><br/>

		<fieldset class="infoendereco"><legend>Informações e Endereço</legend>
		    <label>Endereço :</label><br/>
			<textarea  id = "textarea" name="endereco" ></textarea>
		</fieldset><br/>

		<fieldset><legend>Informações e Pagamento</legend>
			<?php  foreach($pagamentos as $pg):?>
			 	<input type="radio" name="pg" value="<?php echo $pg['idpagamento'];?>" checked/> <?php echo utf8_encode($pg['nome']);?>
			<?php endforeach;?>
		</fieldset><br/>

		<fieldset><legend>Resumo da Compra</legend>
			Total a pagar: R$ <?php echo $total;?>
		   
		</fieldset><br/>
		<input type="submit" id="fincompra" value="Efetuar Pagamento">
	</form>
</div>