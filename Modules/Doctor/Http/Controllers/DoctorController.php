<?php

namespace Modules\Doctor\Http\Controllers;

use App\DoctorSpecialties;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Doctor\Entities\Doctor;
use Modules\Specialties\Entities\Specialties;
use Yajra\DataTables\Facades\DataTables;

class DoctorController extends Controller
{

    public function wizard(Doctor $id)
    {
        $specialties = Specialties::all();
        return view('doctor::index', compact('id', 'specialties'));
    }

    public function store(Request $request, Doctor $doctor)
    {
        $specialties_id = $request['specialties_id'];
        $doctor = Doctor::create($request->only('lname', 'fname', 'codemeli', 'tel', 'number'));
        $doctor->specialties()->attach($specialties_id);


    }

    public function show(Request $request)
    {
        if ($request->ajax()) {
            $data = Doctor::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('admin.module.doctor.wizard', $row->id) . '" class="edit btn btn-primary btn-sm">ویرایش</a>';
                    $btn .= '<a href="' . route('admin.module.doctor.delete', $row->id) . '" class="edit btn btn-danger btn-sm">حذف</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('doctor::show');
    }

    public function delete(Doctor $id)
    {
        $id->delete();
        return back();

    }


}
