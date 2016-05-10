<!-- General Forms Content -->

                        <form name="staff" action="_actions/add_staff.php" method="post" class="form-horizontal">
                            <!-- Default Inputs -->
                            <h4 class="sub-header">Staff Member</h4>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Name</label>
                                <div class="controls">
                                    <input type="text" id="general-text" name="name">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Position</label>
                                <div class="controls">
                                    <input type="text" id="general-text" name="position" value="Contractor">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Phone</label>
                                <div class="controls">
                                    <input type="text" id="general-text" name="phone">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="phone-carrier">Phone Carrier</label>
                                <div class="controls">
                                    <select id="phone-carrier" name="carrier" class="select-chosen">
                                        <option value=""></option>
										<option value="@txt.att.net">AT&T</option>
                                        <option value="@vtext.com">Verizon</option>
                                    </select>
                                    <span class="help-block">Used for MMS when a run is scheduled.</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">E-mail</label>
                                <div class="controls">
                                    <input type="text" id="general-text" name="email">
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
