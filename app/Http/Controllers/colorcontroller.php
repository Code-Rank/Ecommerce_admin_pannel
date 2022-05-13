<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\DB;
use App\Models\colormodel;
class colorcontroller extends Controller
{
    function show_table(){
       
       
        return view('admin/color_table')->with('data',colormodel::get());
       }
       function show_form(){
        return view('admin/color_form');
    }
    function insert_color(Request $request){
       
        $request->validate([
        'color'=>'required',
     
        ]);
        
        colormodel::insert(array(
        'color' =>$request->post('color'),
        'status' =>1,
    
        ));
    
        return redirect('admin/color_table');
    
    
        
    }
    
    function delete_color($id){
        colormodel::where('id',$id)->delete();
     return redirect('admin/color_table');
    
    }
    function update_form($id){
        
        return view('admin/update_color_form')->with('data',colormodel::where('id',$id)->first());
       
       }
       function insert_update_color($id ,request $request){
        $data=colormodel::where('id',$id)->first();
        $request->validate([
            'color'=>'required',

            ]);
            
            colormodel::where('id',$id)->update(array(
            'color' =>$request->post('color'),
            'status' =>$data->status,
           
            ));
        
            return redirect('admin/color_table');
      
       
       }
       
       
       function update_status($status,$id ,request $request){
       
            
        colormodel::where('id',$id)->update(array(
          
            'status' =>$status
            ));
        
            $request->session()->flash('message','Stutus updated  successfully ');
            return redirect('admin/color_table');
      
       
       }
}
