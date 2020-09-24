<form class="tab-pane fade py-3 step-3 form_cls" id="step_3" role="tabpanel" aria-labelledby="nav-contact-tab">
    <div class="row mt-0">
        <div class="col-12 mb-2">
            <h4 class="sub-title color-blue text-bold">Account Information</h4>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6 form-group">
            <label>Email</label>
            <input type="text" class="form-control input-white" id="name_email" placeholder="Name">
        </div>
        <div class="col-md-6 form-group">
            <div class="col p-0">
                <label>Password</label>
                <button type="button" class="btn btn-link p-0 float-right" id="change_pwd"><u>Change</u></button>
            </div>
            <input type="password" class="form-control input-white" id="password" placeholder="Password">
        </div>
        <div class="col-12 form-group">
            <div class="col p-0">
                <label class="mr-3">Card Details</label>
                <button type="button" class="btn btn-link p-0 mx-3" id="btn_card_detail_change"><u>Change</u></button>
                <button type="button" class="btn btn-link p-0 mx-3" id="btn_card_detail_add"><u>Add</u></button>
            </div>
            <div class="row">
                <div class="col-sm-auto mb-3">
                    <input type="password" class="form-control input-white" id="password" placeholder="Password">
                </div>
                <div class="col-sm-auto mb-3">
                    <input type="password" class="form-control input-white" id="password" placeholder="Password">
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-6 text-left">
            <button type="button" class="btn btn-primary prev-tab">Prev</button>
        </div>
        <div class="col-6 text-right">
            <button type="button" class="btn btn-primary skip-tab">Skip</button>
            <button type="button" class="btn btn-primary next-tab">Next</button>
        </div>
    </div>
</div>
</div>
<div class="row mt-3">
<div class="col-6 text-left">
    <button type="button" class="btn btn-primary prev-tab" id="step3_prev">Prev</button>
</div>
<div class="col-6 text-right">
    <button type="button" class="btn btn-primary skip-tab" id="step3_skip">Skip</button>
    <button type="button" class="btn btn-primary next-tab" id="step3_submit">Next</button>
</div>
</div>
</form>