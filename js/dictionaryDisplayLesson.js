function displayLesson(evt, lessonNumber) {
  // Declare variables
  var i, lessonContent, lessontab;

  // Get all elements with class="lessonContent" and hide
  lessonContent = document.getElementsByClassName("lessonContent");
  for (i = 0; i < lessonContent.length; i++) {
    lessonContent[i].style.display = "none";
  }

  // Get all elements with class="lessontab" and remove the class "active"
  lessontab = document.getElementsByClassName("lessontab");
  for (i = 0; i < lessontab.length; i++) {
    lessontab[i].className = lessontab[i].className.replace(" active", "");
	console.log(lessontab[i].className);
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(lessonNumber).style.display = "block";
  evt.currentTarget.className += " active";
}