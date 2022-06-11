<?php
// koneksi
$conn = mysqli_connect("localhost", "root", "", "toko");
// mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
// mysqli_close($conn);

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $row = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    if ($rows) {
        return $rows;
    } else {
        return "";
    }
}

function register($data)
{
    global $conn;

    $user = strtolower(stripcslashes($data["user"]));
    $pass = mysqli_real_escape_string($conn, $data["password"]);
    $pass2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek user ada atau belum
    $result = mysqli_query($conn, "SELECT user FROM login WHERE user='$user'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('user sudah terdaftar!');
        </script>";
        return false;
    }

    //cek konfirmasi password
    if ($pass !== $pass2) {
        echo "<script>
        alert('konfirmasi password tidak sesuai!');
        </script>";
        return false;
    }

    //enkripsi pass
    $pass = password_hash($pass, PASSWORD_DEFAULT);

    //proses penyamaan id
    // $sql = "SELECT * FROM login";
    // $query = mysqli_query($conn, $sql);
    // $data1 = array();
    // while (($row = mysqli_fetch_array($query)) != null) {
    //     $data1[] = $row;
    // }
    // $count = count($data1);

    //tambah user baru ke database
    mysqli_query($conn, "INSERT INTO login VALUES('','$user','$pass')");
    return mysqli_affected_rows($conn);
}

function tambah($data)
{
    global $conn;
    $id_barang = $data["id_barang"];
    $id_kategori = $data["id_kategori"];
    $nama_barang = $data["nama_barang"];
    $merk = $data["merk"];
    $harga_beli = $data["harga_beli"];
    $harga_jual = $data["harga_jual"];
    $satuan_barang = $data["satuan_barang"];
    $stok = $data["stok"];
    $tgl_input = $data["tgl_input"];

    //tambah data
    mysqli_query($conn, "INSERT INTO barang VALUES('','$id_barang','$id_kategori','$nama_barang','$merk','$harga_beli','$harga_jual','$satuan_barang','$stok','$tgl_input','')");
    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;
    $id = $_POST["id"];
    $id_barang = $data["id_barang"];
    $id_kategori = htmlspecialchars($data["id_kategori"]);
    $nama_barang = htmlspecialchars($data["nama_barang"]);
    $merk = htmlspecialchars($data["merk"]);
    $harga_beli = htmlspecialchars($data["harga_beli"]);
    $harga_jual = htmlspecialchars($data["harga_jual"]);
    $satuan_barang = htmlspecialchars($data["satuan_barang"]);
    $stok = htmlspecialchars($data["stok"]);
    $tgl_input = htmlspecialchars($data["tgl_input"]);
    $tgl_update = htmlspecialchars($data["tgl_update"]);

    $query = "UPDATE barang SET
    id='$id',
    id_kategori='$id_kategori',
    nama_barang='$nama_barang',
    merk='$merk',
    harga_beli='$harga_beli',
    harga_jual='$harga_jual',
    satuan_barang='$satuan_barang',
    stok='$stok',
    tgl_input='$tgl_input',
    tgl_update='$tgl_update'
     WHERE id_barang='$id_barang'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function updateToko($data)
{
    global $conn;
    $nama_toko = htmlspecialchars($data["nama_toko"]);
    $alamat_toko = htmlspecialchars($data["alamat_toko"]);
    $telp = htmlspecialchars($data["telp"]);
    $nama_pemilik = htmlspecialchars($data["nama_pemilik"]);
    $id_toko = 1;

    $query = "UPDATE identitas_toko SET
    nama_toko='$nama_toko',
    alamat_toko='$alamat_toko',
    telp='$telp',
    nama_pemilik='$nama_pemilik'
    WHERE id_toko='$id_toko'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
