<?php
session_start();
if(empty($_SESSION))
{
  header("Location: ../login.php");
}
$mpage = "printer";
$page = "list_printer.php";

include '../header.php';
 $email1 = $_SESSION['email'];
 $Vendor_id="SELECT Vendor_id FROM vendors where email = '$email1' ";
	$result=mysqli_query($conn,$Vendor_id);
	$row = mysqli_fetch_row($result);
 
	$sql = "SELECT Vendor_pricing_id, status, printer_name,process,material,color,strength,surface_finish,per_gram_charge,per_hour_charge FROM vendor_pricing where Vendors_Vendor_id= $row[0] and status='active' or status='inactive' ";
						$query = mysqli_query($conn, $sql);
						if (!$query) {
							die ('SQL Error: ' . mysqli_error($conn));
						}
?>
<!DOCTYPE html>

<html>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Printer Lists
   
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Printer</a></li>
        <li class="active">List Printers</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         <div class="box table-responsive no-padding">
            <div class="box-header">
              <h3 class="box-title">List of all Printers</h3>
            </div>
            <!-- /.box-header -->
            <div id="response" class="box-body">
			
              <table id="example1" class="table table-bordered" style="width:100%">
                <thead>
                <tr>
                  <th>ID</th>
                                            <th width="8%">Printer Name</th>
                                            <th>Process</th>
											<th>Material</th>
                                            <th>Color</th>
                                            <th>Strength</th>
                                            <th>Surface Finish</th>
											<th padding>per Gram</th>
                                            <th>per Hour</th>
											<th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
		
		while ($row = mysqli_fetch_array($query))
		{
			$vid=$row['Vendor_pricing_id'];
			$p_name=$row['printer_name'];
			$pro=$row['process'];
			$mat=$row['material'];
			$color=$row['color'];
			$type=$row['strength'];
			$sur=$row['surface_finish'];
			$p_gram=$row['per_gram_charge'];
			$p_hour=$row['per_hour_charge'];
			$st=$row['status']; if ($st=="active"){ $link='inactive'; $color1='success'; $style='white'; $cursor='allowed'; $tip="inactive ur printer";} 
						else { $link='active';$color1='warning'; $style='#EEE'; $cursor='not-allowed'; $tip="activate ur printer";}
		
										 
      	?>
<tr style="background-Color:<?php echo $style;?>; cursor: <?php echo $cursor;?>;">
					<form method="post">
					<td><?php echo $vid;?>
					<input type="hidden" value="<?php echo $vid;?>" name="v_id">
					</td>
					<td><?php echo $p_name;?></td>
					<td><?php echo $pro;?></td>
					<td><?php echo $mat;?></td>
					<td><?php echo $color;?></td>
					<td><?php echo $type;?></td>
					<td><?php echo $sur;?></td>
					
                    
				
                    <button type="delete" name="delete" value="<?php echo $vid;?>" id="<?php echo $vid ?>"  type="submit" class="btn-warning"  onclick="archiveFunction(this.id)">Delete</button>

					 </td>
					 
					</tr>
					 </form>	
<script type="text/javascript">
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});

$('#reloadpage').click(function() {
 
    location.reload(true);
 
});

function archiveFunction(id) {
event.preventDefault(); // prevent form submit
var form = event.target.form; // storing the form
        swal({
  title: "Are you sure?",
  text: "But you will still be able to retrieve this file.",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, Delete it!",
  cancelButtonText: "No, cancel please!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm){
  if (isConfirm) {
	  window.location.href="delete.php?delete_id="+id;
    swal("Updated!", "Your imaginary file has been Deleted.", "success");   

  } else {
    swal("Cancelled", "Your file is safe :)", "error");
  }
});
}
 

</script>
	
		
		</tbody>
        </table>
       </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
</div>
</html>