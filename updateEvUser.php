<html>
	<head>
		<title>Snacks: ProstgreSQL Database Test</title>
	</head>
	<body>       
		<?php
			require_once('AppInfo.php');

			// Enforce https on production
			if (substr(AppInfo::getUrl(), 0, 8) != 'https://' && $_SERVER['REMOTE_ADDR'] != '127.0.0.1') {
			  header('Location: https://'. $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
			  exit();
			};

			require_once('sdk/src/facebook.php');

			$facebook = new Facebook(array(
			  'appId'  => AppInfo::appID(),
			  'secret' => AppInfo::appSecret(),
			  'sharedSession' => true,
			  'trustForwarded' => true,
			));

			$user_id = $facebook->getUser();

			include 'DBVars.php'; 
			$titledata = $_GET["title"];
			$datedata = $_GET["date"];
			$data = $_GET["to"];
			echo $data[0];
			echo $titledata;
			echo $datedata;
			$db = pg_connect($gDB_conn_string); 
			if (!$db) {
				die("Error in connection: " . pg_last_error());
				} {
					// create a new event and take away the eventID
				// assume we have a database connection named "connection"
				$stmt = "INSERT INTO hackathon.events (title, bydate) values ($1, $2 )"; 
				$query = pg_prepare($db, "my_query", $stmt);
				$result = pg_execute($db, "my_query", array($titledata,$datedata)); 

			  // get the postgresql serial field value with this query
				$stmt = "select currval('events_eventid_seq')";
				$query = pg_query($db, $stmt);
				$result = pg_execute($db, "my_query1");
				$row = pg_fetch_array($result);
				$eventID = $row["eventID"];
				  
								

				foreach ($data as $a){
					$stmt = "INSERT INTO hackathon.evUser (userID, eventID) values ($1,$2);"; 
					$query = pg_prepare($db, "my_query3", $stmt);
					$result = pg_execute($db, "my_query3", array($a, $eventID));	
				}

				$stmt = "INSERT INTO hackathon.evUser (userID, eventID) values ($1,$2);"; 
					$query = pg_prepare($db, "my_query4", $stmt);
					$result = pg_execute($db, "my_query4",array($user_id, $eventID));	
				// Try to make a connection 

				if (!$result) {
					die("Error in SQL query: " . pg_last_error());
				}       

				// wrap up
				pg_free_result($result);       
				pg_close($db);
			}
		?>       
	</body>
</html>