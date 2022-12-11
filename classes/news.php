<?php


class homepage extends db{

public function GetNews(){


	$sql = "SELECT * FROM news LIMIT 10";
		$stmt = $this->connect()->query($sql);

		while ($row = $stmt->fetch()) {
			$NewsTitle = $row['title'];
			$NewsId = $row['id'];
			$NewsImage = $row['cover_file'];
			$NewsDate = friendlyTime($row['date']);
			echo '<a href="single.php?id='.$NewsId.'"><div class="media border rounded-0 border-info" style="margin-bottom: 11px;background-color: #e0e0e0;"><img class="img-thumbnail img-fluid mr-3" width="200" src="panel/images/news/'.$NewsImage.'">
                        <div class="media-body">
                            <h5>'.$NewsTitle.'</h5>
                            <p class="text-dark"><i class="far fa-clock"></i><em>'.$NewsDate.'</em></p>
                        </div>
                    </div></a>';
		}
	}
}




?>