<?php

namespace App\Http\Controllers\Dashboard\Api;

use App\Models\Services;
use App\Models\SubService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubServiceController extends Controller
{
    public function index(Request $request)
    {
        $sub_service = SubService::with("services")->get();
        $data = [
            "sub_service" =>$sub_service
        ];
        return $this->sendResponse($sub_service,"success fetch data");

    }

    public function services(Request $request)
    {
        $services = Services::get();
        $data = [
            "services" =>$services
        ];
        return $this->sendResponse($services,"success fetch data");

    }

    public function store(Request $request){
             
        $validator = \Validator::make($request->all(), [
            "name"=>'required',
            "name_en" =>'required' ,
            "description" =>'required',
            "description_en" =>'required',
            "service_id" =>'required',

        ]);

        if ($validator->fails())
        {
            // return response()->json(['errors'=>$validator->errors()->all()]);
            return $this->sendError('Validation Error.', $validator->errors());       

        }
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
}
