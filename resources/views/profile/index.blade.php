@extends('posts.layouts.app')
@section('content')
    <main id="tt-pageContent" class="tt-offset-small">
        <div class="tt-wrapper-section">
            <div class="container">
                <div class="tt-user-header">
                    <div class="tt-col-avatar">
                        <div class="tt-icon">
                            @if($user->avatar)
                                <img src="{{ $user->avatar }}" alt="" class="avatar">
                            @else
                                <img src="{{ asset('default.jpg') }}" alt="" class="avatar">
                            @endif
                        </div>
                    </div>
                    <div class="tt-col-title">
                        <div class="tt-title">
                            <a href="#">{{ $user->name }}</a>
                        </div>
                    </div>
                    <div class="tt-col-btn" id="js-settings-btn">
                        <div class="tt-list-btn">
                            @if(auth()->user() && $user->id === auth()->id())
                                <a href="#" class="tt-btn-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </a>
                            @endif
                            <a href="#" class="btn btn-secondary">Follow</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('profile.activities.index')
    </main>
    <div id="js-popup-settings" class="tt-popup-settings">
        <div class="tt-btn-col-close">
            <a href="#">
			<span class="tt-icon-title">
				<svg>
					<use xlink:href="#icon-settings_fill"></use>
				</svg>
			</span>
                <span class="tt-icon-text">
				Settings
			</span>
                <span class="tt-icon-close">
				<svg>
					<use xlink:href="#icon-cancel"></use>
				</svg>
			</span>
            </a>
        </div>
        <div class="tt-form-upload">
            <div class="row no-gutter">
                <div class="col-auto ml-auto">
                    <form action="/profile/{{ $user->name }}/update" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Upload Avatar</label>
                            <input name="avatar" type="file" class="form-control-file" id="exampleFormControlFile1"
                                   accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Avatar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="settingsUserName">Username</label>
            <input type="text" name="name" class="form-control" id="settingsUserName" placeholder="azyrusmax">
        </div>
        <div class="form-group">
            <label for="settingsUserEmail">Email</label>
            <input type="text" name="name" class="form-control" id="settingsUserEmail"
                   placeholder="Sample@sample.com">
        </div>
        <div class="form-group">
            <label for="settingsUserPassword">Password</label>
            <input type="password" name="name" class="form-control" id="settingsUserPassword"
                   placeholder="************">
        </div>
        <div class="form-group">
            <label for="settingsUserLocation">Location</label>
            <input type="text" name="name" class="form-control" id="settingsUserLocation" placeholder="Slovakia">
        </div>
        <div class="form-group">
            <label for="settingsUserWebsite">Website</label>
            <input type="text" name="name" class="form-control" id="settingsUserWebsite" placeholder="Sample.com">
        </div>
        <div class="form-group">
            <label for="settingsUserAbout">About</label>
            <textarea name="" placeholder="Few words about you" class="form-control"
                      id="settingsUserAbout"></textarea>
        </div>
        <div class="form-group">
            <label for="settingsUserAbout">Notify me via Email</label>
            <div class="checkbox-group">
                <input type="checkbox" id="settingsCheckBox01" name="checkbox">
                <label for="settingsCheckBox01">
                    <span class="check"></span>
                    <span class="box"></span>
                    <span class="tt-text">When someone replies to my thread</span>
                </label>
            </div>
            <div class="checkbox-group">
                <input type="checkbox" id="settingsCheckBox02" name="checkbox">
                <label for="settingsCheckBox02">
                    <span class="check"></span>
                    <span class="box"></span>
                    <span class="tt-text">When someone likes my thread or reply</span>
                </label>
            </div>
            <div class="checkbox-group">
                <input type="checkbox" id="settingsCheckBox03" name="checkbox">
                <label for="settingsCheckBox03">
                    <span class="check"></span>
                    <span class="box"></span>
                    <span class="tt-text">When someone mentions me</span>
                </label>
            </div>
        </div>
        <div class="form-group">
            <a href="#" class="btn btn-secondary">Save</a>
        </div>
    </div>
@endsection
