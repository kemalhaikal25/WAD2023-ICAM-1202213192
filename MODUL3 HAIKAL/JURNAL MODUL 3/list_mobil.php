<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Mobil</title>
</head>
<body>
    <?php include("navbar.php") ?>
    <center>
        <div class="container">
            <h1>List Mobil</h1>

            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Mobil</th>
                    <th scope="col">Brand Mobil</th>
                    <th scope="col">Warna Mobil</th>
                    <th scope="col">Tipe Mobil</th>
                    <th scope="col">Harga Mobil</th>
                    <th >Detail</th> 

                    </tr>
                </thead>
                <tbody>

            <?php
            include("connect.php");

            // Buatlah query untuk mengambil data dari database (gunakan query SELECT)
            $query = "SELECT * FROM showroom_mobil";
            $result = mysqli_query($conn, $query);


            // Buatlah perkondisian dimana: 
            // 1. a. Apabila ada data dalam database, maka outputnya adalah semua data dalam database akan ditampilkan dalam bentuk tabel 
            //       (gunakan num_rows > 0, while, dan mysqli_fetch_assoc())
            //    b. Untuk setiap data yang ditampilkan, buatlah sebuah button atau link yang akan mengarahkan web ke halaman 
            //       form_detail_mobil.php dimana halaman tersebut akan menunjukkan seluruh data dari satu mobil berdasarkan id
            if (mysqli_num_rows($result) > 0) {
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>".$no."</td>";
                    echo "<td>".$row['nama_mobil']."</td>";
                    echo "<td>".$row['brand_mobil']."</td>";
                    echo "<td>".$row['warna_mobil']."</td>";
                    echo "<td>".$row['tipe_mobil']."</td>";
                    echo "<td>".$row['harga_mobil']."</td>";
                    echo "<td><a href='form_detail_mobil.php?id=".$row['id']."'>Detail</a></td>";
                    
                    
                    echo "</tr>";
                    $no++;
                }
                
            // 2. Apabila tidak ada data dalam database, maka outputnya adalah pesan 'tidak ada data dalam tabel'
                } else {
                    echo "<tr><td colspan='7'>Tidak ada data dalam tabel.</td></tr>";
                }
            
            mysqli_close($conn);
            ?>
        </div>
    </center>
</body>
</html>



