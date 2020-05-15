<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/kognise/water.css@latest/dist/dark.min.css">
    <link rel="stylesheet" href="./login.css">
    <title>Login</title>
</head>
<body>
<div class="container">
    <h1>Insideout</h1>
    <p>Pagina di accesso che permette di loggarsi all'interno della piattaforma per il monitoraggio del flusso di clienti all'interno di un punto vendia.</p>
    <form method="post" action="auth.php">
        <div id="div_login">
            <h2>Login</h2>
            <div>
                <input type="text" class="textbox" id="txt_uname" name="txt_uname" placeholder="Username" />
            </div>
            <div>
                <input type="password" class="textbox" id="txt_uname" name="txt_pwd" placeholder="Password"/>
            </div>
            <div>
                <input type="submit" value="Submit" action="but_submit"  id="but_submit" />
            </div>
        </div>
    </form>
</div>

</body>
</html>
