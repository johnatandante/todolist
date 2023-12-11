<?php

namespace model;

class Attivita {


    public $id;
    public $id_user;
    public $titolo;
    public $descrizione;
    public $completata;

    function __construct($id = 0, $id_user = 0, $titolo = "", $descrizione = "", $completata = false)
    {
        $this->id = $id;
        $this->id_user = $id_user;
        $this->titolo = $titolo;
        $this->descrizione = $descrizione;
        $this->completata = $completata;
    }
}

?>