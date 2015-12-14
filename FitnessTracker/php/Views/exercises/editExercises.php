<?php
  session_start();
  $excercises = $_SESSION['excercises'];
  if($_POST){
    if(isset($_GET['id'])){
      $excercises[$_GET['id']] = $_POST;
    }else{
      $excercises[] = $_POST;
    }
    
    $_SESSION['excercises'] = $excercise;
    header('Location: ./excerciseLog.php');
  }
    
  if(isset($_GET['id'])){
    $excer = $excercises[$_GET['id']];
  }else{
    $excer= array();
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>excercise Log: Edit</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" type="text/css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  </head>
  <body>
    <div class="container">
        
        <div class="page-header">
          <h1>excercise Log <small>Record your daily excercise</small></h1>
        </div>
          <div class='alert alert-warning'>
            <button type="button" class="close" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>

          </div> 
    <form method="post" action="?action=save">
     <?php include __DIR__ . '/../shared/_Errors.php'; ?>
     <table class="table">
      <tr>
         <td><input type="text" name="Name" class="form-control" placeholder="Name" value="" /></td>
         <td><input type="text" name="Time" class="form-control" placeholder="MealType" value="" /></td>
         <td><input type="text" name="Calories" class="form-control" placeholder="Calories" value="" /></td>
         <td>
           <input type="submit" value="submit" class="btn btn-primary"/>
         </td>
       </tr>
   </table>
   </form>   
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script type="text/javascript">
      (function($){
        $(function(){
          
          $("#submit").on('click', function(e){
            var self = this;
            //$(self).css({display: "none"});
            $(self).hide().after("Working...");
            
            var per = 0;
            var interval = setInterval(function(){
              per += 25;
              $(".progress-bar").css("width", per + "%");
              $(".progress-bar span").text(per);
              if(per >= 100){
                clearInterval(interval);
                
                if( !$("#txtDate").val() ){
                  $("input").css({ backgroundColor: "#FFAAAA"});
                  $(self).prop("disabled", false).html("Try Again");
                  $("#myAlert").removeClass("alert-success").addClass("alert-danger").show()
                    .find("h3").html("You must enter a date");
                  toastr.error("You must enter a date");
                  
                }else{
                  // Display success
                  $("#myAlert").removeClass("alert-danger").addClass("alert-success").show()
                    .find("h3").html("Yay! You did it.");
                  toastr.success("Yay! You did it.")
                  
                }
                
                
              }
            }, 200);
            //return false;
          });
          $(".close").on('click', function(e) {
              $(this).closest(".alert").slideUp()
          });
          $("input[type='number']").spinner();
          $("input.date").datepicker();
        });
      })(jQuery);
    </script>
  </body>
</html>