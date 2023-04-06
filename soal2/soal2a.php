<?php
include '../soal2/conn.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';
$search_sql = '';

if (!empty($search)) {
    $search_sql = "WHERE h.hobi LIKE '%" . $search . "%'";
}

$values = query("SELECT h.hobi, COUNT(p.id_person) AS jumlah_person 
FROM hobi h 
INNER JOIN person p ON h.person_id = p.id_person " . $search_sql . " GROUP BY h.hobi ORDER BY jumlah_person DESC;");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOAL 2 A</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>


    <div class="container">

        <div class="search-container">
            <form action="">
                <input class="search-box" type="text" placeholder="Search by Hobi...." name="search">
                <button class="search-submit" type="submit">Submit</button>
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Hobi</th>
                    <th>Jumlah Person</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($values as $key => $data) : ?>
                    <tr>
                        <td><?php echo $data['hobi'] ?></td>
                        <td><?php echo $data['jumlah_person'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

</body>

</html>