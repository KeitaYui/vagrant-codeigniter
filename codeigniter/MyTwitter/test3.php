<html>
<head><title>test</title></head>
<body>
	<?php
//mySQL�ɂ���MyTwitterIDPW��UserIDPW�e�[�u������f�[�^���擾����
//����ɐV�����f�[�^����͂���
		ini_set('display_errors', 1);
		$link = mysql_connect('localhost','root','');
		if(!$link){
			print('error with connect sql</br>');
		}
		
		$db_selected = mysql_select_db('MyTwitterIDPW',$link);
		if(!$db_selected){
			print('error with select db</br>');
		}
		
		mysql_set_charset('tf8');
		
		/*�f�[�^�ǂݍ���*/
		$result = mysql_query('SELECT * FROM UserIDPW');
		if(!$result){
			print('error with query select</br>');
		}
		
		while($row = mysql_fetch_assoc($result)){
			print('<p>');
			print('id ='.$row['ID'].'</br>');
			print('pass = '.$row['PW']);
			print('</br></p>');
		}
		/**/
		
		/*�V�K�f�[�^����
		$insert = mysql_query("INSERT INTO UserIDPW(ID,PW) VALUES('newface',11111)");
		if(!$insert){
			print('error with query insert</br>');
		}
		*/
		
		/*�f�[�^�X�V*/
		$sql = sprintf("UPDATE UserIDPW SET PW = '9922' WHERE ID ='keita'");
		$update = mysql_query($sql);
		if(!$update){
			print('error with query update</br>');
		}
		
		$closeflag = mysql_close($link);
		if(!$closeflag){
			print('error with close sql</br>');
		}
	?>
</body>
</html>