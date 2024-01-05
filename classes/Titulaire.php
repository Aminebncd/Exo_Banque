<?php


class Titulaire {

    private string $nom;
    private string $prenom;
    private DateTime $dateNaissance;
    private string $ville;
    private array $comptes;

    public function __construct(string $nom, string $prenom, string $dateNaissance, string $ville){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaissance = new Datetime($dateNaissance);
        $this->ville = $ville;
        $this->comptes = [];
    }
    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }
    

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
        
        return $this;
    }
    
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getAge() {
        $aujourdhui = new DateTime();
        $diff = $aujourdhui->diff($this->dateNaissance);
        return $diff->y; // Retourne l'âge en années
    }
    
    

    public function getVille()
    {
        return $this->ville;
    }

    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }
    public function getComptes()
    {
        return $this->compte;
    }
    
    public function setComptes($compte)
    {
        $this->compte = $compte;
        
        return $this;
    }
    public function addAccount(CompteBancaire $compte) {
        $this->comptes[] = $compte;
    }


    public function infosTitulaire(){
        $result = "<h3>Compte(s) bancaire(s) de " . $this ."<br>". $this->getVille(). "</h3><ul>";
    
        foreach ($this->comptes as $compte) {
            $result .= "<li>" . $compte->getInfos() . "</li>";
        }
    
        $result .= "</ul>";
        return $result;
    }


    public function __toString(){
        return $this->getNom()." ".$this->getPrenom()." (".$this->getAge()." ans) ";
    }
    



}