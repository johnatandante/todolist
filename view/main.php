<?php

namespace view;


require_once('./model/user.php');
require_once('./view/menu.php');
require_once('./business/task_business.php');

use business\TaskBusiness;
use business\Database;

$database = new Database();
$business = new TaskBusiness($database);

?>
<div id="myDIV" class="header">
    <h2>My To Do List</h2>
</div>

<div class="main">

    <div class="formlist">
        <form action="add_task.php">
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
                        echo "<li>". $task->titolo."</li>";
                    }
                }
            ?>
        </ul>
    </div>
</div>