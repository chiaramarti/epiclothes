<?php
class Product
{
    private $db;

    public function __construct(PDO $pdo)
    {
        $this->db = $pdo;
    }

    // Funzione per ottenere tutti i prodotti
    public function getAllProducts()
    {
        $stmt = $this->db->query("SELECT * FROM Prodotti");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Funzione per aggiungere un nuovo prodotto
    public function addProduct($productName, $productDescription, $productPrice, $productQuantity)
    {
        $stmt = $this->db->prepare("INSERT INTO Prodotti (nome, descrizione, prezzo, quantita_disponibile) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$productName, $productDescription, $productPrice, $productQuantity]);
    }
}
