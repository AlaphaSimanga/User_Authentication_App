<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Search Box</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>


    
<div class="container">
    <div class="row">
        <div class="col-md-12">

        <div class="col-md-12">
           <div class="card mt-4">
              <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Book ID</th>
                            <th>Book Name</th>
                            <th>Book Year</th>
                            <th>Genre</th>
                            <th>Age Group</th>
                        </tr>
                    </thead>
   
                    <tbody>

                        <?php
                           require_once('include/config.php');

                           if (isset($_GET['search'])){
                            $filtervalues = $_GET['search'];
                            $query = "SELECT * FROM Books WHERE CONCAT(BookName,Genre) LIKE '%$filtervalues%' ";
                            $query_run = mysqli_query($connection, $query);

                            if(mysqli_num_rows($query_run) > 0){

                                foreach ($query_run as $items){
                                    ?>
                                    <tr>
                                      <td><?= $items['bookID'];?></td>
                                      <td><?= $items['BookName'];?></td>
                                      <td><?= $items['BookYear'];?></td>
                                      <td><?= $items['Genre'];?></td>
                                      <td><?= $items['AgeGroup'];?></td>
                                    </tr>

                                    <?php
                                }
                            }else{
                                ?>
                                    <tr>
                                      <td colspan="4">No Record Found</td>
                                    </tr>
                                <?php
                            }
                           }
                        ?>


                        
                   </tbody>

                </table>
              </div>
            </div>
        </div>

    </div>
</div>
</body>
</html>