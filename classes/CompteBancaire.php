<?php

class CompteBancaire {

    private string $libelle;
    private float $solde;
    private string $devise;
    private Titulaire $titulaire;

    public function __construct(string $libelle, float $solde, string $devise, Titulaire $titulaire){
        $this->libelle = $libelle;
        $this->solde = $solde; 
        $this->devise = $devise;
        $this->titulaire = $titulaire;
        $titulaire->addAccount($this);
    }

    public function getLibelle()
    {
        return $this->libelle;
    }

    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getSolde()
    {
        return $this->solde;
    }

    public function setSolde($solde)
    {
        $this->solde = $solde;

        return $this;
    }

    public function getDevise()
    {
        return $this->devise;
    }

    public function setDevise($devise)
    {
        $this->devise = $devise;

        return $this;
    }
    public function getTitulaire()
    {
        return $this->titulaire;
    }

    public function setTitulaire($titulaire)
    {
        $this->titulaire = $titulaire;

        return $this;
    }

    public function crediter(float $montant)
    {
        $this->solde += $montant;  
        return $this;
    }

    public function debiter(float $montant)
    {
        if ($montant > $this->solde) {
            echo "Solde insuffisant. Opération annulée.<br><br>";
        } else {
            $this->solde -= $montant;
        }
        return $this;
    }

    public function virerVers(CompteBancaire $destinataire, float $montant)
    {
        if ($montant > $this->solde) {
            echo "Solde insuffisant. Opération annulée.<br><br>";
        } else {
            $this->debiter($montant);
            $destinataire->crediter($montant);
            echo "Operation effectuée.<br>".
            $this."<br><b>Nouveau Solde : $this->solde</b><br><br>";
        }
    }

    
    public function getInfos(): string {
        return $this ."<br><b>Solde actuel :".$this->solde.$this->getDevise()."</b><br><br>"; 
    }
   
    public function __toString(){
        return $this->getLibelle();   
    }
}