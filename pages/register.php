<?php
// Include la classe User e il file db.php per la connessione al database
require_once '../classes/User.php';
require_once '../db.php';

// Inizializza una nuova istanza della classe User
$user = new User($pdo);

// Verifica se sono stati inviati dati dal form di registrazione
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera i dati dal form
    $username = $_POST["username"];
    $password = $_POST["password"];
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $indirizzo = $_POST["indirizzo"];

    // Esegui la funzione di registrazione dell'utente
    $registrationSuccess = $user->register($username, $password, $nome, $cognome, $indirizzo);

    // Verifica se la registrazione è stata completata con successo
    if ($registrationSuccess) {
        // Reindirizza l'utente alla pagina di login
        header("Location: login.php");
        exit();
    } else {
        // Se la registrazione non è riuscita, mostra un messaggio di errore
        $error_message = "Errore durante la registrazione. Riprova.";
    }
}
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container">
        <h2>Registrazione</h2>
        <?php if (isset($error_message)) : ?>
            <p><?php echo $error_message; ?></p>
        <?php endif; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="text" name="nome" placeholder="Nome" required>
            <input type="text" name="cognome" placeholder="Cognome" required>
            <input type="text" name="indirizzo" placeholder="Indirizzo" required>
            <button type="submit">Registrati</button>
        </form>
        <p>Hai già un account? <a href="login.php">Accedi qui</a></p>
    </div>
</body>

</html>