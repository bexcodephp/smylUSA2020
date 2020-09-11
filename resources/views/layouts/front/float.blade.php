{{--  floating button  --}}
<div class="floatnav position-fixed h-100">
            <a href="{{ url('/candidate') }}" id="amicandidate" class="amicandidate">
                <img src="{{ asset("images/icons/am_i_candidate.png") }}" />
                am i candidate?
            </a>
            <a href="#" id="amiuser" class="amiuser" style="display: none;">
                <img src="{{ asset("images/icons/am_i_user.png") }}" />
                doctor
            </a>
        </div>
