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
}
