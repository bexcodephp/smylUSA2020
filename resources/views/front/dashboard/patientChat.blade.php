<div class="chat-box p-chatbox col p-0">
    <div class="card">
        <!-- display in web view -->
        <div class="card-header p-0 web-card-header d-lg-block d-none border-0">
            <!-- add class "online OR offline" to button -->
            <button class="btn btn-primary w-100 btn-lg btn-open-chat online" type="button" data-toggle="collapse" data-target="#list_chat" aria-expanded="false" aria-controls="list_chat">
                <span>Patient Name</span><i class="fas fa-circle status-onoff"></i>
            </button>
        </div>
        <div class="card-body collapse" id="list_chat">
            <!-- display in mobile view -->
            <!-- add class "online OR offline" to button -->
            <div class="btn btn-primary w-100 btn-lg btn-open-chat online d-lg-none d-block border-0">
                <span>Patient Name</span><i class="fas fa-circle status-onoff"></i>
            </div>
            <div class="chat-contents">
                <div>
                    <ul class="list-group list-chat scrollbarAll">
                        <li class="list-group-item d-flex text-left flex-column chat-item">
                            <p class="color-blue w-100 m-0 chat-msg">Patient Message</p>
                            <small>Your account has been created</small>
                        </li>
                        <li class="list-group-item d-flex text-left flex-column chat-item">
                            <p class="color-gray w-100 m-0 chat-msg">Patient Message</p>
                            <small>Your account has been created</small>
                        </li>
                        <li class="list-group-item d-flex text-left flex-column chat-item">
                            <p class="color-blue w-100 m-0 chat-msg">Patient Message</p>
                            <small>Your account has been created</small>
                        </li>
                        <li class="list-group-item d-flex text-left flex-column chat-item">
                            <p class="color-gray w-100 m-0 chat-msg">Patient Message</p>
                            <small>Your account has been created</small>
                        </li>
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
</div>
<div class="btn-chat-mobile">
    <button class="btn" type="button"><i class="fas fa-comments-alt" data-toggle="collapse" data-target="#list_chat" aria-expanded="false" aria-controls="list_chat"></i></button>
</div>