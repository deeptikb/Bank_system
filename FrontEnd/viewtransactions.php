<?php
include('connection.php')

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view List of Transactions</title>
    <link rel="stylesheet" href="style3.css" class="rel">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="header">
        <div class="sub-header">
           <button type="button" class="btn btn-success btn-block " onclick="location.href='Homesite.php'";>Back</button>
           
        </div>
    </div>
    <div class="tab">
      <table class="table table-bordered">
         <th scope="col">Date</th>
         <th scope="col">From</th>
         <th scope="col">To</th>
         <th scope="col">Amount</th>

            <?php 
               session_start(); 
               $conn= mysqli_connect("localhost","root","","Bank");
               $query="select Date,from_cust,to_cust,amount_trans from transaction";
               $result=mysqli_query($conn,$query);
               if(!$result){
                echo "error".mysqli_error();
               }
              else{
               while($row=mysqli_fetch_array($result))
               {
                ?>
                 <tr>
                 <td><?php echo $row['Date']?></td>
                 <td> <?php echo $row['from_cust']?></td>
                 <td> <?php echo $row['to_cust']?></td>
                 <td> <?php echo $row['amount_trans']?></td>
               </tr>
            <?php }}?>
           
         </table>
    </div>
          
        <?php mysqli_close($con);
            ?>  
</body>
</html>