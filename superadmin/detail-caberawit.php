<?php include 'cek_session.php'; ?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Detail Caberawit</title>
        <?php include 'header_superadmin.php'; ?>
    </head>
    <?php include 'menu_superadmin.php'; ?>   
    <div class="main-content">
        <div class="panel panel-default">
            <div class="panel-heading">Detail Data</div>
            <div class="panel-body"><?php detail(); ?></div>
            <?php

            function detail() {
                $dirfoto = "../images/foto_cbr/";
                if (isset($_GET['detail'])) {
                    require_once "../db/database.php";
                    //$selectdetail = mysql_query("SELECT * FROM data_pengajar where id_peng = '".$_GET['detail']."' ") or die(mysql_error());
                    $skripdetail = "SELECT * FROM data_caberawit inner join data_tpq on data_caberawit.tpq_desa=data_tpq.id_tpq where id_cbr='" . $_GET['detail'] . "' ";
                    $selectdetail = mysql_query($skripdetail);
                    $selectdetail2 = mysql_fetch_object($selectdetail);
                    if ($selectdetail2 == false) {
                        echo "Data tidak ditemukan";
                        echo '
                            </div>
                            <div class="panel-footer">
                            <a href="data-caberawit.php?lihat-caberawit" class="btn btn-warning btn-md"><span class="fa fa-angle-left" aria-hidden="true" title="kembali"></span> Kembali</a>
                                </div>
                        ';
                    } else {
                        echo '
		<ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
        <li class="active"><a href="#detail_tpq" data-toggle="tab">Detail Caberawit</a></li>
        <li><a href="#foto" data-toggle="tab">Foto Caberawit</a></li>
		
        
    </ul>
    <div id="my-tab-content" class="tab-content">
        <div class="tab-pane active" id="detail_tpq">
		<br>
        <form id="tab">
		<div class="form-group">
        <label>ID Caberawit</label>
        <input type="text" value=' . $selectdetail2->id_cbr . ' class="form-control" disabled>
        </div>
        <div class="form-group">
        <label>Nama Caberawit</label>
        <input type="text" class="form-control" value="' . $selectdetail2->nm_cbr . '" disabled>
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
		<input type="text" value="Kelas ' . $selectdetail2->kls . '" class="form-control" disabled>
        </div>
		<div class="form-group">
		<input type="text" value="' . $selectdetail2->nm_sklh . '" class="form-control" disabled>
        </div>
        <div class="form-group">
        <label>Hobi</label>
        <input type="text" value="' . $selectdetail2->hobi . '" class="form-control" disabled>
        </div>
		
		<div class="form-group">
        <label>Bapak</label>
        <input type="text" value="' . $selectdetail2->bapak . '" class="form-control" disabled>
        </div>
		
		<div class="form-group">
        <label>Ibu</label>
        <input type="text" value="' . $selectdetail2->ibu . '" class="form-control" disabled>
        </div>
		
		<div class="form-group">
        <label>TPQ/Desa</label>
        <input type="text" value="' . $selectdetail2->tpq_desa . ' - ' . $selectdetail2->nama_tpq . ' - ' . $selectdetail2->desa . ' " class="form-control" disabled>
        </div>		
		<div class="form-group">
        <label>Kontak</label>
        <input type="text" value="' . $selectdetail2->kontak_cbr . '" class="form-control" disabled>
        </div>
        <div class="form-group">
          <label>Alamat</label>
          <textarea rows="3" class="form-control" disabled>' . $selectdetail2->alamat_cbr . '</textarea>
        </div>      
        
      </div>
	  </form>
      
      <div class="tab-pane" id="foto">
		<br>';
                        if (empty($selectdetail2->foto_cbr) OR ! file_exists($dirfoto . $selectdetail2->foto_cbr)) {
                            echo '<img src="../images/foto_cbr/noimg.jpg" class="img-responsive img-thumbnail" style="width:300px; height:300px;">';
                        } else {
                            echo '
                            <img src="../images/foto_cbr/' . $selectdetail2->foto_cbr . '" class="img-responsive img-thumbnail" style="width:300px; height:300px;">';
                        }
                        echo '</div>
        </div>
        </div>
		<br> <div class="panel-footer">
';
                        ?>
                        <a href="?edit=<?= $selectdetail2->id_cbr; ?>" class="btn btn-info"><span class="glyphicon glyphicon-pencil" aria-hidden="true" title="Ubah"></span> Ubah</a>
                        <a href="data-pengajar.php?hapus=<?= $selectdetail2->id_cbr; ?>" onclick="return confirm('Yakin menghapus data ini?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true" title="Hapus"></span> Hapus</a>

                        <?php
                        echo '
		</div>
        	</div>
		</div>                
                ';
                        //edit//
                    }
                }
                if (isset($_GET['edit'])) {

                    require_once "../db/database.php";
                    $skripedit = "SELECT * FROM data_caberawit inner join data_tpq on data_caberawit.tpq_desa=data_tpq.id_tpq where id_cbr='" . $_GET['edit'] . "' ";
                    $selectedit = mysql_query($skripedit) or die(mysql_error());
                    $selectedit2 = mysql_fetch_object($selectedit);
                    if ($selectedit2 == false) {
                        echo "Data tidak ditemukan";
                        echo '
                            </div>
                            <div class="panel-footer">
                            <a href="data-caberawit.php?lihat-caberawit" class="btn btn-warning btn-md"><span class="fa fa-angle-left" aria-hidden="true" title="kembali"></span> Kembali</a>
                                </div>
                        ';
                    } else {
                        echo '
	
	
	
   <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
        <li class="active"><a href="#detail_tpq" data-toggle="tab">Detail Pengajar</a></li>
        <li><a href="#foto" data-toggle="tab">Foto Caberawit</a></li>
		
        
    </ul>
    <div id="my-tab-content" class="tab-content">
        <div class="tab-pane active" id="detail_tpq">
		<br>
        <form method="post" enctype="multipart/form-data" >
		<div class="form-group">
        <label>ID Caberawit</label>
        <input type="text" value=' . $selectedit2->id_cbr . ' class="form-control" name="tx_id_cbr">
        </div>
        <div class="form-group">
        <label>Nama Caberawit</label>
        <input type="text" class="form-control" value="' . $selectedit2->nm_cbr . '" name="tx_nm_cbr">
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
			<option value="TK">TK</option>
			<option value="SD">SD</option>
			
		</select>
		</div>
		<div class="form-group">
		<input type="text" value="' . $selectedit2->kls . '" class="form-control" name="tx_kls">
        </div>
		<div class="form-group">
		<input type="text" value="' . $selectedit2->nm_sklh . '" class="form-control" name="tx_nm_sklh">
        </div>
		<div class="form-group">
        <label>Hobi</label>
        <input type="text" value="' . $selectedit2->hobi . '" class="form-control" name="tx_hobi" >
        </div>
		<div class="form-group">
        <label>Orang Tua</label>
		<input type="text" name="bapak" class="form-control" value="' . $selectedit2->bapak . '" >
        </div>
		<div class="form-group">
		<input type="text" name="ibu" class="form-control" value="' . $selectedit2->ibu . '">
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
                        echo'
		</select>
		</div>

		<div class="form-group">
        <label>Kontak</label>
        <input type="text" value="' . $selectedit2->kontak_cbr . '" class="form-control" name="tx_kontak">
        </div>
		
        <div class="form-group">
          <label>Alamat</label>
          <textarea rows="3" class="form-control" name="alamat" value=' . $selectedit2->alamat_cbr . '>' . $selectedit2->alamat_cbr . '</textarea>
        </div>      
        
      </div>
        
        <div class="tab-pane" id="foto">
		<br>';
                        if (empty($selectedit2->foto_cbr) OR ! file_exists($dirfoto . $selectedit2->foto_cbr)) {
                            echo '<img src="../images/foto_cbr/noimg.jpg" class="img-responsive img-thumbnail" style="width:300px; height:300px;">';
                        } else {
                            echo '
                            <img src="../images/foto_cbr/' . $selectedit2->foto_cbr . '" class="img-responsive img-thumbnail" style="width:300px; height:300px;">';
                        }
                        echo ' 
			<output id="gambar_nodin"></output>
                        <input type="hidden" name="oldfoto" value=' . $selectedit2->foto_cbr . '>
			<input type="file" name="Filegambar" id="preview_gambar" class="btn btn-info" value=' . $selectedit2->foto_cbr . '/>';
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
                        <script>
                            $("#preview_gambar").change(function () {
                                bacaGambar(this);
                            });
                        </script> 
                    </div>
                </div>
            
            
            <?php
            echo '
        </div>
	<div class="panel-footer">
        <a href="detail-caberawit.php?detail=' . $_GET['edit'] . '" class="btn btn-warning btn-md"><span class="fa fa-angle-left" aria-hidden="true" title="kembali"></span> Kembali</a>
	<button type="submit" name="btn_ubah" class="btn btn-success btn-md" ><i class="fa fa-save"></i>&nbsp;Simpan</button>
	</div>        
        </div>
        
	</form>		
	';

            if (isset($_POST['btn_ubah'])) {
                $input = new stdClass();
                $input->id = $_POST['tx_id_cbr'];
                $input->nm_p = antiinjection($_POST['tx_nm_cbr']);
                $input->klmn = antiinjection($_POST['jk_kl']);
                $input->tmp_lhr = antiinjection($_POST['tx_tmp_lhr']);
                $input->tgl_lhr = $_POST['tx_tgl_lhr'];
                $input->pdkn = antiinjection($_POST['tx_pdkn']);
                $input->kls = antiinjection($_POST['tx_kls']);
                $input->sklh = antiinjection($_POST['tx_nm_sklh']);
                $input->tpq_desa = antiinjection($_POST['tx_tpq']);
                $input->bapak = antiinjection($_POST['bapak']);
                $input->ibu = antiinjection($_POST['ibu']);
                $input->hobi = antiinjection($_POST['tx_hobi']);
                $input->kontak = $_POST['tx_kontak'];
                $input->almt = mysql_escape_string($_POST['alamat']);
                $input->oldfoto = $_POST['oldfoto'];
                if (empty($_FILES['Filegambar']['tmp_name'])) {
                    if (empty($input->oldfoto)) {
                        $input->foto = "";
                    } else {
                        $input->foto = $input->oldfoto;
                    }
                } else {
                    $input->foto = $_FILES['Filegambar']['name'];
                }
                $input->ext_foto = end((explode(".", $input->foto)));
                $ext_foto = end((explode(".", $input->foto)));
                $string = preg_replace("/[^A-Za-z0-9 ]/", '', $input->id);
                $string = str_ireplace(" ", "_", $string);
                $input->foto = strtolower($string . "_FOTO" . '.' . $ext_foto);
                require_once "../db/database.php";
//                echo $_FILES['Filegambar']['tmp_name'];die();
//                echo '<pre>';print_r($input);echo '</pre>';die();   
                $isi = "Update data_caberawit set id_cbr='" . $input->id . "' , nm_cbr='" . $input->nm_p . "' , j_klmn='" . $input->klmn . "',tmp_lhr='" . $input->tmp_lhr . "', tgl_lhr='" . $input->tgl_lhr . "',pdkn='" . $input->pdkn . "', kls='" . $input->kls . "',nm_sklh='" . $input->sklh . "',hobi='" . $input->hobi . "', tpq_desa='" . $input->tpq_desa . "', bapak='" . $input->bapak . "',bapak='" . $input->ibu . "', kontak_cbr='" . $input->kontak . "', alamat_cbr='" . $input->almt . "',foto_cbr='" . $input->foto . "'  WHERE id_cbr = '" . $input->id . "'";

                $sqltambah = mysql_query($isi) or die(mysql_error());

                if (!empty($_FILES['Filegambar']['tmp_name'])) {
                    $dirfoto = "../images/foto_cbr/";
                    if (file_exists($dirfoto . $input->oldfoto)) {
                        unlink($dirfoto . $input->oldfoto);
                    }
                    $foto_data = $dirfoto . $input->foto;
                    $foto_move = move_uploaded_file($_FILES['Filegambar']['tmp_name'], $foto_data);
                }
                echo "<script>alert();</script>";
                if ($sqltambah) {
                    echo '<meta http-equiv="refresh" content="0;url=detail-caberawit.php?detail=' . $input->id . '">';
                } else {
                    echo "<script type='text/javascript'>alert('Data gagal diubah')</script>";
                }
            }
        }
    }
}
?>
<script type="text/javascript">
    $('.form_date').datetimepicker({
        language: 'id',
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
</script>


</body></html>		