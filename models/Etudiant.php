<?php
require_once("./core/Model.php");


class Etudiant extends Model {
    public function getAllEtudiants() {
        $query = "
            SELECT e.*, 
                   COALESCE(p.tranche, 0) as tranche,
                   COALESCE(p.montant, 0) as montant
            FROM etudiants e
            LEFT JOIN payments p ON e.id = p.etudiant_id
            ORDER BY e.id
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Regrouper les paiements par étudiant
        $etudiants = [];
        foreach ($results as $row) {
            if (!isset($etudiants[$row['id']])) {
                $etudiants[$row['id']] = [
                    'id' => $row['id'],
                    'matricule' => $row['matricule'],
                    'nom' => $row['nom'],
                    'postnom' => $row['postnom'],
                    'promotion' => $row['promotion'],
                    'payments' => []
                ];
            }
            if ($row['tranche'] > 0) {
                $etudiants[$row['id']]['payments'][] = [
                    'tranche' => $row['tranche'],
                    'montant' => $row['montant']
                ];
            }
        }
        return array_values($etudiants);
    }

    public function createEtudiant($data) {
        $query = "INSERT INTO etudiants SET matricule=:matricule, nom=:nom, postnom=:postnom, promotion=:promotion, motdepasse=:motdepasse";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute($data);
    }

    public function deleteEtudiant($id) {
        $query = "DELETE FROM etudiants WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute(['id' => $id]);
    }
    public function getEtudiantByMatricule($matricule) {
        $query = "SELECT * FROM etudiants WHERE matricule = :matricule";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['matricule' => $matricule]);
        return $stmt->fetch(PDO::FETCH_ASSOC); // Retourne un tableau associatif
    }
    public function etudiantExists($matricule, $motdepasse) {
        $query = "SELECT * FROM etudiants WHERE matricule = :matricule AND motdepasse = :motdepasse";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['matricule' => $matricule, 'motdepasse' => $motdepasse]);
        $etudiant = $stmt->fetch(PDO::FETCH_ASSOC);
        return $etudiant !== false; // Retourne true si l'étudiant existe, false sinon
    }

    public function getIdEtudiant($matricule) {
        $query = "SELECT id FROM etudiants WHERE matricule = :matricule";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['matricule' => $matricule]);
        $etudiant = $stmt->fetch(PDO::FETCH_ASSOC);
        return $etudiant['id'];
    }

  
}
?>
