<?PHP
// CONSTANTS
define('APPNAME', 'RETINKEN');
define('CAPTION', 'RETINKEN Publishers and Printers');
define('COMPANY', 'RETINKEN Nigeria Ltd.');
define('SUMMARY', 'Head Office: No. 14B M.M. Way, Benin City, Edo State. Abuja Office: House 5, 69 A3, 32 Road, Off 69 Road, By Galadima Gate, Lungu Area, Guarimpa, Abuja.');
define('KEYWORDS', 'retinken,retinken benin,retinken publishers,retinken printers,retinken press,hwp labs,tugbeh emmanuel');
define('COPYRIGHT', 'Copyright &copy; 2020 ' . COMPANY);
define('EMAIL', '');
define('EMAIL_2', '');
define('PHONE', '07062949430');
define('PHONE_2', '08028681688');
define('PHONE_3', '08032280901');
define('ADDRESS', '14B M.M. Way, Benin City, Edo State, Nigeria.');
define('THEME_PRI', '#FF98CB');
define('THEME_SEC', '#600');
define('THEME_ALT', '');

// APACHE
define('SERVER', 'rtk');
if ($_SERVER['SERVER_NAME'] == 'localhost') {
    define('DATABASE', SERVER . '_db');
    define('USERNAME', 'root');
    define('PASSWORD', '');
} else {
    define('DATABASE', 'shagoapp_rtk_db');
    define('USERNAME', 'shagoapp_rtk_root');
    define('PASSWORD', '_Strongp@ssw0rd');
}

// ISP
define('INDEX', 'index.php');
define('DOMAIN', 'retinken.com');
define('CPANEL', '#https://' . DOMAIN . '/cpanel');
define('WEBMAIL', '#https://' . DOMAIN . '/webmail');
define('WEBMAIL_1', 'info@' . DOMAIN);
define('WEBMAIL_2', 'support@' . DOMAIN);
define('WEBMAIL_3', 'admin@' . DOMAIN);
define('VERSION', '1.21.12.20');
define('HOSTED', '2022-03-22');
define('REVISED', '2022-03-24');

// META TAGS
$m = array();
$m['author'] = 'HWP Labs';
$m['classification'] = 'Enterprise Application Software';
$m['copyright'] = date('Y');
$m['coverage'] = 'Nigeria';
$m['description'] = SUMMARY;
$m['designer'] = 'Tugbeh, E.O.';
$m['keywords'] = KEYWORDS;
$m['language'] = 'en';
$m['owner'] = COMPANY;
$m['reply_to'] = WEBMAIL_1;
$m['revised'] = REVISED;
$m['robots'] = 'index,follow';
$m['url'] = 'https://' . DOMAIN . '/';
$m['viewport'] = !isset($page_ctx_viewport) ? '' : 'width=device-width, initial-scale=1.0';
$m['title'] = !isset($page_ctx_title) ? CAPTION : $page_ctx_title . ' - ' . APPNAME;
$META = (object) $m;
