<?php
include('config/db_connect.php');
$name = $title = $tell = $addres = $souce = '';
$errors = array('name' => '', 'title' => '', 'tell' => '', 'address' => '', 'souce' => '');


//name
if (isset($_POST['submit'])) {

  if (!empty($_POST['name'])) {
    $name = $_POST['name'];
    if (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
      $errors['name'] = 'Name must be letters and spaces only';
    }
  }
  //tell
  if (!empty($_POST['tell'])) {
    $tell = $_POST['tell'];
    echo $tell;
    if (!preg_match("/^[0-9\-]|[\+0-9]|[0-9\s]|[0-9()]*$/", $tell)) {
      $errors['tell'] = 'Invalid phone number';
    }
  }
  //address
  if (!empty($_POST['address'])) {
    $address = $_POST['address'];
    if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $address)) {
      $errors['address'] = 'Address must be coma separated list.';
    }
  }
  if (!empty($_POST['souce'])) {
    $souce = $_POST['address'];
    if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $souce)) {
      $errors['souce'] = 'Souce must be coma separated list.';
    }
  }

  if (!empty($_POST['title'])) {
    $selected = $_POST['title'];
    echo 'You have chosen: ' . $selected;
  } else {
    echo 'Please select the value.';
  }



  if (array_filter($errors)) {
  } else {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $tell = mysqli_real_escape_string($conn, $_POST['tell']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $souce = mysqli_real_escape_string($conn, $_POST['souce']);
    $sql = "INSERT INTO doners(Title, Namee, Addresss, Tell, Souce) VALUE('$title', '$name','$address','$tell', '$souce')";
    if (mysqli_query($conn, $sql)) {
      //success
      header('Location: index.php');
    } else {
      //fail
      echo 'query error: ' . mysqli_error($conn);
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doners</title>

</head>

<body>

  <?php include('Templates/header.php') ?>
  <section class="container bg-light text-secondary">
    <h4 class="text-center">Add Doners</h4>
    <form class="bg-light" action="add.php" method="POST">
      <div class="mb-3 row">
        <label for="typeTitle" class="col-sm-2 col-form-label">First and Last Name</label>
        <div class="col-sm-10">
          <input type="text" name="name" class="form-control" id="typeTitle" placeholder="Example: John Smith" value="" required>
          <div class="text-danger"><?php// echo $errors['title']?> </div>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="phone" class="col-sm-2 col-form-label">Enter a phone number:</label>
        <div class="col-sm-10">
          <div class="input-group">
            <input type="tell" id="phone" name="tell" class="form-control" placeholder="359-89-000-1122" pattern="[0-9]{3}-[8-9]{2}-[0-9]{3}-[0-9]{4}" required>
            <div class="text-danger"><?php// echo $errors['email']; ?> </div>
          </div>
        </div>

      </div>
      <div class="mb-3 row">
        <label for="typeTitle" class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-10">
          <input type="text" name="address" class="form-control" id="typeTitle" placeholder="Example: Kosmos 3, Samuil, Razgrad" value="" required>
          <div class="text-danger"><?php // echo $errors['title']; 
                                    ?> </div>
        </div>
      </div>

      <div class="mb-3 row">
        <label for="typeIng" class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-10">
          <select class="form-select" name="title" aria-label="Default select example" required>
            <option selected disabled>Open this select menu</option>
            <option value="XL Doner">XL Doner</option>
            <option value="Large Doner">Large Doner</option>
            <option value="Small Doner">Small Doner</option>
            <option value="Doner Box">Doner Box</option>
          </select>
          <div class="text-danger"> </div>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="typeTitle" class="col-sm-2 col-form-label">Souce</label>
        <div class="col-sm-10">
          <input type="text" name="souce" class="form-control" id="typeTitle" placeholder="Example: Samuray, Chesnov" value="" required>
          <div class="text-danger"><?php // echo $errors['title']; 
                                    ?> </div>
        </div>
      </div>
      <div class="mb-3 row">
        <div class="col-sm-12 d-flex justify-content-center">
          <input type="submit" name="submit" class="btn">
        </div>
      </div>
    </form>
  </section>
  <?php include('Templates/footer.php') ?>

</body>

</html>