<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\DB;
use App\Models\category;
class Controllercategory extends Controller
{
   function show_table(){
       
    category::get();
    return view('admin/category_table')->with('data',category::get());
   }
   function show_form(){
    return view('admin/category_form');
}
function insert_category(Request $request){
   
    $request->validate([
    'name'=>'required',
    'slug'=>'required|unique:categories',
    'description'=>'required'

    ]);
    
    category::insert(array(
    'name' =>$request->post('name'),
    'description' =>$request->post('description'),
    'slug' =>$request->post('slug')
    ));

    return redirect('admin/category_table');


    
}

function delete_category($slug){
 category::where('slug',$slug)->delete();
 return redirect('admin/category_table');

}
function update_form($slug){
    
    return view('admin/update_category_form')->with('data',category::where('slug',$slug)->first());
   
   }
   function insert_update_category($slug ,request $request){
    $data=category::where('slug',$slug)->first();
    $request->validate([
        'name'=>'required',
        'slug'=>'required|unique:categories,slug,'.$data->id,
        'description'=>'required'
    
        ]);
        
        category::where('slug',$slug)->update(array(
        'name' =>$request->post('name'),
        'description' =>$request->post('description'),
        'slug' =>$request->post('slug')
        ));
    
        return redirect('admin/category_table');
  
   
   }
   
   
   function update_status($status,$id ,request $request){
   
        
        category::where('id',$id)->update(array(
      
        'status' =>$status
        ));
        $request->session()->flash('message','Stutus updated  successfully ');
        return redirect('admin/category_table');
  
   
   }
}
