<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="style3.css" class="rel">
    <title>Customers</title>
</head>
<body>
    <div class="header">
        <div class="sub-header">
           <button type="button" class="btn btn-success btn-block " onclick="location.href='Homesite.php'";>Back</button>
        </div>
    </div>
    <?php
    include('connection.php');
    ?>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Choose customer</h1>
            </div> 
        </div>
        <div class="row mt-3">
               <?php
               session_start();
                $query="select images,cust_name from customer";
                $query_run=mysqli_query($con,$query);
                $check_customers=mysqli_num_rows($query_run)>0;

                if($check_customers)
                {
                   while($row=mysqli_fetch_array($query_run))
                   {
                       ?>
                <div class="col-sm-3 mt-3">
                    <div class="card">
                             <?php echo '<img src="data:image;base64,'.base64_encode($row['images']).'" width="230px" height="270px" alt="customer images">';?>
                             <div class="card-body">
                                <h4 class="card-title"><?php echo $row['cust_name']; ?></h4> 
                                 <button type="button" name=<?php echo $row['cust_name'];?> onclick="func(this.name);" class="btn btn-primary btn-lg ">choose</button>
                             </div>
                    </div>
                </div>
                       <?php
                       
                   }
                }
                else
                {
                echo "No customers found";
                }
                ?>
            
        </div>
    </div>
    <p id="p1"></p>
    <script>
        function func(value){
            var val=value;
            location.href='Transfer.php?name='+val+'' ;
        }
    </script>
</body>
</html>