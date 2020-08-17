@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">All Subscribers</h3>
                </div>
                <div class="box-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Email</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($subscribers as $key => $subscriber)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>
                                    {{ $subscriber->email }}
                                </td>
                                <td>
                                    {!! $subscriber->created_at->format('d-m-Y') !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection
