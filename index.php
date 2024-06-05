<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

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

        .atas {
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
            margin-top: 40px;
            border:3px solid #fff;
            border-radius: 8px;
        }

        .Inputan{
            display: flex;
            justify-content: center;
            padding-bottom: 20px;
        }

        
        .container h2{
            text-align: center;
        }
        
        .Inputan h3{
            text-align: center;
            padding: 20px;
        }

    </style>
</head>
<body>
    <header class="atas">
        <h2>313 Data Siswa</h2>
    </header>

    <div class="container">
        <div class="row">
            <div class="Inputan">
                <form action="" method="post" id="siswaForm">
                    <h3><b>Masukan Data Siswa</b></h3>
                    <div class="">
                        <label for="nama" class="form-label">Nama :</label>
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>
                    <div class="">
                        <label for="nis" class="form-label">Nis :</label>
                        <input type="number" name="nis" id="nis" class="form-control" min="0">
                    </div>
                    <div class="">
                        <label for="rombel" class="form-label">Rombel :</label>
                        <input type="text" name="rombel" id="rombel" class="form-control">
                    </div>
                    <div class="">
                        <label for="rayon" class="form-label">Rayon :</label>
                        <input type="text" class="form-control" id="rayon" name="rayon">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3" name="kirim"><i class='bx bx-plus'></i>Tambah Data</button>
                    <button type="button" class="btn btn-secondary mt-3"><a href="cetak.php" style="text-decoration: none; color: white;"><i class='bx bxs-printer'></i>Cetak</a></button> 
                    <button type="submit" class="btn btn-danger mt-3" name="reset"><i class='bx bx-trash'></i>Reset</button>
                </form>
            </div>
        </div>

    <center>
        <div class="col-md-6">
                <?php
                session_start();

                if(!isset($_SESSION['DataSiswa'])){
                    $_SESSION['DataSiswa'] = array();
                }

                if (isset($_POST['kirim'])) {
                    if (!empty($_POST['nama']) && !empty($_POST['nis']) && !empty($_POST['rombel']) && !empty($_POST['rayon'])) {
                        $data = array(
                            'nama' => $_POST['nama'],
                            'nis' => $_POST['nis'],
                            'rombel' => $_POST['rombel'],
                            'rayon' => $_POST['rayon'],
                        );
                        $_SESSION['DataSiswa'][] = $data;
                    } else {
                        echo "<p class='text-danger'>Semua data harus diisi!</p>";
                    }
                }

                if (isset($_GET['hapus'])) {
                    $index = $_GET['hapus'];
                    unset($_SESSION['DataSiswa'][$index]);
                    $_SESSION['DataSiswa'] = array_values($_SESSION['DataSiswa']); 
                    header('location: index.php');
                    exit;
                }

                if (isset($_POST['reset'])) {
                    session_destroy();
                    header('location: index.php');
                    exit;
                }

                if (!empty($_SESSION['DataSiswa'])) {
                    echo '<div class="Output">';
                    echo '<table class="table table-bordered">';
                    echo '<tr>';
                    echo '<th>Nama</th>';
                    echo '<th>Nis</th>';
                    echo '<th>Rombel</th>';
                    echo '<th>Rayon</th>';
                    echo '<th>Action</th>';
                    echo '</tr>';
                    foreach ($_SESSION['DataSiswa'] as $index => $value) {
                        echo '<tr>';
                        echo '<td>'. htmlspecialchars($value['nama']) .'</td>';
                        echo '<td>'. htmlspecialchars($value['nis']) .'</td>';
                        echo '<td>'. htmlspecialchars($value['rombel']) .'</td>';
                        echo '<td>'. htmlspecialchars($value['rayon']) .'</td>';
                        echo '<td><a href="?hapus='.$index.'" class="btn btn-danger btn-sm">Hapus</a></td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
        </div>
        
        </center>
</body>
</html>
