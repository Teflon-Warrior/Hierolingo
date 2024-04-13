<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/welcome.css">
</head>

<!-- Homepage layout from Bootstrap (https://getbootstrap.com/docs/4.3/examples/jumbotron/) -->

<body>
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">DataGlyph</h1>
            <div class="log">
            <p class="corner">Heiroglyphics, now easier.
            <a class="btn btn-primary corner" href="https://cgi.luddy.indiana.edu/~team11/team-11/login.php"
                    role="button">Log In &raquo;</a></p> </div>
        </div>
    </div>

    <div class='columns-div'>
        <div class="container">
            <!-- Example row of columns -->
            <div class="row">
                <div class="col-md-4">
                  <div class='column-border'>
                    <h2 class="down">Advanced Learning</h2>
                    <p class="p3">DataGlyph uses advanced learning modules to enhance the learning experience of the user.
                        Registered users can utilize a dictionary of words, customizable study sets, and flashcard-based
                        lessons to assist them in learning the ancient writing. </p>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class='column-border'>
                    <h2>Quizzes</h2>
                    <p class="p3">Users of DataGlyph can partake in quizzes that if passed, advances them to a new level. With new
                        levels come new words to learn!</p>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class='column-border'>
                    <h2>Notifications</h2>
                    <p class="p3">DataGlyph utilizes the Twilio API to notify users (permission granted) when to practice their
                        heiroglyphics. This way, you can stay on track to learning egyptian heiroglyphics without
                        forgetting!</p>
                  </div>
                </div>
            </div>

            <hr>

        </div> <!-- /container -->

    </div>

    </main>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="/docs/4.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o"
        crossorigin="anonymous"></script>
</body>

</html>
