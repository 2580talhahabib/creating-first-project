<?php
include("./db_conn.php");
if (isset($_REQUEST['u_id'])) {
    $u_id = $_REQUEST['u_id'];

    $sql = "SELECT * FROM exampletable WHERE id=$u_id";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);
}
if (isset($_REQUEST['update'])) {
    $user_id = $_REQUEST['user_id'];
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $sql = "UPDATE `exampletable` SET `name`='$name',`email`='$email' WHERE id=$user_id";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "Record Updated Successfully";
    }else{
        echo "Something went wrong please try again";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="">
        <label for="name">name</label>
        <input type="hidden" value="<?php echo $row['id'] ?>" name="user_id">
        <input type="text" value="<?php echo $row['name'] ?>" id="name" name="name">
        <label for="email">email</label>
        <input type="text" value="<?php echo $row['email'] ?>" id="email" name="email">
        <button name="update">Update</button>
    </form>
</body>

</html>