<div class="users form">
	<div class="row">
		<div class="panel panel-default panel-primary">
			<div class="panel-heading"><h3>
			<?php echo ( $this->params['action'] == 'add' ? __('Add User') : __('Edit User')); ?>
			</h3></div>
			<div class="panel-body">				  
				<?php echo $this->Form->create('User', array('type' => 'file')); ?>
				<?php echo $this->Form->input('id'); ?>
					<div class="form-group">
						<label class="control-label" for="UserRole"><?php echo __('Role'); ?></label>
						<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
						<?php
						$options = array('Coach' => 'Coach (Admin)', 'Coachee' => 'Coachee');
						$attributes = array('type'=>'select',
											'label' => false,
											'disabled' => true,
											'class' => 'form-control',
											'empty'=>__('---Select the role---'),
											'options' => $options
						);
						
						if ( $this->params['action'] == 'add' ) {
							$attributes['value'] = 'Coachee';
						}
						
						echo $this->Form->input('role',$attributes);
						
						unset($attributes['class']);
						unset($attributes['empty']);
						unset($attributes['disabled']);
						unset($attributes['options']);
						$attributes['type'] = 'hidden';
						
						echo $this->Form->input('role',$attributes);
						?>
					</div>
					
					<div class="form-group">
						<label class="control-label" for="UserName"><?php echo __('Name'); ?></label>
						<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						<?php
						$attributes = array('label' => false, 'class' => 'form-control','placeholder' => __('Insert the name',false));
						echo $this->Form->input('name',$attributes); 
						?>
					</div>
					
					<div class="form-group">
						<label class="control-label" for="UserSex"><?php echo __('Sex'); ?></label>
						<?php
						$options = array('M' => __('Masculine',false), 'F' => __('Feminine',false));
						$attributes = array(
							'label' => false, 
							'class' => 'form-control',
							'empty'=>__('---Select the sex---'),
							'options' => $options,
							'type' => 'select'
						);
						echo $this->Form->input('sex',$attributes); 
						?>
					</div>
					
					<div class="form-group">
						<label class="control-label" for="UserBirthday"><?php echo __('Birthday'); ?></label>
						<?php
						$attributes = array(
							'label' => false, 
							'class' => 'form-control datepicker',
							'placeholder' => __('Insert the birthday',false),
							'type' => 'text'
						);
						echo $this->Form->input('birthday',$attributes); 
						?>
					</div>
					
					<div class="form-group">
						<label class="control-label" for="UserOccupation"><?php echo __('Occupation'); ?></label>
						<?php
						$attributes = array('label' => false, 'class' => 'form-control','placeholder' => __('Insert the occupation',false));
						echo $this->Form->input('occupation',$attributes); 
						?>
					</div>

					<div class="form-group">
						<label class="control-label" for="UserEmail"><?php echo __('Email'); ?></label>
						<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						<?php
						$attributes = array('label' => false, 'class' => 'form-control','placeholder' => __('Insert the email',false));
						echo $this->Form->input('email',$attributes); 
						?>
					</div>

					<div class="form-group">
						<label class="control-label" for="UserUsername"><?php echo __('Username'); ?></label>
						<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						<?php
						$attributes = array('label' => false, 'class' => 'form-control','placeholder' => __('Insert the username',false));
						echo $this->Form->input('username',$attributes); 
						?>
					</div>

					<div class="form-group">
						<label class="control-label" for="UserPassword"><?php echo __('Password'); ?></label>
						<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
						<?php
						$attributes = array(
							'value' => '', 
							'label' => false, 
							'class' => 'form-control',
							'placeholder' => __('Insert the password',false)
						);
						echo $this->Form->input('password',$attributes); 
						?>
					</div>		

					<div class="form-group">
						<label class="control-label" for="UserPasswordConfirm"><?php echo __('Password Confirm'); ?></label>
						<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
						<?php
						$attributes = array(
							'value' => '', 
							'type' => 'password', 
							'label' => false, 
							'class' => 'form-control',
							'placeholder' => __('Insert the password confirmation',false)
						);
						echo $this->Form->input('password_confirm',$attributes); 
						?>
					</div>					
					
					<div class="form-group">
						<label class="control-label" for="UserAddress"><?php echo __('Address'); ?></label>
						<?php
						$attributes = array('label' => false, 'class' => 'form-control','placeholder' => __('Insert the address',false));
						echo $this->Form->input('address',$attributes); 
						?>
					</div>	

					<div class="form-group">
						<label class="control-label" for="UserCity"><?php echo __('City'); ?></label>
						<?php
						$attributes = array('label' => false, 'class' => 'form-control','placeholder' => __('Insert the city',false));
						echo $this->Form->input('city',$attributes); 
						?>
					</div>		

					<div class="form-group">
						<label class="control-label" for="UserState"><?php echo __('State'); ?></label>
						<?php
						$attributes = array('label' => false, 'class' => 'form-control','placeholder' => __('Insert the state',false));
						echo $this->Form->input('state',$attributes); 
						?>
					</div>
					<?php
					$countries = array(
						"AF" => "Afghanistan",
						"AL" => "Albania",
						"DZ" => "Algeria",
						"AS" => "American Samoa",
						"AD" => "Andorra",
						"AO" => "Angola",
						"AI" => "Anguilla",
						"AQ" => "Antarctica",
						"AG" => "Antigua and Barbuda",
						"AR" => "Argentina",
						"AM" => "Armenia",
						"AW" => "Aruba",
						"AU" => "Australia",
						"AT" => "Austria",
						"AZ" => "Azerbaijan",
						"BS" => "Bahamas",
						"BH" => "Bahrain",
						"BD" => "Bangladesh",
						"BB" => "Barbados",
						"BY" => "Belarus",
						"BE" => "Belgium",
						"BZ" => "Belize",
						"BJ" => "Benin",
						"BM" => "Bermuda",
						"BT" => "Bhutan",
						"BO" => "Bolivia",
						"BA" => "Bosnia and Herzegovina",
						"BW" => "Botswana",
						"BV" => "Bouvet Island",
						"BR" => "Brazil",
						"BQ" => "British Antarctic Territory",
						"IO" => "British Indian Ocean Territory",
						"VG" => "British Virgin Islands",
						"BN" => "Brunei",
						"BG" => "Bulgaria",
						"BF" => "Burkina Faso",
						"BI" => "Burundi",
						"KH" => "Cambodia",
						"CM" => "Cameroon",
						"CA" => "Canada",
						"CT" => "Canton and Enderbury Islands",
						"CV" => "Cape Verde",
						"KY" => "Cayman Islands",
						"CF" => "Central African Republic",
						"TD" => "Chad",
						"CL" => "Chile",
						"CN" => "China",
						"CX" => "Christmas Island",
						"CC" => "Cocos [Keeling] Islands",
						"CO" => "Colombia",
						"KM" => "Comoros",
						"CG" => "Congo - Brazzaville",
						"CD" => "Congo - Kinshasa",
						"CK" => "Cook Islands",
						"CR" => "Costa Rica",
						"HR" => "Croatia",
						"CU" => "Cuba",
						"CY" => "Cyprus",
						"CZ" => "Czech Republic",
						"CI" => "Côte d’Ivoire",
						"DK" => "Denmark",
						"DJ" => "Djibouti",
						"DM" => "Dominica",
						"DO" => "Dominican Republic",
						"NQ" => "Dronning Maud Land",
						"DD" => "East Germany",
						"EC" => "Ecuador",
						"EG" => "Egypt",
						"SV" => "El Salvador",
						"GQ" => "Equatorial Guinea",
						"ER" => "Eritrea",
						"EE" => "Estonia",
						"ET" => "Ethiopia",
						"FK" => "Falkland Islands",
						"FO" => "Faroe Islands",
						"FJ" => "Fiji",
						"FI" => "Finland",
						"FR" => "France",
						"GF" => "French Guiana",
						"PF" => "French Polynesia",
						"TF" => "French Southern Territories",
						"FQ" => "French Southern and Antarctic Territories",
						"GA" => "Gabon",
						"GM" => "Gambia",
						"GE" => "Georgia",
						"DE" => "Germany",
						"GH" => "Ghana",
						"GI" => "Gibraltar",
						"GR" => "Greece",
						"GL" => "Greenland",
						"GD" => "Grenada",
						"GP" => "Guadeloupe",
						"GU" => "Guam",
						"GT" => "Guatemala",
						"GG" => "Guernsey",
						"GN" => "Guinea",
						"GW" => "Guinea-Bissau",
						"GY" => "Guyana",
						"HT" => "Haiti",
						"HM" => "Heard Island and McDonald Islands",
						"HN" => "Honduras",
						"HK" => "Hong Kong SAR China",
						"HU" => "Hungary",
						"IS" => "Iceland",
						"IN" => "India",
						"ID" => "Indonesia",
						"IR" => "Iran",
						"IQ" => "Iraq",
						"IE" => "Ireland",
						"IM" => "Isle of Man",
						"IL" => "Israel",
						"IT" => "Italy",
						"JM" => "Jamaica",
						"JP" => "Japan",
						"JE" => "Jersey",
						"JT" => "Johnston Island",
						"JO" => "Jordan",
						"KZ" => "Kazakhstan",
						"KE" => "Kenya",
						"KI" => "Kiribati",
						"KW" => "Kuwait",
						"KG" => "Kyrgyzstan",
						"LA" => "Laos",
						"LV" => "Latvia",
						"LB" => "Lebanon",
						"LS" => "Lesotho",
						"LR" => "Liberia",
						"LY" => "Libya",
						"LI" => "Liechtenstein",
						"LT" => "Lithuania",
						"LU" => "Luxembourg",
						"MO" => "Macau SAR China",
						"MK" => "Macedonia",
						"MG" => "Madagascar",
						"MW" => "Malawi",
						"MY" => "Malaysia",
						"MV" => "Maldives",
						"ML" => "Mali",
						"MT" => "Malta",
						"MH" => "Marshall Islands",
						"MQ" => "Martinique",
						"MR" => "Mauritania",
						"MU" => "Mauritius",
						"YT" => "Mayotte",
						"FX" => "Metropolitan France",
						"MX" => "Mexico",
						"FM" => "Micronesia",
						"MI" => "Midway Islands",
						"MD" => "Moldova",
						"MC" => "Monaco",
						"MN" => "Mongolia",
						"ME" => "Montenegro",
						"MS" => "Montserrat",
						"MA" => "Morocco",
						"MZ" => "Mozambique",
						"MM" => "Myanmar [Burma]",
						"NA" => "Namibia",
						"NR" => "Nauru",
						"NP" => "Nepal",
						"NL" => "Netherlands",
						"AN" => "Netherlands Antilles",
						"NT" => "Neutral Zone",
						"NC" => "New Caledonia",
						"NZ" => "New Zealand",
						"NI" => "Nicaragua",
						"NE" => "Niger",
						"NG" => "Nigeria",
						"NU" => "Niue",
						"NF" => "Norfolk Island",
						"KP" => "North Korea",
						"VD" => "North Vietnam",
						"MP" => "Northern Mariana Islands",
						"NO" => "Norway",
						"OM" => "Oman",
						"PC" => "Pacific Islands Trust Territory",
						"PK" => "Pakistan",
						"PW" => "Palau",
						"PS" => "Palestinian Territories",
						"PA" => "Panama",
						"PZ" => "Panama Canal Zone",
						"PG" => "Papua New Guinea",
						"PY" => "Paraguay",
						"YD" => "People's Democratic Republic of Yemen",
						"PE" => "Peru",
						"PH" => "Philippines",
						"PN" => "Pitcairn Islands",
						"PL" => "Poland",
						"PT" => "Portugal",
						"PR" => "Puerto Rico",
						"QA" => "Qatar",
						"RO" => "Romania",
						"RU" => "Russia",
						"RW" => "Rwanda",
						"RE" => "Réunion",
						"BL" => "Saint Barthélemy",
						"SH" => "Saint Helena",
						"KN" => "Saint Kitts and Nevis",
						"LC" => "Saint Lucia",
						"MF" => "Saint Martin",
						"PM" => "Saint Pierre and Miquelon",
						"VC" => "Saint Vincent and the Grenadines",
						"WS" => "Samoa",
						"SM" => "San Marino",
						"SA" => "Saudi Arabia",
						"SN" => "Senegal",
						"RS" => "Serbia",
						"CS" => "Serbia and Montenegro",
						"SC" => "Seychelles",
						"SL" => "Sierra Leone",
						"SG" => "Singapore",
						"SK" => "Slovakia",
						"SI" => "Slovenia",
						"SB" => "Solomon Islands",
						"SO" => "Somalia",
						"ZA" => "South Africa",
						"GS" => "South Georgia and the South Sandwich Islands",
						"KR" => "South Korea",
						"ES" => "Spain",
						"LK" => "Sri Lanka",
						"SD" => "Sudan",
						"SR" => "Suriname",
						"SJ" => "Svalbard and Jan Mayen",
						"SZ" => "Swaziland",
						"SE" => "Sweden",
						"CH" => "Switzerland",
						"SY" => "Syria",
						"ST" => "São Tomé and Príncipe",
						"TW" => "Taiwan",
						"TJ" => "Tajikistan",
						"TZ" => "Tanzania",
						"TH" => "Thailand",
						"TL" => "Timor-Leste",
						"TG" => "Togo",
						"TK" => "Tokelau",
						"TO" => "Tonga",
						"TT" => "Trinidad and Tobago",
						"TN" => "Tunisia",
						"TR" => "Turkey",
						"TM" => "Turkmenistan",
						"TC" => "Turks and Caicos Islands",
						"TV" => "Tuvalu",
						"UM" => "U.S. Minor Outlying Islands",
						"PU" => "U.S. Miscellaneous Pacific Islands",
						"VI" => "U.S. Virgin Islands",
						"UG" => "Uganda",
						"UA" => "Ukraine",
						"SU" => "Union of Soviet Socialist Republics",
						"AE" => "United Arab Emirates",
						"GB" => "United Kingdom",
						"US" => "United States",
						"ZZ" => "Unknown or Invalid Region",
						"UY" => "Uruguay",
						"UZ" => "Uzbekistan",
						"VU" => "Vanuatu",
						"VA" => "Vatican City",
						"VE" => "Venezuela",
						"VN" => "Vietnam",
						"WK" => "Wake Island",
						"WF" => "Wallis and Futuna",
						"EH" => "Western Sahara",
						"YE" => "Yemen",
						"ZM" => "Zambia",
						"ZW" => "Zimbabwe",
						"AX" => "Åland Islands",
					);					
					?>
					<div class="form-group">
						<label class="control-label" for="UserCountry"><?php echo __('Country'); ?></label>
						<?php
						$attributes = array(
							'label' => false, 
							'class' => 'form-control',
							'empty'=>__('---Select the country---'),
							'options' => $countries,
							'type' => 'select'
						);
						echo $this->Form->input('country',$attributes); 
						?>
					</div>
					<?php
					$languages = array(
						'en-US' => 'English - United States',
						'en-GB' => 'English - United Kingdom',
						'pt-PT' => 'Portuguese - Portugal',
						'pt-BR' => 'Portuguese - Brazil',
						'es-ES' => 'Spanish'
					);
					?>
					<div class="form-group">
						<label class="control-label" for="UserLanguage"><?php echo __('Language'); ?></label>
						<?php
						$attributes = array(
							'label' => false, 
							'class' => 'form-control',
							'empty'=>__('---Select the language---'),
							'type' => 'select',
							'options' => $languages
						);
						echo $this->Form->input('language',$attributes); 
						?>
					</div>						
					<?php
					$currencies = array(
						'USD' => 'American Dolar',
						'EUR' => 'Euro',
						'BRL' => 'Brazilian Real'
					);
					?>
					<div class="form-group">
						<label class="control-label" for="UserCurrency"><?php echo __('Currency'); ?></label>
						<?php
						$attributes = array(
							'label' => false, 
							'class' => 'form-control',
							'empty'=>__('---Select the currency---'),
							'type' => 'select',
							'options' => $currencies
						);
						echo $this->Form->input('currency',$attributes); 
						?>
					</div>			

					<div class="form-group">
						<label class="control-label" for="UserZip"><?php echo __('Zip'); ?></label>
						<?php
						$attributes = array('label' => false, 'class' => 'form-control','placeholder' => __('Insert the zip',false));
						echo $this->Form->input('zip',$attributes); 
						?>
					</div>		

					<div class="form-group">
						<label class="control-label" for="UserPhone"><?php echo __('Phone'); ?></label>
						<?php
						$attributes = array('label' => false, 'class' => 'form-control','placeholder' => __('Insert the phone',false));
						echo $this->Form->input('phone',$attributes); 
						?>
					</div>		
					
					<div class="form-group">
						<label class="control-label" for="UserMobile"><?php echo __('Mobile'); ?></label>
						<?php
						$attributes = array('label' => false, 'class' => 'form-control','placeholder' => __('Insert the mobile',false));
						echo $this->Form->input('mobile',$attributes); 
						?>
					</div>
					
					<div class="form-group">
						<label class="control-label" for="UserSkype"><?php echo __('Skype'); ?></label>
						<?php
						$attributes = array('label' => false, 'class' => 'form-control','placeholder' => __('Insert the skype',false));
						echo $this->Form->input('skype',$attributes); 
						?>
					</div>
					
					<div class="form-group">
						<label class="control-label" for="UserFacebook"><?php echo __('Facebook'); ?></label>
						<?php
						$attributes = array('label' => false, 'class' => 'form-control','placeholder' => __('Insert the facebook',false));
						echo $this->Form->input('facebook',$attributes); 
						?>
					</div>

					<div class="form-group">
						<label class="control-label" for="UserLinkedin"><?php echo __('Linkedin'); ?></label>
						<?php
						$attributes = array('label' => false, 'class' => 'form-control','placeholder' => __('Insert the linkedin',false));
						echo $this->Form->input('linkedin',$attributes); 
						?>
					</div>
					
					<div class="form-group">
						<label class="control-label" for="UserTwitter"><?php echo __('Twitter'); ?></label>
						<?php
						$attributes = array('label' => false, 'class' => 'form-control','placeholder' => __('Insert the twitter',false));
						echo $this->Form->input('twitter',$attributes); 
						?>
					</div>

					<div class="form-group">
						<label class="control-label" for="UserSite"><?php echo __('Site'); ?></label>
						<?php
						$attributes = array('label' => false, 'class' => 'form-control','placeholder' => __('Insert the site',false));
						echo $this->Form->input('site',$attributes); 
						?>
					</div>						

					<div class="form-group">
						<label class="control-label" for="UserPhoto"><?php echo __('Photo'); ?>&nbsp;<span class="badge">160X160</span></label>
						<?php
						$attributes = array(
							'type' => 'file',
							'label' => false, 
							'class' => 'form-control',
						);
						echo $this->Form->input('photo', $attributes);
						?>
					</div>			
					
					<div class="form-group">
                        <div class="col-sm-12 col-md-6">
                            <?php						
                            echo $this->Form->button(__('Save',false), array('type' => 'submit','class' => 'btn btn-primary btn-lg btn-block mb5')); 
                            echo $this->Form->end();
                            ?>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <?php echo $this->Html->link(__('Cancel'), array('action' => 'index'),array('class' => 'btn btn-danger btn-lg btn-block')); ?>                     
                        </div>                    
					</div>	
			</div>
		</div>
	</div>
</div>