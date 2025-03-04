<?php
session_start();
error_reporting(0);
include('../config/config.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else{
   $pid=intval($_GET['id']);// product id
if(isset($_POST['submit']))
{
	$productname=$_POST['productName'];


function resizeImage($resourceType,$image_width,$image_height,$resizeWidth,$resizeHeight) {
    // $resizeWidth = 100;
    // $resizeHeight = 100;
    $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
    imagecopyresampled($imageLayer,$resourceType,0,0,0,0,$resizeWidth,$resizeHeight, $image_width,$image_height);
    return $imageLayer;
}
$imageProcess = 0;
    if(is_array($_FILES)) {
        $new_width = 200;
        $new_height = 200;

        $new_width11 = 500;
        $new_height11 = 500;

        $new_width111 = 50;
        $new_height111 = 50;

        $fileName = $_FILES['productimage2']['tmp_name'];
        $sourceProperties = getimagesize($fileName);
        $resizeFileName = time();
        $uploadPath = "productimages/$pid/";
        $fileExt = pathinfo($_FILES['productimage2']['name'], PATHINFO_EXTENSION);
        $uploadImageType = $sourceProperties[2];
        $sourceImageWidth = $sourceProperties[0];
        $sourceImageHeight = $sourceProperties[1];
        switch ($uploadImageType) {
            case IMAGETYPE_JPEG:
                $resourceType = imagecreatefromjpeg($fileName); 
                $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,$new_width,$new_height);
                imagejpeg($imageLayer,$uploadPath."thump2_".$resizeFileName.'.'. $fileExt);

                $imageLayer11 = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,$new_width11,$new_height11);
                imagejpeg($imageLayer11,$uploadPath."thump12_".$resizeFileName.'.'. $fileExt);

                $imageLayer111 = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,$new_width111,$new_height111);
                imagejpeg($imageLayer111,$uploadPath."thump122_".$resizeFileName.'.'. $fileExt);
                break;

            case IMAGETYPE_GIF:
                $resourceType = imagecreatefromgif($fileName); 
                $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,$new_width,$new_height);
                imagegif($imageLayer,$uploadPath."thump2_".$resizeFileName.'.'. $fileExt);

                 $imageLayer11 = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,$new_width11,$new_height11);
                imagejpeg($imageLayer11,$uploadPath."thump12_".$resizeFileName.'.'. $fileExt);

                $imageLayer111 = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,$new_width111,$new_height111);
                imagejpeg($imageLayer111,$uploadPath."thump122_".$resizeFileName.'.'. $fileExt);
                break;

            case IMAGETYPE_PNG:
                $resourceType = imagecreatefrompng($fileName); 
                $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,$new_width,$new_height);
                imagepng($imageLayer,$uploadPath."thump2_".$resizeFileName.'.'. $fileExt);

                 $imageLayer11 = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,$new_width11,$new_height11);
                imagejpeg($imageLayer11,$uploadPath."thump12_".$resizeFileName.'.'. $fileExt);

                $imageLayer111 = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,$new_width111,$new_height111);
                imagejpeg($imageLayer111,$uploadPath."thump122_".$resizeFileName.'.'. $fileExt);
                break;

            default:
                $imageProcess = 0;
                break;
        }
        move_uploaded_file($fileName, $uploadPath. $resizeFileName. ".". $fileExt);
        $imagesize200_1= "thump2_".$resizeFileName. ".". $fileExt;
        $imagesize350_1="thump12_".$resizeFileName.'.'. $fileExt;
        $imagesize50_1="thump122_".$resizeFileName.'.'. $fileExt;
        $sql=mysqli_query($con,"update  products set productImage2='$imagesize200_1',productResizeImage2='$imagesize350_1',productResizeImage50_2='$imagesize50_1' where id='$pid' ");
        $imageProcess = 1;

        $_SESSION['msg']="Product Image Updated Successfully !!";
    }

}


?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="theme-color" content="#3e454c">

	<?php $query=mysqli_query($con,"SELECT * FROM genaralsetting where id=9");
    while($row=mysqli_fetch_array($query)) 
    {
     ?>
	<meta name="description" content="<?php echo htmlentities($row['setting_description']);?>"><?php }?>
	<?php $query=mysqli_query($con,"SELECT * FROM genaralsetting where id=10");
    while($row=mysqli_fetch_array($query)) 
    {
     ?>
  	<meta name="keywords" content="<?php echo htmlentities($row['setting_description']);?>"><?php }?>

  	<?php $query=mysqli_query($con,"SELECT * FROM genaralsetting where id=11");
    while($row=mysqli_fetch_array($query)) 
    {
     ?>
     <link rel="shortcut icon" type="image/x-icon" href="../images/favicon/<?php echo htmlentities($row['setting_description']);?>"/><?php }?>
	
	<?php $query=mysqli_query($con,"SELECT * FROM genaralsetting where id=1");
    while($row=mysqli_fetch_array($query)) 
    {
     ?>  
    <title><?php echo htmlentities($row['setting_description']);?></title><?php }?>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
<style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>
</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Change Slider Banner</h2>

						<div class="row">
							<div class="col-md-12">
								<p><a href="edit-product.php?id=<?php echo $pid;?>"><< back to Genaral Setting</a></p>
								<div class="panel panel-default">
									<div class="panel-heading"> Slider Banner</div>

									<div class="panel-body">
<form enctype="multipart/form-data"  method="post" name="profile" class="form-horizontal" >
	 
                      <?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>

<?php 

$query=mysqli_query($con,"select productName,productImage2 from products where id='$pid'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
  


?>                          

<div class="form-group">
<label class="col-sm-2 control-label">Product Name <span style="color:red">*</span></label>
<div class="col-sm-10">
<input type="text"  class="form-control"  name="productName"  readonly value="<?php echo htmlentities($row['productName']);?>" class="span8 tip" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Current Product Image1 <span style="color:red">*</span></label>
<div class="col-sm-10">
<img src="productimages/<?php echo htmlentities($pid);?>/<?php echo htmlentities($row['productImage2']);?>" width="200" height="100"> 
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">New Product Image1 <span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="file" name="productimage2" id="productimage2" value="" class="form-control" required>
</div>
</div>


<div class="hr-dashed"></div>



<div class="form-group">
<div class="col-sm-4">
</div>
<div class="col-sm-4">
<?php } ?>
</div>
</div>








											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2">
													<button class="btn btn-default" type="reset">Cancel</button>
													<button class="btn btn-primary" name="submit" type="submit">Save changes</button>
												</div>
											</div>

										</form>
									</div>
								</div>
							</div>
						</div>
						
					

					</div>
				</div>
				
			

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php } ?>