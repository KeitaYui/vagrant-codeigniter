<html>
<head><title>Sign up</title></head>
<body>
SIGN UP</br>
<?php
    echo validation_errors();
    echo form_open('mytwitter_signup_controller/signupsession');
?>
ID:<input type="text" name="signupID" value=""></br>
PW:<input type="password" name="signupPW" value=""></br>
<input type="submit" name="signup" value="SIGN UP">
</form>

</body>
</html>