$(function(){

// selecting quiz to start

$('#startquiz').click(function(){
var searchName = $('#quiz_to_start').val();
var searchTimer = $('#quiz_timer').val();

if(window.XMLHttpRequest)
{
xmlhttp = new window.XMLHttpRequest();
}
else
{
xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
}

xmlhttp.onreadystatechange = function() {
if(xmlhttp.readyState == '4' && xmlhttp.status == '200')
{
response = xmlhttp.responseText;
$('#allquestions').html(response);
$('#allquestions').children(':first-child').fadeIn(1000).addClass( "hidden_page_part" ).removeClass( "box" );
$('.start').fadeOut(700).addClass("box");
$('#next').show();
$('.initialcount').show();
}
}
parameters = 'searchName=' + searchName;
xmlhttp.open('POST', '../modules/get-question-classic.php', true);
xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
xmlhttp.send(parameters);
});
});

