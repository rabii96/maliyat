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
Route::get('/services/add', 'PagesController@addService')->name('addService');
Route::get('/project/{id}', 'PagesController@projectDetails')->name('projectDetails');
Route::get('/service/{id}', 'PagesController@serviceDetails')->name('serviceDetails');

//Projects and services routes
Route::get('/projects-and-services', 'ProjectController@index')->name('allProjectsAndServices');
// Project routes
Route::get('/projects/add', 'ProjectController@create')->name('addProject');
Route::post('/projects/add', 'ProjectController@store')->name('addProject');


// Settings routes
Route::get('/settings', 'SettingsController@index')->name('settings');
Route::post('/settings', 'SettingsController@save')->name('applySettings');


// Percentage routes
Route::post('/addPercentage', 'PercentageController@store')->name('addPercentage');
Route::get('/deletePercentage/{id}', 'PercentageController@destroy')->name('deletePercentage');


// Task routes
Route::post('/addTask', 'TaskController@store')->name('addTask');
Route::get('/deleteTask', 'TaskController@destroy')->name('deleteTask');

// Expense routes
Route::post('/addExpenseType', 'ExpenseTypeController@store')->name('addExpenseType');
Route::get('/deleteExpenseType', 'ExpenseTypeController@destroy')->name('deleteExpenseType');

// Transfer methods routes
Route::post('/addTransferMethod', 'TransferMethodController@store')->name('addTransferMethod');
Route::get('/deleteTransferMethod', 'TransferMethodController@destroy')->name('deleteTransferMethod');

// Bank routes
Route::post('/addBank', 'BankController@store')->name('addBank');

// BankTransfer routes
Route::post('/addBankTransfer', 'BankTransferController@store')->name('addBankTransfer');
Route::get('/bankTransfers/download/{id}', 'BankTransferController@download')->name('downloadBankTransfer');
Route::get('/bankTransfers/edit/{id}', 'BankTransferController@edit')->name('editBankTransfer');
Route::post('/bankTransfers/edit/{id}', 'BankTransferController@update')->name('editBankTransfer');
Route::get('/bankTransfers/delete/{id}', 'BankTransferController@destroy')->name('deleteBankTransfer');





// User routes
Route::get('/users', 'UsersController@index')->name('allUsers');
Route::get('/users/add', 'UsersController@create')->name('addUser');
Route::post('/users/add', 'UsersController@store')->name('addUser');
Route::get('/users/edit/{id}', 'UsersController@edit')->name('editUser');
Route::post('/users/edit/{id}', 'UsersController@update')->name('editUser');
Route::get('/users/delete/{id}', 'UsersController@destroy')->name('deleteUser');
Route::get('/users/download/{id}', 'UsersController@download')->name('downloadUser');

// Client routes
Route::get('/clients/add', 'ClientController@create')->name('addClient');
Route::post('/clients/add', 'ClientController@store')->name('addClient');
Route::get('/clients/edit/{id}', 'ClientController@edit')->name('editClient');
Route::post('/clients/edit/{id}', 'ClientController@update')->name('editClient');
Route::get('/clients/delete/{id}', 'ClientController@destroy')->name('deleteClient');
Route::get('/clients/download/{id}', 'ClientController@download')->name('downloadClient');

// Employee routes
Route::get('/employees/add', 'EmployeeController@create')->name('addEmployee');
Route::post('/employees/add', 'EmployeeController@store')->name('addEmployee');
Route::get('/employees/edit/{id}', 'EmployeeController@edit')->name('editEmployee');
Route::post('/employees/edit/{id}', 'EmployeeController@update')->name('editEmployee');
Route::get('/employees/delete/{id}', 'EmployeeController@destroy')->name('deleteEmployee');
Route::get('/employees/download/{id}', 'EmployeeController@download')->name('downloadEmployee');



// Authentication routes
Auth::routes();
Route::get('/register', function(){
    return redirect()->route('login');
});
Route::get('/home', 'HomeController@index')->name('home');
