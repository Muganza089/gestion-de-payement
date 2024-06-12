<?php
class Payment extends Model {
    public function getPaymentsByEtudiant($etudiant_id) {
        $query = "SELECT * FROM payments WHERE etudiant_id=:etudiant_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['etudiant_id' => $etudiant_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createPayment($data) {
        $query = "INSERT INTO payments SET etudiant_id=:etudiant_id, tranche=:tranche, montant=:montant";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute($data);
    }
    public function getStudentsPaid() {
        $sql = "SELECT e.* FROM etudiants e INNER JOIN payments p ON e.matricule = p.matricule";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Méthode pour obtenir les étudiants n'ayant pas payé
    public function getStudentsUnpaid() {
        $sql = "SELECT e.* FROM etudiants e LEFT JOIN payments p ON e.matricule = p.matricule WHERE p.matricule IS NULL";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

