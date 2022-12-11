<?php





$sql = "SELECT * FROM site_ LIMIT 10";
		$stmt = $this->connect()->query($sql);

		$row = $stmt->fetch());
$siteName = $row['name'];






}