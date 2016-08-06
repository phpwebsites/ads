<select name="subcategory" id="subcategory">
  <option value="">-----Select Subcategory------</option>
  <?php foreach ($subcategories as  $value) { ?>
  		<option value="<?php echo $value->id;  ?>"> <?php echo $value->name;  ?></option>	
  <?php } ?>
  
</select>