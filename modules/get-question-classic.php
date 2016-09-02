<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/test_classic.js"></script>
<?php
include_once( '../core/boot.php' );

if($_POST)
{
	$searchName = $_POST['searchName'];
	$sql = mysql_query("SELECT * FROM questions WHERE IdQz = '$searchName'") or die(mysql_error());
	while($row = mysql_fetch_array($sql))
	{
		extract($row);

		if ($row['typesQ'] == "Multiple choice") 
		{
			echo '<div class="box"> <div class="questionMC"> <h2>'.$questionQ.'</h2> </div>';
			$sql2=("SELECT AnswerA, typeA
			FROM answers WHERE IdQ = '".$row['IdQ']."'");
			$req2 = mysql_query($sql2) or die ('ERREUR '.mysql_error());
			echo'<ul id="options">';
			$answer='';
			while ($data = mysql_fetch_assoc($req2))
			{
				echo'<li class="question">'.$data['AnswerA'].'</li>';
				if($data['typeA']=="RA")
					$answer = $answer.' '.$data['AnswerA'];
					
			}
			
			echo '<input type="hidden" name="answer" value="'.htmlentities($answer).'" id="answer"/>';
			echo '</ul>';
		}
		else
		{
			echo '<div class="box"> <div class="questionFU"> <h2>'.$questionQ.'</h2> </div>';
			$sql2=("SELECT AnswerA, typeA
			FROM answers WHERE IdQ = '".$row['IdQ']."'");
			$req2 = mysql_query($sql2) or die ('ERREUR '.mysql_error());
			$data = mysql_fetch_assoc($req2);
			
			echo '<input type="hidden" name="answer" value="'.htmlentities($data['AnswerA']).'" id="answer"/>';
			
			echo "<textarea name='fill_up_area'></textarea>";
			//echo '<input type="hidden" name="answer" value="'.htmlentities($data['AnswerA']).'" id="answer"/>';
		}
		echo '</div><!-- end box -->';
	}
}

?>