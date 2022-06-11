    <?php
    $title = "Barang";
    require 'template/header.php';

    if (isset($_POST["tambah"])) {
        if (tambah($_POST) > 0) {
            echo "<script>
                alert('berhasil ditambahkan!');
            </script>";
        } else {
            echo mysqli_error($conn);
        }
    }

    //id barang otomatis
    $query = mysqli_query($conn, "SELECT max(id_barang) AS kodeTerbesar FROM barang");
    $data = mysqli_fetch_array($query);
    $brg = $data['kodeTerbesar'];
    $urutan = (int) substr($brg, 2, 3);
    $urutan++;
    $huruf = 'BR';
    $brg = $huruf . sprintf("%03s", $urutan);


    //kategori otomatis
    $qkat = query("SELECT * FROM kategori");

    ?>

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Data Barang
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-tasks"></i> Master</a></li>
                <li><a href="#">Barang</a></li>
                <li class="active">Data Barang</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">

                    <!-- <div class="box"> -->
                    <div class="header">

                        <button type="button" class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#compose-modal">
                            <i class="fa fa-plus"></i> Insert Data</button>
                        <a href="barang.php" style="margin-right :0.5pc;" class="btn btn-success btn-md pull-right">
                            <i class="fa fa-refresh"></i> Refresh Data</a>
                        <br><br>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped " id="example1">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Id Barang</th>
                                    <th>Kategori</th>
                                    <th>Nama Barang</th>
                                    <th>Merk</th>
                                    <th>Stok</th>
                                    <th>Harga Beli</th>
                                    <th>Harga Jual</th>
                                    <th>Satuan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $totalBeli = 0;
                                $totalJual = 0;
                                $totalStok = 0;
                                $i = 1; ?>

                                <?php foreach ($barang as $row) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $row["id_barang"] ?></td>
                                        <td><?= $row["nama_kategori"] ?></td>
                                        <td><?= $row["nama_barang"] ?></td>
                                        <td><?= $row["merk"] ?></td>
                                        <td><?= $row["stok"] ?></td>
                                        <td>Rp.<?= number_format($row["harga_beli"]) ?>,-</td>
                                        <td>Rp.<?= number_format($row["harga_jual"]) ?>,-</td>
                                        <td><?= $row["satuan_barang"] ?></td>
                                        <td>
                                            <a href="detail_barang.php?id_barang=<?= $row["id_barang"] ?>"><button class="btn btn-primary btn-xs">Detail </button></a>
                                            <a href="ubah.php?id_barang=<?= $row["id_barang"] ?>"><button class="btn btn-warning btn-xs">Ubah </button> </a>
                                            <a href="hapus.php?id_barang=<?= $row["id_barang"] ?>"><button class="btn btn-danger btn-xs">Hapus </button></a>
                                        </td>
                                    </tr>
                                    <?php $i++;
                                    $totalBeli += $row['harga_beli'] * $row['stok'];
                                    $totalJual += $row['harga_jual'] * $row['stok'];
                                    $totalStok += $row['stok'];
                                    ?>
                                <?php endforeach ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="5">Total </td>
                                    <th><?php echo $totalStok; ?></td>
                                    <th>Rp.<?php echo number_format($totalBeli); ?>,-</td>
                                    <th>Rp.<?php echo number_format($totalJual); ?>,-</td>
                                    <th colspan="2" style="background:#ddd"></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div><!-- /.box-body -->
                    <!-- </div>/.box -->
                </div>
            </div>

        </section><!-- /.content -->
    </aside><!-- /.right-side -->
    </div><!-- ./wrapper -->

    <!-- COMPOSE MESSAGE MODAL -->
    <div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background:#285c64;color:#fff;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Tambah Barang</h4>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <table class="table table-striped bordered">
                            <tr>
                                <td>ID Barang</td>
                                <td><input type="text" readonly="readonly" required value="<?php echo "$brg"; ?>" class="form-control" name="id_barang"></td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td>
                                    <select name="id_kategori" class="form-control" required>
                                        <option value="#">Pilih Kategori</option>
                                        <?php foreach ($qkat as $isi) { ?>
                                            <option value="<?= $isi["id_kategori"]  ?>"><?= $isi["nama_kategori"]  ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Barang</td>
                                <td><input type="text" placeholder="Nama Barang" required class="form-control" name="nama_barang"></td>
                            </tr>
                            <tr>
                                <td>Merk Barang</td>
                                <td><input type="text" placeholder="Merk Barang" required class="form-control" name="merk"></td>
                            </tr>
                            <tr>
                                <td>Harga Beli</td>
                                <td><input type="number" placeholder="Harga beli" required class="form-control" name="harga_beli"></td>
                            </tr>
                            <tr>
                                <td>Harga Jual</td>
                                <td><input type="number" placeholder="Harga Jual" required class="form-control" name="harga_jual"></td>
                            </tr>
                            <tr>
                                <td>Satuan Barang</td>
                                <td>
                                    <select name="satuan_barang" class="form-control" required>
                                        <option value="#">Pilih Satuan</option>
                                        <option value="PCS">PCS</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Stok</td>
                                <td><input type="number" required Placeholder="Stok" class="form-control" name="stok"></td>
                            </tr>
                            <tr>
                                <td>Tanggal Input</td>
                                <td><input type="text" required readonly="readonly" class="form-control" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                echo  date("j F Y, H:i"); ?>" name="tgl_input"></td>
                            </tr>
                        </table>

                    </div>
                    <div class="modal-footer clearfix">

                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Discard</button>

                        <button type="submit" name="tambah" class="btn btn-primary pull-left"><i class="fa fa-plus"></i> Insert Data </button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

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