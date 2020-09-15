@extends('layouts.admin.app')
@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/operator/emp.css') }}">
@endpush 
@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="row">
            <div class="col mb-2">
                <label>Name:</label>
                <div class="lbl-input">{{$facility->name}}</div>
            </div>
            <div class="col mb-2">
                <label>Email:</label>
                <div class="lbl-input">{{$facility->email}}</div>
            </div>
            <div class="col mb-2">
                <label>Phone:</label>
                <?php
                    $number = $facility->phone;
                    $formatted_number = preg_replace("/^(\d{3})(\d{3})(\d{4})$/", "+1 ($1) $2 $3", $number);
                ?>
                <div class="lbl-input">{{$formatted_number}}</div>
            </div>
        </div>
        <div class="row">
            <div class="col mb-2">
                <label>Address:</label>
                <div class="lbl-input">{{$facility->address}}</div>
            </div>
            <div class="col mb-2">
                <label>State:</label>
                <div class="lbl-input">{{$facility->state}}</div>
            </div>
            <div class="col mb-2">
                <label>City:</label>
                <div class="lbl-input">{{$facility->city}}</div>
            </div>
            <div class="col mb-2">
                <label>Zipcode:</label>
                <div class="lbl-input">{{$facility->zipcode}}</div>
            </div>
        </div>
        
        <label>Facility Image:</label>
        <div class="licence-wrapper">              
            <a><img src="{{ url('storage/'.$facility->image) }}" width="100"></a>
        </div>
        <label>Status:</label>
        {{ Config::get('constants.STATUS.'.$facility->status) }}
    </section>
    {{-- preview document modal --}}
<div class="modal fade modal-view-docs" id="modal_view_docs" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-uppercase btn_blue" id="exampleModalLabel">Document Preview</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-times" aria-hidden="true"></i>
        </button>
      </div>
      <div class="modal-body" id="docView">            
            <img id="doc_src" class="modal-docs-img">
            <embed id="doc_src1" class="embed-responsive-item modal-docs-pdf" >
      </div>
    </div>
  </div>
</div>
{{-- End preview document modal --}}
    <!-- /.content -->


<script>

    function viewCertificates(doc_name,type) { 

        $('#modal_view_docs').modal('show');

        if(type=='png' || type =='jpeg' || type == 'jpg'){
            $("#doc_src").show();
            $("#doc_src1").hide();
            $('#doc_src').attr('src', window.location.origin+'/storage/app/public/'+doc_name);
        }else{
            $("#doc_src1").show();
            $("#doc_src").hide();
            $('#doc_src1').attr('src', window.location.origin+'/storage/app/public/'+doc_name);
        }
    }

</script>

@endsection
