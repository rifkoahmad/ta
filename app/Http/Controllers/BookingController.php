<?php

namespace App\Http\Controllers;

use App\Models\Sesi;
use App\Models\Booking;
use App\Models\Ruangan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        return view('backend.Booking.index', [
            'booking' => Booking::with('ruangan', 'sesi', 'mahasiswa')->get(),
            'ruangan' => Ruangan::get(),
            'sesi' => Sesi::get(),
            'mahasiswa' => Mahasiswa::get()
        ]);
    }

    public function create()
    {
        return view('backend.Booking.create', [
            'ruangan' => Ruangan::get(),
            'sesi' => Sesi::get(),
            'mahasiswa' => Mahasiswa::get()
        ]);
    }
}
