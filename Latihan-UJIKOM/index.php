<?php   
    require 'functions.php';

    $barang = read("SELECT * FROM tbl_produk");    

    if(isset($_POST['simpan'])){
        if(tambah($_POST) > 0){
            echo '<script> alert("Data Berhasil di tambahkan") </script>';
        }else{
            echo '<script> alert("Data Gagal di tambahkan") </script>';
        }
    }
    

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!-- my CSS -->
    <link href="style.css" rel="stylesheet">

    <title>BERANDA - TOKOBERSAMA</title>
  </head>
  <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
          <div class="container">
            <a class="navbar-brand" href="index.php">TOKOBERSAMA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav mx-auto">
                <a class="nav-link active" aria-current="page" href="index.php">Beranda</a>
                <a class="nav-link active" href="#tentang">Tentang Kami</a>
                <a class="nav-link active" href="#produk">Produk</a>
              </div>
            </div>
          </div>
        </nav>
  
        <div class = "container-fluid">
            <div class = "jumbroton p-5 mb-4 bg-light ">
                
            </div>
        </div>
        
        
        <div class = "container">
         <div class = "tentang" id = "tentang">
            <div class = "row">
                <div class = "col-lg-3">
                 <h1 class = "j-tentang text-center"> TENTANG KAMI </h1>
                </div>
                
                <div class = "col-lg">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>
           </div> 
            
         
        <div class  = "produk" id = "produk">
            <h1 class = "mb-3"> PRODUK </h1>
            <div class = "row">
            <?php foreach($barang as $b) :?>
                <div class  = "col-lg">
                    <div class="card" style="width: 18rem;">
                      <img src="img/<?= $b['gambar']?>" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title"><?= $b['nama_produk']?></h5>
                        <p class="card-text text-secondary fs-4">Rp. <?= $b['harga']?></p>
                        <a href="#" class="btn btn-primary">Pesan Produk</a>
                      </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
        </div>
            
            
        <div class = "form-pemesanan">
            <h1 class = "mb-5 text-center"> FORM PEMESANAN </h1>
            <div class = "row">
                <div class = "col-lg">
                
                    <form action  = "" method = "get">
                    <div class="row justify-content-center">
                    
                        <div class="col-lg-3">
                            <p>Pilih barang </p>
                        </div>

                        <div class="col-lg-3">
                            <select class="form-select mb-3" name = "id" aria-label="Default select example">
                                <option selected value = "null"> Pilih barang mu </option>
                                <?php foreach($barang as $b) :?>
                                    <option value = "<?= $b['id_produk']?>"> <?= $b['id_produk']?> - <?= $b['nama_produk']?></option>
                                 <?php endforeach ?> 
                            </select>
                        </div>

                        <div class="col-lg-3">
                             <button type = "submit" class  = "btn btn-primary"> Pilih </button>
                        </div>
                        
                    </div>
                 </form>
                 
                 
                <form action="" method = "post">
                    <input type = "hidden" name = "produk" value = "<?= $_GET['id'] ?>">
                
                 <?php if(isset($_GET['id'])) : ?>
                    <?php
                         $id = $_GET['id'] ;
                         $d_barang = read("SELECT * FROM tbl_produk WHERE id_produk = $id");
                     ?>
                   
                      <div class="row justify-content-center">
                        <div class="col-lg-3">
                            
                        </div>

                        <div class="col-lg-6">
                           <div class="mb-3">
                           <?php foreach($d_barang as $db ) : ?>
                              <img src = "img/<?= $db['gambar'] ?>" width = "100">
                           <?php endforeach ?>
                           </div>
                        </div>
                    </div>
                     
                     <div class="row justify-content-center">
                        <div class="col-lg-3">
                            <p>Harga </p>
                        </div>

                        <div class="col-lg-6">
                           <div class="mb-3">
                           <?php foreach($d_barang as $db ) : ?>
                              <input type="number" name = "harga" class="form-control" id="exampleFormControlInput1" value = "<?= $db['harga'] ?>">
                           <?php endforeach ?>
                           </div>
                        </div>
                    </div>
                    
                
                <div class="row justify-content-center">
                    <?php foreach($d_barang as $db ) : ?>
                        <?php if(isset($_POST['hitung'])) : ?>
                            <?php 
                                $harga = $db['harga'];
                                $jumlah =  $_POST['jumlah'];
                                $total =  $harga * $jumlah;
                            ?>
                        <?php endif ?>
                    <?php endforeach ?>
                    
                    
            
               
                
                     <div class="row justify-content-center">
                        <div class="col-lg-3">
                             <label for="exampleFormControlInput1" class="form-label">NIK</label>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                              <input type="text" name = "nik" class="form-control" id="exampleFormControlInput1" placeholder="NIK">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row justify-content-center">
                        <div class="col-lg-3">
                             <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                              <input type="text" name = "nama_pemesan" class="form-control" id="exampleFormControlInput1" name = "nama_lengkap" placeholder="nama lengkap">
                            </div>
                        </div>
                    </div>
                
                
                    <div class="row justify-content-center">
                        <div class="col-lg-3">
                             <label for="exampleFormControlInput1" class="form-label">Jumlah</label>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                              <input type="number" name = "jumlah" class="form-control" id="exampleFormControlInput1" placeholder="/pcs" value = "<?= $jumlah ?>">
                            </div>
                        </div>
                    </div>
                    
                     <div class="row justify-content-center">
                        <div class="col-lg-3">
                             <label for="exampleFormControlInput1" class="form-label">Tanggal Pesan</label>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                              <input type="date" name = "tgl_pesan" class="form-control" id="exampleFormControlInput1" placeholder="">
                            </div>
                        </div>
                    </div>
                    
                 <div class="row justify-content-center">
                        <div class="col-lg-3">
                             <label for="exampleFormControlInput1" class="form-label">Total Bayar</label>
                        </div>
                    
                        <div class="col-lg-6">
                            <div class="mb-3">
                              <input type="text" class="form-control" id="exampleFormControlInput1" name = "t_bayar" value = "<?=  $total; ?>" placeholder="">
                            </div>
                        </div>
                    </div>
                    
                    
                    
                   </div>
                   
                <?php endif; ?>
                
                
                 <div class ="row justify-content-center">
                    <div class = "col-lg-4">
                    </div>
                    <div class = "col-lg-7">
                        <button type = "submit" name = "hitung" class = "btn btn-primary"> Hitung </button>
                    
                        <button type = "submit" name = "simpan" class = "btn btn-success"> Simpan </button>
                      
                        <a href = "index.php#" class = "btn btn-danger"> Batal </a>
                    </div>
                </div>
                </form>
            </div>
            
        </div>
        
        </div>
        
        </div> <!-- end container -->

        
        <div class = "footer pt-3 mt-5 bg-secondary">
            <div class = "container-fluid">
                <div class = "row">
                    <div class = "col-lg">
                        <p class = "text-center text-light fw-bold"> Copyright 2022 Ferrol Azki
                    </div>
                </div>
            </div>
        </div>
  
      
    













    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>