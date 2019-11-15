<?php

namespace Modules\Specialties\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Bime\Entities\Bime;
use Modules\Specialties\Entities\Specialties;
use Yajra\DataTables\Facades\DataTables;

class SpecialtiesController extends Controller
{

    public function wizard(Specialties $id)
    {
        return view('specialties::index', compact('id'));
    }

    public function store(Request $request)
    {
        $id = $request->exists('id') ? $request->id : null;
        if ($id) {
            Specialties::find($id)->update($request->all());
            return back();
        } else {
            Specialties::create($request->all());
        }


    }

    public function show(Request $request)
    {
        if ($request->ajax()) {
            $data = Specialties::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('admin.module.specialties.wizard', $row->id) . '" class="edit btn btn-primary btn-sm">ویرایش</a>';
                    $btn .= '<a href="' . route('admin.module.specialties.delete', $row->id) . '" class="edit btn btn-danger btn-sm">حذف</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('specialties::show');
    }

    public function delete(Specialties $id)
    {
        $id->delete();
        return back();

    }

}
