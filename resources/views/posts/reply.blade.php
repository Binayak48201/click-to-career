@foreach($replies as $reply)
    <div class="tt-item">
        <div class="tt-single-topic">
            <div class="tt-item-header pt-noborder">
                <div class="tt-item-info info-top">
                    <div class="tt-avatar-icon">
                          @if($reply->user->avatar)
                                <img src="{{ $reply->user->avatar }}" alt="" class="avatar">
                            @else
                                <img src="{{ asset('default.jpg') }}" alt="" class="avatar">
                            @endif
                    </div>
                    <div class="tt-avatar-title">
                        <a href="#">{{ $reply->user->name }}</a>
                    </div>
                    <a href="#" class="tt-info-time">
                        <i class="tt-icon">
                            <svg>
                                <use xlink:href="#icon-time"></use>
                            </svg>
                        </i>
                        {{ $reply->created_at->diffForHumans() }}
                    </a>
                </div>
            </div>
            <div class="tt-item-description">
                {{ $reply->body }}
            </div>
            <div class="tt-item-info info-bottom">

                <a href="#" class="tt-icon-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
                    </svg>

                    <span class="tt-text">12</span>
                </a>
                <div class="col-separator"></div>
                <a href="#" class="tt-icon-btn tt-hover-02 tt-small-indent">
                    <i class="tt-icon">
                        <svg>
                            <use xlink:href="#icon-share"></use>
                        </svg>
                    </i>
                </a>
                <a href="#" class="tt-icon-btn tt-hover-02 tt-small-indent">
                    <i class="tt-icon">
                        <svg>
                            <use xlink:href="#icon-flag"></use>
                        </svg>
                    </i>
                </a>
                <a href="#" class="tt-icon-btn tt-hover-02 tt-small-indent">
                    <i class="tt-icon">
                        <svg>
                            <use xlink:href="#icon-reply"></use>
                        </svg>
                    </i>
                </a>
            </div>
        </div>
    </div>
@endforeach

{{ $replies->links('pagination::bootstrap-4') }}
