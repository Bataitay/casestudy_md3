<div class="container chatms">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                <b><h3>Chat</h3></b>
                </div>
                <div class="card-body chatbox p-0">
                    <div class="form">
                        <i class="fa fa-search"></i>
                        <input type="text" class="form-control form-input" placeholder="Tìm kiếm trên Messager">
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach ($users as $user)
                            @if ($user->id !== auth()->id())
                                @php
                                    $notseen =
                                        App\Models\Messager::where('user_id', $user->id)
                                            ->where('receiver_id', auth()->id())
                                            ->where('is_seen', false)
                                            ->get() ?? null;

                                @endphp
                                <a wire:click="getUser({{ $user->id }})" class="text-dark link">
                                    <li class="list-group-item ">
                                        <img class="img-fluid avatar rounded-circle "
                                            src="https://cdn.24h.com.vn/upload/2-2020/images/2020-06-28/Nhung-chiec-iPhone-thanh-cong-nhat-va-do-te-nhat-cua-Apple-4d5ac78d09f4448802ba41faaef1b162-1593354869-465-width660height660.jpg">
                                        @if ($user->is_online == true)
                                            <i
                                                class="bi bi-circle-fill text-success p-0 online-icon position-absolute bottom-0 start-10 translate-middle border-light"><b>online</b></i>
                                        @else
                                            <b><span
                                                    class=" text-dark p-0 offline-icon position-absolute
                                        bottom-0 start-10 translate-middle badge border-light">{{ $user->created_at->diffForHumans('H') }}</span></b>
                                        @endif
                                        {{ $user->name }}
                                        @if (filled($notseen))
                                            <div class="badge bg-success rounded">
                                                @if ($notseen->count() < 10)
                                                    {{ $notseen->count() }}
                                                @else
                                                    {{ '9+' }}
                                                @endif
                                            </div>
                                        @endif
                                    </li>

                                </a>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                    @if (isset($sender))
                        <img class="img-fluid avatar rounded-circle "
                            src="https://cdn.24h.com.vn/upload/2-2020/images/2020-06-28/Nhung-chiec-iPhone-thanh-cong-nhat-va-do-te-nhat-cua-Apple-4d5ac78d09f4448802ba41faaef1b162-1593354869-465-width660height660.jpg">
                        {{ $sender->name }}
                    @else
                        <img class="img-fluid avatar rounded-circle "
                            src="https://cdn.24h.com.vn/upload/2-2020/images/2020-06-28/Nhung-chiec-iPhone-thanh-cong-nhat-va-do-te-nhat-cua-Apple-4d5ac78d09f4448802ba41faaef1b162-1593354869-465-width660height660.jpg">
                        {{ App\Models\User::first()->name }}
                    @endif

                </div>
                <div class="card-body messager-box" wire:poll="mountdata">
                    @if (filled($allmessagers))
                        @foreach ($allmessagers as $mgs)
                            <div class="single-messager @if ($mgs->user_id == auth()->id()) sent @else received @endif">
                                <p class="font-weight-bolder my-0 ">{{ $mgs->user->name }}</p>
                                {{ $mgs->messager }}
                                <br><small class="text-muted w-100 "><em>{{ $mgs->created_at->Format('h:i') }}</em></small>
                            </div>
                        @endforeach
                    @endif
                </div>
                    <form wire:submit.prevent="SendMessage">
                        <div class="row height d-flex justify-content-center align-items-center">
                            <div class="col-md-12">
                                <div class="form">
                                    <i class="fa fa-search"></i>
                                    <input wire:model="messager" type="text" class="form-control form-input">
                                    <button class="left-pan "><i class="far fa-paper-plane"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
