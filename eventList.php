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
			}

			require_once('sdk/facebook.php');

			$facebook = new Facebook(array(
			  'appId'  => AppInfo::appID(),
			  'secret' => AppInfo::appSecret(),
			  'sharedSession' => true,
			  'trustForwarded' => true,
			));

			$user_id = $facebook->getUser();

			include 'DBVars.php'; 
			echo "\nConnection string >" . $gDB_conn_string . "<" . "\n<p>\n"; 
			
			// Try to make a connection 
			$db = pg_connect($gDB_conn_string); 
			if (!$db) {
				die("Error in connection: " . pg_last_error());
			}       

			// Create and run a query 
			$stmt = "SELECT events.eventID, title".
					" FROM hackathon.events as events".
					" INNER JOIN hackathon.evUser as evUser".
					" ON events.eventID = evUser.eventID".
					" WHERE userID  = $1";
			echo "The SQL query >" . $stmt . "<\n<p>\n";
			$query = pg_prepare($db, "my_query", $stmt);
			$result = pg_execute($db, "my_query", array($user_id));
			if (!$result) {
				die("Error in SQL query: " . pg_last_error());
			}       

			// Show some snacks
			while ($row = pg_fetch_array($result)) {
				echo "eventID " . $row["eventID"] . " (" . $row["title"] . ") has " . $row["bydate"] . " calories!<br/>\n";
			}       

			// wrap up
			pg_free_result($result);       
			pg_close($db);
		?>       
	</body>
</html>