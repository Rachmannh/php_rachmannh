<?php
// Connect to MySQL database
$conn = mysqli_connect('localhost', 'root', '', 'php_rachmannh');

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $baris = $_POST['baris'];
    $kolom = $_POST['kolom'];

    // Create new form with input fields based on number of rows and columns
    echo '<form method="POST" action="process-data.php">';
    for ($i = 1; $i <= $baris; $i++) {
        for ($j = 1; $j <= $kolom; $j++) {
            // Query database for input options
            $result = mysqli_query($conn, "SELECT input FROM php_rachmannh WHERE row=$i AND column=$j");
            $options = mysqli_fetch_all($result, MYSQLI_ASSOC);

            // Create input field with options
            echo '<div>';
            echo '<label>Row ' . $i . ', Column ' . $j . ':</label>';
            echo '<select name="data[' . $i . '][' . $j . ']">';
            foreach ($options as $option) {
                echo '<option value="' . $option['option_name'] . '">' . $option['option_name'] . '</option>';
            }
            echo '</select>';
            echo '</div>';
        }
    }
    echo '<button type="submit">Submit</button>';
    echo '</form>';
}
