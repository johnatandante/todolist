<?php

namespace business;

use mysqli;
use utils\Utility;

use model\User;
use model\Attivita;

class Database
{
    private $servername = "127.0.0.1";
    private $username = "usertodolist";
    private $password = "BDYtBuyF5QWGT9tY";
    private $db = "todolist";

    function create_connection()
    {
        $conn = new mysqli($this->servername, $this->username,
            $this->password, $this->db);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    public function get_user_info($usernameinput, $passwordinput)
    {

        $username = Utility::clean_data($usernameinput);
        $password = Utility::clean_data($passwordinput);

        // Create connection
        $conn = $this->create_connection();

        $sql = "SELECT id, username, fullname, is_admin FROM Users where username = '" . $username . "' and password = '" . $password . "'";
        $result = $conn->query($sql);

        $user = null;

        // echo "found nrows " . $result->num_rows ;
        if ($result->num_rows == 1) {
            $user = new User();
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $user->id = $row["id"];
                $user->username = $row["username"];
                $user->fullname = $row["fullname"];
                $user->is_admin = $row["is_admin"];

            }
        }

        $conn->close();

        return $user;
    }

    public function add_task($titolo)
    {

        // Create connection
        $conn = $this->create_connection();
        $user = $_SESSION['user'];

        $sql = "INSERT INTO attivita(id_utente, titolo) VALUES (" . $user->id . ",'" . $titolo . "')";
        $result = $conn->query($sql);

        $conn->close();

        return 1;
    }

    public function set_task_completed($id)
    {
        // Create connection
        $conn = $this->create_connection();
        // $user = $_SESSION['user'];

        $sql = "update attivita set completata = 1 where id = " . $id;
        $result = $conn->query($sql);

        $conn->close();

        return 1;
    }

    public function fetch_tasks($user, $completed = 0)
    {
        // Create connection
        $conn = $this->create_connection();

        $sql = "select * from attivita where completata = " . $completed . " and id_utente  = '" . $user->id . "'";
        $result = $conn->query($sql);

        $rows = array();

        // output data of each row
        while ($row = $result->fetch_assoc()) {
            array_push($rows, $row);
        }

        $conn->close();

        return $rows;

    }
}

?>