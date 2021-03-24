<?php 
    session_start();
    include('../koneksi/koneksi.php');
    $id_user = $_SESSION['id_user'];
    $id_kategori_blog = $_POST['kategori_blog'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    if(empty($id_kategori_blog)){
        header("Location:editblog.php?notif=editkosong&jenis=kategoriblog");
    }else if(empty($judul)){
        header("Location:editblog.php?notif=editkosong&jenis=judul");
    }else if(empty($isi)){
        header("Location:editblog.php?notif=editkosong&jenis=isi");
    }else{
        $sql = "UPDATE `blog` SET 
        `id_kategori_blog`='$id_kategori_blog',`id_user`='$id_user',`judul`='$judul',`isi`='$isi',`tanggal`=DATE_FORMAT(CURRENT_TIMESTAMP(), '%Y-%c-%d'))";
        mysqli_query($koneksi, $sql);
        $id_blog = mysqli_insert_id($koneksi);
        header("Location:blog.php?notif=editberhasil");
    }
?>