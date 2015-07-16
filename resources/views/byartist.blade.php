@include('partials.header')

<div class="content">
    <div class="container">

        <h2>Plan your <span class="tram-red">Tramlines</span> schedule by Artist</h2>
        <p>Below are all the artists that will be appearing at Tramlines 2015 - simply select the ones you would like to see, and we'll create your schedule for you, and even warn you about any clashes.</p>

        <h3 style="margin-bottom: 0;">Current Number of Artists Selected: <span class="noOfArtistsSelected tram-red">0</span></h3>
        <p style="margin-top: 0"><em>Click on the name of the artist to select them</em></p>
        <div class="pure-g artist-box-grid">

            @foreach($timings as $timing)
                <div class="pure-u-1-2 pure-u-md-1-4 artist-box">
                    <div class="artist-name">
                       <h3>{{ $timing->artist_name }}</h3>
                        <p>{{ $timing->venue_name }} - {{ $timing->date->format('l') }}</p>
                    </div>
                </div>
            @endforeach

        </div>

        <a onclick="populateSelect();" class="pure-u-1 tram-button">See my schedule</a>

        {!! Form::open(array('url' => '/schedule', 'method' => 'post', 'id' => 'selected_timings_form'))  !!}
        {!! Form::select('selected_timings[]', $select_timings, $already_selected_timings, ['id' => 'selected_timings', 'class' => 'form-control', 'multiple', 'style' => 'display: none;']) !!}
        {!! Form::close() !!}
    </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".artist-box-grid").on("click", ".artist-name", selectArtist);
        // select already selected timings if there are any
        selectAlreadySelectedArtists();
    });

    function selectAlreadySelectedArtists() {
        $.each($("#selected_timings").val(), function() {
            var selectedTiming = this.toString();
            var h3 = $("h3:contains('" + selectedTiming.toString() + "')");
            $.each(h3, function() {
                var currentH3 = $(this);
                if(currentH3.html().replace('&amp;','&').toUpperCase()==selectedTiming.toString().toUpperCase()) {
                    currentH3.parent().addClass("artist-name-selected");
                }
            })
        });
        var numberSelected = $(".artist-name-selected").length;
        $(".noOfArtistsSelected").html(numberSelected);
    }

    function selectArtist(event) {
        var artistBox = $(event.currentTarget);
        artistBox.toggleClass("artist-name-selected");
        var numberSelected = $(".artist-name-selected").length;
        $(".noOfArtistsSelected").html(numberSelected);
    }

    function populateSelect() {
        var selectedArtists = $(".artist-name-selected > h3");
        var selectedArtistNames = [];
        selectedArtists.each(function() {
            selectedArtistNames.push($(this).html().replace('&amp;','&'));
        });
        $("#selected_timings").val(selectedArtistNames);
        $("#selected_timings_form").trigger("submit");
    }

</script>

@include('partials.footer')