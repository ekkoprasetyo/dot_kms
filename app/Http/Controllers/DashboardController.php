<?php

namespace App\Http\Controllers;

use App\Model\ForumModel;
use App\Model\KbaseModel;
use App\Model\RewardModel;
use App\Model\UsersModel;

class DashboardController extends Controller
{
    private $title;
    private $subtitle;

    public function __construct() {
        $this->title = "Dashboard";
        $this->subtitle = "";
    }

    public function index(){
        $title = $this->title;
        $subtitle = $this->subtitle;

        //Datas
        $count_open_case = count(ForumModel::where('c_forum_status', 1)->where('c_forum_softdelete', 0)->get());
        $count_total_case = count(ForumModel::get());
        $count_total_user = count(UsersModel::where('c_users_softdelete', 0)->get());
        $count_total_kbase = count(KbaseModel::get());
        $completion = 100-(round($count_open_case/$count_total_case*100));
        $top_points = RewardModel::topPoint();

        return view('dashboard.v_index', compact('title','subtitle','count_open_case','count_total_user','completion','top_points','count_total_kbase'));
    }
}