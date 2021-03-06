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
            <input type="password" class="form-control input-white" id="password" placeholder="********">
        </div>
        <div class="col-12 form-group">
            <div class="col p-0">
                <label class="mr-3">Card Details</label>
                <button type="button" class="btn btn-link p-0 mx-3" id="btn_card_detail_change"><u>Change</u></button>
                <button type="button" class="btn btn-link p-0 mx-3" id="btn_card_detail_add"><u>Add</u></button>
            </div>
            <!-- add hidden class for show or hide -->
            <div class="row">
                <div class="col-sm-auto mb-3">
                    <?php
                        $cardnumber = $customer->card_last_four;
                        if($cardnumber == ""){
                            $cardformat = "";
                        }else {
                            $cardformat = 'XXXX XXXX XXXX '.substr($cardnumber, -4);
                       }
                    ?>
                    <input type="text" class="form-control input-white" id="card_number" placeholder="Card Number" value="{{$cardformat }}">
                </div>
            </div>
            <!-- add hidden class for show or hide -->
            <div class="row" id="bank_card_details">
                <div class="col-auto bank-card-details mt-3">
                    <div class="card px-0 py-3">
                        <div class="col-12 acc-card-chip">
                            <img src="{{ asset('images/icons/chip.png') }}" class="mb-2" width="30" />
                        </div>
                        <div class="col-12 acc-card-number">
                            <label class="text-bold">XXXX XXXX XXXX <span>3456</span></label>
                        </div>
                        <div class="col-12 acc-card-valid">
                            <label class="text-uppercase">Valid Thru&nbsp;<span class="text-bold">01</span>&nbsp;/&nbsp;<span class="text-bold">80</span></label>
                        </div>
                        <div class="col-12 acc-card-name">
                            <label class="text-bold">Name Surname</label><img src="{{ asset('images/icons/card_elipse.png') }}" width="37" class="float-right" />
                        </div>
                    </div>
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
                <form role="form" id="step_3_card">
                    @csrf
                    <div class="row">
                        <div class="col-auto align-self-center">
                            <h4 class="text-bold color-blue">Change Card Details</h4>
                        </div>
                        <div class="col align-self-center text-right">
                            <button type="button" class="btn btn-primary" id="update_card">Update</button>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label class="text-bold">Name On Card</label>
                                    <input type="text" class="form-control input-white" name="name_on_card" id="name_on_card" placeholder="Name On Card" value="{{ $customer ? $customer->name_on_card : null}}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="text-bold">Card Number</label>
                                    <?php

                                    $cardnumber = $customer->card_last_four;
                                    $cardformat = 'XXXX-XXXX-XXXX-' . substr($cardnumber, -4);

                                    ?>
                                    <input type="text" class="form-control input-white" name="card_last_four" id="card_last_four" placeholder="Card Number" value="{{ $cardformat}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <label class="text-bold">Expiry</label>
                                </div>
                                <div class="col-md-6 form-group">

                                    <!--  <input class="form-control input-white" id="inputExpDate" placeholder="MM / YY" maxlength='7'> -->
                                    <select name="expiryMonth" id="expiryMonth" class="demoSelectBox">
                                        <?php
                                        for ($i = date("m"); $i <= 12; $i++) {
                                            $monthValue = $i;
                                            if (strlen($i) < 2) {
                                                $monthValue = "0" . $monthValue;
                                            }
                                        ?>
                                            <option value="<?php echo $monthValue; ?>"><?php echo $i; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select> <select name="expiryMonth" id="expiryMonth" class="demoSelectBox">
                                        <?php
                                        for ($i = date("Y"); $i <= 2030; $i++) {
                                            $yearValue = substr($i, 2);
                                        ?>
                                            <option value="<?php echo $yearValue; ?>"><?php echo $i; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>

                                   <!--  <input class="form-control input-white" id="inputExpDate" placeholder="MM / YY" maxlength='7'> -->

                                   <input class="form-control input-white" maxlength='5' id="inputExpDate" name="inputExpDate" placeholder="MM/YY" type="text" value="{{ $customer->card_expiry}}" onkeyup="formatString(event);" >

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
                                    <input type="text" class="form-control input-white" id="cvv" name="cvv" placeholder="Enter CVV" maxlength='4'>
                                </div>
                                <div class="col-sm col-auto form-group">
                                    <img src="{{ asset('images/icons/icon_cvv.png') }}" class="icon-cvv" />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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
                <form role="form" id="step_3_card_add">
                    @csrf
                    <div class="row">
                        <div class="col-auto align-self-center">
                            <h4 class="text-bold color-blue">Add New Card</h4>
                        </div>
                        <div class="col align-self-center text-right">
                            <button type="button" class="btn btn-primary" id="add_card">Add</button>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label class="text-bold">Name On Card</label>
                                    <input type="text" class="form-control input-white" name="add_name_on_card" id="add_name_on_card" placeholder="Name On Card" value="{{ $customer ? $customer->name_on_card : null}}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="text-bold">Card Number</label>
                                    <?php

                                    $cardnumber = $customer->card_last_four;
                                    if ($cardnumber == "") {
                                        $cardformat = "";
                                    } else {
                                        $cardformat = 'XXXX-XXXX-XXXX-' . substr($cardnumber, -4);
                                    }
                                    ?>
                                    <input type="text" class="form-control input-white" name="add_card_last_four" id="add_card_last_four" placeholder="Card Number" value="{{ $cardformat}}">

                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <label class="text-bold">Expiry</label>
                                </div>
                                <div class="col-md-6 form-group">

                                    <!--  <input class="form-control input-white" id="inputExpDate" placeholder="MM / YY" maxlength='7'> -->
                                    <select name="add_expiryMonth" id="add_expiryMonth" class="demoSelectBox">
                                        <?php
                                        for ($i = date("m"); $i <= 12; $i++) {
                                            $monthValue = $i;
                                            if (strlen($i) < 2) {
                                                $monthValue = "0" . $monthValue;
                                            }
                                        ?>
                                            <option value="<?php echo $monthValue; ?>"><?php echo $i; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select> <select name="add_expiryMonth" id="add_expiryMonth" class="demoSelectBox">
                                        <?php
                                        for ($i = date("Y"); $i <= 2030; $i++) {
                                            $yearValue = substr($i, 2);
                                        ?>
                                            <option value="<?php echo $yearValue; ?>"><?php echo $i; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>

                                   <!--  <input class="form-control input-white" id="inputExpDate" placeholder="MM / YY" maxlength='7'> -->

                                    <input class="form-control input-white" maxlength='5' id="inputExpDate" name="inputExpDate" placeholder="MM/YY" type="text" value="{{ $customer->card_expiry}}" onkeyup="formatString(event);" >

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
                                    <input type="text" class="form-control input-white" id="add_cvv" name="add_cvv" placeholder="Enter CVV" maxlength='4'>
                                </div>
                                <div class="col-sm col-auto form-group">
                                    <img src="{{ asset('images/icons/icon_cvv.png') }}" class="icon-cvv" />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>