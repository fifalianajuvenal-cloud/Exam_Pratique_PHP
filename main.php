<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.3.2/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>

    <h1 class="text-center">Project PHP</h1>

    <!-- Encpasulation -->
    <div class="container my-5 p-3 border border-2 border-primary rounded">
        <h1 class="text-primary ">Encapsulation</h1>
        <?php


    class Compte {
        private $solde;

        public function __construct($solde) {
            $this->solde = $solde;
        }

        public function deposer($montant) {
            if ($montant > 0) {
                $this->solde += $montant;
            } else {
                echo "Le montant doit être positif.";
            }
        }

        public function retirer($montant) {
            if ($montant > 0 && $montant <= $this->solde) {
                $this->solde -= $montant;
            } else {
                echo "Montant invalide ou solde insuffisant.";
            }
        }

        public function getSolde() {
            return $this->solde;
        }
    }
?>
    </div>

    <!-- Heritage et Polymorphisme -->
    <div class="container my-5 p-3 border border-2 border-danger rounded">
        <h2 class="text-danger ">Héritage et Polymorphisme</h2>
            <!-- heritage -->
       <?php
        class Personne {
        protected $nom;
        protected $note;

        public function __construct($nom, $note) {
            $this->nom = $nom;
            $this->note = $note;
        }

        public function afficher() {
            return "Je m'appelle " . $this->nom . " et j'ai " . $this->note . " sur 20.";
        }
    } 
?>

        <!-- Polymorphisme -->
         <?php
    class Etudiant extends Personne {

        protected $note;
        
        public function __construct($nom, $note) {
            parent::__construct($nom, $note);
        }

        public function afficher() {
            return "Je suis un étudiant. " . parent::afficher();
        }
    }
?>
    </div>

    <!-- Abstract -->
    <div class="container my-5 p-3 border border-2 border-success rounded">
        <h2 class="text-success ">Abstract</h2>
        <?php
    abstract class Animal {
        protected $nom;

        public function __construct($nom) {
            $this->nom = $nom;
        }
        abstract public function Crier();
    }

    class Chien extends Animal {
        public function Crier() {
            return "Woof!";
        }
    }

    class Chat extends Animal {
        public function Crier() {
            return "Miauo!";
        }
    }
?>
        
    </div>

    <!-- DB -->
    <div class="container my-5 p-3 border border-2 border-warning rounded">
        <h2 class="text-warning ">Base de données avec PDO</h2>
    <?php
    try{
        // Création d'une PDO pour connecter aux base de données
        $conn = new PDO("mysql:host=localhost;dbname=ecole_INSI", "root", "root");
        
        // Configuration PDO
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        echo "Connexion réussie à la base de données.";
    } catch (PDOException $e) {
        echo "Erreur de connexion : " . $e->getMessage();
    }
?>
    </div>

    <!-- Listes -->
    <div class="p-3">
        <span class="badge bg-primary">Encapsulation</span>
        <span class="badge bg-danger">Héritage et Polymorphisme</span>
        <span class="badge bg-success">Abstract</span>
        <span class="badge bg-warning">PDO</span>
    </div>

</body>

</html>