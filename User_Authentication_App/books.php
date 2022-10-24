<?php
//include auth_session.php file on all user panel pages
//require('db.php');
//include("authentication_session.php");
//include("include/config.php");

//if (isset($_SESSION['user_id']) == false){
    //header("Location: login.php");
//}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Library Database</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

<nav>
    <a href="login.php">Logout</a>
</nav>

<div id="container">
<h2>Library</h2>

<div class="row">
    <div class="col-md-7">
        <form action="search_box.php" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="search" value="<?php if (isset($_GET['search'])){echo $_GET['search']; }?>" placeholder="Search data">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
    </div>
</div>


</div>
</div>

<div id="content">

<?php

require_once('include/config.php'); #calling the config file & passing the path as a parameter

$sql = "SELECT bookID, BookName, BookYear, Genre, AgeGroup  FROM books";
$response = @mysqli_query($connection,$sql);

if($response){
    echo '<table>
    
    <tr>

    <th>Book ID</th>
    <th>Book Name</th>
    <th>Book Year</th>
    <th>Genre</th>
    <th>Age Group</th>
    <th colspan="2">Action</th>
  
    </tr>';

    while($row = mysqli_fetch_array($response)){
        echo '
        <tr>
         <td>'.$row['bookID'].'</td>
         <td>'.$row['BookName'].'</td>
         <td>'.$row['BookYear'].'</td>
         <td>'.$row['Genre'].'</td>
         <td>'.$row['AgeGroup'].'</td>
         <td>'.$row['id'].'</td>

        
         <td>
			<button class="edit_btn" >Edit
		 </td>
		 <td>
			<button class="del_btn">Delete</button>
		 </td>
        
        </tr>';  
    }
}
else{
    echo "Could not get a response from database".mysqli_error($connection);
}
mysqli_close($connection);

?>

</div>
    
</body>
</html>
































<?php
/*if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($connection, "SELECT * FROM Books WHERE id=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$BookName = $n['BookName'];
	        $BookYear = $n['BookYear'];
            $Genre = $n['Genre'];
            $AgeGroup = $n['AgeGroup'];
		}
	}*/?>
