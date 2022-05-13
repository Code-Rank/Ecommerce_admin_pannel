<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\DB;
use App\Models\sizemodel;
class sizecontroller extends Controller
{
    function show_table(){
       
        //CuponModel::get();
        return view('admin/size_table')->with('data',sizemodel::get());
       }
       function show_form(){
        return view('admin/size_form');
    }
    function insert_size(Request $request){
       
        $request->validate([
        'size'=>'required',
        
    
        ]);
        
        sizemodel::insert(array(
        'size' =>$request->post('size'),
        'status' =>1,
      
        ));
    
        return redirect('admin/size_table');
    
    
        
    }
    
    function delete_size($id){
        sizemodel::where('id',$id)->delete();
     return redirect('admin/size_table');
    
    }
       function update_form($id){
        
        return view('admin/update_size_form')->with('data',sizemodel::where('id',$id)->first());
       
       }
       function insert_update_size($id ,request $request){
      $store=sizemodel::where('id',$id)->first();
      

           $request->validate([
            'size'=>'required',
            
        
            ]);
            
            sizemodel::where('code',$code)->update(array(
            'name' =>$request->post('name'),
            'status'=>$store->status,
            
            ));
        
            return redirect('admin/status_table');
      
       
       }
    

       function update_status($status,$id ,request $request){
      
        sizemodel::where('id',$id)->update(array(
              
              'status' =>$status,
              ));
          
              return redirect('admin/status_table');
        
         
         }
}
