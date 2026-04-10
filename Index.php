<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KlantenOnderhoudSysteem</title>
    <link rel="stylesheet" href="style.css">
    </head>
<body>

    <main class="login-container">
        <section class="login-box">
            <h1>KlantenOnderhoudSysteem</h1>
            <h2>Inloggen</h2>

            <form action="login.php" method="POST">
                
                <div class="login-veld">
                    <label for="email">E-mailadres:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="login-veld">
                    <label for="wachtwoord">Wachtwoord:</label>
                    <input type="password" id="wachtwoord" name="wachtwoord" required>
                </div>

                <div class="login-knop">
                    <button type="submit" name="login_submit">Log in</button>
                </div>

            </form>
        </section>
    </main>

</body>
</html>