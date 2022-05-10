<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use DateTime;
use Illuminate\Http\Request;
use App\Models\Order;

class ReportController extends Controller
{
    /**
     * It returns the view of the report.
     * @returns A view called report_view.
     */
    public function ReportView()
    {
        return view('backend.report.report_view');
    }

    /**
     * The above function is used to show the report of the order by date.
     * @param {Request} request - The request object.
     */
    public function ReportDate(Request $request)
    {
        // return $request->all();
        // return $formatDate;

        $date = new DateTime($request->date);
        $formatDate = $date->format('d F Y');

        $orders = Order::where('order_date', $formatDate)->latest()->get();

        return view('backend.report.report_show', compact('orders'));
    }

    /**
     * It will show the report of the month.
     * @param {Request} request - The request object.
     */
    public function ReportMonth(Request $request)
    {
        $orders = Order::where('order_month', $request->month)->where('order_year', $request->year_name)->latest()->get();
        return view('backend.report.report_show', compact('orders'));
    }


    /**
     * It takes a year as input and returns all the orders that were made in that year
     * @param {Request} request - The request object.
     */
    public function ReportYear(Request $request)
    {

        $orders = Order::where('order_year', $request->year)->latest()->get();
        return view('backend.report.report_show', compact('orders'));
    }
}
