<?php
session_start();
require("dbconn.php");


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">

        <?php include_once("message.php"); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student Edit
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['id'])) // Если айди установлен student-edit.php?id$student['id']
                        {
                            $student_id = mysqli_real_escape_string($con, $_GET['id']); // Получение id студента
                            $query = "SELECT * FROM students WHERE id='$student_id'"; // получение всех данных о студенте по id
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {

                                $student = mysqli_fetch_array($query_run); // Возвращает данные ввиде массива mysqli_fetch_array
                        ?>




                                <form action="code.php" method="POST">

                                    <input type="hidden" name="student_id" value="<?= $student['id'] ?>">

                                    <div class="mb-3">
                                        <label>Student name</label>
                                        <input type="text" name="name" value="<?= $student['name'] ?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label>Student email</label>
                                        <input type="email" name="email" value="<?= $student['email'] ?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label>Student phone</label>
                                        <input type="text" name="phone" value="<?= $student['phone'] ?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label>Student course</label>
                                        <input type="text" name="course" value="<?= $student['course'] ?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_student" class="btn btn-primary">Update Student</button>
                                    </div>

                                </form>
                        <?php


                            } else {

                                echo "<h4>No search</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>







    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>