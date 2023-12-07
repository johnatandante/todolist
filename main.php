<?

require_once('utils/session.php');
require_once('business/database.php');

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
            <li>Hit the gym</li>
            <li class="checked">Pay bills</li>
            <li>Meet George</li>
            <li>Buy eggs</li>
            <li>Read a book</li>
            <li>Organize office</li>
        </ul>
    </div>
</div>