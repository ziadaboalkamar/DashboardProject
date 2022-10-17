<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Services;
use App\Models\SubService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\App;

class SubServiceController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $sub_services = SubService::all();

            return DataTables::of($sub_services)
                ->addIndexColumn()
                ->editColumn('service_id', function (SubService $service) {
                    $date = "";
                    if($service->services != null ){
                     $date =  $service->services->name;
                }else{
                     $date= "هذه الخدمة غير موجودة";
                }
                return $date;
                })
                ->editColumn('name', function (SubService $service) {
                    $date = "";
                    if(App::getLocale() ==  "ar"){
                     $date =  $service->name;
                }elseif(App::getLocale() ==  "en"){
                    $date =  $service->name_en;
                }
                return $date;
                })
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
            'services' => Services::get(),
        ]);
    }

    public function store(Request $request){
        $img_path = null;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $img = $request->file('image');
            $img_path = $img->store('/subservice','images');
        }
    
        SubService::create([
            "name"=>$request->name,
            "name_en" =>$request->name_en ,
            "description" =>$request->description,
            "description_en" =>$request->description_en,
            "service_id" => $request->service_id,
            "image" =>"images/".strip_tags($img_path,'<img>')
        ]);
   
        return response()->json([
            "message" => "success",
            "status" => 200
        ]);
    }
    public function edit(Request $request){
        $services = SubService::find($request->id);
        return Response()->json($services);
    }

    public function delete(Request $request){
        $services = SubService::find($request->id);
        if(!$services){
            return response()->json([
                'erorr' => true,
                'message' => 'هذه الخدمة غير موجودة',
            ]);   
        }
        $services->delete();
        return response()->json([
            'success' => true,
            'message' => 'تم الحذف بنجاح',
        ]);    }


}
