<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	if(isset($_POST['submit']))
	{		
		$title=$_POST['title'];
        $email=$_POST['email'];
        $message=$_POST['message'];

	  
		$sql ="INSERT INTO message(title, email, message ) VALUES(:title, :email, :message)";
		$query = $dbh->prepare($sql);
		$query-> bindParam(':title', $title, PDO::PARAM_STR);
        $query-> bindParam(':email', $email, PDO::PARAM_STR);
		$query-> bindParam(':message', $message, PDO::PARAM_STR);

	
		$query->execute();
		$msg=" send  Successfully";
  }    


 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>OrangeAcademy</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
<div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <?php include('includes/loding.php');?>




        <!-- Sidebar -->
        <?php include('includes/leftbar.php');?>
        


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?php include('includes/header.php');?>
      

            <!-- Navbar End -->


            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
          
     
            <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Message</h6>
                            <form method="post">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title"   required>
                                   
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label">To</label>
                                    <select class="form-select mb-4" aria-label="Default select example" name="email" required>
                                    <option selected>Select Email Job Cotch</option>
                                                       				
<?php $sql = "SELECT email from  cotch ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>
                            <option value="<?php echo htmlentities($result->email);?>"><?php echo htmlentities($result->email);?></option>
                            <?php $cnt=$cnt+1; }} ?>
                            </select>                                   
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Message</label>
                                    <textarea class="form-control" placeholder="Write A Message here"
                                    id="floatingTextarea" style="height: 250px;" name="message" required></textarea>                                   
                                </div>
                                <br>
                                <div align="right">
                                <button type="submit" name="submit" class="btn btn-primary">Send</button> 
</div>
                            </form>
                        </div>
                    </div>
<br>

            <!-- Footer Start -->
   
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
<?php } ?>