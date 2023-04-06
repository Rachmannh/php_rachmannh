<?php

$con = mysqli_connect("localhost", "root", "", "testdb");

if (!$con) {
    die("Koneksi dengan DB Gagal: " . mysqli_connect_error());
}

// membuat fungsi query dalam bentuk array
function query($query)
{
    // Koneksi database
    global $con;

    $result = mysqli_query($con, $query);

    // membuat varibale array
    $rows = [];

    // mengambil semua data dalam bentuk array
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}
