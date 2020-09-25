@extends('layouts.front.main')
@push('stylesheets')
<link rel="stylesheet" href="{{ asset('front/css/sidebar.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('front/css/chatbox.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('front/css/patient/patient-picture.css') }}" type="text/css">
@endpush
@section('content')

@include('layouts.front.sidebar-p')
<main class="main-aside patient-picture col-lg col-12 px-lg-5">
    <section class="py-xxl-5 py-4">
        <div class="col-12 mb-4">
            <h3 class="card-title color-blue text-bold">My Pictures</h3>
        </div>
        <div class="col-12">
            <div class="accordion" id="accordion_my_picture">
                <!-- Pictures -->
                <form class="card">
                    <div class="card-header" id="heading_smile_pic">
                        <div class="mb-0 d-sm-flex align-items-center">
                            <h2 class="card-title color-blue text-bold mb-0">Pictures</h2>
                            <div class="ml-sm-auto d-flex mt-md-0 mt-3">
                                <button class="btn btn-primary ml-auto" type="button" onclick="btnUploadNewPic()">Upload New</button>
                                <button class="btn btn-link px-2 ml-md-2 ml-auto btn-collapse" type="button" data-toggle="collapse" data-target="#smile_pic" aria-expanded="true" aria-controls="smile_pic"><i class="fas fa-angle" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                    <div id="smile_pic" class="collapse show" aria-labelledby="heading_smile_pic" data-parent="#accordion_my_picture">
                        <div class="card-body">
                            <div class="row mt-0 pictures">
                                <div class="col-12 mb-3">
                                    <div class="row">
                                        <div class="col-auto align-self-center">
                                            <h6 class="sub-title-1 color-gray text-bold">Upload Your Smile Pictures</h6>
                                        </div>
                                        <!-- <div class="col-sm col-auto align-self-center text-right">
                                            <button type="button" class="btn btn-primary" onclick="btnUploadNewPic()">Upload New</button>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row row-cols-1 row-cols-xl-3 row-cols-md-2">
                                        @foreach($teethImages as $image)
                                            <div class="col mb-4">
                                                <div class="card h-100 card-2 p-0">
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
                        </div>
                    </div>
                </form>
                <!-- Bite Pictures -->
                <form class="card account-info">
                    <div class="card-header" id="heading_bite_pic">
                        <div class="mb-0 d-sm-flex align-items-center">
                            <h2 class="card-title color-blue text-bold mb-0">Bite Pictures</h2>
                            <div class="ml-sm-auto d-flex mt-md-0 mt-3">
                                <button type="button" class="btn btn-primary ml-auto" onclick="btnUploadBitePic()">Upload New</button>
                                <button class="btn btn-link px-2 ml-md-2 ml-auto btn-collapse collapsed" type="button" data-toggle="collapse" data-target="#bite_pic" aria-expanded="false" aria-controls="bite_pic"><i class="fas fa-angle" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                    <div id="bite_pic" class="collapse" aria-labelledby="heading_bite_pic" data-parent="#accordion_my_picture">
                        <div class="card-body">
                            <div class="row mt-3 bite-pictures">
                                <div class="col-12 mb-3">
                                    <div class="row">
                                        <div class="col-auto align-self-center">
                                            <h6 class="sub-title-1 color-gray text-bold">Upload Your Bite Pictures</h6>
                                        </div>
                                        <!-- <div class="col-sm col-auto align-self-center text-right">
                                            <button type="button" class="btn btn-primary" onclick="btnUploadBitePic()">Upload New</button>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row row-cols-1 row-cols-xl-3 row-cols-md-2">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- STL Files -->
                <form class="card account-info">
                    <div class="card-header" id="heading_stl_file">
                        <div class="mb-0 d-sm-flex align-items-center">
                            <h2 class="card-title color-blue text-bold mb-0">STL Files</h2>
                            <div class="ml-sm-auto d-flex mt-md-0 mt-3">
                                <button type="button" class="btn btn-primary ml-auto" onclick="btnUploadStl()">Upload New</button>
                                <button class="btn btn-link px-2 ml-md-2 ml-auto btn-collapse collapsed" type="button" data-toggle="collapse" data-target="#stl_file" aria-expanded="false" aria-controls="stl_file"><i class="fas fa-angle" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                    <div id="stl_file" class="collapse" aria-labelledby="heading_stl_file" data-parent="#accordion_my_picture">
                        <div class="card-body">
                            <div class="row mt-0 pictures">
                                <div class="col-12 mb-3">
                                    <div class="row">
                                        <div class="col-auto align-self-center">
                                            <h6 class="sub-title-1 color-gray text-bold">Your STL Files</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row row-cols-1 row-cols-md-2">
                                        <div class="col mb-4">
                                            <div class="card h-100 card-2">
                                                <img class="card-img-top" src="{{ asset('images/products/stl_1.png') }}" onclick="btnViewLtsPic()" />
                                                <div class="card-body">
                                                    <p class="card-text">Image Description will be here Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et tur. Excepteur sint</p>
                                                </div>
                                                <div class="card-footer p-0 justify-content-center">
                                                    <button type="button" class="btn btn-link btn-edit" onclick="btnEditLtsPic()">Edit</button>
                                                    <button type="button" class="btn btn-link btn-delete">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-4">
                                            <div class="card h-100 card-2">
                                                <img class="card-img-top" src="{{ asset('images/products/stl_2.png') }}" />
                                                <div class="card-body">
                                                    <p class="card-text">Image not have Description</p>
                                                </div>
                                                <div class="card-footer p-0 justify-content-center">
                                                    <button type="button" class="btn btn-link btn-edit" onclick="btnEditLtsPic()">Edit</button>
                                                    <button type="button" class="btn btn-link btn-delete">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-4">
                                            <div class="card h-100 card-2">
                                                <img class="card-img-top" src="{{ asset('images/products/stl_3.png') }}" />
                                                <div class="card-body">
                                                    <p class="card-text">Image not have Description</p>
                                                </div>
                                                <div class="card-footer p-0 justify-content-center">
                                                    <button type="button" class="btn btn-link btn-edit" onclick="btnEditLtsPic()">Edit</button>
                                                    <button type="button" class="btn btn-link btn-delete">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-4">
                                            <div class="card h-100 card-2">
                                                <img class="card-img-top" src="{{ asset('images/products/stl_4.png') }}" />
                                                <div class="card-body">
                                                    <p class="card-text">Image not have Description</p>
                                                </div>
                                                <div class="card-footer p-0 justify-content-center">
                                                    <button type="button" class="btn btn-link btn-edit" onclick="btnEditLtsPic()">Edit</button>
                                                    <button type="button" class="btn btn-link btn-delete">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
