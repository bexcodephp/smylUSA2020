<form action="" class="tab-pane fade show active py-3 step-1 form_cls" name="step_1" id="step_1"   role="tabpanel" aria-labelledby="nav-home-tab" method="post">
    @csrf
    {{-- personel Information  --}}
    <div class="row mt-0">
        <div class="col-12 mb-2">
            <h4 class="sub-title color-blue text-bold">Personal Information</h4>
        </div>
        <div class="col-sm-6 form-group">
            <label>First Name<span class="text-danger">*</span></label>
            <input type="text" name="first_name" class="form-control input-white" id="first_name" placeholder="First Name" value="{{ $customer->first_name }}">
        </div>
        <div class="col-sm-6 form-group">
            <label>Last <span class="text-danger">*</span></label>
            <input type="text" name="last_name" class="form-control input-white" id="last_name" placeholder="Last Name" value="{{ $customer->last_name }}">
        </div>
        <div class="col-lg-4 col-sm-6 form-group">
            <label>Moblie Number<span class="text-danger">*</span></label>
            <input type="text" name="phone" id="phone" placeholder="Phone Number" value="{{ $customer->phone }}" class="form-control" />
        </div>
        <div class="col-lg-4 col-sm-6 form-group">
            <label>Date of Birth<span class="text-danger">*</span></label>
            <input type="text" name="dob" id="dob" value="{{ $customer->dob ? date('m/d/Y', strtotime($customer->dob)) : null }}" class="form-control input-white" disabled/>
        </div>
        <div class="col-lg-4 col-sm-6 form-group">
            <label>Patient ID<span class="text-danger">*</span></label>
            <input type="text" class="form-control input-white" id="patient_id" placeholder="000000" value="{{ $customer->patient_id }}" disabled>
        </div>
    </div>
    {{-- Billing Information  --}}
    <div class="row mt-3">
        <div class="col-12 mb-2">
            <h4 class="sub-title color-blue text-bold">Billing Information</h4>
        </div>
        <div class="col-12 form-group">
            <label>Address 1<span class="text-danger">*</span></label>
            <input type="text" class="form-control input-white" id="address_1" name="address_1" placeholder="Type Your Address" value="{{ $address ? $address->address_1 : null}}">
        </div>
        <div class="col-12 form-group">
            <label>Address 2<span class="text-danger">*</span></label>
            <input type="text" class="form-control input-white" id="address_2" name="address_2" placeholder="Type Your Address" value="{{ $address ? $address->address_2 : null}}">
        </div>
        <div class="col-lg-4 col-sm-6 form-group">
            <label>City<span class="text-danger">*</span></label>
            <input type="text" class="form-control input-white" id="city" name="city" placeholder="Your City Name" value="{{ $address ? $address->city : null}}">
        </div>
        <div class="col-lg-4 col-sm-6 form-group">
            <label>State<span class="text-danger">*</span></label>
            <select name="state" id="state" class="form-control">
                <option selected value="">Select State</option>
                @foreach($statesList as $key => $state)
                <option value="{{ $key }}" @if( $address && $address->state_code == $key) selected @endif>{{ $state }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-4 col-sm-6 form-group">
            <label>Zip Code<span class="text-danger">*</span></label>
            <input type="text" class="form-control input-white" name="zipcode" id="zipcode" placeholder="000000" value="{{ $address ? $address->zip : null }}">
        </div>
    </div>
    {{-- Billing Information  --}}
    <div class="row mt-3">
        <div class="col-12 mb-2 form-inline">
            <h4 class="sub-title color-blue text-bold mb-2">Shipping Information</h4>
            <div class="custom-control custom-checkbox ml-sm-4 ">
                <input type="checkbox" class="custom-control-input" id="sameAsBilling">
                <label class="custom-control-label color-blue text-bold" for="sameAsBilling"><u>Same As Billing Information</u></label>
            </div>
        </div>
        <div class="col-12 form-group">
            <label>Address 1</label>
            <input type="text" name="shipping_address_1" class="form-control input-white shipping_address_1" id="shipping_address_1" placeholder="Type Your Address" value="{{ $address ? $address->address_1 : null}}">
        </div>
        <div class="col-12 form-group">
            <label>Address 2</label>
            <input type="text" id="shipping_address_2" class="form-control input-white shipping_address_2" name="shipping_address_2" placeholder="Type Your Address" value="{{ $address ? $address->address_2 : null}}">
        </div>
        <div class="col-lg-4 col-sm-6 form-group">
            <label>City</label>
            <input type="text" class="form-control input-white shipping_city" id="shipping_city" name="shipping_city" placeholder="Your City Name" value="{{ $address ? $address->city : null}}">
        </div>
        <div class="col-lg-4 col-sm-6 form-group">
            <label>State</label>
            <select name="shipping_state" id="shipping_state" class="form-control" name="state">
                <option selected value="">Select State</option>
                @foreach($statesList as $key => $state)
                <option value="{{ $key }}" @if( $address && $address->state_code == $key) selected @endif>{{ $state }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-4 col-sm-6 form-group">
            <label>Zip Code</label>
            <input type="text" class="form-control input-white shipping_zipcode" name="shipping_zipcode" id="shipping_zipcode" placeholder="000000" value="{{ $address ? $address->zip : null }}">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 text-right">
            <button type="submit" class="btn btn-primary next-tab" id="step1_submit">Next</button>
        </div>
    </div>
</form>