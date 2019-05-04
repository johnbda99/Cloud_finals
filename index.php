
<?php include('server.php'); ?>


<!DOCTYPE html>
<html>

	<head>
		<title>Home</title>
		<link rel="stylesheet" type="text/css" href="Style1.css">
	</head>
	<style>
	ul 
            {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: #FFDD33;
            }
			 .active 
            {
                background-color: #E7FF33;
            }
			 li a:hover:not(.active) 
            {
                background-color: #B2FF33;
            }
	.container0{
		color:#FF4500;
		font-size: 50px;
	}
	</style>

	
	<ul>
       
        <li style="float:right">
		<div class="dropdown">
				<?php  if (isset($_SESSION['Time'])) : ?>
				<button class="dropbtn"><?php echo $_SESSION['AMPM']; ?>
				</button>
				<div class="dropdown-content">
					<a href="index.php?logout='1'">logout</a>
				</div>
				<?php endif ?>
	   </div> 
		</li>
      
         <li style="float:center"><a class="active" href="add.php"> Organizer </a></li>
		  <li style="float:center"><a href="index.php">Time Book</a></li>
    </ul>
	  
<body>
			<div class="container0" style=" height: 380px;"> 
				<center><h1>Time Book</h1></center>
				 </div><br>
				 
				   
 
    <br>
    <br>
		<center>
		<?php
		$sql = "SELECT Time, AMPM, Activity, Date FROM calendar";
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row?>
	<table border='1'>
	<tr>
<th style="width: 100px;">Time</th>
<th style="width: 100px;">AMPM</th>
<th style="width: 100px;">Date</th>
<th style="width: 100px;">Activity</th>
</tr>
</table>
	
	
   <?php while($row = mysqli_fetch_assoc($result)) {?>
		
		<table border='1'>
<tr>
<th style="width: 100px;"><?php echo $row["Time"] ?></th>
<th style="width: 100px;"><?php echo $row["AMPM"] ?></th>
<th style="width: 100px;"><?php echo $row["Date"] ?></th>
<th style="width: 100px;"><?php echo $row["Activity"] ?></th>
</tr>
</table>
        
   <?php }
} else {
    echo "0 results";
}
		?>
		</center>
    
   
    
    <br>
    <article> 
            
    </aside>
	</body>
</html>