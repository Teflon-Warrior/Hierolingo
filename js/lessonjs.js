function termClick(id) {
  var termElement = document.getElementById('term_' + id);
  var definitionElement = document.getElementById('definition_' + id);

  termElement.style.display = "none";
  definitionElement.style.display = "block";
}

function definitionClick(id) {
  var termElement = document.getElementById('term_' + id);
  var definitionElement = document.getElementById('definition_' + id);

  definitionElement.style.display = "none";
  termElement.style.display = "block";
}

//forward and backwards button

function prevbuttonClicked(les, curr) {
        var num = curr-1;
	var les = les;
        location.replace("https://cgi.luddy.indiana.edu/~team11/team-11/lesson.php?les=" + les + "&curr=" + num);
}

function nextbuttonClicked(les, curr) {
        var num = curr+1;
	var les = les;
        location.replace("https://cgi.luddy.indiana.edu/~team11/team-11/lesson.php?les=" + les + "&curr=" + num);
}


//function for lesson nav bar
function lessonnavClicked(les, i) {
        var i = i;
	var les = les;
        location.replace("https://cgi.luddy.indiana.edu/~team11/team-11/lesson.php?les=" + les + "&curr=" + i);

}

//Next and previous lesson buttons
function prevlessonClicked(les) {
        //ensures that the user can't keep going backwards
	var les = les-1;
	ocation.replace("https://cgi.luddy.indiana.edu/~team11/team-11/lesson.php?les=" + les);
	

/* There was already an if statement in the php file where the prev button doesnt show if its lesson 1
        if (!(les <= 1)) {
        var les = les-1;
        location.replace("https://cgi.luddy.indiana.edu/~team11/team-11/lesson.php?les=" + les);
        }
        else{
                les = 1
                location.replace("https://cgi.luddy.indiana.edu/~team11/team-11/lesson.php?les=" + les);
        }
*/
}

function nextlessonClicked(les) {
        var les = les+1;
        location.replace("https://cgi.luddy.indiana.edu/~team11/team-11/lesson.php?les=" + les);
}

//Take quiz button
function quizClicked(les) {
	location.replace("https://cgi.luddy.indiana.edu/~team11/team-11/quiz" + les + ".php");
}
