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

function prevbuttonClicked(curr) {
        var num = curr-1;
        location.replace("https://cgi.luddy.indiana.edu/~team11/team-11/lesson.php?curr=" + num);
}

function nextbuttonClicked(curr) {
        var num = curr+1;
        location.replace("https://cgi.luddy.indiana.edu/~team11/team-11/lesson.php?curr=" + num);
}


//function for lesson nav bar
function lessonnavClicked(i) {
        var i = i;
        location.replace("https://cgi.luddy.indiana.edu/~team11/team-11/lesson.php?curr=" + i);

}
