<?php include 'cek_session.php'; ?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Detail Pengajar</title>
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">   
        <?php
        include 'header_superadmin.php';
        include 'menu_superadmin.php';
        ?>
    <div class="main-content">
        <div class="panel panel-default">
            <div class="panel-heading">Detail Data</div>
            <div class="panel-body"><?php detail(); ?></div>

        </div>

        <?php

        function detail() {
            if (isset($_GET['detail'])) {
                require_once "../db/database.php";
                //$selectdetail = mysql_query("SELECT * FROM data_pengajar where id_peng = '".$_GET['detail']."' ") or die(mysql_error());
                $skripdetail = "SELECT * FROM data_pengajar inner join data_tpq on data_pengajar.tpq_desa=data_tpq.id_tpq where id_peng='" . $_GET['detail'] . "' ";
                $selectdetail = mysql_query($skripdetail);
                $selectdetail2 = mysql_fetch_object($selectdetail);
                if ($selectdetail2 == false) {
                    echo "Data tidak ditemukan";
                } else {
                    $getimg = $selectdetail2->foto_peng;
                    $dirfoto = "../images/foto_pengajar/";
                    echo '
                    <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                    <li class="active"><a href="#detail_tpq" data-toggle="tab">Detail Pengajar</a></li>
                    <li><a href="#foto" data-toggle="tab">Foto Pengajar</a></li>		
                    </ul>
                    <div id="my-tab-content" class="tab-content">
                    <div class="tab-pane active" id="detail_tpq">
                    <br>
                    <form id="tab">
                    <div class="form-group">
                    <label>ID Pengajar</label>
                    <input type="text" value=' . $selectdetail2->id_peng . ' class="form-control" disabled>
                    </div>
                    <div class="form-group">
                    <label>Nama Pengajar</label>
                    <input type="text" class="form-control" value="' . $selectdetail2->nm_peng . '" disabled>
                    </div>
                    <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <input type="text" class="form-control" value="' . $selectdetail2->j_klmn . '" disabled>
                    </div>
                    <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" value="' . $selectdetail2->tmp_lhr . '" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="text" value="' . $selectdetail2->tgl_lhr . '" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                    <label>Pendidikan</label>
                    <input type="text" value="' . $selectdetail2->pdkn . '" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                    <input type="text" value="' . $selectdetail2->ket_pdkn . '" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                    <label>Status</label>
                    <input type="text" value="' . $selectdetail2->status . '" class="form-control" disabled>
                    </div>		
                    <div class="form-group">
                    <label>Pernikahan</label>
                    <input type="text" value="' . $selectdetail2->pkw . '" class="form-control" disabled>
                    </div>
		
                    <div class="form-group">
                    <label>TPQ/Desa</label>
                    <input type="text" value="' . $selectdetail2->tpq_desa . ' - ' . $selectdetail2->nama_tpq . ' - ' . $selectdetail2->desa . ' " class="form-control" disabled>
                    </div>
		
                    <div class="form-group">
                    <label>Kelas Ajar</label>
                    <input type="text" value="' . $selectdetail2->kelas_ajar . '" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                    <label>Kontak</label>
                    <input type="text" value="' . $selectdetail2->kontak_peng . '" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                    <label>Alamat</label>
                    <textarea rows="3" class="form-control" disabled>' . $selectdetail2->alamat_peng . '</textarea>
                    </div>      
        
                    </div>
                    </form>
                
                     <div class="tab-pane" id="foto">
                     <br>';
                    if (empty($getimg) OR ! file_exists($dirfoto . $getimg)) {
                        echo '<img src="../images/foto_pengajar/noimg.jpg" class="img-responsive img-thumbnail" style="width:300px; height:300px;">';
                    } else {
                        echo '
                            <img src="../images/foto_pengajar/' . $selectdetail2->foto_peng . '" class="img-responsive img-thumbnail" style="width:300px; height:300px;">';
                    }
                    echo '</div>';
                    ?>    
                </div>
            </div>
            <div class="panel-footer">
                <a href="?edit=<?= $selectdetail2->id_peng; ?>" class="btn btn-info"><span class="glyphicon glyphicon-pencil" aria-hidden="true" title="Ubah"></span> Ubah</a>
                <a href="data-pengajar.php?hapus=<?= $selectdetail2->id_peng; ?>" onclick="return confirm('Yakin menghapus data ini?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true" title="Hapus"></span> Hapus</a>
            </div>
            


            <?php
        }
    }

    //edit//
    if (isset($_GET['edit'])) {
        require_once "../db/database.php";
        $idedit = $_GET['edit'];
        $skripedit = "SELECT * FROM data_pengajar inner join data_tpq on data_pengajar.tpq_desa=data_tpq.id_tpq where id_peng='" . $_GET['edit'] . "' ";
        $selectedit = mysql_query($skripedit) or die(mysql_error());
        $selectedit2 = mysql_fetch_object($selectedit);
        if ($selectedit2 == false) {
            echo "Data tidak ditemukan";
        } else {
            echo '
	
                <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                <li class="active"><a href="#detail_tpq" data-toggle="tab">Detail Pengajar</a></li>
                <li><a href="#foto" data-toggle="tab">Foto Pengajar</a></li>
		
                </ul>
                <div id="my-tab-content" class="tab-content">
                <div class="tab-pane active" id="detail_tpq">
		<br>
                <form method="post" enctype="multipart/form-data" >
		<div class="form-group">
                <label>ID Pengajar</label>
                <input type="text" value=' . $selectedit2->id_peng . ' class="form-control" name="tx_id_peng">
                </div>
                <div class="form-group">
                <label>Nama Pengajar</label>
                <input type="text" class="form-control" value="' . $selectedit2->nm_peng . '" name="tx_nm_peng">
                </div>
		<div class="form-group">
                <label>Jenis Kelamin</label>
		 <div class="input-group-btn">
		<select class="form-control input-md" name="jk_kl" >
		<option value=' . $selectedit2->j_klmn . '>' . $selectedit2->j_klmn . '</option>
		<option value="Pria">Pria</option>
		<option value="Wanita">Wanita</option>
		</select>	
		</div>
                </div>
                <div class="form-group">
                <label>Tempat Lahir</label>
                <input type="text" value="' . $selectedit2->tmp_lhr . '" class="form-control" name="tx_tmp_lhr" >
                </div>
                <div class="form-group">
                <label>Tanggal Lahir</label>
		<div class="input-group date form_date col-md-5" data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                <input class="form-control" size="10" value="' . $selectedit2->tgl_lhr . '" type="text" name="tx_tgl_lhr" >
		<span class="input-group-addon"><span class="glyphicon glyphicon-calendar">
		</span></span>
                </div>
                </div>
		<div class="form-group">
                <label>Pendidikan</label>
		<select name="tx_pdkn" class="form-control input-md">
		<option value="' . $selectedit2->pdkn . '">' . $selectedit2->pdkn . '</option> 
			<option value="SD">SD</option>
			<option value="SMP">SMP</option>
			<option value="SMA">SMA</option>
			<option value="D3">D3</option>
			<option value="S1">S1</option>
			<option value="S2">S2</option>
		</select>
		</div>
		<div class="form-group">
		<input type="text" value="' . $selectedit2->ket_pdkn . '" class="form-control" name="tx_ket_pdkn">
                </div>
                <div class="form-group">
                <label>Status</label>
                <select name="tx_status" class="form-control input-md">
		 <option value="' . $selectedit2->status . '">' . $selectedit2->status . '</option>
			<option value="Pribumi">Pribumi</option>
			<option value="Mubalegh Tugasan">Mubalegh Tugasan</option>
		</select>
                </div>
		
		<div class="form-group">
                <label>Pernikahan</label>
		<select name="tx_nkh" class="form-control input-md">
			<option value="' . $selectedit2->pkw . '">' . $selectedit2->pkw . '</option>
			<option value="Sudah Menikah">Sudah Menikah</option>
			<option value="Belum Menikah">Belum Menikah</option>
		</select>
                </div>
		
		<div class="form-group">
                <label>TPQ/Desa</label>
                <select class="form-control input-md" name="tx_tpq" >
							
		<option value=' . $selectedit2->tpq_desa . '>' . $selectedit2->nama_tpq . ' - ' . $selectedit2->desa . ' </option>';
            require_once "../db/database.php";
            $select_kat = "SELECT * FROM `data_tpq`";
            $query_kat = mysql_query($select_kat);
            $numrowslihat_kat = mysql_num_rows($query_kat);
            $x = 1;
            if ($query_kat)
                while ($x <= $numrowslihat_kat) {
                    while ($hsl_kat = mysql_fetch_object($query_kat)) {
                        echo '<option value="' . $hsl_kat->id_tpq . '" >' . $hsl_kat->nama_tpq . ' - ' . $hsl_kat->desa . '</option>';
                        $nmtpq = $hsl_kat->nama_tpq;
                        $x++;
                    }
                }
            echo '
		</select>
		</div>
		<div class="form-group">
                <label>Kelas Ajar</label>
		<select name="tx_kls" class="form-control input-md">
			<option value="' . $selectedit2->kelas_ajar . '">' . $selectedit2->kelas_ajar . '</option>
			<option value="Caberawit">Caberawit</option>
			<option value="Praremaja">Praremaja</option>
			<option value="Remaja">Remaja</option>
		</select>
                </div>
		
		<div class="form-group">
                <label>Kontak</label>
                <input type="text" value="' . $selectedit2->kontak_peng . '" class="form-control" name="tx_kontak">
                </div>
		
                <div class="form-group">
                <label>Alamat</label>
                <textarea rows="3" class="form-control" name="alamat" value=' . $selectedit2->alamat_peng . '>' . $selectedit2->alamat_peng . '</textarea>
                </div>              
                </div>        
                
                <div class="tab-pane" id="foto">
		<br>
                        <input type="hidden" value="' . $selectedit2->foto_peng . '" class="form-control" name="oldfoto">';
            if (empty($getimg) OR ! file_exists($dirfoto . $getimg)) {
                echo '<img src = "../images/foto_pengajar/noimg.jpg" id = "gambar_nodin" width = "400" alt = "Preview Gambar" class = "img-thumbnail img-responsive"/>';
            } else {
                echo '<img src="../images/foto_pengajar/' . $selectedit2->foto_peng . '" id="gambar_nodin" width="400" alt="Preview Gambar" class="img-thumbnail img-responsive"/>';
            }
            echo '	
                        <output id="gambar_nodin"></output>
			<input type="file" name="Filegambar" id="preview_gambar" class="btn btn-info" value=' . $selectedit2->foto_peng . '/>';
            ?>
            <script>
                function bacaGambar(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e)
                        {
                            $('#gambar_nodin').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }
            </script>
            <?php
            echo '
            </div>
            
            </div>
            </div>
            <div class="panel-footer">
            <a href="detail-pengajar.php?detail=' . $idedit . '" class="btn btn-warning btn-md"><span class="fa fa-angle-left" aria-hidden="true" title="kembali"></span> Kembali</a>
            <button type="submit" name="btn_ubah" class="btn btn-success btn-md" ><i class="fa fa-save"></i>&nbsp;Simpan</button>
            </div>        
            </form>		
	';
            if (isset($_POST['btn_ubah'])) {
                $input = new stdClass();
                $input->id = $_POST['tx_id_peng'];
                $input->nm = antiinjection($_POST['tx_nm_peng']);
                $input->klmn = antiinjection($_POST['jk_kl']);
                $input->tmp_lhr = antiinjection($_POST['tx_tmp_lhr']);
                $input->tgl_lhr = antiinjection($_POST['tx_tgl_lhr']);
                $input->pdkn = antiinjection($_POST['tx_pdkn']);
                $input->ket_pdkn = antiinjection($_POST['tx_ket_pdkn']);
                $input->status = antiinjection($_POST['tx_status']);
                $input->pkw = antiinjection($_POST['tx_nkh']);
                $input->tpq_desa = antiinjection($_POST['tx_tpq']);
                $input->kls = antiinjection($_POST['tx_kls']);
                $input->kontak = antiinjection($_POST['tx_kontak']);
                $input->almt = mysql_escape_string($_POST['alamat']);
                $input->oldfoto = antiinjection($_POST['oldfoto']);
                if (empty($_FILES['Filegambar']['tmp_name'])) {
                    if (empty($input->oldfoto)) {
                        $input->foto = "";
                    } else {
                        $input->foto = $input->oldfoto;
                    }
                } else {
                    $input->foto = $_FILES['Filegambar']['name'];
                }
                $ext_foto = end((explode(".", $input->foto)));
                $string = preg_replace("/[^A-Za-z0-9 ]/", '', $input->id);
                $string = str_ireplace(" ", "_", $string);
                $input->foto = strtolower($string . "_FOTO" . '.' . $ext_foto);
                require_once "../db/database.php";
                $isi = "Update data_pengajar set id_peng='" . $input->id . "' , j_klmn='" . $input->klmn . "',nm_peng='" . $input->nm . "' , tmp_lhr='" . $input->tmp_lhr . "', tgl_lhr='" . $input->tgl_lhr . "',pdkn='" . $input->pdkn . "', ket_pdkn='" . $input->ket_pdkn . "',status='" . $input->status . "', pkw='" . $input->pkw . "', tpq_desa='" . $input->tpq_desa . "', kelas_ajar='" . $input->kls . "', kontak_peng='" . $input->kontak . "', alamat_peng='" . $input->almt . "',foto_peng='" . $input->foto . "'  WHERE id_peng = '" . $input->id . "'";
                $sqltambah = mysql_query($isi) or die(mysql_error());
                if ($_FILES['Filegambar']['tmp_name']) {
                    $dirfoto = "../images/foto_pengajar/";
                    $foto_data = $dirfoto . $input->foto;
                    $foto_move = move_uploaded_file($_FILES['Filegambar']['tmp_name'], $foto_data);                    
                    if (file_exists($dirfoto . $input->oldfoto)) {
                        unlink($dirfoto . $input->oldfoto);
                    }
                }
                if ($sqltambah) {
                    echo '<meta http-equiv="refresh" content="0;url=detail-pengajar.php?detail=' . $input->id . '">';
                } else {

                    echo "<script type='text/javascript'>alert('Data gagal diubah')</script>";
                }
            }
        }
    }
}
?>
<footer>
    <hr>

    <!-- Purchase a site license to remove this link from the footer: http://www.portnine.com/bootstrap-themes -->

    <p>© 2015 <a href="http://www.portnine.com" target="_blank">PPG Jakarta Pusat</a></p>
</footer>
</body></html>		