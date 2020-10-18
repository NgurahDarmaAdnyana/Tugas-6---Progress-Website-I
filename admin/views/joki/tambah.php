<h4>Tambah Data</h4>
<hr>
<form action="index.php?mod=joki&page=save"method="POST">
	<div class="col-md-6">
	<div class="form group">
		<label for="">ID</label>
		<input type="text" name="id" required value="<?=(isset($_POST['id']))?$_POST['id']:'';?>" class="form-control"> 
		 <span class="text-danger"><?=(isset($err['id']))?$err['id']:'';?></span>
	</div>
	<div class="form-group">
        <label for="">Nama</label>
        <input type="text" name="nama" required value="<?=(isset($_POST['nama']))?$_POST['nama']:'';?>" class="form-control">
		 <span class="text-danger"><?=(isset($err['nama']))?$err['nama']:'';?></span>
        </div>
	<div class="form group">
		<label for="">Jasa</label>
		<input type="text" name="jasa" required value="<?=(isset($_POST['jasa']))?$_POST['jasa']:'';?>" class="form-control" id="">
		 <span class="text-danger"><?=(isset($err['jasa']))?$err['jasa']:'';?></span>
	</div>		
	 <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
    </div>
    </div>
</form>