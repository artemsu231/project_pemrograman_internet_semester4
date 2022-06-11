 <?php
    $title = "Pengaturan Toko";
    require 'template/header.php';

    if (isset($_POST["upd"])) {
        if (updateToko($_POST) > 0) {
            echo '<script>alert("Update Sukses");window.location="pengaturan.php"</script>';
        } else {
            echo '<script>alert("Update Gagal");window.location="pengaturan.php"</script>';
        }
    }



    ?>
 <!-- Right side column. Contains the navbar and content of the page -->
 <aside class="right-side">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             Setting
         </h1>
         <ol class="breadcrumb">
             <li><a href="#"><i class="fa fa-cog"></i> Setting</a></li>
             <li><a href="#">Pengaturan Aplikasi</a></li>
             <li class="active">Pengaturan</li>
         </ol>
     </section>

     <!-- Main content -->
     <section class="content">
         <div class="box box-primary">
             <div class="box-header">
                 <h3 class="box-title">Setting Aplikasi</h3>
             </div>
             <div class="box-body">
                 <form action="" method="post" enctype="multipart/form-data">
                     <div class="form-group">
                         <label>Nama Toko:</label>
                         <div class="input-group">
                             <div class="input-group-addon">
                                 <i class="fa fa-briefcase"></i>
                             </div>
                             <input type="hidden" name="id_toko" value="<?= $setting['id_toko'] ?>">
                             <input type="text" class="form-control" name="nama_toko" value="<?= $setting['nama_toko'] ?>" />
                         </div><!-- /.input group -->
                     </div><!-- /.form group -->
                     <!-- phone mask -->
                     <div class="form-group">
                         <label>Alamat:</label>
                         <div class="input-group">
                             <div class="input-group-addon">
                                 <i class="fa fa-home"></i>
                             </div>
                             <input type="text" class="form-control" name="alamat_toko" value="<?= $setting['alamat_toko'] ?>" />
                         </div><!-- /.input group -->
                     </div><!-- /.form group -->

                     <!-- phone mask -->
                     <div class="form-group">
                         <label>Kontak (Hp):</label>
                         <div class="input-group">
                             <div class="input-group-addon">
                                 <i class="fa fa-phone"></i>
                             </div>
                             <input type="text" class="form-control" name="telp" value="<?= $setting['telp'] ?>" />
                         </div><!-- /.input group -->
                     </div><!-- /.form group -->

                     <!-- Nama Pemilik -->
                     <div class="form-group">
                         <label>Nama Pemilik:</label>
                         <div class="input-group">
                             <div class="input-group-addon">
                                 <i class="fa fa-user"></i>
                             </div>
                             <input type="text" class="form-control" name="nama_pemilik" value="<?= $setting['nama_pemilik'] ?>" />
                         </div><!-- /.input group -->
                     </div><!-- /.form group -->

                     <button type="submit" name="upd" class="btn btn-primary">Udate </button>
                 </form>
             </div><!-- /.box-body -->
         </div><!-- /.box -->

     </section><!-- /.content -->
 </aside><!-- /.right-side -->
 </div><!-- ./wrapper -->
 <?php require 'template/footer.php'; ?>