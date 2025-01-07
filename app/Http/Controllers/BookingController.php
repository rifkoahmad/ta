<?php

namespace App\Http\Controllers;

use App\Models\Sesi;
use App\Models\Booking;
use App\Models\Ruangan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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

    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'ruangan_id' => 'required|exists:ruangan,id_ruangan',
            'sesi_id' => 'required|exists:sesi,id_sesi',
            'mahasiswa_id' => 'required|exists:mahasiswa,id_mahasiswa',
            'tgl_booking' => 'required',
            'tipe' => 'required|string',
        ]);
        $validator->after(function ($validator) use ($request) {
            $exists = Booking::where('ruangan_id', $request->ruangan_id)
                ->where('tgl_booking', $request->tgl_booking)
                ->where('sesi_id', $request->sesi_id)
                ->where('tgl_booking', $request->tgl_booking)
                ->exists();
            if ($exists) {
                $validator->errors()->add('ruangan_id', 'Kombinasi ruangan dan sesi sudah ada');
            }
        });
        if ($validator->fails()) {
            return back()->with('error', $validator->errors()->first());
        }

        DB::beginTransaction();
        try {
            Booking::create([
                'ruangan_id' => $request->ruangan_id,
                'sesi_id' => $request->sesi_id,
                'mahasiswa_id' => $request->mahasiswa_id,
                'tgl_booking' => $request->tgl_booking,
                'tipe' => $request->tipe
            ]);
            DB::commit();

            return to_route('booking.index')->with('success', 'Jadwal created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return to_route('booking.index')->with('error', 'Jadwal created failed');
        }
    }

    public function edit(string $id)
    {
        $booking = Booking::where('id_booking', $id)->first();
        // dd($booking->toArray());
        return view('backend.Booking.edit', [
            'booking' => $booking,
            'ruangan' => Ruangan::get(),
            'sesi' => Sesi::get(),
            'mahasiswa' => Mahasiswa::get()
        ]);
    }

    public function update(Request $request, string $id)
    {
        // dd($request->all(), $id);
        $validator = Validator::make($request->all(), [
            'ruangan_id' => 'required|exists:ruangan,id_ruangan',
            'sesi_id' => 'required|exists:sesi,id_sesi',
            'tgl_booking' => 'required',
            'status_booking' => 'required|string'
        ]);
        if ($request->status_booking == '1') {
            $validator->after(function ($validator) use ($request) {
                $exists = Booking::where('ruangan_id', $request->ruangan_id)
                    ->where('tgl_booking', $request->tgl_booking)
                    ->where('sesi_id', $request->sesi_id)
                    ->where('tgl_booking', $request->tgl_booking)
                    ->where('status_booking', '1')
                    ->exists();
                if ($exists) {
                    $validator->errors()->add('ruangan_id', 'Kombinasi ruangan dan sesi sudah ada');
                }
            });
        }

        if ($validator->fails()) {
            return back()->with('error', $validator->errors()->first());
        }
        DB::beginTransaction();
        try {
            $data = [
                'ruangan_id' => $request->ruangan_id,
                'sesi_id' => $request->sesi_id,
                'tgl_booking' => $request->tgl_booking,
                'status_booking' => $request->status_booking
            ];

            $rTersedia = Booking::find($id);
            $rTersedia->update($data);
            DB::commit();
            return to_route('booking.index')->with('success', 'Jadwal updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return to_route('booking.index')->with('error', 'Jadwal updated failed');
        }
    }
}
