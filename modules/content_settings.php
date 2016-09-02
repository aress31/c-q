<script type="text/javascript" src="../js/jquery.js"></script>
<script>
$(function(){
	$('.edit').click(function(){            
	$(this).prev().prop('disabled',false).siblings('input[type=text]').prop('disabled',true);
	});
	
	$('.save').click(function(){            
    $(this).prev().prev().prop('disabled',true);
	});
	
	$('.bouton_save_all').click(function(){   
		var pwd = document.getElementById('pwd').value;
		var email = document.getElementById('email').value;
		var firstname = document.getElementById('firstname').value;
		var lastname = document.getElementById('lastname').value;
		var birthday = document.getElementById('birthday').value;
		var phone_number = document.getElementById('phone_number').value;
		var address = document.getElementById('address').value;
		var security_question = document.getElementById('security_question').value;
		var security_answer = document.getElementById('security_answer').value;
		window.location.href = "../modules/save_all_settings.php?pwd="+pwd+"&email="+email+"&firstname="+firstname+"&lastname="+lastname+"&birthday="+birthday+"&phone_number="+phone_number+"&address="+address+"&security_question="+security_question+"&security_answer="+security_answer;
	});

})





</script>

<section class="center_content">

	<hr width = "95%" size = "1" color = "#B52025"/>

	<?php
		$login = $_SESSION['login'];
		$requete = mysql_query("SELECT * FROM users, profils WHERE users.idP = profils.idP AND login LIKE '$login'")or die(mysql_error());
		$donnees = mysql_fetch_array($requete);
	?>
	<article class="settings_left_content">
		<h1>Settings</h1>
		<h3>Admin</h3>
		<hr width = "100%" size = "1" color = "#BFBFBF"/><br>
		<img src="../design/images/profile_photo_df.jpg" alt="" title="" class="settings_avatar_icon" border="0">
		<a href="" style="color:#999999"><p>Change profile picture</p></a>
		<br><br>
		<h4>Login :</h4>
		<span class="text_edit">
		<?php
				echo $login;
		?></span><br><br><br>
		<h4>Password :</h4><input type="password" id="pwd"  class="text_edit" value="<?php echo $donnees['password']; ?>" disabled="disabled">
		<a class="edit">Edit</a> | <a class="save">	Save</a><br><br><br>
		<h4>Email :</h4><input type="mail" id="email" name="text" class="text_edit" value="<?php echo $donnees['email']; ?>" disabled="disabled">
		<a  class="edit">Edit </a> | <a  class="save">	Save</a><br><br><br>
		
		
	</article>
	
	<article class="settings_right_content">
		<br><br>
		<h4>Firstname :</h4><input type="text" id="firstname"  class="text_edit" value="<?php echo $donnees['firstname']; ?>" disabled="disabled">
		<a  class="edit">Edit</a> | <a  class="save">	Save</a><br><br><br>
		<h4>Lastname :</h4><input type="text" id="lastname" class="text_edit" value="<?php echo $donnees['lastname']; ?>" disabled="disabled">
		<a  class="edit">Edit</a> | <a  class="save">	Save</a><br><br><br>
		<h4>Birthday :</h4><input type="text" id="birthday" class="text_edit" value="<?php echo $donnees['birthday']; ?>" disabled="disabled">
		<a  class="edit">Edit</a> | <a  class="save">	Save</a><br><br><br>
		<h4>Phone number :</h4><input type="text" id="phone_number" class="text_edit" value="<?php echo $donnees['phone']; ?>" disabled="disabled">
		<a  class="edit">Edit</a> | <a  class="save">	Save</a><br><br><br>
		<h4>Address :</h4><input type="text" id="address" class="text_edit" value="<?php echo $donnees['address']; ?>" disabled="disabled">
		<a  class="edit">Edit</a> | <a  class="save">	Save</a><br><br><br>
		<h4>Security Question :</h4><input type="text" id="security_question" class="text_edit" value="<?php echo $donnees['securityQuestion']; ?>" disabled="disabled">
		<a  class="edit">Edit</a> | <a  class="save">	Save</a><br><br><br>	
		<h4>Security Answer :</h4><input type="text" id="security_answer" class="text_edit" value="<?php echo $donnees['securityAnswer']; ?>" disabled="disabled">
		<a  class="edit">Edit</a> | <a  class="save">	Save</a><br><br><br>
		
		
		<input type="button" class="bouton_save_all" value="Save all" />

	</article>
	
	
	
</section>