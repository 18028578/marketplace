<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php //connection to database, as of now its root but it would probably be better to create a new user account with minimum priveliges 
$conn=mysqli_connect('localhost','marketplaceRoot','root','marketplace');

function alert($msg) { //alert for testing
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

if(isset($_POST['searchQueryInput'])){
//alert($_POST['searchQueryInput']); // checking if input recieved

$searchQueryInput=$_POST['searchQueryInput'];
$likeString = "\"%".$searchQueryInput."%\"";
alert($likeString);
$sql='SELECT userId, userName, userSurname, userEmail, createdAt FROM users WHERE userName LIKE'.$likeString;
$result = mysqli_query($conn, $sql);
$searchResult=mysqli_fetch_all($result,MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);
}
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Contadel Results</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- Link to CSS -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
        <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
            <link href="loginpages/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
            <style type="text/css">
    /* Style the tab */
  .tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  }
  
  /* Style the spans inside the tab */
  .tab span {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
  }
  
  /* Change background color of spans on hover */
  .tab span:hover {
  background-color: #ddd;
  }
  
  /* Create an active/current tablink class */
  .tab span.active {
  background-color: #ccc;
  }
  
  /* Style the tab content */
  .tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
  table.fancy {
  margin: 1em 1em 1em 0;
  background: whitesmoke;
  border-collapse: collapse;
}
}
table {
  margin: 1em 1em 1em 0;
  background: whitesmoke;
  border-collapse: collapse;
}
table th, table td {
  border: 1px silver gainsboro;
  padding: 0.2em;
}
table th {
  background: gainsboro;
  text-align: left;
}
table tr:hover td {
   background: mintcream !important;
}
table caption {
  margin-left: inherit;
  margin-right: inherit;
}
thead{
font-weight: bold;
text-align: center;
}
/* LIST #2 */

 ol { font-style:italic; font-family:Georgia, Times, serif; font-size:24px;  }
ol li { border-width: thin;}
ol li span { padding:8px; font-style:normal; font-family:Arial; font-size:13px; }


  </style>
            
            
            <!-- Add icon library -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
            
            <!-- Link to main javascript file for various functions-->
            <script type="text/javascript">
//file upload tab function: 
function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none"; //hide all other tabs
            }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
   
}



function openSimpleTab(event, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tabcontent.length; i++) {
        tablinks[i].classList.remove("active");
    }
    document.getElementById(tabName).style.display = "block";
    event.currentTarget.classList.add("active");
}


