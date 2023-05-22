<?php
include("config/config.php");
class TaskManager extends Connection {
    public function store($alldata)
    {
        $taskName = $alldata['task_name'];

        $imageName = $_FILES['image']['name'];
        $temImage = $_FILES['image']['tmp_name'];

        $taskDate = $alldata['task_date'];

        $sql = "INSERT INTO `tasks`(`task_name`, `image`, `task_date`) VALUES ('$taskName','$imageName','$taskDate')";
        $result = $this->con->query($sql);
        if($result){
            echo"Data Insert Successfully";
            move_uploaded_file($temImage,"upload/".$imageName);
        }
    }

    public function show()
    {
        return $result = $this->con->query("SELECT * FROM `tasks`");
    }
}
?>