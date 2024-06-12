<?php
require_once("./core/Model.php");


class Admin extends Model {
    // Récupère tous les administrateurs
    public function getAllAdmins() {
        $query = "SELECT * FROM admin ORDER BY id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Crée un nouvel administrateur
    public function createAdmin($data) {
        $query = "INSERT INTO admin SET nom=:nom, motDePasse=:motDePasse";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute($data);
    }

    // Supprime un administrateur par ID
    public function deleteAdmin($id) {
        $query = "DELETE FROM admin WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute(['id' => $id]);
    }

    // Récupère un administrateur par son nom
    public function getAdminByNom($nom) {
        $query = "SELECT * FROM admin WHERE nom = :nom";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['nom' => $nom]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Vérifie si un administrateur existe par nom et mot de passe
    public function adminExists($nom, $motDePasse) {
        $query = "SELECT * FROM admin WHERE nom = :nom AND motDePasse = :motDePasse";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(["nom" => $nom, "motDePasse" => $motDePasse]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);
        return $admin !== false;
    }

    // Récupère l'ID d'un administrateur par son nom
    public function getIdAdmin($nom) {
        $query = "SELECT id FROM admin WHERE nom = :nom";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(["nom" => $nom]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);
        return $admin["id"];
    }
}

?>