<form class="tab-pane fade py-3 step-5 form_cls" id="step_5" role="tabpanel" aria-labelledby="nav-contact-tab">
    <div class="row mt-0 pictures">
        <div class="col-12 align-self-center mb-3">
            <h4 class="sub-title color-blue text-bold">STL Files</h4>
        </div>
        <div class="col-12 mb-3">
            <div class="row">
                <div class="col-auto align-self-center">
                    <h6 class="sub-title-1 color-gray text-bold">Your STL Files</h6>
                </div>
                <!-- <div class="col-sm col-auto align-self-center text-right">
                    <button type="button" class="btn btn-primary"  onclick="btnUploadStl()">Upload New</button>
                </div> -->
            </div>
        </div>
        <div class="col-12">
            <div class="row row-cols-1 row-cols-md-2">
                <div class="col mb-4">
                    <div class="card h-100 card-2">
                        <img class="card-img-top" src="{{ asset('images/products/stl_1.png') }}" onclick="btnEditLtsPic()"/>
                        <div class="card-body">
                            <p class="card-text">Image Description will be here Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et tur. Excepteur sint</p>
                        </div>
                        <!-- <div class="card-footer p-0 justify-content-center">
                            <button type="button" class="btn btn-link btn-edit" onclick="btnEditLtsPic()">Edit</button>
                            <button type="button" class="btn btn-link btn-delete">Delete</button>
                        </div> -->
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card h-100 card-2">
                        <img class="card-img-top" src="{{ asset('images/products/stl_2.png') }}" />
                        <div class="card-body">
                            <p class="card-text">Image not have Description</p>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card h-100 card-2">
                        <img class="card-img-top" src="{{ asset('images/products/stl_3.png') }}" />
                        <div class="card-body">
                            <p class="card-text">Image not have Description</p>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card h-100 card-2">
                        <img class="card-img-top" src="{{ asset('images/products/stl_4.png') }}" />
                        <div class="card-body">
                            <p class="card-text">Image not have Description</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6 text-left">
            <button type="button" class="btn btn-primary prev-tab">Prev</button>
        </div>                            
        <div class="col-6 text-right">
            <button type="button" class="btn btn-primary next-finish">Finish</button>
        </div>
    </div>
</form>