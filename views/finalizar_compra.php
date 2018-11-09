
	<h1>Finalizar Compra</h1><br/>
	
    <form method="post" id="form" onsubmit="return pagar()">

		<fieldset class="infousuario"><legend>Informações o Usuário</legend>
		    <div class="row">
		        <div class="col-md-9">
					<label>Nome :</label><br/>
					<input type="text"  name="nome" required  autofocus class="form-control"><br/>
				</div>
				<div class="col-md-9">
					<label>E-mail :</label><br/>
					<input type="email" name="email" required class="form-control"/><br/>
				</div>
				<div class="col-md-5">
					<label>Senha :</label><br/>
					<input type="password" name="senha" required class="form-control"/><br/>
				</div>
				<div class="col-md-1">
					<label>DDD :</label><br/>
					<input type="text" name="ddd" required class="form-control"/><br/>
				</div>
				<div class="col-md-6">
					<label>Telefone :</label><br/>
					<input type="tel" name="telefone" required class="form-control"/>
				</div>
			</div>
		</fieldset>
		<fieldset><legend>Informações e Endereço</legend>
			<div class="row">
		        <div class="col-md-8">
					<label>Endereço :</label><br/>
					<input type="text"  name="endereco[rua]" required  autofocus class="form-control"><br/>
				</div>
				<div class="col-md-2">
					<label>Número :</label><br/>
					<input type="text" name="endereco[numero]" required class="form-control"/><br/>
				</div>
				<div class="col-md-2">
					<label>Complemento :</label><br/>
					<input type="text" name="endereco[comp]" required class="form-control"/><br/>
				</div>
				<div class="col-md-6">
					<label>Bairro :</label><br/>
					<input type="text" name="endereco[bairro]" required class="form-control"/><br/>
				</div>
				<div class="col-md-4">
					<label>Cidade :</label><br/>
					<input type="text" name="endereco[cidade]" required class="form-control"/><br/>
				</div>
				<div class="col-md-2">
					<label>Estado :</label><br/>
					<input type="text" name="endereco[estado]" required class="form-control"/><br/>
				</div>
				<div class="col-md-4">
					<label>Cep :</label><br/>
					<input type="text" name="endereco[cep]" required class="form-control"/><br/>
				</div>
			</div>
		</fieldset>
		<fieldset>
			<legend>Resumo a Compra</legend>
			<h3>Total a Pagar: R$ <?php echo $total;?></h3>
		</fieldset>
		<fieldset>
			<legend>Informações de Pagamento</legend>
			<div class="row">
			   <div class="col-md-4">
			       <label>Forma de Pagamento</label>
					<select class="form-control" name="pg_form" id="pg_form" onchange="selectPg()" />
					<option value=""></option>
						<option value="CREDIT_CARD">Cartão e Crédito</option>
						<option value="BOLETO">Boleto</option>
						<option value="BALANCE">Saldo PagSeguro</option>
					</select>
			   </div>
			</div>
			 <br/>
			<div class="row">
			   <div class="col-md-6" id="cc" style="display:none; ">
			       <h4> Qual a Bandeira do seu Cartão ?</h4><br/>
			   </div>
			   <div class="col-md-8" id="bandeiras">
			   </div>
			</div>
			<div class="row">
			   <div  id="cardinfo" style="display:none;">
				   <div class="col-md-4" id="cardinfo">
				       <label>Parcelamento :</label>
				       <select name="parcela" id="parcela" class="form-control"></select><br/>
				   </div>
				    <div class="col-md-4">
				       <label>Titular o Cartão :</label>
				        <input type="text" name="c_titular" class="form-control"></select><br/>
				    </div>
				   <div class="col-md-4">
				       <label>Cpf do Titular  :</label>
				        <input type="text" name="cpf_titular" class="form-control"></select><br/>
				   </div>
				   <div class="col-md-4">
				       <label>Número do Cartão  :</label>
				        <input type="text" name="cartao" id="cartao" class="form-control"></select><br/>
				   </div>
				   <div class="col-md-2">
				       <label>Digito :</label>
				        <input type="text" name="digito" id="cvv" maxlength="4" class="form-control"></select><br/>
				   </div>
				   <div class="col-md-4">
				       <label>Valídade do Cartão  :</label>
				        <input type="text" name="validade" id="validade" class="form-control" placeholder="mês/ano"></select><br/>
				   </div>
			   </div>

			</div>
		</fieldset><br/>
		<input type="submit" class="btn btn-success" value="Efetuar Pagamento"><br/>
		<input type="hidden" name="bandeira" id="bandeira"/>
		<input type="hidden" name="ctoken" id="ctoken"/>
		<input type="hidden" name="shash" id="shash"/>
		<input type="hidden" name="sessionId" value="<?php echo $sessionId;?>"/>
	</form><br/>
<script type="text/javascript" src ="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js">	
</script>
<script type="text/javascript">
	var sessionId = '<?php echo $sessionId;?>';
	var valor = '<?php echo $total;?>';
	var formOK = false;
</script>
<script type="text/javascript" src="/lojaVirtual/assets/js/ckt.js"></script>
<div style="clear: both;"> </div>