</script>
            <!-- Link to javascript file for form validation-->
            
  </head>
  <body>
    
    <div id="outer">
      <div id="wrapper">
        
      </div> 
    </div>
    <div id="body">
      <div id="body-inner">
        
        <div class="tab">
          <span class="tablinks" onclick="openTab(event, 'list')">List View</span>
          <span class="tablinks" onclick="openTab(event, 'map')">Map View</span>
          <span class="tablinks" onclick="openTab(event, 'table')">Table View</span>
        </div>   
        <div id="list" class="tabcontent" style="display:block;">     
          
          <div class="refine">
            <span class="searchsort">Sort By: <select id="searchsort" name="sort">
              <option value="1" selected="selected">Most relevant</option>
              <option value="2">Nearest me</option>
              <option value="3" title="Most feedback">Most feedback</option>
              <option value="4" title="Closest feedback to me">Closest feedback to me</option>
              <option value="5" title="Most recent feedback">Most recent feedback</option>
              <option value="6" title="Longest serving member">Longest serving member</option>
            </select>  
              <a class="refine-mobile__trigger" href="#">Refine your search</a>
            </span>
          </div>
          
          <div class="list">
            <ol>
			<?php foreach($searchResult as $person){?>
			<li>
                <span style="display:block;font-weight: bold;"><?php echo $person['userName'] . ' ' . $person['userSurname'];?></span>
                <span><?php echo $person['userEmail']?></span>
                <span><?php echo 'Joined since: '. $person['createdAt']?></span>
               
              </li>
			<?php } ?>
            </ol>
            
            
          </div>
          
          
          
          
        </div>
        
        <div id="map" class="tabcontent">     
          
          <img src="map.png" alt="" width="100%" height="100%"/>
          
        </div>
        
        <div id="table" class="tabcontent">     
          
          <div class="results-content">
            <div class="search-results-title">Builder in Abingdon</div>
            <div class="refine">
              <span class="searchsort">Sort By: <select id="searchsort" name="sort">
                <option value="1" selected="selected">Most relevant</option>
                <option value="2">Nearest me</option>
                <option value="3" title="Most feedback">Most feedback</option>
                <option value="4" title="Closest feedback to me">Closest feedback to me</option>
                <option value="5" title="Most recent feedback">Most recent feedback</option>
                <option value="6" title="Longest serving member">Longest serving member</option>
              </select>  
                <a class="refine-mobile__trigger" href="#">Refine your search</a>
              </span>
            </div>
            <table class="dataTable" style="font-size:80%">
              <thead>
                <tr>
                  <td width="10%">Name</td>    
                  <td width="10%">Location</td>    
                  <td width="10%">Member since</td>    
                  <td>About</td>    
                  <td width="10%">Rating/Reviews</td>      
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Alex Dubbley</td>    
                  <td>London, UK</td>    
                  <td>2015</td>
                  <td>Builder, Bathrooms, Brick and Concrete Structural Repairs, Brickwork, Groundworks, Wall Tie Replacements, Agricultural Building, Concreting, Flint and Stonework, General Building</td>    
                  <td><span class="rating">9.8</span><span class="review">51</span></td>
                </tr>
                <tr>
                  <td>Ben Lacazette</td>    
                  <td>Manchester, UK</td>    
                  <td>2018</td>
                  <td>I have been in the building trade for 35 years but 15 years ago I decided to set up my own building company. During this time I have worked on many projects, large...</td>    
                  <td><span class="rating">9.8</span><span class="review">51</span></td>
                </tr>
                <tr>
                  <td>Peter Sterling</td>    
                  <td>Oxford, UK</td>    
                  <td>2014</td>
                  <td>I provide a professional service to the highest of standards. Tailoring my services to the customer needs. I pride ourselves in offering more than just window...</td>    
                  <td><span class="rating">9.8</span><span class="review">51</span></td>
                </tr>
                <tr>
                  <td>William Maxius</td>    
                  <td>Birmingham, UK</td>    
                  <td>2012</td>
                  <td>With 10 years of experience. We only provide qualified registered Electricians. Electrical installation, testing and inspection...</td>    
                  <td><span class="rating">8.8</span><span class="review">151</span></td>
                </tr> 
                <tr>
                  <td>Alex Dubbley</td>    
                  <td>London, UK</td>    
                  <td>2015</td>
                  <td>Builder, Bathrooms, Brick and Concrete Structural Repairs, Brickwork, Groundworks, Wall Tie Replacements, Agricultural Building, Concreting, Flint and Stonework, General Building</td>    
                  <td><span class="rating">9.8</span><span class="review">51</span></td>
                </tr>
                <tr>
                  <td>Ben Lacazette</td>    
                  <td>Manchester, UK</td>    
                  <td>2018</td>
                  <td>I have been in the building trade for 35 years but 15 years ago I decided to set up my own building company. During this time I have worked on many projects, large...</td>    
                  <td><span class="rating">9.8</span><span class="review">51</span></td>
                </tr>
                <tr>
                  <td>Peter Sterling</td>    
                  <td>Oxford, UK</td>    
                  <td>2014</td>
                  <td>I provide a professional service to the highest of standards. Tailoring my services to the customer needs. I pride ourselves in offering more than just window...</td>    
                  <td><span class="rating">9.8</span><span class="review">51</span></td>
                </tr>
                <tr>
                  <td>William Maxius</td>    
                  <td>Birmingham, UK</td>    
                  <td>2012</td>
                  <td>With 10 years of experience. We only provide qualified registered Electricians. Electrical installation, testing and inspection...</td>    
                  <td><span class="rating">8.8</span><span class="review">151</span></td>
                </tr> 
                <tr>
                  <td>Alex Dubbley</td>    
                  <td>London, UK</td>    
                  <td>2015</td>
                  <td>Builder, Bathrooms, Brick and Concrete Structural Repairs, Brickwork, Groundworks, Wall Tie Replacements, Agricultural Building, Concreting, Flint and Stonework, General Building</td>    
                  <td><span class="rating">9.8</span><span class="review">51</span></td>
                </tr>
                <tr>
                  <td>Ben Lacazette</td>    
                  <td>Manchester, UK</td>    
                  <td>2018</td>
                  <td>I have been in the building trade for 35 years but 15 years ago I decided to set up my own building company. During this time I have worked on many projects, large...</td>    
                  <td><span class="rating">9.8</span><span class="review">51</span></td>
                </tr>
                <tr>
                  <td>Peter Sterling</td>    
                  <td>Oxford, UK</td>    
                  <td>2014</td>
                  <td>I provide a professional service to the highest of standards. Tailoring my services to the customer needs. I pride ourselves in offering more than just window...</td>    
                  <td><span class="rating">9.8</span><span class="review">51</span></td>
                </tr>
                <tr>
                  <td>William Maxius</td>    
                  <td>Birmingham, UK</td>    
                  <td>2012</td>
                  <td>With 10 years of experience. We only provide qualified registered Electricians. Electrical installation, testing and inspection...</td>    
                  <td><span class="rating">8.8</span><span class="review">151</span></td>
                </tr> 
                
                
              </tbody>
            </tabledataTable>         
          </div>  
        </div>    
      </div>
    </div>
    
  </body>
</html>