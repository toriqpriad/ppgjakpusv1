		<?php 
		
		require_once "../db/database.php";
		$select1 = "SELECT * FROM data_admin";	
		$select = mysql_query($select1) or die(mysql_error());	
		$numrowslihat= mysql_num_rows($select);
		$hsl=mysql_fetch_object($select);
		
		?>
		
		<div class="main-content">
		<div class="panel panel-default">
		<div class="panel-heading">Data Admin</div>
		<div class="panel-body">
        
        <form id="tab">
		
		<div class="col-md-2">
		<img src="img/<?=$hsl->logo;?>" class="img-responsive img-thumbnail" width="150">
		</div>
		<div class="col-md-10">
		<div class="form-group">
        <label>Username</label>
        <input type="text" value=<?=$hsl->username;?> class="form-control" disabled>
        </div>
        <div class="form-group">
        <label>Password</label>
        <input type="text" class="form-control" value=*************** disabled>
        </div>
		
		
		</div>
		
		<div class="col-md-12">
		<br>
		<div class="form-group">
        <label>Nama Lengkap</label>
        <input type="text" class="form-control" value=<?=$hsl->nm_lengkap;?> disabled>
        </div>
        <div class="form-group">
        <label>Kontak</label>
        <input type="text" value=<?=$hsl->kontak;?> class="form-control" disabled>
        </div>
        <div class="form-group">
        <label>Email</label>
        <input type="text" value=<?=$hsl->email;?> class="form-control" disabled>
        </div>
		
        <div class="form-group">
          <label>Alamat</label>
          <textarea rows="3" class="form-control" disabled value=<?=$hsl->alamat;?>><?=$hsl->alamat;?></textarea>
        </div>      
       <a href="detail-admin.php" class="btn btn-default text-right">Ubah</a> 
      </div>
	  </div>
	  
	  
	  </div>
	  </form>
</div>
</div>	
</div>


	
	
	