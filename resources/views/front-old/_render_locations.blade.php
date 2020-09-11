<div id="accordionDefault" class="accordion accordion-primary accordion-default" role="tablist">
    <div class="card">
        
        <div class="card-header accordion-header" role="tab" id="accordionDefault_{{ $state }}">

            <h5 class="mb-0">

                <a href="#" data-toggle="collapse" data-target="#accordionDefaultCollapse_{{ $state }}"
                    aria-expanded="true" aria-controls="accordionDefaultCollapse_{{ $state }}">{{ $state }}</a>

            </h5>
        </div>
        <div id="accordionDefaultCollapse_{{ $state }}" role="tabpanel"
            aria-labelledby="accordionDefault_{{ $state }}" data-parent="#accordionDefault">
            <div class='row'>
                @foreach($facilities as $location)
                <div class="col-sm-6">
                    <div class="card-body p-5">

                        <h4 class="font-weight-bold mb-3">{{ $location->name }}</h4>
                        <p class="mb-0">Address:
                            {{ $location->address . ", " . $location->city . ", " . $location->zipcode }}</p>
                        <a href="{{ route('locations', $location->facility_id) }}"  class="btn btn-primary btn-sm">Book
                            Now</a>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>

</div>