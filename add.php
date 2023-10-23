<?php
include("dbin.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ad.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Poppins:wght@500&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1>Lorem Ipsum</h1>
        <div class="wrap">
            <div class="card">
                <form action="add.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input class="form-control" type="file" name="uploadfile" value="" />
                    </div>
                    <input type="text" name="nama" /><br><br>
                    <p>Masukan harga barang</p>
                    <input type="text" name="harga" /><br><br>
                    <p>Masukan detail barang</p>
                    <input type="text" name="detail" /><br><br>
                    <input type="submit" value="submit" />
                </form>
            </div>
        </div>
    </div>
    <?php
    error_reporting(0);

    $msg = "";
    $check = "SELECT * FROM ketersediaan ORDER BY id DESC";
    $c1 = mysqli_query($conn, $check);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = filter_input(INPUT_POST, "nama", FILTER_SANITIZE_SPECIAL_CHARS);
        $harga = filter_input(INPUT_POST, "harga", FILTER_SANITIZE_NUMBER_INT);
        $detail = filter_input(INPUT_POST, "detail", FILTER_SANITIZE_SPECIAL_CHARS);
        $foto = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "./image/" . $foto;

        $sql1 = "SELECT * FROM ketersediaan";
        $sq1 = mysqli_query($conn, $sql1);


        if (empty($nama)) {
            echo "Masukan nama";
        } else if (empty($harga)) {
            echo "Masukan harga";
        } else if (empty($detail)) {
            echo "Masukan detail";
        }else if (empty($foto)) {
            echo "Masukan foto";
        } else {
            if (move_uploaded_file($tempname, $folder)) {

                $sql4 = "INSERT INTO ketersediaan (nama, harga, detail, foto) VALUES ('$nama', '$harga', '$detail', '$foto')";

                try {
                    mysqli_query($conn, $sql4);
                    echo "Berhasil";
                    header("location:admin.html");
                    exit;
                } catch (mysqli_sql_exception) {
                    echo "Gagal menyimpan data ke database";
                }
            } else {
                echo "Gagal mengunggah file gambar";
            }
        }
    }
    mysqli_close($conn);
    ?>
</body>

</html>