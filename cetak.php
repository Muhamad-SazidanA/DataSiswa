<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <style>
        *{
            margin:0;
            padding: 0;
        }

        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 0;
            background: #e4e9f7;
        }

        .atasan {
            display: flex;
            justify-content: center;
            background-color: rgba(76,68,182,0.808);
            color: white;
            border-radius: 0 0 20px 20px;
            margin: 0 48px;
            padding: 15px 24px;
        }

        .container{
            width: 1000px;
            height: auto;
            background: #d4d8e5;
            margin: auto;
            margin-top: 40px;
            border:3px solid #fff;
            border-radius: 8px;
        }

        .container h2{
            padding: 20px;
        }

        .button{
            display: flex;
            justify-content: center;
            padding: 20px;
        }

        .button-2{
            margin-left: 10px;
        }
    </style>
    <header class="atasan">
        <h2>313 Data Siswa</h2>
    </header>

    <div class="container">
        <h2>Data Siswa</h2>
        <table class="table table-bordered">
            <tr>
                <th>Nama</th>
                <th>Nis</th>
                <th>Rombel</th>
                <th>Rayon</th>
            </tr>
            <?php
            session_start();
            if(isset($_SESSION['DataSiswa'])){
                foreach ($_SESSION['DataSiswa'] as $index => $value) {
                    echo '<tr>';
                    echo '<td>'. $value['nama'] .'</td>';
                    echo '<td>'. $value['nis'] .'</td>';
                    echo '<td>'. $value['rayon'] .'</td>';
                    echo '<td>'. $value['rombel'] .'</td>';
                    echo '</tr>';
                }
            }

            if(isset($_POST['reset'])){
                session_destroy();
                header('Location: http://muhamadsazidan12.liveblog365.com/DataSiswaZdn/cetak.php');
                exit;
            }
            ?>
        </table>
        <div class="button">
            <form action="" method="post">
                <button type="submit" class="btn btn-primary"><a href="index.php" style="text-decoration: none; color: white">Kembali</a></button>
            </form>
            <form class="button-2" action="cetak.php" method="post">
                <button type="submit" class="btn btn-danger" name="reset">Reset</button>
            </form>
        </div>
    </div>
</body>
</html>

