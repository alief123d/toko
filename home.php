<?php
include("dbin.php");
include("nav.html");

$sql1 = "SELECT * FROM ketersediaan";
$sq1 = mysqli_query($conn, $sql1);
?>
<script src="home.js"></script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .produk-container {
            margin-top: 20px;
            display: flex;
            flex-wrap: wrap;
        }

        .card {
            max-width: 400px;
            margin-left: 15px;
            margin-top: 10px;
        }

        .carousel-inner img {
            margin-top: 100px;
            width: 90%; 
            height: 250px; 
            margin-left: 75px; 
            border-radius: 10px;
        }

        .card img {
            width: 260px; 
            height: 200px;
        }

        @media only screen and (max-width: 768px) {
            .carousel-inner img {
                width: 100%;
                height: auto;
                margin-left: 0;
                margin-top: 76px;
                border-radius: 0;
            }

            .card {
                flex-basis: calc(50% - 10px);
                margin: 5px;
            }

            .card img {
                width: 100%;
                height: auto;
            }
    }
    </style>
</head>

<body>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block" src="./image/broger-jadi.png" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block" src="./image/erteex.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="./image/wisuda-.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <h3>Category :</h3>
    <div class="cat" style="display: flex; flex-direction: row; margin-left: 10px; margin-top: 4px;">
        <a href="#">
            <h4>#Food</h4>
        </a>
        <a href="#">
            <h4>#Drink</h4>
        </a>
        <a href="#">
            <h4>#Dessert</h4>
        </a>
    </div>
    </div>
    <div class="container">
        <div class="produk-container">
            <?php
            while ($produk = mysqli_fetch_assoc($sq1)) {
                $foto = $produk['foto'];
                $nama = $produk['nama'];
                $harga = $produk['harga'];
                $detail = $produk['detail'];
                $ketersediaan = $produk['ketersediaan'];
            ?>
                <div class="card">
                    <img src="./image/<?php echo $foto; ?>" alt="" />
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $nama ?></h5>
                        <p class="card-text"><?php echo $detail ?></p>
                        <p class="card-text"><?php echo $harga ?></p>
                        <p class="card-text"><?php echo $ketersediaan ?></p>
                        <button type="button" class="btn btn-primary" onclick="add('<?php echo $nama ?>', 1)">Beli</button>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>