<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

// Staff
$routes->group('staff', static function ($routes) {
    $routes->get('/', 'AuthController::login');
    $routes->get('login', 'AuthController::login');
    $routes->post('postLogin', 'AuthController::postLogin');
    $routes->get('register', 'AuthController::register');
    $routes->post('postRegister', 'AuthController::postRegister');
    $routes->get('logout', 'AuthController::logout');
    $routes->get('dashboard', 'Home::dashboard', ['filter' => 'authGuard']);
    $routes->get('pdf', 'PdfController::index', ['filter' => 'authGuard']);
    $routes->get('quotepdf/(:num)', 'PdfController::makeQuotePdf/$1', ['filter' => 'authGuard']);
    $routes->get('invoicepdf/(:num)', 'PdfController::makeInvoicePdf/$1', ['filter' => 'authGuard']);

    $routes->group('account', static function ($routes) {
        $routes->get('/', 'AccountController::index', ['filter' => 'authGuard']);
        $routes->get('add', 'AccountController::account_add', ['filter' => 'authGuard']);
        $routes->get('edit/(:num)', 'AccountController::account_edit/$1', ['filter' => 'authGuard']);
        $routes->post('create', 'AccountController::create_account', ['filter' => 'authGuard']);
        $routes->put('save_update/(:num)', 'AccountController::save_update/$1');
        $routes->get('view/(:num)', 'AccountController::account_view/$1', ['filter' => 'authGuard']);
        $routes->get('delete/(:num)', 'AccountController::account_delete/$1');
    });

    $routes->group('lead', static function ($routes) {
        $routes->get('/', 'LeadController::index', ['filter' => 'authGuard']);
        $routes->get('add', 'LeadController::lead_add', ['filter' => 'authGuard']);
        $routes->get('edit/(:num)', 'LeadController::lead_edit/$1', ['filter' => 'authGuard']);
        $routes->post('create', 'LeadController::create_lead', ['filter' => 'authGuard']);
        $routes->put('save_update/(:num)', 'LeadController::save_update/$1');
        $routes->get('view/(:num)', 'LeadController::lead_view/$1', ['filter' => 'authGuard']);
        $routes->get('delete/(:num)', 'LeadController::lead_delete/$1');
    });

    $routes->group('contact', static function ($routes) {
        $routes->get('/', 'ContactController::index', ['filter' => 'authGuard']);
        $routes->get('add', 'ContactController::contact_add', ['filter' => 'authGuard']);
        $routes->get('edit/(:num)', 'ContactController::contact_edit/$1', ['filter' => 'authGuard']);
        $routes->get('delete/(:num)', 'ContactController::contact_delete/$1', ['filter' => 'authGuard']);
        $routes->post('add_submit', 'ContactController::save_contact', ['filter' => 'authGuard']);
        $routes->post('edit_submit/(:num)', 'ContactController::update_contact/$1', ['filter' => 'authGuard']);
    });

    $routes->group('quote', static function ($routes) {
        $routes->get('/', 'QuoteController::index', ['filter' => 'authGuard']);
        $routes->post('add_submit', 'QuoteController::save_quote', ['filter' => 'authGuard']);
    });

    $routes->group('deal', static function ($routes) {
        $routes->get('/', 'DealController::index', ['filter' => 'authGuard']);
        $routes->get('add', 'DealController::deal_add', ['filter' => 'authGuard']);
        $routes->get('edit/(:num)', 'DealController::deal_edit/$1', ['filter' => 'authGuard']);
        $routes->get('delete/(:num)', 'DealController::deal_delete/$1', ['filter' => 'authGuard']);
        $routes->post('add_submit', 'DealController::save_deal', ['filter' => 'authGuard']);
        $routes->post('edit_submit/(:num)', 'DealController::update_deal/$1', ['filter' => 'authGuard']);
    });

    $routes->group('task', static function ($routes) {
        $routes->get('/', 'TaskController::index', ['filter' => 'authGuard']);
        $routes->get('add', 'TaskController::task_add', ['filter' => 'authGuard']);
        $routes->get('edit/(:num)', 'TaskController::task_edit/$1', ['filter' => 'authGuard']);
        $routes->get('delete/(:num)', 'TaskController::task_delete/$1', ['filter' => 'authGuard']);
        $routes->post('add_submit', 'TaskController::save_task', ['filter' => 'authGuard']);
        $routes->post('edit_submit/(:num)', 'TaskController::update_task/$1', ['filter' => 'authGuard']);
    });
    
    
    $routes->group('leave', static function ($routes) {
        $routes->get('/', 'Leave::index', ['filter' => 'authGuard']);
        $routes->post('save', 'Leave::store', ['filter' => 'authGuard']);
        $routes->get('edit-view/(:num)', 'Leave::singleData/$1', ['filter' => 'authGuard']);
        $routes->get('delete/(:num)', 'Leave::delete/$1', ['filter' => 'authGuard']);
    });
    $routes->group('expenses', static function ($routes) {
        $routes->get('/', 'Expenses::index', ['filter' => 'authGuard']);
        $routes->post('save', 'Expenses::store', ['filter' => 'authGuard']);
        $routes->get('edit-view/(:num)', 'Expenses::singleData/$1', ['filter' => 'authGuard']);
        $routes->get('delete/(:num)', 'Expenses::delete/$1', ['filter' => 'authGuard']);
    });
    $routes->group('meeting', static function ($routes) {
        $routes->get('/', 'Meeting::index', ['filter' => 'authGuard']);
        $routes->post('save', 'Meeting::store', ['filter' => 'authGuard']);
        $routes->get('edit-view/(:num)', 'Meeting::singleData/$1', ['filter' => 'authGuard']);
        $routes->get('delete/(:num)', 'Meeting::delete/$1', ['filter' => 'authGuard']);
    });
    $routes->group('purchases', static function ($routes) {
        $routes->get('/', 'Purchases::index', ['filter' => 'authGuard']);
        $routes->post('save', 'Purchases::store', ['filter' => 'authGuard']);
        $routes->get('edit-view/(:num)', 'Purchases::singleData/$1', ['filter' => 'authGuard']);
        $routes->get('delete/(:num)', 'Purchases::delete/$1', ['filter' => 'authGuard']);
    });
    $routes->group('project', static function ($routes) {
        $routes->get('/', 'Project::index', ['filter' => 'authGuard']);
        $routes->post('save', 'Project::store', ['filter' => 'authGuard']);
        $routes->get('edit-view/(:num)', 'Project::singleData/$1', ['filter' => 'authGuard']);
        $routes->get('delete/(:num)', 'Project::delete/$1', ['filter' => 'authGuard']);
        
        $routes->get('task/(:num)', 'Project::task/$1', ['filter' => 'authGuard']);
        $routes->post('taskStore', 'Project::taskStore', ['filter' => 'authGuard']);
        $routes->get('taskSingleData/(:num)', 'Project::taskSingleData/$1', ['filter' => 'authGuard']);
        $routes->get('taskDelete/(:num)', 'Project::taskDelete/$1', ['filter' => 'authGuard']);
    });

    $routes->group('product', static function ($routes) {
        $routes->get('/', 'ProductController::index', ['filter' => 'authGuard']);
        $routes->get('add', 'ProductController::Product_add', ['filter' => 'authGuard']);
        $routes->get('edit/(:num)', 'ProductController::Product_edit/$1', ['filter' => 'authGuard']);
        $routes->get('delete/(:num)', 'ProductController::Product_delete/$1', ['filter' => 'authGuard']);
        $routes->post('add_submit', 'ProductController::save_Product', ['filter' => 'authGuard']);
        $routes->post('edit_submit/(:num)', 'ProductController::update_Product/$1', ['filter' => 'authGuard']);
    });
    $routes->group('TDO', static function ($routes) {
        $routes->get('/', 'TDOSController::index', ['filter' => 'authGuard']);
        $routes->get('add', 'TDOSController::TDO_add', ['filter' => 'authGuard']);
        $routes->get('edit/(:num)', 'TDOSController::TDO_edit/$1', ['filter' => 'authGuard']);
        $routes->get('delete/(:num)', 'TDOSController::TDO_delete/$1', ['filter' => 'authGuard']);
        $routes->post('add_submit', 'TDOSController::save_TDO', ['filter' => 'authGuard']);
        $routes->post('edit_submit/(:num)', 'TDOSController::update_TDO/$1', ['filter' => 'authGuard']);
    });

    $routes->group('quotes', static function ($routes) {
        $routes->get('/', 'QuoteController::index', ['filter' => 'authGuard']);
        $routes->get('add', 'QuoteController::Quote_add', ['filter' => 'authGuard']);
        $routes->get('edit/(:num)', 'QuoteController::Quote_edit/$1', ['filter' => 'authGuard']);
        $routes->get('delete/(:num)', 'QuoteController::Quote_delete/$1', ['filter' => 'authGuard']);
        $routes->post('add_submit', 'QuoteController::save_Quote', ['filter' => 'authGuard']);
        $routes->post('edit_submit/(:num)', 'QuoteController::update_Quote/$1', ['filter' => 'authGuard']);
        $routes->post('change_currency', 'QuoteController::change_currency', ['filter' => 'authGuard']);
        $routes->get('get_state/(:num)', 'QuoteController::get_state/$1', ['filter' => 'authGuard']);
        $routes->post('change_state', 'QuoteController::change_state', ['filter' => 'authGuard']);
    });

    $routes->group('Orders', static function ($routes) {
        $routes->get('/', 'OrderController::index', ['filter' => 'authGuard']);
        $routes->get('add', 'OrderController::Orders_add', ['filter' => 'authGuard']);
        $routes->get('edit/(:num)', 'OrderController::Orders_edit/$1', ['filter' => 'authGuard']);
        $routes->get('delete/(:num)', 'OrderController::Orders_delete/$1', ['filter' => 'authGuard']);
        $routes->post('add_submit', 'OrderController::save_Orders', ['filter' => 'authGuard']);
        $routes->post('edit_submit/(:num)', 'OrderController::update_Orders/$1', ['filter' => 'authGuard']);
    });

    $routes->group('invoice', static function ($routes) {
        $routes->get('/', 'InvoiceController::index', ['filter' => 'authGuard']);
        $routes->get('add', 'InvoiceController::Invoice_add', ['filter' => 'authGuard']);
        $routes->get('edit/(:num)', 'InvoiceController::Invoice_edit/$1', ['filter' => 'authGuard']);
        $routes->get('delete/(:num)', 'InvoiceController::Invoice_delete/$1', ['filter' => 'authGuard']);
        $routes->post('add_submit', 'InvoiceController::save_invoices', ['filter' => 'authGuard']);
        $routes->post('edit_submit/(:num)', 'InvoiceController::update_Invoice/$1', ['filter' => 'authGuard']);
    });

    $routes->group('activitylog', static function ($routes) {
        $routes->get('/', 'ActivityLogController::index', ['filter' => 'authGuard']);
    //    $routes->get('add_', 'ActivityLogController::activitylog_add', ['filter' => 'authGuard']);
    });

    $routes->group('master', static function ($routes) {
        $routes->get('prefix', 'MasterController::prefix', ['filter' => 'authGuard']);
        $routes->get('leadsource', 'MasterController::leadsource', ['filter' => 'authGuard']);
        $routes->get('leadstatus', 'MasterController::leadstatus', ['filter' => 'authGuard']);
        $routes->get('industry', 'MasterController::industry', ['filter' => 'authGuard']);
        $routes->get('customertype', 'MasterController::customertype', ['filter' => 'authGuard']);
        $routes->get('actionrequired', 'MasterController::actionrequired', ['filter' => 'authGuard']);
        $routes->get('productcategory', 'MasterController::productcategory', ['filter' => 'authGuard']);
        $routes->get('brand', 'MasterController::brand', ['filter' => 'authGuard']);
        $routes->get('rating', 'MasterController::rating', ['filter' => 'authGuard']);
        $routes->get('paymentterm', 'MasterController::paymentterm', ['filter' => 'authGuard']);

        $routes->post('add/(:any)', 'MasterController::add/$1', ['filter' => 'authGuard']);

        $routes->get('addprefix', 'MasterController::addprefix', ['filter' => 'authGuard']);
        $routes->get('addleadsource', 'MasterController::addleadsource', ['filter' => 'authGuard']);
        $routes->get('addleadstatus', 'MasterController::addleadstatus', ['filter' => 'authGuard']);
        $routes->get('addindustry', 'MasterController::addindustry', ['filter' => 'authGuard']);
        $routes->get('addcustomertype', 'MasterController::addcustomertype', ['filter' => 'authGuard']);
        $routes->get('addactionrequired', 'MasterController::addactionrequired', ['filter' => 'authGuard']);
        $routes->get('addproductcategory', 'MasterController::addproductcategory', ['filter' => 'authGuard']);
        $routes->get('addbrand', 'MasterController::addbrand', ['filter' => 'authGuard']);
        $routes->get('addrating', 'MasterController::addrating', ['filter' => 'authGuard']);
        $routes->get('addpaymentterm', 'MasterController::addpaymentterm', ['filter' => 'authGuard']);
    });
});


/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}