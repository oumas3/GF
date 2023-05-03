<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use Validator;

class VehicleController extends Controller
{
    
    public function index(){

        $vehicle = Vehicle::all();
       
        return response()->json([
            'success'=>true,
            'message'=>'All Vehicles',
            'data'=>$vehicle
            ]);   
    }
    public function store(Request $request){

        $input = $request->all();
        $validator = Validator::make($input,[
            'ID_VEHICLE'=>'required',
            'VEHICLE_MODEL'=>'required',
            'VEHICLE_BRAND'=>'required',
            'VEHICLE_MANUFACTURING_YEAR'=>'required | date',
            'VEHICLE_REGISTRATION'=>'required',
            'VEHICLE_MILEAGE'=>'required',
            'CHASSIS_NUMBER'=>'required'
        ]);
        if($validator->fails()){
            return response()->json([
                'fail'=>false,
                'message'=>'Sorry,not stored !',
                'err'=>$validator->errors()
                ]);  

        }
        $vehicle = Vehicle::create($input);
        return response()->json([
            'success'=>true,
            'message'=>'Vehicle created successfully',
            'data'=>$vehicle
            ]);   
    }
    
    public function show($id){

        $vehicle= Vehicle::find($id);

        if(is_null($vehicle)){
            return response()->json([
                'fail'=>false,
                'message'=>'Sorry,not found!'
                ]);  

        }
        return response()->json([
            'success'=>true,
            'message'=>'Vehicle fetched successfully',
            'data'=>$vehicle
            ]);   
    }
    public function update(Request $request,Vehicle $vehicle){

        $input = $request->all();
        $validator=Validator::make($input,[
            'ID_VEHICLE'=>'required',
            'VEHICLE_MODEL'=>'required',
            'VEHICLE_BRAND'=>'required',
            'VEHICLE_MANUFACTURING_YEAR'=>'required | date',
            'VEHICLE_REGISTRATION'=>'required',
            'VEHICLE_MILEAGE'=>'required',
            'CHASSIS_NUMBER'=>'required'
           
        ]);
        if($validator->fails()){
            return response()->json([
                'fail'=>false,
                'message'=>'Sorry,not stored',
                'err'=>$validator->errors()
                ]);  

        }
        $vehicle->ID_VEHICLE= $input['ID_VEHICLE'];
        $vehicle->VEHICLE_MAKE= $input['VEHICLE_MODEL'];
        $vehicle->VEHICLE_BRAND= $input['VEHICLE_BRAND'];
        $vehicle->VEHICLE_MANUFACTURING_YEAR= $input['VEHICLE_MANUFACTURING_YEAR'];
        $vehicle->VEHICLE_REGISTRATION= $input['VEHICLE_REGISTRATION'];
        $vehicle->VEHICLE_MILEAGE= $input['VEHICLE_MILEAGE'];
        $vehicle->CHASSIS_NUMBER= $input['CHASSIS_NUMBER'];
        
        $vehicle->save();
        return response()->json([
            'success'=>true,
            'message'=>'Vehicle has been updated successfully',
            'data'=>$vehicle
            ]);   
    }
    public function destroy(){

    $vehicle->delete();
        
        return response()->json([
            'success'=>true,
            'message'=>'Vehicle deleted successfully',
            'data'=>$vehicle
            ]); 

    }
}

