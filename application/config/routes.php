<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
*/
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['sign-in'] = 'Home/sign_in';
$route['sign-up'] = 'Home/sign_up';
$route['new-merchant'] = 'Home/add_new_merchant';
$route['new-walkin'] = 'Dashboard/add_new_walkin';

$route['login'] = 'Login/user_login';
$route['logout'] = 'Login/user_logout';

$route['dashboard'] = 'Dashboard/index';
$route['billing'] = 'Dashboard/billing';

$route['onboarding'] = 'Dashboard/onboarding';
$route['staffing'] = 'Dashboard/staffing';
$route['customers'] = 'Dashboard/customers';
$route['powerbooks-subscriptions'] = 'Dashboard/powerbooks_subscriptions';
$route['update-staff'] = 'Dashboard/staffing_status';
$route['void-bill-update'] = 'Dashboard/void_update';

$route['item-master'] = 'Dashboard/item_master';
$route['goods-inward'] = 'Dashboard/goods_inward';
$route['inward-items'] = 'Dashboard/inward_items';
$route['goods-register'] = 'Dashboard/goods_register';
$route['goods-purchased'] = 'Dashboard/goods_purchased';
$route['promo-offers'] = 'Dashboard/promo_offers';

$route['vendor-supplier'] = 'Dashboard/vendor_supplier_master';
$route['add-division'] = 'Dashboard/new_division';
$route['add-category'] = 'Dashboard/new_category';
$route['add-classification'] = 'Dashboard/new_classification';
$route['new-product'] = 'Dashboard/new_product';
$route['new-staff'] = 'Dashboard/new_staff';
$route['settings'] = 'Dashboard/onboarding';
$route['merchant-onboard'] = 'Dashboard/merchant_onboard';

$route['itemwise-sales'] = 'Dashboard/item_wise_sales';
$route['billwise-sales'] = 'Dashboard/bill_wise_sales';
$route['daywise-sales'] = 'Dashboard/day_wise_sales';

$route['IWS-reporter'] = 'Dashboard/IWS_reporter';
$route['BWS-reporter'] = 'Dashboard/BWS_reporter';
$route['DWS-reporter'] = 'Dashboard/DWS_reporter';

$route['day-open-close'] = 'Dashboard/day_open_close';
$route['update-pos'] = 'Dashboard/pos_update';
$route['stock-balance'] = 'Dashboard/stock_balance';
$route['tax-register'] = 'Dashboard/tax_register';



$route['temp-goods-inward'] = 'Dashboard/temp_goods_inward';
$route['temp-bill-inward'] = 'Dashboard/temp_bill_inward';
$route['remove-item'] = 'Dashboard/remove_item_temp_bill';
$route['new-bill'] = 'Dashboard/remove_all_temp_bill';
$route['bill-summary'] = 'Dashboard/bill_summary';
$route['pos-summary'] = 'Dashboard/pos_summary';
$route['bill-checkout'] = 'Dashboard/bill_checkout';
$route['temp-qty-tax'] = 'Dashboard/temp_qty_tax';
$route['multi-mrp'] = 'Dashboard/multi_mrp';
$route['add-vendor'] = 'Dashboard/add_new_vendor';
$route['add-offer'] = 'Dashboard/add_new_offer';

$route['check-customer'] = 'Dashboard/check_customer';


$route['messages'] = 'Home/messages';

$route['activate/(:any)/(:any)'] = 'Home/account_activate/$1/$2';
$route['crm'] = 'Dashboard/customer_crm';
$route['crm/(:any)'] = 'Dashboard/customer_crm/$1';
// super admin routes
$route['options-master'] = 'Dashboard/options_master';
$route['new-options'] = 'Dashboard/new_options';
$route['add-new-options'] = 'Dashboard/add_new_options';


$route['pay-page'] = 'Payments/index';

$route['billing-pos'] = 'Dashboard/pos_billing';
// $route['billing-pos/(:any)/(:any)'] = 'Dashboard/billing_pos/$1/$2';
$route['add-to-cart'] = 'Dashboard/add_to_cart';

$route['pos-billing'] = 'Dashboard/pos_billing';

$route['send-sales-summary'] = 'Home/send_sales_summary';
