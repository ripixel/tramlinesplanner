<div class="footer">
    <div class="container">
        <p>Copyright 2015 &copy; James King, <a href="http://ripixel.co.uk">ripixel.co.uk</a></p>
        <p>All related material and images for Tramlines are Copyright 2008 - 2015 &copy; <a href="http://www.tramlines.org.uk/">Tramlines</a></p>
        <br/>
        <p>This site was made for fun, as a free tool that I thought might be useful for some people. Source code is <a href="https://github.com/ripixel/tramlinesplanner">available on Github</a></p>
        <p>Obligatory <span class="tram-red">made with &hearts;</span> nonsense...</p>
    </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        //sticky footer
        stickyFooter();
        $(window).resize(stickyFooter);
    });

    function stickyFooter() {
        var footer = $(".footer");
        if($('body').height() < window.innerHeight) {
            footer.css({
                        "position":"absolute",
                        "bottom":"0",
                        "width":"100%"
                    }
            );
        } else {
            footer.css({
                        "position":"relative",
                        "bottom":"auto",
                        "width":"auto"
                    }
            );
        }
    }
</script>

</body>

</html>