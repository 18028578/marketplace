<!DOCTYPE html>
<html>
<?php 
include('dbConn.php');
//connection to database, as of now its root but it would probably be better to create a new user account with minimum priveliges 

if(isset($_POST['searchQueryInput'])){
//alert($_POST['searchQueryInput']); // checking if input recieved

$searchQueryInput=$_POST['searchQueryInput'];
$likeString = "\"%".$searchQueryInput."%\"";

$sql='SELECT userId, username, firstname, surname, email, dateJoined, country, greeting, contactNumber FROM users WHERE userName LIKE'.$likeString.'OR firstname LIKE'.$likeString. 'OR surname LIKE'.$likeString
. 'OR email LIKE'.$likeString. 'OR greeting LIKE'.$likeString;
//alert($sql);
$result = mysqli_query($conn, $sql);
$searchResult=mysqli_fetch_all($result,MYSQLI_ASSOC); //gets the matching result where the column contains the search string

mysqli_free_result($result);
mysqli_close($conn);
}
?>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Searchresult - Contadel php</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
</head>

<body>
    <main class="page lanidng-page">
        <section class="portfolio-block block-intro">
            <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient">
                <div class="container"><a class="navbar-brand logo" href="#">Contadel</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse"
                        id="navbarNav">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item" role="presentation"><a class="nav-link active" href="index.php">Home</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="loginpages/login.html">Login</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="loginpages/register.html">Sign up</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="hire-me.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container" style="width:98%;">
                 <div class="list">
            <ol>
			<?php if($_POST['country']!=null&&$_POST['country']!=''){ //where a country filter is present
				foreach($searchResult as $person){ if(strtolower($person['country'])==strtolower($_POST['country'])){?>
			<li> 
				<div align="left">
				<span style="display:block;font-weight: bold;"><?php echo "<a href=\"cv.php?userId=".$person['userId']."\">".$person['firstname'] . ' ' . $person['surname']. "</a>"; ?></span>
                <span><?php echo $person['email']?></span>
				<br/>
				<span><?php echo $person['country']?></span>
				<br/>
                <span><?php echo 'Joined since: '. $person['dateJoined']?></span>
				<br />
				<br />
               </div>
              </li>
			<?php }}}else foreach($searchResult as $person){ //else if no country filter ?> 
			<li>
				<div align="left">
				<span style="display:block;font-weight: bold;"><?php echo "<a href=\"cv.php?userId=".$person['userId']."\">".$person['firstname'] . ' ' . $person['surname']. "</a>"; ?></span>
                <span><?php echo $person['email']?></span>
				<br/>
			<span><?php echo $person['country']?></span>
				<br/>
                <span><?php echo 'Joined since: '. date("d.m.Y",strtotime($person['dateJoined']))?></span>
				<br />
				<br />
               </div>
              </li>
			<?php } ?>
            </ol>
            
          </div>
              </div>
        </section>
    
        
    </main>
    <footer class="page-footer">
        <div class="container">
            <div class="links"><a href="#">About us</a><a href="#">Contact&nbsp;</a><a href="#"></a></div>
            <div class="social-icons"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-instagram-outline"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a></div>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>