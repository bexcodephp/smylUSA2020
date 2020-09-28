<form class="tab-pane fade py-3 step-4 form_cls" id="step_4" role="tabpanel" aria-labelledby="nav-contact-tab">
    <div class="row mt-0 pictures">
        <div class="col-12 align-self-center mb-3">
            <h4 class="sub-title color-blue text-bold">Pictures</h4>
        </div>
        <div class="col-12 mb-3">
            <div class="row">
                <div class="col-auto align-self-center">
                    <h6 class="sub-title-1 color-gray text-bold">Upload Your Smile Pictures</h6>
                </div>
                <div class="col-sm col-auto align-self-center text-right">
                    <button type="button" class="btn btn-primary" onclick="btnUploadNewPic()">Upload New</button>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row row-cols-1 row-cols-md-3">
                @foreach($teethImages as $image)
                <div class="col mb-4">
                    <div class="card h-100 card-2">
                        <img class="card-img-top" src="{{ asset('storage/'.$image->image) }}" />
                        <div class="card-body">
                            <p class="card-text">{{$image->description}}</p>
                        </div>
                        <div class="card-footer p-0">
                            <button type="button" class="btn btn-link btn-edit" onclick="btnEditSmilePic('{{ $image->image }}','{{$image->customer_image_id}}','{{$image->description}}')">Edit</button>
                            <input type="hidden" name="" id="customer_image" value="{{$image->customer_image_id}}" hidden>
                            <button type="button" onclick="deleteSmilePictures('{{$image->customer_image_id}}')" data-token="{{ csrf_token() }}" class="btn btn-link btn-delete">Delete</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- bite pictures --}}
    <!--  <div class="row mt-0 bite-pictures">
        <div class="col-12 align-self-center mb-3">
            <h4 class="sub-title color-blue text-bold">Bite Pictures</h4>
        </div>
        <div class="col-12 mb-3">
            <div class="row">
                <div class="col-auto align-self-center">
                    <h6 class="sub-title-1 color-gray text-bold">Upload Your Bite Pictures</h6>
                </div>
                <div class="col-sm col-auto align-self-center text-right">
                    <button type="button" class="btn btn-primary" onclick="btnUploadBitePic()">Upload New</button>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row row-cols-1 row-cols-md-3">
                <div class="col mb-4">
                    <div class="card h-100 card-2">
                        <img class="card-img-top" src="{{ asset('images/products/steps_image_5.png') }}" />
                        <div class="card-body">
                            <p class="card-text">Image Description will be here Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et tur. Excepteur sint</p>
                        </div>
                        <div class="card-footer p-0">
                            <button type="button" class="btn btn-link btn-edit" onclick="btnEditBitePic()">Edit</button>
                            <button type="button" class="btn btn-link btn-delete">Delete</button>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card h-100 card-2">
                        <img class="card-img-top" src="{{ asset('images/products/steps_image_6.png') }}" />
                        <div class="card-body">
                            <p class="card-text">Image not have Description</p>
                        </div>
                        <div class="card-footer p-0">
                            <button type="button" class="btn btn-link btn-edit">Edit</button>
                            <button type="button" class="btn btn-link btn-delete">Delete</button>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card h-100 card-2">
                        <img class="card-img-top" src="{{ asset('images/products/image_4_home_page_before_footer.jpg') }}" />
                        <div class="card-body">
                            <p class="card-text">Image not have Description</p>
                        </div>
                        <div class="card-footer p-0">
                            <button type="button" class="btn btn-link btn-edit">Edit</button>
                            <button type="button" class="btn btn-link btn-delete">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <div class="row">
        <div class="col-6 text-left">
            <button type="button" class="btn btn-primary prev-tab" id="step4_prev">Prev</button>
        </div>
        <div class="col-6 text-right">
            <button type="button" class="btn btn-primary skip-tab" id="step4_skip">Skip</button>
            <button type="button" class="btn btn-primary next-tab" id="step4_submit">Next</button>
        </div>
    </div>
</form>