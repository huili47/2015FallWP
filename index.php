<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

  </head>
  <body>
    <!-- everything goes to a container, div create  -->
    <div  class="container"> 
        <dic class = "row">
          <div class="col-md-8">
      <h1>Hello, world!</h1>
    <a href="#" class = "btn btn-success">
        <i class = "glyphicon glyphicon-plus"></i>
        New Record
        </a>
     
    <a href="#" class = "btn btn-danger">
        <i class = "glyphicon glyphicon-trash"></i>
        Delete All
         <span class="badge">4</span>
         </a>

                    
     <table class = " table table-condensed table striped table bordered table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Username</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Jacob</td>
          <td>Thornton</td>
          <td>@fat</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Larry</td>
          <td>the Bird</td>
          <td>@twitter</td>
        </tr>
      </tbody>
    </table>

        </div>
        <div class = "col-sm-4">
              <span class="label label-success">Success</span>
    <span class="label label-info">Info</span>
    <span class="label label-warning">Warning</span>
    <div class="alert alert-danger" role="alert">you did well</div>
    <div class="alert alert-warning" role="alert">oh no</div>
    </div>
    <div class = "col-sm-4">
       <div class="progress">
         <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" style="width: 15%">
      <span class>45% Complete</span>
     </div>
    </div>
  </div>
        </div>

  </div>

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <!-- default template, adjust font and margin -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    (function(){
     $(".progress-bar").animate({width: $(".progress").width() *.75});
      
      var SomeName = function (){
       $(".progress-bar").animate({width:Myobject.intendeWidth},2000);
       
       }
       var Myobject = {
        hello:"world",
        intendeWidth: $(".progress-bar").width() *.75,
         
          
       };
       SomeName();
     //  setTimeout(SomeName,1000);
    })()
 
       
    </script>
  </body>
</html>