<!DOCTYPE html>
<html>
<?php //connection to database, as of now its root but it would probably be better to create a new user account with minimum priveliges 
include('dbConn.php');

if(isset($_GET['userId'])&&is_numeric($_GET['userId'])){
$id = $_GET['userId'];
$sql='SELECT * FROM users WHERE userId='.$id. ' LIMIT 1';
$result = mysqli_query($conn, $sql);
$searchResult=mysqli_fetch_assoc($result);
mysqli_free_result($result);
mysqli_close($conn);
}
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>CV - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient">
        <div class="container"><a class="navbar-brand logo" href="#">Contadel</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navbarNav">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="projects-grid-cards.html">Login</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="cv.html">Sign up</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="hire-me.html">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page cv-page">
        <section class="portfolio-block block-intro border-bottom">
            <div class="container">
                <div class="avatar" style="background-image:url(&quot;assets/img/avatars/avatar.jpg&quot;);"></div>
                <div class="about-me">
                    <p>Hello! I am <strong><?php echo $searchResult['firstname'] . ' '. $searchResult['surname']?></strong> <p><?php echo $searchResult['selfIntro']//echos first and lastname of the person?></p></p> 
					<a class="btn btn-outline-primary" role="button" href="#">Hire me</a></div>
            </div>
        </section>
        <section class="portfolio-block cv">
            <div class="container">
                <div class="work-experience group">
                    <div class="heading">
					<?php $workExpArr = unserialize($searchResult['workExperience']);
					if(!empty($workExpArr)){ //only do the work experience section if there are applicable items
					?>
                        <h2 class="text-center">Work Experience</h2>
                    </div>
					<?php
					foreach($workExpArr as $expItem){?>
                    <div class="item">
                        <div class="row">
                            <div class="col-md-6">
                                <h3><?php echo $expItem[0]//job title?></h3>
                                <h4 class="organization"><?php echo $expItem[1]//job location?></h4>
                            </div>
                            <div class="col-md-6"><span class="period">
                                    <?php echo $expItem[2].' - '.$expItem[3]//job duration?>
                            </span></div>
                        </div>
                        <p class="text-muted"><?php echo $expItem[4]//work description?></p>
                    </div>
                    <?php }
					} ?>
                </div>
                <div class="education group">
                    <div class="heading">
					<?php $eduArr = unserialize($searchResult['education']);
					if(!empty($eduArr)){ //only do section if there are applicable items
					?>
                        <h2 class="text-center">Education</h2>
                    </div>
					<?php
					foreach($eduArr as $item){?>
                    <div class="item">
                        <div class="row">
                            <div class="col-md-6">
                                <h3><?php echo $item[0]//edu title?></h3>
                                <h4 class="organization"><?php echo $item[1]?></h4>
                            </div>
                            <div class="col-6"><span class="period"><?php echo$item[2].' - '.$item[3]?></span></div>
                        </div>
                        <p class="text-muted"><?php echo $item[4]?></p>
                    </div>
					 <?php }
					} ?>
                </div>
                <div class="group">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="skills portfolio-info-card">
                                <h2>Skills</h2>
                                <h3>Project Management</h3>
                                <div class="progress">
                                    <div class="progress-bar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"><span class="sr-only">100%</span></div>
                                </div>
                                <h3>Project planning</h3>
                                <div class="progress">
                                    <div class="progress-bar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"><span class="sr-only">90%</span></div>
                                </div>
                                <h3>AutoCAD</h3>
                                <div class="progress">
                                    <div class="progress-bar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"><span class="sr-only">80%</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="contact-info portfolio-info-card">
                                <h2>Contact Info</h2>
                                <div class="row">
                                    <div class="col-1"><i class="icon ion-android-calendar icon"></i></div>
                                    <div class="col-9"><span><?php 
									$dob = $searchResult['dob'];
									echo date("d.m.Y",strtotime($searchResult['dob'])) ?></span></div>
                                </div>
                                <div class="row">
                                    <div class="col-1"><i class="icon ion-person icon"></i></div>
                                    <div class="col-9"><span><?php echo $searchResult['firstname'].' '.$searchResult['surname']?></span></div>
                                </div>
                                <div class="row">
                                    <div class="col-1"><i class="icon ion-ios-telephone icon"></i></div>
                                    <div class="col-9"><span><?php echo $searchResult['contactNumber']?></span></div>
                                </div>
                                <div class="row">
                                    <div class="col-1"><i class="icon ion-at icon"></i></div>
                                    <div class="col-9"><span><?php echo $searchResult['email']?></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hobbies group">
                    <div class="heading">
                        <h2 class="text-center">Hobbies</h2>
                    </div>
                    <p class="text-center text-muted"><?php echo $searchResult['otherHobbies']?></p>
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