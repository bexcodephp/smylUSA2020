<form method="POST" action="{{ route('bookAppointment') }}" style="display: none;" class="schedule_time">
    @csrf
    <input type="hidden" id="timespan" name="timespan">
    <input type="hidden" id="facility_id" name="facility_id">
    <input type="hidden" id="week_no" name="week_no">
    <div class="row" style="margin-bottom: 50px;">
        <div class="col-sm-6">
            <div class="scan-form-section left">
                <div class="form-group">

                    <div class="field-container">
                        <label class="eyebrow">Email Address</label>
                        <input type="text" name="email" class="form-control data-hj-whitelist" id="id_email"
                            autocomplete="email" required="" maxlength="128" placeholder="email address">

                    </div>

                    <div class="field-container">
                        <label class="eyebrow">First Name</label>
                        <input type="text" name="first_name" class="form-control data-hj-whitelist" id="id_first_name"
                            autocomplete="given-name" required="" maxlength="30" placeholder="first name">

                    </div>
                    <div class="field-container">
                        <label class="eyebrow">Last Name</label>
                        <input type="text" name="last_name" class="form-control data-hj-whitelist" id="id_last_name"
                            autocomplete="family-name" required="" maxlength="30" placeholder="last name">
                    </div>
                    <div class="field-container">
                        <div class="intl-tel-input allow-dropdown">
                            <label class="eyebrow">Phone Number</label>
                            <input type="tel" name="phone" class="form-control phone-input data-hj-whitelist"
                                required="" placeholder="phone number" autocomplete="off" id="id_phone">
                        </div>
                    </div>
                    <div class="field-container">
                        <div class="intl-tel-input allow-dropdown">
                            <label class="eyebrow">Date of Birth</label>
                            <input type="text" name="dob" class="form-control phone-input data-hj-whitelist datepicker"
                                required="" placeholder="Date of Birth" autocomplete="off" id="dob">
                        </div>
                    </div>
                </div>

                <div class="sms_optout_on_scan">
                    <div class="checkbox-radio-container sms">
                        <label for="sms_optout_on"></label>
                        <input name="sms_optout_on" type="checkbox" checked="checked" required>
                    </div>
                    <p><a href="#" target="_blank">Please send me texts about appointment reminders and directions. I
                            agree to the text message terms &amp; conditions.</a></p>
                </div>
            </div>
        </div>


        <div class="col-sm-6">
            <div style="padding-left: 30px;">
                <h2 class="text-center">Order Summary: FREE</h2>
                <div class="line-item">
                    <div class="row">
                        <div class="col-xs-8 text-left"><span class="eyebrow">Subtotal</span>
                        </div>
                        <div class="col-xs-4 text-right"><span class="eyebrow subtotal">$0.00</span>
                        </div>
                    </div>
                </div>
                <div class="line-item">
                    <div class="row">
                        <div class="col-xs-8 text-left"><span class="eyebrow">Total</span>
                        </div>
                        <div class="col-xs-4 text-right"><span class="eyebrow subtotal">$0.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 text-center">
            <button type="submit" class="btn btn-primary btn-block">Book A Visit</button>
        </div>
    </div>

    </div>
</form>

<script>
     $(document).ready(function(e){
        let date = new Date();
        $('.datepicker').datepicker({
            maxDate: date,
            changeMonth: true,
            changeYear: true,
        });
    });
</script>