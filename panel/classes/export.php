<?php


class export extends db{

// call export function



// export csv


public function exportMysqlToCsv($filename = '$file',$from_table)
{

  
    $sql_query = "SELECT * FROM $from_table ORDER BY 1 DESC";

    // Gets the data from the database
    $result = $this->connect()->query($sql_query);

    $f = fopen('php://temp', 'wt');
    $first = true;
    $rows = $result->fetchAll();
    
    	foreach ($rows as $row) {
    		 if ($first) {
            fputcsv($f, array_keys($row));
            $first = false;
        }
        fputcsv($f, $row);
    	}
       
  

    

    $size = ftell($f);
    rewind($f);

    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Content-Length: $size");
    // Output to browser with appropriate mime type, you choose ;)
    header("Content-type: text/x-csv");
    header("Content-type: text/csv");
    header("Content-type: application/csv");
    header("Content-Disposition: attachment; filename=$filename");
    fpassthru($f);
    exit;

}

}

?>