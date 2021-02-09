<?php

use App\Phone;
use Illuminate\Support\Facades\Route;
use App\Mail\TestEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Twilio\Rest\Client;

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

Route::domain('{account}.myapp.com')->group(function () {
    Route::get('user/{id}', function ($account, $id) {
        dd('asd');
    });
});

Route::get('/testing',function(){

    $basic  = new \Nexmo\Client\Credentials\Basic('f75e12f1', 'BqzpY6X8kl1EjhsK');
    $client = new \Nexmo\Client($basic);
    $verification = $client->verify()->start([
        'number' => '639466640372',
        'brand'  => 'Vonage',
         'code_length'  => '4']);

    $requestID = $verification->getRequestId();

    return view('verify',compact('requestID'));
});

Route::post('/verify-code',function(Request $request){
    $basic  = new \Nexmo\Client\Credentials\Basic('f75e12f1', 'BqzpY6X8kl1EjhsK');
    $client = new \Nexmo\Client($basic);
    $request_id = $request->request_id;
    $verification = new \Nexmo\Verify\Verification($request_id);
    try{
        $result = $client->verify()->check($verification, $request->code);
        dd($result->getResponseData(), $result);

    }catch(Exception $e){
        dd($e->getMessage());
    }
});

Route::get('/email', function () {
    $data = ['message' => 'This is a test!'];

    Mail::to(['gerald.afable@student.passerellesnumeriques.org','danrish.it.solution@gmail.com'])->send(new TestEmail($data));

});

Route::get('/gcash', 'PaymentController@authorizeAccount');
Route::get('gcash/success', 'PaymentController@success');
Route::get('gcash/failed','PaymentController@failed');

// Twillo

// Route::view('/register','auth.register');
// Route::post('/register','UserController@store');
// Route::view('/welcome','welcome')->middleware('auth');
// Route::post('/create','AuthController@create');
// Route::get('/verify',function(){
//     return view('pages.verify');
// })->name('verify');

// Route::get('/users','UserController@index');
// Route::get('/users/{user}','UserController@show');


// Route::get('/phones','PhoneController@index');
// Route::get('phones/{id}/edit','PhoneController@edit');
// Route::put('/phones/{id}','PhoneController@update');
// Route::post('/phones','PhoneController@store');




