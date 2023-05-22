<?php
include('./db_conn.php');
if (isset($_REQUEST['submit'])) {
  $name = $_REQUEST['name'];
  $email = $_REQUEST['email'];
}


$sql = "INSERT INTO `exampletable` ( `name`, `email`) VALUES ( '$name', '$email')";
if (mysqli_query($conn, $sql)) {
?>
  <div class="alert alert-danger" role="alert">
    Record Created Successfully
  </div>
  <script>
    setTimeout(() => {
      window.location.href = "./display.php";
    }, 2000);
  </script>
<?php
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
