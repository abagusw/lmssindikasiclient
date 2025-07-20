<?php

namespace App\Controllers;

use Config\Midtrans;
use Midtrans\Snap;
use Midtrans\Transaction;
use App\Models\UserModel;
use Midtrans\Config;
use Midtrans\Notification;
use App\Models\PaymentCallBackModel;
use App\Models\PaymentModel;

class Dashboard extends BaseController
{
    public function __construct()
    {

        $this->userModel = new UserModel();
    }

    public function index()
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = Midtrans_ServerKey;
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        // $param = [
        //      'transaction_details' => array(
        //         'order_id' => rand(),
        //         'gross_amount' => 75000,
        //     )
        // ];

        $order_id = uniqid();
        $param = [
            'transaction_details' => [
                'order_id' => $order_id,
                'gross_amount' => 75000,
            ],
            'customer_details' => [
                'Nama Lengkap' => session()->get('nama_lengkap'),
                'Nama Panggilan' => session()->get('nama_panggilan'),
                'email' => session()->get('email'),
            ],
        ];

        $data = [
            'title' => 'Dashboard',
            'user_logged_in' => $this->userModel->find($this->session->get('id')),
            'snapToken' => \Midtrans\Snap::getSnapToken($param),
            'session' => \Config\Services::session()
        ];

        return view('dashboard/index', $data);
    }

    public function token()
    {
        log_message('info', 'Token Midtrans dipanggil...');
        try {
            \Config\Midtrans::init();
            $order_id = uniqid();
            $params = [
                'transaction_details' => [
                    'order_id' => $order_id,
                    'gross_amount' => 75000,
                ],
                'customer_details' => [
                    'Nama Lengkap' => session()->get('nama_lengkap'),
                    'Nama Panggilan' => session()->get('nama_panggilan'),
                    'email' => session()->get('email'),
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

    public function insert_transaksi()
    {
        $request = $this->request->getJSON(); // JSON dari client
        $paymentCallbackModel = new PaymentCallBackModel();
        $paymentModel = new PaymentModel();
        $id  = session()->get('id');
        $email = session()->get('email');
        $nama_lengkap = session()->get('nama_lengkap');
        $nama_panggilan = session()->get('nama_panggilan');

        $existing = $paymentCallbackModel->where('order_id', $request->order_id)->first();

            $dataPayment = [
                'type'                  => 'Registration',
                'user_id'               => $id,
                'user'                  => $email,
                'fullname'              => $nama_lengkap,
                'amount'                => $request->gross_amount,
                'method'                => $request->payment_type,
                'status'    => $request->transaction_status ?? null
            ];

            

            $data = [
                'order_id'         => $request->order_id,
                'user_id'          => $id,
                'transaction_id'   => $request->transaction_id,
                'transaction_time' => $request->transaction_time,
                'payment_type'     => $request->payment_type,
                'transaction_status' => $request->transaction_status,
                'gross_amount'     => $request->gross_amount,
                //'currency'         => $request->currency,
                'fraud_status'     => $request->fraud_status ?? null,
                'settlement_time'  => $request->settlement_time ?? null,
                'status_code'      => $request->status_code,
                'status_message'   => $request->status_message,
                'va_number'        => isset($request->va_numbers[0]->va_number) ? $request->va_numbers[0]->va_number : null,
                'bank'             => isset($request->va_numbers[0]->bank) ? $request->va_numbers[0]->bank : null
            ];

            


        if ($existing) {
            $paymentCallbackModel->where('order_id', $request->order_id)->set($data)->update();
            $paymentModel->where('user_id', $id)->set($dataPayment)->update();
        }else{
            $paymentModel->insert($dataPayment);
            $paymentCallbackModel->insert($data);

        }
        //$model->where('order_id', $request->order_id)->set($data)->update();

        return $this->response->setJSON(['status' => 'success']);
    }

    public function getDataByToken(){
        $token = $this->request->getPost('token');
        $url = "https://app.sandbox.midtrans.com/snap/v1/transactions/".$token."/status";

        $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => $url,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'GET',
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            echo $response;

    }

    //--------------------------------------------------------------------

}
