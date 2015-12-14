<?php
session_start();
  $excercises = $_SESSION['excercise'];
  if($_POST){
    unset($excercises[$_POST['id1']]);
    $_SESSION['excercise'] = $excercises;
    header('Location: ./excerciseLog.php');
  }
  
  $types = $excercises[$_REQUEST['id']];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>excercise Log: Delete</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" type="text/css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  </head>
  <body>
    <div class="container">

        <div class="page-header">
          <h1>excercise Log <small>Delete a excercise</small></h1>
        </div>
<form class="form-horizontal" action="?action=delete" method="post" >
  <div class="modal-header">
    <a href="?" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></a>
    <h4 class="modal-title" id="myModalLabel">Delete a person</h4>
  </div>
  	<div class="modal-body">
        
        <?php include __DIR__ . '/../shared/_Errors.php'; ?>
        
  		<h5>Are you sure you want to delete <?=$model['Name']?>?</h5>
  		
  	</div>
	<div class="modal-footer">
		<input type="hidden" name="id" value="<?=$model['id']?>" />
		<a href="?" class="btn btn-default" data-dismiss="modal" >Cancel </a>
		<input type="submit" name="submit" class="btn btn-primary" value="Save changes" />
	</div>
</form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script type="text/javascript">
      (function($){
        $(function(){
          
        });
      })(jQuery);
    </script>
  </body>
</html>