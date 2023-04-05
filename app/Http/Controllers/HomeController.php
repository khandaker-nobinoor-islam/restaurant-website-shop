<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Item;
use App\Models\Reservation;
use App\Models\Slider;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Slider::all();
        $categories = category::all();
        $items = Item::all();
        return view('welcome', compact('sliders', 'categories', 'items'));
    }

    public function reserve(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'date_time' => 'required',
            'person' => 'required',
            'message' => 'required',
        ]);

        $reservation = new Reservation();
        $reservation->name = $request->name;
        $reservation->email =$request->email;
        $reservation->phone =$request->phone;
        $reservation->date_time =$request->date_time;
        $reservation->person =$request->person;
        $reservation->message =$request->message;
        $reservation->status = false;
        $reservation->save();

        Toastr::success('Reservation Request Successfully', 'success', ["positionClass" => "toast-top-right"]);

        return redirect('/');
    }
}
