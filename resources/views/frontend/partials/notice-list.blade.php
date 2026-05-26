@forelse ($notices as $notice)
    <div class="col-md-6 col-lg-4">
        <div class="notice-card">
            <div class="notice-card_title_wrap">
                <span class="tag">{{ $notice->{'badge_title_' . app()->getLocale()} ?: $notice->badge_title_en }}</span>
                <h5>{{ $notice->{'title_' . app()->getLocale()} ?: $notice->title_en }}</h5>
            </div>
            <div class="notice-footer">
                <span><i class="bi bi-calendar-fill"></i>&nbsp;{{ $notice->created_at?->diffForHumans() }}</span>
                <a href="{{ asset('storage/'. ($notice->file ?? ''))}}" class="btn btn-notice">View Notice&nbsp;&nbsp;<i class="bi bi-eye-fill"></i></a>
            </div>
        </div>
    </div>
@empty
    <div class="col-12">
        <div class="text-center py-5">
            <h5>No notices found.</h5>
        </div>
    </div>
@endforelse
