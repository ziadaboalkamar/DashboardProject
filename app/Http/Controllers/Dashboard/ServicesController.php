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
     
        $validator = \Validator::make($request->all(), [
            "name"=>'required',
            "name_en" =>'required' ,
            "description" =>'required',
            "description_en" =>'required'

        ],
    [
        "name.required" => "هذا الحقل مطلوب"
    ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        // if($request->id != null){
        //     Services::find($request->id)->update([
        //         "name"=>$request->name,
        //     "name_en" =>$request->name_en ,
        //     "description" =>$request->description,
        //     "description_en" =>$request->description_en
        //     ]);

        // }else{
        //     Services::create( [
        //         "name"=>$request->name,
        //         "name_en" =>$request->name_en ,
        //         "description" =>$request->description,
        //         "description_en" =>$request->description_en
        //     ]);
        // }
        Services::updateOrCreate(  [
            'id' => $request->id
        ],[
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
    public function edit(Request $request){
        $services = Services::find($request->id);
        return Response()->json($services);
    }

    public function delete(Request $request){
        $services = Services::find($request->id);
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
