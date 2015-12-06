<form method="post" action="?action=save">
 <?php include __DIR__ . '/../shared/_Errors.php'; ?>
 
  <table class="table">
    <input type="text" name="Name" class="form-control" placeholder="Name" value="<?=$model['Name']?>" />
    <input type="text" name="Birthday" class="form-control" placeholder="Birthday" value="<?=$model['Birthday']?>" />
    <input type="submit" value="Submit" class="btn btn-primary"/>
       <td>
         <input type="submit" value="Submit" class="btn btn-primary"/>
         <input type="hidden" name="id" value="<?=$model['id']?>" /> 
       </td>
     </table> 
</form>