var counterText = 0;
var counterRadioButton = 0;

var counter = 0;
var RA = 0;
var FA = 0;
var An = 1;

//adding a multiple choice question
function multiple_choice(divName){

	
	
	
	if (counter == 1)  {
          alert("You have reached the limit of adding " + counter + " inputs");
     }
	
	else {
	
    var newdiv1 = document.createElement('div');
	var newdiv2 = document.createElement('div');
               
			   newdiv1.innerHTML = "Question "  + " <br><textarea id='question' name='question'></textarea>";
			   newdiv2.innerHTML = "<input type='hidden' name='type' value='Multiple choice'>"
			   + "<input id='button2' type='button' onclick='add_answer(\"rightA\");' value='add_Ranswer'></input>"
			   + "<input id='button2' type='button' onclick='add_answer(\"falseA\");' value='add_Fanswer'></input>"
			   + "<br><input id='button2' type='submit'  name='choice' value='Add new Question'>"
			   + "<input id='button2' type='submit' name='choice' value='Finish'>";



     document.getElementById(divName).appendChild(newdiv1);
	 document.getElementById(divName).appendChild(newdiv2);
	 
	 counter = 1;
	 }
}
//adding answers for the multiple choice questions
function add_answer(divName){

    var newdiv1 = document.createElement('div');
	var newdiv2 = document.createElement('div');
               
			   if(divName == "rightA")
			   {
					newdiv1.innerHTML = "<textarea name='RA" + RA + "'></textarea>";
					An++;
					RA++;
			   }
			   else
			   {
					newdiv1.innerHTML = "<textarea name='FA" + FA + "'></textarea>";
					An++;
					FA++;
			   }
			   
			   newdiv2.innerHTML = "<input type='hidden' name='NRA' value='" + RA + "'>"
		+ "<input type='hidden' name='NFA' value='" + FA + "'>";

     document.getElementById(divName).appendChild(newdiv1);
	 document.getElementById(divName).appendChild(newdiv2);
}

//adding a fill up question
function fill_up(divName){


	if (counter == 1)  {
          alert("You have reached the limit of adding " + counter + " inputs");
     }
	
	else {

    var newdiv1 = document.createElement('div');
	var newdiv2 = document.createElement('div');
    var newdiv3 = document.createElement('div');
	var newdiv4 = document.createElement('div');
               
			   newdiv1.innerHTML = "Question "  + " <br><textarea id='question' name='question'></textarea><br><br>";
			   newdiv2.innerHTML = "Key words " +  "<br><textarea id='question' name='answer'></textarea>";
			   newdiv3.innerHTML = "<input id='button2' type='submit' name='choice' value='Add new Question'>"
			   + "<input id='button2' type='submit' name='choice' value='Finish'>";
			   newdiv4.innerHTML = "<input type='hidden' name='type' value='Fill up'>";



     document.getElementById(divName).appendChild(newdiv1);
	 document.getElementById(divName).appendChild(newdiv2);
     document.getElementById(divName).appendChild(newdiv3);
	 document.getElementById(divName).appendChild(newdiv4);
	 
	  counter = 1;
	 }
}

//count the number of right answers and the false answers added after each multiple choice question
function counter(divName){
	var newdiv1 = document.createElement('div');
	
		newdiv1.innerHTML = "<input type='hidden' name='NRA' value='" + RA + "'>"
		+ "<input type='hidden' name='NFA' value='" + FA + "'>";
	
	document.getElementById(divName).appendChild(newdiv1);
}