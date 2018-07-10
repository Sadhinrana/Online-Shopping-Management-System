<?php 
  include("libs/Session.php");
  Session::init();
  include_once("config/Database.php");
  include_once("helpers/Format.php");
  
  spl_autoload_register(function($classes){
	  include_once("classes/".$classes.".php");
  });
  
  $db = new Database();
  $fm = new Format();
  $product = new Product();
  $cart = new Cart();
  $cat = new Category();
  $customer = new Customer();
  
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE HTML>
<head>
<title>Store Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/logo.png" alt="" /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				    <form action="" method="post">
				    	<input type="text" name="keyword" placeholder="Search for Products" required/><input type="submit" name="search" value="SEARCH"/>
				    </form>
			    </div>
			    <div class="shopping_cart">
					<div class="cart">
						<a href="#" title="View my shopping cart" rel="nofollow">
								<span class="cart_title">Cart</span>
								<span class="no_product">
									<?php	
										$getdata = $cart->checkCart();
										if($getdata){
											$sum = Session::getSession("sum");
											echo "$".$sum;
										}else{
											echo "(Empty)";
										}
									?>
								</span>
							</a>
						</div>
			      </div>
		    <div class="login">
				<?php 
				$cmrid = Session::getSession("Id");
				if(isset($_GET['cid'])){					
					$delCt = $cart->delCt();
					$delCmpr = $product->delCmpr($cmrid);
					Session::destroy();
				}
				
				$login = Session::getSession("custLogin");
				if(!$login){
				?>
					<a href="login.php">Login</a>
				<?php 
				}else{
				?>
					<a href="?cid=<?php echo $cmrid;?>">Logout</a>
				<?php }?>
		    </div>
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<?php
 if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['search'])){
	if($_POST['keyword'] == ''){
		echo '<h1 style="text-align:center; margin-bottom:20px; padding:5px 10px" class="error">Search field can not be empty !</h1>';
	}else{
		$keyword = $_POST['keyword'];		
		header("Location:http://localhost/shop/searchedproduct.php?keyword=$keyword");
	}
  }
?>
<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="index.php">Home</a></li>
	  <li><a href="topbrands.php">Top Brands</a></li>
	  <?php	
		$getdata = $cart->checkCart();
			if($getdata){
	  ?>
	  <li><a href="cart.php">Cart</a></li>
	  <li><a href="payment.php">Payment</a></li>
	  <?php }?>
	  <?php	
		$checkOrder = $cart->checkOrder($cmrid);
			if($checkOrder){
	  ?>
	  <li><a href="orderdetails.php">Order</a></li>
	  <?php }?>
	  <?php 
		$login = Session::getSession("custLogin");
			if($login){
	  ?>
	  <li><a href="profile.php">Profile</a></li>
	  <?php 
	  }
	  $getCmprProduct = $product->getCmprProduct($cmrid);
		if($getCmprProduct){
	  ?>
	  <li><a href="compare.php">Compare</a></li>
	  <?php }?>
	  <?php
	  $getwlistProduct = $product->getwlistProduct($cmrid);
		if($getwlistProduct){
	  ?>
	  <li><a href="wishlist.php">Wishlist</a></li>
	  <?php }?>
	  <li><a href="contact.php">Contact</a> </li>
	  <div class="clear"></div>
	</ul>
</div>