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
class customers_app extends application
{
	function customers_app()
	{
		$this->application("orders", _($this->help_context = "&Sales"));

		$this->add_module(_("Operations"));
		$this->add_lapp_function(0, _("Sales Quotation"), "sales/inquiry/sales_orders_view.php?type=32", 'SA_SALESTRANSVIEW', MENU_INQUIRY);
		$this->add_lapp_function(0, _("Sales Order"), "sales/inquiry/sales_orders_view.php?type=30", 'SA_SALESTRANSVIEW', MENU_INQUIRY);

		// $this->add_lapp_function(1, _("Sales &Quotation Entry"),
		// 	"sales/sales_order_entry.php?NewQuotation=Yes", 'SA_SALESQUOTE', MENU_TRANSACTION);
		// $this->add_lapp_function(1, _("Sales &Order Entry"),
		// 	"sales/sales_order_entry.php?NewOrder=Yes", 'SA_SALESORDER', MENU_TRANSACTION);
		//$this->add_lapp_function(0, _("Direct &Delivery"),"sales/sales_order_entry.php?NewDelivery=0", 'SA_SALESDELIVERY', MENU_TRANSACTION);
		$this->add_lapp_function(0, _("Direct &Delivery"),"sales/inquiry/customer_inquiry.php?filtertype=5", 'SA_SALESDELIVERY', MENU_TRANSACTION);

// 		$this->add_lapp_function(0, _("Direct &Invoice"),"sales/sales_order_entry.php?NewInvoice=0", 'SA_SALESINVOICE', MENU_TRANSACTION);
		$this->add_lapp_function(0, _("Direct &Invoice"),"sales/inquiry/customer_inquiry.php?filtertype=1", 'SA_SALESINVOICE', MENU_TRANSACTION);
		$this->add_lapp_function(0, "","");
		$this->add_lapp_function(0, _("&Delivery Against Sales Orders"),
			"sales/inquiry/sales_orders_view.php?OutstandingOnly=1", 'SA_SALESDELIVERY', MENU_TRANSACTION);
		$this->add_lapp_function(0, _("&Invoice Against Sales Delivery"),
			"sales/inquiry/sales_deliveries_view.php?OutstandingOnly=1", 'SA_SALESINVOICE', MENU_TRANSACTION);

		$this->add_rapp_function(0, _("&Copy Delivery"),
			"sales/inquiry/sales_orders_view.php?DeliveryTemplates=Yes", 'SA_SALESDELIVERY', MENU_TRANSACTION);
		$this->add_rapp_function(0, _("&Copy Invoice"),
			"sales/inquiry/sales_orders_view.php?InvoiceTemplates=Yes", 'SA_SALESINVOICE', MENU_TRANSACTION);
		$this->add_rapp_function(0, _("&Create and Print Recurring Invoice"),
			"sales/create_recurrent_invoices.php?", 'SA_SALESINVOICE', MENU_TRANSACTION);
		$this->add_rapp_function(0, "","");
		$this->add_rapp_function(0, _("Customer &Payments"),
			"sales/customer_payments.php?", 'SA_SALESPAYMNT', MENU_TRANSACTION);
		$this->add_rapp_function(0, _("Customer &Credit Notes"),
			"sales/credit_note_entry.php?NewCredit=Yes", 'SA_SALESCREDIT', MENU_TRANSACTION);
		$this->add_rapp_function(0, _("&Allocate Customer Payments or Credit Notes"),
			"sales/allocations/customer_allocation_main.php?", 'SA_SALESALLOC', MENU_TRANSACTION);
		if( defined('COUNTRY') && COUNTRY==60 ){
		    $this->add_lapp_function(0, _("Bad Debt Processing"), "admin/bad_deb.php?type=customer");
		}



		$this->add_module(_("Inquiry"));

		$this->add_lapp_function(1, _("Customer Transaction"),
			"sales/inquiry/customer_inquiry.php?", 'SA_SALESTRANSVIEW', MENU_INQUIRY);
		$this->add_lapp_function(1, "","");
		$this->add_lapp_function(1, _("Customer Allocation"),
			"sales/inquiry/customer_allocation_inquiry.php?", 'SA_SALESALLOC', MENU_INQUIRY);

		$this->add_lapp_function(1, _("Check Transactions"),
		    "index.php/sales/inquiry/check", 'SA_SALESALLOC', MENU_INQUIRY);


		$this->add_module(_("Reports"));
		$this->add_lapp_function(2, _("Customer &Ledger"),
			"reporting/reports_main.php?Class=0&REP_ID=101", 'SA_CUSTOMER', MENU_ENTRY);
		$this->add_lapp_function(2, _("Aged Customer Analysis"),
			"reporting/reports_main.php?Class=0&REP_ID=102", 'SA_CUSTOMER', MENU_ENTRY);
		$this->add_lapp_function(2, _("Customer Detail Listing"),
			"reporting/reports_main.php?Class=0&REP_ID=103", 'SA_CUSTOMER', MENU_ENTRY);
		$this->add_lapp_function(2, _("Sales Summary Report"),
			"reporting/reports_main.php?Class=0&REP_ID=114", 'SA_CUSTOMER', MENU_ENTRY);
		$this->add_lapp_function(2, _("Price Listing"),
			"reporting/reports_main.php?Class=0&REP_ID=104", 'SA_CUSTOMER', MENU_ENTRY);
		$this->add_lapp_function(2, _("Order Status Listing"),
			"reporting/reports_main.php?Class=0&REP_ID=105", 'SA_CUSTOMER', MENU_ENTRY);
		$this->add_lapp_function(2, _("Salesman Listing"),
			"reporting/reports_main.php?Class=0&REP_ID=106", 'SA_CUSTOMER', MENU_ENTRY);

		$this->add_module(_("Document Printing"));
		$this->add_lapp_function(3, _("Print Invoices"),
			"reporting/reports_main.php?Class=0&REP_ID=107", 'SA_CUSTOMER', MENU_ENTRY);

		$this->add_lapp_function(3, _("Print Credit Notes"),
			"reporting/reports_main.php?Class=0&REP_ID=113#", 'SA_CUSTOMER', MENU_ENTRY);

		$this->add_lapp_function(3, _("Print Deliveries"),
			"reporting/reports_main.php?Class=0&REP_ID=110", 'SA_CUSTOMER', MENU_ENTRY);

		$this->add_lapp_function(3, _("Print Statements"), "index.php/customer/printing/statements", 'SA_CUSTOMER', MENU_ENTRY);
// 		$this->add_lapp_function(3, _("Print Statements"),
// 			"reporting/reports_main.php?Class=0&REP_ID=108", 'SA_CUSTOMER', MENU_ENTRY);

		$this->add_lapp_function(3, _("Print Sales Orders"),
			"reporting/reports_main.php?Class=0&REP_ID=109", 'SA_CUSTOMER', MENU_ENTRY);
		$this->add_lapp_function(3, _("Print Sales Quotations"),
			"reporting/reports_main.php?Class=0&REP_ID=111", 'SA_CUSTOMER', MENU_ENTRY);
		$this->add_lapp_function(3, _("Print Receipts"),
			"reporting/reports_main.php?Class=0&REP_ID=112", 'SA_CUSTOMER', MENU_ENTRY);
		//$this->add_lapp_function(2, _("Add and Manage &Customers"),
		//	"sales/manage/customers.php?", 'SA_CUSTOMER', MENU_ENTRY);
		//$this->add_lapp_function(2, _("Recurrent &Invoices"),
		//	"sales/manage/recurrent_invoices.php?", 'SA_SRECURRENT', MENU_MAINTENANCE);


		$this->add_module(_("Housekeeping"));
		$this->add_lapp_function(4, _("Customer &Maintenance"), "sales/manage/customers.php?", 'SA_CUSTOMER', MENU_ENTRY);
		$this->add_lapp_function(4, _("Customer &Branches"),
			"sales/manage/customer_branches.php?", 'SA_CUSTOMER', MENU_ENTRY);
		$this->add_lapp_function(4, _("Sales &Groups"),
			"sales/manage/sales_groups.php?", 'SA_SALESGROUP', MENU_MAINTENANCE);
		$this->add_rapp_function(4, _("Sales T&ypes"),
			"sales/manage/sales_types.php?", 'SA_SALESTYPES', MENU_MAINTENANCE);
		$this->add_rapp_function(4, _("Sales &Persons"),
			"sales/manage/sales_people.php?", 'SA_SALESMAN', MENU_MAINTENANCE);
		$this->add_rapp_function(4, _("Sales &Areas"),
			"sales/manage/sales_areas.php?", 'SA_SALESAREA', MENU_MAINTENANCE);
		$this->add_rapp_function(4, _("Credit &Status Setup"),
			"sales/manage/credit_status.php?", 'SA_CRSTATUS', MENU_MAINTENANCE);


		$this->add_extensions();
	}
}


?>