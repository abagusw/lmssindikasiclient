<?php

namespace App\Controllers;

use Config\Midtrans;
use Midtrans\Snap;
use Midtrans\Transaction;
use Midtrans\Notification;
use App\Models\PaymentCallBackModel;
use App\Models\PaymentModel;

class MidtransController extends BaseController
{

    public function index(){
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = Midtrans_ServerKey;
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $param = [
             'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 10,
            )
        ];

        $data = [
            'snapToken' => \Midtrans\Snap::getSnapToken($param)
        ];

        return view('paymentXXX/pay',$data);
    }

    public function token()
    {
        log_message('info', 'Token Midtrans dipanggil...');
        try {
            \Config\Midtrans::init();

            $params = [
                'transaction_details' => [
                    'order_id' => uniqid(),
                    'gross_amount' => 100000,
                ],
                'customer_details' => [
                    'first_name' => 'Budi',
                    'last_name' => 'Setiawan',
                    'email' => 'budi@example.com',
                    'phone' => '08111222333',
                ],
            ];

            $snapToken = \Midtrans\Snap::getSnapToken($params);
            return $this->response->setJSON(['token' => $snapToken]);

        } catch (\Throwable $e) {
            // Log dan kirim ke browser
            log_message('error', 'Midtrans Error: ' . $e->getMessage());
            return $this->response->setJSON(['error' => $e->getMessage()])->setStatusCode(500);
        }
    }

    public function notification()
    {
        Config::$serverKey = Midtrans_ServerKey;
        Config::$isProduction = false;


        $notif = new Notification();

        $transaction_status = $notif->transaction_status;
        $payment_type       = $notif->payment_type;
        $order_id           = $notif->order_id;
        $fraud_status       = $notif->fraud_status;

        log_message('info', 'Midtrans Notif: ' . json_encode($notif));

        $paymentCallbackModel = new PaymentCallBackModel();
        $paymentModel = new PaymentModel();
        $paymentCallbackModel->updateStatusByOrderId($order_id, $transaction_status);

        // Respon ke Midtrans WAJIB 200 OK
        return $this->response->setStatusCode(200)->setJSON(['message' => 'Notification received']);
    }
}