@include('front.dashboard.patientChat')
{{-- ADD/EDIT New SMILE/BITE picture modal  --}}
<div class="modal fade upload-new-pic-modal pic-modal" id="upload_new_pic_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <form class="row justify-content-center" action="{{ route('user.updateTeethImages') }}" method="POST" role="form" id="smilepictures" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12 align-self-center mb-3 text-center">
                        <input type="hidden" name="doc_id_name" id="doc_id_hid">
                        <h4 class="sub-title-1 color-blue text-bold" id="title_add_smile">Add New Smile Picture</h4>
                        <h4 class="sub-title-1 color-blue text-bold" id="title_edit_smile">Edit New Smile Picture</h4>
                        <h4 class="sub-title-1 color-blue text-bold hidden" id="title_add_bite">Add New Bite Picture</h4>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="card h-100 card-2 mx-auto">
                            <img class="card-img-top mx-auto" id="doc_src" />
                            <div class="card-body p-0">
                                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" id="input_upload_pictures_name" />
                            </div>
                            <div class="col-auto">
                                <div class="custom-file browse-file-btn">
                                    <input type="file" class="custom-file-input" name="image" id="teethpic">
                                    <label class="custom-file-label" for="input_upload_pictures" aria-describedby="upload_pictures"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary" id="upload_pictures" name="submit" value="submit">Upload New Image</button>
                        <button type="submit" class="btn btn-primary" id="edit_pictures" name="save" value ="save">Update Image</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- Upload New STL File picture modal  --}}
