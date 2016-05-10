<!-- General Forms Content -->

                        <form name="staff" action="_actions/add_code.php" method="post" class="form-horizontal">
                            <!-- Default Inputs -->
                            <h4 class="sub-header">Discount Code</h4>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Code Name</label>
                                <div class="controls">
                                    <input type="text" id="general-text" name="name" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Discount Amount</label>
                                <div class="controls">
                                    <input type="text" id="general-text" name="amount" required>
									<span class="help-block">In dollar value. <font color="red">Do NOT use a currency symbol.</font></span>
                                </div>
                            </div>
                            <!-- END Form Components -->

                            <!-- Form Buttons -->
                            <div class="form-actions">
                                <button type="reset" class="btn btn-danger"><i class="icon-repeat"></i> Reset</button>
                                <button type="submit" class="btn btn-success"><i class="icon-ok"></i> Submit</button>
                            </div>
                            <!-- END Form Buttons -->
                        </form>
                        <br><br><br><br>

                    <!-- END General Forms Content -->
