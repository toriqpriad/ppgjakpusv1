<?php include 'cek_session.php'; ?>
<!doctype html>
<html lang="en"><head>

        <meta charset="utf-8">
        <title>Caberawit</title>
        <?php include 'header_superadmin.php'; ?>
    </head>
    <?php include 'menu_superadmin.php'; ?>   

    <?php include 'script-data-caberawit.php'; ?>

</div>
<?php tambah(); ?>
</div>

</div>
</div>

<input type="hidden" id="dtp_input2" value=""/>
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
