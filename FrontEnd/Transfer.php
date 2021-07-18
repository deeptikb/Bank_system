<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="style3.css" class="rel">
</head>
<body>
    <div class="header">
        <div class="sub-header">
           <button type="button" class="btn btn-success btn-block " onclick="location.href='Homesite.php'";>Back</button>
        </div>
    </div> 
    <?php
       error_reporting(0);
       session_start();
       $_SESSION['cust_one1']=$_GET['name'];
       include('connection.php');
       $query="select cust_name,current_bal,phoneno,email,images from customer where cust_name='{$_SESSION['cust_one1']}'";
       $query_run=mysqli_query($con,$query);
       while($row=mysqli_fetch_array($query_run))
           {
           $_SESSION['email1']=$row['email'];
           $_SESSION['phoneno1']=$row['phoneno'];
           $_SESSION['current_bal1']=$row['current_bal'];
           $_SESSION['image1']=$row['images'];
           }
    ?>
    <div class="d-flex justify-content-center">
       <div class="p-2 mt-sm-4 h5">
         <?php echo '<img src="data:image;base64,'.base64_encode($_SESSION['image']).'" width="230px" height="270px" alt="customer images">';
         echo "<br>";
         echo "Name:".$_SESSION['cust_one'];
         echo "<br>";
         echo  "Phone Number:".$_SESSION['phoneno'];
         echo "<br>";
         echo "Email Address:".$_SESSION['email'];
         echo "<br>";
         echo "Current Balance:".$_SESSION['current_bal'];
         echo "<br>";
         ?>
        </div>
        <div class="arrow mt-sm-5 pr-2" id="arrow" style="color:green;"><big><big><big><big><big><big><big><big><big><big><big>&#8594;</big></big></big></big></big></big></big></big></big></big></big></div>
        <div class="p-2 mt-sm-4 pl-5 h5">
        <?php echo '<img src="data:image;base64,'.base64_encode($_SESSION['image1']).'" width="230px" height="270px" alt="customer images">';
         echo "<br>";
         echo "Name:".$_SESSION['cust_one1'];
         echo "<br>";
         echo  "Phone Number:".$_SESSION['phoneno1'];
         echo "<br>";
         echo "Email Address:".$_SESSION['email1'];
         echo "<br>";
         $_SESSION['views']=0;
         ?>
        </div>
    </div>
    <div class="d-flex justify-content-center">
    <div class="p-2" id="transfer-amt">
        <form action="success.php" method="POST">
        <label for="amt">Amount:</label><br>
        <input type="text" placeholder="Enter amount" name="amt" required>
    </div>
    <div class="p-2">
        <input type="submit" value="Submit" class="btn btn-primary btn-sm  mt-5">     
    </div>
    </form>
    </div>
 </body>
 </html>