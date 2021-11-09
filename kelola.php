<!DOCTYPE html>

<?php
    include 'koneksi.php';
    $id_buku = '';
    $judul_buku = '';
    $penulis = '';
    $jenis_buku = '';

    if(isset($_GET['ubah'])){
        $id_buku = $_GET['ubah'];

        $query = "SELECT * FROM buku WHERE id_buku = '$id_buku';";
        $sql = mysqli_query($conn, $query);

        $result = mysqli_fetch_assoc($sql);

        $judul_buku = $result['judul_buku'];
        $penulis = $result['penulis'];
        $jenis_buku = $result['jenis_buku'];

        //var_dump($result);
        //die();
    }
?>

<html>
    <meta charset="utf-8">
    <title>CRUD</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
</html>
<body>
    <nav class="navbar navbar-light bg-light mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                    CRUD 02 PHP - Bootstrap 5
            </a>
        </div>
    </nav>
    <div class="container">
        <!-- form -->
        <form method="POST" action="proses.php" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $id_buku?>" name="id_buku">
        <div class="mb-3 row">
            <label for="judul_buku" class="col-sm-2 col-form-label">Judul Buku</label>
            <div class="col-sm-10">
              <input required type="text" name="judul_buku" class="form-control" id="judul_buku" placeholder="Masukan judul buku" value="<?php echo $judul_buku; ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
            <div class="col-sm-10">
              <input required type="text" name="penulis" class="form-control" id="penulis" placeholder="Masukan nama penulis" value="<?php echo $penulis; ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jenis_buku" class="col-sm-2 col-form-label">Jenis Buku</label>
            <div class="col-sm-10">
                <select required id="jenis_buku" name="jenis_buku" class="form-select" >
                    <option <?php if($jenis_buku == 'Pendidikan'){ echo "selected";} ?> value="Pendidikan">Pendidikan</option>
                    <option <?php if($jenis_buku == 'Ensiklopedi'){ echo "selected";} ?>  value="Ensiklopedi">Ensiklopedi</option>
                    <option <?php if($jenis_buku == 'Buku Ilmiah'){ echo "selected";} ?>  value="Buku Ilmiah">Buku Ilmiah</option>
                    <option <?php if($jenis_buku == 'Atlas'){ echo "selected";} ?>  value="Atlas">Atlas</option>
                    <option <?php if($jenis_buku == 'Kamus'){ echo "selected";} ?>  value="Kamus">Kamus</option>
                    <option <?php if($jenis_buku == 'Novel'){ echo "selected";} ?>  value="Novel">Novel</option>
                    <option <?php if($jenis_buku == 'Komik'){ echo "selected";} ?>  value="Komik">Komik</option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="gambar_buku" class="form-label">
                Gambar Buku
            </label>
            <input <?php if(!isset($_GET['ubah'])){ echo "required";} ?> class="form-control" type="file" name="gambar_buku" id="gambar_buku" accept="image/*">
          </div>
        <div class="mb-3 row mt-4">
            <div class="col">
                <?php
                    if(isset($_GET['ubah'])){
                ?>
                    <button type="submit" name="aksi" value="edit" class="btn btn-primary">
                        <i class="fa fa-floppy-o" aria-hidden="true"></i>
                        Simpan perubahan
                    </button>
                <?php 
                    } else {
                ?>
                    <button type="submit" name="aksi" value="add" class="btn btn-primary">
                        <i class="fa fa-floppy-o" aria-hidden="true"></i>
                        Tambahkan
                    </button>
                <?php 
                    }
                ?>
                <a href="index.php" class="btn btn-danger">
                    <i class="fa fa-reply" aria-hidden="true"></i>
                    Batalkan
                </a>
            </div>
        </div>
        </form>
    </div>
</body>