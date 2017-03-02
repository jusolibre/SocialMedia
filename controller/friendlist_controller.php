<?
require_once(SQL . '/model_user_class.php');

Class friendlist {

    function index() {
        $db = new userDatabase('socialmedia');
        $friendlist = $db->findFriends();
        
    }
    
}

?>