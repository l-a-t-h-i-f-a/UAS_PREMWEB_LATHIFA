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
        <section class="page-section about-heading">
            <div class="container">
                <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="assets/img/laut.jpeg" alt="..." />
                <div class="about-heading-content">
                    <div class="row">
                        <div class="col-xl-9 col-lg-10 mx-auto">
                            <div class="bg-faded rounded p-5">
                            <?php
                            include_once("config.php");
                            $hasil = mysqli_query($mysqli, "SELECT * FROM ikan2 ORDER BY id DESC");
                            ?>
                            <center><a href="add.php">Tambah Data Ikan</a></center><br/><br/>
                            <div class ="container text-center">
                                <table class="table table-striped table-bordered table-hover mt-3">
                                    <tr class="header" text-align ="justify">
                                        <thead class ="table-dark">
                                            <th scope ="col">No</th>
                                            <th scope ="col">Nama Ikan</th>
                                            <th scope ="col">Warna</th>
                                            <th scope ="col">Jenis Ikan</th>
                                            <th scope ="col">Jenis Kelamin</th>
                                            <th scope ="col">Makanan</th>
                                            <th scope ="col">Tanggal Masuk</th>
                                            <th scope ="col">Deskripsi</th>
                                            <th scope ="col">Harga Ikan</th>
                                            <th scope ="col">Aksi</th>
                                        </thead>
                                    </tr>
                                    <?php
                                    $i=1;
                                    while($user_data = mysqli_fetch_array($hasil)) {
                                        echo "<tr>";
                                        echo "<td>".$i."</td>";
                                        echo "<td>".$user_data['nama']."</td>";
                                        echo "<td>".$user_data['warna']."</td>";
                                        echo "<td>".$user_data['jenis']."</td>";
                                        echo "<td>".$user_data['kelamin']."</td>";
                                        echo "<td>".$user_data['makanan']."</td>";
                                        echo "<td>".date('d/m/Y',strtotime($user_data['tanggal']))."</td>";
                                        echo "<td>".$user_data['tambah']."</td>";
                                        echo "<td>".$user_data['harga']."</td>";
                                        echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";
                                        $i++;
                                    }
                                    ?>
                                </table>
                            </div>
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
