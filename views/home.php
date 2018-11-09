<?php foreach($produtos as $produto):?>
<a href="<?php echo BASE_URL; ?>/produto/ver/<?php echo $produto['idproduto']; ?>">
	<div class="produto">
	    <img src="<?php echo BASE_URL;?>/assets/imagens/produtos/<?php echo $produto['imagem'];?>" width="180" height="180" border="0">
		<strong><?php echo utf8_encode($produto['nome']); ?></strong><br/>
		<small>Preço R$<?php echo $produto['preco'];?></small><br/>
	</div>
</a>
<?php endforeach;?>
<div style="clear: both;"></div>