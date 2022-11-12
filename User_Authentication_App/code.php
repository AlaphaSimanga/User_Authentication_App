<?php
session_start();
require 'config.php';

if(isset($_POST['delete_book'])){

    $book_id = mysqli_real_escape_string($connection,$_POST['delete_book']);

    $query = "DELETE FROM books WHERE id='$book_id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run){
        $_SESSION['message'] = "Book Deleted Successfully";
        header("Location: books.php");
        exit(0);
    }else{
        $_SESSION['message'] = "Book Not Deleted";
        header("Location: books.php");
        exit(0);
    }
}

if(isset($_POST['update_book'])){
    
    $book_id = mysqli_real_escape_string($connection, $_POST['book_id']);
    $BookName = mysqli_real_escape_string($connection, $_POST['BookName']);
    $BookYear = mysqli_real_escape_string($connection, $_POST['BookYear']);
    $Genre = mysqli_real_escape_string($connection, $_POST['Genre']);
    $AgeGroup = mysqli_real_escape_string($connection, $_POST['AgeGroup']);

    $query = "UPDATE books SET BookName='$BookName', BookYear='$BookYear', Genre='$Genre', AgeGroup='$AgeGroup' 
            WHERE id='$book_id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run){
        $_SESSION['message'] = "Book Updated Successfully";
        header("Location: books.php");
        exit(0);
    }else{
        $_SESSION['message'] = "Book Not Updated";
        header("Location: books.php");
        exit(0);
    }
}

if(isset($_POST['save_book'])){

    //$book_id = mysqli_real_escape_string($connection, $_POST['book_id']);
    $BookName = mysqli_real_escape_string($connection, $_POST['BookName']);
    $BookYear = mysqli_real_escape_string($connection, $_POST['BookYear']);
    $Genre = mysqli_real_escape_string($connection, $_POST['Genre']);
    $AgeGroup = mysqli_real_escape_string($connection, $_POST['AgeGroup']);

    $query = "INSERT INTO books (BookName, BookYear, Genre, AgeGroup) VALUES
        ('$BookName', '$BookYear', '$Genre', '$AgeGroup')";

    $query_run = mysqli_query($connection,$query);
    if($query_run){

        $_SESSION['message'] = "Book Created Successfully";
        header("Location: create-book.php");
        exit(0);

    }else{
        $_SESSION['message'] = "Book Not Created";
        header("Location: create-book.php");
        exit(0);
    }
}

?>