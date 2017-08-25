<?php
/**********************************************************************
    Copyright (C) FrontAccounting, LLC.
	Released under the terms of the GNU General Public License, GPL,
	as published by the Free Software Foundation, either version 3
	of the License, or (at your option) any later version.
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
    See the License here <http://www.gnu.org/licenses/gpl-3.0.html>.
***********************************************************************/

if (!isset($path_to_root) || isset($_GET['path_to_root']) || isset($_POST['path_to_root']))
	die(_("Restricted access"));

include_once($path_to_root . "/includes/ui.inc");
include_once($path_to_root . "/includes/page/header.inc");

$js = "<script language='JavaScript' type='text/javascript'>
function defaultCompany(){
	document.forms[0].company_login_name.options[".$_SESSION["wa_current_user"]->company."].selected = true;
}
</script>";
add_js_file('login.js');
// Display demo user name and password within login form if "$allow_demo_mode" is true
if ($allow_demo_mode == true){
	    //$demo_text = _("Login as user: demouser and password: password");
} else {
	//$demo_text = _("Please login here");
	if (@$allow_password_reset) {
      $demo_text .= " "._("or")." <a href='$path_to_root/index.php?reset=1'>"._("request new password")."</a>";
    }
}

if (check_faillog()) {
		$blocked_msg = '<span class=redfg>'._('Too many failed login attempts.<br>Please wait a while or try later.').'</span>';

	    $js .= "<script>setTimeout(function() {
	    	document.getElementsByName('SubmitUser')[0].disabled=0;
	    	document.getElementById('log_msg').innerHTML='$demo_text'}, 1000*$login_delay);</script>";
	    $demo_text = $blocked_msg;
}
if (!isset($def_coy))
	$def_coy = 0;

$def_theme = "default";

$login_timeout = $_SESSION["wa_current_user"]->last_act;

$title = $login_timeout ? _('Authorization timeout') : $app_title." - "._("Login");
$encoding = isset($_SESSION['language']->encoding) ? $_SESSION['language']->encoding : "iso-8859-1";
$rtl = isset($_SESSION['language']->dir) ? $_SESSION['language']->dir : "ltr";
$onload = !$login_timeout ? "onload='defaultCompany()'" : "";

$coy_name = null;
$company_info = $ci->db->where_in('name',array('coy_name','coy_logo'))->get('sys_prefs')->result();
if( $company_info ){
    foreach ($company_info AS $info){
        if( $info->name=='coy_logo' ){
            $coy_logo = $info->value;
        } else if ($info->name=='coy_name') {
            $coy_name = $info->value;
        }
    }
}

$coy_logo = company_logo();
include_once($path_to_root . "/themes/$theme/renderer.php");
$rend = new renderer();
$analytics_script = get_instance()->api_membership->get_script('analytics/google_script');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo 'Login - '.$power_by?></title>
	<meta content="text/html;charset=iso-8859-1" http-equiv="content-type">
	<meta content="width=device-width,initial-scale=1" name="viewport">
	<link href="login.html" rel="canonical">
	<link href="<?php echo $rend->theme_uri."/css/login.css";?>" rel="stylesheet" type="text/css">
	<?php
	if( strlen($analytics_script) > 0 ){
	    print $analytics_script;
	}
	?>
</head>
<body class="login">
	<div class="wrapper">
		<div class="logo">
			<a href="#"><?php if ($coy_logo) :?><img alt="accountanttoday" src="<?php echo $coy_logo;?>" border="0"  /><?php else: echo $coy_name; endif;?></a>
		</div>
		<p class="company-name" >Welcome, <?php echo $coy_name;?>!</p>
		<?php if( isset($db_connections[0]['license']) ):?>
		<p class="company-license" >Your License ID: <span style="color: #2eb544; font-weight: bold; text-transform: uppercase;"><?php echo $db_connections[0]['license'];?></span></p>
		<?php endif;?>


		<?php start_form(false, false, $_SESSION['timeout']['uri'], "loginform");?>
			<div class="baovung border-b5b8c9">
				<div class="login-input">
					<?php if (isset($_COOKIE['loginFalse'])):

					unset($_COOKIE['loginFalse']);
					setcookie('loginFalse', '', time() - 3600);
					?>
					<p style="color:red;">The user and password combination is not valid for the system.</p>

					<?php endif;?>
					<input type='hidden' id=ui_mode name='ui_mode' value="<?php echo $_SESSION["wa_current_user"]->ui_mode;?>" />


					<div class="input-user">
							<p>User name</p>
							<input type="text" name="user_name_entry_field" value=""/>
						</div>
						<div class="input-pass">
							<p>Password</p>
							<input type="password" name="password" value="" />
						</div>
					</div>
					<div class="login-btn">
						<div class="btn-check" style="display: none;">
							<input type="checkbox" name="loged" /><p>Keep me loged in?</p>
						</div>
						<div class="btn-button btn" style="float: right; margin-right: 45px;">
							<input type="submit" name="SubmitUser" value="Login" class="btnlogin">
						</div>
					</div>
				</div>
			<input type="hidden" name="company_login_name" value="0" />
			<?php end_form(1)?>
			<div class="footer">
				<p><?=$copyright?></p>

			</div>
		</div>
</body>


</html>
