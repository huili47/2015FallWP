<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Food Intake</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  </head>
  <body ng-app='app'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
      
    <div class="container">
        <h1>Fitness App</h1>
              <nav class="navbar navbar-default navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Fittness App 2015</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="/FitnessTracker/php/Views/persons/person.php">Person</a></li>
              <li><a href="/FitnessTracker/php/Views/meals/MealLog.php" >Meal</a></li>
              <li><a href="/FitnessTracker/php/Views/exercises/exerciseLog.php" >Exercise</a></li>
              <li><a href="/FitnessTracker/php/Views/persons/index.php" >Person</a></li>
              <li><a href="/FitnessTracker/php/Views/friends/friendLog.php" >Friend</a></li>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="./">Default <span class="sr-only">(current)</span></a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>

            <mp-alert></mp-alert><mp-panel></mp-panel>
            <div ng-view ></div>
            
    </div>
    

  </body>
</html>