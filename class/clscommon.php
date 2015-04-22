<?php

		class common {

				public static function set_value ( $strvalue="" ) {

					$strreturn = "";

					$strreturn = strip_tags ( trim( $strvalue ) );

					$strreturn = addslashes ( trim( $strreturn ) );

					return $strreturn;

				}

				

				public static function get_value ( $strvalue = "" ) {

					$strreturn = "";

					if ( ! ( is_array($strvalue) && count($strvalue) ) ) {

						$strreturn = stripcslashes( trim ( $strvalue ) ); 

					}

					else {

						$strreturn = $strvalue;	

					}

					return $strreturn;

				}

				

				public static function get_value_front ( $strvalue = "" ) {

					$strreturn = "";

					if ( ! ( is_array($strvalue) && count($strvalue) ) ) {

						$strreturn = stripcslashes( trim ( $strvalue ) ); 

					}

					else {

						$strreturn = $strvalue;	

					}

					$strreturn = strip_tags ( trim( $strreturn ), ALLOWED_TAGS );

					return $strreturn;

				}

				

				public static function db_compatible_text ( $text ) {

					$text = strip_tags ( trim( $text ), ALLOWED_TAGS );

					$text = addslashes ( trim( $text ) );

					return $text;

				}

				

				public static function db_compatible_text_cms ( $text ) {

					$text = strip_tags ( trim( $text ), ALLOWED_TAGS );

					$text = addslashes ( trim( $text ) );

					return $text;

				}

				

				public static function set_ucwords($str)

				{

						$ucword_return = ucwords(strtolower($str));

						

						return $ucword_return;

				}

			

				public static function set_message ( $message_no, $error_string = '' ) {

					self::set_session(MESSAGE_SESSION, array($message_no, $error_string));

				}

				

				public static function do_show_message ( ) {

					return self::check_session(MESSAGE_SESSION);

				}

				

				public static function encrypt_data ( $value ) {

					

					$return = $value;

					

					$return = strtr(base64_encode(addslashes(gzcompress(serialize($value),9))), '+/=', '-_,');

					

					return $return;

						

				}

				

				public static function decrypt_data ( $value ) {

					

					$return = $value;

					

					$return = unserialize(gzuncompress(stripslashes(base64_decode(strtr($value, '-_,', '+/=')))));

					

					return $return;

						

				}

				

				public static function show_message ( $entity = '' ) {

					$strmessage_title = '';

					$strmessage_sentence = '';

					$error = false;

					$strtemplate = '';

					$message_input = self::get_session(MESSAGE_SESSION);

					

					switch ( intval($message_input[0])  ) {

						case 1:

							$strmessage_title = $entity . ' Active/Inactive Status';

							$strmessage_sentence = $entity . ' Active/Inactive status has been set successfully.';	

							$error = false;

							break;

						

						case 101:

							$strmessage_title = $entity . ' Status';

							$strmessage_sentence = $entity . ' status has been set successfully.';	

							$error = false;

							break;

								

						case 2:

							$strmessage_title = 'Delete ' . $entity;

							$strmessage_sentence = 'Selected ' . strtolower($entity) . '(s) has been deleted successfully.';	

							$error = false;

							break;

						case 3:

							$strmessage_title = 'New ' . $entity;

							$strmessage_sentence = $entity . ' details has been added successfully.';	

							$error = false;

							break;

						case 4:

							$strmessage_title = 'Edit ' . $entity;

							$strmessage_sentence = $entity . ' details has been saved successfully.';	

							$error = false;

							break;

						case 5:

							$strmessage_title = 'Admin Login';

							$strmessage_sentence = 'Please enter valid user name or password.';	

							$error = true;

							break;



						case 6:

							$strmessage_title = 'Logout';

							$strmessage_sentence = 'You have logged out successfully.';	

							$error = false;

							break;

						case 7:

							$strmessage_title = 'Login';

							$strmessage_sentence = 'Please login to get access to payroll.';	

							$error = true;

							break;

						case 8:

							$strmessage_title = 'Change Password';

							$strmessage_sentence = 'Password was not found. Please try again.';	

							$error = true;

							break;

						case 9:

							$strmessage_title = 'Change Password';

							$strmessage_sentence = 'Password has been successfully changed.';	

							$error = false;

							break;

						case 10:

							$strmessage_title = 'Featured '  . $entity;

							$strmessage_sentence = 'Selected records has been set as featured item.';	

							$error = false;

							break;

						case 11:

							$strmessage_title = 'Delete ' . $entity;

							$strmessage_sentence = 'Please select at least one record which you want to delete. ';	

							$error = true;

							break;

		

						case 13:

							$strmessage_title = 'Login';

							$strmessage_sentence = 'Please enter valid email or password.';	

							$error = true;

							break;

						case 14:

							$strmessage_title = 'Forgot Password';

							$strmessage_sentence = 'Password has been successfully sent.';	

							$error = false;

							break;

						case 15:

							$strmessage_title = 'Forgot Password';

							$strmessage_sentence = 'Email was not found. Please try again.';	

							$error = true;

							break;	

						case 16:

							$strmessage_title = 'Duplicate Record';

							$strmessage_sentence = 'Duplicate Email Found! Please try another email.';	

							$error = true;

							break;

						case 17:

							$strmessage_title = 'Change Password';

							$strmessage_sentence = 'Password was not found. Please try again.';	

							$error = true;

							break;	
							
							
						case 20:

							$strmessage_title = 'RFQ';

							$strmessage_sentence = 'Product has been successfully added to RFQ.';	

							$error = false;

							break;
							
						case 21:

							$strmessage_title = 'RFQ';

							$strmessage_sentence = 'You have already added this product to RFQ.';	

							$error = true;

							break;
							
						case 22:

							$strmessage_title = 'RFQ';

							$strmessage_sentence = 'Product has been successfully deleted from RFQ.';	

							$error = false;

							break;

									

					}

					

					if ( intval($message_input[0]) > 0 ) {

						$template_file = ADMIN_THEME . 'templates/message-template.html';

						if ( ! ( file_exists($template_file) && is_file($template_file) ) ) {

							$template_file = ADMIN_PATH . ADMIN_THEME . 'templates/message-template.html';

						}

						$strtemplate = self::read_file($template_file);

						if ( $error ) {

							$template_file = ADMIN_THEME . 'templates/error-template.html';

							if ( ! ( file_exists($template_file) && is_file($template_file) ) ) {

								$template_file = ADMIN_PATH . ADMIN_THEME . 'templates/error-template.html';	

							}

							$strtemplate = self::read_file($template_file);

						}
						
						
						

						$strtemplate = str_replace('##current_template##', ADMIN_THEME, $strtemplate);

						$strtemplate = str_replace('##message_title##',$strmessage_title,$strtemplate);

						$strtemplate = str_replace('##message_sentence##',$strmessage_sentence,$strtemplate);

					}

					

					if ( trim($message_input[1]) != '' ) {

						$template_file = ADMIN_THEME . 'templates/validation-template.html';

						if ( ! ( file_exists($template_file) && is_file($template_file) ) ) {

							$template_file = ADMIN_PATH . ADMIN_THEME . 'templates/validation-template.html';	

						}

						$strtemplate = self::read_file($template_file);

						$strtemplate = str_replace('##current_template##', ADMIN_THEME, $strtemplate);

						$strtemplate = str_replace('##error_sentence##',trim($message_input[1]), $strtemplate);

					}

					

					self::remove_message();

					return $strtemplate;

				}

								

				public static function remove_message ( ) {

					self::remove_session(MESSAGE_SESSION);

				}

				

				

				public static function get_session_key ( $key ) {

					return SESSION_PREFIX . $key;

				}

				

				public static function set_session ( $key, $value ) {

					$key = self::get_session_key($key);

					$_SESSION[$key] = self::encrypt_data($value);

				}

				

				public static function remove_session ( $key ) {

					$key = self::get_session_key($key);

					if ( isset($_SESSION[$key]) ) {

						unset($_SESSION[$key]);

					}

				}

				

				public static function check_session ( $key ) {

					$key = self::get_session_key($key);

					if ( isset($_SESSION[$key]) ) {

						return true;

					}

					return false;

				}

				

				public static function get_session ( $key ) {

					$key = self::get_session_key($key);

					if ( isset($_SESSION[$key]) ) {

						return self::decrypt_data($_SESSION[$key]);

					}

				}

				

				public static function read_file ( $file, $array_form = false ) {

					if ( file_exists($file) && is_file($file) && is_readable($file) ) {

						$strreturn = '';

						$arreturn = array();

						$file_handle = @fopen($file, 'r');

						if ($file_handle) {

							while (!feof($file_handle)) {

								if ( $array_form == false ) {

									$strreturn  .= fgets($file_handle, 4096);
									

								}

								else {

									$arreturn[] = fgets($file_handle, 4096);
									///exit;

								}

							}

							fclose($file_handle);

						}				

						if ( $array_form == false ) {

							return $strreturn;

						}

						else {

							return $arreturn;

						}

					}

					return false;

				}



				

				public static function redirect_to ( $page ) {

					if ( ! headers_sent() ) {

						header('Location: ' . $page);

						exit();

					}

					else {

						echo '<script type="text/javascript" language="javascript">window.location.href=\'' . $page . '\'</script>';	

					}

				}

				

				

				public static function redirect_to_new ( $page ) {





					echo '<script type="text/javascript" language="javascript">top.document.location=\'' . $page . '\'</script>';

					echo "<script>window.close()</script>";

					

					

				}



				public static function get_current_page ( ) {

					return basename($_SERVER['REQUEST_URI']);

				}

				

				

				public static function login_user ( $user_name, $password ) {

					$boolvalid_user = false;

					$strquery = 'SELECT user_id, user_name, user_group_id FROM ' . DB_PREFIX . 'users WHERE user_active = \'y\' AND user_name = \''.$user_name.'\' AND password = \'' . self::encrypt_value($password) . '\'';

					$rsuser = mysql_query($strquery) or die(mysql_error());

					if ( $rsuser && mysql_num_rows($rsuser) ) {

						$aruser = mysql_fetch_assoc($rsuser);

						self::set_session(ADMIN_LOGIN_USER_ID, self::get_value((int)$aruser['user_id']));

						self::set_session(ADMIN_LOGIN_USER_NAME, self::get_value($aruser['user_name']));

						self::set_session(ADMIN_LOGIN_USER_GROUP_ID, self::get_value($aruser['user_group_id']));

						$boolvalid_user = true;

					}

					mysql_free_result($rsuser);

					return $boolvalid_user;

				}

				

				public static function logout_user ( ) {

					self::remove_session(ADMIN_LOGIN_USER_ID);	

					self::remove_session(ADMIN_LOGIN_USER_NAME);	

					self::remove_session(ADMIN_LOGIN_USER_GROUP_ID);	

				}

				

				

				public static function is_user_loggedin ( ) {

					return self::check_session(ADMIN_LOGIN_USER_ID) && self::check_session(ADMIN_LOGIN_USER_NAME) && self::check_session(ADMIN_LOGIN_USER_GROUP_ID);

				}

				

				public static function change_password ( $old_password, $new_password ) {

					$intuser_id = self::get_session(ADMIN_LOGIN_USER_ID);

					$strquery = 'UPDATE ' . DB_PREFIX . 'users SET password = \''.self::encrypt_value($new_password).'\' WHERE user_id = '.$intuser_id.' AND password = \''.self::encrypt_value($old_password).'\'';
					


					mysql_query($strquery) or die(mysql_error());

					return mysql_affected_rows();

				}



				

				public static function upload_file ( $file_control, $upload_dir, $file_prefix ) {

					$strreturn = '';

						$strold_file = trim($_FILES[$file_control]['tmp_name']);

						$arupload_file_info = pathinfo($_FILES[$file_control]['name']);

						if ( is_array($arupload_file_info) && count($arupload_file_info) ) {

							$strfile_extension = strtolower(trim($arupload_file_info['extension']));

							

							$strnew_file_name = $file_prefix . '.' . $strfile_extension;

							$strfull_path = $upload_dir . $strnew_file_name;

							if ( copy($strold_file, $strfull_path) ) {

							 $strreturn = $strnew_file_name;

							}

						}



					return $strreturn;

				}

				

				public static function upload_file_new ( $file_control, $upload_dir, $file_prefix, $file_index ) {

					$strreturn = '';

						$strold_file = trim($_FILES[$file_control]['tmp_name'][$file_index]);

						$arupload_file_info = pathinfo($_FILES[$file_control]['name'][$file_index]);

						if ( is_array($arupload_file_info) && count($arupload_file_info) ) {

							$strfile_extension = strtolower(trim($arupload_file_info['extension']));

							$strnew_file_name = $file_prefix . '_' . $file_index . '.' . $strfile_extension;

							$strfull_path = $upload_dir . $strnew_file_name;

							if ( copy($strold_file, $strfull_path) ) {

								$strreturn = $strnew_file_name;

							}

						}



					return $strreturn;

				}

				

				public static function time_stamp ( $format = 'Y-m-d' ) {

					return date($format);

				}

				

				public static function record_exists ( $table, $condition ) {

					$boolreturn = false;

					$strquery = "SELECT * FROM " . DB_PREFIX . $table . " WHERE " . $condition . " LIMIT 1";

					$recordset = mysql_query($strquery) or die(mysql_error());

					if ( $recordset && mysql_num_rows($recordset) ) {

						$boolreturn = true;

					}

					mysql_free_result($recordset);

					return $boolreturn;

				}

				

				public static function get_field_value ( $table, $field, $condition = '1=1' ) {

					$return_value = '';

					$strquery = 'SELECT '. $field . ' FROM ' . DB_PREFIX . $table . ' WHERE ' . $condition . ' LIMIT 1';

					$recordset = mysql_query($strquery) or die(mysql_error());

					if ( $recordset && mysql_num_rows($recordset) ) {

						$return_value = self::get_value(mysql_result($recordset, 0, $field));

					}

					mysql_free_result($recordset);

					return $return_value;

				}

				

				public static function run_query ( $strquery ) {

					$recordset = mysql_query($strquery) or die(mysql_error());

					return $recordset;

				}

				

				public static function convert_date_to_mysql_format ( $date ) {

					$strreturn = '';

					if ( $date != '' ) {

						$ardate = explode(DATE_SEPARATOR, $date);

						if ( is_array($ardate) && count($ardate) ) {

							$intyear = $ardate[2];

							$intmonth = $ardate[1];

							$intday = $ardate[0];

							$strreturn = $intyear . '-' . $intmonth . '-' . $intday;

						}

					}

					return $strreturn;

				}

				

				public static function convert_date_to_ddmmyyyy ( $date ) {

					$strreturn = '';

					if ( $date != '' ) {

						$ardate = explode('-', $date);

						if ( is_array($ardate) && count($ardate) ) {

							$strreturn = str_pad((int) $ardate[2], 2, '0', STR_PAD_LEFT) . '-' . str_pad((int) $ardate[1], 2, '0', STR_PAD_LEFT) . '-' . (int) $ardate[0];

						}

					}

					return $strreturn;

				}

				

				public static function convert_value ( $data_type, $value ) {

					$return_value = $value;

					if ( $data_type != '' ) {

						switch ( $data_type ) {

							case 'varchar':

								$return_value = (string) $value;

								break;	

							case 'char':

								$return_value = (string) $value;

								break;	

							case 'date':

								$return_value = self::convert_date_to_mysql_format($value);

								break;	

							case 'float':

								$return_value = (float) $value;

								break;	

							case 'int':

								$return_value = (int) $value;

								break;	

						}

					}

					return $return_value;

				}

								

				public static function fill_select_box ( $table, $value_field, $display_field, $selected_value = '' ) {

					$strquery = 'SELECT ' . $value_field . ', ' . $display_field . ' FROM ' . DB_PREFIX . $table . ' WHERE 1=1 order by ' . $display_field;

					$rstable = mysql_query($strquery) or die(mysql_error());

					if ( $rstable && mysql_num_rows($rstable) ) {

						while ( $arrecord = mysql_fetch_array($rstable) ) {

							$strselected = '';

							if ( self::get_value($arrecord[0]) == $selected_value ) {

								$strselected = 'selected="selected"';

							}

?>

							<option value="<?php echo self::get_value($arrecord[0]); ?>" <?php echo $strselected; ?>><?php echo htmlspecialchars(self::get_value($arrecord[1])); ?></option>

<?php

						}

					}

					mysql_free_result($rstable);

				}

				

				

				public static function fill_select_box_condition ( $table, $value_field, $display_field,  $selected_value = '', $condition ) {



					$strquery = 'SELECT ' . $value_field . ', ' . $display_field . ' FROM ' . DB_PREFIX . $table . ' WHERE 1=1 ' . $condition;



					$rstable = mysql_query($strquery) or die(mysql_error());



					if ( $rstable && mysql_num_rows($rstable) ) {



						while ( $arrecord = mysql_fetch_array($rstable) ) {



							$strselected = '';



							if ( self::get_value($arrecord[0]) == $selected_value ) {



								$strselected = 'selected="selected"';



							}



						?>



							<option value="<?php echo self::get_value($arrecord[0]); ?>" <?php echo $strselected; ?>><?php echo htmlspecialchars(self::get_value($arrecord[1])); ?></option>



						<?php



						}



					}



					mysql_free_result($rstable);



				}

				

				

				public static function fill_select_box_multiple ( $table, $value_field, $display_field, $selected_value = '' ) {

					$strquery = 'SELECT ' . $value_field . ', ' . $display_field . ' FROM ' . DB_PREFIX . $table . ' WHERE 1=1 order by ' . $display_field;

					$rstable = mysql_query($strquery) or trigger_error($strquery . ' ' . mysql_error());

					if ( $rstable && mysql_num_rows($rstable) ) {

						while ( $arrecord = mysql_fetch_array($rstable) ) {

							$strselected = '';

							if ( in_array(strtolower(self::get_value($arrecord[0])), $selected_value) ) {

								$strselected = 'selected="selected"';

							}

?>

							<option value="<?php echo strtolower(self::get_value($arrecord[0])); ?>" <?php echo $strselected; ?>><?php echo htmlspecialchars(self::get_value($arrecord[1])); ?></option>

<?php

						}

					}

					mysql_free_result($rstable);

				}

												

				public static function set_cookie ( $key, $value, $expiry_time ) {

					setcookie($key, $value, $expiry_time);

				}

				

				public static function get_field_value_array ( $table, $field, $primary_key_field = '', $primary_key_value = '' ) {

					$arreturn = array();

					$strquery = 'SELECT ' . $field . ' FROM ' . DB_PREFIX . $table . ' WHERE 1 = 1';

					if ( self::set_value($primary_key_field) != '' && self::get_value($primary_key_value) != '' ) {

						$strquery .= ' AND ' .  self::get_value($primary_key_field) . ' = ' . (int) $primary_key_value;

					}

					$recordset = mysql_query($strquery) or die(mysql_error());

					if ( $recordset && mysql_num_rows($recordset) ) {

						for ( $intcounter = 0; $intcounter < mysql_num_fields($recordset); $intcounter++ ) {

							$arreturn[] = self::get_value(mysql_result($recordset, 0, $field));

						}

					}

					mysql_free_result($recordset);

					return $arreturn;

				}

				

				public static function get_component ( ) {

					$component = '';

					$action = '';

					if ( isset($_GET['component']) && trim($_GET['component']) != '' ) {

						$component = self::get_value($_GET['component']);	

					}

					if ( isset($_GET['action']) && trim($_GET['action']) != '' ) {

						$action = self::get_value($_GET['action']);	

					}

					if ( $component == '' || $action == '' ) {

						$return = array(

														'user'

														, 'login'

													);

						if ( self::is_user_loggedin() ) {

							$return = array(

														'menu'

														, 'dashboard'

													);	

						}

						

					}

					else {

						$return = array(

														$component

														, $action

													);	

					}

					if ( ! self::is_user_loggedin() ) {

						$return = array(

														'user'

														, 'login'

													);

					}

					return $return;

				}

				

				public static function is_component_renderable ( $component ) {

					$return = false;

					$component_file = COMPONENTS_DIR . $component[0] . '/' . $component[1] . '.php';

					if ( file_exists($component_file) && is_file($component_file) ) {

						$return = true;

					}

					return $return;

				}

								

				public static function import_component_javascript ( $component ) {

					$component_css_js = COMPONENTS_DIR . $component[0] . '/' . COMPONENTS_INCLUDE_DIR . $component[1] . '-css-js.php';

					if ( file_exists($component_css_js) && is_file($component_css_js) ) {

						require_once $component_css_js;

					}

				}

								

				public static function get_component_link ( $component_array ) {

					$return = 'index.php';

					if ( is_array($component_array) && count($component_array) == 2 ) {

						if ( self::get_value($component_array[0]) != '' && self::get_value($component_array[1]) != '' ) {

							$return .= '?component=' . self::get_value($component_array[0]) . '&action=' . self::get_value($component_array[1]);

						}

					}

					return $return;

				}

				

				public static function get_control_value ( $control_name, $default_value = '') {



					$return = $default_value;



					if ( isset($_REQUEST[$control_name]) ) {



						$return = trim($_REQUEST[$control_name]);



					}



					return $return;



				}

				

				public static function encrypt_value ( $value ) {

					$evalue = '';

					$evalue = md5($value);

					$evalue = crc32($evalue);

					$evalue = md5(crc32($evalue));

					return $evalue;

				}

				

				

				public static function get_url ( $entity, $extra_args = array() ) {

					

					$return = SITE_URL;

					

					if ( $entity == 'home' ) {

						$return = SITE_URL . 'home';

					}
					
					if ( $entity == 'our-team' ) {

						$return = SITE_URL . 'team';
					}
						
						
					if ( $entity == 'about-us' ) {

						$return = SITE_URL . 'who-we-are';

					}
					
					if ( $entity == 'gallery' ) {

						$return = SITE_URL . 'ourgallery';

					}
					
					if ( $entity == 'testimonials' ) {

						$return = SITE_URL . 'useful-information/testimonials';

					}
					
					
					if ( $entity == 'list-of-tours' ) {

						$return = SITE_URL . 'list-of-tour';

					}
					
					if ( $entity == 'booking' ) {

						$return = SITE_URL . 'booking';

					}
					
					if ( $entity == 'faq' ) {

						$return = SITE_URL . 'useful-information/faq';

					}
				
					/*if ( $entity == 'tour-detail' ) {

						$return = SITE_URL . 'tour-detail';

					}*/
					if ( $entity == 'guided-tours' ) {
						
						$return = SITE_URL . 'guided-tour-detail';
						
						$title1 = $extra_args['guidedtours'];							
							
						$title_1 = str_replace(' ', '-', $title1);							
						
						$return .= '/' . $title_1 ;
						
					}
					
					if ( $entity == 'booking' ) {
						
						$return = SITE_URL . 'booking-tour';
						
						$title1 = $extra_args['bookingtour'];							
							
						$title_1 = str_replace(' ', '-', $title1);							
						
						$return .= '/' . $title_1 ;
						
					}
					
					if ( $entity == 'how-to-get-here' ) {

						$return = SITE_URL . 'useful-information/how-to-get-here';

					}
					if ( $entity == 'accommodation' ) {

						$return = SITE_URL . 'useful-information/accommodation';

					}
					
					if ( $entity == 'infrastructure' ) {

						$return = SITE_URL . 'infrastructure';

					}
					
					
					if ( $entity == 'enquiry' ) {

						$return = SITE_URL . 'enquiry';

					}

					
					if ( $entity == 'contact-us' ) {

						$return = SITE_URL . 'contact-us';

					}
					
					
					if ( $entity == 'rfq' ) {

						$return = SITE_URL . 'rfq';

					}	
									
					if ( $entity == 'thankyou' ) {

						$return = SITE_URL . 'thank-you';

					}

					if ( $entity == 'thankyou-booking' ) {

						$return = SITE_URL . 'thankyou-booking';

					}

					
					if ( $entity == 'thankyou-enquiry' ) {

						$return = SITE_URL . 'thankyou-enquiry';

					}
					
					/*if ( $entity == 'thankyou' ) {
						
						$return = SITE_URL . 'thankyou';
						
						$title1 = $extra_args['rfq'];							
							
						$title_1 = str_replace(' ', '-', $title1);							
						
						$return .= '/' . $title_1 ;
						
					}*/
					
					
					if ( $entity == 'category' ) {
						
						$return = SITE_URL . 'categories';
						
						$title1 = $extra_args['page'];							
							
						$title_1 = str_replace(' ', '-', $title1);							
						
						$return .= '/' . $title_1 ;
						
					}
					
					
					if ( $entity == 'sub-category' ) {
						
						$return = SITE_URL . 'sub-products';
						
						$title1 = $extra_args['category'];							
							
						$title_1 = str_replace(' ', '-', $title1);	
						
						$title2 = $extra_args['page'];							
							
						$title_2 = str_replace(' ', '-', $title2);							
						
						$return .= '/' . $title_1 . '/' . $title_2 ;
						
					}	
					
					
					if ( $entity == 'product' ) {
						
						$return = SITE_URL . 'products';
						
						$title1 = $extra_args['category'];							
							
						$title_1 = str_replace(' ', '-', $title1);
						
						$title2 = $extra_args['sub-category'];							
							
						$title_2 = str_replace(' ', '-', $title2);		
						
						$title3 = $extra_args['page'];							
							
						$title_3 = str_replace(' ', '-', $title3);							
						
						$return .= '/' . $title_1 . '/' . $title_2 . '/' . $title_3 ;
						
					}
					
					
					if ( $entity == 'product-desc-cat' ) {
						
						$return = SITE_URL . 'product-description';
						
						$title1 = $extra_args['category'];							
							
						$title_1 = str_replace(' ', '-', $title1);
						
						$title2 = $extra_args['product'];							
							
						$title_2 = str_replace(' ', '-', $title2);							
						
						$return .= '/' . $title_1 . '/' . $title_2 ;
						
					}	
					
					
					if ( $entity == 'product-desc' ) {
						
						$return = SITE_URL . 'product-desc';
						
						$title1 = $extra_args['category'];							
							
						$title_1 = str_replace(' ', '-', $title1);
						
						$title2 = $extra_args['sub-category'];							
							
						$title_2 = str_replace(' ', '-', $title2);		
						
						$title3 = $extra_args['product'];							
							
						$title_3 = str_replace(' ', '-', $title3);							
						
						$return .= '/' . $title_1 . '/' . $title_2 . '/' . $title_3 ;
						
					}	


					if ( $entity == '404' ) {

						$return = SITE_URL . '404';

					}

					

					if ( $entity == 'error' ) {

						$return = SITE_URL . 'error';

					}

					

					

					return trim(strtolower(strtoupper($return)));

					

				}

				

				public static function send_mail ( $receiver_email, $subject, $message, $receiver_name = '', $sender_email = '', $sender_name = '', $cc_email = '', $cc_name = '', $bcc_email = '', $bcc_email = '', $attachment_file = '', $attachment_file_name = '' ) {

							

						require_once dirname(__FILE__) . '/class.phpmailer.php';

												

						$mail             = new PHPMailer(); // defaults to using php "mail()"

												

						//$mail->AddReplyTo("name@yourdomain.com","First Last");

						

						if ( $sender_name != '' ) {

							$mail->SetFrom($sender_email, $sender_name);

						}

						

						$mail->AddAddress($receiver_email, $receiver_name);

						

						$mail->Subject    = $subject;

						

						$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

						

						$mail->MsgHTML($message);

						

						if ( is_writable($attachment_file) && is_file($attachment_file) ) {

							$mail->AddAttachment($attachment_file, $attachment_file_name);

						}

						

						if ( ! $mail->Send() ) {

						  self::send_mail_smtp( $receiver_email, $subject, $message, $receiver_name = '', $sender_email = '', $sender_name = '' );

						} 

						

						return true;

						

				}
				
				

				public static function send_mail_smtp( $receiver_email, $subject, $message, $receiver_name = '', $sender_email = '', $sender_name = '' )

				{

					require_once dirname(__FILE__) . '/class.phpmailer.php';

					

					

					$mail = new PHPMailer();

					$mail->IsSMTP(true); // SMTP

					$mail->SMTPAuth   = true;  // SMTP authentication

					$mail->Mailer = "smtp";

					//$mail->Host= "mail.milliardinfotech.com"; // mail server
					
					$mail->Host= "smtpout.secureserver.net";
					
					//$mail->Host= "mail.gmail.com";

					//$mail->Port = 587;  // SMTP Port

					$mail->Username = "info@egypt2wheeltours.com";  // SMTP  Username

					$mail->Password = "2wheelt0urs";  // SMTP Password

					$mail->SetFrom($sender_email, $sender_name);

					$mail->AddReplyTo($sender_email, $sender_name);

					$mail->Subject = $subject;

					$mail->MsgHTML($message);

					

					$mail->AddAddress($receiver_email, $receiver_name);

					

					if(!$mail->Send())

					return false;

					else

					return true;

				

				}

				

				

				public static function is_live_file ( $file_name ) {

					$live_file = false;

					if ( file_exists($file_name) && is_file($file_name) ) {

						$live_file = true;	

					}

					return $live_file;

				}

				

				public static function get_relative_path ( $path ) {

					$return = $path;

					if ( strpos(dirname($_SERVER['SCRIPT_FILENAME']), substr(ADMIN_PATH,0,-1)) ) {

						$return = '../' . $path;

					}

					return $return;

				}

								

				public static function resize_image ( $source_image, $destination_image, $resize_width, $resize_height ) {



					require_once dirname(__FILE__) . '/clsresize-image.php';



					// Parameters:

					// src - path to source image

					// dest - path to thumb (where to save it)

					// x - max width

					// y - max height

					// q - quality (applicable only to JPG, 1 to 100, 100 - best)

					// t - thumb type. "-1" - same as source, 1 = GIF, 2 = JPG, 3 = PNG

					// f - save to file (1) or output to browser (0).

					

					// Sample usage: 

					// 1. save thumb on server

					// http://www.zubrag.com/thumb.php?src=test.jpg&dest=thumb.jpg&x=100&y=50

					// 2. output thumb to browser

					// http://www.zubrag.com/thumb.php?src=test.jpg&x=50&y=50&f=0

					

					// Below are default values (if parameter is not passed)

					

					// save to file (true) or output to browser (false)

					$save_to_file = true;

					

					// Quality for JPEG and PNG.

					// 0 (worst quality, smaller file) to 100 (best quality, bigger file)

					// Note: PNG quality is only supported starting PHP 5.1.2

					$image_quality = 100;

					

					// resulting image type (1 = GIF, 2 = JPG, 3 = PNG)

					// enter code of the image type if you want override it

					// or set it to -1 to determine automatically

					$image_type = -1;

										

					// cut image before resizing. Set to 0 to skip this.

					$cut_x = 0;

					$cut_y = 0;

					

					//set original width or height if resized width or height is not specified

					if ( $resize_width <= 0 || $resize_height <= 0 ) {

						list($orig_x, $orig_y, $orig_img_type, $img_sizes) = @GetImageSize($source_image);

						if ( $resize_width <= 0 ) {

							$resize_width = $orig_x;

						}

						if ( $resize_height <= 0 ) {

							$resize_height = $orig_y;

						}

					}

					

					$img = new resize_image;

					

					$img->max_x        = $resize_width;

					$img->max_y        = $resize_height;

					$img->cut_x        = $cut_x;

					$img->cut_y        = $cut_y;

					$img->quality      = $image_quality;

					$img->save_to_file = $save_to_file;

					$img->image_type   = $image_type;

					

					return $img->generate_thumb($source_image, $destination_image);

					

				}

			

				public static function set_image_height ( $_image, $_height ) {

					

					$return = $_height;

					

					list($width, $height) = getimagesize($_image);

					

					if ( $_height > $height ) {

						$return = $height;

					}

					

					return $return;

						

				}

				

			    public static function set_image_width ( $_image, $_width ) {

					

					$return = $_width;

					

					list($width, $height) = getimagesize($_image);

					

					if ( $_width > $width ) {

						$return = $width;

					}

					

					return $return;

						

				}

			

			

				public static function format_number ( $value, $formatvalue = 0 ) {

					

					$return = $value;

					

					return $return;

						

				}

				

				

				

				public static function fields_list($table, $notdisplaying = array())

				{

					

					$fields = mysql_list_fields(DATABASE, $table);

					

					$columns = mysql_num_fields($fields);

					

					$output = array();

					

					$field_name = '';

					

					for ($i = 0; $i < $columns; $i++) {

						

						$field_name = '';

						

						$field_name = mysql_field_name($fields, $i);

						

						if ( ! in_array($field_name, $notdisplaying) ) {

							

							$output[] = mysql_field_name($fields, $i);

						

						}

						

					}

					

					return $output;

					

				}

				

				

				

				public static function check_number ( $number ) {

					

					$clean = 0;

					

					$items = array('/\ /', '/\+/', '/\-/', '/\,/', '/\(/', '/\)/', '/[a-zA-Z]/');

					

					$clean = trim(preg_replace($items, '', $number));

					

					return $clean;

					

					

				}

				

				public static function get_number ( $number ) {

					

					$clean = 0;

					

					$items = array('/\ /', '/\+/', '/\-/', '/\./', '/\,/', '/\(/', '/\)/', '/[a-zA-Z]/');

					

					$clean = trim(preg_replace($items, '', $number));

					

					return $clean;

					

					

				}

				

				public static function get_image_size ( $_image, $_wh ) {			



					$return = '';					

	

					list($width, $height) = getimagesize($_image);					

	

					if ( $_wh == 'w' ) {

	

						$return = $width;

	

					}

					else {

						

						$return = $height;							

					}					

	

					return $return;	

				}				

		}

	

?>