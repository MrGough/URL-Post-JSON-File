<?php
	
	# POST JSON FILE TO URL
	function POST_JSON($DATA)
	{
		# DEBUGGER CREDENTIALS
		$USERNAME = $DATA[1];
		$PASSWORD = $DATA[2];
		
		# JSON FILE TO POST
		$PAYLOAD = JSON_ENCODE($Data[0]);
		
		# PREPARE NEW CURL RESOURCE
		$ch = CURL_INIT($Data[1]);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLINFO_HEADER_OUT, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $PAYLOAD);
		curl_setopt($ch, CURLOPT_USERPWD, "$USERNAME:$PASSWORD");
		
		# SET HEADER FOR POST REQUEST
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				'Content-Length: ' . STRLEN($PAYLOAD))
		);
		
		# SUBMIT POST REQUEST
		$RESULT = CURL_EXEC($ch);
		
		# CLOSE SESSION
		CURL_CLOSE($ch);
	}

?>
