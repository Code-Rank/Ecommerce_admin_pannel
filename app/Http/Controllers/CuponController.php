<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CuponModel;
use Illuminate\support\facades\DB;

class CuponController extends Controller
{
    function show_table(){
       
        //CuponModel::get();
        return view('admin/cupon_table')->with('data',CuponModel::get());
       }
       function show_form(){
        return view('admin/cupon_form');
    }
    function insert_cupon(Request $request){
       
        $request->validate([
        'name'=>'required',
        'code'=>'required|unique:cupons',
        'value'=>'required'
    
        ]);
        
        CuponModel::insert(array(
        'name' =>$request->post('name'),
        'code' =>$request->post('code'),
        'value' =>$request->post('value')
        ));
    
        return redirect('admin/cupon_table');
    
    
        
    }
    
    function delete_cupon($code){
        CuponModel::where('code',$code)->delete();
     return redirect('admin/cupon_table');
    
    }
       function update_form($code){
        
        return view('admin/update_cupon_form')->with('data',CuponModel::where('code',$code)->first());
       
       }
       function insert_update_cupon($code ,request $request){
      $store=CuponModel::where('code',$code)->first();
      

           $request->validate([
            'name'=>'required',
            'code'=>'required|unique:cupons,code,'.$store->id,
            'value'=>'required'
        
            ]);
            
            CuponModel::where('code',$code)->update(array(
            'name' =>$request->post('name'),
            'code' =>$request->post('code'),
            'value' =>$request->post('value')
            ));
        
            return redirect('admin/cupon_table');
      
       
       }
    

       function update_status($status,$id ,request $request){
      
              CuponModel::where('id',$id)->update(array(
              
              'status' =>$status,
              ));
              $request->session()->flash('message','Stutus updated  successfully ');
              return redirect('admin/cupon_table');
        
         
         }
}
