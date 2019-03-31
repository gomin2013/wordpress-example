<h3><?php _e("Country & Currency", "blank"); ?></h3>
<table class="form-table">
	<tr>
		<th><label for="country"><?php _e("Country"); ?></label></th>
		<td>
			<select name="country" id="country"><?php country($user); ?></select>
		</td>
	</tr>
	<tr>
		<th><label for="currency"><?php _e("Currency"); ?></label></th>
		<td>
			<input type="text" name="currency" value="<?php currency($user); ?>" readonly>
		</td>
	</tr>
	<tr>
</table>