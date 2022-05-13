@extends('admin/layout/layout')
@section('title','size List')
@section('select_size','active')
@section('contain')
@if(session()->has('message'))
<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-success">Success</span>
                                            
                                             {{session('message')}}
                                            
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">×</span>
											</button>
</div>                
@endif	
                        
<div class="col-md-12">
    <a href="{{url('admin/add_size')}}" class="btn btn-success">Add size</a>
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th > ID</th>
                                                <th >size</th>
                                                
                                                <th >Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $list)
                                            <tr>
                                                <td>{{$list->id}}</td>
                                                <td>{{$list->size}}</td>
                                                
                                                <td >
                                                @if($list->status==1)
                                                <a href="{{url('admin/size_status/0/'.$list->id)}}" class="btn btn-success"><i class="fa fa-unlock" ></i> Active</a>
                                                @elseif($list->status==0)
                                                <a href="{{url('admin/size_status/1/'.$list->id)}}" class="btn btn-warning"><i class="fa fa-lock" ></i> Deactive</a>
                                                @endif
                                                    
                                                <a href="{{url('admin/delete_size/'.$list->id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                                                <a href="{{url('admin/update_size/'.$list->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i>Upade</a>
                                                </td>
                                                
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
            

@endsection