<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;

class reportController extends Controller
{
    public function today_report ()
    {
        $today_date = date('d F Y');
       $orders = order::where('order_date',$today_date)->get();

       return view ('admin.reports.today_report',compact('orders'));

    }

    public function monthly_report ()

    {
        $month_date = date('F');

        $orders = order::where('order_month',$month_date)->get();

        return view ('admin.reports.month_report',compact('orders'));
    }

    public function search_report ()
    {
        return view ('admin.reports.search');
    }

    public function search_month (Request $request)
    {
        $month = $request->month;
        $data = order::where('order_month',$month)->get();

        return view('admin.reports.search')->withDetails($data);
    }

    public function search_year(Request $request)
    {
        $year = $request->year;
        $data = order::where('order_year',$year)->get();

        return view('admin.reports.search')->withDetails($data);

    }

    public function search_date (Request $request)

    {
        $date = $request->date;
        $new_date = date('d F Y',strtotime($date));
        $data = order::where('order_date',$new_date)->get();
       

        return view('admin.reports.search')->withDetails($data);


    }
}
