<?php

namespace App\Http\Controllers;
use App\Models\Room;
use App\Models\Contact;
use App\Models\Booking;
use App\Models\Gallery;

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

        $startDate=$request->startDate;
        $endDate=$request->endDate;

        $isBooked=Booking::where('room_id',$id)
            ->where('start_date','<=',$endDate)
            ->where('end_date','>=',$startDate)
            ->exists();

        if($isBooked){
            return redirect()->back()->with('error','Room is Already Booked.Please Try Different Date');

        }
        else{
            $book->start_date=$request->startDate;
            $book->end_date=$request->endDate;
            $book->save();

            return redirect()->back()->with('success','Room Has Been Booked Successfully');

        }

    }

    public function contact(Request $request){

        $data=new Contact;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->message=$request->message;
        $data->save();

        return redirect()->back()->with('success','Message sent Successfully');


    }

    public function our_room(){
        $data['header_title']='Our Room';
        $data['room']=Room::all();
       return view('home.our_room',$data);
    }
    public function hotel_gallery(){
        $data['header_title']='Hotel Gallery';
        $data['gallery']=Gallery::all();
       return view('home.hotel_gallery',$data);
    }
    public function contact_us(){
        $data['header_title']='Contact Us';
        $data['contact']=Contact::all();
       return view('home.contact_us',$data);
    }


}
