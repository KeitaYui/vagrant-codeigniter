<html>
<head>
<title>MainPage</title>

<style type="text/css">
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
<textarea id = "textarea" cols = "50" rows = "1" name = "textform"></textarea>
<input type = "button" id = "tweetbutton" value = "tweet">
</form>

</br>
Login ID: 
<?php
    echo $this->session->userdata('ID');
?>

<a id="test"></a>
<div id='tweetresult'></div>

<script type = "text/javascript" src = "<?php echo base_url('js/jquery-1.9.1.min.js');?>"></script>
<script type = "text/javascript">

var userID        = "<?php echo $this->session->userdata('ID');?>";
var lastTweetNum  = 0;
var browserHeight = $(window).height();
var jsondata      = new Array();

$("#tweetbutton").click(function(){
    tweetsave();
});

$("#textarea").keydown(function(e){
    if((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)){
        tweetsave();
    }
});


$(window).scroll(function(){
    var scrollTop         = $(document).scrollTop();
    var tweetresultHeight = $("#tweetresult").height();
    var tweetresultOffset = $("#tweetresult").offset().top;
    if((tweetresultOffset + tweetresultHeight) < (scrollTop + browserHeight)){
        tweetload(jsondata, 3);
    }
});

$(document).ready(function (){
    $.getJSON("<?php echo base_url('index.php/mytwitter_main_controller/tweetload/'); ?>"+ "/" + userID + "/",function(data){
        jsondata     = data;
        lastTweetNum = data[0].num;
        tweetload(jsondata, 5);
    });
});

function tweetsave(){
    var val = $("#textarea").val().replace(/\n/g, "");
    var str = $('<div/>').text(val).html();
    if(str != ""){
        $.post("tweetsave",{text:str, ID:userID},function(){
            $("#test").append(" posted! ");
            $("#tweetresult").prepend("</br>*" + str + "</br>----------------------------------------------------</br>");
        });
    }
    $("#textarea").val("");
}

function tweetload(data, j){
    for(var i = 0; i < j; i++){
        if(lastTweetNum > 0){
            $("#tweetresult").append("</br>*" + data[lastTweetNum].tweet + "</br>----------------------------------------------------</br>");
            lastTweetNum--;
        }
    }
}

</script>

</body>
</html>