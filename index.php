<?php
include("classes/TaskManager.php");
$task = new TaskManager();

if(isset($_POST['save'])){
$task->store($_POST);
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="task shadow rounded">
        <div class="col-md-12">
            <div class="header text-center py-3">
                <h1 class="text-primary display-3">Task Manager</h1>
                <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam incidunt temporibus
                    consequuntur quis consectetur voluptates repellendus distinctio. Beatae, dolor pariatur!</p>
            </div>
            <div class="row">
                <div class="col-3 offset-1 shadow-sm p-3 mb-5 bg-white rounded rounded">
                  <h1 class="text-center text-primary">Add Task</h1>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="taskName" class="form-label">Task Name</label>
                            <input type="text" class="form-control" id="taskName" name="task_name" placeholder="Enter your Task">
                        </div>
                        <div class="mb-3">
                            <label for="img" class="form-label">Image</label>
                            <input type="file" class="form-control" id="img" name="image">
                        </div>
                        <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" name="task_date">
                        </div>
                        <button type="submit" name="save" class="btn btn-primary w-100">Submit</button>
                    </form>
                    
                </div>
                <div class="col-md-7">
                <h1 class="text-center text-primary">All Task</h1>
                    <table class="table">
                        <thead>
                          <tr>
                            <th>sl</th>
                            <th>Task Name</th>
                            <th>Image</th>
                            <th>Date</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                           $data = $task->show();
                           $i = 1;
                           while($row = mysqli_fetch_assoc($data)){ ?>

                           <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $row['task_name']?></td>
                            <td> <img src="upload/<?php echo $row['image']?>" alt="" width="100px" height="80px" > </td>
                            <td><?php echo date("d-M-Y", strtotime($row['task_date'])) ?></td>
                            <td>
                              <a href="" class="btn btn-sm btn-outline-success">Edit</a>
                            </td>
                          </tr>
                          <?php
                          
                           }
                          ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>