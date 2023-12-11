function mark_completed(event, idTask) {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function (response) {
        if (this.readyState == 4 && this.status == 200) {
            var json = JSON.parse(this.response);
            if (json["status"]) {
                // event.target.removeEventListener("onclick", mark_completed);
                event.target.onclick = null;
                event.target.classList.add("checked");
            }

        }
    };
    xmlhttp.open("POST", "api/api_task_business.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("id=" + idTask);


}