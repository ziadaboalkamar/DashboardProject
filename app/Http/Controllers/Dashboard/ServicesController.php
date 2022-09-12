<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class ServicesController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $service = Services::all();

            return DataTables::of($service)
                ->addIndexColumn()
                ->editColumn('created_at', function (Services $service) {
                    $date = "";
                    if($service->created_at != null ){
                     $date =  $service->created_at->format('Y-m-d');
                }else{
                     $date= "لا يوجد";
                }
                return $date;
                })
                ->rawColumns(['record_select', 'actions'])
                ->make(true);
        }

        return view('front.services.index',[
            'services' => Services::get(),
        ]);
    }
    public function store(Request $request){

        Services::create([
            "name"=>$request->name,
            "name_en" =>$request->name_en ,
            "description" =>$request->description,
            "description_en" =>$request->description_en
        ]);
        return response()->json([
            "message" => "success",
            "status" => 200
        ]);
    }
}
