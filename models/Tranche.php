<?php
require_once("./core/Model.php");

class Tranche extends Model {
    public function getAllTranches() {
        $query = "SELECT * FROM tranches ORDER BY idtranche";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createTranche($data) {
        $query = "INSERT INTO tranches SET nomtranche=:nomtranche, amounttranche=:amounttranche";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute($data);
    }

    public function deleteTranche($id) {
        $query = "DELETE FROM tranches WHERE idtranche=:idtranche";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute(['idtranche' => $id]);
    }

    public function getTrancheById($id) {
        $query = "SELECT * FROM tranches WHERE idtranche = :idtranche";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['idtranche' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateTranche($data) {
        $query = "UPDATE tranches SET amounttranche=:amounttranche WHERE idtranche=:idtranche";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute($data);
    }
    
}
?>
