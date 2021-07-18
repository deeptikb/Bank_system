<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style3.css" class="rel">
</head>
<body>
    <div class="header">
        <div class="sub-header">
           <button type="button" class="btn btn-success btn-block " onclick="location.href='Homesite.php'";>Back</button>
        </div>
    </div> 
    <div class="cont1">
    <?php
       error_reporting(0);
       session_start();
       $_SESSION['cust_one']=$_GET['name'];
       include('connection.php');
       $query="select cust_name,current_bal,phoneno,email,images from customer where cust_name='{$_SESSION['cust_one']}'";
       $query_run=mysqli_query($con,$query);
       while($row=mysqli_fetch_array($query_run))
           {
           $_SESSION['email']=$row['email'];
           $_SESSION['phoneno']=$row['phoneno'];
           $_SESSION['current_bal']=$row['current_bal'];
           $_SESSION['image']=$row['images'];
           }
    ?>
   <div class="onecust" style="margin-top:100px;margin-left:50px;">
       <div class="p-2 mt-sm-4 h5">
         <?php echo '<img src="data:image;base64,'.base64_encode($_SESSION['image']).'" width="230px" height="270px" alt="customer images">';
         echo "<br>";
         ?>
         <label>Name:</label>
         <?php echo $_SESSION['cust_one'];
         echo "<br>";?>
         <label>Phone Number:</label>
         <?php echo $_SESSION['phoneno'];
         echo "<br>";?>
         <label>Email Address:</label>
       <?php  echo $_SESSION['email'];
         echo "<br>";?>
         <label>Current Balance:</label>
         <?php echo $_SESSION['current_bal'];
         echo "<br>";
         ?>
        </div>
        <div class="p-2">
         <button type="button" class="btn btn-outline-success" onclick="location.href='choosinguser.php';">Make Payment</button>
        </div>
    </div>
    </div>
</body>
</html>
