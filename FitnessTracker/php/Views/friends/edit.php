
<form method="post" action="?action=save">
 <?php include __DIR__ . '/../shared/_Errors.php'; ?>
<table class="table">
    <tr>
       <td><input type="text" name="Name" class="form-control" placeholder="Name" value="<?=$model['Name']?>" /></td>
       <td><input type="text" name="Calories" class="form-control" placeholder="Friend" value="<?=$model['Friend']?>" /></td>
       <td>
         <input type="submit" value="submit" class="btn btn-primary"/>
         <input type="hidden" name="id" value="<?=$model['Friend_id']?>" /> 
       </td>
    </tr>
</table>
</form>   