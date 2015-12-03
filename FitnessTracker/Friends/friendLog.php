<?php
    session_start();
    $name = 'Hui Li';
    $message = "Welcome $name";
    
    $person = array('Name' => $name, 'Age' => 21);
    
    $friends= $_SESSION['friends'];
    if(!$friends){
        $_SESSION['friends'] = $friends = array(
        array('Name' => 'Sandy', 'Age' => '18', 'Workout'=>'Swiming'),
        array('Name' => 'Kimberly', 'Age' => '17','Workout'=>'Biking'),
        array('Name' => 'Kattie', 'Age' => '20','Workout'=>'planking'),
        array('Name' => 'Byan', 'Age' => '23','Workout'=>'Running')
        );
    }
        
    $total = 0;
    foreach($friends as $fri){
        $total++;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Friends Log</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Friends Log</h1>
        <h2><?=$message?></h2>
        <div class="panel panel-success">
            <div class="panel-heading">Your Data</div>
            <div claa="panel-body">
                <dl class="dl-horizontal">
                    <dt>Name </dt>
                    <dd><?=$person['Name']?></dd>
                    <dt>Age </dt>
                    <dd><?=$person['Age']?></dd>
                    <dt>Friends</dt>
                    <dd><?=$total?></dd>
                </dl>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-xs-10">
                <a href="editFriends.php" class="btn btn-success">
                    <i class="glyphicon glyphicon-plus"></i> New Record
                </a>
                <a href="#" class="btn btn-danger">
                    <i class="glyphicon glyphicon-trash"></i> Delete All
                    <span class="badge"><?=count($friends)?></span>
                </a>
                <table class="table  table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Workout</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($friends as $i => $fri): ?>
                <tr>
                  <th scope="row">
                      <div class="btn-group" role="group" aria-label="...">
                      <a href="" title="View" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>
                      <a href="editFriends.php?id=<?=$i?>" title="Edit" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                      <a href="deleteFriends.php?id=<?=$i?>" title="Delete" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                  </div>
                  </th>
                  
                  <td><?=$fri['Name']?></td>
                  <td><?=$fri['Age']?></td>
                  <td><?=$fri[Workout]?></td>
                </tr>
                <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
           
        </div>


    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    </script>
</body>

</html>