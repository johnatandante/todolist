<?php

namespace api;

require_once('../business/database.php');
require_once('../business/task_business.php');

use business\Database;
use business\TaskBusiness;

class ApiTaskBusiness
{

    private $business;

    function __construct($business)
    {
        $this->business = $business;
    }

    function handle($post_vars) {

        if(isset($post_vars['id'])) {

            $this->business->set_task_completed($post_vars['id']);
            return '{ "status": true }';
        }

    }

}

$database = new Database();
$business = new TaskBusiness($database);

$api = new ApiTaskBusiness($business);

echo $api->handle($_POST);

?>