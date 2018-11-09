<h1>Produto - Editar</h1>


<form method="post" enctype="multipart/form-data">
    <div class="row">
	    <div class="col-md-4">
		    <label>Nome</label>
		    <input type="text" name="nome" value="<?php echo utf8_encode($produto['nome']);?>" class="form-control" autofocus /><br/>
	    </div>
	    <div class="col-md-2">
	        <label>Categoria</label>
	     	<select name="categoria" class="form-control"/>
	     	<?php foreach($categorias as $cat) :?>
	     		<option <?php echo ($cat['idcategoria'] == $produto['id_categoria'])?'selected="selected"':'';?>value="<?php echo $cat['idcategoria'];?>"> <?php echo utf8_encode( $cat['titulo']);?></option>
	     	<?php endforeach;?>
	     	</select>
	    </div>
	</div>
	<div class="row">
	    <div class="col-md-9">
		    <label>Descrição</label>
		    <textarea name="descricao"  class="form-control" /><?php echo $produto['descricao'];?>
		    </textarea><br/>
	    </div>
	</div>
	<div class="row">
	    <div class="col-md-3">
	    <label>Preço</label>
	    <input type="text" name="preco" value="<?php echo $produto['preco'];?>" class="form-control"/><br/>
	    </div>
	    <div class="col-md-1">
	    <label>Quantidade</label>
	    <input type="number" name="quantidade" value="<?php echo $produto['quantidade'];?>" class="form-control"/><br/>
	    </div>
	    <div class="col-md-1">
	        <label>imagem</label>
	   		<img src="/lojaVirtual/assets/imagens/produtos/<?php echo $produto['imagem'];?>" border="0" width="36">
	    </div>
	    <div class="col-md-4">
	    <label>Imagem</label>
	    <input type="file" name="imagem" class="form-control"/><br/>
	    </div>
	    
	</div>
    <div class="row">
	    <div class="col-md-3">
	    <input class="btn btn-default" type="submit" value="Salvar"/>	
	    </div>
	</div>
</form>

