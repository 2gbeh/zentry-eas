<?PHP
# 
$db_con = connect_db(USERNAME, PASSWORD, DATABASE);

# 
Anum::main(HOSTED);

# 
$sizeof_book = sql_count($db_con, 'book');
$sizeof_zone = sql_count($db_con, 'zone');
$sizeof_user = sql_count($db_con, 'user');
$sizeof_school = sql_count($db_con, 'school');
$sizeof_sale = sql_distinct_count($db_con, 'sale', 'serial_no');
$sizeof_credit = sql_distinct_count($db_con, 'credit', 'serial_no');
$sizeof_receipt = sql_count($db_con, 'receipt');
$sizeof_admin = sql_count($db_con, 'admin');

#
$enum_class = array(NULL, 'Primary','Nursery','Comic');
$enum_grade = array(NULL, '1 - 6','1 - 3');
$enum_stmt = array(NULL, 'Receipt (RT)','Invoice (INV)','Credit Note (CN)');

#
$list_nav = array(
	'Manage Books' => array(
		array('add_book.php', 'fa fa-plus', 'Add New'),
		array('view_books.php', 'fa fa-list', 'View Records')
	),
	'Manage Zones' => array(
		array('add_zone.php', 'fa fa-plus', 'Add New'),
		array('view_zones.php', 'fa fa-list', 'View Records')
	),
	'Manage Distributors' => array(
		array('add_user.php', 'fa fa-plus', 'Add New'),
		array('view_users.php', 'fa fa-list', 'View Records')
	),	
	'Distributor Profile' => array(
		array('add_user.php', 'fa fa-plus', 'Add Distributor'),
		array('view_users.php', 'fa fa-list', 'View Distributors')
	),		
	'Manage Schools' => array(
		array('add_school.php', 'fa fa-plus', 'Add New'),
		array('view_schools.php', 'fa fa-list', 'View Records')
	),
	'Manage Sales Invoice' => array(	
		array('add_sale.php', 'fa fa-plus', 'Add New'),
		array('view_sales.php', 'fa fa-list', 'View Records'),
		array('view_sales_zone.php', 'fa fa-folder', 'Zonal Sales Invoice')
	),
	'Manage Credit Note' => array(	
		array('add_credit.php', 'fa fa-plus', 'Add New'),
		array('view_credits.php', 'fa fa-list', 'View Records'),
		array('view_credits_zone.php', 'fa fa-folder', 'Zonal Credit Note')
	),
	'Manage Receipts' => array(	
		array('add_receipt.php', 'fa fa-plus', 'Add New'),
		array('view_receipts.php', 'fa fa-list', 'View Records')		
	),		
	'Statement of Account' => array(	
		array('add_stmt.php', 'fa fa-plus', 'Add New'),
		array('view_stmts.php', 'fa fa-list', 'View Records (per/Entry)'),
		array('view_stmts_card.php', 'fa fa-folder', 'View Records (per/Card)')		
	),
	'My Account' => array(
		array('profile.php', 'fa fa-user-alt', 'Profile Info'),
		array('settings.php', 'fa fa-user-edit', 'Update Password')
	),	
	'Admin Account' => array(
		array('add_admin.php', 'fa fa-plus', 'Add New'),
		array('view_admins.php', 'fa fa-list', 'View Records')
	),
	'Help Desk' => array(
		array('add_ticket.php', 'fa fa-plus', 'Add New'),
		array('view_tickets.php', 'fa fa-list', 'View Records')
	),
);

$list_aside_top = array(
	array('dashboard.php', 'fa fa-chart-area', 'Dashboard'),
	array('home.php', 'fa fa-chart-line', 'Session Sales Analysis'),	
	array('view_books.php', 'fas fa-book', 'Manage Books', $sizeof_book),
	array('view_zones.php', 'fas fa-map-marker-alt', 'Manage Zones', $sizeof_zone),
	array('view_users.php', 'fa fa-address-book', 'Manage Distributors', $sizeof_user),
	array('view_schools.php', 'fas fa-university', 'Manage Schools', $sizeof_school),
	array('add_sale.php', 'fas fa-file-export', 'Manage Sales Invoice', $sizeof_sale),
	array('add_credit.php', 'fas fa-file-import', 'Manage Credit Note', $sizeof_credit),
	array('add_receipt.php', 'fas fa-cash-register', 'Manage Receipts', $sizeof_receipt),	
	array('add_stmt.php', 'fas fa-calculator', 'Statement of Account'),
);

$list_aside_bell = '<img src="img/bell.png" alt="" />';
$list_aside_end = array(
	array('profile.php', 'fa fa-user-cog', 'My Account'),
	array('view_admins.php', 'fa fa-users-cog', 'Admin Account', $sizeof_admin),
	array('view_tickets.php', 'fas fa-exclamation-triangle', 'Help Desk', $list_aside_bell),
	array(WEBMAIL, 'fas fa-inbox', 'Access Webmail'),
	array(CPANEL, 'fa fa-server', 'Access cPanel'),
	array(INDEX, 'fa fa-globe', 'Visit Website')
);

?>