<?php
error_reporting(E_ALL);
include_once 'koneksi.php';
if (isset($_POST['submit'])) {
    $id = $_POST['id'] ?? '';
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];
    $file_gambar = $_FILES['file_gambar'];
    $gambar = null;
    if ($file_gambar['error'] == 0) {
        $filename = str_replace(' ', '_', $file_gambar['name']);
        $destination = dirname(__FILE__) . '/gambar/' . $filename;
        if (move_uploaded_file($file_gambar['tmp_name'], $destination)) {
            $gambar = 'gambar/' . $filename;;
        }
    }
    $id = mysqli_real_escape_string($conn, $id);
    $nama = mysqli_real_escape_string($conn, $nama);
    $kategori = mysqli_real_escape_string($conn, $kategori);
    $harga_jual = mysqli_real_escape_string($conn, $harga_jual);
    $harga_beli = mysqli_real_escape_string($conn, $harga_beli);
    $stok = mysqli_real_escape_string($conn, $stok);
    $sql = 'UPDATE data_barang SET ';
    $sql .= "nama = '{$nama}', kategori = '{$kategori}', ";
    $sql .= "harga_jual = '{$harga_jual}', harga_beli = '{$harga_beli}',
stok = '{$stok}' ";
    if (!empty($gambar))
        $sql .= ", gambar = '{$gambar}' ";
    $sql .= "WHERE id_barang = '{$id}'";
    $result = mysqli_query($conn, $sql);
    header('location: index.php');
    exit;
}
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if ($id <= 0) {
    header('location: index.php');
    exit;
}
$sql = "SELECT * FROM data_barang WHERE id_barang = '{$id}'";
$result = mysqli_query($conn, $sql);
if (!$result) die('Error: Data tidak tersedia');
$data = mysqli_fetch_array($result);
if (!$data) {
    header('location: index.php');
    exit;
}
function is_select($var, $val)
{
    if ($var == $val) return 'selected="selected"';
    return false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ubah Barang</title>
</head>

<body style="margin: 0; font-family: Arial, Helvetica, sans-serif; color: #111;">
    <div class="container" style="width: 590px; min-height: 100vh; margin-left: 26px; padding: 0 12px 36px 12px; border-left: 1px solid #999; box-sizing: border-box;">
        <h1 style="margin: 0; padding: 13px 0 1px 0; font-size: 36px; line-height: 1.2; border-bottom: 1px solid #ddd;">Ubah Barang</h1>
        <div class="main" style="padding-top: 21px;">

            <form method="post" action="ubah.php" enctype="multipart/form-data" style="margin: 0;">

                <div class="input" style="display: flex; align-items: center; margin-bottom: 13px;">
                    <label style="width: 210px; flex-shrink: 0; font-size: 18px;">Nama Barang</label>
                    <input type="text" name="nama" value="<?php echo htmlspecialchars($data['nama']); ?>"
                        style="width: 206px; height: 30px; padding: 3px 6px; border: 1px solid #d5d5d5; border-radius: 5px; box-sizing: border-box; font-size: 16px;" />
                </div>
                <div class="input" style="display: flex; align-items: center; margin-bottom: 13px;">
                    <label style="width: 210px; flex-shrink: 0; font-size: 18px;">Kategori</label>
                    <select name="kategori" style="width: 140px; height: 30px; padding: 2px 6px; border: 1px solid #d5d5d5; border-radius: 5px; box-sizing: border-box; font-size: 16px;">
                        <option <?php echo is_select('Komputer', $data['kategori']); ?> value="Komputer">Komputer</option>
                        <option <?php echo is_select('Elektronik', $data['kategori']); ?> value="Elektronik">Elektronik</option>
                        <option <?php echo is_select('Hand Phone', $data['kategori']); ?> value="Hand Phone">Hand Phone</option>
                    </select>
                </div>
                <div class="input" style="display: flex; align-items: center; margin-bottom: 13px;">
                    <label style="width: 210px; flex-shrink: 0; font-size: 18px;">Harga Jual</label>
                    <input type="text" name="harga_jual" value="<?php echo htmlspecialchars($data['harga_jual']); ?>"
                        style="width: 206px; height: 30px; padding: 3px 6px; border: 1px solid #d5d5d5; border-radius: 5px; box-sizing: border-box; font-size: 16px;" />
                </div>
                <div class="input" style="display: flex; align-items: center; margin-bottom: 13px;">
                    <label style="width: 210px; flex-shrink: 0; font-size: 18px;">Harga Beli</label>
                    <input type="text" name="harga_beli" value="<?php echo htmlspecialchars($data['harga_beli']); ?>"
                        style="width: 206px; height: 30px; padding: 3px 6px; border: 1px solid #d5d5d5; border-radius: 5px; box-sizing: border-box; font-size: 16px;" />
                </div>
                <div class="input" style="display: flex; align-items: center; margin-bottom: 13px;">
                    <label style="width: 210px; flex-shrink: 0; font-size: 18px;">Stok</label>
                    <input type="text" name="stok" value="<?php echo htmlspecialchars($data['stok']); ?>"
                        style="width: 206px; height: 30px; padding: 3px 6px; border: 1px solid #d5d5d5; border-radius: 5px; box-sizing: border-box; font-size: 16px;" />
                </div>
                <div class="input" style="display: flex; align-items: center; margin-bottom: 15px;">
                    <label style="width: 210px; flex-shrink: 0; font-size: 18px;">File Gambar</label>
                    <input type="file" name="file_gambar" style="width: 305px; height: 31px; font-size: 16px;" />
                </div>
                <div class="submit" style="padding-left: 210px;">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($data['id_barang']); ?>" />
                    <input type="submit" name="submit" value="Simpan"
                        style="padding: 5px 7px; background-color: blue; color: white; border: 0; border-radius: 6px; font-size: 16px; cursor: pointer;" />
                </div>
            </form>
        </div>
    </div>
</body>

</html>