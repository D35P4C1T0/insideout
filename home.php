<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/kognise/water.css@latest/dist/dark.min.css">
    <title>Home</title>
</head>
<body>
    <h1>Flow monitor</h1>
<p>
    <?php
        include './auth.php';
        $utente_autenticato = $_SESSION["utente"];
        if ($utente_autenticato) {
            echo '<div class="warning card">Ciao ' . 
            $nome . 
            ' ' . 
            $cognome . 
            ' <br><strong>ID di sessione ' . 
            session_id() . 
            '</strong></div>';
        }
    ?>
</p>

<?php
include './utils/insideoutLogic.php';
include_once './utils/classes.php';

if (!empty($_GET['act'])) {
    $peopleStack = new Stack();
    for ($i = 1; $i <= 5; $i++) {    
    $peopleStack = simulate_people($peopleStack);
    sleep(1);
    }

} else {}
?>

<form action="./logout.php">
    <input type="submit" value="Logout" />
</form>

<form action="home.php" method="get">
  <input type="hidden" name="act" value="run">
  <input type="submit" value="Run me now!">
</form>

</body>
</html>
