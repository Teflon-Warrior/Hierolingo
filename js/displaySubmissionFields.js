function displaySubmit(evt, submissionFormNumber) {
  // Declare variables
  var i, submissionForm, addButton;

  // Get all elements with class="submissionForm" and hide
  submissionForm = document.getElementsByClassName("submissionForm");
  for (i = 0; i < submissionForm.length; i++) {
    submissionForm[i].style.display = "none";
  }

  // Get all elements with class="addButton" and remove the class "active"
  addButton = document.getElementsByClassName("addButton");
  for (i = 0; i < addButton.length; i++) {
    addButton[i].className = addButton[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById("submissionForm" + submissionFormNumber).style.display = "block";
  evt.currentTarget.className += " active";
}