<?PHP
Context::set(NULL,'index.php');

Context::set('Dashboard','dashboard.php');

Context::set('Session Sales Analysis','home.php');

Context::set('View Books','view_books.php');
Context::set('Edit Book','edit_book.php');
Context::set('Add Book','add_book.php');

Context::set('List of Schools','view_zones_sch.php');
Context::set('List of Sales Invoice','view_zones_inv.php');
Context::set('List of Credit Notes','view_zones_cn.php');
Context::set('List of Receipts','view_zones_rt.php');
Context::set('List of Statements','view_zones_stmt.php');
Context::set('View Zones','view_zones.php');
Context::set('Edit Zone','edit_zone.php');
Context::set('Add Zone','add_zone.php');

Context::set('View Distributors','view_users.php');
Context::set('View Distributor','view_user.php');
Context::set('Edit Distributor','edit_user.php');
Context::set('Add Distributor','add_user.php');

Context::set('View Schools','view_schools.php');
Context::set('Edit School','edit_school.php');
Context::set('Add School','add_school.php');

Context::set('Zonal Sales Invoice','print_sale_zone.php');
Context::set('School Sales Invoice','print_sale.php');
Context::set('Zonal Sales','view_sales_zone.php');
Context::set('View Sales','view_sales.php');
Context::set('Edit Sale','edit_sale.php');
Context::set('New Sale','add_sale.php');

Context::set('Zonal Credit Note','print_credit_zone.php');
Context::set('School Credit Note','print_credit.php');
Context::set('Zonal Credits','view_credits_zone.php');
Context::set('View Credits','view_credits.php');
Context::set('Edit Credit','edit_credit.php');
Context::set('New Credit','add_credit.php');

Context::set('View Receipts','view_receipts.php');
Context::set('Edit Receipt','edit_receipt.php');
Context::set('Add Receipt','add_receipt.php');

Context::set('View Statements (p/Card)','view_stmts_card.php');
Context::set('View Statements (p/Entry)','view_stmts.php');
Context::set('Edit Statement','edit_stmt.php');
Context::set('Add Statement','add_stmt.php');

Context::set('Profile','profile.php');

Context::set('Settings','settings.php');

Context::set('View Admins','view_admins.php');
Context::set('Edit Admin','edit_admin.php');
Context::set('Add Admin','add_admin.php');

Context::set('View Tickets','view_tickets.php');
Context::set('Edit Ticket','edit_ticket.php');
Context::set('Add Ticket','add_ticket.php');

Context::set('Software License Expired!','anum.php');

//Context::map();
extract(Context::get());
?>
