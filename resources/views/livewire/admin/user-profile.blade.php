<div>
    @push('title')
        {{$title}}
    @endpush
        <x-header title="{{$title}}" icon="fas fa-user"/>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                     src="{{asset('defaultAvatar.png')}}" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{$user->name}}</h3>

                            <p class="text-muted text-center">Administrator</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>ID</b>
                                    <a class="float-right">{{$user->id}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Created at</b>
                                    <a class="float-right">{{($user->created_at)?$user->created_at->format('d F Y'):'No data'}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Updated at</b>
                                    <a class="float-right">{{($user->updated_at)?$user->updated_at->format('d F Y'):'No data'}}</a>
                                </li>
                            </ul>
                            <a class="btn btn-primary btn-block">
                                <i class="fa fa-check"></i>
                                <b>Active</b>
                            </a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="card card-tabs card-primary card-outline">
                                <div class="card-header p-0">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-auto">
                                            <ul class="nav nav-pills ml-auto p-2">
                                                <li class="nav-item">
                                                    <a wire:click="changeTabs(true)" style="cursor: pointer;" class="nav-link
                                                        @if($general == true) btn-primary text-white @endif">
                                                        <i class="fas fa-cogs"></i> General
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a wire:click="changeTabs(false)" style="cursor: pointer;" class="nav-link
                                                        @if($general != true) btn-primary text-white @endif ">
                                                        <i class="fa fa-lock"></i> Password
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            @if($general == true)
                                <div class="card">
                                    <div class="card-body">
                                        <form wire:submit.prevent="updateGeneralInfo">
                                            <div class="form-group field-usersettingsform-username required">
                                                <label for="usersettingsform-username">Fullname</label>
                                                <input wire:model.lazy="name" type="text" id="usersettingsform-username"
                                                       class="form-control"
                                                       name="name" value="{{$name}}" aria-required="true">
                                                <x-jet-input-error for="name" class="text-danger"/>
                                            </div>
                                            <div class="form-group field-usersettingsform-phone required">
                                                <label for="usersettingsform-phone">Email</label>
                                                <input wire:model.lazy="email" type="email" id="usersettingsform-phone"
                                                       class="form-control"
                                                       name="email" value="{{$email}}" aria-required="true">
                                                <x-jet-input-error for="email" class="text-danger"/>
                                            </div>
                                            <div class="row">
                                                <div class="col d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary">
                                                        Save
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="overlay d-none" wire:loading.class.remove="d-none">
                                        <i class="fas fa-2x fa-sync-alt loadingIcon"></i>
                                    </div>
                                </div>
                            @else
                                <div class="card">
                                    <div class="card-body">
                                        <form id="w0" wire:submit.prevent="updatePassword">
                                            @csrf
                                            <div class="form-group field-usersettingsform-password_old required">
                                                <label
                                                    for="usersettingsform-password_old">Old password</label>
                                                <input wire:model="old_password" type="password"
                                                       id="usersettingsform-old_password"
                                                       class="form-control" name="old_password"
                                                       value="" aria-required="true">
                                                <x-jet-input-error for="old_password" class="text-danger"/>
                                            </div>
                                            <div class="form-group field-usersettingsform-password required">
                                                <label
                                                    for="usersettingsform-password">New password</label>
                                                <input wire:model="password" type="password"
                                                       id="usersettingsform-new_password"
                                                       class="form-control" name="password" value=""
                                                       aria-required="true">
                                                <x-jet-input-error for="password" class="text-danger"/>
                                            </div>
                                            <div class="form-group field-usersettingsform-password_repeat required">
                                                <label
                                                    for="usersettingsform-password_repeat">Confirm new password</label>
                                                <input wire:model="password_confirmation" type="password"
                                                       id="usersettingsform-password_repeat"
                                                       class="form-control" name="password_confirmation"
                                                       value="" aria-required="true">
                                                <x-jet-input-error for="password_confirmation" class="text-danger"/>
                                            </div>
                                            <div class="row">
                                                <div class="col d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary">
                                                        Save
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="overlay d-none" wire:loading.class.remove="d-none">
                                        <i class="fas fa-2x fa-sync-alt loadingIcon"></i>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
