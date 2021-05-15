<div class="card card-custom" style="height: 800px;">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="col-lg-3">
            <h1 class="m-0 mt-2"><b>All messages</b></h1>
        </div>
        <div class="col-lg-9">
            <div class="field">
                <input type="search" class="field-input allInputs" placeholder="Search By name" name="title"
                    wire:model.debounce.500ms="searchUSer">
            </div>
        </div>
    </div>
    <div class="card-body scrollMin">
        <div class="mt-4 px-6 h-auto">
            @foreach ($userSendMsg as $user)
                @if (in_array($user->id, $usersSend))
                    <a href="{{ route("dashboard.messageViewOne",["idSender"=>$user->id,$user->username]) }}" class="d-flex align-items-center justify-content-between mb-5 boxUser">
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-circle symbol-50 mr-3">
                                <img alt="Pic" style="border: 3px solid #ae3e60;" src="{{ asset('storage/' . $user->profil) }}">
                            </div>
                            <div class="d-flex flex-column">
                                <div class="text-dark-75 text-hover-primary font-weight-bold font-size-lg" style="font-weight: bold !important;">
                                    {{ $user->firstName ? $user->firstName . '' . $user->lastName : $user->username }}
                                </div>
                                @foreach ($user->messages()->orderBy('id',"desc")->skip(0)->take(1)->get() as $item)
                                    <span class="text-muted font-weight-bold font-size-sm">{{ $item->message }}</span>
                                @endforeach
                            </div>
                        </div>
                        @if ($user->messages->where('read',1)->count())
                        <div class="d-flex flex-column align-items-end">
                            <span class="label label-sm label-danger">{{ $user->messages->where('read',1)->count() }}</span>
                        </div>
                        @endif
                    </a>
                @endif
            @endforeach
        </div>
    </div>
</div>
