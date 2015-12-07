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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
      
    <div class="container">
        <h1>My Website</h1>
              <nav class="navbar navbar-default navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Contact</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="./">Default <span class="sr-only">(current)</span></a></li>
              <li><a href="../navbar-fixed-top/">Fixed top</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>

            <div id="view"></div>
            
    </div>
    
    <!--      ### Tech Stuff ###      -->
    <div class="modal fade" id="myDialog">
      <div class="modal-dialog">
        <div class="modal-content">
        <form class="form-horizontal" >
          <div class="modal-header">
            <a href="?" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></a>
            <h4 class="modal-title" ></h4>
          </div>
        	<div class="modal-body">
        	</div>
        	<div class="modal-footer">
        		<a href="?" class="btn btn-default" data-dismiss="modal" >Cancel </a>
        		<input type="submit" name="submit" class="btn btn-primary submit" value="Save changes" />
        	</div>
        </form>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.4/handlebars.min.js"></script>
    <script type="text/javascript">
        $(function(){
            var editTemplate = Handlebars.compile($("#edit-tmpl").html());
            var indexTemplate = Handlebars.compile($("#index-tmpl").html());
            $.getJSON("/person").then(function(data){
                    var html = indexTemplate({rows: data});
                    $("#view").html(html);
            });
            $("#view").on("click", ".ajax", function(){
                $.get(this.href).then(function(data){
                    $("#myDialog .modal-content").html(data);
                    $("#myDialog").modal('show');
                });
                return false;
            });
            $("#view").on("click", ".create", function(){
                $("#myDialog .modal-title").html("Add a person");
                $("#myDialog .modal-body").html(editTemplate({}));
                $("#myDialog").modal('show');
                $("#myDialog .modal-body .btn-primary").hide();
                $("#myDialog .submit").one('click', function(){
                    $.ajax({ url: '/person/', type: 'POST', data: $("#myDialog input").serialize() })
                    .done(function(data){
                        location.reload();
                    }).fail(function(data){
                        alert(data.responseJSON.code);
                    });
                    return false;
                });
                return false;
            });
            $("#view").on("click", ".edit", function(){
                var $self = $(this);
                $.getJSON(this.href).then(function(data){
                    var html = editTemplate(data);
                    var $tr = $self.closest("tr").after(html).hide()
                    $tr.next().find(".submit").one('click', function(){
                        $.ajax({ url: '/person/', type: 'POST', data: $tr.next().find("input").serialize() })
                        .done(function(data){
                            location.reload();
                        }).fail(function(data){
                            alert(data.responseJSON.code);
                        });
                        return false;
                    });
                });
                return false;
            });
            $("#view").on("click", ".delete", function(){
                $self = $(this); 
                $.get(this.href).then(function(data){
                    $("#myDialog .modal-title").html("Delete a person");
                    $("#myDialog .modal-body").html("<h5>Are you sure you want to delete " + data.Name + "?</h5>");
                    $("#myDialog .submit").one('click', function(){
                        $.ajax({ url: '/person/' + data.id, type: 'DELETE'})
                        .done(function(data){
                            $self.closest('tr').remove();
                            $("#myDialog").modal('hide');
                        }).fail(function(data){
                            alert(data.responseJSON.code);
                        });
                        return false;
                    });
                    $("#myDialog").modal('show');
                });
                return false;
            });
        });
    </script>
    <script type="text/template" id="edit-tmpl" >
        <tr>
           <td><input type="text" name="Name" class="form-control" placeholder="Name" value="{{Name}}" /></td>
           <td><input type="text" name="Birthday" class="form-control" placeholder="Birthday" value="{{Birthday}}" /></td>
           <td>
             <input type="submit" value="Submit" class="btn btn-primary submit"/>
             <input type="hidden" name="id" value="{{id}}" /> 
           </td>
        </tr>
    </script>
    <script type="text/template" id="index-tmpl" >
        <a class="btn btn-success create">
            <i class="glyphicon glyphicon-plus"></i>
            New Record
        </a>
        <a href="#" class="btn btn-danger">
            <i class="glyphicon glyphicon-trash"></i>
            Delete All
            <span class="badge">{{rows.length}}</span>
        </a>
        <br />
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Actions</th>
                    <th>Name</th>
                    <th>Birthday</th>
                </tr>
            </thead>
            <tbody>
                {{#each rows}}
                    <tr>
                          <th scope="row">
                            <div class="btn-group" role="group" aria-label="...">
                              <a href="" title="View" class="btn btn-default btn-xs ajax"><i class="glyphicon glyphicon-eye-open"></i></a>
                              <a href="/person/{{id}}" title="Edit" class="btn btn-default btn-xs edit"><i class="glyphicon glyphicon-edit"></i></a>
                              <a href="/person/{{id}}" title="Delete" class="btn btn-default btn-xs delete"><i class="glyphicon glyphicon-trash"></i></a>
                            </div>
                          </th>
                        <td>{{Name}}</td>
                        <td>{{Birthday}}</td>
                    </tr>
                {{/each}}
            </tbody>
        </table>
    </script>

  </body>
</html>