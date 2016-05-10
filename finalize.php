<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
<?php include('__primary/head.php'); session_start(); ?>
<?php include('_sql/sqlcon.php'); $temp_trans = @$_GET['t']; $get_trans_data = mysql_query("SELECT * FROM transactions WHERE ident = '$temp_trans'"); while ($trans_data = mysql_fetch_array($get_trans_data)) { $tprice = $trans_data['price']; $tproduct = $trans_data['product']; $tdiscount_code = $trans_data['discount_code']; } ?>
<?php

if ($tproduct == "Challenge Mode Gold Package: Pilot") { $spackage = "pilot"; }
if ($tproduct == "Challenge Mode Gold Package: Self-Play") { $spackage = "selfplay"; }
if ($tproduct == "Warlock Green Fire") { $spackage = "greenfire"; }
if ($tproduct == "Challenge Mode Gold Package: Realm First") { $spackage = "realmfirst"; }
$sprice = $tprice;
$sdcode = $tdiscount_code;
?>
	<body>

		<div class="body">
			<?php include('__primary/nav.php'); ?>

			<div role="main" class="main">

				<section class="page-top">
					<div class="slider-container">
						<div class="slider page-top-slider" data-plugin-options='{"startheight": 280}'>
							<ul>
								<li data-transition="fade" data-slotamount="1" data-masterspeed="300">

									<?php include('__primary/bcimage.php'); ?>

								</li>
							</ul>
						</div>
					</div>
					<div class="page-top-info with-slider container">
						<div class="row">
							<div class="col-md-12">
								<ul class="breadcrumb">
									<li><a href="index">Home</a></li>
									<li class="active">Finalize Order</li>
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<h2>Finalize Order</h2>
							</div>
						</div>
					</div>
				</section>

				<div class="container">

					<h2><strong>Contact</strong> Information</h2>

					<div class="row">
						<div class="col-md-12">
							<div class="alert alert-success">
								<strong>We've received your payment!</strong> Now we need you to fill out the following form so we know how to get in touch!
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6">
							<h4>Your Information</h4>
							<form action="_actions/orderentry.php" method="POST">
							<label>Real Name (<font color="red">*</font>)</label>
							<input type="text" value="" class="form-control" name="name" required><br>
							
							<label>Contact E-mail (<font color="red">*</font>)</label>
							<input type="text" value="" class="form-control" name="email" required><br>
							
							<label>Skype Username</label>
							<input type="text" value="" class="form-control" name="skypeu" ><br>
							
							<label>Skype Display Name</label>
							<input type="text" value="" class="form-control" name="skyped" ><br>
							
							<label>Phone Number (Country Code)</label><br>
							<select name="ccphone" id="countryCode">
								<option value=""></option>
								<option value="+1" label="United States (+1)">United States (+1)</option>
								<option value="+1" label="Canada (+1)">Canada (+1)</option>
								<option value="+86" label="China (+86)">China (+86)</option>
								<option value="+33" label="France (+33)">France (+33)</option>
								<option value="+49" label="Germany (+49)">Germany (+49)</option>
								<option value="+91" label="India (+91)">India (+91)</option>
								<option value="+81" label="Japan (+81)">Japan (+81)</option>
								<option value="+92" label="Pakistan (+92)">Pakistan (+92)</option>
								<option value="+44" label="United Kingdom (+44)">United Kingdom (+44)</option>
								<option value="" label="--">--</option>
								<option value="+7" label="Abkhazia (+7 840)">Abkhazia (+7 840)</option>
								<option value="+7" label="Abkhazia (+7 940)">Abkhazia (+7 940)</option>
								<option value="+93" label="Afghanistan (+93)">Afghanistan (+93)</option>
								<option value="+355" label="Albania (+355)">Albania (+355)</option>
								<option value="+213" label="Algeria (+213)">Algeria (+213)</option>
								<option value="+1 684" label="American Samoa (+1 684)">American Samoa (+1 684)</option>
								<option value="+376" label="Andorra (+376)">Andorra (+376)</option>
								<option value="+244" label="Angola (+244)">Angola (+244)</option>
								<option value="+1 264" label="Anguilla (+1 264)">Anguilla (+1 264)</option>
								<option value="+1 268" label="Antigua and Barbuda (+1 268)">Antigua and Barbuda (+1 268)</option>
								<option value="+54" label="Argentina (+54)">Argentina (+54)</option>
								<option value="+378" label="Armenia (+374)">Armenia (+374)</option>
								<option value="+297" label="Aruba (+297)">Aruba (+297)</option>
								<option value="+247" label="Ascension (+247)">Ascension (+247)</option>
								<option value="+61" label="Australia (+61)">Australia (+61)</option>
								<option value="+672" label="Australian External Territories (+672)">Australian External Territories (+672)</option>
								<option value="+43" label="Austria (+43)">Austria (+43)</option>
								<option value="+994" label="Azerbaijan (+994)">Azerbaijan (+994)</option>
								<option value="+1 242" label="Bahamas (+1 242)">Bahamas (+1 242)</option>
								<option value="+973" label="Bahrain (+973)">Bahrain (+973)</option>
								<option value="+880" label="Bangladesh (+880)">Bangladesh (+880)</option>
								<option value="+1 246" label="Barbados (+1 246)">Barbados (+1 246)</option>
								<option value="+1 268" label="Barbuda (+1 268)">Barbuda (+1 268)</option>
								<option value="+375" label="Belarus (+375)">Belarus (+375)</option>
								<option value="+32" label="Belgium (+32)">Belgium (+32)</option>
								<option value="+501" label="Belize (+501)">Belize (+501)</option>
								<option value="+229" label="Benin (+229)">Benin (+229)</option>
								<option value="+1 441" label="Bermuda (+1 441)">Bermuda (+1 441)</option>
								<option value="+975" label="Bhutan (+975)">Bhutan (+975)</option>
								<option value="+591" label="Bolivia (+591)">Bolivia (+591)</option>
								<option value="+387" label="Bosnia and Herzegovina (+387)">Bosnia and Herzegovina (+387)</option>
								<option value="+267" label="Botswana (+267)">Botswana (+267)</option>
								<option value="+55" label="Brazil (+55)">Brazil (+55)</option>
								<option value="+246" label="British Indian Ocean Territory (+246)">British Indian Ocean Territory (+246)</option>
								<option value="+1 284" label="British Virgin Islands (+1 284)">British Virgin Islands (+1 284)</option>
								<option value="+673" label="Brunei (+673)">Brunei (+673)</option>
								<option value="+359" label="Bulgaria (+359)">Bulgaria (+359)</option>
								<option value="+226" label="Burkina Faso (+226)">Burkina Faso (+226)</option>
								<option value="+257" label="Burundi (+257)">Burundi (+257)</option>
								<option value="+855" label="Cambodia (+855)">Cambodia (+855)</option>
								<option value="+237" label="Cameroon (+237)">Cameroon (+237)</option>
								<option value="+1" label="Canada (+1)">Canada (+1)</option>
								<option value="+238" label="Cape Verde (+238)">Cape Verde (+238)</option>
								<option value="+345" label="Cayman Islands (+ 345)">Cayman Islands (+ 345)</option>
								<option value="+236" label="Central African Republic (+236)">Central African Republic (+236)</option>
								<option value="+235" label="Chad (+235)">Chad (+235)</option>
								<option value="+56" label="Chile (+56)">Chile (+56)</option>
								<option value="+86" label="China (+86)">China (+86)</option>
								<option value="+61" label="Christmas Island (+61)">Christmas Island (+61)</option>
								<option value="+61" label="Cocos-Keeling Islands (+61)">Cocos-Keeling Islands (+61)</option>
								<option value="+57" label="Colombia (+57)">Colombia (+57)</option>
								<option value="+269" label="Comoros (+269)">Comoros (+269)</option>
								<option value="+242" label="Congo (+242)">Congo (+242)</option>
								<option value="+243" label="Congo, Dem. Rep. of (Zaire) (+243)">Congo, Dem. Rep. of (Zaire) (+243)</option>
								<option value="+682" label="Cook Islands (+682)">Cook Islands (+682)</option>
								<option value="+506" label="Costa Rica (+506)">Costa Rica (+506)</option>
								<option value="+225" label="Ivory Coast (+225)">Ivory Coast (+225)</option>
								<option value="+385" label="Croatia (+385)">Croatia (+385)</option>
								<option value="+53" label="Cuba (+53)">Cuba (+53)</option>
								<option value="+599" label="Curacao (+599)">Curacao (+599)</option>
								<option value="+537" label="Cyprus (+537)">Cyprus (+537)</option>
								<option value="+420" label="Czech Republic (+420)">Czech Republic (+420)</option>
								<option value="+45" label="Denmark (+45)">Denmark (+45)</option>
								<option value="+246" label="Diego Garcia (+246)">Diego Garcia (+246)</option>
								<option value="+253" label="Djibouti (+253)">Djibouti (+253)</option>
								<option value="+1 767" label="Dominica (+1 767)">Dominica (+1 767)</option>
								<option value="+1 809" label="Dominican Republic (+1 809)">Dominican Republic (+1 809)</option>
								<option value="+1 829" label="Dominican Republic (+1 829)">Dominican Republic (+1 829)</option>
								<option value="+1 849" label="Dominican Republic (+1 849)">Dominican Republic (+1 849)</option>
								<option value="+670" label="East Timor (+670)">East Timor (+670)</option>
								<option value="+56" label="Easter Island (+56)">Easter Island (+56)</option>
								<option value="+593" label="Ecuador (+593)">Ecuador (+593)</option>
								<option value="+20" label="Egypt (+20)">Egypt (+20)</option>
								<option value="+503" label="El Salvador (+503)">El Salvador (+503)</option>
								<option value="+240" label="Equatorial Guinea (+240)">Equatorial Guinea (+240)</option>
								<option value="+291" label="Eritrea (+291)">Eritrea (+291)</option>
								<option value="+372" label="Estonia (+372)">Estonia (+372)</option>
								<option value="+251" label="Ethiopia (+251)">Ethiopia (+251)</option>
								<option value="+500" label="Falkland Islands (+500)">Falkland Islands (+500)</option>
								<option value="+298" label="Faroe Islands (+298)">Faroe Islands (+298)</option>
								<option value="+679" label="Fiji (+679)">Fiji (+679)</option>
								<option value="+358" label="Finland (+358)">Finland (+358)</option>
								<option value="+33" label="France (+33)">France (+33)</option>
								<option value="+596" label="French Antilles (+596)">French Antilles (+596)</option>
								<option value="+594" label="French Guiana (+594)">French Guiana (+594)</option>
								<option value="+689" label="French Polynesia (+689)">French Polynesia (+689)</option>
								<option value="+241" label="Gabon (+241)">Gabon (+241)</option>
								<option value="+220" label="Gambia (+220)">Gambia (+220)</option>
								<option value="+995" label="Georgia (+995)">Georgia (+995)</option>
								<option value="+49" label="Germany (+49)">Germany (+49)</option>
								<option value="+233" label="Ghana (+233)">Ghana (+233)</option>
								<option value="+350" label="Gibraltar (+350)">Gibraltar (+350)</option>
								<option value="+30" label="Greece (+30)">Greece (+30)</option>
								<option value="+299" label="Greenland (+299)">Greenland (+299)</option>
								<option value="+1 473" label="Grenada (+1 473)">Grenada (+1 473)</option>
								<option value="+590" label="Guadeloupe (+590)">Guadeloupe (+590)</option>
								<option value="+1 671" label="Guam (+1 671)">Guam (+1 671)</option>
								<option value="+502" label="Guatemala (+502)">Guatemala (+502)</option>
								<option value="+224" label="Guinea (+224)">Guinea (+224)</option>
								<option value="+245" label="Guinea-Bissau (+245)">Guinea-Bissau (+245)</option>
								<option value="+595" label="Guyana (+595)">Guyana (+595)</option>
								<option value="+509" label="Haiti (+509)">Haiti (+509)</option>
								<option value="+504" label="Honduras (+504)">Honduras (+504)</option>
								<option value="+852" label="Hong Kong SAR China (+852)">Hong Kong SAR China (+852)</option>
								<option value="+36" label="Hungary (+36)">Hungary (+36)</option>
								<option value="+354" label="Iceland (+354)">Iceland (+354)</option>
								<option value="+91" label="India (+91)">India (+91)</option>
								<option value="+62" label="Indonesia (+62)">Indonesia (+62)</option>
								<option value="+98" label="Iran (+98)">Iran (+98)</option>
								<option value="+964" label="Iraq (+964)">Iraq (+964)</option>
								<option value="+353" label="Ireland (+353)">Ireland (+353)</option>
								<option value="+972" label="Israel (+972)">Israel (+972)</option>
								<option value="+39" label="Italy (+39)">Italy (+39)</option>
								<option value="+1 876" label="Jamaica (+1 876)">Jamaica (+1 876)</option>
								<option value="+81" label="Japan (+81)">Japan (+81)</option>
								<option value="+962" label="Jordan (+962)">Jordan (+962)</option>
								<option value="+7 7" label="Kazakhstan (+7 7)">Kazakhstan (+7 7)</option>
								<option value="+254" label="Kenya (+254)">Kenya (+254)</option>
								<option value="+686" label="Kiribati (+686)">Kiribati (+686)</option>
								<option value="+850" label="North Korea (+850)">North Korea (+850)</option>
								<option value="+82" label="South Korea (+82)">South Korea (+82)</option>
								<option value="+965" label="Kuwait (+965)">Kuwait (+965)</option>
								<option value="+996" label="Kyrgyzstan (+996)">Kyrgyzstan (+996)</option>
								<option value="+856" label="Laos (+856)">Laos (+856)</option>
								<option value="+371" label="Latvia (+371)">Latvia (+371)</option>
								<option value="+961" label="Lebanon (+961)">Lebanon (+961)</option>
								<option value="+266" label="Lesotho (+266)">Lesotho (+266)</option>
								<option value="+231" label="Liberia (+231)">Liberia (+231)</option>
								<option value="+218" label="Libya (+218)">Libya (+218)</option>
								<option value="+423" label="Liechtenstein (+423)">Liechtenstein (+423)</option>
								<option value="+370" label="Lithuania (+370)">Lithuania (+370)</option>
								<option value="+352" label="Luxembourg (+352)">Luxembourg (+352)</option>
								<option value="+853" label="Macau SAR China (+853)">Macau SAR China (+853)</option>
								<option value="+389" label="Macedonia (+389)">Macedonia (+389)</option>
								<option value="+261" label="Madagascar (+261)">Madagascar (+261)</option>
								<option value="+265" label="Malawi (+265)">Malawi (+265)</option>
								<option value="+60" label="Malaysia (+60)">Malaysia (+60)</option>
								<option value="+960" label="Maldives (+960)">Maldives (+960)</option>
								<option value="+223" label="Mali (+223)">Mali (+223)</option>
								<option value="+356" label="Malta (+356)">Malta (+356)</option>
								<option value="+692" label="Marshall Islands (+692)">Marshall Islands (+692)</option>
								<option value="+596" label="Martinique (+596)">Martinique (+596)</option>
								<option value="+222" label="Mauritania (+222)">Mauritania (+222)</option>
								<option value="+230" label="Mauritius (+230)">Mauritius (+230)</option>
								<option value="+262" label="Mayotte (+262)">Mayotte (+262)</option>
								<option value="+52" label="Mexico (+52)">Mexico (+52)</option>
								<option value="+691" label="Micronesia (+691)">Micronesia (+691)</option>
								<option value="+1 808" label="Midway Island (+1 808)">Midway Island (+1 808)</option>
								<option value="+691" label="Micronesia (+691)">Micronesia (+691)</option>
								<option value="+373" label="Moldova (+373)">Moldova (+373)</option>
								<option value="+377" label="Monaco (+377)">Monaco (+377)</option>
								<option value="+976" label="Mongolia (+976)">Mongolia (+976)</option>
								<option value="+382" label="Montenegro (+382)">Montenegro (+382)</option>
								<option value="+1664" label="Montserrat (+1664)">Montserrat (+1664)</option>
								<option value="+212" label="Morocco (+212)">Morocco (+212)</option>
								<option value="+95" label="Myanmar (+95)">Myanmar (+95)</option>
								<option value="+264" label="Namibia (+264)">Namibia (+264)</option>
								<option value="+674" label="Nauru (+674)">Nauru (+674)</option>
								<option value="+977" label="Nepal (+977)">Nepal (+977)</option>
								<option value="+31" label="Netherlands (+31)">Netherlands (+31)</option>
								<option value="+599" label="Netherlands Antilles (+599)">Netherlands Antilles (+599)</option>
								<option value="+1 869" label="Nevis (+1 869)">Nevis (+1 869)</option>
								<option value="+687" label="New Caledonia (+687)">New Caledonia (+687)</option>
								<option value="+64" label="New Zealand (64)">New Zealand (64)</option>
								<option value="+505" label="Nicaragua (+505)">Nicaragua (+505)</option>
								<option value="+227" label="Niger (+227)">Niger (+227)</option>
								<option value="+234" label="Nigeria (+234)">Nigeria (+234)</option>
								<option value="+683" label="Niue (+683)">Niue (+683)</option>
								<option value="+672" label="Norfolk Island (+672)">Norfolk Island (+672)</option>
								<option value="+1 670" label="Northern Mariana Islands (+1 670)">Northern Mariana Islands (+1 670)</option>
								<option value="+47" label="Norway (+47)">Norway (+47)</option>
								<option value="+968" label="Oman (+968)">Oman (+968)</option>
								<option value="+92" label="Pakistan (+92)">Pakistan (+92)</option>
								<option value="+680" label="Palau (+680)">Palau (+680)</option>
								<option value="+970" label="Palestinian Territory (+970)">Palestinian Territory (+970)</option>
								<option value="+507" label="Panama (+507)">Panama (+507)</option>
								<option value="+675" label="Papua New Guinea (+675)">Papua New Guinea (+675)</option>
								<option value="+595" label="Paraguay (+595)">Paraguay (+595)</option>
								<option value="+51" label="Peru (+51)">Peru (+51)</option>
								<option value="+63" label="Philippines (+63)">Philippines (+63)</option>
								<option value="+48" label="Poland (+48)">Poland (+48)</option>
								<option value="+351" label="Portugal (+351)">Portugal (+351)</option>
								<option value="+1 787" label="Puerto Rico (+1 787)">Puerto Rico (+1 787)</option>
								<option value="+1 939" label="Puerto Rico (+1 939)">Puerto Rico (+1 939)</option>
								<option value="+974" label="Qatar (+974)">Qatar (+974)</option>
								<option value="+262" label="Reunion (+262)">Reunion (+262)</option>
								<option value="+40" label="Romania (+40)">Romania (+40)</option>
								<option value="+7" label="Russia (+7)">Russia (+7)</option>
								<option value="+250" label="Rwanda (+250)">Rwanda (+250)</option>
								<option value="+685" label="Samoa (+685)">Samoa (+685)</option>
								<option value="+378" label="San Marino (+378)">San Marino (+378)</option>
								<option value="+966" label="Saudi Arabia (+966)">Saudi Arabia (+966)</option>
								<option value="+221" label="Senegal (+221)">Senegal (+221)</option>
								<option value="+381" label="Serbia (+381)">Serbia (+381)</option>
								<option value="+248" label="Seychelles (+248)">Seychelles (+248)</option>
								<option value="+232" label="Sierra Leone (+232)">Sierra Leone (+232)</option>
								<option value="+65" label="Singapore (+65)">Singapore (+65)</option>
								<option value="+421" label="Slovakia (+421)">Slovakia (+421)</option>
								<option value="+386" label="Slovenia (+386)">Slovenia (+386)</option>
								<option value="+677" label="Solomon Islands (+677)">Solomon Islands (+677)</option>
								<option value="+27" label="South Africa (+27)">South Africa (+27)</option>
								<option value="+500" label="South Georgia and the South Sandwich Islands (+500)">South Georgia and the South Sandwich Islands (+500)</option>
								<option value="+34" label="Spain (+34)">Spain (+34)</option>
								<option value="+94" label="Sri Lanka (+94)">Sri Lanka (+94)</option>
								<option value="+249" label="Sudan (+249)">Sudan (+249)</option>
								<option value="+597" label="Suriname (+597)">Suriname (+597)</option>
								<option value="+268" label="Swaziland (+268)">Swaziland (+268)</option>
								<option value="+46" label="Sweden (+46)">Sweden (+46)</option>
								<option value="+41" label="Switzerland (+41)">Switzerland (+41)</option>
								<option value="+963" label="Syria (+963)">Syria (+963)</option>
								<option value="+886" label="Taiwan (+886)">Taiwan (+886)</option>
								<option value="+992" label="Tajikistan (+992)">Tajikistan (+992)</option>
								<option value="+255" label="Tanzania (+255)">Tanzania (+255)</option>
								<option value="+66" label="Thailand (+66)">Thailand (+66)</option>
								<option value="+670" label="Timor Leste (+670)">Timor Leste (+670)</option>
								<option value="+228" label="Togo (+228)">Togo (+228)</option>
								<option value="+690" label="Tokelau (+690)">Tokelau (+690)</option>
								<option value="+676" label="Tonga (+676)">Tonga (+676)</option>
								<option value="+1 868" label="Trinidad and Tobago (+1 868)">Trinidad and Tobago (+1 868)</option>
								<option value="+216" label="Tunisia (+216)">Tunisia (+216)</option>
								<option value="+90" label="Turkey (+90)">Turkey (+90)</option>
								<option value="+993" label="Turkmenistan (+993)">Turkmenistan (+993)</option>
								<option value="+1 649" label="Turks and Caicos Islands (+1 649)">Turks and Caicos Islands (+1 649)</option>
								<option value="+688" label="Tuvalu (+688)">Tuvalu (+688)</option>
								<option value="+256" label="Uganda (+256)">Uganda (+256)</option>
								<option value="+380" label="Ukraine (+380)">Ukraine (+380)</option>
								<option value="+971" label="United Arab Emirates (+971)">United Arab Emirates (+971)</option>
								<option value="+44" label="United Kingdom (+44)">United Kingdom (+44)</option>
								<option value="+1" label="United States (+1)">United States (+1)</option>
								<option value="+598" label="Uruguay (+598)">Uruguay (+598)</option>
								<option value="+1 340" label="U.S. Virgin Islands (+1 340)">U.S. Virgin Islands (+1 340)</option>
								<option value="+998" label="Uzbekistan (+998)">Uzbekistan (+998)</option>
								<option value="+678" label="Vanuatu (+678)">Vanuatu (+678)</option>
								<option value="+58" label="Venezuela (+58)">Venezuela (+58)</option>
								<option value="+84" label="Vietnam (+84)">Vietnam (+84)</option>
								<option value="+1 808" label="Wake Island (+1 808)">Wake Island (+1 808)</option>
								<option value="+681" label="Wallis and Futuna (+681)">Wallis and Futuna (+681)</option>
								<option value="+967" label="Yemen (+967)">Yemen (+967)</option>
								<option value="+260" label="Zambia (+260)">Zambia (+260)</option>
								<option value="+255" label="Zanzibar (+255)">Zanzibar (+255)</option>
								<option value="+263" label="Zimbabwe (+263)">Zimbabwe (+263)</option>
								</select><br><br>
							
							<label>Phone Number</label>
							<input type="text" value="" class="form-control" name="phone" ><br>
							
							<label>PayPal E-mail</label>
							<input type="text" value="" class="form-control" name="ppemail" ><br>
							
							<label>Payment Amount</label>
							<input type="text" value="<?php echo $tprice; ?>" class="form-control" name="amount" disabled><br>
							
							<label>Package</label>
							<input type="text" value="<?php echo $tproduct; ?>" class="form-control" name="package" disabled>
						
						</div>
					

						<div class="col-md-6">
							<h4>Character Information</h4>
						
							<label>Character Name (<font color="red">*</font>)</label>
							<input type="text" value="" class="form-control" name="charname" required><br>
							
							<label>Class (<font color="red">*</font>)</label><br>
							<select name="class" id="select" required>
								<option></option>
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
							</select><br><br>
							
							<label>Primary Talents (<font color="red">*</font>)</label><br>
							<select name="spec" id="select" required>
								<option></option>
							  <option value="Blood">Blood</option>
							  <option value="Frost">Frost</option>
							  <option value="Unholy">Unholy</option>
							  <option value="Balance">Balance</option>
							  <option value="Feral (DPS)">Feral (DPS)</option>
							  <option value="Feral (Tank)">Feral (Tank)</option>
							  <option value="Restoration">Restoration</option>
							  <option value="Beast Mastery">Beast Mastery</option>
							  <option value="Marksmanship">Marksmanship</option>
							  <option value="Survival">Survival</option>
							  <option value="Arcane">Arcane</option>
							  <option value="Fire">Fire</option>
							  <option value="Frost">Frost</option>
							  <option value="Brewmaster">Brewmaster</option>
							  <option value="Mistweaver">Mistweaver</option>
							  <option value="Windwalker">Windwalker</option>
							  <option value="Holy">Holy</option>
							  <option value="Protection">Protection</option>
							  <option value="Retribution">Retribution</option>
							  <option value="Discipline">Discipline</option>
							  <option value="Holy">Holy</option>
							  <option value="Shadow">Shadow</option>
							  <option value="Assassination">Assassination</option>
							  <option value="Combat">Combat</option>
							  <option value="Subtlety">Subtlety</option>
							  <option value="Elemental">Elemental</option>
							  <option value="Enhancement">Enhancement</option>
							  <option value="Restoration">Restoration</option>
							  <option value="Affliction">Affliction</option>
							  <option value="Demonology">Demonology</option>
							  <option value="Destruction">Destruction</option>
							  <option value="Arms">Arms</option>
							  <option value="Fury">Fury</option>
							  <option value="Protection">Protection</option>
							</select><br><br>
							
							<label>Alternate Spec (x1) (<font color="red">*</font>)</label><br>
							<select name="spec2" id="select" required>
								<option></option>
								<option value="NA">No, I do not have a viable alternative specialization, or do not have the appropriate gear.</option>
								<option value="Blood">Blood</option>
								<option value="Frost">Frost</option>
								<option value="Unholy">Unholy</option>
								<option value="Balance">Balance</option>
								<option value="Feral (DPS)">Feral (DPS)</option>
								<option value="Feral (Tank)">Feral (Tank)</option>
								<option value="Restoration">Restoration</option>
								<option value="Beast Mastery">Beast Mastery</option>
								<option value="Marksmanship">Marksmanship</option>
								<option value="Survival">Survival</option>
								<option value="Arcane">Arcane</option>
								<option value="Fire">Fire</option>
								<option value="Frost">Frost</option>
								<option value="Brewmaster">Brewmaster</option>
								<option value="Mistweaver">Mistweaver</option>
								<option value="Windwalker">Windwalker</option>
								<option value="Holy">Holy</option>
								<option value="Protection">Protection</option>
								<option value="Retribution">Retribution</option>
								<option value="Discipline">Discipline</option>
								<option value="Holy">Holy</option>
								<option value="Shadow">Shadow</option>
								<option value="Assassination">Assassination</option>
								<option value="Combat">Combat</option>
								<option value="Subtlety">Subtlety</option>
								<option value="Elemental">Elemental</option>
								<option value="Enhancement">Enhancement</option>
								<option value="Restoration">Restoration</option>
								<option value="Affliction">Affliction</option>
								<option value="Demonology">Demonology</option>
								<option value="Destruction">Destruction</option>
								<option value="Arms">Arms</option>
								<option value="Fury">Fury</option>
								<option value="Protection">Protection</option>
							</select><br><br>
							
							<label>Alternate Spec (x2) (<font color="red">*</font>)</label><br>
							<select name="spec3" id="select" required>
								<option></option>
								<option value="NA">No, I do not have a viable alternative specialization, or do not have the appropriate gear.</option>
								<option value="Blood">Blood</option>
								<option value="Frost">Frost</option>
								<option value="Unholy">Unholy</option>
								<option value="Balance">Balance</option>
								<option value="Feral (DPS)">Feral (DPS)</option>
								<option value="Feral (Tank)">Feral (Tank)</option>
								<option value="Restoration">Restoration</option>
								<option value="Beast Mastery">Beast Mastery</option>
								<option value="Marksmanship">Marksmanship</option>
								<option value="Survival">Survival</option>
								<option value="Arcane">Arcane</option>
								<option value="Fire">Fire</option>
								<option value="Frost">Frost</option>
								<option value="Brewmaster">Brewmaster</option>
								<option value="Mistweaver">Mistweaver</option>
								<option value="Windwalker">Windwalker</option>
								<option value="Holy">Holy</option>
								<option value="Protection">Protection</option>
								<option value="Retribution">Retribution</option>
								<option value="Discipline">Discipline</option>
								<option value="Holy">Holy</option>
								<option value="Shadow">Shadow</option>
								<option value="Assassination">Assassination</option>
								<option value="Combat">Combat</option>
								<option value="Subtlety">Subtlety</option>
								<option value="Elemental">Elemental</option>
								<option value="Enhancement">Enhancement</option>
								<option value="Restoration">Restoration</option>
								<option value="Affliction">Affliction</option>
								<option value="Demonology">Demonology</option>
								<option value="Destruction">Destruction</option>
								<option value="Arms">Arms</option>
								<option value="Fury">Fury</option>
								<option value="Protection">Protection</option>
							</select><br><br>
							
							<label>Region (<font color="red">*</font>)</label><br>
							<select name="region" id="select" required>
								<option></option>
								<option value="US">North America (US, Oceanic)</option>
								<option value="EU">Europe</option>
							</select><br><br>
							
							<label>Faction (<font color="red">*</font>)</label><br>
							<select name="faction" id="select" required>
								<option></option>
								<option value="Horde">Horde</option>
								<option value="Alliance">Alliance</option>
							</select><br><br>
							
							<label>Realm (<font color="red">*</font>)</label><br>
							<select name="realm" id="select" required>
								<option></option>
								<option value="Aegwynn">Aegwynn</option>
								<option value="Aerie-Peak">Aerie Peak</option>
								<option value="Agamaggan">Agamaggan</option>
								<option value="Aggra(Português)">Aggra(Português)</option>
								<option value="Aggramar">Aggramar</option>
								<option value="AhnQiraj">Ahn'Qiraj</option>
								<option value="Akama">Akama</option>
								<option value="AlAkir">Al'Akir</option>
								<option value="Alexstrasza">Alexstrasza</option>
								<option value="Alleria">Alleria</option>
								<option value="Alonsus">Alonsus</option>
								<option value="Altar-of-Storms">Altar of Storms</option>
								<option value="Alterac-Mountains">Alterac Mountains</option>
								<option value="AmanThul">Aman'Thul</option>
								<option value="Ambossar">Ambossar</option>
								<option value="Anachronos">Anachronos</option>
								<option value="Andorhal">Andorhal</option>
								<option value="Anetheron">Anetheron</option>
								<option value="Antonidas">Antonidas</option>
								<option value="Anubarak">Anub'arak</option>
								<option value="Anvilmar">Anvilmar</option>
								<option value="Arak-arahm">Arak-arahm</option>
								<option value="Arathi">Arathi</option>
								<option value="Arathor">Arathor</option>
								<option value="Archimonde">Archimonde</option>
								<option value="Area-52">Area 52</option>
								<option value="Argent-Dawn">Argent Dawn</option>
								<option value="Arthas">Arthas</option>
								<option value="Arygos">Arygos</option>
								<option value="Aszune">Aszune</option>
								<option value="Auchindoun">Auchindoun</option>
								<option value="Azgalor">Azgalor</option>
								<option value="Azjol-Nerub">Azjol-Nerub</option>
								<option value="Azralon">Azralon</option>
								<option value="Azshara">Azshara</option>
								<option value="Azuremyst">Azuremyst</option>
								<option value="Baelgun">Baelgun</option>
								<option value="Balnazzar">Balnazzar</option>
								<option value="Barthilas">Barthilas</option>
								<option value="Black-Dragonflight">Black Dragonflight</option>
								<option value="Blackhand">Blackhand</option>
								<option value="Blackmoore">Blackmoore</option>
								<option value="Blackrock">Blackrock</option>
								<option value="Blackwater-Raiders">Blackwater Raiders</option>
								<option value="Blackwing-Lair">Blackwing Lair</option>
								<option value="Blades-Edge">Blade's Edge</option>
								<option value="Bladefist">Bladefist</option>
								<option value="Bleeding-Hollow">Bleeding Hollow</option>
								<option value="Bloodfeather">Bloodfeather</option>
								<option value="Blood-Furnace">Blood Furnace</option>
								<option value="Bloodhoof">Bloodhoof</option>
								<option value="Bloodscalp">Bloodscalp</option>
								<option value="Blutkessel">Blutkessel</option>
								<option value="Bonechewer">Bonechewer</option>
								<option value="Borean-Tundra">Borean Tundra</option>
								<option value="Boulderfist">Boulderfist</option>
								<option value="Bronzebeard">Bronzebeard</option>
								<option value="Bronze-Dragonflight">Bronze Dragonflight</option>
								<option value="Burning-Blade">Burning Blade</option>
								<option value="Burning-Legion">Burning Legion</option>
								<option value="Burning-Steppes">Burning Steppes</option>
								<option value="Caelestrasz">Caelestrasz</option>
								<option value="Cairne">Cairne</option>
								<option value="Cenarion-Circle">Cenarion Circle</option>
								<option value="Cenarius">Cenarius</option>
								<option value="Chamber-of-Aspects">Chamber of Aspects</option>
								<option value="Chogall">Cho'gall</option>
								<option value="Chromaggus">Chromaggus</option>
								<option value="Coilfang">Coilfang</option>
								<option value="Conseil-des-Ombres">Conseil des Ombres</option>
								<option value="Crushridge">Crushridge</option>
								<option value="Culte-de-la-Rive-Noire">Culte de la Rive Noire</option>
								<option value="Daggerspine">Daggerspine</option>
								<option value="Dalaran">Dalaran</option>
								<option value="Dalvengyr">Dalvengyr</option>
								<option value="Dark-Iron">Dark Iron</option>
								<option value="Darkmoon-Faire">Darkmoon Faire</option>
								<option value="Darksorrow">Darksorrow</option>
								<option value="Darkspear">Darkspear</option>
								<option value="Darrowmere">Darrowmere</option>
								<option value="Das-Konsortium">Das Konsortium</option>
								<option value="Das-Syndikat">Das Syndikat</option>
								<option value="DathRemar">Dath'Remar</option>
								<option value="Dawnbringer">Dawnbringer</option>
								<option value="Deathwing">Deathwing</option>
								<option value="Defias-Brotherhood">Defias Brotherhood</option>
								<option value="Demon-Soul">Demon Soul</option>
								<option value="Dentarg">Dentarg</option>
								<option value="Der-abyssische-Rat">Der abyssische Rat</option>
								<option value="Der-Mithrilorden">Der Mithrilorden</option>
								<option value="Der-Rat-von-Dalaran">Der Rat von Dalaran</option>
								<option value="Destromath">Destromath</option>
								<option value="Dethecus">Dethecus</option>
								<option value="Detheroc">Detheroc</option>
								<option value="Die-Aldor">Die Aldor</option>
								<option value="Die-Arguswacht">Die Arguswacht</option>
								<option value="Die-ewige-Wacht">Die ewige Wacht</option>
								<option value="Die-Nachtwache">Die Nachtwache</option>
								<option value="Die-Silberne-Hand">Die Silberne Hand</option>
								<option value="Die-Todeskrallen">Die Todeskrallen</option>
								<option value="Doomhammer">Doomhammer</option>
								<option value="Draenor">Draenor</option>
								<option value="Dragonblight">Dragonblight</option>
								<option value="Dragonmaw">Dragonmaw</option>
								<option value="Draktharon">Drak'tharon</option>
								<option value="Drakthul">Drak'thul</option>
								<option value="Draka">Draka</option>
								<option value="Drakkari">Drakkari</option>
								<option value="Dreadmaul">Dreadmaul</option>
								<option value="DrekThar">Drek'Thar</option>
								<option value="Drenden">Drenden</option>
								<option value="Dunemaul">Dunemaul</option>
								<option value="Dun-Morogh">Dun Morogh</option>
								<option value="Durotan">Durotan</option>
								<option value="Duskwood">Duskwood</option>
								<option value="Earthen-Ring">Earthen Ring</option>
								<option value="Echo-Isles">Echo Isles</option>
								<option value="Echsenkessel">Echsenkessel</option>
								<option value="Eitrigg">Eitrigg</option>
								<option value="EldreThalas">Eldre'Thalas</option>
								<option value="Elune">Elune</option>
								<option value="Emerald-Dream">Emerald Dream</option>
								<option value="Emeriss">Emeriss</option>
								<option value="Eonar">Eonar</option>
								<option value="Eredar">Eredar</option>
								<option value="Executus">Executus</option>
								<option value="Exodar">Exodar</option>
								<option value="Farstriders">Farstriders</option>
								<option value="Feathermoon">Feathermoon</option>
								<option value="Fenris">Fenris</option>
								<option value="Firetree">Firetree</option>
								<option value="Fizzcrank">Fizzcrank</option>
								<option value="Forscherliga">Forscherliga</option>
								<option value="Frostmane">Frostmane</option>
								<option value="Frostmourne">Frostmourne</option>
								<option value="Frostwhisper">Frostwhisper</option>
								<option value="Frostwolf">Frostwolf</option>
								<option value="Galakrond">Galakrond</option>
								<option value="Gallywix">Gallywix</option>
								<option value="Garithos">Garithos</option>
								<option value="Garona">Garona</option>
								<option value="Garrosh">Garrosh</option>
								<option value="Genjuros">Genjuros</option>
								<option value="Ghostlands">Ghostlands</option>
								<option value="Gilneas">Gilneas</option>
								<option value="Gnomeregan">Gnomeregan</option>
								<option value="Goldrinn">Goldrinn</option>
								<option value="Gorefiend">Gorefiend</option>
								<option value="Gorgonnash">Gorgonnash</option>
								<option value="Greymane">Greymane</option>
								<option value="Grim-Batol">Grim Batol</option>
								<option value="Grizzly-Hills">Grizzly Hills</option>
								<option value="Guldan">Gul'dan</option>
								<option value="Gundrak">Gundrak</option>
								<option value="Gurubashi">Gurubashi</option>
								<option value="Hakkar">Hakkar</option>
								<option value="Haomarush">Haomarush</option>
								<option value="Hellfire">Hellfire</option>
								<option value="Hellscream">Hellscream</option>
								<option value="Hydraxis">Hydraxis</option>
								<option value="Hyjal">Hyjal</option>
								<option value="Icecrown">Icecrown</option>
								<option value="Illidan">Illidan</option>
								<option value="Jaedenar">Jaedenar</option>
								<option value="JubeiThos">Jubei'Thos</option>
								<option value="Kaelthas">Kael'thas</option>
								<option value="Kalecgos">Kalecgos</option>
								<option value="Karazhan">Karazhan</option>
								<option value="Kargath">Kargath</option>
								<option value="Kazzak">Kazzak</option>
								<option value="KelThuzad">Kel'Thuzad</option>
								<option value="Khadgar">Khadgar</option>
								<option value="Khazgoroth">Khaz'goroth</option>
								<option value="Khaz-Modan">Khaz Modan</option>
								<option value="KilJaeden">Kil'Jaeden</option>
								<option value="Kilrogg">Kilrogg</option>
								<option value="Kirin-Tor">Kirin Tor</option>
								<option value="Korgall">Kor'gall</option>
								<option value="Korgath">Korgath</option>
								<option value="Korialstrasz">Korialstrasz</option>
								<option value="Kragjin">Krag'jin</option>
								<option value="Krasus">Krasus</option>
								<option value="Kult-der-Verdammten">Kult der Verdammten</option>
								<option value="Kul-Tiras">Kul Tiras</option>
								<option value="Laughing-Skull">Laughing Skull</option>
								<option value="Les-Clairvoyants">Les Clairvoyants</option>
								<option value="Les-Sentinelles">Les Sentinelles</option>
								<option value="Lethon">Lethon</option>
								<option value="Lightbringer">Lightbringer</option>
								<option value="Lightnings-Blade">Lightning's Blade</option>
								<option value="Lightninghoof">Lightninghoof</option>
								<option value="Llane">Llane</option>
								<option value="Lordaeron">Lordaeron</option>
								<option value="Lothar">Lothar</option>
								<option value="Madmortem">Madmortem</option>
								<option value="Madoran">Madoran</option>
								<option value="Maelstrom">Maelstrom</option>
								<option value="Magtheridon">Magtheridon</option>
								<option value="Maiev">Maiev</option>
								<option value="MalGanis">Mal'Ganis</option>
								<option value="Malfurion">Malfurion</option>
								<option value="Malorne">Malorne</option>
								<option value="Malygos">Malygos</option>
								<option value="Mannoroth">Mannoroth</option>
								<option value="Mazrigos">Mazrigos</option>
								<option value="Medivh">Medivh</option>
								<option value="Misha">Misha</option>
								<option value="Molten-Core">Molten Core</option>
								<option value="Moonglade">Moonglade</option>
								<option value="Moon-Guard">Moon Guard</option>
								<option value="Moonrunner">Moonrunner</option>
								<option value="Mugthol">Mug'thol</option>
								<option value="Muradin">Muradin</option>
								<option value="Nagrand">Nagrand</option>
								<option value="Nathrezim">Nathrezim</option>
								<option value="Naxxramas">Naxxramas</option>
								<option value="Nazgrel">Nazgrel</option>
								<option value="Nazjatar">Nazjatar</option>
								<option value="Nefarian">Nefarian</option>
								<option value="Nemesis">Nemesis</option>
								<option value="Neptulon">Neptulon</option>
								<option value="Nerzhul">Ner'zhul</option>
								<option value="Nerathor">Nera'thor</option>
								<option value="Nesingwary">Nesingwary</option>
								<option value="Nethersturm">Nethersturm</option>
								<option value="Nordrassil">Nordrassil</option>
								<option value="Norgannon">Norgannon</option>
								<option value="Nozdormu">Nozdormu</option>
								<option value="Onyxia">Onyxia</option>
								<option value="Outland">Outland</option>
								<option value="Perenolde">Perenolde</option>
								<option value="Proudmoore">Proudmoore</option>
								<option value="QuelDorei">Quel'Dorei</option>
								<option value="QuelThalas">Quel'Thalas</option>
								<option value="Ragnaros">Ragnaros</option>
								<option value="Rajaxx">Rajaxx</option>
								<option value="Rashgarroth">Rashgarroth</option>
								<option value="Ravencrest">Ravencrest</option>
								<option value="Ravenholdt">Ravenholdt</option>
								<option value="Rexxar">Rexxar</option>
								<option value="Rivendare">Rivendare</option>
								<option value="Runetotem">Runetotem</option>
								<option value="Sargeras">Sargeras</option>
								<option value="Saurfang">Saurfang</option>
								<option value="Scarlet-Crusade">Scarlet Crusade</option>
								<option value="Scarshield-Legion">Scarshield Legion</option>
								<option value="Scilla">Scilla</option>
								<option value="Senjin">Sen'jin</option>
								<option value="Sentinels">Sentinels</option>
								<option value="Shadow-Council">Shadow Council</option>
								<option value="Shadowmoon">Shadowmoon</option>
								<option value="Shadowsong">Shadowsong</option>
								<option value="Shandris">Shandris</option>
								<option value="Shattered-Halls">Shattered Halls</option>
								<option value="Shattered-Hand">Shattered Hand</option>
								<option value="Shattrath">Shattrath</option>
								<option value="ShuHalo">Shu'Halo</option>
								<option value="Silver-Hand">Silver Hand</option>
								<option value="Silvermoon">Silvermoon</option>
								<option value="Sinstralis">Sinstralis</option>
								<option value="Sisters-of-Elune">Sisters of Elune</option>
								<option value="Skullcrusher">Skullcrusher</option>
								<option value="Skywall">Skywall</option>
								<option value="Smolderthorn">Smolderthorn</option>
								<option value="Spinebreaker">Spinebreaker</option>
								<option value="Spirestone">Spirestone</option>
								<option value="Sporeggar">Sporeggar</option>
								<option value="Staghelm">Staghelm</option>
								<option value="Steamwheedle-Cartel">Steamwheedle Cartel</option>
								<option value="Stonemaul">Stonemaul</option>
								<option value="Stormrage">Stormrage</option>
								<option value="Stormreaver">Stormreaver</option>
								<option value="Stormscale">Stormscale</option>
								<option value="Sunstrider">Sunstrider</option>
								<option value="Suramar">Suramar</option>
								<option value="Sylvanas">Sylvanas</option>
								<option value="Taerar">Taerar</option>
								<option value="Talnivarr">Talnivarr</option>
								<option value="Tanaris">Tanaris</option>
								<option value="Tarren-Mill">Tarren Mill</option>
								<option value="Teldrassil">Teldrassil</option>
								<option value="Temple-noir">Temple noir</option>
								<option value="Terenas">Terenas</option>
								<option value="Terokkar">Terokkar</option>
								<option value="Terrordar">Terrordar</option>
								<option value="Thaurissan">Thaurissan</option>
								<option value="The-Forgotten-Coast">The Forgotten Coast</option>
								<option value="The-Maelstrom">The Maelstrom</option>
								<option value="Theradras">Theradras</option>
								<option value="The-Scryers">The Scryers</option>
								<option value="The-Shatar">The Sha'tar</option>
								<option value="The-Underbog">The Underbog</option>
								<option value="The-Venture-Co-EU">The Venture Co EU</option>
								<option value="The-Venture-Co-US">The Venture Co US</option>
								<option value="Thorium-Brotherhood">Thorium Brotherhood</option>
								<option value="Thrall">Thrall</option>
								<option value="ThrokFeroth">Throk'Feroth</option>
								<option value="Thunderhorn">Thunderhorn</option>
								<option value="Thunderlord">Thunderlord</option>
								<option value="Tichondrius">Tichondrius</option>
								<option value="Tirion">Tirion</option>
								<option value="Todeswache">Todeswache</option>
								<option value="Tol-Barad">Tol Barad</option>
								<option value="Tortheldrin">Tortheldrin</option>
								<option value="Trollbane">Trollbane</option>
								<option value="Turalyon">Turalyon</option>
								<option value="Twilights-Hammer">Twilight's Hammer</option>
								<option value="Twisting-Nether">Twisting Nether</option>
								<option value="Uldaman">Uldaman</option>
								<option value="Uldum">Uldum</option>
								<option value="UnGoro">Un'Goro</option>
								<option value="Undermine">Undermine</option>
								<option value="Ursin">Ursin</option>
								<option value="Uther">Uther</option>
								<option value="Varimathras">Varimathras</option>
								<option value="Vashj">Vashj</option>
								<option value="Veklor">Vek'lor</option>
								<option value="Veknilash">Vek'nilash</option>
								<option value="Velen">Velen</option>
								<option value="Voljin">Vol'jin</option>
								<option value="Warsong">Warsong</option>
								<option value="Whisperwind">Whisperwind</option>
								<option value="Wildhammer">Wildhammer</option>
								<option value="Windrunner">Windrunner</option>
								<option value="Winterhoof">Winterhoof</option>
								<option value="Wrathbringer">Wrathbringer</option>
								<option value="Wyrmrest-Accord">Wyrmrest Accord</option>
								<option value="Xavius">Xavius</option>
								<option value="Ysera">Ysera</option>
								<option value="Ysondre">Ysondre</option>
								<option value="Zangarmarsh">Zangarmarsh</option>
								<option value="Zenedar">Zenedar</option>
								<option value="Zirkel-des-Cenarius">Zirkel des Cenarius</option>
								<option value="Zuljin">Zul'jin</option>
								<option value="Zuluhed">Zuluhed</option>
							</select>
						
						</div>
					</div>
					
					<hr />
					
					<div class="row">
						<div class="col-md-6">
						
						<label>Discount / Referral Code</label>
						<input type="text" value="<?php echo $tdiscount_code; ?>" class="form-control" name="discountcode" disabled><br>
						
						<label>How did you hear about us?</label>
						<input type="text" value="" class="form-control" name="here_how" ><br>
						
						<input type="hidden" name="sprice" value="<?php echo $sprice; ?>">
						<input type="hidden" name="sproduct" value="<?php echo $spackage; ?>">
						<input type="hidden" name="sdcode" value="<?php echo $sdcode; ?>">
						
						<button href="#" type="submit" class="btn btn-primary btn-icon">Finalize!</button>
						</form>
						
						</div>
					</div>

				</div>

			</div>

<?php include('__primary/foot.php'); ?>

	</body>
</html>
