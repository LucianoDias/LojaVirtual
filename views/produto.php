<div class="produto_foto">
	<img src="<?php echo BASE_URL;?>/assets/imagens/produtos/<?php echo $produto['imagem'];?>" border="0" width="300" height="300">

</div>
<div class="produto_info">
 	<h2><?php echo utf8_encode($produto['nome']);?></h2>
 	<?php echo utf8_encode($produto['descricao']); ?>
 	<small><p>Quantidade em estoque <?php echo $produto['quantidade']?></p> </small>
 	<h3>Preço <?php echo "R$ " .$produto['preco']; ?></h3>
 	<a href="/lojaVirtual/carrinho/add/<?php echo $produto['idproduto'];?>">
 		<button>Adicionar ao Carrinho</button>
 	</a>
</div>
<div style="clear: both;"> </div>