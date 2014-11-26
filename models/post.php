<?php	

require_once("entities/post.php");
require_once('models/user.php');

class PostModel {

	private $link;
	private $userModel;

	public function __construct() {
        $this->link = mysqli_connect("127.0.0.1", "root", "\$Hello4475\$", "blogcesi");
        $this->userModel = new UserModel();
    }

	public function listAll() {
		$query  = "SELECT * FROM post"; 
		$result = $this->link->query($query); 

	    $posts = array();
	    
	    while($row = $result->fetch_object()) { 
			$posts[] = $this->getPostEntity($row);
	    } 
	    return $posts;
	}

	public function get($id) { 
		$query     = "SELECT * FROM post WHERE id=".$id; 
		$result    = $this->link->query($query); 
		$row       = $result->fetch_object();
		
		return $this->getPostEntity($row);
	}

	public function add($title, $subtitle, $introduction, $content) {

		$title        = addslashes($title);
		$subtitle     = addslashes($subtitle);
		$introduction = addslashes($introduction);
		$content      = addslashes($content);

		$query = "INSERT INTO post(title, subtitle, introduction, content, date) VALUES('".$title."','".$subtitle."','".$introduction."','".$content."','".date('Y-m-d',time())."')";
        return $this->link->query($query);
	}

	public function remove($id) {
	    $query = 'DELETE FROM post WHERE id='.$id;
	    return $this->link->query($query);
	}

	public function update($id, $title, $subtitle, $introduction, $content) {
		$title        = addslashes($title);
		$subtitle     = addslashes($subtitle);
		$introduction = addslashes($introduction);
		$content      = addslashes($content);

        $query = "UPDATE post SET title = '".$title."', subtitle = '".$subtitle."', introduction = '".$introduction."', content = '".$content."' WHERE id=".$id;
        return $this->link->query($query);
	}

	public function like($id) {
		$query  = "UPDATE  post SET `like`=`like`+1 WHERE id=".$id; 
		return $this->link->query($query);
	}

	private function getPostEntity($row) {
		$id           = $row->id;
		$title        = $row->title;
		$subtitle     = $row->subtitle;
		$introduction = $row->introduction;
		$content      = $row->content;
		$authorName   = $this->userModel->get($row->id)->login;
		$like         = $row->like;
		$date         = $row->date;

		return new Post($id, $title, $subtitle, $introduction, $content, $authorName, $like, $date);
	}
}

?>