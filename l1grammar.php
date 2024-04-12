<html>
	<head>
		<title>Lessons Home</title>
		 <meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Lessons Home</title>
	
		<script type="text/javascript" src="./js/profile.js"></script>

		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/styles.css">
		<link rel="stylesheet" href="css/profile.css">
		<!--<link rel="stylesheet" href="css/profile.css">-->
		<link rel="stylesheet" href="css/tabbingStyling.css" />

		<link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	</head>
	<body>
	 <div class="profile-header">

        <header>
            <nav id="mySidenav" class="sidenav">
                <ul>
                    <li><a class="closebtn">&times;</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="lesson.php<?php echo"?les=$level";?>">Lessons</a></li>
                    <li><a href="dictionary.php">Review</a></li>
                    <li><a href="studysets.php">Study Sets</a></li>
		    <li><a href="settings.php">Settings</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            </nav>
            <header>
                <div class="openbtn">
                    <span class="material-symbols-outlined menu-button">menu</span>
                    <span class="menu-text">menu</span>
                </div>
                <div class="all-over-bkg"></div>
                <div style="padding-top: 40px; position: absolute; left: 50%; transform: translate(-50%,0); font-size: 2em;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; color: white;font-weight: bold;">Profile </div>

            </header>
    </div>	
	
	<h1> Lesson 1 </h1>
	<p>Hello and welcome to Heirolingo! If you’re here, you must have an interest in learning about Ancient Egypt 
	and their language. This first lesson will contain some history about the language and its development. 
	You’ll also be given some words to recognize and recall. In the next lessons however, you’ll learn more grammar topics 
	and how to use the words that you’ll learn. </p>
	<h3>History</h3>
	<p>Ancient Egyptian was once thought to be an isolated language, distinct from all others around it. 
	However, it’s actually part of the large Afro-Asiatic language family, which today there are many languages from. 
	There are many cognates, or related words, between Egyptian and languages such as Hebrew, Arabic, and many more. 
	The Egyptian language itself is incredibly old, with some of the earliest writings coming from 3000 B.C.E! 
	In fact, there are multiple phases of Egyptian, shown here:</p>
	<li>Old Egyptian: 3000-2135 B.C.E</li>
	<li>Middle Egyptian: 2135-2000 B.C.E</li>
	<li>Late Egyptian: 1550-715 B.C.E</li>
	<li>Demotic: 715B.C.E – 470 C.E</li>
	<li>Coptic: 3rd – 16th centuries, with some surviving uses to this day</li>
	<p> Each phase was distinct from each other, each showing changes from the previous phase. 
	There were also multiple writing systems developed, including Hieroglyphics, which is what we are interested in. 
	There was also the priestly Hieratic, and the later Demotic and Coptic scripts, which correspond to the ages of the same
	name.  We’ll now start learning more about hieroglyphs, and how to read them. </p>
	<h3>Writing</h3>
	<p>First it is important to describe what a hieroglyph is. Hieroglyphs were the formal writing system used in Ancient Egypt thousands of years ago. 
	They combined logographic, syllabic, and alphabetic elements. “What do those words even mean?”, you may ask. Let me help you out. </p>
	<p>An alphabetic system is what you (if you are reading this site) are likely most familiar with. Each character, or letter, has a sound associated with it, and it is through the combination of these letters that allow one to create words. English is a great example of this type of writing, and other languages such as French, German, or Spanish are also alphabetical. 
A syllabic system is similar, but each symbol represents an entire syllable. Take the word “water”. It has two syllables, “wa” and “ter”. 
Imagine writing “wa” as one symbol, and “ter” as another, and putting those two together to make a word. 
Japanese is a language that has syllabic elements.
Finally, in a logographic system, each character generally represents one idea. Imagine our water example being expressed in
 just one character, rather than 2 or 5. </p>
	<p>Egyptian Hieroglyphs use all of these systems within it’s writing. To make matters worse, sometimes the same symbol may be used in multiple systems. 
While you eventually will learn each of these, it is important to recognize this may happen before you start learning. 
Egyptian was generally written horizontally right to left, though it can be written left to right, or vertically. 
To determine how to read it horizontally, just start in the direction the people or birds are facing. 
Vertical writing always start from the top. Perhaps difficult to adjust to, Ancient Egyptian has no punctuation or spaces! 
You’ll have to use grammar clues to divide sentences. For the beginning however, you won’t have to worry about anything more 
than a few words at most. </p>
</p>

	<br>
	<p> From here, you'll want to check out the flashcards and learn some basic vocabulary. After that, try taking the quiz. </p>
	<button onclick="lesson.php?les=1">Flashcards</button>
	<button onclick="quiz.php1">Quiz</button>
	</body>
</html>