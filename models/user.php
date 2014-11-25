<?php	

class UserModel {

	private $link;

	public function __construct() {
        $this->link = mysqli_connect("127.0.0.1", "root", "\$Hello4475\$", "blogcesi");
    }

	// return false if no user found, else return user infos
	public function authenticate($login, $password) { 
		$query  = "SELECT * FROM user WHERE login='$login' AND password='$password'"; 
		$result = $this->link->query($query);
		if(!$result) {
			return false;
		} else {
			return $result->fetch_object();
		}
	}

	public function get($id) {
		$query  = "SELECT * FROM user WHERE id=$id"; 
		$result = $this->link->query($query);
		return $result->fetch_object();
	}
}

?>