<?php
    include 'koneksi.php';

    $query = "SELECT * FROM buku;";
    $sql = mysqli_query($conn, $query);
    $no = 0;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>CRUD</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.bundle.min.js"></script>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    </head>
    <body>
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                        CRUD 02 PHP - Bootstrap 5
                </a>
            </div>
        </nav>

        <!-- Judul -->
        <div class="container">
            <h1 class="mt-3">Data Buku</h1>
            <figure>
                <blockquote class="blockquote">
                    <p>Tugas 02 PHP</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                    CRUD <cite title="Source Title">Create, Read, Update, Delete</cite>
                </figcaption>
            </figure>
            <a href="kelola.php" type="button" class="btn btn-primary btn-sm mb-3">
                <i class="fa fa-plus"></i>
                Tambah Data
            </a>
            <div class="table-responsive">
                <table class="table align-middle table-bordered table-hover">
                    <thead>
                    <tr>
                        <th><center>ID</center></th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Jenis Buku</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        while($result = mysqli_fetch_assoc($sql)){
                    ?>
                        <tr>
                            <td><center>
                                <?php echo ++$no; ?>
                            </center></td>
                            <td>
                            <?php echo $result['judul_buku']; ?>
                            </td>
                            <td>
                                <?php echo $result['penulis']; ?>
                            </td>
                            <td>
                                <?php echo $result['jenis_buku']; ?>
                            </td>
                            <td>
                                <img src="gambar/<?php echo $result['gambar_buku']; ?>" alt="<?php echo $result['gambar_buku']; ?>" style="width: 100px;">
                            </td>
                            <td>
                                <a href="kelola.php?ubah=<?php echo $result['id_buku']; ?>" class="btn btn-success btn-sm">
                                    <i class="fa fa-pencil"></i>
                                    Edit
                                </a>
                                <a href="proses.php?hapus=<?php echo $result['id_buku']; ?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')">
                                    <i class="fa fa-trash"></i>
                                    Hapus
                                </a>
                            </td>
                        </tr>
                    <?php 
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>