<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\DB;
use App\Models\productmodel;
class productcontroller extends Controller
{
    function show_table()
    {
        return view('admin/product_table')->with('data', productmodel::get());
    }
    function show_form()
    {
        $data = DB::table('categories')->get();
        $size = DB::table('size')->get();
        $color = DB::table('color')->get();
        $brand = DB::table('brand')->get();

        return view('admin/product_form', [
            'data' => $data,
            'size' => $size,
            'color' => $color,
            'Brand' => $brand,
        ]);
    }
    function insert_product(Request $request)
    {

     


        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:products',
            'image' => 'required|mimes:png,jpg,jpeg',
            'short_disc' => 'required',
            'long_disc' => 'required',
            'warranty' => 'required',
            'category_id' => 'required',

            'att_s_no.*' => 'required|unique:product_attribute,serial_no',
            'att_Price.*' => 'required',
            'att_image.*' => 'required|mimes:png,jpg,jpeg',
            'product_image.*' => 'required|mimes:png,jpg,jpeg',
           
            'att_qty.*' => 'required',
        ]);

        






        $image = $request->file('image');
        $ext = $image->extension();
        $file = time() . '.' . $ext;
        $image->storeAs('public/data', $file);

        productmodel::insert([
            'name' => $request->post('name'),
            'slug' => $request->post('slug'),
            'image' => $file,
            'short_disc' => $request->post('short_disc'),
            'long_disc' => $request->post('long_disc'),
            'warranty' => $request->post('warranty'),
            'category_id' => $request->post('category_id'),

            'status' => 1,
        ]);
        
     

        $data = DB::table('products')
            ->where('slug', $request->post('slug'))
            ->first();

        $att_s_no = $request->post('att_s_no');
        $att_Price = $request->post('att_Price');
        $att_image = $request->post('att_image');
        $att_qty = $request->post('att_qty');
        $att_brand_id = $request->post('att_brand_id');
        $att_color_id = $request->post('att_color_id');
        $att_size_id = $request->post('att_size_id');

        foreach ($att_s_no as $key => $value) {
            $attribute['product_id'] = $data->id;
            $attribute['serial_no'] = $att_s_no[$key];
            $attribute['price'] = $att_Price[$key];
            
            $attribute['qunatity'] = $att_qty[$key];
            if ($att_color_id[$key] != "") {
                $attribute['color_id'] = $att_color_id[$key];
            } else {
                $attribute['color_id'] = 0;
            }
            if ($att_brand_id[$key] != "") {
                $attribute['brand_id'] = $att_brand_id[$key];
            } else {
                $attribute['brand_id'] = 0;
            }
            if ($att_size_id[$key] != "") {
                $attribute['size_id'] = $att_size_id[$key];
            } else {
                $attribute['size_id'] = 0;
            }

          

            if ($request->hasFile("att_image.$key")) {
                $rand = rand('111111111', '999999999');
                $att_image = $request->file("att_image.$key");
                $exten = $att_image->extension();
                $att_file = $rand . '.' . $exten;
                $request->file("att_image.$key")->storeAs('public/data', $att_file);
                $attribute['image'] = $att_file;
            } else {
                $attribute['image'] = " ";
            }


            if ($request->hasFile("product_image.$key")) {
                $imageattribute['product_id']=$data->id;
                $rand = rand('111111111', '999999999');
                $att_image = $request->file("product_image.$key");
                $exten = $att_image->extension();
                $att_file = $rand . '.' . $exten;
                $request->file("product_image.$key")->storeAs('public/data', $att_file);
                $imageattribute['product_image'] = $att_file;
                DB::table('product_image')->insert($imageattribute);
            } else {
                $imageattribute['product_image'] = " ";
            }
            DB::table('product_attribute')->insert($attribute);
        }

        return redirect('admin/product_table');
    }

    function delete_product($id)
    {
        productmodel::where('id', $id)->delete();
        return redirect('admin/product_table');
    }
    function delete_product_attribute($aid, $pid)
    {
        DB::table('product_attribute')
            ->where('id', $aid)
            ->where('product_id', $pid)
            ->delete();
        return redirect('admin/update_product/' . $pid);
    }

    function delete_product_image($Iid, $pid)
    {
        DB::table('product_image')
            ->where('id', $Iid)->delete();
        return redirect('admin/update_product/' . $pid);
    }
    function update_form($id)
    {
        $product = productmodel::where('id', $id)->first();
        $category = DB::table('categories')->get();
        $attribute = DB::table('product_attribute')
            ->where('product_id', $id)
            ->get();
        $attributeimg = DB::table('product_image')
        ->where('product_id', $id)
        ->get();
        $data = DB::table('categories')->get();
        $size = DB::table('size')->get();
        $color = DB::table('color')->get();
        $brand = DB::table('brand')->get();

        return view('admin/update_product_form', [
            'product' => $product,
            'category' => $category,
            'attribute' => $attribute,
            'attributeimg' => $attributeimg,
            'data' => $data,
            'size' => $size,
            'color' => $color,
            'Brand' => $brand,
        ]);
    }
    function insert_update_product($id, request $request)
    {
        

        $data = productmodel::where('id', $id)->first();
        $attributee = DB::table('product_attribute')
            ->where('product_id', $id)
            ->get();
        $attid = $request->post('paid');
        $att_s_no = $request->post('att_s_no');
        $att_Price = $request->post('att_Price');
        $att_image = $request->post('att_image');
        $att_qty = $request->post('att_qty');
        $att_brand_id = $request->post('att_brand_id');
        $att_color_id = $request->post('att_color_id');
        $att_size_id = $request->post('att_size_id');

        foreach ($att_s_no as $key => $value) {
            $check = DB::table('product_attribute')
                ->where('serial_no', $att_s_no[$key])
                ->where('id', '!=', $attid[$key])
                ->get();
            if (isset($check[0])) {
                $request->session()->flash('unique_error', 'This serial number  ' . $att_s_no[$key] . '  already exists. the  error accour on this attribute id ' . $attid[$key]);
                return redirect('admin/update_product/' . $id);
            }
        }
        if ($request->hasfile('image')) {
            $validate_image = 'required|mimes:png,jpg,jpeg';
            $request->validate([
                'name' => 'required',
                'slug' => 'required|unique:products,slug,' . $data->id,
                'image' => $validate_image,
                'short_disc' => 'required',
                'long_disc' => 'required',
                'warranty' => 'required',
                'category_id' => 'required',
                // 'att_image.*' => 'mimes:png,jpg,jpeg',
                // 'att_price.*' => 'mimes:png,jpg,jpeg',
                // 'att_image.*' => 'mimes:png,jpg,jpeg',
            ]);
            $image = $request->file('image');
            $ext = $image->extension();
            $file = time() . '.' . $ext;
            $image->storeAs('public/data', $file);

            productmodel::where('id', $id)->update([
                'name' => $request->post('name'),
                'slug' => $request->post('slug'),
                'image' => $file,
                'short_disc' => $request->post('short_disc'),
                'long_disc' => $request->post('long_disc'),
                'warranty' => $request->post('warranty'),
                'category_id' => $request->post('category_id'),
                'status' => 1,
            ]);
        } else {
            $validate_image = '';
            $request->validate([
                'name' => 'required',
                'slug' => 'required|unique:products,slug,' . $data->id,
                'image' => $validate_image,
                'short_disc' => 'required',
                'long_disc' => 'required',
                'warranty' => 'required',
                'category_id' => 'required',
                //'att_image.*' => 'mimes:png,jpg,jpeg',
            ]);
            productmodel::where('id', $id)->update([
                'name' => $request->post('name'),
                'slug' => $request->post('slug'),
                'short_disc' => $request->post('short_disc'),
                'long_disc' => $request->post('long_disc'),
                'warranty' => $request->post('warranty'),
                'category_id' => $request->post('category_id'),
                'status' => 1,
            ]);
        }

        

        


        if ($attid[$key] != '') {
            $Data = DB::table('product_attribute')
                ->where('product_id', $id)
                ->get();
            

            foreach ($Data as $list) {
                $att_img[] = $list->image;
            }
           
            foreach ($att_s_no as $key => $value) {
                $attribute['product_id'] = $data->id;
                $attribute['serial_no'] = $att_s_no[$key];
                $attribute['price'] = $att_Price[$key];
                $attribute['qunatity'] = $att_qty[$key];

                if ($att_color_id[$key] != "") {
                    $attribute['color_id'] = $att_color_id[$key];
                } else {
                    $attribute['color_id'] = 0;
                }
                if ($att_brand_id[$key] != "") {
                    $attribute['brand_id'] = $att_brand_id[$key];
                } else {
                    $attribute['brand_id'] = 0;
                }
                if ($att_size_id[$key] != "") {
                    $attribute['size_id'] = $att_size_id[$key];
                } else {
                    $attribute['size_id'] = 0;
                }
                
                if ($request->hasFile("att_image.$key")) {
                    $rand = rand('111111111', '999999999');
                    $att_image = $request->file("att_image.$key");
                    $exten = $att_image->extension();
                    $att_file = $rand . '.' . $exten;
                    $request->file("att_image.$key")->storeAs('public/data', $att_file);
                    $attribute['image'] = $att_file;
                } else {
                    $attribute['image'] = $att_img[$key];
                }

               


                DB::table('product_attribute')
                    ->where('id', $attid[$key])
                    ->update($attribute);
              
            }
        } else {
            foreach ($att_s_no as $key => $value) {
                $attribute['product_id'] = $data->id;
                $attribute['serial_no'] = $att_s_no[$key];
                $attribute['price'] = $att_Price[$key];
                $attribute['qunatity'] = $att_qty[$key];

                if ($att_color_id[$key] != "") {
                    $attribute['color_id'] = $att_color_id[$key];
                } else {
                    $attribute['color_id'] = 0;
                }
                if ($att_brand_id[$key] != "") {
                    $attribute['brand_id'] = $att_brand_id[$key];
                } else {
                    $attribute['brand_id'] = 0;
                }
                if ($att_size_id[$key] != "") {
                    $attribute['size_id'] = $att_size_id[$key];
                } else {
                    $attribute['size_id'] = 0;
                }

                if ($request->hasFile("att_image.$key")) {
                    $rand = rand('111111111', '999999999');
                    $att_image = $request->file("att_image.$key");
                    $exten = $att_image->extension();
                    $att_file = $rand . '.' . $exten;
                    $request->file("att_image.$key")->storeAs('public/data', $att_file);
                    $attribute['image'] = $att_file;
                } else {
                    $attribute['image'] = "";
                }
               

            }

            DB::table('product_attribute')->insert($attribute);
            
        }



        $attimgid=$request->post('imageattr');
        print_r($attimgid);
        die();
        $tem_data=$request->post('temdata');
     
         $Data_img=DB::table('product_image')
         ->where('product_id', $id)
         ->get();
         foreach ($Data_img as $list) {
            $Attimg[] = $list->product_image;
          }
        foreach ($tem_data as $key=>$value) {
            $attributeimg['product_id']=$data->id;
             if ($attimgid[$key] !='') {
                

                if ($request->hasFile("product_image.$key")) {
                    $rand = rand('111111111', '999999999');
                    $att_image = $request->file("product_image.$key");
                    $exten = $att_image->extension();
                    $att_file = $rand . '.' . $exten;
                    $request->file("product_image.$key")->storeAs('public/data', $att_file);
                    $attributeimg['product_image'] = $att_file;
                } else {
                    $attributeimg['product_image'] = $Attimg[$key];
                }


                DB::table('product_image')
                    ->where('id', $attimgid[$key])
                    ->update($attributeimg);

            }
           else{
               if ($request->hasFile("product_image.$key")) {
                   $rand = rand('111111111', '999999999');
                   $att_image = $request->file("product_image.$key");
                   $exten = $att_image->extension();
                   $att_file = $rand . '.' . $exten;
                   $request->file("product_image.$key")->storeAs('public/data', $att_file);
                   $attributeimg['product_image'] = $att_file;
                   DB::table('product_image')->insert($attributeimg);
               }


              
           }
        
        }

        



        return redirect('admin/product_table');
    }




    function update_status($status, $id, request $request)
    {
        productmodel::where('id', $id)->update([
            'status' => $status,
        ]);

        $request->session()->flash('message', 'Stutus updated  successfully ');
        return redirect('admin/product_table');
    }
}
