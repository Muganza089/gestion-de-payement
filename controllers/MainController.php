<?php
require_once "models/Etudiant.php";
class MainController extends Controller {
    public function index() {
        $etudiantModel = $this->model('Etudiant');
        $data['etudiants'] = $etudiantModel->getAllEtudiants();
        $this->view('main', $data);
    }

    public function admin() {
        $etudiantModel = $this->model('Etudiant');
        $data['etudiants'] = $etudiantModel->getAllEtudiants();
        $this->view('admin', $data);
    }
    

    public function createEtudiant() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $etudiantModel = $this->model('Etudiant');
            $data = [
                'matricule' => $_POST['matricule'],
                'nom' => $_POST['nom'],
                'postnom' => $_POST['postnom'],
                'promotion' => $_POST['promotion']
            ];
            $etudiantModel->createEtudiant($data);
            header('Location: /');
        }
    }
    public function loginStudent(){
        return $this->view('loginEtudiant');
    }


    public function createPayment() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['action'])) {

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
                    $this->view("payement_effectue");
                } else {
                    echo "Erreur lors de l'enregistrement du paiement.";
                }

            }}
        
        }
    
    public function searchStudent() {
        if (isset($_POST['matricule'])) {
            $matricule = $_POST['matricule'];
            $etudiantModel = $this->model('Etudiant');
            $etudiant = $etudiantModel->getEtudiantByMatricule($matricule);
            $this->view('search_result', $etudiant);
        } else {
            $this->view('search');
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
    public function connectStudent(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['action'])) {

                // Login logic
        $matricule = $_POST['matricule'];
        $password = $_POST['motdepasse'];

        // Fetch student matricule
        $etudiant = new Etudiant();
         $vraiOUFaux = $etudiant->etudiantExists( $matricule ,$password);
        if ($vraiOUFaux) {
            session_start();
            $et = new Etudiant();
            $id = $et->getEtudiantByMatricule($matricule);

            $_SESSION['etudiant_id'] =  $id;
            $this->view('enregistrerPayement');
        } else {
            echo 'matricule ou mot de passe incorrect';
        }

            }}
        
    }
}
?>
