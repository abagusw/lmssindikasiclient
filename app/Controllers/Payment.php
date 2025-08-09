<?php

namespace App\Controllers;

use Config\Midtrans;
use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Transaction;
use App\Models\UserModel;
use App\Models\MemberModel;
use App\Models\PaymentModel;
use App\Models\LogModel;
use CodeIgniter\Email\Email;
use App\Controllers\SendEmailCon;
use App\Libraries\SendEmail;
use App\Models\PaymentCallBackModel;
use App\Models\PaymentSuccessMemberModel;

class Payment extends BaseController
{
    protected $userModel;
    protected $memberModel;
    protected $paymentModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->memberModel = new MemberModel();
        $this->paymentModel = new PaymentModel();
        $this->paymentSuccessMemberModel = new PaymentSuccessMemberModel();
    }

    public function index()
    {
        $getPaymentSukses = $this->paymentSuccessMemberModel->orderBy('id', 'DESC')->where('user_id',$this->session->get('id'));
        $getCekPaymentSukses = $this->paymentSuccessMemberModel->orderBy('id', 'DESC')->where('user_id',$this->session->get('id'))->countAllResults();
        $rowData = $getPaymentSukses->first();
        $data = [
            'title' => 'Payment',
            'user_logged_in' => $this->userModel->find($this->session->get('id')),
            'memberActive' => $this->memberModel->countMemberByFlag(1),
            'memberAll' => $this->memberModel->countMemberAll(),
            'getData' => $this->memberModel->where('flag', '1')->findAll(),
            'rowData' => $rowData,
            'getCekPaymentSukses' => $getCekPaymentSukses
        ];

        return view('payment/bg_index', $data);
    }

    public function index_call_back()
    {
        $data = [
            'title' => 'Payment',
            'user_logged_in' => $this->userModel->find($this->session->get('id'))
,
        ];

        return view('payment/bg_index_callback', $data);
    }

    public function getPayment(){
        // print_r("disini");
        // die;
       //$list = $this->User_model->get_datatables();
        $paymentModel = new PaymentModel();
        $list = $paymentModel->getDatatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
                $no++;
                $row = array();
                $row[] = $field->type;
                $row[] = $field->user;
                $row[] = $field->amount;
                $row[] = $field->method;
                if($field->status == 0){
                    $st = "<span class='badge rounded-pill text-bg-secondary'>Pending</span>";
                }else{
                    $st = "<span class='badge rounded-pill text-bg-primary'>Paid</span>";
                }
                $row[] = $st;
                $row[] = $field->created_at;
                $row[] = "<div class='icon-container'><!-- <a href='#' class='icon-link'><i class='fa-solid fa-file-lines'></i></a>
    <a href='#' class='icon-link'><i class='fa-regular fa-file-lines'></i></a>  -->
    <a href='".base_url("payment/index_call_back")."' class='icon-link'>
    <i class='fa-solid fa-hand-holding-dollar'></i></a></div>";
                $data[] = $row;
        }

        $output = array(
                'draw' => intval($this->request->getPost('draw')),
                'recordsTotal' => $paymentModel->countAll(),
                'recordsFiltered' => $paymentModel->countFiltered(),
                "data" => $data,
        );

       // return $output;
        //output dalam format JSON
        echo json_encode($output);
    }

    public function getPaymentCallBack(){
        // print_r("disini");
        // die;
       //$list = $this->User_model->get_datatables();
        $paymentModel = new PaymentCallBackModel();
        $list = $paymentModel->getDatatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
                $no++;
                $row = array();
                $row[] = $field->transaction_status;
                $row[] = $field->payment_type;
                $row[] = $field->order_id;
                $row[] = $field->gross_amount;
                $row[] = $field->va_number;
                $row[] = $field->bank;
                $row[] = $field->url;
                $row[] = $field->token;
                $row[] = $field->create_date;
                $data[] = $row;
        }

        $output = array(
                'draw' => intval($this->request->getPost('draw')),
                'recordsTotal' => $paymentModel->countAll(),
                'recordsFiltered' => $paymentModel->countFiltered(),
                "data" => $data,
        );

       // return $output;
        //output dalam format JSON
        echo json_encode($output);
    }

    public function aksiBayar(){
        $grossAmount = $this->request->getPost('gross_amount');
        $periode = $this->request->getPost('periode');
        
        \Midtrans\Config::$serverKey = Midtrans_ServerKey;
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
        $order_id = uniqid()."|".session()->get('id')."|".$periode."";
        $param = [
            'transaction_details' => [
                'order_id' => $order_id,
                'gross_amount' => (int)$grossAmount,
            ],
            'customer_details' => [
                'first_name' => session()->get('nama_lengkap'),
                'last_name' => session()->get('nama_panggilan'),
                'email' => session()->get('email'),
            ],
        ];

        $snapToken = \Midtrans\Snap::getSnapToken($param);
        return $this->response->setJSON(['token' => $snapToken]);
    }

    

}
?>