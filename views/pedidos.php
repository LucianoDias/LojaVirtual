<?php global $config;?>
<div class="pedidoscliente">
	<h1>Pedidos</h1>
	<table border="0" width="100%">
	    <tr>
			<th> Nº do pedido</th>
			<th> Valor Pago</th>
			<th> Forma de Pgto</th>
			<th>Status do Pgto</th>
			<th> Ações</th>
		</tr>
		<?php foreach($pedidos as $pedido) : ?>
		<tr>
		    <td><?php echo $pedido['idvenda']?></td>
			<td><?php echo "R$ ". $pedido['valor']?></td>
			<td><?php echo $pedido['tipo_pgto'];?></td>
			<td><?php echo $config['status_pgto'][$pedido['status_pg']];?></td>
			<td> <a href="/lojaVirtual/pedidos/detalhes/<?php echo $pedido['idvenda']; ?>"><button>Detalhes</button> </a></td>
		</tr>
	<?php endforeach;?>
	</table>

</div>
<hr>
<br/><br/>
<div class="logout"> <a href="/lojaVirtual/login/logout"> <button>Sair</button></div>
<div style="clear: both;"></div>
<br/>
<div class="spance"></div>
