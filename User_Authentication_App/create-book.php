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
    <title>Create Book</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>

<picture id="Library">
    <img src="images/libraryr.jpg" alt="Original image">
</picture>
  
<div class="container mt-5">
    <?php include('message.php'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Book
                        <a href="books.php" class="btn btn-success float-end">View Books</a>

                        <a href="signin.php" class="btn btn-danger float-end">Go Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST">

                        <div class="mb-3">
                            <input type="text" name="BookName" id="BookName" class="form-control" placeholder="Enter a book name">
                        </div>
                        <div class="mb-3">
                            <input type="year" name="BookYear" id="BookYear" class="form-control" placeholder="Enter a book year">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="Genre" id="Genre" class="form-control" placeholder="Enter a book genre">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="AgeGroup" id="AgeGroup" class="form-control" placeholder="Enter the age group">
                        </div>
                        <div class="mb-5">
                            <button type="submit" name="save_book" class="btn btn-primary">Save Book</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>










































<?php

//require_once('include/config.php');

/*if(isset($_POST['update_book'])){

    $null_fields = array();

    if(empty($_POST['BookName'])){
        $null_fields[]="BookName";
    }else{
        $BookName = trim($_POST['BookName']);
    }

    if(empty($_POST['BookYear'])){
        $null_fields[]="BookYear";
    }else{
        $BookYear = trim($_POST['BookYear']);
    }

    if(empty($_POST['Genre'])){
        $null_fields[]="Genre";
    }else{
        $Genre = trim($_POST['Genre']);
    }

    if(empty($_POST['AgeGroup'])){
        $null_fields[]="AgeGroup";
    }else{
        $AgeGroup = trim($_POST['AgeGroup']);
    }

    if(empty($null_fields)){

        //$sql = "UPDATE SET Books VALUES(NULL, '$BookName', '$BookYear', '$Genre', '$AgeGroup')";
        $sql = "UPDATE SET Books BookName='$BookName', BookYear='$BookYear', Genre='$Genre', AgeGroup='$AgeGroup' WHERE id='$bookID' ";

        if(!mysqli_query($connection, $sql)){
            die("Error:".mysqli_error($connection));
        }
    
       echo "A book has been added successfully";
       mysqli_close($connection);

    }
    else{
        echo "You need to enter the following missing data:<br>";

        foreach($null_fields as $null_field){
            echo $null_field."<br/>";
        }
    }

}*/






/*if(isset($_POST['submit'])){

    $null_fields = array();

    if(empty($_POST['BookName'])){
        $null_fields[]="BookName";
    }else{
        $BookName = trim($_POST['BookName']);
    }

    if(empty($_POST['BookYear'])){
        $null_fields[]="BookYear";
    }else{
        $BookYear = trim($_POST['BookYear']);
    }

    if(empty($_POST['Genre'])){
        $null_fields[]="Genre";
    }else{
        $Genre = trim($_POST['Genre']);
    }

    if(empty($_POST['AgeGroup'])){
        $null_fields[]="AgeGroup";
    }else{
        $AgeGroup = trim($_POST['AgeGroup']);
    }

    if(empty($null_fields)){

        $sql = "INSERT INTO Books VALUES(NULL, '$BookName', '$BookYear', '$Genre', '$AgeGroup')";

        if(!mysqli_query($connection, $sql)){
            die("Error:".mysqli_error($connection));
        }
    
       echo "A book has been added successfully";
       mysqli_close($connection);

    }
    else{
        echo "You need to enter the following missing data:<br>";

        foreach($null_fields as $null_field){
            echo $null_field."<br/>";
        }
    }

}*/

?>


<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a new book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/form.css">
</head>
<body>

<?php /*if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>

<div id="container">

<div id="content">

<!--</div>-->

<picture id="Library">
    <!--<source media="(max-width:650px)" srcset="images/Face.jpg">
    <source media="(max-width:1000px)" srcset="images/Shoulders.jpg">-->
    <img src="images/libraryr.jpg" alt="Original image">
</picture>

<!--<form action="" method="post">-->

<div id="header">
<h1>Add A New Book</h1>
</div>

<div id="btn_add">
<a href="books.php">View Books</a>
</div>
<?php include('message.php'); ?>

<form action="code.php" method="post">
    <input type="text" name="BookName" id="BookName" placeholder="Enter a book name">
    <input type="year" name="BookYear" id="BookYear" placeholder="Enter a book year">
    <input type="text" name="Genre" id="Genre" placeholder="Enter a book genre">
    <input type="text" name="AgeGroup" id="AgeGroup"  placeholder="Enter the age group">

    <input type="submit" value="Add Book" name="save_book">


</form>
</div>
<?php

?>
    
</body>
</html>-->






































<!--<input type="hidden" name="id" value="<?php //echo $id; ?>">

<?php //if ($update == true): ?>
	<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
<?php //else: ?>
	<button class="btn" type="submit" name="save" >Save</button>
<?php //endif ?>


    value="<?php //echo $BookYear; ?>"
     value="<?php //echo $Genre; ?>"
     value="<?php //echo $AgeGroup; ?>"
-->
<?php
/*if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$BookName = $_POST['BookName'];
	$BookYear = $_POST['BookYear'];
    $Genre = $_POST['Genre'];
    $AgeGroup = $_POST['AgeGroup'];

	mysqli_query($connection, "UPDATE Books SET BookName='$BookName', BookYear='$BookYear' Genre='$Genre' AgeGroup='AgeGroup' WHERE id=$id");
	$_SESSION['message'] = "Book updated!"; 
	header('location: index.php');
}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($connection, "DELETE FROM Books WHERE id=$id");
	$_SESSION['message'] = "Book deleted!"; 
	header('location: index.php');
}*/?>