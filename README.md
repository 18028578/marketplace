Edited/new files: index.php, search_result.php, cv.php, dbConn.php


What was done:

	-search function that searches through database for items including the search string

	-if "country" filter field is filled, will only show users whose country matches or includes the string

	-clicking on search will post the form to search_result.php

	-search_result.php will display all the search results

	-pages are not implemented, so it will be a long webpage if there are alot of hits

	-clicking on hyperlink of the user's name in the reults will redirect to cv.php

	-cv.php will display the selected user's info in apporiate fields

	-cv.php, skills section is not yet implemented

	-work experience and education uses serialized array, see below for details



Read this:

	-dbConn.php also includes the alert() pop up javascript, can be used for testing

	-on copying the code for the search function, the only bits needed are between line 48 to 55 in index.php

	-import "users.sql" for the users table used

	-users table does not include password at the moment

	-to insert new rows for the table "users" use code below, can also reuse the code for profile page later on

		<?php
		include('dbConn.php');
		// mysql_real_escape_string($conn,$element) to prevent sql injections

		$userid="00000";
		$username="testUser01";
		$firstname="Potato";
		$surname="Salad";
		$email="potatoSalad001@contadel.co.uk";
		$selfIntro="Hello this is test user 001";

		$workExpArr= array();
		array_push($workExpArr,["Job 1","Place 1","2019-04-06","2019-04-06","Job 1 description"]);
		array_push($workExpArr,["Job 2","Place 2","2019-04-06","2019-04-06","Job 2 description"]);
		$workExp=serialize($workExpArr); //to insert serialized array for work

		$educationArr= array();
		array_push($educationArr,["Education 1","Place 1","2019-04-06","2019-04-06","Education 1 description"]);
		array_push($educationArr,["Education 2","Place 2","2019-04-06","2019-04-06","Education 2 description"]);
		$education=serialize($educationArr); //serialized education

		$contactNumber="123456789";
		$dob="2019-04-06";
		$otherHobbies="Hobbies and stuff";
		$country="UK";
		$greeting="Hello world";
		$sql="INSERT INTO users	VALUES(DEFAULT,'$userid','$username','$firstname','$surname','$email',DEFAULT,'$selfIntro','$workExp','$education','$contactNumber','$dob','$otherHobbies','$country','$greeting')";
		if(mysqli_query($conn,$sql)){
		alert("Success");
		}
		else{alert("else");
		alert("Error");
		}
		?>
		
work experience and edcuation array:	

workExperience array

	workExp[[place]]
	
	place[title,place,dateFrom,dateTo,description]
	
education array

	educArr[[degree]]
	
	degree[title,place,dateFrom,dateTo,description]
	



