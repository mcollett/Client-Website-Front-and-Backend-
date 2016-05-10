<?php if ($_GET['appid']==NULL) { ?>
<table id="example-datatables" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
								<th>Name</td>
								<th>Email</th>
								<th>Skype</th>
								<th>Self Score (out of 40)</th>                                
                                <th class="span1 text-center"><i class="icon-bolt"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                <?php $get_num_apps = mysql_num_rows(mysql_query("SELECT id FROM applicants")); ?>
								<?php if ($get_num_apps == 0) { ?> <tr><td colspan="6"><center>No applicants founds.</center></td></tr> <?php } ?>
								<?php if ($get_num_apps > 0) { ?>
								<?php $get_app_info = mysql_query("SELECT * FROM  applicants ORDER BY id DESC"); ?>
								<?php while ($app_info = mysql_fetch_array($get_app_info)) { ?>
								<tr>
								<?php $prof_score = ($app_info['avail'] + $app_info['internet'] + $app_info['computer'] + $app_info['social']); ?>
								<td><?php echo $app_info['id']; ?></td>
								<td><?php echo $app_info['name']; ?></td>
								<td><?php echo $app_info['email']; ?></td>
								<td><?php echo $app_info['skype']; ?></td>
								<td><?php echo $prof_score; ?></td>
                                <td class="span1 text-center">
                                    <div class="btn-group">
                                        <a href="?page=applicants&appid=<?php echo $app_info['id']; ?>" data-toggle="tooltip" title="View" class="btn btn-mini btn-info"><i class="gemicon-small-search"></i></a>
                                        <a onclick="return confirm('Are you sure you want to remove this application permanently?');" data-toggle="tooltip" title="Delete" class="btn btn-mini btn-danger" href="_actions/delete_app.php?id=<?php echo $app_info['id']; ?>"><i class="icon-remove"></i></a>
                                    </div>
                                </td>
								</tr>
								<?php } ?>
								<?php } ?>
                            
                            
                        </tbody>
                    </table>
<?php } else { ?>

< <a href="content.php?page=applicants">Return to Applications</a><br><br>

<!-- Bordered Form Block -->
                <div class="block block-themed">
                    <!-- Bordered Form Title -->
                    <div class="block-title">
                        <h4>Application</h4>
                    </div>
                    <!-- END Bordered Form Title -->
<?php $get_app_info = mysql_query("SELECT * FROM  applicants WHERE id = '$_GET[appid]'"); ?>
<?php while ($app_info = mysql_fetch_array($get_app_info)) { ?>
                    <!-- Bordered Form Content -->
                    <div class="block-content block-content-flat">
                        <form action="#" method="post" class="form-horizontal form-bordered" onsubmit="return false;">
                            <div class="control-group">
                                <label class="control-label" for="bordered-text"><b>Name</b></label>
                                <div class="controls">
                                    <?php echo $app_info['name']; ?>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label" for="bordered-text"><b>Country</b></label>
                                <div class="controls">
                                    <?php echo $app_info['country']; ?>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label" for="bordered-text"><b>State</b></label>
                                <div class="controls">
                                    <?php echo $app_info['state']; ?>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label" for="bordered-text"><b>Phone</b></label>
                                <div class="controls">
                                    <?php echo $app_info['phone']; ?>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label" for="bordered-text"><b>Skype</b></label>
                                <div class="controls">
                                    <?php echo $app_info['skype']; ?>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label" for="bordered-text"><b>Email</b></label>
                                <div class="controls">
                                    <?php echo $app_info['email']; ?>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label" for="bordered-text"><b>Rating (Availability)</b></label>
                                <div class="controls">
                                    <?php echo $app_info['avail']; ?>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label" for="bordered-text"><b>Rating (Internet Stability)</b></label>
                                <div class="controls">
                                    <?php echo $app_info['internet']; ?>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label" for="bordered-text"><b>Rating (Computer Proficiency)</b></label>
                                <div class="controls">
                                    <?php echo $app_info['computer']; ?>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label" for="bordered-text"><b>Rating (Social Skills)</b></label>
                                <div class="controls">
                                    <?php echo $app_info['social']; ?>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label" for="bordered-text"><b>WoW Armory</b></label>
                                <div class="controls">
                                    <?php echo $app_info['wowarmory']; ?>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label" for="bordered-text"><b>How long have you been playing World of Warcraft? What other video games do you play? What are some noteable accomplishments you have achieved?</b></label>
                                <div class="controls">
                                    <?php echo $app_info['back1']; ?>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label" for="bordered-text"><b>Define what min/maxing means to you personally. Explain to us how important you think that is when it relates to challenge modes.</b></label>
                                <div class="controls">
                                    <?php echo $app_info['back2']; ?>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label" for="bordered-text"><b>What makes you different than the average player? Why would we choose YOU? Tell us why you're ready to become an actual professional gamer.</b></label>
                                <div class="controls">
                                    <?php echo $app_info['back3']; ?>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label" for="bordered-text"><b>Tell us something interesting about your life. We've been playing together for over a year now, and even after meeting online have gone on multiple vacations together. We're more than co-workers, we're friends. We want you to become a friend as well! Give us something to go on...</b></label>
                                <div class="controls">
                                    <?php echo $app_info['back4']; ?>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label" for="bordered-text"><b>Please list all of the classes and talent specializations you are an EXPERT in. If you are not 100% comfortable on a class do not say you are.</b></label>
                                <div class="controls">
                                    <?php echo $app_info['classprof']; ?>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="" class="btn btn-danger"><i class="icon-repeat"></i> Archive</button>
                                <button type="" class="btn btn-success"><i class="icon-ok"></i> Promote to Staff</button>
                            </div>
                        </form>
                    </div>
                    <!-- END Bordered Form Content -->
					<?php } ?>
                </div>
                <!-- END Bordered Form Block -->


<?php } ?>