<?php
$conn = new mysqli("localhost", "root", "", "klantnsysteem");

if ($conn->connect_error) {
    die("Verbinding mislukt");
}

if (isset($_POST['klant_verwijderen'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM klantfile WHERE id = '$id'";
    $conn->query($sql);
}

header("Location: overzicht.php");
exit();
?>