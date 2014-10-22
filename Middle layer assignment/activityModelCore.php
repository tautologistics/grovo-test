<?php
	// Do not modify this file
	abstract class activityModelCore {
		
		// Process data from client request
		abstract function processEventRequest($data);
		
		// Log user activity
		public function saveUserEvent($data) {
			// Imaginary call to a data store which understands SQL:
			// $success = query('Insert into userEvent (userId, eventType, timestamp) Values($data['userId'], $data['type'], Now())')
			$success = true; // Placeholder return value for purposes of this test
			return $success;
		}
	}
?>