<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        
        <title>Organizer</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="Style2.css" type="text/css" rel="stylesheet">
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
			 
		form, .content{
			border: 1px solid #FFDD33;
			border-radius: 0px 0px 10px 10px;
			width: 1000px;
			padding: 20px;	
		}
		form {
			border: 4px solid #FFDD33;
			border-radius: 0px 0px 10px 10px;
			box-shadow: 0px 8px 16px 8px rgba(0,0,0,0);
			height: 725px;
			margin-bottom: 80px;
		}
		.header {
			width: 500px;
			margin: 50px auto 0px;
			margin-bottom: 0px;
			color: white;
			background: #FFDD33;
			text-align: center;
			border: 1px solid #B0C4DE;
			border-bottom: none;
			border-radius: 10px 10px 0px 0px;
			padding: 20px;
		}
		.input-group {
			margin: 10px 0px 10px 0px;
			margin-bottom:25px;
		}
		.input-group label {
			display: block;
			text-align: left;
			margin: 3px;
			font-family: Times;
			color: #33B7FF;
			font-size: 30px;
		}
		.btn {
			margin-top: 8px;
			padding: 10px;
			width: 100px;
			font-size: 15px;
			color: white;
			background: #FFDD33;
			border: none;
			border-radius: 5px;
		}
	
	</style>
        
    </head>
    <div class="container">


  
<ul>
       
        <li style="float:center"><a class="active" href="register.php"> Organizer </a></li>
		  <li style="float:center"><a href="index.php">Time Book</a></li>
		  
    </ul>
    <body>
	
	<center>
        <img src ="time.jpg" style="width:30%; height:30%;">
        </center>
		
       <center>
	   
			 <div class="header">
				<h2>Add Schedule</h2>
			</div>
			
					  <form method="post" action="add.php">
								
								<div class="input-group">
								  <label>Time</label>
								  <input type="text" name="Time" >
								</div>
								<div class="input-group">
								  <label>AM/PM</label>
								  <input type="text" name="AMPM">
								</div>
								<div class="input-group">
								  <label>Date</label>
								  <input type="text" name="Date">
								</div>
								<div class="input-group">
								  <label>Activity</label>
								  <input type="text" name="Activity">
								</div>
								<div class="input-group">
								  <label>Alarm/not</label>
								  <input type="text" name="input-group">
								</div>
								&nbsp;&nbsp;
								<div class="input-group">
								  <button type="submit" class="btn" name="add_schedule">Add</button>
								</div>
								
					  </form>
            
        
            </center>
    </body>
</html>