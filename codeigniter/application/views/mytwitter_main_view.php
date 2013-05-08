<html>
<head>
<title>MainPage</title>

<style>
textarea{
	position:fixed;
}
input{
	position:fixed;
	left:400;
}
</style>

</head>
<body>

<form>
<textarea id="textarea" cols="50" rows="1"></textarea>
<input type ="button" id="tweetbutton" value="tweet">
</form>

</br>
Login ID: 
<?php
	if(isset($_SESSION["ID"])){
		echo $_SESSION["ID"];
	}
?>
<a id="test"></a>
<div id='tweetresult'></div>

<script type="text/javascript" src="<?php echo base_url('js/jquery-1.9.1.min.js');?>"></script>
<script type="text/javascript">

var userID = "<?php echo $_SESSION['ID'];?>";
var lastTweetNum = 0;
var browserHeight = $(window).height();

$("#tweetbutton").click(function(){
	var str = $("#textarea").val();
	$.post("<?php echo base_url('js/tweetsave.php');?>",{text:str,ID:userID},function(json){
		$("#test").append(" posted! ");
		$("#tweetresult").prepend("</br>*" + str + "</br>----------------------------------------------------</br>");
		$("#textarea").val("");
	});
});


$(window).scroll(function(){
	var scrollTop = $(document).scrollTop();
	var tweetresultHeight = $("#tweetresult").height();
	var tweetresultOffset = $("#tweetresult").offset().top;
	if((tweetresultOffset + tweetresultHeight) < (scrollTop + browserHeight)){
		$.getJSON("<?php echo base_url('js/tweets.json');?>", function(data){
			for(var i in data){
				if(data[i].ID == userID){
					for(var j = 0;j < 5;j++){
						if(lastTweetNum > 0){
							$("#tweetresult").append("</br>*" + data[i].tweet[lastTweetNum].str + "</br>----------------------------------------------------</br>");
							lastTweetNum--;
						}
					}
				}
			}
		});
	}
	
	
});

$(document).ready(function () {
	$.getJSON("<?php echo base_url('js/tweets.json');?>", function(data){
		for(var i in data){
			if(data[i].ID == userID){
				lastTweetNum = data[i].maxNum;
				for(var j = 0;j < 5;j++){
					if(lastTweetNum > 0){
						$("#tweetresult").append("</br>*" + data[i].tweet[lastTweetNum].str + "</br>----------------------------------------------------</br>");
						lastTweetNum--;
					}
				}
			}
		}
	});
});
</script>

</body>
</html>