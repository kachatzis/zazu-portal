<?php

class Maintenance {
	
	public function show_maintenance_page(){
		require 'views/under_maintenance/index.php';
		exit();
	}
}