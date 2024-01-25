function displayLesson(evt, lessonNumber) {
  // Declare variables
  var i, lessonContent, lessonTabs;

  // Get all elements with class="lessonContent" and hide
  lessonContent = document.getElementsByClassName("lessonContent");
  for (i = 0; i < lessonContent.length; i++) {
    lessonContent[i].style.display = "none";
  }

  // Get all elements with class="lessonTabs" and remove the class "active"
  lessonTabs = document.getElementsByClassName("lessonTabs");
  for (i = 0; i < lessonTabs.length; i++) {
    lessonTabs[i].className = lessonTabs[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(lessonNumber).style.display = "block";
  evt.currentTarget.className += " active";
}