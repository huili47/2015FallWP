<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  </head>
  <body>
      <ul class="nav nav-tabs">
       <li role="presentation" class="active"><a href="#">Home</a></li>
       <li role="presentation"><a href="#">Profile</a></li>
       <li role="presentation"><a href="#">Messages</a></li>
     </ul>
    <div class="container">
            <h1>Hello, world!</h1>
      <div class="row">
        <div class="col-md-8 col-xs-10">
            <a href="#" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i>
                New Record
            </a>
            <a href="#" class="btn btn-danger">
                <i class="glyphicon glyphicon-trash"></i>
                Delete All
                <span class="badge">4</span>
            </a>
            <div class="btn-group" role="group" aria-label="...">
            <button type="button" class="btn btn-default">
                  <i class="glyphicon glyphicon-pencil"></i>
                Menu1</button>

             <button type="button" class="btn btn-default">
                  <i class="glyphicon glyphicon-cloud"></i>
                 Menu2</button>
               
               <div class="btn-group" role="group">
               <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
               <span class="caret"></span>
                </button>
              <ul class="dropdown-menu">
              <li><a href="#">Dropdown link</a></li>
               <li><a href="#">Dropdown link</a></li>
            </ul>
            
             </div>
            </div>
            <table class="table table-condensed table-striped table-bordered table-hover">
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
        <div class="col-md-4 col-xs-2">
            <span class="label label-success">Success</span>
            <span class="label label-info">Info</span>
            <span class="label label-warning">Warning</span>
        </div>
        <div class="col-md-4 col-xs-10">
            <div class="alert alert-success" role="alert">
                You did well
            </div>
            <div class="alert alert-danger" role="alert">
                Oh no! You messed up.
            </div>
            <div class="progress">
              <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 15%">
                <span >45% Complete</span>
              </div>
            </div>
        </div>
      </div>

     <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">@</span>
     <input type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon2">
   
     </div>
     
      <div class="input-group">
       <span class="input-group-addon">
         <input type="radio" aria-label="...">
       </span>
       <input type="text" class="form-control" aria-label="...">
      </div>
      <form class="navbar-form navbar-left" role="search">
         <div class="form-group">
           <input type="text" class="form-control" placeholder="Search">
         </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $(".progress-bar").animate({width: "75%"}, 2000);
    </script>
  </body>
</html>