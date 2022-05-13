@extends('admin/layout/layout') @section('title','Add Product ') @section('contain') @if(session()->has('unique_error'))
<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
    <span class="badge badge-pill badge-danger">Attribute</span>

    {{session('unique_error')}}

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
@endif
<div class="container-fluid">
    <div class="col-lg-13">
        <div class="card">
            <div class="card-header"><a href="{{url('admin/product_table')}}">Back</a></div>
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Add Product</h3>
                </div>
                <hr />
                <form action="{{url('admin/insert_update_product/'.$product->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="control-label mb-1"> Name</label>
                        <input id="name" name="name" type="text" class="form-control" value="{{$product->name}}" />
                        @error('name')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label mb-1"> slug</label>
                        <input id="slug" name="slug" type="text" class="form-control" value="{{$product->slug}}" />
                        @error('slug')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="selectLg" class="form-control-label">category</label>
                        <div class="col-15 col-md-20">
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">Select Category</option>
                                @foreach($category as $list) @if($product->category_id==$list->id)
                                <option value="{{$list->id}}" selected>{{$list->name}}</option>
                                @endif @if($list->status!=0)
                                <option value="{{$list->id}}">{{$list->name}}</option>
                                @endif @endforeach
                            </select>
                        </div>

                        @error('category_id')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label mb-1"> image</label>
                        <input id="image" name="image" type="file" class="form-control" value="{{$product->image}}" />
                        @error('image')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label mb-1"> Short Description</label>
                        <textarea id="short_disc" name="short_disc" type="text" class="form-control">
 
                        {{$product->short_disc}}
                        </textarea>
                        @error('short_disc')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label mb-1"> Long Description</label>
                        <textarea id="long_disc" name="long_disc" type="text" class="form-control">  {{$product->long_disc}}</textarea>

                        @error('long_disc')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label mb-1"> Warranty</label>
                        <input id="warranty" name="warranty" type="text" class="form-control" value="{{$product->warranty}}" />
                        @error('warranty')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="col-lg-13" id="imagesection">
                        <?php
                        $counter=1;
                        ?>
                        @foreach($attributeimg as $key=>$value)

                        <?php $arrayimg=(array) $value;?>
                        <input type="text" name='imageattr[]' id='imageattr[]' value="{{$arrayimg['id']}}">
                        <input type="text" name='temdata[]' id='temdata[]' value="{{$counter}}">
                        <div class="card" id="imagesection_{{$counter++}}">
                            <div class="card-header">
                                @if($counter==2)
                                <div class="btn btn-success">
                                    <button type="button" onclick="addimage()" style="color: white;"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
                                </div>
                                @else
                                <div class="btn btn-danger">
                                    <a href="{{url('admin/delete_image/')}}/{{$arrayimg['id']}}/{{$arrayimg['product_id']}}">
                                        <button type="button" style="color: white;"><i class="fa fa-close" aria-hidden="true"></i> close</button>
                                    </a>
                                </div>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Product Images</h3>
                                </div>
                                <hr />
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <label class="control-label mb-1"> image</label>
                                        <input id="product_image" name="product_image[]" type="file" class="form-control" />
                                        <img src="{{asset('storage/data/'.$arrayimg['product_image'])}}" alt="" width="100px" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>

                    <div class="col-lg-13" id="mainsection">
                        @php $counter=1; @endphp @foreach($attribute as $key=>$value)
                        <?php $attrarray = (array) $value; ?>
                        @if(session()->has('unique_error'))
                        <p>Attribte ID</p>
                        <input type="text" name="paid[]" id="paid" value="{{$attrarray['id']}}" class="btn btn-danger" />
                        @else
                        <input type="hidden" name="paid[]" id="paid" value="{{$attrarray['id']}}" />
                        @endif
                        <div class="card" id="sectionattr_{{$counter++}}">
                            <div class="card-header">
                                @if($counter==2)
                                <div class="btn btn-success">
                                    <button type="button" onclick="addsection()" style="color: white;"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
                                </div>
                                @else
                                <div class="btn btn-danger">
                                    <a href="{{url('admin/delete_attribute/')}}/{{$attrarray['id']}}/{{$attrarray['product_id']}}">
                                        <button type="button" style="color: white;"><i class="fa fa-close" aria-hidden="true"></i> close</button>
                                    </a>
                                </div>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Product Attribute</h3>
                                </div>
                                <hr />
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <label class="control-label mb-1"> Serial No</label>
                                            <input id="att_s_no" name="att_s_no[]" type="text" class="form-control" value="{{$attrarray['serial_no']}}" />
                                            @error('att_s_no.*')
                                            <div class="alert alert-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-lg-2">
                                            <label class="control-label mb-1"> Price</label>
                                            <input id="att_Price" name="att_Price[]" type="text" class="form-control" value="{{$attrarray['price']}}" />
                                            @error('att_Price.*')
                                            <div class="alert alert-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="control-label mb-1"> Qunatity</label>
                                            <input id="att_qty" name="att_qty[]" type="text" class="form-control" value="{{$attrarray['qunatity']}}" />
                                            @error('att_qty.*')
                                            <div class="alert alert-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="control-label mb-1"> Color</label>
                                            <select name="att_color_id[]" id="att_color_id" class="form-control">
                                                <option value="">Select Color</option>
                                                @foreach($color as $list) @if($attrarray['color_id']==$list->id)
                                                <option value="{{$list->id}}" selected>{{$list->color}}</option>
                                                @endif @if($list->status!=0)
                                                <option value="{{$list->id}}">{{$list->color}}</option>
                                                @endif @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="control-label mb-1"> size</label>
                                            <select name="att_size_id[]" id="att_size_id" class="form-control">
                                                <option value="">Select Size</option>
                                                @foreach($size as $list) @if($attrarray['size_id']==$list->id)
                                                <option value="{{$list->id}}" selected>{{$list->size}}</option>
                                                @endif @if($list->status!=0)
                                                <option value="{{$list->id}}">{{$list->size}}</option>
                                                @endif @endforeach
                                            </select>
                                        </div>

                                        <div class="col-lg-3">
                                            <label class="control-label mb-1"> Brand</label>
                                            <select name="att_brand_id[]" id="att_brand_id" class="form-control">
                                                <option value="">Select brand</option>
                                                @foreach($Brand as $list) @if($attrarray['brand_id']==$list->id)
                                                <option value="{{$list->id}}" selected>{{$list->name}}</option>
                                                @endif @if($list->status!=0)
                                                <option value="{{$list->id}}">{{$list->name}}</option>
                                                @endif @endforeach
                                            </select>
                                        </div>

                                        <div class="col-lg-4">
                                            <label class="control-label mb-1"> image</label>
                                            <input id="att_image" name="att_image[]" type="file" class="form-control" value="{{$attrarray['image']}}" />
                                            <!-- <input type="text " value="{{$attrarray['image']}}" name='file_image[]' id='file_image'> -->
                                            <img src="{{asset('storage/data/'.$attrarray['image'])}}" alt="" width="100px" />
                                            @error('att_image.*')
                                            <div class="alert alert-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div>
                        <input id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" value="submit" />
                    </div>
                </form>
            </div>
            <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
            <script>
                CKEDITOR.replace("short_disc");
                CKEDITOR.replace("long_disc");
                var counter = 1;
                function addsection() {
                    counter++;

                    var box = ' <input type="text" name="paid[]" id="paid" > <div class="card"  id="sectionattr_' + counter + '">';
                    box += '<div class="card-header"  >';
                    box += '<div class="btn btn-danger">';
                    box += '<button type="button" onclick=remove_section("' + counter + '") style="color:white;">';
                    box += '<i class="fa fa-close" aria-hidden="true"></i> close';
                    box += "</button>";
                    box += "</div>";

                    box += "</div>";
                    box += '<div class="card-body">';
                    box += '<div class="card-title">';
                    box += '<h3 class="text-center title-2"></h3>';
                    box += "</div>";
                    box += "<hr>";
                    box += '<div class="form-group">';
                    box += '<div class="row">';

                    box += '<div class="col-lg-2">';
                    box += '<label   class="control-label mb-1"> Serial No</label>';
                    box += '<input id="att_s_no" name="att_s_no[]" type="text" class="form-control"  required>';
                    box += "</div>";

                    box += '<div class="col-lg-2">';
                    box += '<label   class="control-label mb-1"> Price</label>';
                    box += '<input id="att_Price" name="att_Price[]" type="text" class="form-control" required>';
                    box += "</div>";

                    box += '<div class="col-lg-2">';
                    box += '<label   class="control-label mb-1"> Qunatity</label>';
                    box += '<input id="att_qty" name="att_qty[]" type="text" class="form-control"  required >';
                    box += "</div>";
                    box += '<div class="col-lg-3">';
                    box += '<label   class="control-label mb-1"> Color</label>';
                    box += '<select name="att_color_id[]" id="att_color_id" class="form-control">';
                    box += '<option value="">Select Color</option>';
                    box += "@foreach($color as $list)";
                    box += "@if($list->status!=0)";
                    box += '<option value="{{$list->id}}">{{$list->color}}</option>';
                    box += "@endif";
                    box += "@endforeach";
                    box += "</select>";
                    box += "</div>";
                    box += '<div class="col-lg-3">';

                    box += '<label   class="control-label mb-1"> size</label>';
                    box += '<select name="att_size_id[]" id="att_size_id" class="form-control">';
                    box += '<option value="">Select Size</option>';
                    box += "@foreach($size as $list)";
                    box += "@if($list->status!=0)";
                    box += '<option value="{{$list->id}}">{{$list->size}}</option>';
                    box += "@endif";
                    box += "@endforeach";
                    box += "</select>";
                    box += "</div>";

                    box += '<div class="col-lg-3">';

                    box += '<label   class="control-label mb-1"> Brand</label>';
                    box += '<select name="att_brand_id[]" id="att_brand_id" class="form-control">';
                    box += '<option value="">Select brand</option>';
                    box += "@foreach($Brand as $list)";
                    box += "@if($list->status!=0)";
                    box += '<option value="{{$list->id}}">{{$list->name}}</option>';
                    box += "@endif";
                    box += "@endforeach";
                    box += "</select>";
                    box += "</div>";
                    box += '<div class="col-lg-4">';

                    box += '<label   class="control-label mb-1"> image</label>';
                    box += '<input id="att_image" name="att_image[]" type="file" class="form-control"   required>';
                    //  box += '<input type="text "  name="file_image[]" id="file_image">';

                    box += "</div>";
                    box += "</div>";
                    box += "</div>";
                    box += "</div>";
                    box += "</div>";
                    jQuery("#mainsection").append(box);
                }
                counters=1;
                function addimage() {
                    counter++;
                     var box='<input type="text" name="temdata[]" id="temdata[]" value="'+counter+'">';
                    box += ' <div class="card" id="imagesection_' + counter + '">';
                    box += '<div class="card-header">';
                    box += '<div class="btn btn-danger">';
                    box += '<button type="button" onclick=remove_imagesection("' + counter + '") style="color:white;">';
                    box += '<i class="fa fa-close" aria-hidden="true"></i> close';
                    box += "</button>";
                    box += "</div> ";
                    box += "</div>";
                    box += '<div class="card-body">';
                    box += '<div class="card-title">';
                    box += '<h3 class="text-center title-2">Product Images</h3>';
                    box += "</div>";
                    box += "<hr />";
                    box += '<div class="form-group">';
                    box += '<div class="row">';

                    box += '<div class="col-lg-12">';
                    box += '<label class="control-label mb-1"> image</label>';
                    box += '<input id="product_image" name="product_image[]" type="file" class="form-control" />';
                    box += "</div>";
                    box += "</div>";
                    box += "</div>";
                    box += "</div>";
                    jQuery("#imagesection").append(box);
                }

                function remove_imagesection(counter) {
                    jQuery("#imagesection_" + counter).remove();
                }

                function remove_section(counter) {
                    jQuery("#sectionattr_" + counter).remove();
                }
            </script>

            @endsection
        </div>
    </div>
</div>
