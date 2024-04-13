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
                    <li><a href="lessonsHome.php">Lessons</a></li>
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
		
		<h1>Lesson Home</h1>
		<p>Here you'll find our lesson content, flashcards, and quizzes. Click on one to get started!</p>
		<p>The learn button will take you to our grammar resources, while flashcards will take you to a place 
		where you can learn vocabulary. When you feel comfortable with both sections in a lesson, take the quiz 
		to test yourself! </p>
		<p> If you don't know where to start, we recommend clicking on the Lesson 1 Grammar button.
		
		<h3>Lesson 1 </h3>
		<button onclick="l1grammar.php">Lesson 1 Grammar</button>
		<button onclick="lesson.php?les=1">Flashcards</button>
		<button onclick="quiz1.php">Quiz</button>
		<h3>Lesson 2 </h3>
		<button onclick="l2grammar.php">Lesson 2 Grammar</button>
		<button onclick="lesson.php?les=2">Flashcards</button>
		<button onclick="quiz2.php">Quiz</button>
		<h3>Lesson 3 </h3>
		<button onclick="l3grammar.php">Lesson 3 Grammar</button>
		<button onclick="lesson.php?les=3">Flashcards</button>
		<button onclick="quiz3.php">Quiz</button>
		<h3>Lesson 4 </h3>
		<button onclick="l4grammar.php">Lesson 4 Grammar</button>
		<button onclick="lesson.php?les=4">Flashcards</button>
		<button onclick="quiz4.php">Quiz</button>
	</body>
</html>
