<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function finds(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->get('http://localhost:8000/InsuranceInquiry');
        $response = $request->getBody()->getContents();
        echo '<pre>';
        print_r($response);
        exit;
    }
}
