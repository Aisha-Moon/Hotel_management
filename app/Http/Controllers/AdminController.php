<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
