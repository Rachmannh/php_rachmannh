<?php
// Set a flag to track whether the form has been submitted or not
$form_submitted = false;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $baris = $_POST['baris'];
    $kolom = $_POST['kolom'];

    // Set the flag to true since the form has been submitted
    $form_submitted = true;

    echo '<table>';
    for ($i = 1; $i <= $baris; $i++) {
        echo '<tr>';
        for ($j = 1; $j <= $kolom; $j++) {
            echo '<td>Baris ' . $i . ', Kolom ' . $j . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP_RACHMANNH</title>
    <!-- My CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <?php if (!$form_submitted) : ?>
        <form class="my-form" method="POST">
            <!-- Input untuk baris -->
            <div class="input1">
                <label>Inputkan Jumlah Baris :</label>
                <input class="input-baris" type="number" name="baris" required oninput="javascript: if (this.value.length > 2) this.value = this.value.slice(0, 2);">
            </div>

            <!-- Input untuk kolom -->
            <div class="input2">
                <label>Inputkan Jumlah Kolom :</label>
                <input class="input-kolom" type="number" name="kolom" required oninput="javascript: if (this.value.length > 2) this.value = this.value.slice(0, 2);">
            </div>

            <button type="submit">Submit</button>
        </form>
    <?php endif; ?>
</body>

</html>