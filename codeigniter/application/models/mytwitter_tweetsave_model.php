<?php
class Mytwitter_tweetsave_model extends CI_Model{

    public function tweetsave($userID,$tweet)
    {
        $time = getdate();
        $sql = "INSERT INTO TweetLog(userID,tweet,time) VALUES(?,?,?)";
        $this->db->query( $sql, array( $userID, $tweet, $time[0]));
    }
    
    public function tweetload($userID){
    	$sql = "SELECT * FROM TweetLog WHERE userID = ? ORDER BY time ASC";
    	$query = $this->db->query( $sql, array($userID));
    	return $query;
    }

    function __construct()
    {
      parent::__construct();
    }
}

?>