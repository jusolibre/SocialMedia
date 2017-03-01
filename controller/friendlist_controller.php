<?
require_once('Class/class_connect.php');

Class friendlist {

    function index() {
        $db = new Database('socialmedia');
        $friendlist = $db->findFriends();
        
    }
    
}

?>