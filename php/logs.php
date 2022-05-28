<?php
	function mustBlock() {
	//Return true if IP address has had more than 5 attempts to log in within an hour.
		$count = 0;
		$log = fopen('./errors.log', 'r') or die('Log file could not be opened.');
		
		while (!feof($log)) {
			//Get a line from the log
			$entry = fgets($log);
			//Check it is not empty
			if ($entry != "" || $entry != null) {
				//Put all sections into an array
				$info = explode('"', $entry);
				
				if (count($info) == 5) {
					//Get the day and time, as well as the IP address
					$date = $info[0];
					$address = $info[4];
					$date = trim($date, '[] ');
					$address = trim($address);
				
					//If the time the log was recorded was less than an hour ago
					if ((time() - strtotime($date)) < 3601) {
						//If the IP addresses are the same
						if ($address == $_SERVER['REMOTE_ADDR']) {
							//Increase the count of how many incorrect login attempts occured for the current IP address
							$count++;
						}
					}
				}
			}
		}
		//If there were 5 or more incorrect logins, return that it must be blocked
		if ($count > 4) {
			return true;
		}
		fclose($log);
		return false;
	}

?>