<?php
// Include la classe User e il file db.php per la connessione al database
require_once '../classes/User.php';
require_once '../db.php';

// Inizializza una nuova istanza della classe User
$user = new User($pdo);

// Verifica se sono stati inviati dati dal form di login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera i dati dal form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Esegui la funzione di login dell'utente
    $userDetails = $user->login($username, $password);

    // Verifica se il login è riuscito
    if ($userDetails) {
        // Avvia la sessione e memorizza i dettagli dell'utente
        session_start();
        $_SESSION["user_id"] = $userDetails["id"];
        $_SESSION["username"] = $userDetails["username"];

        // Reindirizza l'utente alla pagina del pannello di controllo
        header("Location: dashboard.php");
        exit();
    } else {
        // Se il login non è riuscito, mostra un messaggio di errore
        $error_message = "Credenziali non valide. Riprova.";
    }
}
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container">
        <h2>Login</h2>
        <?php if (isset($error_message)) : ?>
            <p><?php echo $error_message; ?></p>
        <?php endif; ?>
        <form action="login.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Accedi</button>
        </form>
        <p>Non hai un account? <a href="register.php">Registrati qui</a></p>
    </div>
</body>

</html>