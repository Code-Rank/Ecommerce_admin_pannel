@extends('admin/layout/layout')
@section('title','Add Cupon ')
@section('contain')
<div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header"><a href="{{url('admin/cupon_table')}}">Back</a></div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Add cupon</h3>
                                        </div>
                                        <hr>
                                        <form action="{{url('admin/insert_cupon')}}" method="post" >
                                        @csrf 
                                        <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Cupon Name</label>
                                                <input id="Name" name="name" type="text" class="form-control"   >
                                            @error('name')
                                            <div class="alert alert-danger">
                                             {{$message}}
                                             </div>
                                            @enderror
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Cupon Code</label>
                                                <input id="code" name="code" type="text" class="form-control cc-name valid" >
                                                
                                                @error('code')
                                                <div class="alert alert-danger">
                                               {{$message}}
                                               </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Cupon vlaue</label>
                                                <input id="value" name="value"  class="form-control cc-number identified visa" type="text" >

                                                @error('value')
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