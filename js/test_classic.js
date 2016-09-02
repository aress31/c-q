$(function(){

// variables for quiz results
var result = 0;
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


// changing questions (clicking NEXT)

$('#next').click(function(){

	//Option(s) Selected
	var selected = '';
	$( " .hidden_page_part li.selected" ).each(function(){
		 selected = selected + ' ' + $( this ).html();
	});
	
	//answer entered
	var FUtext = $('.hidden_page_part').find('textarea').val();
	
	//Right Answer(s)
	var answer = $('.hidden_page_part').find('#answer').val();
	
	//if multiple choice question
	if($('.hidden_page_part div').hasClass('questionMC') )
	{
		//if an option was selected
		if($('.hidden_page_part li').hasClass('selected'))
		{	
			//if it's the right answer
			if(selected == answer)
			{
				//we add the corresponding mark
				$('#submiterrors').html('');
				y++;
				result = y * 100 / count;
			}
			
			else
				$('#submiterrors').html('');

			
		}

		//if it's the last question we show FINISH
		if((x+1) == count)
		{
			$(this).hide();
			$('#finish').show();
		}
		else
		{
			$('#previous').show();
		}
		
	}
	//if it's a fill up question
	else
	{
		//we compare entered answer with the right answer ignoring the case
		if(FUtext.toLowerCase() == answer.toLowerCase())
		{
			//we add the corresponding mark if the answer is correct
			$('#submiterrors').html('');
			y++;
			result = y * 100 / count;
		}

		
		if((x+1) == count)
		{
			$(this).hide();
			$('#finish').show();
		}
		else
		{
			$('#previous').show();
		}
	}		

$( ".hidden_page_part" ).next( ".box" ).fadeIn(1000).addClass( "hidden_page_part" ).removeClass( "box" );
$( ".hidden_page_part" ).prev().removeClass( "hidden_page_part" ).hide().addClass( "box" );

//Option(s) Selected
	var selected = '';
	$( " .hidden_page_part li.selected" ).each(function(){
		 selected = selected + ' ' + $( this ).html();
	});
	
	//answer entered
	var FUtext = $('.hidden_page_part').find('textarea').val();
	
	//Right Answer(s)
	var answer = $('.hidden_page_part').find('#answer').val();

if($('.hidden_page_part div').hasClass('questionMC') && selected != null){
			if(selected == answer)
				{
					$('#submiterrors').html('');
					y--;
					result = y * 100 / count;
				}
}
if($('.hidden_page_part div').hasClass('questionFU') && FUtext != ''){

				if(FUtext.toLowerCase() == answer.toLowerCase())
					{
						$('#submiterrors').html('');
						y--;
						result = y * 100 / count;
					}

		
}

$('#submiterrors').html('');
x++;
$('.initialcount').html(x + ' / ' + count);	
//$('#submitClassic').show();
});

$('#previous').click(function(){

	//Option(s) Selected
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
				$('#submiterrors').html('');
				y++;
				result = y * 100 / count;
			}
			
			else
			{	$('#submiterrors').html('');
			}
			
		}

		if(x == 2)
		{
			$(this).hide();
		}
		else
		{
			$('#finish').hide();
			$('#next').show();
		}
		
	}
	else
	{
	
		if(FUtext.toLowerCase() == answer.toLowerCase())
				{
					$('#submiterrors').html('');
					y++;
					result = y * 100 / count;
				}

		if(x == 2)
		{
			$(this).hide();
		}
		else
		{
			$('#finish').hide();
			$('#next').show();
		}
	}
	

	
	


$( ".hidden_page_part" ).prev( ".box" ).fadeIn(1000).addClass( "hidden_page_part" ).removeClass( "box" );
$( ".hidden_page_part" ).next().removeClass( "hidden_page_part" ).hide().addClass( "box" );

//Option(s) Selected
	var selected = '';
	$( " .hidden_page_part li.selected" ).each(function(){
		 selected = selected + ' ' + $( this ).html();
	});
	
	//answer entered
	var FUtext = $('.hidden_page_part').find('textarea').val();
	
	//Right Answer(s)
	var answer = $('.hidden_page_part').find('#answer').val();

if($('.hidden_page_part div').hasClass('questionMC') && selected != null){
			if(selected == answer)
				{
					$('#submiterrors').html('');
					y--;
					result = y * 100 / count;
				}
}
if($('.hidden_page_part div').hasClass('questionFU') && FUtext != ''){

				if(FUtext.toLowerCase() == answer.toLowerCase())
					{
						$('#submiterrors').html('');
						y--;
						result = y * 100 / count;
					}

		
}
//$(this).hide();
//$('#next').hide();
$('#submiterrors').html('');
x--;
$('.initialcount').html(x + ' / ' + count);	
//$('#submitClassic').show();
});




// finishing the quiz

$('#finish').click(function(){

//Option(s) Selected
	var selected = $('.hidden_page_part').find('li.selected').html();
	
	//answer entered
	var FUtext = $('.hidden_page_part').find('textarea').val();
	
	//Right Answer(s)
	var answer = $('.hidden_page_part').find('#answer').val();
	
	
	
	
	
	if($('.hidden_page_part div').hasClass('questionMC') )
	{

		if($('.hidden_page_part li').hasClass('selected'))
		{
			if(selected == answer)
			{
				$('#submiterrors').html('');
				y++;
				result = y * 100 / count;
			}
			
			else
				$('#submiterrors').html('');

			
		}
		
	}
	else
	{

		if(FUtext.toLowerCase() == answer.toLowerCase())
				{
					$('#submiterrors').html('');
					y++;
					result = y * 100 / count;
				}
	}







$('#countdown').hide();	
$('.meter').fadeOut();
$('#submitClassic').hide();	
$('#next').hide();
$('#previous').hide();
$('#submiterrors').hide();
$('.finished').addClass('hidden_page_part').removeClass('finished').fadeIn(700);
$( ".hidden_page_part" ).prev().removeClass( "hidden_page_part" ).fadeOut(700).addClass( "box" );
$(this).hide();

marksBeforeRound = y * 100 / count;
marks = Math.round(marksBeforeRound);
if (marks >= 90)
  var comment = 'Exellent';
  
if (marks < 90 && marks >= 80)
  var comment = 'Very Good';
  
if (marks < 80 &&  marks >= 65)
  var comment = 'Good';
  
if (marks < 65 && marks >= 50)
  var comment = 'Fair';

if (marks < 50 &&  marks >= 30)
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

