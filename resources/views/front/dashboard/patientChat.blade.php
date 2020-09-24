<div class="chat-box p-chatbox col p-0">
    <div class="card">
        <div class="card-header p-0">
            <!-- <button class="btn btn-primary w-100 btn-lg btn-open-chat" type="button" id="btn_open_chat"> -->
            <button class="btn btn-primary w-100 btn-lg btn-open-chat online" id="btn_open_chat" type="button" data-toggle="collapse" data-target="#list_chat" aria-expanded="false" aria-controls="list_chat">
                <span>Patient Name</span><i class="fas fa-circle status-onoff"></i>
            </button>
        </div>
        <div class="card-body collapse" id="list_chat">
            <div>
                <ul class="list-group list-chat">
                    <li class="list-group-item d-flex text-left flex-column chat-item">
                        <p class="color-blue w-100 m-0 chat-msg">Patient Message</p>
                        <small>Your account has been created</small>
                    </li>
                    <li class="list-group-item d-flex text-left flex-column chat-item">
                        <p class="color-gray w-100 m-0 chat-msg">Patient Message</p>
                        <small>Your account has been created</small>
                    </li>
                </ul>
            </div>
            <div class="input-group mt-3">
                <input type="text" class="form-control input-gray input-msg" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <button class="input-group-text btn btn-send p-0" type="button"><i class="fa fa-envelope"></i></button>
            </div>
        </div>
    </div>
</div>
<div class="btn-chat-mobile">
    <button class="btn" type="button"><i class="fad fa-comments-alt"></i></button>
</div>