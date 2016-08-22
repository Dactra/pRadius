<?php
/**
 * Date: 6/1 0001
 * Time: 15:06
 * @author GROOT (pzyme@outlook.com)
 */
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Request as FacadeRequest;
use App\Models\Plan as PlanModel;
use Cache;

class Home extends Controller {


    public function index() {
        $plan = PlanModel::instance();
        $plans = $plan->getAll();

        return view('frontend.home',[
            'plans' => $plans
        ]);
    }
}