<?php

namespace App\Controllers;

use Config\Midtrans;
use Midtrans\Snap;
use Midtrans\Transaction;
use Midtrans\Notification;
use App\Models\PaymentCallBackModel;
use App\Models\PaymentModel;
use App\Models\MemberModel;

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
        \Midtrans\Config::$serverKey = Midtrans_ServerKey;
        \Midtrans\Config::$isProduction = false;
        // $id  = session()->get('id');
        // $email = session()->get('email');
        // $nama_lengkap = session()->get('nama_lengkap');
        // $nama_panggilan = session()->get('nama_panggilan');
        $notifs = file_get_contents('php://input'); // ambil raw input



        //$notifs = new Notification();
        //log_message('info', 'Midtrans notifs: ' . $notifs);
        $notif = preg_replace('/[\x00-\x1F\x7F\xA0\x{200B}]/u', '', $notifs);
        $notif = json_decode($notif);


        $transaction_status = $notif->transaction_status;
        $payment_type       = $notif->payment_type;
        $order_id           = $notif->order_id;
        $fraud_status       = $notif->fraud_status;

        $parts = explode("|", $notif->order_id);
        $id = $parts[1];
        $memberModel = new MemberModel();
        $getMemberById = $memberModel->find($id);
        $email = $getMemberById['email'];
        $nama_lengkap = $getMemberById['nama_lengkap'];
        $nama_panggilan = $getMemberById['nama_panggilan'];



        log_message('info', 'Midtrans Notif: ' . json_encode($notif));

        $paymentCallbackModel = new PaymentCallBackModel();
        $paymentModel = new PaymentModel();
        $paymentCallbackModel->updateStatusByOrderId($order_id, $transaction_status);

        $cekCallBack = $paymentCallbackModel->where('order_id', $notif->order_id)->first();
        $cekCallBackandMember = $paymentCallbackModel->where('order_id', $notif->order_id)->where('user_id', $id)->first();


        //$memberModel = new MemberModel();


        $dataPayment = [
            'type'                  => 'Registration',
            'user_id'               => $id,
            'user'                  => $email,
            'fullname'              => $nama_lengkap,
            'amount'                => $notif->gross_amount,
            'method'                => $notif->payment_type,
            'status'                => $notif->transaction_status ?? null
        ];

        

        $data = [
            'order_id'         => $notif->order_id,
            'user_id'          => $id,
            'transaction_id'   => $notif->transaction_id,
            'transaction_time' => $notif->transaction_time,
            'payment_type'     => $notif->payment_type,
            'transaction_status' => $notif->transaction_status,
            'gross_amount'     => $notif->gross_amount,
            //'currency'         => $notif->currency,
            'fraud_status'     => $notif->fraud_status ?? null,
            'settlement_time'  => $notif->settlement_time ?? null,
            'status_code'      => $notif->status_code,
            'status_message'   => $notif->status_message,
            'va_number'        => isset($notif->va_numbers[0]->va_number) ? $notif->va_numbers[0]->va_number : null,
            'bank'             => isset($notif->va_numbers[0]->bank) ? $notif->va_numbers[0]->bank : null
        ];

        if($notif->transaction_status == 'settlement'){

            $dataMember = [
                    //'flag_active' => 1,
                    'isregisterpaid' => 1
            ];
            $updateMember = $memberModel->update($id,$dataMember);
        }

            

        if ($cekCallBack) {
            $paymentCallbackModel->where('order_id', $notif->order_id)->set($data)->update();
            $paymentModel->where('user_id', $id)->set($dataPayment)->update();
            
            log_message('info', 'Midtrans Data Update : ' . json_encode($notif));
        }else{
            $paymentModel->insert($dataPayment);
            $paymentCallbackModel->insert($data);
            log_message('info', 'Midtrans Data Insert : ' . json_encode($notif));

        }

  


        // Respon ke Midtrans WAJIB 200 OK
        return $this->response->setStatusCode(200)->setJSON(['message' => 'Notification received']);
    }


    public function notificationXXXXX()
    {
        \Midtrans\Config::$serverKey = Midtrans_ServerKey;
        \Midtrans\Config::$isProduction = false;


        $notifs = new Notification();
        log_message('info', 'Midtrans notifs: ' . $notifs);
        $notif = preg_replace('/[\x00-\x1F\x7F\xA0\x{200B}]/u', '', $notifs);


        $transaction_status = $notif->transaction_status;
        $payment_type       = $notif->payment_type;
        $order_id           = $notif->order_id;
        $fraud_status       = $notif->fraud_status;

        log_message('info', 'Midtrans Notif: ' . json_encode($notif));

        $paymentCallbackModel = new PaymentCallBackModel();
        $paymentModel = new PaymentModel();
        $paymentCallbackModel->updateStatusByOrderId($order_id, $transaction_status);

        $cekCallBack = $paymentCallbackModel->where('order_id', $notif->order_id)->first();

        $memberModel = new MemberModel();

        $dataMember = [
                'flag_active' => 1,
                'isregisteredpaid' => 1
        ];

        $updateMember = $memberModel->update($cekCallBack->user_id,$dataMember);


        // Respon ke Midtrans WAJIB 200 OK
        return $this->response->setStatusCode(200)->setJSON(['message' => 'Notification received']);
    }

