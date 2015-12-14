<form method="post" action="?action=save">
 <?php include __DIR__ . '/../shared/_Errors.php'; ?>
 
  <table class="table">
    <input type="text" name="Name" class="form-control" placeholder="Name" value="<?=$model['Name']?>" />
    <input type="text" name="Age" class="form-control" placeholder="Age" value="<?=$model['Age']?>" />
    <input type="text" name="Height" class="form-control" placeholder="Height" value="<?=$model['Height']?>" />
    <input type="text" name="Weight" class="form-control" placeholder="Weight" value="<?=$model['Weight']?>" />
    <input type="submit" value="Submit" class="btn btn-primary"/>
       <td>
         <input type="submit" value="Submit" class="btn btn-primary"/>
         <input type="hidden" name="id" value="<?=$model['id']?>" /> 
       </td>
     </table> 
</form>