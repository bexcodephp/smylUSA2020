@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
            <div class="box">
                <div class="box-body">
                    <h2>User Assessments</h2>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="col-md-2">Reason</th>
                                <th class="col-md-2">Worn Brances</th>
                                <th class="col-md-2">Concern</th>
                                <th class="col-md-1">Teeth Crowing</th>
                                <th class="col-md-1">Teeth Spacing</th>
                                <th class="col-md-1">Zip code</th>
                                <th class="col-md-3">Email</th>
                                <th class="col-md-3">Lead Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($user_assessments as $assessment)
                            <tr>
                                <td>{{ $assessment->reason }}</td>
                                <td>{{ $assessment->worn_braces }}</td>
                                <td>{{ $assessment->concern }}</td>
                                <td>{{ $assessment->teeth_crowding }}</td>
                                <td>{{ $assessment->teeth_spacing }}</td>
                                <td>{{ $assessment->zip_code }}</td>
                                <td>{{ $assessment->email }}</td>
                                <td>{{ $assessment->created_at->format('d-m-Y') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>

    </section>
    <!-- /.content -->
@endsection