<!DOCTYPE html>
<html>
    <head>
        <title>Registrazione</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/styleHome.css">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body>

        <form method="post" action="../php/register.php">
            <h1>Registrazione</h1>
            <input type="text" id="username" placeholder="Username" name="username" maxlength="50" required>
            <input type="password" id="password" placeholder="Password" name="password" required>
            <input type="text" id="nome" placeholder="Nome" name="nome" required>
            <input type="text" id="cognome" placeholder="Cognome" name="cognome" required>
            <input type="text" id="datanascita" placeholder="Data Nascita" name="datanascita" required>
            <input type="text" id="luogonascita" placeholder="Luogo Nascita" name="luogonascita" required>
            
            <! –checkbox accessoria (non di dominio) per i termini d'uso–> 
            <input type="checkbox" id="termini" name="termini" value="Accept"> 
            <label for="termini"> Accetto i termini di utilizzo </label> 
            <br>
            
            <button type="submit" name="register">Registrati</button>
        </form>
    </body>
</html>