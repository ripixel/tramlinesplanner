<div class="pure-g schedule-artist-grid">
    @php $lastDate = '';
    @foreach($timings as $timing)
        @if($lastDate != $timing->date)
            <h3 class="pure-u-1 day-heading">{{ $timing->date->format('l') }}</h3>
            @php $lastDate = $timing->date;
        @endif
        <div class="pure-u-md-1-2 pure-u-1 artist-box">
            <div class="artist-schedule-box">
                <div class="artist-name artist-name-selected pure-u-1">
                    <h3>{{ $timing->artist_name }}</h3>
                </div>
                <div class="pure-g">
                    <div class="pure-u-2-3"><p>{{ $timing->venue_name }}</p></div>
                    <div class="pure-u-1-6"><p>{{ $timing->start_time }}</p></div>
                    <div class="pure-u-1-6"><p>{{ $timing->end_time }}</p></div>
                </div>
            </div>
        </div>
    @endforeach
</div>