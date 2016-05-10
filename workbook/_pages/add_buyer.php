<!-- Bordered with Labels Colored Form Block -->
                <div class="block block-themed block-last">
                    <!-- Bordered with Labels Colored Form Title -->
                    <div class="block-title">
                        <h4>Add Client</h4>
                    </div>
                    <!-- END Bordered with Labels Colored Form Title -->

                    <!-- Bordered with Labels Colored Form Content -->
                    <div class="block-content block-content-flat">
                        <form action="_actions/add_client.php" method="post" class="form-horizontal form-bordered form-labels">
                            <div class="control-group">
                                <label class="control-label" for="labels-text">Client Name</label>
                                <div class="controls">
                                    <input type="text" id="labels-text" name="clientname">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="labels-text">Character Name</label>
                                <div class="controls">
                                    <input type="text" id="labels-text" name="character-name">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="labels-text">Primary Talents</label>
                                <div class="controls">
                                    <input type="text" id="labels-text" name="primary-talents">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="labels-text">Secondary Talents</label>
                                <div class="controls">
                                    <input type="text" id="labels-text" name="secondary-talents">
                                    <span class="help-block">If none please type "NA" in the field.</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="labels-text">Tertiary Talents</label>
                                <div class="controls">
                                    <input type="text" id="labels-text" name="tertiary-talents">
                                    <span class="help-block">If none please type "NA" in the field.</span>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label" for="labels-select">Class</label>
                                <div class="controls">
                                    <select name="class" id="labels-select" size="1">
                                        <option value="Death Knight">Death Knight</option>
                                        <option value="Druid">Druid</option>
                                        <option value="Hunter">Hunter</option>
                                        <option value="Mage">Mage</option>
                                        <option value="Monk">Monk</option>
                                        <option value="Paladin">Paladin</option>
                                        <option value="Priest">Priest</option>
                                        <option value="Rogue">Rogue</option>
                                        <option value="Shaman">Shaman</option>
                                        <option value="Warlock">Warlock</option>
                                        <option value="Warrior">Warrior</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="labels-text">Realm</label>
                                <div class="controls">
                                    <input type="text" id="labels-text" name="realm">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="labels-select">Region</label>
                                <div class="controls">
                                    <select name="region" id="labels-select" size="1">
                                        <option value="US">North America</option>
                                        <option value="EU">Europe</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="labels-select">Faction</label>
                                <div class="controls">
                                    <select name="faction" id="labels-select" size="1">
                                        <option value="Horde">Horde</option>
                                        <option value="Alliance">Alliance</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="labels-text">Phone</label>
                                <div class="controls">
                                    <input type="text" id="labels-text" name="phone">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="labels-text">Skype Username</label>
                                <div class="controls">
                                    <input type="text" id="labels-text" name="skype-username">
                                    <span class="help-block">What the user logs in with. (The easiest way to add.)</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="labels-text">Skype Display Name</label>
                                <div class="controls">
                                    <input type="text" id="labels-text" name="skype-display">
                                    <span class="help-block">What is viewed via the Skype program.</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="labels-text">E-Mail</label>
                                <div class="controls">
                                    <input type="text" id="labels-text" name="email">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="labels-select">Package</label>
                                <div class="controls">
                                    <select name="package" id="labels-select" size="1">
                                        <option value="pilot">Pilot</option>
                                        <option value="selfplay">Self</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="labels-text">Payment Amount</label>
                                <div class="controls">
                                    <input type="text" id="labels-text" name="payment-amount">
                                    <span class="help-block">Do not include currency symbol.</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="labels-text">Referral Code</label>
                                <div class="controls">
                                    <input type="text" id="labels-text" name="raf-code">
                                    <span class="help-block">Must match valid RAF program enrollee code to qualify.</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="labels-textarea">Acquisition Details</label>
                                <div class="controls">
                                    <textarea id="labels-textarea" name="acq" rows="6"></textarea>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success"><i class="icon-plus"></i> Add</button>
                            </div>
                        </form>
                    </div>
                    <!-- END Bordered with Labels Colored Form Content -->
                </div>
                <!-- END Bordered with Labels Colored Form Block -->
