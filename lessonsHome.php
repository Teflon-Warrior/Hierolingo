<html>
	<head>
		<title>Lessons Home</title>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Lessons Home</title>
	
		<script src="js/nav.js"></script>

		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/styles.css">
		<link rel="stylesheet" href="css/profile.css">
		<!--<link rel="stylesheet" href="css/profile.css">-->
		<link rel="stylesheet" href="css/tabbingStyling.css" />

		<link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
		<style>
			p{
				margin-left: 5%;
				margin-right: 5%;
			}
			
			li{
				margin-left: 5%;
				margin-right: 5%;
			}
			
			h3{
				margin-left: 1%;
				margin-right: 1%;
			}
			
			a { 
			padding: 5px; 
			text-decoration: underline;
			font-weight: bold;
			border-bottom: 4px solid #FFFFFF;
			display:block;
			}
			
			a:hover {
				text-decoration:none;
				text-shadow: 0 0 2px #999;
			}
			
			a:focus {
				
			}
			
			a:active {
				padding-top: 2px;
			}
		</style>
	</head>
	<body>
	 <div class="profile-header">
		<script src="js/nav.js"></script>
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
                <div style="padding-top: 40px; position: absolute; left: 50%; transform: translate(-50%,0); font-size: 2em;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; color: white;font-weight: bold;"></div>

            </header>
    </div>	
		
		<h1>Lessons Home</h1>
		<p>Here you'll find our lesson content, flashcards, and quizzes. Click on one to get started!</p>
		<p>The learn button will take you to our grammar resources, while flashcards will take you to a place 
		where you can learn vocabulary. When you feel comfortable with both sections in a lesson, take the quiz 
		to test yourself! </p>
		<p> If you don't know where to start, we recommend clicking on the Lesson 1 Grammar button.
		
		<h3>Lesson 1 </h3>
		<hr>
		<a href = "l1grammar.php"><p> Lesson 1 Grammar </p></a>
		<a href ="lesson.php?les=1"><p> Flashcards</p></a>
		<a href ="quiz1.php"><p> Quiz</p></a>
		<hr>
		<h3>Lesson 2 </h3>
		<hr>
		<a href = "l2grammar.php"><p> Lesson 2 Grammar </p></a>
		<a href ="lesson.php?les=2"><p> Flashcards</p></a>
		<a href ="quiz2.php"><p> Quiz</p></a>
		<hr>
		<h3>Lesson 3 </h3>
		<hr>
		<a href = "l3grammar.php"><p> Lesson 3 Grammar </p></a>
		<a href ="lesson.php?les=3"><p> Flashcards</p></a>
		<a href ="quiz3.php"><p> Quiz</p></a>
		<hr>
		<h3>Lesson 4 </h3>
		<hr>
		<a href = "l4grammar.php"><p> Lesson 4 Grammar </p></a>
		<a href ="lesson.php?les=4"><p> Flashcards</p></a>
		<a href ="quiz4.php"><p> Quiz</p></a>
	</body>
</html>
