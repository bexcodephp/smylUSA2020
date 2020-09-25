<form class="tab-pane fade py-3 step-3 form_cls" id="step_3" role="tabpanel" aria-labelledby="nav-contact-tab">
    <div class="row mt-0">
        <div class="col-12 mb-2">
            <h4 class="sub-title color-blue text-bold">Account Information</h4>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6 form-group">
            <label>Email</label>
            <input type="text" class="form-control input-white" id="name_email" placeholder="Name" value="{{ auth()->user()->email }}">
        </div>
        <div class="col-md-6 form-group">
            <div class="col p-0">
                <label>Password</label>
                <button type="button" class="btn btn-link p-0 float-right" id="change_pwd"><u>Change</u></button>
            </div>
            <input type="password" class="form-control input-white" id="password" placeholder="Password" value="{{ auth()->user()->password }}">
        </div>
        <div class="col-12 form-group">
            <div class="col p-0">
                <label class="mr-3">Card Details</label>
                <button type="button" class="btn btn-link p-0 mx-3" id="btn_card_detail_change"><u>Change</u></button>
                <!-- <button type="button" class="btn btn-link p-0 mx-3" id="btn_card_detail_add"><u>Add</u></button> -->
            </div>
            <div class="row">
                <div class="col-sm-auto mb-3">
                    <input type="password" class="form-control input-white" id="password" placeholder="Card Number">
                </div>
               <!--  <div class="col-sm-auto mb-3">
                    <input type="password" class="form-control input-white" id="password" placeholder="Password">
                </div> -->
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
{{-- password change modal  --}}
<div class="modal fade change-pwd-modal" id="change_pwd_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-auto align-self-center">
                        <h4 class="text-bold color-blue">Change Password</h4>
                    </div>
                    <div class="col align-self-center text-right">
                        <button type="button" class="btn btn-primary">Update</button>
                    </div>
                    <div class="col-12 form-group mt-3">
                        <label class="text-bold">Old Password</label>
                        <input type="password" class="form-control input-white" id="old_pwd" placeholder="Old Password">
                    </div>
                    <div class="col-12 form-group">
                        <label class="text-bold">New Password</label>
                        <input type="password" class="form-control input-white" id="new_pwd" placeholder="New Password">
                    </div>
                    <div class="col-12 form-group">
                        <label class="text-bold">Re Enter New Password</label>
                        <input type="password" class="form-control input-white" id="re_new_pwd" placeholder="New Password">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Change Card Details modal  --}}
<div class="modal fade card-detail-change-modal" id="card_detail_change_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-auto align-self-center">
                        <h4 class="text-bold color-blue">Change Card Details</h4>
                    </div>
                    <div class="col align-self-center text-right">
                        <button type="button" class="btn btn-primary">Update</button>
                    </div>
                    <div class="col-12 mt-3">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label class="text-bold">Name On Card</label>
                                <input type="password" class="form-control input-white" id="old_pwd" placeholder="Old Password">
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="text-bold">Card Number</label>
                                <input type="password" class="form-control input-white" id="new_pwd" placeholder="New Password">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <label class="text-bold">Expiry</label>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="month" class="form-control input-white" id="re_new_pwd" placeholder="Month,Year">
                            </div>
                            <!-- <div class="col-md-6 form-group">
                                <input type="password" class="form-control input-white" id="re_new_pwd" placeholder="Year">
                            </div> -->
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <label class="text-bold">CVV</label>
                            </div>
                            <div class="col form-group">
                                <input type="password" class="form-control input-white" id="re_new_pwd" placeholder="New Password">
                            </div>
                            <div class="col-sm col-auto form-group">
                                <img src="{{ asset('images/icons/icon_cvv.png') }}" class="icon-cvv" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Add Card Details modal  --}}
<div class="modal fade card-detail-add-modal" id="card_detail_add_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-auto align-self-center">
                        <h4 class="text-bold color-blue">Add New Card</h4>
                    </div>
                    <div class="col align-self-center text-right">
                        <button type="button" class="btn btn-primary">Add</button>
                    </div>
                    <div class="col-12 mt-3">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label class="text-bold">Name On Card</label>
                                <input type="password" class="form-control input-white" id="old_pwd" placeholder="Old Password">
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="text-bold">Card Number</label>
                                <input type="password" class="form-control input-white" id="new_pwd" placeholder="New Password">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <label class="text-bold">Expiry</label>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="month" class="form-control input-white" id="re_new_pwd" placeholder="Month,Year">
                            </div>
                            <!-- <div class="col-md-6 form-group">
                                <input type="year" class="form-control input-white" id="re_new_pwd" placeholder="Year">
                            </div> -->
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <label class="text-bold">CVV</label>
                            </div>
                            <div class="col form-group">
                                <input type="password" class="form-control input-white" id="re_new_pwd" placeholder="New Password">
                            </div>
                            <div class="col-sm col-auto form-group">
                                <img src="{{ asset('images/icons/icon_cvv.png') }}" class="icon-cvv" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>