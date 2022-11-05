<div class="tab-pane tt-indent-none" id="tt-tab-03" role="tabpanel">
    <div class="tt-topic-list">
        <div class="tt-list-header">
            <div class="tt-col-topic">Topic</div>
            <div class="tt-col-value">Created </div>
        </div>
        @forelse($replies  as $reply)
            <div class="tt-item">
                <div class="tt-col-avatar">
                    <svg class="tt-icon">
                        <use xlink:href="#icon-ava-d"></use>
                    </svg>
                </div>
                <div class="tt-col-description">
                    <h6 class="tt-title"><a href="{{ $reply->forum->path() }}">
                            {{ $reply->forum->title }}
                        </a></h6>
                    <div class="row align-items-center no-gutters hide-desktope">
                        <div class="col-4 ml-auto show-mobile">
                            <div class="tt-value">{{ $reply->created_at->diffForHumans() }}</div>
                        </div>
                    </div>
                    <div class="tt-content">
                       {{ $reply->body }}
                    </div>
                </div>
                <div class="tt-col-value-large hide-mobile">{{ $reply->created_at->diffForHumans() }}</div>
            </div>
        @empty
            <div class="tt-topic-alert tt-alert-default" role="alert">
                <a href="#" target="_blank">User has not posted any replies.</a>
            </div>
        @endforelse
        <div class="tt-row-btn">
            <button type="button" class="btn-icon js-topiclist-showmore">
                <svg class="tt-icon">
                    <use xlink:href="#icon-load_lore_icon"></use>
                </svg>
            </button>
        </div>
    </div>
</div>
