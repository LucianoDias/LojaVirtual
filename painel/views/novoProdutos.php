<h1>Produto - Adicionar</h1>


<form method="post" enctype="multipart/form-data">
    <div class="row">
	    <div class="col-md-4">
		    <label>Nome</label>
		    <input type="text" name="nome" placeholder="digita o nome" class="form-control" autofocus /><br/>
	    </div>
	    <div class="col-md-2">
	        <label>Categoria</label>
	     	<select name="categoria" class="form-control"/>
	     	<?php foreach($categorias as $cat) :?>
	     		<option value="<?php echo $cat['idcategoria'];?>"> <?php echo utf8_encode( $cat['titulo']);?></option>
	     	<?php endforeach;?>
	     	</select>
	    </div>
	</div>
	<div class="row">
	    <div class="col-md-9">
		    <label>Descrição</label>
		    <textarea type="text" name="descricao" class="form-control"/></textarea><br/>
	    </div>  
	</div>
	<div class="row">
	    <div class="col-md-3">
		    <label>Preço</label>
		    <input type="text" name="preco" placeholder="digita o titulo" class="form-control"/><br/>
	    </div>
	    <div class="col-md-1">
		    <label>Quantidade</label>
		    <input type="number" name="quantidade" class="form-control"/><br/>
	    </div>
	    <div class="col-md-5">
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

