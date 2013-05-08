<?php
  $json = file_get_contents("tweets.json");
  $data = json_decode($json,true);
  $userfoundflag = 0;
  
  foreach($data as $key => $user){
  	if($user['ID'] == $_POST['ID']){
		array_push($data[$key]['tweet'],array("str"=>$_POST['text']));
		$data[$key]['maxNum']++;

		$encode = json_encode($data);
		header("Content-Type: application/json");
		echo $encode;
  
		$fp = fopen("tweets.json","w");
		fwrite($fp,$encode);
		fclose($fp);
		
		$userfoundflag = 1;
		break;
  	}
  }
  if($userfoundflag == 0){
  		$insert_tweet = array();
  		$insert_tweet[0] = array("test"=>9999);
  		$insert_tweet[1] = array("str"=>$_POST['text']);
  		$insert = array("ID"=>$_POST['ID'],"maxNum"=>1,"tweet"=>$insert_tweet);

  		array_push($data,$insert);

		$encode = json_encode($data);
		header("Content-Type: application/json");
		echo $encode;
		
  		$fp = fopen("tweets.json","w");
		fwrite($fp,$encode);
		fclose($fp);
		$userfoundflag = 0;
  }
?>