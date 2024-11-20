<?php

session_start();

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bent</title>
  <link rel="stylesheet" href="dashboard.css">
</head>
<body>
  
  <div class="container">
    <header>
    <span>
      <?php
      echo "Sikeres bejelentkezés: " . $_SESSION['username'];
      ?>

    </span>

    <a href='logout.php' class="logout">Kijelentkezés</a>
  
    </header>
    <main>
      <h1>Dashboard</h1>
    </main>
  </div>
  
</body>
</html>