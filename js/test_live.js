$(function(){

// variables for quiz results

var x = 1;
var count = $(".box").length;
y = 0;
$('.initialcount').html('1 / ' + count);	

// animating the li options

$('#options li').click(function(){
if($(this).hasClass('question'))
	$(this).removeClass('question').addClass('selected');
else
	$(this).removeClass('selected').addClass('question');
});


// changing questions

$('#next').click(function(){
$( ".hidden_page_part" ).next( ".box" ).fadeIn(1000).addClass( "hidden_page_part" ).removeClass( "box" );
$( ".hidden_page_part" ).prev().removeClass( "hidden_page_part" ).hide().addClass( "box" );
$(this).hide();
$('#submiterrors').html('');
x++;
$('.initialcount').html(x + ' / ' + count);	
$('#submit').show();
});
// submit click event

$('#submit').click(function(){
	//Option(s) Selected
	//var selected = $('.hidden_page_part').find('li.selected').html();
	
	var selected = '';
	$( " .hidden_page_part li.selected" ).each(function(){
		 selected = selected + ' ' + $( this ).html();
	});
	
	//answer entered
	var FUtext = $('.hidden_page_part').find('textarea').val();
	
	//Right Answer(s)
	var answer = $('.hidden_page_part').find('#answer').val();
	
	if($('.hidden_page_part div').hasClass('questionMC'))
	{
		if($('.hidden_page_part li').hasClass('selected'))
		{
			if(selected == answer)
			{
				$('.hidden_page_part').attr('id', 'yes');
				$('li.selected').addClass('success').removeClass('selected');
				$('#submiterrors').html('');
				y++;
				result = y * 100 / count;
				$('.meter span').css('width', + result + '%');
			}
			
			else
			{	
				$('.hidden_page_part').attr('id', 'no');			
				$('li.selected').addClass('error').removeClass('selected');
				$('#submiterrors').html('Answer : ' + answer);
				$('.meter span').css('width', + result + '%');
			}
			
		}
		else
		{
			$('.hidden_page_part').attr('id', 'no');
			$('#submiterrors').html('Answer : ' + answer);
		}

		$(this).hide();
		
		if(x == count)
		{
			$('#finish').show();
		}
		else
		{
			$('#next').show();	
		}
		
	}

	else
	{
	
		if(FUtext.toLowerCase() == answer.toLowerCase())
				{
					$('.hidden_page_part').attr('id', 'yes');
					$('#submiterrors').html('');
					y++;
					result = y * 100 / count;
					$('.meter span').css('width', + result + '%');
				}
				else
				{	$('.hidden_page_part').attr('id', 'no');
					$('#submiterrors').html('Answer : ' + answer);
				}
		
				$(this).hide();
					
					if(x == count)
					{
						$('#finish').show();
					}
					else
					{
						$('#next').show();	
					}
	}
});

// finishing the quiz

$('#finish').click(function(){
$('.meter').fadeOut();
$('#submit').hide();	
$('#next').hide();
$('#submiterrors').hide();
$('.finished').addClass('hidden_page_part').removeClass('finished').fadeIn(700);
$( ".hidden_page_part" ).prev().removeClass( "hidden_page_part" ).fadeOut(700).addClass( "box" );
$(this).hide();

marksBeforeRound = y * 100 / count;
marks = Math.round(marksBeforeRound);


if (marks >= 90)
  var comment = 'Exellent';
  
if (90 > marks >= 80)
  var comment = 'Very Good';
  
if (80 > marks >= 65)
  var comment = 'Good';
  
if  (65 > marks >= 50)
  var comment = 'Fair';

if (50 > marks >= 30)
  var comment = 'Poor';

if (marks < 30)
  var comment = 'Very Poor';


$('h2#score').html(comment + ', you scored ' + marks + '%');
$('.initialcount').html('Finished');
});

// restarting the quiz

$('#quizend').click(function(){
window.location.reload();
});
});