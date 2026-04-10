<?php
$conn = new mysqli("localhost", "root", "", "klantnsysteem");

if ($conn->connect_error) {
    die("Verbinding mislukt");
}

if (isset($_POST['login_submit'])) {
    $email = $_POST['email'];
    $wachtwoord = $_POST['wachtwoord'];

    $sql = "SELECT * FROM loginfile WHERE email='$email' AND wachtwoord='$wachtwoord'";
    $result = $conn->query($sql);

if ($result->num_rows == 1) {
        header("Location: overzicht.php");
        exit();
    } else {
        echo "Jammer voor je";
    }
}
?>