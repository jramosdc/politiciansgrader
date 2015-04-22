<?php	
	define('DIRECT_ACCESS', true);
	
	define('HOST','localhost');
	define('DATABASE','zenbatuc_personality_counter');
	define('USERNAME','zenbatuc_j');
	define('PASSWORD','jmejia');
	
	
	define('DB_PREFIX','');
	
	define('REQUIRED','<span class="required">*</span>');
	define('REQUIRED_SENTENCE', '(' . REQUIRED . ' = Mandatory)');
	
	
	define('SESSION_PREFIX','crown_ceramic_session_');
	define('ADMIN_LOGIN_USER_ID','admin_login_user_id');
	define('ADMIN_LOGIN_USER_NAME','admin_login_user_name');
	define('ADMIN_LOGIN_USER_TYPE_ID','admin_login_user_type_id');
	define('ADMIN_LOGIN_USER_GROUP_ID','admin_login_user_group_id');

	define('MESSAGE_SESSION', 'message_session');
	
	define('DATE_SEPARATOR','-');
	
	define('NO_OF_DECIMAL_POINT', 2);
	
	define('SEO_ENABLED', true);
	
	define('COMPONENTS_INCLUDE_DIR', 'include/');
	
	define('MYSQL_DATE_FORMAT', '%d-%m-%Y');
	define('MYSQL_DATE_FORMAT2', '%M %d, %Y');
	
	define('SITE_URL', 'http://localhost/PersonalityCounter/');
	define('SITE_DOMAIN', '');
	define('SITE_COUNTRY', '');
	
	define('ALLOWED_TAGS', '<h1><h2><h3><h4><h5><h6><br><hr><b><center><i><strong><u><img><a><ul><ol><li><table><caption><th><tr><td><thead><tbody><tfoot><div><span><br><p>');
	
	define('ALLOWED_TAGS_FRONT', '<h1><h2><h3><h4><h5><h6><br><hr><b><center><i><strong><u><img><a><ul><ol><li><table><caption><th><tr><td><thead><tbody><tfoot><style><div><span><br><p>');
	
	date_default_timezone_set("Asia/Calcutta");
?>