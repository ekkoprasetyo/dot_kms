<div class="card-body p-0">
    <ul class="nav nav-pills flex-column">
        @if(count($chats) > 0)
            @foreach($chats as $chat)
                @if(UserAuthorization::getUserID() == $chat->id_from)
                    <li class="nav-item">
                        <button type="button" class="btn btn-lg" onclick="loadDirectChat('{{ $chat->id_to }}')" >
                            <i class="far fa-comment text-success"></i>
                            {{ $chat->to }}
                        </button>
                    </li>
                @elseif(UserAuthorization::getUserID() == $chat->id_to)
                    <li class="nav-item">
                        <button type="button" class="btn btn-lg" onclick="loadDirectChat('{{ $chat->id_from }}')" >
                            <i class="far fa-comment text-success"></i>
                            {{ $chat->from }}
                        </button>
                    </li>
                @endif
            @endforeach
         @endif
    </ul>
</div>