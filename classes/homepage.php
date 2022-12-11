<?php


class homepage extends db{

public function GetNews(){


	$sql = "SELECT * FROM news LIMIT 10";
		$stmt = $this->connect()->query($sql);

		while ($row = $stmt->fetch()) {
			$NewsTitle = $row['title'];
			$NewsId = $row['id'];
			$NewsImage = $row['cover_file'];
			$NewsDate =  FriendlyTimeAgo($row['date'], date("Y-m-d H:i:s"));
			echo '<a href="single.php?id='.$NewsId.'"><div class="media border rounded-0 border-info" style="margin-bottom: 11px;background-color: #e0e0e0; color:blue;"><img style="width:200px;height:120px;" class="img-thumbnail img-fluid mr-3" width="200" src="panel/images/news/'.$NewsImage.'">
                        <div style"color:gold; class="media-body">
                            <h5 ">'.$NewsTitle.'</h5>
                            <p class="text-dark"><i class="far fa-clock"></i><em>'.$NewsDate.'</em></p>
                        </div>
                    </div></a>';
		}
	}
	//getting Events
	public function GetEvents(){


		$sql = "SELECT * FROM events LIMIT 9";
		$stmt = $this->connect()->query($sql);

		while ($row = $stmt->fetch()) {
			$EventTitle = $row['name'];
			$EventVenue = $row['venue'];
			$EventId = $row['id'];
			$EventDescription = $row['description'];
			
		$EventDate =  new DateTime($row['started']);
		$year = $EventDate -> format('Y');
$month = $EventDate -> format('m');
$day = $EventDate -> format('d');
			echo ' <div class="row"  >
        <div class="col-sm-12 col-sm-offset-2"  >
            <ul class="event-list"  >
                <li>
                    <time  datetime="2014-07-20" >
                        <span class="day">'.$day.'</span>
                        <span class="month">'.$month.'</span>
                        
                        
                    </time>
                    
                    <div class="info">
                        <h2 class="title">'.$EventTitle.'</h2>
                        <p class="desc">'.$EventVenue.'</p>
                        <small>'.$EventDescription.'</small>
                    </div>
                </li>
            </ul>
        </div>
    </div>';
		}





	}


//getting programmes
	public function GetCourses(){


		$sql = "SELECT * FROM programmes LIMIT 9";
		$stmt = $this->connect()->query($sql);

		while ($row = $stmt->fetch()) {
			$name = $row['name'];
			$CourseCover = $row['cover_file'];

			echo '
 
  
                <div class="media"><img style="width:100px;" class="img-thumbnail img-fluid mr-3" src="panel/images/courses/'.$CourseCover.'" />
                    <div class="media-body" style="width: 100%;max-width: 100%;">
                        <h6>'.$name.'</h6>
                    </div>
                </div>
          
			';

	
		}


	}


	public function HomeSlider(){
$sql = "SELECT * FROM homepage_slider order by rand() LIMIT 5";
		$stmt = $this->connect()->query($sql);
$row = $stmt->fetch();
$sliderFile = $row['file_name'];
$name = $row['name'];
$Description = $row['description'];


echo '<div class="carousel-item active" >
                        <div style="background-image: url(&quot;panel/images/homepage_slider/'.$sliderFile.'&quot;);" class="jumbotron pulse animated hero-nature carousel-hero">
                            <h1 style="margin-top:300px;" class="hero-title"></h1>
                            <p> <h6 style="background: -webkit-linear-gradient(-90deg,skyblue,blue); opacity: 0.7;" class="text-gold dark hero-subtitle">'.$Description.'</h6></p>
                            
                        </div>
                    </div>';
		while ($row = $stmt->fetch()) {
			$name = $row['name'];
$Description = $row['description'];

			$sliderFile = $row['file_name'];
echo '<div class="carousel-item active" >
                        <div style="background-image: url(&quot;panel/images/homepage_slider/'.$sliderFile.'&quot;);" class="jumbotron pulse animated hero-nature carousel-hero">
                            <h1 style="margin-top:300px;" class="hero-title"></h1>
                            <p> <h6 style="background: -webkit-linear-gradient(-90deg,skyblue,blue); opacity: 0.7;" class="text-gold dark hero-subtitle">'.$Description.'</h6></p>
                            
                        </div>
                    </div>';



	}}

}




?>