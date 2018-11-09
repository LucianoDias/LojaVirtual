<h1>Produtos</h1>
<a href="/lojaVirtual/painel/produtos/addProduto" class="btn btn-default"> Adicionar Produto</a>
<table class="table table-striped">
	<thead>
		<tr>
		    <th>Imagem</th>
		    <th>Nome</th>
		    <th>Categoria</th>
		    <th>Preço</th>
		    <th>Estoque</th>
		    <th width="200"> Ações</th>
			
		</tr>
	</thead>
	<?php foreach($produtos as $prod):?>
		<tr>
		    <td width="180"><img src="/lojaVirtual/assets/imagens/produtos/<?php echo $prod['imagem'];?>" border="0" height="80"> </td>
			<td width="120"><?php echo utf8_encode($prod['nome']);?></td>
			<td width="120"> <?php echo utf8_encode($prod['categoria']);?></td>
			<td width="120">R$<?php  echo $prod['preco'];?></td>
			<td>Qts <?php  echo $prod['quantidade'];?></td>
			<td width="400">
			   <a href="/lojaVirtual/painel/produtos/editar/<?php echo $prod['idproduto'];?>" class="btn btn-default">Editar</a>
				<a href="/lojaVirtual/painel/produtos/del/<?php echo $prod['idproduto'];?>" class="btn btn-default">Excluir</a>	
			</td>
		</tr>
	<?php endforeach; ?>	
</table>
<?php
 $conta = ceil($total_produtos / $limit_produtos);
 for($i=1; $i <= $conta; $i++):?>
    <div class="btn btn-default">
 	<a href="/lojaVirtual/painel/produtos&p=<?php echo $i;?>"><?php echo $i;?></a>
    </div>
<?php endfor;?>


