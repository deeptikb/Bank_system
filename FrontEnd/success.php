<?php
 session_start();
 if($_SESSION['views']>=1){
    $_SESSION['views']=0;
    header("Location:Homesite.php");
  }
    else if($_SESSION['views']===0) {
      $_SESSION['views']+=1;
  include 'connection.php';
  $_SESSION['amt']=$_POST['amt'];
  $query="select current_bal from customer where cust_name='{$_SESSION['cust_one']}'";
    $result=mysqli_query($con,$query);
    while($row=mysqli_fetch_array($result))
    {
    $current_bal=$row['current_bal'];
    }
    $change_balance=$current_bal-$_SESSION['amt'];
    $_SESSION['newamt']=$change_balance;
    $sql="update customer set current_bal='$change_balance' where cust_name='{$_SESSION['cust_one']}'";
    mysqli_query($con,$sql); 
   $query="select current_bal from customer where cust_name='{$_SESSION['cust_one1']}'";
    $result=mysqli_query ($con,$query);
    while($row=mysqli_fetch_array($result))
    {
    $current_bal=$row['current_bal'];
    }
    $change_balance=$current_bal+$_SESSION['amt'];
    $sql1="update customer set current_bal='$change_balance' where cust_name='{$_SESSION['cust_one1']}'";
     mysqli_query($con,$sql1);
    $query="insert into transaction values('".date("Y/m/d")."','".$_SESSION['cust_one']."','".$_SESSION['cust_one1']."','".$_SESSION['amt']."')";
    mysqli_query($con,$query);
}  
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style3.css" class="rel">
</head>
<body>
    <div class="header">
        <div class="sub-header">
           <button type="button" class="btn btn-success btn-block " onclick="location.href='Homesite.php'";>Back</button>
        </div>
    </div>
    <div class="person-det h5">
         <?php echo '<img src="data:image;base64,'.base64_encode($_SESSION['image']).'" width="230px" height="270px" alt="customer images">';
         echo "<br>";
         echo "Name:".$_SESSION['cust_one'];
         echo "<br>";
         echo  "Phone Number:".$_SESSION['phoneno'];
         echo "<br>";
         echo "Email Address:".$_SESSION['email'];
         echo "<br>";
         echo "Current Balance:".$_SESSION['newamt'];
         echo "<br>";
         ?>
        </div>
        <center><div class="tick-icon h3">
          <i class='fa fa-check-circle' style="color:green">Transfer Successful!</i>
        </div></center>
</body>
</html>