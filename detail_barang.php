<?php
$title = "Detail Barang";
require 'template/header.php';
$id = $_GET["id_barang"];

// $barang2 = query("SELECT * FROM barang WHERE id='$id'")[0];
$barang2 = query("select barang.*, kategori.id_kategori, kategori.nama_kategori
from barang inner join kategori on barang.id_kategori = kategori.id_kategori 
WHERE id_barang='$id'")[0];
?>

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <br>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <a href="barang.php"><button class="btn btn-primary"><i class="fa fa-angle-left"></i> Balik </button></a>

                <div class="box-header">

                    <h3 class="box-title">Detail Barang</h3>

                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <td>ID Barang</td>
                            <td><?= $barang2['id_barang']; ?></td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td><?= $barang2['nama_kategori']; ?></td>
                        </tr>
                        <tr>
                            <td>Nama Barang</td>
                            <td><?= $barang2['nama_barang']; ?></td>
                        </tr>
                        <tr>
                            <td>Merk Barang</td>
                            <td><?= $barang2['merk']; ?></td>
                        </tr>
                        <tr>
                            <td>Harga Beli</td>
                            <td><?= $barang2['harga_beli']; ?></td>
                        </tr>
                        <tr>
                            <td>Harga Jual</td>
                            <td><?= $barang2['harga_jual']; ?></td>
                        </tr>
                        <tr>
                            <td>Satuan Barang</td>
                            <td><?= $barang2['satuan_barang']; ?></td>
                        </tr>
                        <tr>
                            <td>Stok</td>
                            <td><?= $barang2['stok']; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Input</td>
                            <td><?= $barang2['tgl_input']; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Update</td>
                            <td><?= $barang2['tgl_update']; ?></td>
                        </tr>
                    </table>
                </div><!-- /.box-body -->

            </div>
        </div>

    </section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->


<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<!-- DATA TABES SCRIPT -->
<script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="js/AdminLTE/app.js" type="text/javascript"></script>

<!-- page script -->
<script type="text/javascript">
    $(function() {
        $("#example1").dataTable();
        $('#example2').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false
        });
    });
</script>

</body>

</html>