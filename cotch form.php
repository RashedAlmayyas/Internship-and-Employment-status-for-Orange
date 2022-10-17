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
		$email=$_POST['email'];
		$name=$_POST['name'];
		$phone=$_POST['phone'];
		$pass=$_POST['pass'];
		$ac1=$_POST['ac1'];
        $num_co1=$_POST['num_co1'];
        $ac2=$_POST['ac2'];
        $num_co2=$_POST['num_co2'];
	  
		$sql ="INSERT INTO cotch(email,name, phone, pass, ac1, num_co1, ac2, num_co2) VALUES(:email, :name, :phone, :pass, :ac1, :num_co1, :ac2, :num_co2)";
		$query = $dbh->prepare($sql);
		$query-> bindParam(':email', $email, PDO::PARAM_STR);
		$query-> bindParam(':name', $name, PDO::PARAM_STR);
		$query-> bindParam(':phone', $phone, PDO::PARAM_STR);
		$query-> bindParam(':pass', $pass, PDO::PARAM_STR);
		$query-> bindParam(':ac1', $ac1, PDO::PARAM_STR);
        $query-> bindParam(':num_co1', $num_co1, PDO::PARAM_STR);
        $query-> bindParam(':ac2', $ac2, PDO::PARAM_STR);
        $query-> bindParam(':num_co2', $num_co2, PDO::PARAM_STR);

		$query->execute();
		$msg=" add  Successfully";


        
  }  
  if(isset($_POST['submit']))
  {		
     
      $name=$_POST['name'];
      $email=$_POST['email'];
      $pass=$_POST['pass'];
     
    
      $sql ="INSERT INTO user(name,email,  pass, rols) VALUES( :name, :email, :pass, 2)";
      $query = $dbh->prepare($sql);
      $query-> bindParam(':name', $name, PDO::PARAM_STR);
      $query-> bindParam(':email', $email, PDO::PARAM_STR);
      $query-> bindParam(':pass', $pass, PDO::PARAM_STR);

      $query->execute();
      $msg=" add  Successfully";


      
}    


 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DarkPan - Bootstrap 5 Admin Template</title>
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
      



            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Form Add Job Cotch</h6>
                            <form method="post">
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-4">
                                        <input type="email" name="email" class="form-control" id="inputEmail3" required>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Academy Name</label>
                                    <div class="col-sm-4">
                                <select class="form-select mb-3" aria-label="Default select example" name="ac1" required>
                                    <option selected>Select Academy</option>
                                 				
<?php $sql = "SELECT * from  academy ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>
                            <option value="<?php echo htmlentities($result->name);?>"><?php echo htmlentities($result->name);?></option>
                            <?php $cnt=$cnt+1; }} ?>
                            </select>
                                    </div>
                                </div>
                             
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name Job Cotch</label>
                                    <div class="col-sm-4">
                                    <input type="text" class="form-control" id="inputEmail3" name="name" required>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Number of Cohort</label>

<div class="col-sm-4">
   <select class="form-select mb-3" aria-label="Default select example" name="num_co1" required>
       <option selected>Select Number of Cohort </option>
       <option value="1">One</option>
       <option value="2">Two</option>
       <option value="3">Three</option>
                                    </select>
</div>
</div>
<div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Phone</label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" id="inputEmail3" name="phone" required>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Academy Name</label>
                                    <div class="col-sm-4">
                                <select class="form-select mb-3" aria-label="Default select example" name="ac2">
                                    <option selected>Select Academy</option>
                                                       				
<?php $sql = "SELECT * from  academy ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>
                            <option value="<?php echo htmlentities($result->name);?>"><?php echo htmlentities($result->name);?></option>
                            <?php $cnt=$cnt+1; }} ?>
                            </select>
                                    </div>
                                </div>
                             
                                <div class="row mb-3">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-4">
                                        <input type="password" class="form-control" id="inputPassword3" name="pass" required>
                                                                          </div>
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Number of Cohort</label>

<div class="col-sm-4">
   <select class="form-select mb-3" aria-label="Default select example" name="num_co2">
       <option selected>Select Number of Cohort </option>
       <option value="1">One</option>
       <option value="2">Two</option>
       <option value="3">Three</option>
                                    </select>
</div>
</div>                        
                                                              <div class="col-sm-12" align="center">
                                                              <button type="submit" name="submit"class="btn btn-primary" >Add</button>
</div>
                                                            
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Job Cotch Table</h6>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Job Cotch</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Academy Name</th>
                                        <th scope="col">Number of Cohort</th>

                                    </tr>
                                </thead>
                                <tbody>
                                <?php $sql = "SELECT * from  cotch";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>	
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($result->name);?></td>
                                            <td><?php echo htmlentities($result->email);?></td>
                                            <td><?php echo htmlentities($result->phone);?></td>
                                            <td><?php echo htmlentities($result->ac1) ?></td>
                                            <td><?php  echo htmlentities($result->num_co1) ;?> </td>
                                            <?php $cnt=$cnt+1; }} ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form End -->


          
           
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
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