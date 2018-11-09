<?php global $config;?>
<div class="pedidoscliente">
	<h1>Pedidos</h1>
	<table border="0" width="100%">
	    <tr>
			<th> Nº do pedido</th>
			<th> Valor Pago</th>
			<th> Forma de Pgto</th>
			<th>Status do Pgto</th>
		</tr>
		<tr>
		    <td><?php echo $detalhes['idvenda'];?></td>
			<td><?php echo "R$ ". $detalhes['valor'];?></td>
			<td><?php echo $detalhes['tipo_pgto'];?></td>
			<td><?php echo $config['status_pgto'][$detalhes['status_pg']];?></td>
			
	</table>
</div>
	<hr>


<?php foreach($detalhes['produtos'] as $produto): ?>
<div class="pedido_produto">
	<img src="/lojaVirtual/assets/imagens/produtos/<?php echo $produto['imagem'];?>" border="0" width="100"/><br/>
	<?php echo utf8_encode($produto['nome']);?><br/>
	<?php echo "R$ ".$produto['preco']; ?><br/>
	<?php echo "Quantidade : ".$produto['quantidade_compra'];?>
</div>
<?php endforeach;?>

<div style="clear: both;"></div

