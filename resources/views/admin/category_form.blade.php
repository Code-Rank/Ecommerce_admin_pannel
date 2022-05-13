@extends('admin/layout/layout')
@section('title','Add Category ')
@section('contain')
<div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header"><a href="{{url('admin/category_table')}}">Back</a></div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Add Category</h3>
                                        </div>
                                        <hr>
                                        <form action="{{url('admin/insert_category')}}" method="post" >
                                        @csrf 
                                        <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Category Name</label>
                                                <input id="Name" name="name" type="text" class="form-control"   >
                                            @error('name')
                                            <div class="alert alert-danger">
                                             {{$message}}
                                             </div>
                                            @enderror
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Category slug</label>
                                                <input id="text" name="slug" type="text" class="form-control cc-name valid" >
                                                
                                                @error('slug')
                                                <div class="alert alert-danger">
                                               {{$message}}
                                               </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Category Description</label>
                                                <textarea id="description" name="description"  class="form-control cc-number identified visa" ></textarea>
                                                @error('description')
                                                <div class="alert alert-danger">
                                        {{$message}}
                                        </div>
                                            @enderror
                                            </div>
                             
                                            <div>
                                                <input id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" value="submit">
                                                 
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
@endsection