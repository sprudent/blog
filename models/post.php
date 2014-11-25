<?php	

class PostModel {

	private $link;

	public function __construct() {
        $this->link = mysqli_connect("127.0.0.1", "root", "\$Hello4475\$", "blogcesi");
    }

	public function listAll() {
		$query  = "SELECT * FROM post"; 
		$result = $this->link->query($query); 

	    $posts = array();
	    while($row = $result->fetch_object()) { 
	        $posts[] = $row;
	    } 
	    return $posts;
	}

	public function get($id) { 
		$query  = "SELECT * FROM post WHERE id=".$id; 
		$result = $this->link->query($query); 
	    return $result->fetch_object();
	}

	public function add($titre, $soustitre, $introduction, $contenu) {

		$titre        = addslashes($titre);
		$soustitre    = addslashes($soustitre);
		$introduction = addslashes($introduction);
		$contenu      = addslashes($contenu);

		$query = "INSERT INTO post(titre, soustitre, introduction, contenu) VALUES('".$titre."','".$soustitre."','".$introduction."','".$contenu."')";
        return $this->link->query($query);
	}

	public function remove($id) {
	    $query = 'DELETE FROM post WHERE id='.$id;
	    return $this->link->query($query);
	}

	public function update($id, $titre, $soustitre, $introduction, $contenu) {
		$titre        = addslashes($titre);
		$soustitre    = addslashes($soustitre);
		$introduction = addslashes($introduction);
		$contenu      = addslashes($contenu);

        $query = "UPDATE post SET titre = '".$titre."', soustitre = '".$soustitre."', introduction = '".$introduction."', contenu = '".$contenu."' WHERE id=".$id;
        return $this->link->query($query);
	}

	public function like($id) {
		$query  = "UPDATE  post SET `like`=`like`+1 WHERE id=".$id; 
		return $this->link->query($query);
	}
}

?>