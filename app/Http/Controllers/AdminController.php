<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Contact;
use App\Models\Room;
use App\Models\Booking;
use App\Notifications\MyFirstNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function index(){

        if(Auth::id()){
            $userType=Auth()->user()->userType;

            if($userType=='admin'){
                return view('admin.index');

            }
            else if($userType=='user'){
                $data['room']=Room::all();
                $data['gallery']=Gallery::all();

                $data['header_title']='Hotel Management';
                return view('home.index',$data);

            }else{
                return redirect()->back();
            }
        }
    }
    public function home(){
        $data['header_title']="Hotel Management";
        $data['room']=Room::all();
        $data['gallery']=Gallery::all();
        return view('home.index',$data);
    }
    public function create_room(){
        $data['header_title']="Add Room";
        return view('admin.create_room',$data);
    }
    public function add_room(Request $request){

        $room=new Room();
        $room->room_title=trim($request->room_title);
        $room->description=trim($request->description);
        $room->price=trim($request->price);
        $room->wifi=trim($request->wifi);
        $room->room_type=trim($request->room_type);
        $image=$request->image;
        if(!empty($image)){
            if(!empty($room->image && file_exists('room/images/'.$room->image))){
                unlink('room/images/'.$room->image);
            }
            $file=$request->image;
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('room/images',$filename);
             $room->image=$filename;

        }
        $room->save();

        return redirect()->back()->with('success','Room Created Successfully');
    }
    public function view_room(){
        $data['header_title']='View Room';
        $data['room']=Room::all();
        return view('admin.view_room',$data);
    }
    public function delete_room($id){
        $room=Room::find($id);
        $room->delete();
        return redirect()->back()->with('error','Room Deleted Successfully');

    }
    public function edit_room($id){
        $data['header_title']='Edit Room';
        $data['getRecord']=Room::find($id);
        return view('admin.edit_room',$data);
    }
    public function update_room($id,Request $request){

        $room=Room::find($id);
        $room->room_title=trim($request->room_title);
        $room->description=trim($request->description);
        $room->price=trim($request->price);
        $room->wifi=trim($request->wifi);
        $room->room_type=trim($request->room_type);
        $image=$request->image;
        if(!empty($image)){
            if(!empty($room->image && file_exists('room/images/'.$room->image))){
                unlink('room/images/'.$room->image);
            }
            $file=$request->image;
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('room/images',$filename);
             $room->image=$filename;

        }
        $room->save();

        return redirect('view_room')->with('success','Room Updated Successfully');
    }
    public function bookings(){

        $data['header_title']='Bookings';
        $data['booking']=Booking::getBookings();
        return view('admin.booking',$data);
    }

    public function bookings_delete($id){
        $data=Booking::find($id);
        $data->delete();

        return redirect('bookings')->with('error','Data deleted successfully');
    }

    public function approve_booking($id){
        $data=Booking::find($id);
        $data->status='Approved';
        $data->save();

        return redirect()->back();
    }
    public function reject_booking($id){
        $data=Booking::find($id);
        $data->status='Rejected';
        $data->save();

        return redirect()->back();
    }

    public function view_gallery(){

$data['header_title']='View Gallery';
        $data['gallery']=Gallery::all();
        return view('admin.gallery',$data);
    }

    public function upload_gallery(Request $request)
    {
        // Use file() method to get uploaded file
        $image = $request->file('image');

        if ($image) {
            $data = new Gallery;
            $imgName = time().'.'.$image->getClientOriginalExtension();
            $image->move('gallery', $imgName);
            $data->image = $imgName;
            $data->save();
            return redirect()->back()->with('success', 'Image uploaded successfully');
        } else {
            return redirect()->back()->with('error', 'No image uploaded');
        }
    }

    public function delete_gallery($id){
        $data=Gallery::find($id);
        $data->delete();
        return redirect()->back()->with('error', 'Image Deleted successfully');
    }

    public function message(){

        $data['header_title']='All Messages';
        $data['messages']=Contact::all();
        return view('admin.message',$data);
    }

    public function send_mail($id){

        $data['header_title']='Send Mail';
        $data['message']=Contact::find($id);
        return view('admin.send_mail',$data);
    }

    public function mail(Request $request,$id){
        $data=Contact::find($id);
        $details=[
            'greeting'=>$request->greeting,
            'mail_body'=>$request->mail_body,
            'action_text'=>$request->action_text,
            'action_url'=>$request->action_url,
            'end_line'=>$request->end_line,


        ];

        Notification::send($data,new MyFirstNotification($details));

        return redirect('message')->with('success','Mail has been sent successfully');


    }


}
