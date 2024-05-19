<?php
class User
{
    private $db;

    public function __construct(PDO $pdo)
    {
        $this->db = $pdo;
    }

    // Funzione per registrare un nuovo utente
    public function register($username, $password, $nome, $cognome, $indirizzo, $ruolo = 'user')
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO Utenti (username, password, nome, cognome, indirizzo, ruolo) VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$username, $hashedPassword, $nome, $cognome, $indirizzo, $ruolo]);
    }

    public function isAdmin($user)
    {
        return $user['ruolo'] === 'admin';
    }

    public function isUser($user)
    {
        return $user['ruolo'] === 'user';
    }


    // Funzione per autenticare un utente
    public function login($username, $password)
    {
        $stmt = $this->db->prepare("SELECT * FROM Utenti WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            return false;
        }
    }
}
