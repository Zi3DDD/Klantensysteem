<?php
$conn = new mysqli("localhost", "root", "", "klantnsysteem");

if ($conn->connect_error) {
    die("Verbinding mislukt");
}

$melding = "";

if (isset($_POST['klant_opslaan'])) {
    $bedrijfsnaam = $_POST['naam'];
    $telefoonnummer = $_POST['telefoonnummer'];
    $email = $_POST['email'];

    $sql_insert = "INSERT INTO klantfile (bedrijfsnaam, telefoonnummer, email)
                   VALUES ('$bedrijfsnaam', '$telefoonnummer', '$email')";

    if ($conn->query($sql_insert) === TRUE) {
        $melding = "Klant opgeslagen";
    } else {
        $melding = "Error";
    }
}

$sql = "SELECT * FROM klantfile";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>overzichtpagina</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="overzicht-klant">
        <section class="overzicht-sheet">        
            <h1>Klantgegevens</h1>

            <?php
            if ($melding != "") {
                echo "<p>$melding</p>";
            }
            ?>

            <form action="overzicht.php" method="POST">

                <div class="invoer-veld">
                    <label for="naam">Klantnaam</label>
                    <input type="text" id="naam" name="naam" required>
                </div>

                <div class="invoer-veld">
                    <label for="telefoonnummer">Telefoonnummer</label>
                    <input type="text" id="telefoonnummer" name="telefoonnummer" required>
                </div>

                <div class="invoer-veld">
                    <label for="email">Mailadres</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="Bevestig-knop">
                    <button type="submit" name="klant_opslaan">Opslaan</button>
                </div>

            </form>

            <h2>Alle klanten</h2>

            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "ID: " . $row['id'] . "<br>";
                    echo "Bedrijfsnaam: " . $row['bedrijfsnaam'] . "<br>";
                    echo "Telefoonnummer: " . $row['telefoonnummer'] . "<br>";
                    echo "Email: " . $row['email'] . "<br>";
                    echo "<hr class='klant-lijn'>";
                }
            } else {
                echo "Geen klanten gevonden";
            }
            ?>
        </section>
    </main>
</body>
</html>