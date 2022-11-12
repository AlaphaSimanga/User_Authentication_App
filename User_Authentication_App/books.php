<?php
session_start();
require 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Books</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!--<link rel="stylesheet" href="css/main.css">-->
</head>
<body>
  
<div>
    <a href="index.php" class="btn btn-primary float-end">Logout</a>
</div>

<div class="container mt-4">

    <div class="row">
        <div class="col-md-7">
            <form action="searched_books.php" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" value="<?php if (isset($_GET['search'])){echo $_GET['search']; }?>" placeholder="Search data">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
    </div>

    <?php include("message.php"); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Book Details
                        <a href="create-book.php" class="btn btn-success float-end">Add Book</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Book ID</th>
                                <th>Book Name</th>
                                <th>Book Year</th>
                                <th>Genre</th>
                                <th>Age Group</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                               $query = "SELECT * FROM books";
                               $query_run = mysqli_query($connection, $query);
                              
                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    foreach($query_run as $book)
                                    {
                                        ?>
                                        <tr>
                                            <td><?= $book['id']; ?></td>
                                            <td><?= $book['BookName']; ?></td>
                                            <td><?= $book['BookYear']; ?></td>
                                            <td><?= $book['Genre']; ?></td>
                                            <td><?= $book['AgeGroup']; ?></td>
                                            <td>
                                                <a href = "edit-book.php?id=<?=$book['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                <form action="code.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete_book" value="<?=$book['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php

                                    }

                                }else{
                                    echo "<h5>No Record Found</h5>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>