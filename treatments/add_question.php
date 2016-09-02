<?php   

require('../core/boot.php'); 
//echo $_POST['choice'] . $_POST['question'] . $_POST['type'] . $_POST['timer'] . $_SESSION['quiz_id'] . $_POST['NFA'] . $_POST['NRA'] ;

if (isset($_POST) && (!empty($_POST['question']))  && (!empty($_POST['type'])) && (!empty($_POST['timer'])) && (!empty($_SESSION['quiz_id'])))
{extract($_POST);
$idQz=$_SESSION['quiz_id'];

$question = mysql_real_escape_string($question);

$sql="INSERT INTO questions (typesQ, questionQ, timerQ, idQz)
VALUES
('".$type."','".$question."','".$timer."','".$idQz."')" or exit(mysql_error());
$req = 	mysql_query($sql) or die ('ERREUR '.mysql_error());
$idQ = mysql_insert_id();

$answer = mysql_real_escape_string($answer);
if($type==="Fill up")
{
if(!empty($_POST['answer']))


$sql="INSERT INTO answers (typeA, AnswerA, idQ)
VALUES
('RA','".$answer."','".$idQ."')" or exit(mysql_error());
$req = 	mysql_query($sql) or die ('ERREUR '.mysql_error());
}
else
{
for($i=0;$i<$NRA;$i++)
{
$answer="RA$i";
$sql="INSERT INTO answers (typeA, AnswerA, idQ)
VALUES
('RA','".$$answer."','".$idQ."')" or exit(mysql_error());
$req = 	mysql_query($sql) or die ('ERREUR '.mysql_error());
}
for($i=0;$i<$NFA;$i++)
{
$answer="FA$i";
$sql="INSERT INTO answers (typeA, AnswerA, idQ)
VALUES
('FA','".$$answer."','".$idQ."')" or exit(mysql_error());
$req = 	mysql_query($sql) or die ('ERREUR '.mysql_error());
}
}
}
if($_POST['choice']==="Add new Question")
{
header('Location: ../pages/create_quiz_2.php');
}
else
{
header('Location: ../pages/quiz_created.php');
}

?>