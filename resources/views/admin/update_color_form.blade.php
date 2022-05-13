@extends('admin/layout/layout')
@section('title','Update color')
@section('contain')
<div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header"><a href="{{url('admin/color_table')}}">Back</a></div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Add Category</h3>
                                        </div>
                                        <hr>
                                        <form action="{{url('admin/insert_update_color/'.$data->id)}}" method="post" >
                                        @csrf 
                                        <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1"> Name</label>
                                                <input id="color" name="color" type="text" class="form-control"   value="{{$data->color}}">
                                            @error('color')
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