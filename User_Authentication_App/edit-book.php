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
    <title>Edit Book</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
  
<picture id="Library">
    <img src="images/libraryr.jpg" alt="Original image">
</picture>

<div class="container">
    <?php include('message.php'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Book
                        <a href="books.php" class="btn btn-danger float-end">Go Back</a>
                    </h4>
                </div>
                <div class="card-body">
                <?php
                    if(isset($_GET['id'])){
                         
                        $book_id = mysqli_real_escape_string($connection, $_GET['id']);
                        $query = "SELECT * FROM books WHERE id='$book_id' ";
                        $query_run = mysqli_query($connection, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                            $book = mysqli_fetch_array($query_run);
                       
                            ?>
                            <form action="code.php" method="POST">
    
                                <input type="hidden" name="book_id" value="<?=$book['id'];?>">
                        
                                <div class="mb-3">
                                   <input type="text" name="BookName" value="<?=$book['BookName'];?>" class="form-control" placeholder="Enter a book name">
                                </div>
                              
                                <div class="mb-3">
                                   <input type="year" name="BookYear" value="<?=$book['BookYear'];?>" class="form-control" placeholder="Enter a book year">
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="Genre" value="<?=$book['Genre'];?>" class="form-control" placeholder="Enter a book genre">
                                </div>
                                <div class="mb-3">
                                   <input type="text" name="AgeGroup" value="<?=$book['AgeGroup'];?>" class="form-control" placeholder="Enter the age group">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="update_book" class="btn btn-primary">Update Book</button>
                                </div>
                            </form>
                            <?php
                        }else{
                            echo "<h4>No Such Id Found</h4>";
                        }
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>




















<?php

//session_start();
//require_once('include/config.php');

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

        //CHANGE THE ID NUMBER HERE TO ADD A NEW NUMBER, I COULDN'T ADD AN AUTO_INCREMENT FOR THIS TABLE
        //manual increment, 

        $sql = "INSERT INTO Books VALUES(NULL, '$BookName', '$BookYear', '$Genre', '$AgeGroup')";

        if(!mysqli_query($connection, $sql)){
            die("Error:".mysqli_error($connection));
        }
    
       echo "A book has been added";
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
    <title>Book Edit</title>
    
    <link rel="stylesheet" href="css/form.css">
</head>
<body>

<?php //if (isset($_SESSION['message'])): ?>
	<div class="msg">-->
		<?php 
			//echo $_SESSION['message']; 
			//unset($_SESSION['message']);
		?>
	<!--</div>-->
<?php //endif ?>

<!--<div id="container">

<div id="content">

</div>

<picture id="Library">
    <img src="images/libraryr.jpg" alt="Original image">
</picture>

<div id="header">
<h1>Book Edit</h1>
</div>

<div id="btn_add">
<a href="books.php">BACK</a>
</div>


/*if(isset($_GET['id'])){

    $bookID = mysqli_real_escape_string($connection, $_GET['id']);

    $query = "SELECT * FROM Books WHERE id='$bookID' ";
    $query_run = mysqli_query($connection, $query);

    if(mysqli_num_rows($query_run) > 0){

        $books = mysqli_fetch_array($query_run);
        
        ?>
        <form action="code.php" method="post">

            <input type="number" name="bookID" value="<?//=$books['bookID']?>"><br>
            <input type="text" name="BookName" id="BookName" value="<?//=$books['BookName'];?>" placeholder="Enter a book name">
            <input type="year" name="BookYear" id="BookYear" value="<?//=$books['BookYear'];?>" placeholder="Enter a book year">
            <input type="text" name="Genre" id="Genre" value="<?//=$books['Genre'];?>" placeholder="Enter a book genre">
            <input type="text" name="AgeGroup" id="AgeGroup" value="<?//=$books['AgeGroup'];?>" placeholder="Enter the age group">
    
            <input type="submit" value="Update Book" name="update_book">
        </form>
        

    }else{
        echo "<h4>No Such Id Found</h4>";
    }
}*>
?>

</div>
    
</body>
</html>-->