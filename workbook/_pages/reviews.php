<!-- Default Tabs Block -->
                <div class="block block-themed">
                    <!-- Default Tabs Title -->
                    <div class="block-title">
                        <h4>Reviews <small>Approve pending reviews here.</small></h4>
                    </div>
                    <!-- END Default Tabs Title -->

                    <!-- Default Tabs Content -->
                    <div class="block-content full">
                        <ul class="nav nav-tabs" data-toggle="tabs">
                            <li class="active"><a href="#example-tabs-home">Pending</a></li>
                            <li><a href="#example-tabs-profile">Approved / Denied</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="example-tabs-home">
							<?php // Pending Reviews  ?>
							
							<!-- With Borders Style -->

                <!-- With Borders Section -->
                <div class="block-section">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center" width="5%">Package</th>
								<th class="text-center" width="5%">Review</th>
								<th>Comments</th>
                                <th width="5%" class="span1 text-center"><i class="icon-bolt"></i></th>
                            </tr>
                        </thead>
                        <tbody>
						<?php $get_pending_reviews = mysql_query("SELECT * FROM reviews WHERE approval = 'unapproved'"); while ($pending_reviews = mysql_fetch_array($get_pending_reviews)) { ?>
                            <tr>
								<td class="span1 text-center"><?php echo ucfirst($pending_reviews['package']); ?></td>
                                <td class="span1 text-center"><?php echo $pending_reviews['rating']; ?> / 5</td>
								<td><?php echo $pending_reviews['comments']; ?></td>
                                <td class="span1 text-center">
                                    <div class="btn-group">
                                        <a href="_actions/edit_review.php?status=approve&review_id=<?php echo $pending_reviews['id']; ?>" data-toggle="tooltip" title="Approve" class="btn btn-mini btn-success"><i class="icon-ok-sign"></i></a>
                                        <a href="_actions/edit_review.php?status=reject&review_id=<?php echo $pending_reviews['id']; ?>" data-toggle="tooltip" title="Reject" class="btn btn-mini btn-danger"><i class="icon-remove-sign"></i></a>
                                    </div>
                                </td>
                            </tr>
							<?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- END With Borders Section -->
                <!-- END With Borders Style -->

							
							</div>
							
							
                            <div class="tab-pane" id="example-tabs-profile">
							<?php // Approved Reviews  ?>
							
							<!-- With Borders Section -->
                <div class="block-section">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center" width="5%">Package</th>
								<th class="text-center" width="5%">Review</th>
								<th>Comments</th>
                                <th width="5%" class="span1 text-center"><i class="icon-bolt"></i></th>
                            </tr>
                        </thead>
                        <tbody>
						<?php $get_decided_reviews = mysql_query("SELECT * FROM reviews WHERE approval != 'unapproved'"); while ($decided_reviews = mysql_fetch_array($get_decided_reviews)) { ?>
                            <tr>
								<td class="span1 text-center"><?php echo ucfirst($decided_reviews['package']); ?></td>
                                <td class="span1 text-center"><?php echo $decided_reviews['rating']; ?> / 5</td>
								<td><?php echo $decided_reviews['comments']; ?></td>
                                <td class="span1 text-center">
                                    
                                        <?php if ($decided_reviews['approval'] == "approved") { ?><font color="green"><i class="icon-ok-sign"></i></font><?php } ?>
										<?php if ($decided_reviews['approval'] == "rejected") { ?><font color="red"><i class="icon-remove-sign"></i></font><?php } ?>
                                    
                                </td>
                            </tr>
							<?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- END With Borders Section -->
                <!-- END With Borders Style -->
							
							</div>
                        </div>
                    </div>
                    <!-- END Default Tabs Content -->
                </div>
                <!-- END Default Tabs Block -->
