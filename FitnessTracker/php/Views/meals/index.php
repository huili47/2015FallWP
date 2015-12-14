<?php
?>
            <a href="?action=create" class="btn btn-success ajax">
                <i class="glyphicon glyphicon-plus"></i>
                New Record
            </a>
            <a href="#" class="btn btn-danger">
                <i class="glyphicon glyphicon-trash"></i>
                Delete All
                <span class="badge"><?=count($model)?></span>
            </a>
            <br />


<div class="modal fade" id="myDialog">
  <div class="modal-dialog">
    <div class="modal-content">
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<table class="table table-striped">
    <thead>
        <tr>
            <th>Actions</th>
            <th>MealType</th>
            <th>Calories</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($model as $row): ?>
            <tr>
                  <th scope="row">
                    <div class="btn-group" role="group" aria-label="...">
                      <a href="" title="View" class="btn btn-default btn-xs ajax"><i class="glyphicon glyphicon-eye-open"></i></a>
                      <a href="?action=edit&id=<?=$row['id']?>" title="Edit" class="btn btn-default btn-xs ajax"><i class="glyphicon glyphicon-edit"></i></a>
                      <a href="?action=delete&id=<?=$row['id']?>" title="Delete" class="btn btn-default btn-xs ajax"><i class="glyphicon glyphicon-trash"></i></a>
                    </div>
                  </th>
                <td><?=$row['MealType']?></td>
                <td><?=$row['Calories']?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script type="text/javascript">
    $(function(){
        $(".ajax").click(function(){
            $.get(this.href + "&format=plain").then(function(data){
                $("#myDialog .modal-content").html(data);
                $("#myDialog").modal('show');
                $("#myDialog form").submit(function(e){
                    e.preventDefault();
                    $.post(this.action + "&format=json", $(this).serialize(), null, 'json').then(function(data){
                        $("#myDialog .modal-content").append('<div class="alert alert-danger">' + data.Name + ' can not be deleted</div>')
                    });
                });
            });
            return false;
        });
    });
</script>