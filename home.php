<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/kognise/water.css@latest/dist/dark.min.css">
    <title>Home</title>
</head>
<body>
    <p>Il segreto di pulcinella</p>
    <?php

$utente_autenticato = $_SESSION["utente"];
if ($utente_autenticato) {
    echo '< class="card warning fluid">Ciao ' . $nome . ' ' . $cognome . ' <strong>ID di sessione</strong> ' . session_id() . '</       div>';
}

?>

<form action="./logout.php">
    <input type="submit" value="Logout" />
</form>

</body>
</html>
