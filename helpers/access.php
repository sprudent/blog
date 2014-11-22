<?php

	class AccessHelper {

		public static function isConnected() {
			return isset($_SESSION['user']);
		}

		public static function isAdmin() {
			return isset($_SESSION['user']) && $_SESSION['user']->admin;
		}
	}

?>