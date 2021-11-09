<?php
    include 'koneksi.php';

    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == "add"){

            $judul_buku = $_POST['judul_buku'];
            $penulis = $_POST['penulis'];
            $jenis_buku = $_POST['jenis_buku'];
            $gambar_buku = $_FILES['gambar_buku']['name'];
            
            $dir = "gambar/";
            $tmpFiles = $_FILES['gambar_buku']['tmp_name'];
            
            move_uploaded_file($tmpFiles, $dir.$gambar_buku);

            //die();

            $query = "INSERT INTO buku VALUES(null, '$judul_buku', '$penulis', '$jenis_buku', '$gambar_buku')";
            $sql = mysqli_query($conn, $query);

            if($sql){
                header("location: index.php");
                //echo "Data berhasil ditambahkan <a href='index.php'>[Home]</a>";
            } else {
                echo $query;
            }

            //echo $judul_buku." | ".$penulis." | ".$jenis_buku." | ".$gambar_buku;

            //echo "<br>Tambah data <a href='index.php'>[Home]</a>";
        } else if($_POST['aksi'] == "edit"){
            //echo "Edit Data <a href='index.php'>[Home]</a>";
            //var_dump($_POST);
            $id_buku = $_POST['id_buku'];
            $judul_buku = $_POST['judul_buku'];
            $penulis = $_POST['penulis'];
            $jenis_buku = $_POST['jenis_buku'];

            $queryShow = "SELECT * FROM buku WHERE id_buku = '$id_buku'; ";
            $sqlShow = mysqli_query($conn, $queryShow);
            $result = mysqli_fetch_assoc($sqlShow);

            if($_FILES['gambar_buku']['name'] == ""){
                $gambar = $result['gambar_buku'];
            } else  {
                $gambar = $_FILES['gambar_buku']['name'];
                unlink("gambar/".$result['gambar_buku']);
                move_uploaded_file($_FILES['gambar_buku']['tmp_name'], 'gambar/'.$_FILES['gambar_buku']['name']);
            }
            $query = "UPDATE buku SET judul_buku='$judul_buku', penulis='$penulis', jenis_buku='$jenis_buku', gambar_buku='$gambar' WHERE id_buku='$id_buku';";
            $sql = mysqli_query($conn, $query);
            header("location: index.php");

        }
    }
    if(isset($_GET['hapus'])){
        $id_buku = $_GET['hapus'];

        $queryShow = "SELECT * FROM buku WHERE id_buku = '$id_buku'; ";
        $sqlShow = mysqli_query($conn, $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        //var_dump($result);

        unlink("gambar/".$result['gambar_buku']);

        $query = "DELETE FROM buku WHERE id_buku = '$id_buku' ";
        $sql = mysqli_query($conn, $query);
        
        if($sql){
            header("location: index.php");
        } else {
            echo $query;
        }
    }
        //echo "Hapus Data <a href='index.php'>[Home]</a>";
?>