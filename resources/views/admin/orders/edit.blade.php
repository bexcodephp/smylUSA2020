@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Order Detail</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <h2>
                            <a href="{{ route('admin.customers.show', $customer->id) }}">{{$customer->name}}</a> <br />
                            <small>{{$customer->email}}</small> <br />
                            <small>Order#: <strong>{{$order->order_no}}</strong></small>
                        </h2>
                    </div>
                    <div class="col-md-3 col-md-offset-3">
                    </div>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Design Company</h3>
            </div>
            <form method="POST" class="Forms-module__formWrapper___3cRjt" enctype="multipart/form-data" action="{{ route('admin.orders.voodooApi') }}">
                <div class="box-body">
                    <div class="col-sm-4">
                        <h4>Order Type:</h4>
                        <div class="form-group">
                            <div class="Forms-module__label___2QiAx">Order Type*:</div>
                            <select class="form-control" id="order_type" required name="order_type">
                                <option value="">Select...</option>
                                <option value="treatment_plan">Treatment Planning</option>
                            </select>
                        </div>
                        <h4>Order Info:</h4>
                        <div class="form-group">
                        <div class="Forms-module__label___2QiAx">Patient Name*:</div><input class="form-control" name="patient_name" readonly value="{{ $order->customer->name }}">
                        </div>
                        <div class="form-group">
                            <div class="Forms-module__label___2QiAx">Doctor:</div><input class="form-control" required name="doctor" value="">
                        </div>
                        <div class="form-group">
                            <div class="Forms-module__label___2QiAx">Patient ID:</div><input class="form-control" readonly name="patient_id" value="{{ $order->customer_id }}">
                        </div>
                        <div class="form-group">
                        <div class="Forms-module__label___2QiAx">Internal ID:</div><input class="form-control" name="internal_id" readonly value="{{ $order->order_no }}">
                        </div>
                        <div class="form-group">
                            <div class="Forms-module__label___2QiAx">Notes:</div><input class="form-control" name="notes" value="">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <h4>Shipping Info:</h4>
                        <div class="form-group">
                        <div class="Forms-module__label___2QiAx">Name*:</div><input class="form-control" name="shipping_name" value="{{ $order->customer->name }}" readonly>
                        </div>
                        <div class="form-group">
                            <div class="Forms-module__label___2QiAx">Street 1*:</div><input class="form-control" name="shipping_street1"  value="{{ $order->address->address_1 }}">
                        </div>
                        <div class="form-group">
                            <div class="Forms-module__label___2QiAx">City*:</div><input class="form-control" name="shipping_city"  value="{{ $order->address->city}} ">
                        </div>
                        <div class="form-group">
                        <div class="Forms-module__label___2QiAx">State*:</div><input class="form-control" required  name="shipping_state"  value="{{ $order->address->state_code }}">
                        </div>
                        <div class="form-group">
                        <div class="Forms-module__label___2QiAx">Zip*:</div><input class="form-control" name="shipping_zip" required  value="{{ $order->address->zipcode }}">
                        </div>
                        <input type="hidden" name="country" value="US">
                        {{-- <div class="form-group">
                            <div class="Forms-module__label___2QiAx">Country*:</div><select class="form-control" name="shipping_country">
                                <option value="">Select...</option>
                                <option value="US">United States</option>
                                <option value="CA">Canada</option>
                                <option value="GB">United Kingdom</option>
                            </select>
                        </div> --}}
                        <div class="form-group">
                        <div class="Forms-module__label___2QiAx">Phone:</div><input class="form-control" name="shipping_phone" readonly value="{{ $order->address->phone  }}">
                        </div>
                        <div class="form-group">
                            <div class="Forms-module__label___2QiAx">Email:</div><input class="form-control" readonly name="shipping_email" type="email"
                        value="{{ $order->customer->email }}">
                        </div>
                    <input type="hidden" name="order_id" value="{{ $order->id }}" name="order_id">
                    </div>
                    <div class="Forms-module__stepFormSection___25TqL" id="treatmentInfo" style="display: none;">
                        <div class="col-sm-4">
                            <h4>Treatment Info:</h4>
                            <div class="treatmentPlan" style="display: none;">
                                <div class="form-group">
                                    <div class="Forms-module__label___2QiAx">Impressions/Scans*:</div>
                                    <select class="form-control" id="impressions_scans" name="TreatmentPlan.impressions_scans">
                                        <option value="impressions">Impressions</option>
                                        <option value="scans">Scans</option>
                                    </select>
                                </div>
                                <div id="impression" style="display: none;">
                                    <div class="form-group">
                                        <div class="Forms-module__label___2QiAx">Arches*:</div><select class="form-control" name="TreatmentPlan.arches">
                                            <option value="upper_and_lower">Upper and Lower</option>
                                            <option value="upper">Upper</option>
                                            <option value="lower">Lower</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="Forms-module__label___2QiAx">Upload Patient Photos*:</div>
                                        <div class="Forms-module__fileWrapper___QHXr5">
                                            <div class="form-group">
                                                <div tabindex="0">
                                                    <input class="form-control" ="" name="TreatmentPlan.patient_photos[]" type="file" autocomplete="off" tabindex="-1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="Forms-module__label___2QiAx">Upload X-Rays:</div>
                                        <div class="Forms-module__fileWrapper___QHXr5">
                                            <div class="form-group">
                                                <div tabindex="0">
                                                    <input class="form-control" name="TreatmentPlan.xrays[]"  =""
                                                        type="file" autocomplete="off" tabindex="-1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="Forms-module__label___2QiAx">Upload RX Form*:</div>
                                        <div class="Forms-module__fileWrapper___QHXr5">
                                            <div class="form-group">
                                                <div tabindex="0"><input class="form-control" name="TreatmentPlan.rx_form"  type="file" autocomplete="off" tabindex="-1"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="Forms-module__label___2QiAx">Include Retainer:</div><input 
                                            name="TreatmentPlan.include_retainer" checked type="checkbox" value="">
                                    </div>
                                    <div class="form-group">
                                        <div class="Forms-module__label___2QiAx">Notes:</div>
                                        <textarea class="form-control" name="TreatmentPlan.notes"></textarea>
                                    </div>
                                </div>

                                <div id="scans" style="display: none;">
                                    <div class="Forms-module__fieldWrapper___1K7BM">
                                        <div class="Forms-module__label___2QiAx">Arches*:</div><select id="scan_arches" class="form-control" name="scan.scan_arches">
                                            <option value="UPPER_AND_LOWER">Upper and Lower</option>
                                            <option value="UPPER">Upper</option>
                                            <option value="LOWER">Lower</option>
                                        </select>
                                    </div>
                                    <div class="Forms-module__fieldWrapper___1K7BM" id="upload_upper_scan" style="margin: 15px auto;">
                                        {{-- <div class="Forms-module__label___2QiAx">Upload Upper Scan*:</div> --}}
                                        <div class="Forms-module__fileWrapper___QHXr5">
                                            <div class="form-group">
                                                <div tabindex="0">UPPER Scan File(.STL)<input class="form-control" type="file"  name="scan.upper_scan_obj[]" autocomplete="off"
                                                        tabindex="-1" ></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="Forms-module__fieldWrapper___1K7BM" id="upload_lower_scan" style="margin: 15px auto;">
                                        {{-- <div class="Forms-module__label___2QiAx">Upload Lower Scan*:</div> --}}
                                        <div class="Forms-module__fileWrapper___QHXr5">
                                            <div class="form-group">
                                                <div tabindex="0">LOWER Scan File(.STL)<input class="form-control" type="file"  name="scan.lower_scan_obj[]" autocomplete="off"
                                                        tabindex="-1" ></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="Forms-module__fieldWrapper___1K7BM" style="margin: 15px auto;">
                                        <div class="Forms-module__fileWrapper___QHXr5">
                                            <div class="form-group">
                                                <div tabindex="0">Upload Patient Photos (.JPEG or
                                                        .PNG)<input class="form-control" ="" name="scan.patient_photos[]"  type="file"
                                                        autocomplete="off" tabindex="-1" ></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="Forms-module__fieldWrapper___1K7BM" style="margin: 10px auto;">
                                        <div class="Forms-module__fileWrapper___QHXr5">
                                            <div class="form-group">
                                                <div tabindex="0">Upload X-Rays<input class="form-control" name="scan.xrays[]" ="" type="file"
                                                        autocomplete="off" tabindex="-1" ></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="Forms-module__fieldWrapper___1K7BM">
                                        <div class="Forms-module__fileWrapper___QHXr5">
                                            <div class="form-group">
                                                <div tabindex="0">Upload RX Form (.PDF or
                                                        .JPEG)<input class="form-control" type="file" name="scan.rx_form" autocomplete="off"
                                                        tabindex="-1" ></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="Forms-module__fieldWrapper___1K7BM">
                                        <div class="Forms-module__label___2QiAx">Include Retainer:</div>
                                        <input name="scan.include_retainer" type="checkbox" checked value="">
                                    </div>
                                    <div class="Forms-module__fieldWrapper___1K7BM">
                                        <div class="Forms-module__label___2QiAx">Notes:</div><textarea class="form-control" name="scan.notes"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="production" style="display: none;">
                                <div class="Forms-module__formSectionTitle___1-8Bk">Steps:</div>
                                <div class="Forms-module__fieldWrapper___1K7BM">
                                    <div class="Forms-module__label___2QiAx">Step:</div>
                                    <select class="form-control" id="productionStep">
                                        <option value="1">1</option>
                                    </select>
                                </div>
                                <div class="Forms-module__row___WIdue">
                                    <div>
                                        <div class="Forms-module__fieldWrapper___1K7BM">
                                            <div class="Forms-module__label___2QiAx">Step Type:</div><select class="form-control" name="group_id">
                                                <option value="1000">Aligner</option>
                                                <option value="2000">Template</option>
                                                <option value="3000">Retainer</option>
                                            </select>
                                        </div>
                                        <div class="Forms-module__fieldWrapper___1K7BM">
                                            <div class="Forms-module__label___2QiAx">Upper:</div>
                                            <div class="Forms-module__fileWrapper___QHXr5">
                                                <div class="form-group">
                                                    <div tabindex="0">UPPER Mold
                                                            File (.OL)</button><input class="form-control" type="file"
                                                            autocomplete="off" tabindex="-1" ></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="Forms-module__fieldWrapper___1K7BM">
                                            <div class="Forms-module__label___2QiAx">Lower:</div>
                                            <div class="Forms-module__fileWrapper___QHXr5">
                                                <div class="form-group">
                                                    <div tabindex="0">LOWER Mold
                                                            File (.OL)</button><input class="form-control" type="file"
                                                            autocomplete="off" tabindex="-1" ></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="Forms-module__fieldWrapper___1K7BM">
                                            <div class="Forms-module__label___2QiAx">Notes:</div><input class="form-control" name="steps[0].notes" type="text" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="Forms-module__controlBtns___2DcFD"><button type="button" class="Forms-module__addButton___12zJd">+ Add
                                        Step</button><button type="button" class="Forms-module__removeButton___2txd1" disabled="">- Delete
                                        Step</button></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="Forms-module__submitWrapper___G-jf4">
                        <button type="submit" class="btn btn-success">
                            <div>Submit Order</div>
                        </button></div>
                </div>
                @csrf
            </form>
            {{-- <div class="box-body">
                <h4> <i class="fa fa-shopping-bag"></i> Order Information</h4>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <td class="col-md-3">Date</td>
                            <td class="col-md-3">Customer</td>
                            <td class="col-md-3">Payment</td>
                            <td class="col-md-3">Status</td>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ date('M d, Y h:i a', strtotime($order['created_at'])) }}</td>
                        <td><a href="{{ route('admin.customers.show', $customer->id) }}">{{ $customer->name }}</a></td>
                        <td><strong>{{ $order['payment'] }}</strong></td>
                        <td>
                            <form action="{{ route('admin.orders.update', $order->id) }}" method="post">
                                {{ csrf_field() }}
                                <input class="form-control" type="hidden" name="_method" value="put">
                                <label for="order_status_id" class="hidden">Update status</label>
                                <input type="text" name="total_paid" class="form-control" placeholder="Total paid" style="margin-bottom: 5px; display: none" value="{{ old('total_paid') ?? $order->total_paid }}" />
                                <div class="input-group">
                                    <select class="form-control" name="order_status_id" id="order_status_id" class="form-control select2">
                                        @foreach($statuses as $status)
                                            <option @if($currentStatus->id == $status->id) selected="selected" @endif value="{{ $status->id }}">{{ $status->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="input-group-btn"><button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-primary">Update</button></span>
                                </div>
                            </form>
                        </td>
                    </tr>
                    </tbody>
                    <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="bg-warning">Subtotal</td>
                        <td class="bg-warning">{{ $order['total_products'] }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="bg-warning">Tax</td>
                        <td class="bg-warning">{{ $order['tax'] }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="bg-warning">Discount</td>
                        <td class="bg-warning">{{ $order['discounts'] }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="bg-success text-bold">Order Total</td>
                        <td class="bg-success text-bold">{{ $order['total'] }}</td>
                    </tr>
                    @if($order['total_paid'] != $order['total'])
                        <tr>
                            <td></td>
                            <td></td>
                            <td class="bg-danger text-bold">Total paid</td>
                            <td class="bg-danger text-bold">{{ $order['total_paid'] }}</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div> --}}
            <!-- /.box-body -->
        </div>
    </section>
    <!-- /.content -->
@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#order_type').change(function(e){
                if( $(this).val() == "treatment_plan")
                {
                    $('#treatmentInfo').show();
                    $('.treatmentPlan').show();
                    $('#impression').show();
                    $('.production').hide();
                }

                if( $(this).val() == "production")
                {
                    $('#treatmentInfo').show();
                    $('.treatmentPlan').hide();
                    $('#impression').hide();
                    $('.production').show();
                }

                if( $(this).val() == "")
                {
                    $('#treatmentInfo').hide();
                    $('.treatmentPlan').hide();
                    $('#impression').hide();
                    $('.production').hide();
                }
            });
        });

        $('#impressions_scans').change(function(e){
            if($(this).val() == "impressions")
            {
                $('#impression').show();
                $('#scans').hide();
            }else{
                $('#impression').hide();
                $('#scans').show();
            }
        });
        
        $('#scan_arches').change(function(e){
            if($(this).val() == "UPPER_AND_LOWER")
            {
            $('#upload_upper_scan').show();
            $('#upload_lower_scan').show();
            }
            
            if($(this).val() == "UPPER")
            {
            $('#upload_upper_scan').show();
            $('#upload_lower_scan').hide();
            }
            
            if($(this).val() == "LOWER")
            {
            $('#upload_upper_scan').hide();
            $('#upload_lower_scan').show();
            }
        });
    </script>
@endsection