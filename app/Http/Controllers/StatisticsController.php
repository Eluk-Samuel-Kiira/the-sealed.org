<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class StatisticsController extends Controller
{
    public function user_details()
    {
        $visitor_ip = Visitor::get('ip');
        $data = Location::get($visitor_ip);
        $visitor_details = Visitor::count();
    }
    
}
