<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@dashboard')->name('dashboard');
Route::get('/expenses/add', 'PagesController@addExpense')->name('addExpense');
Route::get('/expenses', 'PagesController@allExpenses')->name('allExpenses');
Route::get('/payments/add', 'PagesController@addPayment')->name('addPayment');
Route::get('/payments', 'PagesController@allPayments')->name('allPayments');
Route::get('/projects/add', 'PagesController@addProject')->name('addProject');
Route::get('/services/add', 'PagesController@addService')->name('addService');
Route::get('/projects-and-services', 'PagesController@allProjectsAndServices')->name('allProjectsAndServices');
Route::get('/project/{id}', 'PagesController@projectDetails')->name('projectDetails');
Route::get('/service/{id}', 'PagesController@serviceDetails')->name('serviceDetails');
Route::get('/settings', 'PagesController@settings')->name('settings');
Route::get('/clients/add', 'PagesController@addClient')->name('addClient');
Route::get('/employees/add', 'PagesController@addEmployee')->name('addEmployee');
Route::get('/users/add', 'PagesController@addUser')->name('addUser');
Route::get('/users', 'PagesController@allUsers')->name('allUsers');
