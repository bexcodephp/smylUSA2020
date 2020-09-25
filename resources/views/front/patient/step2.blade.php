<form class="tab-pane fade py-3 step-2 form_cls" id="step_2" role="tabpanel" aria-labelledby="nav-profile-tab">
    @csrf
    <div class="row mt-0">
        <div class="col-12 mb-2">
            <h4 class="sub-title color-blue text-bold">Medical History Form</h4>
            <h4 class="sub-title my-3"><small class="color-gray text-bold">Please fill out this form</small></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-md-6 mh-caption">
                    <p>I have Had a Bone Marrow transplant or treatment of hematological maligancies (blood cancers):</p>
                </div>
                <div class="col-md-6 select-facility select-option mb-3">
                    {{--
                        NOTE: please refer the following site for development -
                        https://developer.snapappointments.com/bootstrap-select/examples/#customize-menu
                    --}}
                    {{-- add "multiple" attribute for multi-selection --}}
                    <select id="ans1" name="ans1" class="selectpicker form-control show-tick" data-actions-box="true" data-style="btn-outline-primary" title="Select Option">
                        <option value="yes" {{ (isset($answers->question1) && $answers->question1 == 'yes') ? 'selected' : '' }}>Yes</option>
                        <option value="no" {{ (isset($answers->question1) && $answers->question1 == 'no') ? 'selected' : '' }}>No</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mh-caption">
                    <p>I have a branded                                                                   retainer:</p>
                </div>
                <div class="col-md-6 select-facility select-option mb-3">
                    <select id="ans2" name="ans2" class="selectpicker form-control show-tick" data-actions-box="true" data-style="btn-outline-primary" title="Select Option">
                        <option value="yes" {{ (isset($answers->question2) && $answers->question2 == 'yes') ? 'selected' : '' }}>Yes</option>
                        <option value="no" {{ (isset($answers->question2) && $answers->question2 == 'no') ? 'selected' : '' }}>No</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mh-caption">
                    <p>I have crowns:</p>
                </div>
                <div class="col-md-6 select-facility select-option mb-3">
                        {{-- add "multiple" attribute for multi-selection --}}
                    <select id="ans3" name="ans3" class="selectpicker form-control show-tick" data-actions-box="true" data-style="btn-outline-primary" title="Select Option">
                        <option value="yes" {{ (isset($answers->question3) && $answers->question3 == 'yes') ? 'selected' : '' }}>Yes</option>
                        <option value="no" {{ (isset($answers->question3) && $answers->question3 == 'no') ? 'selected' : '' }}>No</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mh-caption">
                    <p>I have primary (baby) teeth:</p>
                </div>
                <div class="col-md-6 select-facility select-option mb-3">
                        <select id="ans4" name="ans4" class="selectpicker form-control show-tick" data-actions-box="true" data-style="btn-outline-primary" title="Select Option">
                        <option value="yes" {{ (isset($answers->question4) && $answers->question4 == 'yes') ? 'selected' : '' }}>Yes</option>
                        <option value="no" {{ (isset($answers->question4) && $answers->question4 == 'no') ? 'selected' : '' }}>No</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mh-caption">
                    <p>I have bridgework:</p>
                </div>
                <div class="col-md-6 select-facility select-option mb-3">
                <select id="ans5" name="ans5" class="selectpicker form-control show-tick" data-actions-box="true" data-style="btn-outline-primary" title="Select Option">
                        <option value="yes" {{ (isset($answers->question5) && $answers->question5 == 'yes') ? 'selected' : '' }}>Yes</option>
                        <option value="no" {{ (isset($answers->question5) && $answers->question5 == 'no') ? 'selected' : '' }}>No</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mh-caption">
                    <p>I have Had a Bone Marrow transplant or treatment of hematological maligancies (blood cancers):</p>
                </div>
                <div class="col-md-6 select-facility select-option mb-3">
                    <select id="ans6" name="ans6" class="selectpicker form-control show-tick" data-actions-box="true" data-style="btn-outline-primary" title="Select Option">
                        <option value="yes" {{ (isset($answers->question6) && $answers->question6 == 'yes') ? 'selected' : '' }}>Yes</option>
                        <option value="no" {{ (isset($answers->question6) && $answers->question6 == 'no') ? 'selected' : '' }}>No</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mh-caption">
                    <p>I have an impacted tooth:</p>
                </div>
                <div class="col-md-6 select-facility select-option mb-3">
                    <select id="ans7" name="ans7" class="selectpicker form-control show-tick" data-actions-box="true" data-style="btn-outline-primary" title="Select Option">
                        <option value="yes" {{ (isset($answers->question7) && $answers->question7 == 'yes') ? 'selected' : '' }}>Yes</option>
                        <option value="no" {{ (isset($answers->question7) && $answers->question7 == 'no') ? 'selected' : '' }}>No</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mh-caption">
                    <p>I have an implant:</p>
                </div>
                <div class="col-md-6 select-facility select-option mb-3">
                    <select id="ans8" name="ans8" class="selectpicker form-control show-tick" data-actions-box="true" data-style="btn-outline-primary" title="Select Option">
                        <option value="yes" {{ (isset($answers->question8) && $answers->question8 == 'yes') ? 'selected' : '' }}>Yes</option>
                        <option value="no" {{ (isset($answers->question8) && $answers->question8 == 'no') ? 'selected' : '' }}>No</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mh-caption">
                    <p>I have eneers:</p>
                </div>
                <div class="col-md-6 select-facility select-option mb-3">
                    <select id="ans9" name="ans9" class="selectpicker form-control show-tick" data-actions-box="true" data-style="btn-outline-primary" title="Select Option">
                        <option value="yes" {{ (isset($answers->question9) && $answers->question9 == 'yes') ? 'selected' : '' }}>Yes</option>
                        <option value="no" {{ (isset($answers->question9) && $answers->question9 == 'no') ? 'selected' : '' }}>No</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mh-caption">
                    <p>I have a recent radiograph of my teeth:</p>
                </div>
                <div class="col-md-6 select-facility select-option mb-3">
                    <select id="ans10" name="ans10" class="selectpicker form-control show-tick" data-actions-box="true" data-style="btn-outline-primary" title="Select Option">
                        <option value="yes" {{ (isset($answers->question10) && $answers->question10 == 'yes') ? 'selected' : '' }}>Yes</option>
                        <option value="no" {{ (isset($answers->question10) && $answers->question10 == 'no') ? 'selected' : '' }}>No</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mh-caption">
                    <p>Do you feel pain in any of your teeth?</p>
                </div>
                <div class="col-md-6 select-facility select-option mb-3">
                    <select id="ans11" name="ans11" class="selectpicker form-control show-tick" data-actions-box="true" data-style="btn-outline-primary" title="Select Option">
                        <option value="yes" {{ (isset($answers->question11) && $answers->question11 == 'yes') ? 'selected' : '' }}>Yes</option>
                        <option value="no" {{ (isset($answers->question11) && $answers->question11 == 'no') ? 'selected' : '' }}>No</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mh-caption">
                    <p>Do you have any sores or lumps in or near your mouth?</p>
                </div>
                <div class="col-md-6 select-facility select-option mb-3">
                    <select id="ans12" name="ans12" class="selectpicker form-control show-tick" data-actions-box="true" data-style="btn-outline-primary" title="Select Option">
                        <option value="yes" {{ (isset($answers->question12) && $answers->question12 == 'yes') ? 'selected' : '' }}>Yes</option>
                        <option value="no" {{ (isset($answers->question12) && $answers->question12 == 'no') ? 'selected' : '' }}>No</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mh-caption">
                    <p>Do you currently have any head, neck or jaw injuries?</p>
                </div>
                <div class="col-md-6 select-facility select-option mb-3">
                    <select id="ans13" name="ans13" class="selectpicker form-control show-tick" data-actions-box="true" data-style="btn-outline-primary" title="Select Option">
                        <option value="yes" {{ (isset($answers->question13) && $answers->question13 == 'yes') ? 'selected' : '' }}>Yes</option>
                        <option value="no" {{ (isset($answers->question13) && $answers->question13 == 'no') ? 'selected' : '' }}>No</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mh-caption">
                    <p>Do you currently experience: jaw clicking, pain, difficulty opening and /or closing or difficulty chewing?</p>
                </div>
                <div class="col-md-6 select-facility select-option mb-3">
                    <select id="ans14" name="ans14" class="selectpicker form-control show-tick" data-actions-box="true" data-style="btn-outline-primary" title="Select Option">
                        <option value="yes" {{ (isset($answers->question14) && $answers->question14 == 'yes') ? 'selected' : '' }}>Yes</option>
                        <option value="no" {{ (isset($answers->question14) && $answers->question14 == 'no') ? 'selected' : '' }}>No</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mh-caption">
                    <p>Have you noticed any loosening of your teeth or do you have untreated periodontal disease?</p>
                </div>
                <div class="col-md-6 select-facility select-option mb-3">
                    <select id="ans15" name="ans15" class="selectpicker form-control show-tick" data-actions-box="true" data-style="btn-outline-primary" title="Select Option">
                        <option value="yes" {{ (isset($answers->question15) && $answers->question15 == 'yes') ? 'selected' : '' }}>Yes</option>
                        <option value="no" {{ (isset($answers->question15) && $answers->question15 == 'no') ? 'selected' : '' }}>No</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mh-caption">
                    <p>Do you have any known allergies to any dental materials?</p>
                </div>
                <div class="col-md-6 select-facility select-option mb-3">
                    <select id="ans16" name="ans16" class="selectpicker form-control show-tick" data-actions-box="true" data-style="btn-outline-primary" title="Select Option">
                        <option value="yes" {{ (isset($answers->question16) && $answers->question16 == 'yes') ? 'selected' : '' }}>Yes</option>
                        <option value="no" {{ (isset($answers->question16) && $answers->question16 == 'no') ? 'selected' : '' }}>No</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mh-caption">
                    <p>I have a history of IV bisphosphonate treatment:</p>
                </div>
                <div class="col-md-6 select-facility select-option mb-3">
                    <select id="ans17" name="ans17" class="selectpicker form-control show-tick" data-actions-box="true" data-style="btn-outline-primary" title="Select Option">
                        <option value="yes" {{ (isset($answers->question17) && $answers->question17 == 'yes') ? 'selected' : '' }}>Yes</option>
                        <option value="no" {{ (isset($answers->question17) && $answers->question17 == 'no') ? 'selected' : '' }}>No</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mh-caption">
                    <p>I am currently on acute corticosteroids or in immunosuppression,chemotherapy, or radiation:</p>
                </div>
                <div class="col-md-6 select-facility select-option mb-3">
                    <select id="ans18" name="ans18" class="selectpicker form-control show-tick" data-actions-box="true" data-style="btn-outline-primary" title="Select Option">
                        <option value="yes" {{ (isset($answers->question18) && $answers->question18 == 'yes') ? 'selected' : '' }}>Yes</option>
                        <option value="no" {{ (isset($answers->question18) && $answers->question18 == 'no') ? 'selected' : '' }}>No</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mh-caption">
                    <p>Chief Complaint:</p>
                </div>
                <div class="col-md-6 select-facility select-option mb-3">
                    <select id="ans19" name="ans19" class="selectpicker form-control show-tick" data-actions-box="true" data-style="btn-outline-primary" title="Select Option">
                        <option value="yes" {{ (isset($answers->question19) && $answers->question19 == 'yes') ? 'selected' : '' }}>Yes</option>
                        <option value="no" {{ (isset($answers->question19) && $answers->question19 == 'no') ? 'selected' : '' }}>No</option>
                    </select>
                </div>
            </div>

        </div>
    </div>
    <div class="row mt-3">
        <div class="col-6 text-left">
            <button type="button" class="btn btn-primary prev-tab" id="step2_prev">Prev</button>
        </div>
        <div class="col-6 text-right">
            <button type="button" class="btn btn-primary skip-tab" id="step2_skip">Skip</button>
            <button type="button" class="btn btn-primary next-tab" id="step2_submit">Next</button>
        </div>
    </div>
</form>
                   