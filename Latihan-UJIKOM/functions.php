<?php 
    $conn = mysqli_connect('localhost' , 'root' , '' , 'db_latihan_ujikom');

    function read($query){
        global $conn;

        $result = mysqli_query($conn, $query);
        $rows = [];

        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }

        return $rows;
    }
    
    
    function tambah($data){
        global $conn;
        
        $nik = htmlspecialchars($data['nik']);
        $nama_pemesan = htmlspecialchars($data['nama_pemesan']);
        $produk = htmlspecialchars($data['produk']);
        $harga = htmlspecialchars($data['harga']);
        $jumlah = htmlspecialchars($data['jumlah']);
        $t_bayar = htmlspecialchars($data['t_bayar']);
        $tgl_pesan = htmlspecialchars($data['tgl_pesan']);
        
        $query = "INSERT INTO tbl_transaksi VALUES('','$nik','$nama_pemesan','$produk','$harga','$jumlah','$t_bayar','$tgl_pesan')";
        
        mysqli_query($conn, $query);
        
        return mysqli_affected_rows($conn);
        
    }
?>