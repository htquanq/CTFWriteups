<?php
	$dataset = [
		0 => ['Blaklis', 'The flag is INS{snip}.'],
		1 => ['Lambda guy', 'We don\'t have anything interesting to say'],
		2 => ['Lambda guy 2', 'We still do not say anything interesting'],
		3 => ['Lambda guy 3', 'PHP is the best language ever!']
	];


	$block = (function($request) {
		$blocked = FALSE;
		$keywords = ['_', 'admin=', '\'', '"', '[', ']', '\\', " ", chr(9),chr(10),chr(11),chr(12),chr(13),chr(133),chr(160),"%"];
		foreach($keywords as $keyword)
			if(strpos(urldecode($request),$keyword) !== FALSE)
				$blocked = TRUE;
		return ($_SERVER['REMOTE_ADDR'] === '127.0.0.1') ? FALSE : $blocked;
	})($_SERVER['REQUEST_URI']);
	!$block?:die('Die by the WAF1!');
	
	if($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['is_admin'] == 1) {
		$data = str_replace(" ","",file_get_contents("php://input"));
		$datablock = (function($post_data) {
			$blocked = (strlen($post_data) > 30 || !($a = json_decode($post_data)));
			return $blocked;
		})($data);
		!$datablock?:die('Die by the WAF2!');
		$a = (array)json_decode($data);

		if(isset($a['userid']) && ($a['userid'] != 0 || $_SERVER['REMOTE_ADDR'] === '127.0.0.1')) {
			if(isset($dataset[$a['userid']])) {
				echo "It's name is ".$dataset[$a['userid']][0]." and he would like to say : ".$dataset[$a['userid']][1];
				exit;
			}
		}
	}

	die('Die by... nothing?');
