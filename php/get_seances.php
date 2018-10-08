  <?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

class MyStruct {
    public $foo;
    public $bar;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

         $dbhost = "localhost";
         $dbuser = "root";
         $dbpass = "gregorie";
	 $conn = new mysqli($servername, $username, $password, $dbname);
      
         if(! $conn ) {
            die('Could not connect: ' . mysql_error());
         }
         
         echo "Connected successfully";
 	 $conn->close();

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
		echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
	    }
	} else {
	    echo "0 results";
	}
	$conn->close();


    $response = array();
    if(!$mail->Send()) { 
        $response['result'] = "failed";
    } 
    else {
      $response['result'] = "success";
    }
    
    echo json_encode($response);

}

?>
