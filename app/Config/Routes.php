<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//register an admin
$routes->get('/register', 'Register::index');
$routes->post('/register', 'Register::index');

//login route
$routes->get('/login-form', 'Home::loginForm');
$routes->post('/login-form', 'Home::loginForm');

//forgot password
$routes->get('/forgot-password', 'Home::forgotPassword');
$routes->post('/forgot-password', 'Home::forgotPassword');
// password reset url
$routes->get('/reset-password/{:any}', 'Home::resetPassword/$1');
$routes->post('/reset-password/{:any}', 'Home::resetPassword/$1');

//ADMIN FILTER TO PREVENT  ACCESS TO NON ADMINS

$routes->group('', ['filter' => 'isAdmin'], function($routes){
    //admin dashboard route
    $routes->get('dashboard/', 'Dashboard::index');
    $routes->get('dashboard/users', 'Dashboard::allUsers');
    //reset password
    $routes->get('/reset-password/(:any)', 'Home::resetPassword/$1');
    $routes->post('/reset-password/(:any)', 'Home::resetPassword/$1');



    $routes->get('dashboard/single-message', 'Dashboard::singleSMS');
    $routes->post('dashboard/single-message', 'Dashboard::singleSMS');

    $routes->get('dashboard/group-message', 'Dashboard::groupSMS');
    $routes->post('dashboard/group-message', 'Dashboard::groupSMS');

    //subscriptions
    $routes->get('dashboard/subscriptions', 'Dashboard::recentSubscriptions');

    //ips
    $routes->get('dashboard/broadcasting', 'Dashboard::broadcasting');
    $routes->get('dashboard/ptp', 'Dashboard::ptp');
    // editing and deleting
    $routes->get('dashboard/edit-client/(:num)', 'Dashboard::editClient/$1');
    $routes->post('dashboard/edit-client/(:num)', 'Dashboard::editClient/$1');
    $routes->get('dashboard/delete-client/(:num)', 'Dashboard::editClient/$1');

    //settings management
    $routes->get('dashboard/change-password', 'Dashboard::changePassword');
    $routes->post('dashboard/change-password', 'Dashboard::changePassword');

    //edit admin profile
    $routes->get('dashboard/edit-admin', 'Dashboard::editAdmin');
    $routes->post('dashboard/edit-admin', 'Dashboard::editAdmin');

    $routes->get('dashboard/support', 'Dashboard::support');

    // admin profile
    $routes->get('dashboard/profile', 'Dashboard::profile');
    $routes->post('dashboard/profile', 'Dashboard::profile');

    //logout url
    $routes->get('dashboard/logout', 'Dashboard::logout');
});

