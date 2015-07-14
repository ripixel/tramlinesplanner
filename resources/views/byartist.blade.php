@include('partials.header')

<div class="content">
    <div class="container">

        <h2>Plan your <span class="tram-red">Tramlines</span> schedule by Artist</h2>
        <p>Below are all the artists that will be appearing at Tramlines 2015 - simply select the ones you would like to see, and we'll create your schedule for you, and even warn you about any clashes.</p>

        <h3>Current Number of Artists Selected: <span class="noOfArtistsSelected tram-red">0</span></h3>
        <div class="pure-g artist-box-grid">

            @foreach($artists as $artist)
                <div class="pure-u-1-2 pure-u-md-1-4 artist-box">
                    <div class="artist-name">
                       <h3>{{ $artist->name }}</h3>
                    </div>
                </div>
            @endforeach
        </div>

        {!! Form::open(array('url' => 'foo/bar'))  !!}
        {!! Form::select('selected_artists[]', $select_artists, null, ['id' => 'selected_artists', 'class' => 'form-control', 'multiple', 'style' => 'display: none;']) !!}
        {!! Form::close() !!}

        <a onclick="populateSelect();">Go</a>
    </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".artist-box-grid").on("click", ".artist-name", selectArtist);
    });

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
            selectedArtistNames.push($(this).html());
        });
        $("#selected_artists").val(selectedArtistNames);
    }

</script>

@include('partials.footer')