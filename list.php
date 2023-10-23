<?php
include("dbin.php");

if(isset($_GET['id'])){
$id = $_GET['id'];
$que = mysqli_query($conn, "DELETE FROM ketersediaan WHERE id='$id'");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .card {
            margin-top: 13%;
        }

        .mx-auto {
            width: 1000px;
        }

        .log>a>button {
            color: white;
            font-weight: 800;
            margin: 10px 20px;
            height: 40px;
            width: 70px;
            border-radius: 25px;
            background-color: tomato;
            border: 0;
        }

        .log>a>button:hover {
            background-color: red;
            color: rgb(217, 184, 172);
            cursor: pointer;
        }

        .buto{
            display: flex;
            flex-direction: row;
        }
    </style>
</head>

<body>
    <div class="buto">
        <div class="log">
            <a href="index.php"><button>logout</button></a>
        </div>
        <div class="back">
            <a href="admin.html"><button type="button" class="btn btn-primary" style="height: 40px; margin-top: 10px; font-weight: 700; border-radius: 25px;">Back</button></a>
        </div>
    </div>
    <div class="mx-auto">
        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data Produk
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th scope="col">Nomor</th>
                        <th scope="col">Nama</th>
                        <th scope="col">detail</th>
                        <th scope="col">harga</th>
                        <th scope="col">ketersediaan</th>
                    </tr>
                    <tbody>
                        <?php
                        $sql2 = "SELECT * FROM ketersediaan ORDER BY id DESC";
                        $q2 = mysqli_query($conn, $sql2);
                        $urut = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $nama = $r2['nama'];
                            $detail = $r2['detail'];
                            $harga = $r2['harga'];
                            $ketersediaan = $r2['ketersediaan'];

                        ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $urut++ ?>
                                </th>
                                <td scope="row">
                                    <?php echo $nama ?>
                                </td>
                                <td scope="row">
                                    <?php echo $detail ?>
                                </td>
                                <td scope="row">
                                    <?php echo $harga ?>
                                </td>
                                <td scope="row">
                                    <?php echo $ketersediaan ?>
                                </td>
                                <td scope="row">
                                <a href="list.php?id=<?=$r2['id']?>"><button type="button" class="btn btn-danger">Delete</button></a> 
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>