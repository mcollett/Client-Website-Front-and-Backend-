<!-- Bordered with Labels Colored Form Block -->
                <div class="block block-themed block-last">
                    <!-- Bordered with Labels Colored Form Title -->
                    <div class="block-title">
                        <h4>Edit Staff Member</h4>
                    </div>
                    <!-- END Bordered with Labels Colored Form Title -->

                    <?php $get_client_data = mysql_query("SELECT * FROM staff WHERE id = '$_GET[id]'");
                            while ($client_data = mysql_fetch_array($get_client_data)) {
                     ?>

                    <!-- Bordered with Labels Colored Form Content -->
                    <div class="block-content block-content-flat">
                        <form action="_actions/edit_staff.php?id=<?php echo $client_data['id']; ?>" method="post" class="form-horizontal form-bordered form-labels">
                            <div class="control-group">
                                <label class="control-label" for="labels-text">Name</label>
                                <div class="controls">
                                    <input type="text" id="general-text" name="name" value="<?php echo $client_data['name']; ?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="labels-text">Phone</label>
                                <div class="controls">
                                    <input type="text" id="general-text" name="phone" value="<?php echo $client_data['phone']; ?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="labels-text">Email</label>
                                <div class="controls">
                                    <input type="text" id="general-text" name="email" value="<?php echo $client_data['email']; ?>">
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label" for="labels-text">Password</label>
                                <div class="controls">
                                    <input type="password" id="general-text" name="password" value="<?php echo $client_data['password']; ?>">
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success"><i class="icon-pencil"></i> Modify</button>
                            </div>
                        </form>
                        <?php } ?>
                    </div>
                    <!-- END Bordered with Labels Colored Form Content -->
                </div>
                <!-- END Bordered with Labels Colored Form Block -->
