<?php
$title = "Ubah";
require "template/header.php";

//ambil id dari url
$id = $_GET["id_barang"];

// $brg = query("select barang.*, kategori.*
// from barang,kategori  WHERE barang.id_barang ='$id'")[0];
$brg = query("select barang.*, kategori.id_kategori, kategori.nama_kategori
from barang inner join kategori on barang.id_kategori = kategori.id_kategori 
WHERE id_barang='$id'")[0];

//kategori otomatis
$qkat = query("SELECT * FROM kategori");

if (isset($_POST["ubah"])) {
    // var_dump($_POST);
    $id = $_POST["id"];
    $id_barang = $_POST["id_barang"];
    $id_kategori = htmlspecialchars($_POST["id_kategori"]);
    $nama_barang = htmlspecialchars($_POST["nama_barang"]);
    $merk = htmlspecialchars($_POST["merk"]);
    $harga_beli = htmlspecialchars($_POST["harga_beli"]);
    $harga_jual = htmlspecialchars($_POST["harga_jual"]);
    $satuan_barang = htmlspecialchars($_POST["satuan_barang"]);
    $stok = htmlspecialchars($_POST["stok"]);
    $tgl_update = htmlspecialchars($_POST["tgl_update"]);

    $query = "UPDATE barang SET
    id='$id',
    id_kategori='$id_kategori',
    nama_barang='$nama_barang',
    merk='$merk',
    harga_beli='$harga_beli',
    harga_jual='$harga_jual',
    satuan_barang='$satuan_barang',
    stok='$stok',
    tgl_input='10 June 2022, 16:47',
    tgl_update='$tgl_update'
     WHERE id_barang='$id_barang'";
    $hasil = mysqli_query($conn, $query);
    // var_dump($hasil);
    // cek berhasil ubah
    if ($hasil) {
        echo '<script>window.location="barang.php"</script>';
    } else {

        echo "<script>
        alert(data gagal diubah!);
        document.location.href='barang.php';
        </script>";
    }
}




?>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Ubah Data Barang
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-tasks"></i> Master</a></li>
            <li><a href="#">Barang</a></li>
            <li class="active">Ubah Data Barang</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <!-- <div class="box"> -->
                <div class="header">

                    Ubah Data
                    <br><br>
                </div><!-- /.box-header -->
                <form role="form" action="" method="POST" enctype="multipart/form-data">

                    <table class="table table-striped bordered">
                        <tr>
                            <td>ID Barang</td>
                            <input type="hidden" name="id" id="id" value="<?= $brg["id"] ?>">
                            <td><input type="text" readonly="readonly" required value="<?= $brg["id_barang"]; ?>" class="form-control" name="id_barang"></td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td>
                                <select name="id_kategori" class="form-control" required>
                                    <option value="">Pilih Kategori</option>
                                    <option value="<?= $brg["id_kategori"] ?>" selected><?= $brg["nama_kategori"]  ?></option>
                                    <?php foreach ($qkat as $isi) { ?>
                                        <option value="<?= $isi["id_kategori"] ?>"><?= $isi["nama_kategori"]  ?></option>
                                    <?php }  ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Barang</td>
                            <td><input type="text" placeholder="Nama Barang" required class="form-control" name="nama_barang" value="<?= $brg["nama_barang"]; ?>"></td>
                        </tr>
                        <tr>
                            <td>Merk Barang</td>
                            <td><input type="text" placeholder="Merk Barang" required class="form-control" name="merk" value="<?= $brg["merk"]; ?>"></td>
                        </tr>
                        <tr>
                            <td>Harga Beli</td>
                            <td><input type="number" placeholder="Harga beli" required class="form-control" name="harga_beli" value="<?= $brg["harga_beli"]; ?>"></td>
                        </tr>
                        <tr>
                            <td>Harga Jual</td>
                            <td><input type="number" placeholder="Harga Jual" required class="form-control" name="harga_jual" value="<?= $brg["harga_jual"]; ?>"></td>
                        </tr>
                        <tr>
                            <td>Satuan Barang</td>
                            <td>
                                <select name="satuan_barang" class="form-control" required>
                                    <option value="<?= $brg["satuan_barang"]; ?>"><?= $brg["satuan_barang"]; ?></option>
                                    <option value="#">Pilih Satuan</option>
                                    <option value="PCS">PCS</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>Stok</td>
                            <?php $stok = $brg["stok"]; ?><?php settype($stok, "integer"); ?>
                            <td><input type="number" value="<?= $stok ?>" placeholder="Stok" required class="form-control" name="stok"></td>
                        </tr>
                        <tr>
                            <td>Tanggal Update</td>
                            <td><input type="text" required readonly="readonly" class="form-control" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                            echo  date("j F Y, H:i"); ?>" name="tgl_update"></td>
                        </tr>
                    </table>


                    <button type="submit" name="ubah" id="ubah" class="btn btn-warning"> Update Data </button>
                    <a href="barang.php" class="btn btn-danger">Batal </a>
            </div>
            </form>
        </div><!-- /.box-body -->
        <br>
        <!-- </div> -->
        </div>

        <!-- </section>/.content -->
        <?php require 'template/footer.php'; ?>
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->
<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="js/AdminLTE/app.js" type="text/javascript"></script>


</body>

</html>