<?php
session_start();
    $name = 'Hui Li';
    $message = "Welcome $name";
    
    $person1 = array( 'Name' => $name, 'Age' => 22, CallorieGoal => 4000 );
    
    $exercises = $_SESSION['exercise'];
    if(!$exercises){
      $_SESSION['exercise'] = $exercises = array(
          array( 'Name' => 'Running', 'Time' => strtotime("-1 hour"), Callories => 600 ),
          array( 'Name' => 'Swimming', 'Time' => strtotime("now"), Callories => 800 ),
          array( 'Name' => 'Warm up', 'Time' => strtotime("now + 1 hour"), Callories => 400 ),
          array( 'Name' => 'PushUp', 'Time' => strtotime("6pm"), Callories => 500 ),
          );
    }
        
    $total = 0;
    foreach ($exercises as $types) {
        $total += $types['Callories'];
    }
    
    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>exercise Log</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
       <div class="menu">
        <h1>Exercise Log</h1>
              <nav class="navbar navbar-default navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Fittness App</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li ><a href="/FitnessTracker/php/Views/persons/person.php">Person</a></li>
              <li><a href="/FitnessTracker/php/Views/meals/MealLog.php" >Meal</a></li>
              <li class="active"><a href="/FitnessTracker/php/Views/exercises/exerciseLog.php" >Exercise</a></li>
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
                        <dd><?=$person1['Name']?></dd>
                        <dt>Age</dt>
                        <dd><?=$person1['Age']?></dd>
                        <dt>Goal To Lose Calories</dt>
                        <dd><?=$person1['CallorieGoal']?></dd>
                        <dt>Today's Excersise</dt>
                        <dd><?=$total?></dd>
                    </dl>
                </div>
            </div>
      <div class="row">
        <div class="col-md-8 col-xs-10">
            <a href="editExcercise.php" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i>
                New Record
            </a>
            <a href="#" class="btn btn-danger">
                <i class="glyphicon glyphicon-trash"></i>
                Delete All
                <span class="badge"><?=count($exercises)?></span>
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
                <?php foreach($exercises as $i => $types): ?>
                <tr>
                  <th scope="row">
                    <div class="btn-group" role="group" aria-label="...">
                      <a href="" title="View" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>
                      <a href="editExcercise.php?id=<?=$i?>" title="Edit" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                      <a href="deleteExcercise.php?id=<?=$i?>" title="Delete" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                    </div>
                  </th>
                  <td><?=$types['Name']?></td>
                  <td><?=date("M d Y  h:i:sa", $types['Time'])?></td>
                  <td><?=$types['Callories']?></td>
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