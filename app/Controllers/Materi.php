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

class Materi extends BaseController
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

    public function masteri_dasar()
    {
        $uri = service('uri');

        $course_id = service('uri')->getSegment(3);
        $dataCourseRow = $this->masterCourseModel->where('id',$course_id)->orderBy('id', 'DESC')->first();
        $dataLesson = $this->masterCourseLesson->where('course_id',$uri->getSegment(3))->findAll();
        $dataLessonAsc = $this->masterCourseLesson->where('course_id',$uri->getSegment(3))->orderBy('id', 'ASC')->first();;

        $data = [
            'title' => 'Dashboard',
            'user_logged_in' => $this->userModel->find($this->session->get('id')),
            'session' => \Config\Services::session(),
            'dataCourseRow' => $dataCourseRow,
            'dataLesson' => $dataLesson,
            'course_id' => $course_id,
            'dataLessonAsc' => $dataLessonAsc
        ];



        return view('materi/bg_index', $data);
    }

    public function konten()
    {
        //$uuid = service('uri')->getSegment(3);

        $course_id = service('uri')->getSegment(3);
    //   $course_id ini course lesson id
     //   print_r($course_id);
       // $getCourseid = $dataLesson = $this->masterCourseLesson->where('uuid',$uuid)->first();
        $dataCourseRow = $this->masterCourseModel->orderBy('id', 'DESC')->first();
        
   // dd($dataLesson, \Config\Database::connect()->getLastQuery());

       // $getMsLessonByUuid =  $this->masterLesson->where('uuid',$uuid)->first();
        $getMsCourseLessonByid =  $this->masterCourseLesson->where('id',$course_id)->first();

        $dataLesson = $this->masterCourseLesson->where('course_id',$getMsCourseLessonByid['course_id'])->findAll();
        $totalLesson = $this->masterCourseLesson->where('course_id', $getMsCourseLessonByid['course_id'])->countAllResults();

     //   dd($getMsCourseLessonByCourse, \Config\Database::connect()->getLastQuery());


        $getMsLessonByUuid =  $this->masterLesson->where('uuid',$getMsCourseLessonByid['uuid'])->first();
        $uuid = $getMsCourseLessonByid['uuid'];
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

        $course_lesson_id = $getMsCourseLessonByid['course_id']; 
        $session = \Config\Services::session();
        $courseAnalytic = new MasterCourseAnalyticModel();

        $data = $courseAnalytic->where('user_id', session()->get('id'))
               ->where('course_id', $course_lesson_id)
               ->where('course_lesson_id', $course_id)
               ->findAll();
        $count = count($data);

        if($count <= 0){
            $dataCourseAnalytic = [
                'user_id'   => session()->get('id'),
                'course_id'   => $course_lesson_id,
                'course_lesson_id'   => $course_id
            ];

            $insert = $courseAnalytic->insert($dataCourseAnalytic);

            if($insert){
                $jsonResp = json_encode(array('respCode'=>0,'respMessage'=>"Sukses Insert Data"));
            }else{
                $jsonResp = json_encode(array('respCode'=>1,'respMessage'=>"Gagal Insert Data"));
            }
        }else{
            $jsonResp = json_encode(array('respCode'=>0,'respMessage'=>"Sukses Insert Data"));
        }


        $lessons = $this->masterCourseLesson
            ->where('course_id', $getMsCourseLessonByid['course_id'])
            ->orderBy('sort','ASC')
            ->findAll();

        $currentIndex = array_search($getMsCourseLessonByid['id'], array_column($lessons, 'id')) + 1;
        $data = [
            'title' => 'Dashboard',
            'user_logged_in' => $this->userModel->find($this->session->get('id')),
            'session' => \Config\Services::session(),
            'dataCourseRow' => $dataCourseRow,
            'dataLesson' => $dataLesson,
            'getData' => $post,
            'course_id' => $course_id,
            'getMsCourseLessonByid' => $getMsCourseLessonByid,
            'currentIndex' => $currentIndex,
            'totalLesson' => $totalLesson
        ];






        return view('materi/konten_materi', $data);
    }

    public function materi_selesai()
    {
                //$uuid = service('uri')->getSegment(3);

        $course_id = service('uri')->getSegment(3);
    //   $course_id ini course lesson id
     //   print_r($course_id);
       // $getCourseid = $dataLesson = $this->masterCourseLesson->where('uuid',$uuid)->first();
        $dataCourseRow = $this->masterCourseModel->orderBy('id', 'DESC')->first();
        
   // dd($dataLesson, \Config\Database::connect()->getLastQuery());

       // $getMsLessonByUuid =  $this->masterLesson->where('uuid',$uuid)->first();
        $getMsCourseLessonByid =  $this->masterCourseLesson->where('id',$course_id)->first();

        $dataLesson = $this->masterCourseLesson->where('course_id',$getMsCourseLessonByid['course_id'])->findAll();
        $totalLesson = $this->masterCourseLesson->where('course_id', $getMsCourseLessonByid['course_id'])->countAllResults();

     //   dd($getMsCourseLessonByCourse, \Config\Database::connect()->getLastQuery());


        $getMsLessonByUuid =  $this->masterLesson->where('uuid',$getMsCourseLessonByid['uuid'])->first();
        $uuid = $getMsCourseLessonByid['uuid'];
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

        $course_lesson_id = $getMsCourseLessonByid['course_id']; 
        $session = \Config\Services::session();
        $courseAnalytic = new MasterCourseAnalyticModel();

        $data = $courseAnalytic->where('user_id', session()->get('id'))
               ->where('course_id', $course_lesson_id)
               ->where('course_lesson_id', $course_id)
               ->findAll();
        $count = count($data);

        if($count <= 0){
            $dataCourseAnalytic = [
                'user_id'   => session()->get('id'),
                'course_id'   => $course_lesson_id,
                'course_lesson_id'   => $course_id
            ];

            $insert = $courseAnalytic->insert($dataCourseAnalytic);

            if($insert){
                $jsonResp = json_encode(array('respCode'=>0,'respMessage'=>"Sukses Insert Data"));
            }else{
                $jsonResp = json_encode(array('respCode'=>1,'respMessage'=>"Gagal Insert Data"));
            }
        }else{
            $jsonResp = json_encode(array('respCode'=>0,'respMessage'=>"Sukses Insert Data"));
        }


        $lessons = $this->masterCourseLesson
            ->where('course_id', $getMsCourseLessonByid['course_id'])
            ->orderBy('sort','ASC')
            ->findAll();

        $currentIndex = array_search($getMsCourseLessonByid['id'], array_column($lessons, 'id')) + 1;
        $data = [
            'title' => 'Dashboard',
            'user_logged_in' => $this->userModel->find($this->session->get('id')),
            'session' => \Config\Services::session(),
            'dataCourseRow' => $dataCourseRow,
            'dataLesson' => $dataLesson,
            'getData' => $post,
            'course_id' => $course_id,
            'getMsCourseLessonByid' => $getMsCourseLessonByid,
            'currentIndex' => $currentIndex,
            'totalLesson' => $totalLesson
        ];
        return view('materi/bg_finish', $data);
    }

    public function selesai_baca(){
        $course_lesson_id = $this->request->getPost('course_lesson_id');
        $course_id = $this->request->getPost('course_id');
        $session = \Config\Services::session();
       // dd(session()->get('id'));
            $coursePart = new MasterCourseParticipantModel();

            $data = $coursePart->where('user_id', session()->get('id'))
                   ->where('course_id', $course_id)
                   ->where('course_lesson_id', $course_lesson_id)
                   ->findAll();
            $count = count($data);




            if($count <= 0){
                $dataCoursePart = [
                    'user_id'   => session()->get('id'),
                    'course_id'   => $course_id,
                    'course_lesson_id'   => $course_lesson_id
                ];

                $insert = $coursePart->insert($dataCoursePart);

                if($insert){
                    $jsonResp = json_encode(array('respCode'=>0,'respMessage'=>"Sukses Insert Data"));
                }else{
                    $jsonResp = json_encode(array('respCode'=>1,'respMessage'=>"Gagal Insert Data"));
                }
            }else{
                $jsonResp = json_encode(array('respCode'=>0,'respMessage'=>"Sukses Insert Data"));
            }

            echo $jsonResp;
    }

    public function cekMateriSelesai(){
        $course_lesson_id = $this->request->getPost('course_lesson_id');
        $course_id = $this->request->getPost('course_id');
        $session = \Config\Services::session();
        $dataCourse = $this->masterCourseModel->where('id',$course_id)->first();
        $dataLesson = $this->masterCourseLesson->where('course_id',$course_id)->findAll();
        $totalCourse = count($dataLesson);

        $dataCourseParticipant = $this->masterCourseParticipantModel->where('course_id',$course_id)->where('user_id',session()->get('id'))->findAll();
        $totalCourseParticipant = count($dataCourseParticipant);

        $sisa = $totalCourse - $totalCourseParticipant; 

        if($dataCourse['kategori'] == 0){
            $lblPendikan = "Pendidikan Dasar Serikat";
            $lblJenis = "Dasar";
        }else{
            $lblPendikan = $dataCourse['judul'];
            $lblJenis = $dataCourse['judul'];
        }
        if($sisa == 0){
            $getMemberByid = $this->userModel->findWithCity(session()->get('id'));


            $uniq = $this->generateNomorAnggota($getMemberByid['domisili']);
           // $nomor_anggota = "SND/".$uniq."-".$getMemberByid['city_kode']."";
            $nomor_anggota = $uniq;

                $data = [
                    'nomor_anggota' => $nomor_anggota,
                    'isfoundationalcoursecomplete' => 1,
                    'flag_active' => 1,
                    'activation_date' => date('Y-m-d H:i:s')
                ];

            $update = $this->memberModel->update(session()->get('id'),$data);

            $nextCourseId = $course_lesson_id;

        }else{
            $dataLessonNext = $this->masterCourseLesson->where('course_id',$course_id)->where('id >', $course_lesson_id)->first();

            $nextCourseId = $dataLessonNext['id'];
        }

        if($sisa == 0){
            $jsonResp = json_encode(array('respCode'=>0,'respMessage'=>"Materi ".$lblJenis." telah selesai",'nextLessonId' => $nextCourseId,'lblPendidikan'=>$lblPendikan,'kategori' => $dataCourse['kategori']));
            session()->set('nomor_anggota', $nomor_anggota);
        }else{
            $jsonResp = json_encode(array('respCode'=>1,'respMessage'=>"Materi ".$lblJenis." belum selesai",'nextLessonId' => $nextCourseId,'lblPendidikan'=>"",'kategori' => $dataCourse['kategori']));
        }

        echo $jsonResp;

        

    }


    // public function generateNomorAnggota($cityId)
    // {
    //     $db = \Config\Database::connect();

    //     // Ambil kode kota dari ms_city
    //     $city = $db->table('ms_city')
    //                ->select('kode')
    //                ->where('id', $cityId)
    //                ->get()
    //                ->getRow();

    //     if (!$city) {
    //         return null; // Kota tidak ditemukan
    //     }

    //     $kodeKota = $city->kode;

    //     // Hitung jumlah member yang sudah ada di kota ini
    //     $totalMemberCity = $db->table('tb_member')
    //                           ->where('domisili', $cityId)
    //                           ->countAllResults();

    //     // Nomor urut baru: total + 1
    //     $nomorUrut = $totalMemberCity + 1;

    //     // Format nomor: SND/00001-D
    //     $nomorFormatted = str_pad($nomorUrut, 5, '0', STR_PAD_LEFT);
    //     $nomorAnggota = 'SND/' . $nomorFormatted . '-' . $kodeKota;

    //     return $nomorAnggota;
    // }

    public function generateNomorAnggota($cityId)
    {
        $db = \Config\Database::connect();

        // Ambil kode kota dari ms_city
        $city = $db->table('ms_city')
                   ->select('kode')
                   ->where('id', $cityId)
                   ->get()
                   ->getRow();

        if (!$city) {
            return null; // Kota tidak ditemukan
        }

        $kodeKota = $city->kode;

        // Ambil nomor terakhir berdasarkan domisili
        $lastMember = $db->table('tb_member')
            ->select('nomor_anggota')
            ->where('domisili', $cityId)
            ->orderBy('id', 'DESC') // urutkan dari terbaru
            ->get()
            ->getRow();

        if ($lastMember) {
            // Ambil angka urut dari format SND/00001-XX
            preg_match('/SND\/(\d+)-/', $lastMember->nomor_anggota, $matches);
            if (!empty($matches[1])) {
                $lastNumber = (int) $matches[1];
                $nomorUrut = $lastNumber + 1;
            } else {
                $nomorUrut = 1;
            }
        } else {
            $nomorUrut = 1;
        }

        // Format nomor: SND/00001-KODEKOTA
        $nomorFormatted = str_pad($nomorUrut, 5, '0', STR_PAD_LEFT);
        $nomorAnggota = 'SND/' . $nomorFormatted . '-' . $kodeKota;

        return $nomorAnggota;
    }


