<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Project UTS</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </head>
    <body>
        <header>
            <h1 class="site-heading text-center text-faded d-none d-lg-block">
            <span class="site-heading-upper text-primary mb-3">Web Programming UTS Project</span>
            <span class="site-heading-lower">ARLA Fish Store</span>
            </h1>
        </header>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
            <div class="container">
                <a class="navbar-brand text-uppercase fw-bold d-lg-none" href="index.html">Toko Ikan Arla</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="index.html">Home</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="about.html">About</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="products.html">Products</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="store.html">Store</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="database.php">Database</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="page-section cta">
            <div class="container" style="margin-top: 80px">
            <div class="row">
            <div class="col-md-8 offset-md-2">
            <div class="card">
            <div class="card-body">
                        <?php
                        // include database connection file
                        include_once("config.php");
                        // Check if form is submitted for user update, then redirect to homepage after update
                        if(isset($_POST['update']))
                        {
                            $id = $_POST['id'];
                            $nama= $_POST['nama'];
                            $warna = $_POST['warna'];
                            $jenis= $_POST['jenis'];
                            $kelamin = $_POST['kelamin'];
                            $makanan= $_POST['makanan'];
                            $tanggal = $_POST['tanggal'];
                            $tambah = $_POST['tambah'];
                            $harga= $_POST['harga'];

                            // update user data
                            $result = mysqli_query($mysqli, "UPDATE ikan2 SET nama='$nama',warna='$warna',jenis='$jenis',kelamin='$kelamin',makanan='$makanan',tanggal='$tanggal',tambah='$tambah',harga='$harga' WHERE id=$id");

                            // Redirect to homepage to display updated user in list
                            header("Location: database.php");
                        }
                        ?>
                        <?php
                        // Display selected user data based on id
                        // Getting id from url
                        $id = $_GET['id'];

                        // Fetech user data based on id
                        $result = mysqli_query($mysqli, "SELECT * FROM ikan2 WHERE id=$id");

                        while($user_data = mysqli_fetch_array($result))
                        {
                            $nama = $user_data['nama'];
                            $warna = $user_data['warna'];
                            $jenis= $user_data['jenis'];
                            $kelamin = $user_data['kelamin'];
                            $makanan = $user_data['makanan'];
                            $tanggal = $user_data['tanggal'];
                            $tambah= $user_data['jenis'];
                            $harga = $user_data['harga'];
                        }
                        ?>
                        <center><a href="database.php">Go to Database</a></center>
                        <br/><br/>

                                <form name="update_user" action="edit.php" method="POST">
                                    <div class="form-group">
                                    <label>Nama Ikan</label>
                                    <input type="text" name="nama" placeholder="Masukkan Nama Ikan" class="form-control" value=<?php echo $nama;?>>
                                    </div><br>

                                    <div class="form-group">
                                    <label>Warna Ikan</label>
                                    <input type="text" name="warna" placeholder="Masukkan Warna Ikan" class="form-control" value=<?php echo $warna;?>>
                                    </div><br>

                                    <div class="form-group">
                                    <label>Jenis Ikan</label>
                                            <select name="jenis" id="jenis" class="form-select">
                                                <option>Pilih Jenis</option>
                                                <option value="hias" <?php echo $jenis;?>>Hias</option>
                                                <option value="konsumsi" <?php echo $jenis;?>>Konsumsi</option>
                                            </select>
                                    </div><br>
                                    
                                    <div class="form-group">
                                    <label>Jenis Kelamin</label><br>
                                        <input type="checkbox" name="kelamin" value="cowo" <?php echo $kelamin;?>> Cowo<br>
                                        <input type="checkbox" name="kelamin" value="cewe" <?php echo $kelamin;?>> Cewe<br>
                                    </div><br>

                                    <div class="form-group">
                                    <label>Makanan Ikan</label>
                                    <input type="text" name="makanan" placeholder="Masukkan Makanan Ikan" class="form-control" value=<?php echo $makanan;?>>
                                    </div><br>

                                    <div class="form-group">
                                    <label>Tanggal Masuk</label>
                                        <input type="date" name="tanggal" value=<?php echo $tanggal;?>>
                                    </div><br>

                                    <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control" name="tambah" placeholder="Masukkan Deskripsi" rows="4" value=<?php echo $tambah;?>></textarea>
                                    </div><br>

                                    <div class="form-group">
                                    <label>Harga</label>
                                    <input type="text" name="harga" placeholder="Masukkan Harga" class="form-control" value=<?php echo $harga;?>>
                                    </div><br>

                                    <div>
                                    <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
                                    <input type="submit" name = "update" value="Update"></div>
                                    
                                </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="footer text-faded text-center py-5">
            <div class="container"><p class="m-0 small">Copyright by Lathifa Asy Syahidah @2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
