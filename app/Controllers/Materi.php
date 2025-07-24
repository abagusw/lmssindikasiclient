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
class Materi extends BaseController
{
    public function __construct()
    {

        $this->userModel = new UserModel();
        $this->masterCourseModel = new MasterCourseModel();
        $this->masterCourseLesson = new MasterCourseLesson();
        $this->masterLesson = new MasterLesson();
    }

    public function masteri_dasar()
    {

        $dataCourseRow = $this->masterCourseModel->orderBy('id', 'DESC')->first();
        $dataLesson = $this->masterCourseLesson->where('course_id',$dataCourseRow['id'])->findAll();
        $dataLessonAsc = $this->masterCourseLesson->where('course_id',$dataCourseRow['id'])->orderBy('id', 'ASC')->first();;

        $data = [
            'title' => 'Dashboard',
            'user_logged_in' => $this->userModel->find($this->session->get('id')),
            'session' => \Config\Services::session(),
            'dataCourseRow' => $dataCourseRow,
            'dataLesson' => $dataLesson,
            'dataLessonAsc' => $dataLessonAsc
        ];



        return view('materi/bg_index', $data);
    }

    public function konten()
    {
        $uuid = service('uri')->getSegment(3);


        $dataCourseRow = $this->masterCourseModel->orderBy('id', 'DESC')->first();
        $dataLesson = $this->masterCourseLesson->where('course_id',$dataCourseRow['id'])->findAll();
        $getMsLessonByUuid =  $this->masterLesson->where('uuid',$uuid)->first();

        $uuid = $uuid;
        $apiKey = ApiKeyGhost;
        $ghostUrl = URLGhost;

        $url = "$ghostUrl/ghost/api/content/posts/slug/".$getMsLessonByUuid['slug']."/?key=$apiKey";


        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);
        $post = $data['posts'][0] ?? null;
        //         print_r($url);
        // die;
        if ($post) {
            //echo "Title: " . $post['title'];
        } else {
           // echo "Post not found.";
        }

        $data = [
            'title' => 'Dashboard',
            'user_logged_in' => $this->userModel->find($this->session->get('id')),
            'session' => \Config\Services::session(),
            'dataCourseRow' => $dataCourseRow,
            'dataLesson' => $dataLesson,
            'getData' => $post
        ];



        return view('materi/konten_materi', $data);
    }


    //--------------------------------------------------------------------

}
