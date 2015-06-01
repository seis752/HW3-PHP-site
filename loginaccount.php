<?php
include_once("lock.php");
include_once("config.php");
/* need to fix */
/* include("updatevalue.php"); */
include_once("showmessage.php");
include_once("showfriend.php");
include_once("allusers.php");
include_once("viewmsg.php");
?>
<!DOCTYPE HTML>
<head>

	<title>Login</title>
	
	<link rel="shortcut icon" href="faviorico_qh.ico" type="image/x-icon">
	<link rel="icon" href="faviorico_qh.ico" type="image/x-icon">
	<link href="css/bootstrap.css" rel='stylesheet' type="text/css" />
	<link href="css/style.css" rel='stylesheet' type="text/css" />
	<script type="text/javascript">
	function handrolled(){
	var namesearchjs = document.getElementById('nameSearch').value;
	//alert(namesearchjs);
	
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange= function(){
		if(xhr.readyState==4){
			//alert(xhr.responseText);
			document.getElementById("resultshere").innerHTML = xhr.responseText;
			}
		}
	xhr.open('GET','searchresults.php?nameSearch=' + namesearchjs,true);
	xhr.send(null);
	}
	</script>
	
	<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.2.min.js">
	</script>
	<script type="text/javascript">
	$(document).ready(function (){
	

		$("#jqueryroller").click(function(){
		var namesearchjq = $('#nameSearch').val();
		//alert(namesearchjq);
			
			$("#resultshere").load("searchresults.php?nameSearch="+ namesearchjq);
		
			
		});
	});
	
	</script>
	
</head>

<body>
	<div class="header">
			<div class="container">
			<div class="row">
			  <div class="col-md-12">
				 <div class="header-left">
					 <div class="logo">
						<a href="index.html"><img src="../img/logo.png" alt=""/></a>
					 </div>
					 <div class="menu">
						    <ul class="nav" id="nav">
						    	<li><a style= "font-size:28px" href="index.php">Home</a></li>
						    	<li class="current"><a style= "font-size:28px" href="loginaccount.php">Your Profile</a></li>
						    	<li><a style= "font-size:28px" href="logout.php">Sign out</a></li>

							<div class="clear"></div>
							</ul>
				    </div>							
	    		    <div class="clear"></div>
	    	     </div>
				</div>
			</div>
	    </div>
	</div>
<div class="main">
		<section class="searchform cf">
			<form action="searchresults.php" method="get">
			<ul>
				<li>
				<label>Search </label>
				<input id="nameSearch" type="text" name="nameSearch"  />
				<input type="button" value="Submit Using Ajax" onclick="handrolled();"/>
				<input id="jqueryroller" type="button" value="Submit Using JQuery" />
				</li>
				<div id="resultshere" ></div>
			</ul>
			</form>
		</section>

	<div class="container">
	<h3>Hello <?php echo $login_session; ?></h3> 
	<div class="message">
		<h3 style="color: gray">Say something special today...</h3>
		
		<form action="updatevalue.php" method="post">
			<div class="text">
			<textarea type="text" name="message">Profile Message:</textarea>
			
				<div class="form-submit">
					<input type="submit" value="submit">
				</div>
			<?php echo $_SESSION['update_msg'];?>
			</div>
		</form>
	</div>
	<div class="showmessage">
			<div class="text">
				<h3 style="color: gray">Here is what you wrote before (At:<?php echo $_SESSION['show_date'];?>):</h3>
				<textarea type="text" value="ShowMessage" name="showmessage"> <?php echo $_SESSION['show_message'];?> </textarea>
			</div>
	<h4>Click <a href="logout.php">here </a>to Sign Out</h4>
	</div>
	
		<div class="showfriends">
			<div class="text">
				<h3 style="color: gray">All friends are listing here:</h3>
			</div>
			<ul><?php echo $_SESSION['show_friend'];?></ul>
		</div>
		<div class="showusername">
			<div class="text">
				<h3 style="color: gray">All users are listing here:</h3>
						</div>
			<ul><?php echo $_SESSION['show_username'];?> </ul>
		</div>
		<div class="viewmsg">
			<div class="text">
			<h3 style="color: gray">What your friends wrote before:</h3>
			<textarea type="text" name="viewessage"> <?php echo $_SESSION['view_msg'];?> </textarea>
			</div>
		</div>
		
		
	</div>

</div>
</body>
</html>
