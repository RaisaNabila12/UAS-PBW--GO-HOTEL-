<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    
    public function index()
    {
        $rooms = Room::where('status', 'tersedia')->get();
        return view('dashboard', compact('rooms'));
    }

    
    public function store(Request $request, Room $room)
    {
        $request->validate([
            'tanggal_check_in'  => 'required|date|after_or_equal:today',
            'tanggal_check_out' => 'required|date|after:tanggal_check_in',
        ], [
            'tanggal_check_in.after_or_equal' => 'Waduh! Tanggal check-in tidak boleh menggunakan tanggal masa lalu.',
            'tanggal_check_out.after'         => 'Eror! Tanggal check-out harus setelah tanggal check-in dong.',
        ]);

        Booking::create([
            'user_id'           => Auth::id(),
            'room_id'           => $room->id,
            'tanggal_check_in'  => $request->tanggal_check_in,
            'tanggal_check_out' => $request->tanggal_check_out,
            'status'            => 'booked',
        ]);

        $room->update(['status' => 'penuh']);

        return redirect()->route('dashboard')->with('success', 'Kamar ' . $room->nama_kamar . ' berhasil dipesan untuk tanggal ' . date('d M Y', strtotime($request->tanggal_check_in)) . ' s/d ' . date('d M Y', strtotime($request->tanggal_check_out)) . '!');
    }

    public function history()
    {
        $bookings = Booking::where('user_id', Auth::id())
            ->with('room')
            ->latest()
            ->get();

        return view('bookings.history', compact('bookings'));
    }

    public function cancel($id)
    {
        $booking = Booking::findOrFail($id);
        
        Room::where('id', $booking->room_id)->update(['status' => 'tersedia']);
        
        $booking->delete();

        return redirect()->route('booking.history')->with('success', 'Pesanan kamar berhasil dibatalkan dan kamar telah tersedia kembali!');
    }
}