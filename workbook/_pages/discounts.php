<table id="example-datatables" class="table table-bordered table-hover">
<thead>
	<tr>
		<th>ID</th>
		<th>Coupon Code</td>
		<th>Discounted Amount</th>                             
		<th class="span1 text-center"><i class="icon-bolt"></i></th>
	</tr>
</thead>
<tbody>
	
		<?php $get_num_apps = mysql_num_rows(mysql_query("SELECT id FROM coupons")); ?>
		<?php if ($get_num_apps == 0) { ?> <tr><td colspan="4"><center>No coupons found.</center></td></tr> <?php } ?>
		<?php if ($get_num_apps > 0) { ?>
		<?php $get_app_info = mysql_query("SELECT * FROM coupons ORDER BY id DESC"); ?>
		<?php while ($app_info = mysql_fetch_array($get_app_info)) { ?>
		<tr>
		<?php $prof_score = ($app_info['avail'] + $app_info['internet'] + $app_info['computer'] + $app_info['social']); ?>
		<td><?php echo $app_info['id']; ?></td>
		<td><?php echo $app_info['code']; ?></td>
		<td>$<?php echo number_format($app_info['discount'], 2); ?></td>
		<td class="span1 text-center">
			<div class="btn-group">
				<a onclick="return confirm('Are you sure you want to remove this discount permanently?');" data-toggle="tooltip" title="Delete" class="btn btn-mini btn-danger" href="_actions/delete_code.php?id=<?php echo $app_info['id']; ?>"><i class="icon-remove"></i></a>
			</div>
		</td>
		</tr>
		<?php } ?>
		<?php } ?>
	
	
</tbody>
</table>