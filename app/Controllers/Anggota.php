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
use App\Models\MasterCourseModel;
use App\Models\MasterCourseLesson;
use App\Models\MasterLesson;
use App\Models\MasterCourseParticipantModel;
use App\Models\MasterCourseAnalyticModel;
use App\Models\MemberModel;
use App\Models\MasterCityModel;

class Anggota extends BaseController
{
    public function __construct()
    {

        $this->userModel = new UserModel();
        $this->masterCourseModel = new MasterCourseModel();
        $this->masterCourseLesson = new MasterCourseLesson();
        $this->masterLesson = new MasterLesson();
        $this->masterCourseAnalyticModel = new MasterCourseAnalyticModel();
        $this->masterCourseParticipantModel = new MasterCourseParticipantModel();
        $this->memberModel = new MemberModel();
        $this->masterCityModel = new MasterCityModel();
        
    }

    public function list(){
        $data = [
            'title' => 'Payment',
            'user_logged_in' => $this->userModel->find($this->session->get('id')),
            'memberActive' => $this->memberModel->countMemberByFlag(1),
            'memberAll' => $this->memberModel->countMemberAll(),
            'getData' => $this->memberModel->where('flag', '1')->findAll(),
        ];

        return view('anggota/bg_index', $data);        
    }


}

?>