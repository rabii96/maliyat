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





//Projects and services routes
Route::get('/projects-and-services', 'ProjectController@index')->name('allProjectsAndServices');
// Project routes
Route::get('/projects/add', 'ProjectController@create')->name('addProject');
Route::post('/projects/add', 'ProjectController@store')->name('addProject');
Route::get('/project/{id}', 'ProjectController@show')->name('projectDetails');
Route::get('/project/{id}/receive', 'ProjectController@receive')->name('receiveProject');
// Services routes
Route::get('/services/add', 'ServiceController@create')->name('addService');
Route::post('/services/add', 'ServiceController@store')->name('addService');
Route::get('/service/{id}', 'ServiceController@show')->name('serviceDetails');
Route::get('/service/edit/{id}', 'ServiceController@edit')->name('editService');
Route::post('/service/edit/{id}', 'ServiceController@update')->name('editService');
Route::get('/service/{id}/receive', 'ServiceController@receive')->name('receiveService');
Route::get('/service/delete/{id}', 'ServiceController@destroy')->name('deleteService');
Route::get('/service/download/{id}', 'ServiceController@download')->name('downloadService');




// Payments routes
Route::get('/payments/add', 'RealPaymentController@create')->name('addPayment');
Route::post('/payments/add', 'RealPaymentController@store')->name('addPayment');
Route::get('/payments/download/{id}', 'RealPaymentController@download')->name('downloadPayment');
Route::post('/updatePaymentNumbers', 'RealPaymentController@updatePaymentNumbers')->name('updatePaymentNumbers');
Route::get('/payments', 'RealPaymentController@index')->name('allPayments');
Route::get('/payments/edit/{id}', 'RealPaymentController@edit')->name('editPayment');
Route::post('/payments/edit/{id}', 'RealPaymentController@update')->name('editPayment');
Route::get('/payments/delete/{id}', 'RealPaymentController@destroy')->name('deletePayment');




// Expenses routes
Route::get('/expenses/add', 'ExpenseController@create')->name('addExpense');
Route::post('/expenses/add', 'ExpenseController@store')->name('addExpense');
Route::get('/expenses', 'ExpenseController@index')->name('allExpenses');
Route::post('/updateProjectServiceId', 'ExpenseController@updateProjectServiceId')->name('updateProjectServiceId');




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
