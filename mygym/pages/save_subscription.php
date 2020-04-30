<?php
session_start();
include('../connect.php');
 date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');




$membership  =$_POST['name'];
$exp_membership = explode(',', $membership);
$exp_membership_id = mt_rand(01,10000);


 
$amount  = $_POST['price'];
 
$register_date  = $_POST['duration'];
$remark  = $_POST['details'];
 

           $sql1 = "SELECT * FROM tbl_membership where id='$exp_membership_id'";
           $result1 = $conn->query($sql1);
           $row1 = mysqli_fetch_array($result1);
            $membership_duration = $row1['duration'];

  
//echo $expiry_date=date( "Y-m-d", strtotime( "$start_date" ) );


    $sql = "INSERT INTO  tbl_subscription (id, name, price ,  duration,details)
   VALUES ( '$exp_membership_id','$membership','$amount', '$register_date','$remark',)";

 if ($conn->query($sql) === TRUE) {
   
      $_SESSION['success']='Record Successfully Added';
      
     ?>
 
<?php
} else {
   
      $_SESSION['error']='Something Went Wrong';
?>
 
<?php
}

//}

?>