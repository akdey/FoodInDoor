<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		/* Style the logform */
		#loginForm, #regForm {
		  background-color: #D3D3D3;
		  margin: 100px auto;
		  padding: 40px;
		  width: 70%;
		  min-width: 300px;
		}

		/* Style the input fields */
		input {
		  padding: 10px;
		  width: 100%;
		  font-size: 17px;
		  font-family: Raleway;
		  border: 1px solid #aaaaaa;
		}

		/* Mark input boxes that gets an error on validation: */
		input.invalid {
		  background-color: #ffdddd;
		}

		/* Hide all steps by default: */
		.tab {
		  display: none;
		}

		/* Make circles that indicate the steps of the form: */
		.step {
		  height: 15px;
		  width: 15px;
		  margin: 0 2px;
		  background-color: #bbbbbb;
		  border: none; 
		  border-radius: 50%;
		  display: inline-block;
		  opacity: 0.5;
		}

		/* Mark the active step: */
		.step.active {
		  opacity: 1;
		}

		/* Mark the steps that are finished and valid: */
		.step.finish {
		  background-color: #4CAF50;
		}

		.log-ri8{
			float: right;
			width: 50%;
		}

		.log-lft{
			float: left;
			width: 50%;
			align-content: center;
		}

		.log-lft button{
			width: 60%;
			height: 40px;
			margin-top: 10%;
		}
		#reg-sub{
			display: none;
			padding: 1px 0px;
			align-items: flex-start;
		    text-align: center;
		    cursor: default;
		    color: buttontext;
		    background-color: buttonface;
		    box-sizing: border-box;
		    border-width: 2px;
		    border-style: outset;
		    border-color: buttonface;
		    border-image: initial;
		    width: 52px;	
		    font-size: 13.3px;
		}
	</style>
</head>
<body>

<!-- Login Form-->
<form id="loginForm" method="POST">
  <h1>ODF</h1>
  <div class="log-lft"><button type="button" id="signup" >Sign Up</button></div>
  <div class="log-ri8">
  <p><input placeholder="Username..." name="nameuser" oninput="this.className = ''"></p>
  <p><input placeholder="Password..." name="passuser" oninput="this.className = ''"></p>
  <input type="submit" id="signin" name="signin" value="Sign In">
  </div>
</form>

<!--Register Form-->
<form id="regForm" method="POST" >

<h1>Register:</h1>

<!-- One "tab" for each step in the form: -->

<div class="tab">Name:
  <p><input placeholder="First name..." name="fname" id="fnm" oninput="this.className = ''"></p>
  <p><input placeholder="Last name..." name="lname" id="lnm" oninput="this.className = ''"></p>
</div>

<div class="tab">Contact Info:
  <p><input placeholder="E-mail..." name="mail" id="mail" oninput="this.className = '' "></p>
  <p><input placeholder="Phone..." name="ph_no" id="ph_no" oninput="this.className = '' "></p>
</div>

<div class="tab">Login Info:
  <p><input placeholder="Username..." id="usernm" name="usernm" oninput="this.className = ''"></p>
  <p><input placeholder="Password..." id="pass" name="pass" oninput="this.className = ''"></p>
</div>

<div style="overflow:auto;">
  <div style="float:right;">
    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    <input type="submit" name="reg-sub" id="reg-sub">
  </div>
</div>

<!-- Circles which indicates the steps of the form: -->
<div style="text-align:center;margin-top:40px;">
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
</div>

</form>




<!-- PHP -->
<?php 
	$con = mysqli_connect("localhost","root","","test-case-3");
	session_start();
	$_SESSION['user_id']=0;
	 
	if(isset($_POST['reg-sub'])){
		$sql = "INSERT INTO users(user_name, user_pass, user_email, user_date, first_name, last_name, ph_no) VALUES('" . mysqli_real_escape_string($con,$_POST['usernm']) . "','" . sha1($_POST['pass']) . "','" . mysqli_real_escape_string($con,$_POST['mail']) . "',NOW(),'" . mysqli_real_escape_string($con,$_POST['fname']) . "','" . mysqli_real_escape_string($con,$_POST['lname']) . "','" . mysqli_real_escape_string($con,$_POST['ph_no']) . "')";
		if(!$qry = mysqli_query($con,$sql)){
		echo("Error description: " . mysqli_error($con));}
		else{
			echo "<script>alert('You have been registered sucessfully!! Please login to continue..');</script>";
		}
	}
	if(isset($_POST['signin'])){
		$usersname =  mysqli_real_escape_string($con,$_POST['nameuser'])  ;
		$pasuser =  sha1($_POST['passuser']) ;
		$siginsql = "SELECT * FROM users WHERE user_name='$usersname' and user_pass='$pasuser'";
		$qrysigin = mysqli_query($con,$siginsql);
		$norows = mysqli_num_rows($qrysigin);			
			if($norows == 1){
				while($resigin = mysqli_fetch_assoc($qrysigin)){
					$_SESSION['user_id'] = $resigin['user_id'];
					$_SESSION['username'] = $resigin['user_name'];
					$_SESSION['fname'] = $resigin['first_name'];
					$_SESSION['lname'] = $resigin['last_name'];
					$_SESSION['email'] = $resigin['user_email'];
					$_SESSION['phno'] = $resigin['ph_no'];
				}
				echo "<script>window.location.href='index.php'</script>";
			}
			else{
				echo "<script>alert('Incorrect username or password');</script>";	
			}
		/*if(!$resigin){
		echo("Error description: " . mysqli_error($con));}
		else{
			echo "sucess!";
		}*/

	}

?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">

/*JS for regForm hide */
$(document).ready(function(){
	$("#regForm").hide();
});

/*JS for LoginForm hide and regForm to show*/
$("#signup").click(function(){
	$("#regForm").show();
	$("#loginForm").hide();
});

/*JS for regForm */	
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:


  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").style.display = "none";
    document.getElementById("reg-sub").style.display = "inline";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}

</script>
</body>
</html>