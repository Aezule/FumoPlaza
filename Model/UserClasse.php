<?php


class User
{
    private $IdCompte;
    private $login;
    private $mdp;
    private $nom;
    private $prenom;
    private $idRole;


    public function __construct($IdCompte,$login, $nom, $prenom, $idRole)
    {
        $this->IdCompte = $IdCompte;
        $this->login = $login;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->idRole = $idRole;
    }

    // Getters
    public function getIdCompte()
    {
        return $this->IdCompte;
    }
    public function getLogin()
    {
        return $this->login;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }


    public static function GetConnexion($email, $mdp)
    {
        $cnx = getBddConnexion();
        $sql = 'SELECT IdCompte,login, nom, prenom,idRole';
        $sql .= ' FROM authentification';
        $sql .= ' WHERE login = :critere AND mdp = :critere2;';

        $result = $cnx->prepare($sql);
        $result->bindParam('critere', $email, PDO::PARAM_STR);
        $result->bindParam('critere2', $mdp, PDO::PARAM_STR);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $User = null;
        if ($uneLigne = $result->fetch()) {
            $User = new User($uneLigne['IdCompte'],$uneLigne['login'], $uneLigne['nom'], $uneLigne['prenom'], $uneLigne['idRole']);
        }
        $_SESSION['User'] = serialize($User);
        
        return $User;
    }

    public static function CreateAccount($email, $mdp, $nom, $prenom)
    {

        $messageResultat = "";

        // Connexion à la base de données
        $cnx = getBddConnexion();

        // Vérifier si l'email existe déjà dans la table authentification
        $sql = 'SELECT login FROM authentification WHERE login = :critere';
        $result = $cnx->prepare($sql);
        $result->bindParam('critere', $email, PDO::PARAM_STR);
        $result->execute();
        $mail = $result->fetch(PDO::FETCH_ASSOC);

        if (!$mail) {
            $sql = 'INSERT INTO authentification(login, mdp, nom, prenom)';
            $sql .= ' VALUES (:critere, :critere2, :critere3, :critere4);';

            $result = $cnx->prepare($sql);
            $result->bindParam('critere', $email, PDO::PARAM_STR);
            $result->bindParam('critere2', $mdp, PDO::PARAM_STR);
            $result->bindParam('critere3', $nom, PDO::PARAM_STR);
            $result->bindParam('critere4', $prenom, PDO::PARAM_STR);
            $result->execute();
            $messageResultat = "Compte créé";
        } else {
            $messageResultat = "Ce compte existe déjà";
        }
        return $messageResultat;
    }



    public static function ModifierAccount($NouvelleValeur,$idCompte,$ValeurAChanger){
        $messageResultat = "";
        $cnx = getBddConnexion();
        $sql = 'UPDATE authentification SET '.$ValeurAChanger.' = :NouvelleValeur WHERE IdCompte = :idCompte';
        $result = $cnx->prepare($sql);
        $result->bindParam('NouvelleValeur', $NouvelleValeur, PDO::PARAM_STR);
        $result->bindParam('idCompte', $idCompte, PDO::PARAM_STR);
        $result->execute();
        $messageResultat = "Modification effectuée";
        return $messageResultat;
    }
}

?>