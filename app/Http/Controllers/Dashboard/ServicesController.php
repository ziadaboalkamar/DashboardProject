<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ServicesController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $cities = User::all();

            return DataTables::of($cities)
                ->addIndexColumn()
                ->editColumn('created_at', function (User $cities) {
                    return $cities->created_at->format('Y-m-d');
                })
                ->rawColumns(['record_select', 'actions'])
                ->make(true);
        }

        return view('front.services.index',[
            'cities' => User::get(),
        ]);
    }
}
