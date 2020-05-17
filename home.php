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
// include_once './config.php';

$people = null;

// keep people list in session
if (!isset($_SESSION['people'])) {
    $_SESSION['people'] = new stack;
} else {
    $people = clone $_SESSION['people'];
}

if(array_key_exists('action',$_GET)){
    // echo $_GET['action'];
    switch ($_GET['action']){
        case 'add':
            $sql = "INSERT INTO registro_azioni (dipendente_ID, azione) values (:dipendente_ID, :azione)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['dipendente_ID' => $_SESSION["utente"]["ID"], 'azione' => '+']);
            $recordUtente = $stmt->fetch();
            /////////////////////////////////
            $pdo->query("UPDATE presenti SET n_presenti = n_presenti + 1");
            /////////////////////////////////
            console_log('push avvvenuto');
            unset($_GET);
            break;
        case 'remove':
            $result = $pdo->query("SELECT n_presenti FROM presenti WHERE ID='X'")->fetch();
            // console_log($result);
            if ($result['n_presenti'] < 1) {
                console_log("stack empty");
                break;
            }
            $sql = "INSERT INTO registro_azioni (dipendente_ID, azione) values (:dipendente_ID, :azione)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['dipendente_ID' => $_SESSION["utente"]["ID"], 'azione' => '-']);
            $recordUtente = $stmt->fetch();
            /////////////////////////////////
            $pdo->query("UPDATE presenti SET n_presenti = n_presenti - 1");
            /////////////////////////////////
            console_log('pop avvvenuto');
            unset($_GET);
            break;
    }
    // unset($_GET);
    // header("Location: ".$_SERVER['PHP_SELF']);
   
} 
?>

<form action="./home.php" method="get">
  <input type="submit" name="action" value="add">
  <input type="submit" name="action" value="remove">
</form>
<form action="./logout.php">
    <input type="submit" value="Logout" />
</form>

</body>
</html>