<div class="modal fade upload-new-stl-pic-modal pic-modal" id="upload_new_stl_pic_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <form class="row justify-content-center">
                    <div class="col-12 align-self-center mb-3 text-center">
                        <h4 class="sub-title-1 color-blue text-bold" id="title_add_stl">Add New STL File</h4>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="card h-100 card-2 mx-auto">
                            <img class="card-img-top mx-auto" src="{{ asset('images/products/steps_image_5.png') }}" />
                            <div class="card-body p-0">
                                <textarea class="form-control" name="" id="" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" id="input_upload_pictures_name" />
                            </div>
                            <div class="col-auto">
                                <div class="custom-file browse-file-btn">
                                    <input type="file" class="custom-file-input" id="input_upload_pictures">
                                    <label class="custom-file-label" for="input_upload_pictures" aria-describedby="upload_pictures"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <button type="button" class="btn btn-primary btn-edit" id="upload_stl_pictures">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- View picture modal  --}}
<div class="modal fade view-pic-modal" id="view_pic_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12 align-self-center mb-3 text-center">
                        <h4 class="sub-title-1 color-blue text-bold" id="title_add_stl">View Picture</h4>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="card h-100 card-2 mx-auto">
                            <img class="card-img-top mx-auto" src="{{ asset('images/products/steps_image_5.png') }}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('front/js/sidebar.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/sweetalert2.all.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {


    });
    // UPLOAD new smile pic modal
    function btnUploadNewPic() {
        $('#title_add_bite').hide();
        $('#upload_new_pic_modal').modal('show');
        $('#upload_new_pic_modal').on('shown.bs.modal', function (e) {
            $('#title_add_smile').show();
            $('#title_edit_smile').hide();
            $('#title_add_bite').hide();
            $('#upload_pictures').show();
            $('#edit_pictures').hide();
            // $('#doc_src').attr();
            $('#doc_src').hide();
        });
    }

    // EDIT smile pic modal
    function btnEditSmilePic(doc_name,doc_id,description){
        $('#doc_id_hid').val(doc_id);
        $('#title_add_bite').hide();
        $('#upload_new_pic_modal').modal('show');
        $('#upload_new_pic_modal').on('shown.bs.modal', function (e) {
            $('#title_edit_smile').show();
            $('#upload_pictures').hide();
            $('#edit_pictures').show();
            $('#title_add_smile').hide();
            $('#title_add_bite').hide();
            $("#doc_src").show();
            $('#doc_src').attr('src', window.location.origin+'/storage/'+doc_name);
            $('#description').val(description);
        });
    }
    // Upload new Bite pic modal
    function btnUploadBitePic() {
        $('#title_add_smile').hide();
        $('#title_edit_smile').hide();
        $('#upload_new_pic_modal').modal('show');
        $('#upload_new_pic_modal').on('shown.bs.modal', function(e) {
            $('#title_add_bite').show();
            $('#title_add_smile').hide();
        });
    }
    // EDIT Bite pic modal
    function btnEditBitePic() {
        $('#title_add_smile').hide();
        $('#title_edit_smile').hide();

        $('#upload_new_pic_modal').modal('show');
        $('#upload_new_pic_modal').on('shown.bs.modal', function(e) {
            $('#title_add_bite').show();
            $('#title_edit_smile').hide();
            $('#title_add_smile').hide();
        });
    }
    // Upload new STL pic modal
    function btnUploadStl() {
        $('#upload_new_stl_pic_modal').modal('show');
    }
    // EDIT STL pic modal
    function btnEditLtsPic() {
        $('#upload_new_stl_pic_modal').modal('show');
    }
    // View STL pic modal
    function btnViewLtsPic() {
        $('#view_pic_modal').modal('show');
    }

    function deleteSmilePictures(opId){
            _opId = opId;
            const swalWithBootstrapButtons = swal.mixin({
            confirmButtonClass: 'btn btn-info',
            cancelButtonClass: 'btn btn-info',
            buttonsStyling: true,
        })
    
        swalWithBootstrapButtons({
            title: '',
            text: "Are you sure you want to Delete this smile pictures?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            reverseButtons: false
        }).then((result) => {
            if (result.value) {
                var date = moment();
                var newDate = date.format("YYYY-MM-DD hh:mm:ss");
                console.log(newDate);
                $.ajax({
                    url: 'profile/delete-teeth-images/'+_opId,
                    type: 'get',
                    success: function(data){
                      location.reload();
                        // console.log(data);
                    }
                });
            }
            else if(result.dismiss === swal.DismissReason.cancel)
                {
                
                }
            })
        }
</script>
@endpush