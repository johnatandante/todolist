<?php

namespace business;

// use model\User;
use model\Attivita;
// use business\Database;

class TaskBusiness {

    private $database;

    function __construct($database){

        $this->database = $database;

    }

    function fetchTasks() {
        
        $user = $_SESSION['user'];
        $rows = $this->database->fetch_tasks($user);

        $activities = array();
        $row = null;
        foreach($row as $rows) {
            $attivita = new Attivita();
            $attivita->id = $row["id"];
            $attivita->id_user = $row["id_user"];
            $attivita->titolo = $row["titolo"];
            $attivita->descrizione = $row["descrizione"];
            $attivita->completata = $row["completata"];
            array_push($rows, $attivita);
        }

        return $activities;

    }

}

?>
