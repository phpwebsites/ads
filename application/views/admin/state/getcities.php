<select name="city_id" id="city_id" class="form-control">
<option value="" selected="selected" >----Select Cites----</option>
<?php foreach($cites as $cit): ?>
  <option value="<?php echo $cit->id; ?>"><?php echo $cit->name; ?></option>
<?php endforeach; ?> 	
</select> 