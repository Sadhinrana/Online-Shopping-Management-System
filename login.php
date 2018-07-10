<?php 
	include("inc/header.php");

	if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["login"])){		$customerLogin = $customer->customerLogin($_POST);
	}

	$login = Session::getSession("custLogin");
	if($login){
		header("Location:orderdetails.php");
	}
?>	

 <div class="main">
    <div class="content">
    	 <div class="login_panel">
		 <?php 
			if(isset($customerLogin)){
				echo $customerLogin;
			}
		 ?>
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
        	<form action="" method="post">
                	<input name="username" type="text" placeholder="E-mail">
                    <input name="password" type="password" placeholder="Password">
					<p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
                    <div class="buttons"><div><button class="grey" name="login">Sign In</button></div></div>
                    </div>
                 </form>
                 
		<?php 
			if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["register"])){		
				$customerReg = $customer->customerReg($_POST);
			}
		?>
    	<div class="register_account">
		<?php 
			if(isset($customerReg)){
				echo $customerReg;
			}
		?>
    		<h3>Register New Account</h3>
    		<form action="" method="post">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Name">
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="City">
							</div>
							
							<div>
								<input type="text" name="zip-code" placeholder="Zip-code">
							</div>
							<div>
								<input type="text" name="e-mail" placeholder="E-mail">
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Address">
						</div>
		    		<div>
						<select id="country" name="country" onchange="change_country(this.value)" class="frm-field required">
							<option value="null">Select a Country</option>         
							<option value="Afghanistan">Afghanistan</option>
							<option value="Albania">Albania</option>
							<option value="Algeria">Algeria</option>
							<option value="Argentina">Argentina</option>
							<option value="Armenia">Armenia</option>
							<option value="Aruba">Aruba</option>
							<option value="Australia">Australia</option>
							<option value="Austria">Austria</option>
							<option value="Azerbaijan">Azerbaijan</option>
							<option value="Bahamas">Bahamas</option>
							<option value="Bahrain">Bahrain</option>
							<option value="Bangladesh">Bangladesh</option>

		         </select>
				 </div>		        
	
		           <div>
		          <input type="text" name="phone" placeholder="Phone">
		          </div>
				  
				  <div>
					<input type="text" name="pass" placeholder="Password">
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><button name="register"class="grey">Create Account</button></div></div>
		    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

 <?php include("inc/footer.php");?>	

