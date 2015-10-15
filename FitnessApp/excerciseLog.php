<?php
session_start();
    $name = 'Hui Li';
    $message = "Welcome $name";
    
    $person = array( 'Name' => $name, 'Age' => 22, CallorieGoal => 4000 );
    
    $exercise = $_SESSION['exercise'];
    if(!$exercise){
      $_SESSION['exercise'] = $exercise = array(
          array( 'Name' => 'Running', 'Time' => strtotime("-1 hour"), Callories => 400 ),
          array( 'Name' => 'Swimming', 'Time' => strtotime("now"), Callories => 800 ),
          array( 'Name' => 'Warm up', 'Time' => strtotime("now + 1 hour"), Callories => 400 ),
          array( 'Name' => 'PushUp', 'Time' => strtotime("6pm"), Callories => 400 ),
          );
    }
        
    $total = 0;
    foreach ($exercise as $type) {
        $total += $type['Callories'];
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
            <a href="MealTakeIn.php" title="View" class="btn btn-default btn-s"><i class="glyphicon glyphicon-arrow-left"></i></a>
            <h1>exercise Log</h1>
            <h2><?=$message?></h2>
            <div class="panel panel-success">
                <div class="panel-heading">Your Data</div>
                <div class="panel-body">
                    <dl class="dl-horizontal">
                        <dt>Name</dt>
                        <dd><?=$person['Name']?></dd>
                        <dt>Age</dt>
                        <dd><?=$person['Age']?></dd>
                        <dt>Goal To Lose Calories</dt>
                        <dd><?=$person['CallorieGoal']?></dd>
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
                <span class="badge"><?=count($exercise)?></span>
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
                <?php foreach($exercise as $i => $type): ?>
                <tr>
                  <th scope="row">
                    <div class="btn-group" role="group" aria-label="...">
                      <a href="" title="View" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>
                      <a href="editExcercise.php?id=<?=$i?>" title="Edit" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                      <a href="deleteExcercise.php?id=<?=$i?>" title="Delete" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                    </div>
                  </th>
                  <td><?=$type['Name']?></td>
                  <td><?=date("M d Y  h:i:sa", $type['Time'])?></td>
                  <td><?=$type['Callories']?></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>  
          
        </div>
        <div class="col-md-4 col-xs-10">
            <div class="alert alert-success" role="alert">
                You did well
            </div>
            <div class="alert alert-danger" role="alert">
                Oh no! You messed up.
            </div>

        </div>
      </div>
      
            
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>