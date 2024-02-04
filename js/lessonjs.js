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
