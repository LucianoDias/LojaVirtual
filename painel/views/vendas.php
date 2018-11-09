
<h1>Vemdas</h1>
<?php global $config;?>
<table width="80%" class="table table-striped" >
	<thead>
		<tr>
			<th width="10">IdVenda</th>
			<th >Nome comprador</th>
			<th >Valor</th>
			<th >Forma Pgto</th>
			<th >Status</th>
			<th >Ações</th>
		</tr>
	</thead>
	
<?php foreach($vendas as $venda):?>
	<tr>
		<td><?php echo $venda['idvenda'];?></td>
		<td><?php echo utf8_encode($venda['usuario']);?></td>
		<td>R$ <?php echo $venda['valor'];?></td>
		<td><?php echo utf8_encode($venda['forma']);?></td>
		<td><?php echo $config['status_pgto'][$venda['status_pg']];?></td>
		<td>
			   <a href="/lojaVirtual/painel/vendas/detalhes/<?php echo $venda['idvenda'];?>" class="btn btn-default">Detalhes</a>
				<a href="/lojaVirtual/painel/produtos/del/<?php echo $venda['idvenda'];?>" class="btn btn-default">Excluir</a>	
			</td>
	</tr>

<?php endforeach;?>
	
</table>
