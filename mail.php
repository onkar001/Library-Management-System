<?php session_start()?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="css/mail.css">
<style>
	body{
    background-color: #FFD580;
	}
	.form-group label{
		padding: 7px;
	}
</style>

	</head>
<body>
	<div class="col-md-5 well " style="margin:100px auto;">
		<h3 class="text-dark" style="margin-bottom: 30px; text-align:center;text-color: black;">Sending Confirmation Mail</h3>
	
		<div class="col-md-3"></div>
		<div class="col-md-10"style=" padding: 15px; padding-top: 30px;margin:20px auto;height:380px; background-color:whitesmoke ;">
			<form method="POST" action="send_email.php">
				<div class="form-group">
					<label>Email:</label>
					<input type="email" class="form-control" name="email" placeholder="Enter the Email ID" required="required"/>
				</div>
				<div class="form-group">
					<label>Subject</label>
					<input type="text" class="form-control" placeholder="Enter the Subject" name="subject" required="required"/>
				</div>
				<div class="form-group">
					<label>Message</label>
					<textarea row="3" type="text" class="form-control" name="message" placeholder="Message send to User"required="required"></textarea>
				</div>
				<br>
				<center><button name="send" class="btn btn-primary" style="margin-top:15px"><span class="glyphicon glyphicon-envelope"></span> Send</button></center>
			</form>
			<br />
			<?php
				if(ISSET($_SESSION['status'])){
					if($_SESSION['status'] == "ok"){
			?>
						<div class="alert alert-info"><?php echo $_SESSION['result']?></div>
			<?php
					}else{
			?>
						<div class="alert alert-danger"><?php echo $_SESSION['result']?></div>
			<?php
					}
 
					unset($_SESSION['result']);
					unset($_SESSION['status']);
				}
			?>
		</div>
	</div>
</body>
</html>