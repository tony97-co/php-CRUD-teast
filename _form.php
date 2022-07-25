<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>
                <?php if ($proudact['id']): ?>
                    Update proudact <b><?php echo $proudact['name'] ?></b>
                <?php else: ?>
                    Create new proudact
                <?php endif ?>
            </h3>
        </div>
        <div class="card-body">

            <form method="POST" enctype="multipart/form-data"
                  action="">
                <div class="form-group">
                    <label>Name</label>
                    <input name="name" value="<?php echo $proudact['name'] ?>"
                           class="form-control <?php echo $errors['name'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo  $errors['name'] ?>
                    </div>
                </div>
                
                
              
                <div class="form-group">
                    <label>Image</label>
                    <input name="picture" type="file" class="form-control-file">
                </div>

                <button class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>

<script>
function formatar_mascara(src, mascara) {
	var campo = src.value.length;
	var saida = mascara.substring(0,1);
	var texto = mascara.substring(campo); 

	if(texto.substring(0,1) != saida) {
	src.value += texto.substring(0,1);
	}
}
</script>
