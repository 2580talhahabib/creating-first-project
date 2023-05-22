<?php
if (isset($_REQUEST['u_id'])) {
    include("./db_conn.php");
    $u_id = $_REQUEST['u_id'];
    // sql to delete a record
    $sql = "DELETE FROM exampletable WHERE id=$u_id";
    // $sql = "DELETE FROM exampletable";

    if (mysqli_query($conn, $sql)) {
?>
        <div class="alert alert-danger" role="alert">
            Record Deleted Successfully
        </div>
        <script>
            setTimeout(() => {
                window.location.href = "./display.php";
            }, 2000);
        </script>
<?php
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<?php include('./db_conn.php') ?>

<body>

    <div class="container py-3">
        <h1 class="text-center">Student Details</h1>
        <table class="table table-bordered table-striped">
            <thead class="text-center">
                <tr>
                    <th scope="col">Sr. #</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Operation</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM exampletable";
                $result = mysqli_query($conn, $sql);
                $counter = 1;
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <th scope="row"><?php echo $counter; ?></th>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td class="d-flex justify-content-center">
                                <a href="edit.php?u_id=<?php echo $row['id']; ?>" class="btn btn-primary me-3">Edit</a>
                                <a href="display.php?u_id=<?php echo $row['id']; ?>" class="btn btn-outline-danger">Delete</a>
                            </td>
                        </tr>

                <?php
                $counter++;
                    }
                } else {
                    ?>
                        <tr>
                            <td colspan="4"><h3 class="text-center text-danger">No Record Found</h3></td>
                        </tr>
                    <?php
                }

                mysqli_close($conn);
                ?>


            </tbody>
        </table>
    </div>

</body>

</html>