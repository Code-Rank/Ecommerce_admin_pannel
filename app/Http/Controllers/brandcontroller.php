<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\DB;
use App\Models\brandmodel;
class brandcontroller extends Controller
{
    function show_table(){
       
       
        return view('admin/brand_table')->with('data',brandmodel::get());
       }
       function show_form(){
        return view('admin/brand_form');
    }
    function insert_brand(Request $request){
       
        $request->validate([
        'name'=>'required|unique:brand',
     
        ]);
        
        brandmodel::insert(array(
        'name' =>$request->post('name'),
        'status' =>1,
    
        ));
    
        return redirect('admin/brand_table');
    
    
        
    }
    
    function delete_brand($id){
        brandmodel::where('id',$id)->delete();
     return redirect('admin/brand_table');
    
    }
    function update_form($id){
        
        return view('admin/update_brand_form')->with('data',brandmodel::where('id',$id)->first());
       
       }
       function insert_update_brand($id ,request $request){
        $data=brandmodel::where('id',$id)->first();
        $request->validate([
            'name'=>'required|unique:brand,name,'.$data->id,

            ]);
            
            brandmodel::where('id',$id)->update(array(
            'name' =>$request->post('name'),
            'status' =>$data->status,
           
            ));
        
            return redirect('admin/brand_table');
      
       
       }
       
       
       function update_status($status,$id ,request $request){
       
            
        brandmodel::where('id',$id)->update(array(
          
            'status' =>$status
            ));
        
            $request->session()->flash('message','Stutus updated  successfully ');
            return redirect('admin/brand_table');
      
       
       }
}
