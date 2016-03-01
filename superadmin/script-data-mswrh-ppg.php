<?php
require_once "../db/database.php";
$query2 = mysql_query("SELECT * FROM data_musyawarah a inner join data_bidang_ppg b on a.pelaksana_mswrh = b.id_bid Where a.tipe_mswrh IN ('B','P')");
$numrowslihat = mysql_num_rows($query2);
?>	
<div class="panel panel-default">	
    <div class="panel-heading">Keseluruhan Data Musyawarah PPG </div>		
    <div class="panel-body">            
        <!-- Tab panes -->                
        <table class="display nowrap" cellspacing="0" width="100%" id="table_export">    
            <thead>
            <th>#</th>                    
            <th>Judul Musyawarah</th>
            <th>Pelaksana</th>            
            <th>Tgl Pelaksanaan</th>                    
            <th><center>Aksi</center></th>
            </tr>
            </thead>
            <tbody>            
                <?php
                $num = 1;
                while ($hsl = mysql_fetch_object($query2)) {
                    echo '<td >' . $num . '</td>';
                    echo '<td ><a href="detail-mswrh-ppg.php?detail='.$hsl->id_mswrh.'">' . $hsl->judul_mswrh . '</a></td>';
                    echo '<td >' . $hsl->nama . '</td >';
                    echo '<td >' . $hsl->tgl_dibuat . '</td >';
                    ?>
                <td><center>
                    <a title="edit" href="detail-mswrh-ppg.php?edit=<?= $hsl->id_mswrh; ?>" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-edit" title="Ganti"></span></a>
                    <a title="hapus" href="?hapus=<?= $hsl->id_mswrh; ?>" class="btn btn-default btn-sm" onclick='return confirm("Yakin menghapus data ini?")'><span class="glyphicon glyphicon-trash" title="Hapus"></span></a>
                </center>
                </td>


                </tr>					

                <?php
                $num++;
            }
            ?>
        </table>



    </div>
    <div class="panel-footer">
        <div class="row">
            <div class="col-md-6"><a title="Tambah Data" data-toggle="modal" data-target="#myModal" class="btn btn-success"><span class="fa fa-plus"></span> Tambah Data</a></div>
        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
                </div>
                <div class="modal-body">
                    <div id="content">                                
                        <form  method="post" enctype="multipart/form-data" >                                  
                            <div class="form-group">
                                <label>Judul Musyawarah </label>
                                <input type="text" class="form-control" name='judul_mswrh' placeholder="Judul Musyawarah" required>
                            </div>                           
                            <div class="form-group">
                                <label>Tanggal Pelaksanaan</label>
                                <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd" placeholder="dd/mm/yyyy">
                                    <input class="form-control" size="10" type="text" name="tgl_pelaksana" required placeholder="dd/mm/yyy">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Pelaksana</label>
                                <select name="pelaksana" class="form-control input-md">
                                <?php 
                                $sql_pelaksana = mysql_query("select `id_bid`,`nama`,`tipe_bidang` from data_bidang_ppg");
                                while($get_pelaksana = mysql_fetch_object($sql_pelaksana)){
                                    echo '<option value="'.$get_pelaksana->id_bid.'-'.$get_pelaksana->tipe_bidang.'">'.$get_pelaksana->nama.'</option>';
                                }
                                ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Hasil Musyawarah</label>
                                <textarea class="form-control" name="hsl_mswrh"></textarea>
                            </div>                                    
                            
                    </div>


                </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-md" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Tutup</button>
                <button type="submit" name="simpan" class="btn btn-success btn-md" onclick="myFunction()"><i class="fa fa-save"></i>&nbsp;Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>


<?php

function tambah() {
    if (isset($_POST['simpan'])) {
        $input = new stdClass();
        $input->judul = antiinjection($_POST['judul_mswrh']);        
        $input->tgl = antiinjection($_POST['tgl_pelaksana']);        
        $input->tipepelaksana = explode('-',$_POST['pelaksana']);                
        $input->pelaksana = $input->tipepelaksana[0];
        $input->tipe_mswrh = $input->tipepelaksana[1];
        $input->hasil = mysql_escape_string($_POST['hsl_mswrh']);
        require_once "../db/database.php";                
        $input->isi = "INSERT INTO data_musyawarah VALUES(NULL,'$input->tipe_mswrh','$input->pelaksana','$input->hasil','$input->tgl','$input->judul')";
//                                echo '<pre>';print_r($input);echo '</pre>';die();
        $sqltambah = mysql_query($input->isi) or die(mysql_error());        
        if ($sqltambah) {
            ?>
            <script type="text/javascript">
                alert("Data sudah disimpan");
                window.location.href = 'data-mswrh-ppg.php?lihat-msw';</script>
            <?php
        }
        if (!$sqltambah) {
            echo '<script type="text/javascript"> 	alert("Data gagal disimpan");	</script>';
        }
    }
}
?>

<?php
if (isset($_GET['hapus'])) {
    require_once "../db/database.php";
    $hapus = "DELETE FROM `data_musyawarah` WHERE `id_mswrh` = '" . $_GET['hapus'] . "'";
    $sqlhapus = mysql_query($hapus);

    if ($sqlhapus) {
        echo '<script type="text/javascript">alert("Data sudah dihapus");window.location.href="data-mswrh-ppg.php?lihat-msw";	</script>';
    } else {
        echo '<script type="text/javascript"> 	alert("Data gagal dihapus!!");	</script>';
    }
}
?>

