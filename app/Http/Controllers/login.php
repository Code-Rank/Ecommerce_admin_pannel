<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\DB;
use App\Models\admin;
class login extends Controller
{
    function show(){
        return view('admin/layout/layout');
    }
    function login(){
        return view('admin/login');
    }

    function signin(request $data){
        $store=admin::where('email',$data->post('email'))->where('password',$data->post('password'))->get();
        if(isset($store[0]->email)){
            $data->session()->put('admin_mail',$store[0]->email);
            $data->session()->put('admin_name',$store[0]->name);
            $data->session()->put('admin_image',$store[0]->image);
            return redirect('admin/layout/layout');
        }
        else{
            $data->session()->flash('error','Please enter valid information');
            return redirect("admin/login");
        }

    }
    function addadmin(){
        return view('admin/signup');
    }
    function guestadmin(){
        echo "heloo";
    }
    function logout(){
          session()->flush();
          return redirect('admin/login');
    }




    function signup(request $data){
        
        $data->validate([
        'name'=>'required',
        'email'=>'required|email|unique:admin',
        'password'=>'required|min:5|max:10',
        'image'=>'required|image|mimes:jpg,png,jpeg'

        ]);

        $image=$data->file('image');
        $ext=$image->extension();
        $file=time().'.'.$ext;
        $image->storeAs('public/data',$file);
        admin::insert(array(

        'name'=>$data->post('name'),
        'email'=>$data->post('email'),
        'password'=>$data->post('password'),
        'image'=>$file,

        ));


    
      
    }
}
