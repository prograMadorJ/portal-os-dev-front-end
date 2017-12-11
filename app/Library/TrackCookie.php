<?php

namespace App\Library;

class TrackCookie {

	private $expiration_time;

	public function __construct() {
		$this->expiration_time = ((3600*24)*4); // 3600 = 1hora * 24 (um dia) * 4 (dias)
		if (isset($_GET['utm_source'])) {
			$this->salvaCookie();
		} else {
			// if($_SERVER['REMOTE_ADDR']=='186.210.169.77'){
				// dd($_SERVER["HTTP_REFERER"].' || SEU IP: '.$_SERVER['REMOTE_ADDR'].' - '.$_COOKIE["origURL"]);
				// die();
			// }
			if (!isset($_COOKIE["origURL"])) {
				if (isset($_SERVER["HTTP_REFERER"]) && $_SERVER["HTTP_REFERER"]) {
					$referer = 	$_SERVER["HTTP_REFERER"];
				} else {
					$referer = 	$_SERVER["HTTP_HOST"];
				}

				setcookie(
					"origURL",
					$referer,
					time()+$this->expiration_time,
					"/",
					".direitodeouvir.com.br"
				);
			}
		}
	}

	public function salvaCookie() {
		if(isset($_GET['utm_source'])) {
			setcookie(
				"utm_source",
				$_GET['utm_source'],
				time()+$this->expiration_time,
				"/",
				".direitodeouvir.com.br"
			);
		}
		if(isset($_GET['utm_campaign'])) {
			setcookie(
				"utm_campaign",
				$_GET['utm_campaign'],
				time()+$this->expiration_time,
				"/",
				".direitodeouvir.com.br"
			);
		}
		if(isset($_GET['utm_medium'])) {
			setcookie(
				"utm_medium",
				$_GET['utm_medium'],
				time()+$this->expiration_time,
				"/",
				".direitodeouvir.com.br"
			);
		}
		if(isset($_GET['utm_term'])) {
			setcookie(
				"utm_term",
				$_GET['utm_term'],
				time()+$this->expiration_time,
				"/",
				".direitodeouvir.com.br"
			);
		}
		if(isset($_GET['utm_content'])) {
			setcookie(
				"utm_content",
				$_GET['utm_content'],
				time()+$this->expiration_time,
				"/",
				".direitodeouvir.com.br"
			);
		}
	}
}

?>
