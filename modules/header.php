<header>
	<section id="logo">
		<a href="../pages/index.php"><img src="../design/images/logo.jpg" hight="100%" width="100%" alt="" title="" border="0" /></a>
	</section>
	<?php	
		if(!isset($_SESSION['login']))
		{
			// session has NOT been started
			Navigation("off");
		}
		else
		{
			// session has been started
			Navigation("on");
		}
	?>
	
</header>