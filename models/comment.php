<?php	

require_once('entities/comment.php');

class CommentModel {

	private $link;

	public function __construct() {
        $this->link = mysqli_connect("127.0.0.1", "root", "\$Hello4475\$", "blogcesi");
    }

	public function listAll() {
		$query  = "SELECT * FROM comment"; 
		$result = $this->link->query($query); 

	    $posts = array();
	    while($row = $result->fetch_object()) { 
	        $comments[] = $row;
	    } 
	    return $comments;
	}

	public function listByPost($postId) { 

		require_once('models/post.php');
		require_once('models/user.php');

		$query  = "SELECT * FROM comment WHERE id_post=".$postId; 
		$result =    $this->link->query($query); 
	    
		$comments  = array();
		$postModel = new PostModel();
		$userModel = new UserModel();
		while($row = $result->fetch_object()) {
			$id         = $row->id;
			$content    = $row->content;
			$postTitle  = $postModel->get($postId)->titre;
			$authorName = $userModel->get($row->id_user)->login;
			$date       = $row->date;
			$comment    = new Comment($id, $postTitle, $authorName, $content, $date);
			$comments[] = $comment;
	    } 
	    return $comments;
	}

	public function add($postId, $userId, $content) {

		$content = addslashes($content);

		$query = "INSERT INTO comment(id_user, id_post, content, date) VALUES('".$userId."','".$postId."','".$content."','".time()."')";
        return $this->link->query($query);
	}
}

?>