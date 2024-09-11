<?php
// Adatbázis kapcsolat adatai
$servername = "localhost";
$username = "test_user"; // az adatbázis felhasználóneve
$password = "test_password"; // az adatbázis jelszava
$dbname = "test_db";

// SQL injekció elleni védelem kapcsolója
define('USE_PREPARED_STATEMENTS', false);

// Kapcsolódás az adatbázishoz
$conn = new mysqli($servername, $username, $password, $dbname);

// Kapcsolat ellenőrzése
if ($conn->connect_error) {
    die("Kapcsolódási hiba: " . $conn->connect_error);
}

// Űrlap feldolgozása
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    if (USE_PREPARED_STATEMENTS) {
        trigger_error("-------Védett----------");
        // SQL injekció ellen védett megoldás
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = password(?)");
        $stmt->bind_param("ss", $input_username, $input_password);
        $stmt->execute();
        $result = $stmt->get_result();
        
    } else {
        // Nem védett megoldás (sebezhető SQL injekcióra)
        trigger_error("------Nem védett-----------");
        $sql = "SELECT * FROM users WHERE username = '$input_username' AND password = password('$input_password')";
        trigger_error($sql);
        $result = $conn->query($sql);
    }

    // Felhasználó ellenőrzése
    if ($result->num_rows > 0) {
        echo "Sikeres bejelentkezés!";
    } else {
        echo "Hibás felhasználónév vagy jelszó!";
    }
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bejelentkezés</title>
</head>
<body>
    <h2>Bejelentkezés</h2>
    <form method="post">
        <label for="username">Felhasználónév:</label>
        <input type="text" name="username"><br><br>
        <label for="password">Jelszó:</label>
        <input type="password" name="password"><br><br>
        <input type="submit" value="Bejelentkezés">
    </form>
</body>
</html>
