<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table='bookings';
    protected $fillable=[
        'room_id',
        'name',
        'email',
        'phone',
        'startDate',
        'endDate'
    ];

    static public function getBookings(){
        return self::select('bookings.*','rooms.room_title as room_name', 'rooms.price as price','rooms.image as image')
            ->join('rooms', 'rooms.id', '=', 'bookings.room_id')
            ->orderBy('bookings.id', 'desc')
            ->get();
    }
    
}
