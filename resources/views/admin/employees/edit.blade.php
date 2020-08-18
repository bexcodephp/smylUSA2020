@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('admin.employees.update', $employee->id) }}" method="post" class="form">
                <div class="box-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="put">                    
                    <div class="form-group">
                        <label for="fname">First Name <span class="text-danger">*</span></label>
                        <input type="text" name="fname" id="fname" placeholder="First Name" class="form-control" value="{!! $employee->fname ?: old('fname')  !!}">
                    </div>
                    <div class="form-group">
                        <label for="lname">Last Name <span class="text-danger">*</span></label>
                        <input type="text" name="lname" id="lname" placeholder="Last Name" class="form-control" value="{!! $employee->lname ?: old('lname')  !!}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-addon">@</span>
                            <input type="text" name="email" id="email" placeholder="Email" class="form-control" value="{!! $employee->email ?: old('email')  !!}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone<span class="text-danger">*</span></label>
                        <input type="text" name="phone" id="phone" placeholder="Phone" class="form-control" value="{!! $employee->phone ?: old('phone')  !!}">
                    </div>
                    <div class="form-group">
                        <label for="location_associated">Location Associated </label>
                        <?php 
                                $location_list =  json_decode($employee->location_associated); // selected location list by employeed print_r($location_list); 
                                $select = '';                                
                        ?>
                        <select name="location_associated[]" id="location_associated" class="form-control select2" multiple="multiple">
                            <option></option>
                            @foreach($facilities as $location)
                                <?php if(in_array($location->facility_id,$location_list)){ $select = 'selected'; } else{ $select = "";} ?>
                                <option id="" value="{{ $location->facility_id }}" <?php echo $select;?>>{{ ucfirst($location->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="add_new_location">
                        
                    </div>
                    @include('admin.shared.status-select', ['status' => $employee->status])
                </div>

                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.employees.index') }}" class="btn btn-default btn-sm">Back</a>
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
