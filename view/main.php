<?php

namespace view;

require_once('./model/user.php');
require_once('./view/menu.php');
require_once('./business/task_business.php');

use business\TaskBusiness;
use business\Database;

$database = new Database();
$business = new TaskBusiness($database);

// handle incoming tasks
$business->handle($_POST);

?>

<div id="myDIV" class="header">
    <h2>My To Do List</h2>
</div>

<div class="main">

    <div class="formlist">
        <form action="./index.php" method="post">
            <input type="text" name="task" id="myInput" placeholder="Name the task...">
            <input type="submit" class="addBtn" value="Add" />
        </form>
    </div>
    <div class="list">
        <ul id="myUL">
            <?php 

                $tasks = $business->fetchTasks($_SESSION['user']);
                $task = null;
                foreach($tasks as $task) {
                    if($task->completata) {
                        echo "<li class=\"checked\">". $task->titolo."</li>";
                    } else {
                        echo "<li onClick=\"mark_completed(event,".$task->id.")\">". $task->titolo."</li>";
                    }
                }
            ?>
        </ul>
    </div>
</div>
<script src="js/main.js" type="text/javascript"></script>