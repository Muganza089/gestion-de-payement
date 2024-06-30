<?php
require_once "models/Etudiant.php";
require_once "models/Admin.php";
require_once './models/Tranche.php';
require_once "models/Payment.php"; // Assurez-vous que le modèle Payment est inclus

class MainController extends Controller {
    public function searchByMatricule(){
        $this->view('search');
    }
    public function enregistrerPayement(){
        $trancheModel = $this->model('Tranche');
        $data['tranches'] = $trancheModel->getAllTranches();
        
        $this->view('enregistrerPayement',$data);
        
    }
    public function payement_effectue() {
        $this->view('payement_effectue');
    }

    public function index() {
  
        $this->view('home');
    }

    public function admin() {
        $etudiantModel = $this->model('Etudiant');
      
        $data['etudiants'] = $etudiantModel->getAllEtudiants();
        $this->view('admin', $data,);
    }

    public function createEtudiant() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $etudiantModel = $this->model('Etudiant');
            $data = [
                'matricule' => $_POST['matricule'],
                'nom' => $_POST['nom'],
                'postnom' => $_POST['postnom'],
                'promotion' => $_POST['promotion'],
                'motdepasse' => $_POST['motdepasse']
            ];
            $etudiantModel->createEtudiant($data);
            $this->view('etudiantAjoute');
        }
    }

    public function loginStudent(){
        return $this->view('loginEtudiant');
    }

    public function portemonnaie() {
      
        if (isset($_SESSION['etudiant_id'])) {
            $etudiantModel = $this->model('Etudiant');
            $etudiant = $etudiantModel->getEtudiantById($_SESSION['etudiant_id']);
            $_SESSION['porte_monnaie'] = $etudiant['porte_monnaie'];
            $this->view('portemonnaie');
        } else {
            echo "Veuillez vous connecter.";
        }
    }

    public function addMoney() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['etudiant_id']) && isset($_POST['amount'])) {
                $etudiant_id = intval($_POST['etudiant_id']);
                $amount = intval($_POST['amount']);
                $etudiantModel = $this->model('Etudiant');
                $etudiantModel->addMoney($etudiant_id, $amount);
                $this->view('rechargeReussi'); // ou une autre vue de confirmation
            } else {
                echo "Erreur: Montant ou ID de l'étudiant manquant.";
            }
        }
    }
    

    public function createPayment() {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_SESSION['etudiant_id']) && isset($_POST['tranche']) && isset($_POST['montant'])) {
                $etudiant_id = $_SESSION['etudiant_id'];
                $tranche = htmlspecialchars($_POST['tranche']);
                $montant = intval($_POST['montant']);

                if ($_SESSION['porte_monnaie'] >= $montant) {
                    $paymentModel = new Payment();
                    $data = [
                        'etudiant_id' => $etudiant_id,
                        'tranche' => $tranche,
                        'montant' => $montant
                    ];

                    if ($paymentModel->createPayment($data)) {
                        $etudiantModel = $this->model('Etudiant');
                        $etudiantModel->deductMoney($etudiant_id, $montant);
                        $_SESSION['porte_monnaie'] -= $montant;
                        session_destroy();
                        $this->payement_effectue();
                    } else {
                        echo "Erreur lors de l'enregistrement du paiement.";
                    }
                } else {
                    $this->view('solde_insuffisant');
                }
            } else {
                echo "ID de l'étudiant introuvable.";
            }
        }
    }
    

    public function searchStudent() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['matricule'])) {
                $matricule = $_POST['matricule'];
                $etudiantModel = $this->model('Etudiant');
                $etudiant = $etudiantModel->getEtudiantByMatricule($matricule);
                $this->view('search_result', $etudiant);
            } else {
                $this->view('search');
            }

        }
        
    }

    public function listStudentsPaid() {
        $paymentModel = $this->model('Payment');
        $students = $paymentModel->getStudentsPaid();
        $this->view('list_paid', ['students' => $students]);
    }

    public function listStudentsUnpaid() {
        $paymentModel = $this->model('Payment');
        $students = $paymentModel->getStudentsUnpaid();
        $this->view('list_unpaid', ['students' => $students]);
    }

    public function home() {
        $this->view('home');
    }

    public function connectStudent() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les identifiants de l'étudiant depuis le formulaire
            $matricule = $_POST['matricule'];
            $password = $_POST['motdepasse'];

            // Créer une instance du modèle Étudiant
            $etudiant = new Etudiant();

            // Vérifier si l'étudiant existe et si le mot de passe est correct
            if ($etudiant->etudiantExists($matricule, $password)) {
                session_start();
                $id = $etudiant->getIdEtudiant($matricule);
                $etudiant = $etudiant->getEtudiantById( $id );
                
                $_SESSION['etudiant_id'] = $id;
                $_SESSION['etudiant'] = $etudiant;

                
                $this->portemonnaie();
            } else {
                // Afficher un message d'erreur et rester sur la page de connexion
                echo 'Matricule ou mot de passe incorrect';
                $this->view('loginEtudiant');
            }
        }
    }
    

    public function loginAdmin() {
        return $this->view('loginAdmin');
    }

    public function connectAdmin() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            if(isset($_POST['nom'] )&& isset($_POST['motDePasse']) ){
                $nom = $_POST['nom'];
                $motDePasse = $_POST['motDePasse'];
              
            $_SESSION['nom'] = $nom;
            $_SESSION['motDePasse'] = $motDePasse;
            }
            if(isset($_SESSION['nom'])&&isset($_SESSION['$motDePasse'])){
                $nom = $_SESSION['nom'];
                $motDePasse = $_SESSION['motDePasse'];
            }
    
            

            $admin = new Admin();
            $vraiOUFaux = $admin->adminExists($nom, $motDePasse);
            if ($vraiOUFaux) {
              
                $id = $admin->getIdAdmin($nom);
                $_SESSION['admin_id'] = $id;
                $this->admin();
            } else {
                echo 'Nom ou mot de passe incorrect';
            }
        }
    }

    public function createAdmin() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $adminModel = $this->model('Admin');
            $data = [
                'nom' => $_POST['nom'],
                'motDePasse' => $_POST['motDePasse']
            ];
            $adminModel->createAdmin($data);
            header('Location: /?action=adminDashboard');
        }
    }

    public function deleteAdmin() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $adminModel = $this->model('Admin');
            $adminModel->deleteAdmin($id);
            header('Location: /?action=adminDashboard');
        }
    }

    public function adminDashboard() {
        $adminModel = $this->model('Admin');
        $data['admins'] = $adminModel->getAllAdmins();
        $this->view('adminDashboard', $data);
    }
    public function updateTranche() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idtranche = $_POST['idtranche'];
            $amounttranche = $_POST['amounttranche'];
    
            $trancheModel = new Tranche();
            $data = [
                'idtranche' => $idtranche,
                'amounttranche' => $amounttranche
            ];
    
            if ($trancheModel->updateTranche($data)) {
                $this->view('misajourEffectuee');
            } else {
                echo "Erreur lors de la mise à jour du montant de la tranche.";
            }
        }
    }

    public function listStudentsPaidFirstTranche() {
        $paymentModel = $this->model('Payment');
        $students = $paymentModel->getStudentsPaidFirstTranche();
        $this->view('list_paid_first_tranche', ['students' => $students]);
    }

    public function listStudentsPaidSecondTranche() {
        $paymentModel = $this->model('Payment');
        $students = $paymentModel->getStudentsPaidSecondTranche();
        $this->view('list_paid_second_tranche', ['students' => $students]);
    }
    public function listStudentsPaidThirdTranche() {
        $paymentModel = $this->model('Payment');
        $students = $paymentModel->getStudentsPaidThirdTranche();
        $this->view('list_paid_third_tranche', ['students' => $students]);
    }
    
    
}
?>
