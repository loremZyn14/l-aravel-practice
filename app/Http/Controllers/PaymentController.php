<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function authorizeAccount(Request $request)
    {
        $response = Http::withBasicAuth('sk_test_4BMTh5UpimVK1W4ZxXkb9RV1', '')->post('https://api.paymongo.com/v1/sources', [
            'data' => [
                'attributes' => [
                    'type' => 'gcash',
                    'amount' => 20000,
                    "currency" => "PHP",
                    'billing' => [
                        "address" => [
                            "city" => "Taguig",
                            "country" => "PH",
                            "line1" => "9th Avenue and 26th Street, Unit 3308",
                            "line2" => "High Street South Corporate Plaza Tower 2",
                            "postal_code" => "1634",
                            "state" => "Metro Manila"
                        ],
                        "email" => "juan@paymongo.com",
                        "name" => "Juan Dela Cruz",
                        "phone" => "09168268582"
                    ],
                    "redirect" => [
                        "failed" => "http://127.0.0.1:8000/gcash/failed",
                        "success" => "http://127.0.0.1:8000/gcash/success"
                    ],

                ],
            ]
        ]);
        return redirect($response['data']['attributes']['redirect']['checkout_url']);
        // Http::withBasicAuth('sk_test_4BMTh5UpimVK1W4ZxXkb9RV1', '')
        //     ->post('https://api.paymongo.com/v1/payments', [
        //         'data' => [
        //             'attributes' => [
        //                 'amount' => 10000,
        //                 "description" => "asd",
        //                 'currency' => 'PHP',

        //                 "source" => [
        //                     "id" => $response['data']['id'],
        //                     "type" => "source"
        //                 ],
        //             ],
        //         ]
        //     ]);
        // dd($response);
        // dd($response['data']['attributes']['redirect']['success']);
        // if ($response->successful()) {
        //     return redirect($response['data']['attributes']['redirect']['success'])->with([
        //         'data' => ''
        //     ]);
        // }
    }

    public function success()
    {
        dd('success');
    }
    public function failed()
    {
        dd('failed');
    }
}
