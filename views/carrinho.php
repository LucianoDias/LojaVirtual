<h1>Carrinho de compras</h1>
<table border="0" width="100%">
	<tr>
		<th width="11%"  align="left">Imagem</th>
		<th width="30%" align="left">Nome </th>
		<th   align="left">Valor</th>
		<th align="left">Ações</th>
	</tr>
<?php  $subtotal =0;?>
<?php foreach($produtos as $produto):?>
<tr>
   <td><img src="/lojaVirtual/assets/imagens/produtos/<?php echo $produto['imagem'];?>" width="60"></td>
   <td ><?php echo utf8_encode($produto['nome']);?></td>
   <td><?php echo "R$ ".$produto['preco'];?></td>
   <td class="remover">
   	  <a href="/lojaVirtual/carrinho/del/<?php echo $produto['idproduto'];?>"><button> Excluir </button> </a>
   </td>
</tr>

<?php $subtotal += $produto['preco'];
endforeach;?>
<tr>
    <td class="finalizarcompra">
		<a href="/lojaVirtual/carrinho/Finalizar"><button>Finalizar Compra</button> </a>
	</td>
	<td colspan="2" align="left"> </td>
	<td align="left"> <h2>Total  R$ <?php echo $subtotal; ?> </h2></td>
	
</tr>
  
</table>
<div class="spance"> </div>