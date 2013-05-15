<html>
<head><title>Login</title></head>
<body>
LOGIN</br>
<?php
    echo form_open('mytwitter_login_controller/loginsession');
?>
ID:<input type="text" name="loginID" value=""></br>
PW:<input type="password" name="loginPW" value=""></br>
<input type="submit" name="login" value="LOGIN">
</form>

</body>
</html>