<?php
class MainController extends Controller {
    public function index() {
        $etudiantModel = $this->model('Etudiant');
        $data['etudiants'] = $etudiantModel->getAllEtudiants();
        $this->view('main', $data);
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

    public function createPayment() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $paymentModel = $this->model('Payment');
            $data = [
                'etudiant_id' => $_POST['etudiant_id'],
                'tranche' => $_POST['tranche'],
                'montant' => $_POST['montant']
            ];
            $paymentModel->createPayment($data);
            header('Location: /');
        }
    }
}
?>
