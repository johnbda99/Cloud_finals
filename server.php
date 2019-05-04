<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'john_admin', '123', 'timedb');

// add schedule
if (isset($_POST['add_schedule'])) {
  // receive all input values from the form
  $Time = mysqli_real_escape_string($db, $_POST['Time']);
  $AMPM = mysqli_real_escape_string($db, $_POST['AMPM']);
  $Date = mysqli_real_escape_string($db, $_POST['Date']);
  $Activity = mysqli_real_escape_string($db, $_POST['Activity']);

  

  // first check the database to make sure 
  $user_check_query = "SELECT * FROM calendar WHERE Time='$Time' OR email='$AMPM' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
 
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	

  	$query = "INSERT INTO calendar (Time, AMPM, Date, Activity) 
  			  VALUES('$Time', '$AMPM', '$Date', '$Activity')";
  	mysqli_query($db, $query);
  	$_SESSION['success'] = "Successfully added";
  	header('location: index.php');
  }
}












// view  INFO 
if (isset($_POST['productinfo'])) {
  $product_id = mysqli_real_escape_string($db, $_POST['product_id']);
  $imgname = mysqli_real_escape_string($db, $_POST['imgname']);
  $price = mysqli_real_escape_string($db, $_POST['price']);
   
  if (count($errors) == 0) {
  	
  	$sql = "SELECT * FROM product WHERE product_id='$product_id'";
  	$result = $db->query($sql);
    $date="SELECT CURDATE()";
	
  	if ($result->num_rows > 0) {
    // output data of each row
		while($row = $result->fetch_assoc()) {
			echo "id: " . $row["product_id"]. " - Name: " . $row["price"]  . $row["imgname"]. $row["prod_name"] ."<br>". $row["brand"] ."<br>";
			
		$_SESSION['imgname'] = $row["imgname"];
		$_SESSION['product_id'] = $row["product_id"];
		$_SESSION['price'] =   $row["price"];
		$_SESSION['prod_name'] =   $row["prod_name"];
		$_SESSION['d'] =   $row["prod_name"];
		$_SESSION['brand'] =   $row["brand"];
	
  	 
			header('location: productinfo.php');
			
		}
}
  }
}


// ADD TO CART 
if (isset($_POST['add_cart'])) {
  // receive all input values from the form
  $trans_date = mysqli_real_escape_string($db, $_POST['trans_date']);
  $orderss_quantity = mysqli_real_escape_string($db, $_POST['orderss_quantity']);
  $product_id = mysqli_real_escape_string($db, $_POST['product_id']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
 
      $sql2 = "SELECT * FROM users WHERE username='$username'";
	 $resultt = $db->query($sql2);
	 
	 
    // output data of each row
		while($row = $resultt->fetch_assoc()) {
			echo "id: " . $row["user_id"] ."<br>";
			
		$user_id =  $row["user_id"];
		
		
		}


	
	
	$sql = "SELECT * FROM product WHERE product_id='$product_id'";
    $result = $db->query($sql);
	
	 if ($result->num_rows > 0) {
    // output data of each row
		while($row = $result->fetch_assoc()) {
			echo "id: " . $row["Description"]. " - Name: " . $row["price"]  . $row["brand"]. $row["prod_name"] ."<br>";
			
			$total = $row["price"] *  $orderss_quantity;
			$price =$row["price"];
			$brand=$row["brand"];
			$ord_type=$row["Description"];
			$_SESSION['user_idd'] =   $user_id;
			$_SESSION['Descriptionn'] = 	$row["Description"];
			$_SESSION['brandd'] = 			$row["brand"];
			$_SESSION['pricee'] =   		$row["price"];
			$_SESSION['prod_nameee'] =   	$row["prod_name"];
			$_SESSION['prod_name'] =   		$row["prod_name"];
			$_SESSION['quantity_tablee'] =  $orderss_quantity;
			$_SESSION['total'] =  			$total;
		
		}
}

  	$query = "INSERT INTO orderss (ord_type,brand,orderss_quantity,price,total,user_id) values('$ord_type','$brand','$orderss_quantity','$price','$total','$user_id')";
  	mysqli_query($db, $query);
	
	
			
		    
			
	header('location: productinfo.php');
  
}




// confirm TO CART 
if (isset($_POST['confirm_cart'])) {
  // receive all input values from the form
  $trans_date = mysqli_real_escape_string($db, $_POST['trans_date']);
  $orderss_quantity = mysqli_real_escape_string($db, $_POST['orderss_quantity']);
  $trans_total = mysqli_real_escape_string($db, $_POST['trans_total']);
   $user_id = mysqli_real_escape_string($db, $_POST['user_id']);
  
     
 

  	$query = "INSERT INTO transaction (orderss_quantity,trans_date,trans_total,user_id) values('$orderss_quantity','$trans_date','$trans_total','$user_id')";
  	mysqli_query($db, $query);
	
	$sql = "SELECT * FROM transaction ORDER BY trans_id DESC  LIMIT 1";
    $result = $db->query($sql);
	
	 if ($result->num_rows > 0) {
    // output data of each row
		while($row = $result->fetch_assoc()) {
			echo "id: " . $row["trans_id"]. " - Name: " . $row["orderss_quantity"]  . $row["trans_date"]. $row["trans_total"] ."<br>". $row["user_id"] . "";
			$trans_id=$row["trans_id"];
			$trans_quantity=$row["orderss_quantity"];
			$trans_date=$row["trans_date"];
			$trans_total= $row["trans_total"];
			$user=$row["user_id"];
			
			$_SESSION['user'] = $user;
			$_SESSION['trans_id'] = $trans_id;
			$_SESSION['trans_quantity'] = $trans_quantity;
			$_SESSION['trans_date'] = $trans_date;
			$_SESSION['trans_total'] = $row["trans_total"];
			$_SESSION['start'] = "transaction successful";
			
			
			
			
		
		}
}
	
	
		
	unset($_SESSION['prod_nameee']);
	
      header('location: invoice.php');


}

// Delete from order records
if (isset($_GET['cancel_records'])) {
  
 
	$qry1 = "select * from orderss ORDER BY orderss_id DESC LIMIT 1";
		
		$records=mysqli_query($db,$qry1);
			 while($row=mysqli_fetch_array($records))
							{
							echo "id: ".$row[orderss_id]."<br>";
							$id=$row[orderss_id];
							}

$qry = "DELETE from orderss where orderss_id='$id'";


if(mysqli_query($db,$qry))
{
	
	 unset($_SESSION['prod_nameee']);
	 header('location: productinfo.php');
	 
	
}else{
	echo"not detected";
}
	
	
		
	
	
     


}

?>