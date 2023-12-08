<?php
require_once('./model/user.php');
require_once('./utils/session.php');
require_once('./utils/utility.php');

$_SESSION["servername"] = "127.0.0.1";
$_SESSION["username"] = "usertodolist";
$_SESSION["password"] = "BDYtBuyF5QWGT9tY";
$_SESSION["db"] = "todolist";

function create_connection()
{
    $conn = new mysqli($_SESSION["servername"], $_SESSION["username"], $_SESSION["password"], $_SESSION["db"]);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function get_user_info($usernameinput, $passwordinput)
{

    $username = clean_data($usernameinput);
    $password = clean_data($passwordinput);

    // Create connection
    $conn = create_connection();

    $sql = "SELECT id, username, fullname, is_admin FROM Users where username = '" . $username . "' and password = '" . $password . "'";
    $result = $conn->query($sql);

    $user = null;

    echo "found nrows " . $result->num_rows ;
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

?>