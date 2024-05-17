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

    // Funzione per eliminare un prodotto
    public function deleteProduct($productId)
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM Prodotti WHERE id = ?");
            return $stmt->execute([$productId]);
        } catch (PDOException $e) {
            // Gestisci eventuali errori di eliminazione del prodotto
            echo "Errore durante l'eliminazione del prodotto: " . $e->getMessage();
            return false;
        }
    }

    // Funzione per aggiornare un prodotto
    public function updateProduct($productId, $productName, $productDescription, $productPrice, $productQuantity)
    {
        try {
            $stmt = $this->db->prepare("UPDATE Prodotti SET nome = ?, descrizione = ?, prezzo = ?, quantita_disponibile = ? WHERE id = ?");
            return $stmt->execute([$productName, $productDescription, $productPrice, $productQuantity, $productId]);
        } catch (PDOException $e) {
            // Gestisci eventuali errori di aggiornamento del prodotto
            echo "Errore durante l'aggiornamento del prodotto: " . $e->getMessage();
            return false;
        }
    }
}
