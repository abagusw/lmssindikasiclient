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
class Course extends BaseController
{
    public function __construct()
    {

        $this->userModel = new UserModel();
        $this->masterCourseModel = new MasterCourseModel();
        $this->masterCourseLesson = new MasterCourseLesson();
        $this->masterLesson = new MasterLesson();
    }

    public function index()
    {
        $request = \Config\Services::request();

        $kategori = $request->getGet('kategori');
        $sort     = $request->getGet('sort') ?? 'desc';
        $limit    = (int) ($request->getGet('limit') ?? 10);

        $this->masterCourseModel->orderBy('id', $sort);
        if ($kategori) {
            $this->masterCourseModel->where('kategori', $kategori);
        }

      //  $data['courses'] = $this->masterCourseModel->where('kategori !=',0)->paginate($limit);
        $data['courses'] = $this->masterCourseModel->paginate($limit);
        $data['pager'] = $this->masterCourseModel->pager;
        $data['kategori'] = $kategori;
        $data['request'] = $request;

        return view('course/bg_index', $data);
    }



    //--------------------------------------------------------------------

}
