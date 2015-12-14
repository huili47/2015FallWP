<?php
session_start();
    $name = 'Hui Li';
    $message = "Welcome $name";
    
    $person = array( 'Name' => $name, 'Age' => 22, CallorieGoal => 2000 );
    
    $food = $_SESSION['food'];
    if(!$food){
      $_SESSION['food'] = $food = array(
          array( 'Name' => 'Breakfast', 'Time' => strtotime("-1 hour"), Callories => 350 ),
          array( 'Name' => 'Lunch', 'Time' => strtotime("now"), Callories => 800 ),
          array( 'Name' => 'Snack', 'Time' => strtotime("now + 1 hour"), Callories => 400 ),
          array( 'Name' => 'Dinner', 'Time' => strtotime("6pm"), Callories => 400 ),
          );
    }
        
    $total = 0;
    foreach ($food as $meal) {
        $total += $meal['Callories'];
    }
    
    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Food Intake</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
          <div class="menu">
        <h1>Meal Log</h1>
              <nav class="navbar navbar-default navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Fitness App</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="/FitnessTracker/php/Views/persons/person.php">Person</a></li>
              <li class="active"><a href="/FitnessTracker/php/Views/meals/MealLog.php" >Meal</a></li>
              <li><a href="/FitnessTracker/php/Views/exercises/exerciseLog.php" >Exercise</a></li>
              <li><a href="/FitnessTracker/php/Views/friends/friendLog.php" >Friend</a></li>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="./">Default <span class="sr-only">(current)</span></a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
   </div>
            <h2><?=$message?></h2>
            <div class="panel panel-success">
                <div class="panel-heading">Your Data</div>
                <div class="panel-body">
                    <dl class="dl-horizontal">
                        <dt>Name</dt>
                        <dd><?=$person['Name']?></dd>
                        <dt>Age</dt>
                        <dd><?=$person['Age']?></dd>
                        <dt>Goal</dt>
                        <dd><?=$person['CallorieGoal']?></dd>
                        <dt>Today's Intake</dt>
                        <dd><?=$total?></dd>
                    </dl>
                </div>
            </div>
      <div class="row">
        <div class="col-md-8 col-xs-10">
            <a href="editMeal.php" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i>
                New Record
            </a>
            <a href="#" class="btn btn-danger">
                <i class="glyphicon glyphicon-trash"></i>
                Delete All
                <span class="badge"><?=count($food)?></span>
            </a>
            <br />
            <table class="table table-condensed table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Time</th>
                  <th>Callories</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($food as $i => $meal): ?>
                <tr>
                  <th scope="row">
                    <div class="btn-group" role="group" aria-label="...">
                      <a href="" title="View" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>
                      <a href="editMeal.php?id=<?=$i?>" title="Edit" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                      <a href="deleteMeal.php?id=<?=$i?>" title="Delete" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                    </div>
                  </th>
                  <td><?=$meal['Name']?></td>
                  <td><?=date("M d Y  h:i:sa", $meal['Time'])?></td>
                  <td><?=$meal['Callories']?></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>  
          
        </div>

      </div>
      
            
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>