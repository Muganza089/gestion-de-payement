<header class="bg-dark text-white text-center py-4">
        <h1>EtuPay App</h1>
        
        

    </header>
    <nav class="navbar navbar-light bg-light container-fluid justify-content-center">
              <div class="row">
                <div class="col">
                <a class="btn btn-sm btn-outline-secondary" href="index.php?action=home" type="button">Home</a>
                </div>
                <?php 
                if(isset($_GET['action']) && ($_GET['action']=="connectAdmin")){
                    require_once ("adminBtn.php");
                }

        
                if(isset($_GET['action']) && ($_GET['action']=="listStudentsPaid")){
                    require_once ("adminBtn.php");
                }
                if(isset($_GET['action']) && ($_GET['action']=="listStudentsUnpaid")){
                    require_once ("adminBtn.php");
                }
                if(isset($_GET['action']) && ($_GET['action']=="searchBar")){
                    require_once ("adminBtn.php");
                }
                if(isset($_GET['action']) && ($_GET['action']=="createStudent")){
                    require_once ("adminBtn.php");
                }
               
                //Etudiants actions

                // if(isset($_GET["action"]) && ($_GET["action"]== "")){
                //     require_once ("porteMonnaieBtn.php");
                // }
                if(isset($_GET["action"]) && ($_GET["action"]== "portemonnaie")){
                    require_once ("porteMonnaieBtn.php");
                }
                if(isset($_GET["action"]) && ($_GET["action"]== "createPayment")){
                    
                    require_once ("porteMonnaieBtn.php");
                }
                if(isset($_GET["action"]) && ($_GET["action"]== "enregistrerPayement")){
                    require_once ("porteMonnaieBtn.php");
                }
                if(isset($_GET["action"]) && ($_GET["action"]== "payementEffect")){
                    require_once ("porteMonnaieBtn.php");
                }


                
                
                ?>
              </div>
          
                
                
        </nav>
