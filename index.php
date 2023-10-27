<?php
    include("function.php");
   
    $objCrudAdmin= new crudapp();

    if(isset($_POST['add_info'])){
      $return_msg = $objCrudAdmin->add_data($_POST);
    }

    $studentsdata = $objCrudAdmin->display_data();

    if(isset($_GET['status'])){
      if($_GET['status']='delete'){
        $delete_id=$_GET['id'];
        $delt_msg = $objCrudAdmin->delete_data($delete_id);
      }
    }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>CRUD APP</title>
  </head>
  <body>

        <div class="container my-4 p-4 shadow">
            <h2><a style="text-decoration: none;" href="index.php">Safa Marwa Student Database</a></h2>
            <!-- method banan vul hoisilo -->
            <form class="form" action="" method='POST' enctype="multipart/form-data">  
              <?php if(isset($delt_msg)){ echo $delt_msg; } ?>
              <?php if(isset($return_msg)){ echo $return_msg; } ?>

              <input class="form-control mb-2" type="text" name="std_name" placeholder="Enter Your Name">
              <input class="form-control mb-2" type="number" name="std_roll" placeholder="Enter Your Roll">
              <label for="image">Upload Your Image</label>
              <input class="form-control mb-2" type="file" name="std_img">
              <input type="submit" value="Add Information" name="add_info" class="form-control bg-warning">
            </form>
        </div>

        <div class="container my-4 p-4 shadow">
          <table class="table table-responsive">
            <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Roll</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php while($student = mysqli_fetch_assoc($studentsdata)){ ?>
              <tr>
                <td><?php echo $student['id']; ?></td>
                <td><?php echo $student['std_name']; ?></td>
                <td><?php echo $student['std_roll']; ?></td>
                <td><img style="height: 100px;" src="upload/<?php echo $student['std_image']; ?>"></td>
                <td>
                  <a class="btn btn-success" href="edit.php?status=edit&&id=<?php echo $student['id']; ?>">Edit</a>
                  <a class="btn btn-warning" href="?status=delet&&id=<?php echo $student['id']; ?>">Delete</a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
            
        </div>
  

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>