public function generateNomorAnggotaLLLL($cityId) //lock tabke
{
    $db = \Config\Database::connect();
    $db->transStart(); // mulai transaksi

    // Ambil kode kota dari ms_city
    $city = $db->table('ms_city')
               ->select('kode')
               ->where('id', $cityId)
               ->get()
               ->getRow();

    if (!$city) {
        $db->transComplete();
        return null; // Kota tidak ditemukan
    }

    $kodeKota = $city->kode;

    // Ambil nomor terakhir berdasarkan domisili + kunci row terakhir
    $lastMember = $db->query("
        SELECT nomor_anggota
        FROM tb_member
        WHERE domisili = ?
        ORDER BY id DESC
        LIMIT 1
        FOR UPDATE
    ", [$cityId])->getRow();

    if ($lastMember && preg_match('/SND\/(\d+)-/', $lastMember->nomor_anggota, $matches)) {
        $lastNumber = intval($matches[1]);
        $nomorUrut  = $lastNumber + 1;
    } else {
        $nomorUrut = 1;
    }

    // Format nomor: SND/00001-KODEKOTA
    $nomorFormatted = str_pad($nomorUrut, 5, '0', STR_PAD_LEFT);
    $nomorAnggota   = 'SND/' . $nomorFormatted . '-' . $kodeKota;

    $db->transComplete(); // selesai transaksi

    return $nomorAnggota;
}
    public function linimasa(){

        $data = [
            'title' => 'Payment',
            'user_logged_in' => $this->userModel->find($this->session->get('id')),
            'memberActive' => $this->memberModel->countMemberByFlag(1),
            'memberAll' => $this->memberModel->countMemberAll(),
            'getData' => $this->memberModel->where('flag', '1')->findAll(),
        ];

        return view('linimasa/bg_index', $data);        
    }



    //--------------------------------------------------------------------

}
