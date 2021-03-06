<?php include 'cek_session.php'; ?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Detail Remaja</title>
        <?php include 'header_superadmin.php'; ?>
    </head>
    <?php include 'menu_superadmin.php'; ?>   
    <div class="main-content">
        <div class="panel panel-default">
            <div class="panel-heading">Detail Data</div>
            <div class="panel-body"><?php detail(); ?></div>
            <?php

            function detail() {
                if (isset($_GET['detail'])) {
                    $dirfoto = "../images/foto_rmj/";
                    require_once "../db/database.php";
                    //$selectdetail = mysql_query("SELECT * FROM data_pengajar where id_peng = '".$_GET['detail']."' ") or die(mysql_error());
                    $skripdetail = "SELECT * FROM data_remaja inner join data_tpq on data_remaja.tpq_desa=data_tpq.id_tpq where id_rmj='" . $_GET['detail'] . "' ";
                    $selectdetail = mysql_query($skripdetail);
                    $selectdetail2 = mysql_fetch_object($selectdetail);

                    echo '
                    <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                    <li class="active"><a href="#detail_tpq" data-toggle="tab">Detail Remaja</a></li>
                    <li><a href="#foto" data-toggle="tab">Foto Remaja</a></li>		        
                    </ul>
                    <div id="my-tab-content" class="tab-content">
                    <div class="tab-pane active" id="detail_tpq">
                    <br>
                    <form id="tab">
                    <div class="form-group">
                    <label>ID Remaja</label>
                    <input type="text" value=' . $selectdetail2->id_rmj . ' class="form-control" disabled>
                    </div>
                    <div class="form-group">
                    <label>Nama Remaja</label>
                    <input type="text" class="form-control" value="' . $selectdetail2->nm_rmj . '" disabled>
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
                    <label>Kelas</label>
                    <input type="text" value="' . $selectdetail2->kls . '" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                    <label>Nama Sekolah/Universitas/Tempat Kerja</label>
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
                    <input type="text" value="' . $selectdetail2->kontak_rmj . '" class="form-control" disabled>
                    </div>
                    
                    <div class="form-group">
                    <label>Alamat</label>
                    <textarea rows="3" class="form-control" disabled>' . $selectdetail2->alamat_rmj . '</textarea>
                    </div>      
        
                    </div>
                    </form>
      
                    <div class="tab-pane" id="foto">
                    <br>';
                    if (!empty($selectdetail2->foto_rmj) AND file_exists($dirfoto . $selectdetail2->foto_rmj)) {
                        echo '<img src="../images/foto_rmj/' . $selectdetail2->foto_rmj . '" class="img-responsive img-thumbnail" style="width:300px; height:300px;">	';
                    } else {
                        echo '<img src="../images/foto_rmj/noimg.jpg" class="img-responsive img-thumbnail" style="width:300px; height:300px;"> ';
                    }
                    echo ' 
                    </div>
		
                    </div>
                    <br>';
                    echo '
                    </div>
 
                     <div class="panel-footer">
                    ';
                    ?>
                    <a href="?edit=<?= $selectdetail2->id_rmj; ?>" class="btn btn-info"><span class="glyphicon glyphicon-pencil" aria-hidden="true" title="Ubah"></span> Ubah</a>
                    <a href="data-pengajar.php?hapus=<?= $selectdetail2->id_rmj; ?>" onclick="return confirm('Yakin menghapus data ini?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true" title="Hapus"></span> Hapus</a>	
                    <?php
                    echo '                 
                    </div></div>	
                    ';
                    //edit//
                }
                if (isset($_GET['edit'])) {

                    require_once "../db/database.php";
                    $skripedit = "SELECT * FROM data_remaja inner join data_tpq on data_remaja.tpq_desa=data_tpq.id_tpq where id_rmj='" . $_GET['edit'] . "' ";
                    $selectedit = mysql_query($skripedit) or die(mysql_error());
                    $selectedit2 = mysql_fetch_object($selectedit);
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
                    <label>ID Remaja</label>
                    <input type="text" value=' . $selectedit2->id_rmj . ' class="form-control" name="tx_id_rmj">
                    </div>
                    
                    <div class="form-group">
                    <label>Nama Remaja</label>
                    <input type="text" class="form-control" value="' . $selectedit2->nm_rmj . '" name="tx_nm_rmj">
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
			<option value="SMA" id="pljr" onclick="javascript:mhs_bkj_kls();">SMA</option>
			<option value="SMK" id="pljr" onclick="javascript:mhs_bkj_kls();">SMK</option>
			<option value="MTA" id="pljr" onclick="javascript:mhs_bkj_kls();">MTA</option>
			<option value="Mahasiswa" id="mhsw" onclick="javascript:mhs_bkj_kls();">Mahasiswa</option>
			<option value="Bekerja" id="bkj" onclick="javascript:mhs_bkj_kls();">Bekerja</option>
			
                    </select>
                    </div>
                    <div class="form-group">
                    <label>Kelas (Khusus pelajar SMA/SMK/MTA)</label>
                    <select name="tx_kls" class="form-control input-md" id="kls_pljr">
			<option value="' . $selectedit2->kls . '">' . $selectedit2->kls . '</option> 
			<option value="7">10</option>
			<option value="8">11</option>
			<option value="9">12</option>
			<option value="">None</option>
                    </select>		
                    </div>
                    <div class="form-group">
                    <label>Nama Sekolah/Universitas/Tempat Kerja</label>
                    <input type="text" value="' . $selectedit2->nm_sklh . '" class="form-control" name="tx_nm_sklh" >		
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
                    <input type="text" value="' . $selectedit2->kontak_rmj . '" class="form-control" name="tx_kontak">
                    </div>
		
                    <div class="form-group">
                    <label>Alamat</label>
                    <textarea rows="3" class="form-control" name="alamat" value=' . $selectedit2->alamat_rmj . '>' . $selectedit2->alamat_rmj . '</textarea>
                    </div>      
                    </div>
        
                    <div class="tab-pane" id="foto">
                    <br>
                    ';
                    if (!empty($selectdetail2->foto_rmj) AND file_exists($dirfoto . $selectdetail2->foto_rmj)) {
                        echo '<img src="../images/foto_rmj/' . $selectdetail2->foto_rmj . '" class="img-responsive img-thumbnail" style="width:300px; height:300px;">	';
                    } else {
                        echo '<img src="../images/foto_rmj/noimg.jpg" class="img-responsive img-thumbnail" style="width:300px; height:300px;"> ';
                    }
                    echo ' 
			<output id="gambar_nodin"></output>
			<input type="file" name="Filegambar" id="preview_gambar" class="btn btn-info" value=' . $selectedit2->foto_rmj . '/>';
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
        </div>
        <?php
        echo '
    
	<div class="panel-footer">
        <a href="detail-remaja.php?detail=' . $_GET['edit'] . '" class="btn btn-warning btn-md"><span class="fa fa-angle-left" aria-hidden="true" title="kembali"></span> Kembali</a>
	<button type="submit" name="btn_ubah" class="btn btn-success btn-md" ><i class="fa fa-save"></i>&nbsp;Simpan</button>
	</div>        
	</form>	
	';
        if (isset($_POST['btn_ubah'])) {
            $id = $_POST['tx_id_rmj'];
            $nm = $_POST['tx_nm_rmj'];
            $nm = mysql_real_escape_string($nm);
            $klmn = $_POST['jk_kl'];
            $tmp_lhr = $_POST['tx_tmp_lhr'];
            $tgl_lhr = $_POST['tx_tgl_lhr'];
            $pdkn = $_POST['tx_pdkn'];
            if ($pdkn = 'Mahasiswa' or $pdkn = 'Bekerja') {
                $kls = "";
            } else {
                $kls = $_POST['tx_kls'];
            }
            $nm_sklh = $_POST['tx_nm_sklh'];
            $sklh = mysql_real_escape_string($nm_sklh);
            $tpq_desa = $_POST['tx_tpq'];
            $nm_tpq = $nmtpq;
            $bapak = $_POST['bapak'];
            $ibu = $_POST['ibu'];
            $hobi = $_POST['tx_hobi'];
            $kontak = $_POST['tx_kontak'];
            $almt = $_POST['alamat'];
            $foto = $_FILES['Filegambar']['name'];
            require_once "../db/database.php";
            if (empty($foto)) {
                $isi = "Update data_remaja set id_rmj='" . $id . "' , nm_rmj='" . $nm . "' ,j_klmn='" . $klmn . "', tmp_lhr='" . $tmp_lhr . "', tgl_lhr='" . $tgl_lhr . "',pdkn='" . $pdkn . "', kls='" . $kls . "',nm_sklh='" . $sklh . "',hobi='" . $hobi . "', tpq_desa='" . $tpq_desa . "',nama_tpq='" . $nm_tpq . "', bapak='" . $bapak . "',ibu='" . $ibu . "', kontak_rmj='" . $kontak . "', alamat_rmj='" . $almt . "'  WHERE id_rmj = '" . $id . "'";
            } elseif (!empty($foto)) {
                $isi = "Update data_remaja set id_rmj='" . $id . "' , nm_rmj='" . $nm . "' , j_klmn='" . $klmn . "',tmp_lhr='" . $tmp_lhr . "', tgl_lhr='" . $tgl_lhr . "',pdkn='" . $pdkn . "', kls='" . $kls . "',nm_sklh='" . $sklh . "',hobi='" . $hobi . "', tpq_desa='" . $tpq_desa . "',nama_tpq='" . $nm_tpq . "', bapak='" . $bapak . "',ibu='" . $ibu . "', kontak_rmj='" . $kontak . "', alamat_rmj='" . $almt . "',foto_rmj='" . $foto . "'  WHERE id_rmj = '" . $id . "'";
            }
            echo $isi;
            $sqltambah = mysql_query($isi) or die(mysql_error());
            $dirfoto = "../images/foto_rmj/";
            $foto_data = $dirfoto . basename($foto);
            $foto_move = move_uploaded_file($_FILES['Filegambar']['tmp_name'], $foto_data);

            if ($sqltambah) {

                echo "<script type='text/javascript'>alert('Data berhasil diubah');window.location.href='detail-Remaja.php?detail=$id';</script>";
            } else {

                echo "<script type='text/javascript'>alert('Data gagal diubah')</script>";
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