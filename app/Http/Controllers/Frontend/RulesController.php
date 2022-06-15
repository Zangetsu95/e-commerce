<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RulesController extends Controller
{
    public function AboutUs()
    {

        return view('frontend.rules.about');
    }
    public function DeliveryInformation()
    {
        return view('frontend.rules.shipping');

    }

    public function PrivacyPolicy()
    {
        return view('frontend.rules.privacy');

    }

    public function TermsConditions()
    {
        return view('frontend.rules.conditions');
    }

    public function SupportCenter()
    {
        return view('frontend.rules.support');
    }
    public function ShippingDetails()
    {
        return view('frontend.rules.shipping');
    }

}
