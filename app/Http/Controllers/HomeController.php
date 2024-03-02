<?php

namespace App\Http\Controllers;
use App\Models\Room;
use App\Models\Booking;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function room_details($id){
        $data['header_title']='Room Details';
        $data['room']=Room::find($id);
        return view('home.room_details',$data);
    }

    public function room_booking(Request $request,$id){

        $request->validate([
            'startDate'=>'required|date',
            'endDate'=>'date|after:startDate',
        ]);

        $book=new Booking;
        $book->room_id=$id;
        $book->name=trim($request->name);
        $book->email=trim($request->email);
        $book->phone=trim($request->phone);
        $book->start_date=$request->startDate;
        $book->end_date=$request->endDate;
        $book->save();

        return redirect()->back()->with('success','Room Has Been Booked Successfully');


    }
}
