<?php
class Payment extends Model {
    public function getPaymentsByEtudiant($etudiant_id) {
        $query = "SELECT * FROM payments WHERE etudiant_id=:etudiant_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['etudiant_id' => $etudiant_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createPayment($data) {
        try {
        
            $query = "INSERT INTO payments (etudiant_id, tranche, montant) VALUES (:etudiant_id, :tranche, :montant)";
            $stmt = $this->conn->prepare($query);
            return $stmt->execute($data);
        } catch (PDOException $e) {
            echo "Erreur lors de l'enregistrement du paiement: " . $e->getMessage();
        }
    }

    public function getStudentsPaid() {
        $sql = "
            SELECT e.id, e.matricule, e.nom, e.postnom, e.promotion, p.tranche, p.montant
            FROM etudiants e
            INNER JOIN payments p ON e.id = p.etudiant_id
        ";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function getStudentsUnpaid() {
        $sql = "SELECT e.* FROM etudiants e LEFT JOIN payments p ON e.id = p.etudiant_id WHERE p.etudiant_id IS NULL";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getStudentsPaidFirstTranche() {
        $sql = "
            SELECT e.id, e.matricule, e.nom, e.postnom, e.promotion, p.tranche, p.montant
            FROM etudiants e
            INNER JOIN payments p ON e.id = p.etudiant_id
            WHERE p.tranche = 1
        ";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getStudentsPaidSecondTranche() {
        $sql = "
            SELECT e.id, e.matricule, e.nom, e.postnom, e.promotion, p.tranche, p.montant
            FROM etudiants e
            INNER JOIN payments p ON e.id = p.etudiant_id
            WHERE p.tranche = 2
        ";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getStudentsPaidThirdTranche() {
        $sql = "
            SELECT e.id, e.matricule, e.nom, e.postnom, e.promotion, p.tranche, p.montant
            FROM etudiants e
            INNER JOIN payments p ON e.id = p.etudiant_id
            WHERE p.tranche = 3
        ";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
