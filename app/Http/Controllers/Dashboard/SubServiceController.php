<?php

namespace App\Http\Controllers\Dashoard;

use App\Models\SubService;
use Illuminate\Http\Request;

class SubServiceController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $sub_services = SubService::all();

            return DataTables::of($sub_services)
                ->addIndexColumn()
                ->editColumn('created_at', function (SubService $service) {
                    $date = "";
                    if($service->created_at != null ){
                     $date =  $service->created_at->format('Y-m-d');
                }else{
                     $date= "لا يوجد";
                }
                return $date;
                })
                
                ->make(true);
        }

        return view('front.subService.index',[
            'sub_services' => SubService::get(),
        ]);
    }
}
