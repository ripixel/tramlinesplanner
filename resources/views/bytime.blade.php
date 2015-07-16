@include('partials.header')

<div class="content">
    <div class="container">

        <h2>Plan your <span class="tram-red">Tramlines</span> schedule by Time</h2>
        <p>Below are all the events that will be appearing at Tramlines 2015 - simply select the ones you would like to see, and we'll create your schedule for you, and even warn you about any clashes.</p>

        <h3 style="margin-bottom: 0">Current Number of Events Selected: <span class="noOfEventsSelected tram-red">0</span></h3>
        <p style="margin-top: 0"><em>Click on the name of the artist to select the event</em></p>

        <div class="pure-g timing-box-grid">
            <table class="pure-u-1 schedule-table">
                <thead>
                    <tr>
                    <tr class="timing-row">
                        <th></th>
                        @php $y = 0;
                        @for($i = 18; $y < 4; $i++)
                            @unless($i > 3 && $y == 3)
                                <th>{{ $i }}:00</th>
                                <th></th>
                                <th></th>
                                <th>{{ $i }}:15</th>
                                <th></th>
                                <th></th>
                                <th>{{ $i }}:30</th>
                                <th></th>
                                <th></th>
                                <th>{{ $i }}:45</th>
                                <th></th>
                                <th></th>
                            @endunless
                            @if($i== 23)
                                @php $i = -1;
                                @php $y++;
                            @endif
                        @endfor
                    </tr>
                </thead>
                <tbody>
                @foreach($venues as $venue)
                    <tr>
                        @php $last_hour = 18; $last_minute = 0;
                        @if($venue->has_twin == true)
                            @unless(str_contains(strtoupper($venue->name), ' 2'))
                                <th class="venue-cell"><span class="venue-cell-move-down">{{ $venue->name }}</span></th>
                                @else
                                    <th class="venue-cell">&nbsp;</th>
                            @endunless
                        @else
                            <th class="venue-cell">{{ $venue->name }}</th>
                        @endif
                        @foreach($venue->timings() as $timing)
                            @if($timing->numberOfPaddingColumns($last_hour, $last_minute) > 0)
                                <td colspan="{{ $timing->numberOfPaddingColumns($last_hour, $last_minute) }}" class="padding-cell"></td>
                            @endif
                            @if($timing->numberOfColumnsForScheduleView() > 0)
                                <td colspan="{{ $timing->numberOfColumnsForScheduleView() }}" class="artist-cell">{{ $timing->artist_name }}</td>
                                @php $last_hour = intval(substr($timing->end_time, 0, 2));
                                @php $last_minute = intval(substr($timing->end_time, 3, 2));
                            @endif
                        @endforeach
                        <td colspan="1000" class="padding-cell"></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <a onclick="populateSelect();" class="tram-button pure-u-1">See my schedule</a>

        {!! Form::open(array('url' => '/schedule', 'method' => 'post', 'id' => 'selected_timings_form'))  !!}
        {!! Form::select('selected_timings[]', $select_timings, $already_selected_timings, ['id' => 'selected_timings', 'class' => 'form-control', 'multiple', 'style' => 'display: none;']) !!}
        {!! Form::close() !!}
    </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".schedule-table").on("click", ".artist-cell", selectArtist);

        // select already selected timings if there are any
        selectAlreadySelectedArtists();

        $(".schedule-table").scroll(function(){
            $('.venue-cell').css({
                'left': $(this).scrollLeft()
            });
        });
    });

    function selectAlreadySelectedArtists() {
        $.each($("#selected_timings").val(), function() {
            var selectedTiming = this;
            var artistCells = $(".artist-cell:contains('" + selectedTiming.toString().replace('&amp;','&') + "')");
            $.each(artistCells, function() {
                var currentArtistCell = $(this);
                if(currentArtistCell.html().replace('&amp;','&').toUpperCase()==selectedTiming.toString().toUpperCase()) {
                    currentArtistCell.addClass("artist-cell-selected");
                }
            })
        });
        var numberSelected = $(".artist-cell-selected").length;
        $(".noOfEventsSelected").html(numberSelected);
    }

    function selectArtist(event) {
        var artistBox = $(event.currentTarget);
        artistBox.toggleClass("artist-cell-selected");
        var numberSelected = $(".artist-cell-selected").length;
        $(".noOfEventsSelected").html(numberSelected);
    }

    function populateSelect() {
        var selectedArtists = $(".artist-cell-selected");
        var selectedArtistNames = [];
        selectedArtists.each(function() {
            selectedArtistNames.push($(this).html().replace('&amp;','&'));
        });
        $("#selected_timings").val(selectedArtistNames);
        $("#selected_timings_form").trigger("submit");
    }

</script>

@include('partials.footer')