//     public function notificationX(){
//         \Midtrans\Config::$serverKey = Midtrans_ServerKey;
//         \Midtrans\Config::$isProduction = false;


// // $notif = '{
// //   "va_numbers": [
// //     {
// //       "va_number": "34467616648177109189528",
// //       "bank": "bca"
// //     }
// //   ],
// //   "transaction_time": "2025-07-19 21:54:49",
// //   "transaction_status": "pending",
// //   "transaction_id": "439a3cca-0d37-46d5-a554-481d61b49376",
// //   "status_message": "midtrans payment notification",
// //   "status_code": "201",
// //   "signature_key": "97c5ae4df5f66281d68b15b40f31e97be53ff7bc8fffa40ad59af8a4f33dd512bdd5184570fe14c8496bd575ad59abec28c7c23522e3715c01434bf08a0a1992",
// //   "payment_type": "bank_transfer",
// //   "payment_amounts": [],
// //   "order_id": "687bb1b750e2b",
// //   "merchant_id": "G574834467",
// //   "gross_amount": "75000.00",
// //   "fraud_status": "accept",
// //   "expiry_time": "2025-07-20 21:54:49",
// //   "currency": "IDR"
// // }';

// $notif = '{
//   "va_numbers": [
//     {
//       "va_number": "34467616648177109189528",
//       "bank": "bca"
//     }
//   ],
//   "transaction_time": "2025-07-19 21:54:49",
//   "transaction_status": "pending",
//   "transaction_id": "439a3cca-0d37-46d5-a554-481d61b49376",
//   "status_message": "midtrans payment notification",
//   "status_code": "201",
//   "signature_key": "97c5ae4df5f66281d68b15b40f31e97be53ff7bc8fffa40ad59af8a4f33dd512bdd5184570fe14c8496bd575ad59abec28c7c23522e3715c01434bf08a0a1992",
//   "payment_type": "bank_transfer",
//   "payment_amounts": [],
//   "order_id": "687bb1b750e2b",
//   "merchant_id": "G574834467",
//   "gross_amount": "75000.00",
//   "fraud_status": "accept",
//   "expiry_time": "2025-07-20 21:54:49",
//   "currency": "IDR"
// }';

// $cleaned_notif = preg_replace('/[\x00-\x1F\x7F\xA0\x{200B}]/u', '', $notif);


//         $dataNotif = json_decode($cleaned_notif);

//         if (is_null($dataNotif)) {
//     echo "Gagal decode JSON. Error: " . json_last_error_msg();
//     exit;
// }


//         print_r('Midtrans Notif: ' . $dataNotif->transaction_status);
//         die;

//         $transaction_status = $notif->transaction_status;
//         $payment_type       = $notif->payment_type;
//         $order_id           = $notif->order_id;
//         $fraud_status       = $notif->fraud_status;

//         log_message('info', 'Midtrans Notif: ' . json_encode($notif));

//         $paymentCallbackModel = new PaymentCallBackModel();
//         $paymentModel = new PaymentModel();
//         $paymentCallbackModel->updateStatusByOrderId($order_id, $transaction_status);

//         $cekCallBack = $paymentCallbackModel->where('order_id', $request->order_id)->first();

//         $memberModel = new MemberModel();

//         $dataMember = [
//                 'flag_active' => 1,
//                 'isregisteredpaid' => 1
//         ];

//         $updateMember = $memberModel->update($cekCallBack->user_id,$dataMember);


//         // Respon ke Midtrans WAJIB 200 OK
//         return $this->response->setStatusCode(200)->setJSON(['message' => 'Notification received']);

//     }


}