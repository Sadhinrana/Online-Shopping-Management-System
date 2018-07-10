<?php 
	include 'inc/header.php';
	include 'inc/sidebar.php';
	include("../classes/Brand.php");
	
	$brand = new Brand();
	
	if(isset($_GET['delbrand'])){
		if($_GET['delbrand'] == NULL){
			echo "<script>window.location = 'brandlist.php';</script>";
		}else{
			$id = $_GET['delbrand'];
			$deleteBrand = $brand->deleteBrand($id);
		}
	}	
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Brand List</h2>
                <div class="block"> 
				<?php
				if(isset($deleteBrand)){
					echo $deleteBrand;
				}
				?>
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Brand Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$getAllBrand = $brand->getAllBrand();
						if($getAllBrand){
							$i =0;
							while($result = $getAllBrand->fetch_assoc()){
								$i++;
					?>
						<tr class="odd gradeX">
							<td><?php echo $i?></td>
							<td><?php echo $result['brandname'];?></td>
							<td><a href="brandedit.php?id=<?php echo $result['id'];?>">Edit</a> || <a onclick="return confirm('Are you sure want to delete this data')" href="?delbrand=<?php echo $result['id'];?>">Delete</a></td>
						</tr>
					<?php }}?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>

