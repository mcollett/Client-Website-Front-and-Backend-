<!-- With Borders Style -->
                <h4 class="page-header">Staff Members</h4>

                <!-- With Borders Section -->
                <div class="block-section">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="span1 text-center">#</th>
                                <th class="hidden-phone">Name</th>
                                <th>Position</th>
                                <th>Payout</th>
                                <th>Phone</th>
                                <th class="hidden-phone"><i class="icon-envelope-alt"></i> Email</th>
                                <th class="span1 text-center"><i class="icon-bolt"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php
                        	$get_staff = mysql_query("SELECT * FROM staff WHERE status != 'inactive'");
                        	while ($staff = mysql_fetch_array($get_staff)) {
                        	?>
                            <tr>
                                <td class="span1 text-center"><?php echo $staff['id']; ?></td>
								<td class="hidden-phone"><?php echo $staff['name']; ?></td>
                                <td><?php echo $staff['position']; ?></td>
                                <td><?php echo $staff['payout']; ?></td>
                                <td><?php echo $staff['phone']; ?></td>
                                <td class="hidden-phone"><?php echo $staff['email']; ?></td>
                                <td class="span1 text-center">
                                    <div class="btn-group">
                                        <a href="?page=edit_staff&id=<?php echo $staff['id']; ?>" data-toggle="tooltip" title="Edit" class="btn btn-mini btn-success"><i class="icon-pencil"></i></a>
                                        <?php if ($staff['position']=="Founder") { ?> <a onClick="alert('You cannot delete the boss, silly!');" data-toggle="tooltip" title="Delete" class="btn btn-mini btn-danger"><i class="icon-remove"></i></a> <?php } else { ?><a href="_actions/delete_staff.php?id=<?php echo $staff['id']; ?>" onclick="return confirm('Are you sure you want to remove this staff member permanently?');" data-toggle="tooltip" title="Delete" class="btn btn-mini btn-danger"><i class="icon-remove"></i></a><?php } ?>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- END With Borders Section -->
                <!-- END With Borders Style -->