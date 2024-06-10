<?php
require_once "../core/Database.php";
require_once "../models/Etudiant.php";
require_once "../models/Payment.php";

$database = new Database();
$conn = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'createEtudiant':
                $matricule = $_POST['matricule'];
                $nom = $_POST['nom'];
                $postnom = $_POST['postnom'];
                $promotion = $_POST['promotion'];

                $etudiant = new Etudiant();
                $data = [
                    'matricule' => $matricule,
                    'nom' => $nom,
                    'postnom' => $postnom,
                    'promotion' => $promotion
                ];
                if ($etudiant->createEtudiant($data)) {
                    header('Location: /');
                } else {
                    echo "Erreur lors de l'ajout de l'étudiant.";
                }
                break;

            case 'createPayment':
                session_start();
                $etudiant_id = $_SESSION['etudiant_id'];
                $tranche = $_POST['tranche'];
                $montant = $_POST['montant'];
                

                $payment = new Payment();
                $data = [
                    'etudiant_id' => $etudiant_id,
                    'tranche' => $tranche,
                    'montant' => $montant
                ];
                if ($payment->createPayment($data)) {
                    header('Location: ../views/payement_effectue.php');
                } else {
                    echo "Erreur lors de l'enregistrement du paiement.";
                }
                break;
            case 'login':
                    // Login logic
                    $matricule = $_POST['matricule'];
                    $password = $_POST['password'];
        
                    // Fetch student matricule
                    $etudiant = new Etudiant();
                     $etudiant = $etudiant->getEtudiantByMatricule($matricule);
                    if ($etudiant && $etudiant->password === $password) {
                        session_start();
                        $_SESSION['etudiant_id'] = $etudiant->id;
                        header('Location: ../views/enregistrerPayement.php');
                    } else {
                        echo 'matricule ou mot de passe incorrect';
                    }
                    break;
        
            

            default:
                echo "Action non reconnue.";
                break;
        }
    }

}
?>
