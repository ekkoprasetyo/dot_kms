<!-- DIRECT CHAT -->
<div class="card direct-chat direct-chat-success">
    <div class="card-header">
        <h3 class="card-title">Direct Chat</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <!-- Conversations are loaded here -->
        <div class="direct-chat-messages">
            @if(count($direct_chat) > 0)
                @foreach($direct_chat as $dc)
                    @if($dc->c_chat_from == UserAuthorization::getUserID())
                        <!-- Message. Default to the left -->
                        <div class="direct-chat-msg">
                            <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-left">{{ $dc->from }}</span>
                                <span class="direct-chat-timestamp float-right">{{ date("d M Y H:i:s", strtotime($dc->c_chat_datetime)) }}</span>
                            </div>
                            <!-- /.direct-chat-infos -->
                            <img class="direct-chat-img" src="{{ URL::asset('theme/adminlte305/dist/img/avatar.png') }}" alt="message user image">
                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                                {{ $dc->c_chat_chat }}
                            </div>
                            <!-- /.direct-chat-text -->
                        </div>
                        <!-- /.direct-chat-msg -->
                    @else
                        <!-- Message to the right -->
                        <div class="direct-chat-msg right">
                            <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-right">{{ $dc->from }}</span>
                                <span class="direct-chat-timestamp float-left">{{ date("d M Y H:i:s", strtotime($dc->c_chat_datetime)) }}</span>
                            </div>
                            <!-- /.direct-chat-infos -->
                            <img class="direct-chat-img" src="{{ URL::asset('theme/adminlte305/dist/img/avatar2.png') }}" alt="message user image">
                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                                {{ $dc->c_chat_chat }}
                            </div>
                            <!-- /.direct-chat-text -->
                        </div>
                        <!-- /.direct-chat-msg -->
                    @endif
                @endforeach
            @endif
            <div id="chat-down"></div>
        </div>
        <!--/.direct-chat-messages-->
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        @csrf
        <input type="text" name="txt_chat_to" value="{{ $to }}" hidden>
        <div class="input-group">
            <input type="text" name="txt_chat_chat" placeholder="Type Message ..." class="form-control">
            <span class="input-group-append">
              <button id="btn-submit-direct-chat" class="btn btn-primary">Send</button>
            </span>
        </div>
    </div>
    <!-- /.card-footer-->
</div>
<!--/.direct-chat -->
<script type="text/javascript">
    document.getElementById('chat-down').scrollIntoView();
</script>