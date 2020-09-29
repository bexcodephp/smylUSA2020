@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
        @if(!$resources->isEmpty())
            <div class="box">
                <div class="box-body">
                    <h2>Resources</h2>
                    <div class="box-tools pull-right mb-2">
                        <a href="/admin/resources/create" class="btn btn-primary">Add New</a>
                    </div>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <td>Title</td>
                                <td>Description</td>
                                <td>File</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($resources as $resource)
                            <tr>
                                <td>{{ $resource->title }}</td>
                                <td>{!! $resource->description !!}</td>
                                <td>
                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal{{ $resource->id }}">
                                        <video id='video{{ $resource->id }}'
                                               class='video-js vjs-default-skin'
                                               width='150'
                                               height='150'>
                                                <source src="{{ url('storage/resource/'.$resource->url) }}"/>
                                        </video>
                                    </a>
                                    <div class="modal fade videomodal" id="myModal{{ $resource->id }}" role="dialog">
                                        <div class="modal-dialog">
                                          <!-- Modal content-->
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <iframe src="{{ url('storage/resource/'.$resource->url) }}" width="570" height="390"></iframe>
                                            </div>
                                          </div>
                                        </div>
                                      </div>                                    
                                    </td>
                                <td>
                                 
                                        <div class="btn-group">
                                            <a href="{{ url('admin/resources/edit/'.$resource->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                            <a href="{{ url('admin/resources/delete/'.$resource->id) }}" onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</a>
                                        </div>
                                    
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
             
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            @else
            <p class="alert alert-warning">No Resource created yet. <a href="">Create one!</a></p>
        @endif
    </section>
    <!-- /.content -->
@endsection
