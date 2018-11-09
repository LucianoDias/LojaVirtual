<h1>Vendas - Detalhes </h1>
<h3>Produtos da compra</h3>
<table width="80%" class="table table-striped" >
	<thead>
		<tr>
		    <th width="60">Imagem</th>
			<th>Nome</th>
			<th >Preço</th>
			<th >Qtd</th>
		</tr>
	</thead>
<?php foreach($produtos as $prod):?>
	<tr>
	    <td width="60"><img src="/lojaVirtual/assets/imagens/produtos/<?php echo $prod['imagem'];?>" border="0" width="60"></td>
		<td width="100"><?php echo utf8_encode($prod['nome']);?></td>
		<td width="100"><?php echo $prod['preco'];?></td>
		<td><?php echo $prod['quantidade_compra'];?></td>
	</tr>

<?php endforeach;?>
</table>
	