<!-- Excanvas for Flot (Charts plugin) support on IE8 -->
        <!--[if lte IE 8]><script src="js/helpers/excanvas.min.js"></script><![endif]-->

        <!-- Get Jquery library from Google ... -->
        <!-- Add the https version if you are using SSL <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <!-- ... but if something goes wrong get Jquery from local file -->
        <script>!window.jQuery && document.write(unescape('%3Cscript src="js/vendor/jquery-1.9.1.min.js"%3E%3C/script%3E'));</script>

        <!-- Bootstrap.js -->
        <script src="js/vendor/bootstrap.min.js"></script>

        <!-- Jquery plugins and custom javascript code -->
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        
        <!-- Google Maps API + Gmaps Plugin -->
        <!-- Add the https version if you are using SSL <script src="https://maps.google.com/maps/api/js?sensor=true"></script> -->
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="js/helpers/gmaps.min.js"></script>

        <!-- Javascript code only for this page -->
        <script>
            $(function() {
                var dashChart = $('#dashboard-chart');
                var dashMap = $('#dashboard-map');
                var componentHeight = '300px';

                // Initialize Slimscroll
                $('.scrollable').slimScroll({
                    height: componentHeight,
                    color: '#333',
                    size: '5px',
                    alwaysVisible: true,
                    railVisible: true,
                    railColor: '#333',
                    railOpacity: 0.1,
                    touchScrollStep: 750
                });

                /* Dashboard Chart */
                var dashData1 = [[0, 620], [1, 500], [2, 900], [3, 650], [4, 1250], [5, 850], [6, 1700]];
                var dashData2 = [[0, 110], [1, 80], [2, 320], [3, 250], [4, 550], [5, 520], [6, 600]];

                dashChart.css('height', componentHeight);

                // Initialize Classic Chart
                $.plot(dashChart, [
                    {data: dashData1, lines: {show: true, fill: true, fillColor: {colors: [{opacity: 0.25}, {opacity: 0.25}]}}, points: {show: true}, label: 'New Users'},
                    {data: dashData2, lines: {show: true, fill: true, fillColor: {colors: [{opacity: 0.1}, {opacity: 0.1}]}}, points: {show: true}, label: 'New Projects'}],
                {
                    legend: {
                        position: 'nw',
                        backgroundColor: null
                    },
                    colors: ['#2980b9', '#333'],
                    grid: {
                        borderWidth: 0,
                        color: '#999999',
                        labelMargin: 10,
                        hoverable: true,
                        clickable: true
                    },
                    yaxis: {
                        ticks: 0,
                        tickColor: '#fff'
                    },
                    xaxis: {
                        tickSize: 1,
                        tickColor: '#fff',
                        ticks: [[0, 'MON'], [1, 'TUE'], [2, 'WED'], [3, 'THU'], [4, 'FRI'], [5, 'SAT'], [6, 'SUN']]
                    }
                }
                );

                // Creating and attaching a tooltip
                var previousPoint = null;
                dashChart.bind("plothover", function(event, pos, item) {

                    if (item) {
                        if (previousPoint !== item.dataIndex) {
                            previousPoint = item.dataIndex;

                            $("#tooltip").remove();
                            var x = item.datapoint[0],
                                y = item.datapoint[1];

                            $('<div id="tooltip" class="chart-tooltip"><strong>' + y + '</strong></div>')
                                .css({top: item.pageY - 30, left: item.pageX - 20})
                                .appendTo("body")
                                .show();
                        }
                    }
                    else {
                        $("#tooltip").remove();
                        previousPoint = null;
                    }
                });

                // Initialize general map when tab is shown
                $('a[href="#dashboard-maps"]').on('shown', function() {
                    dashMap.css('height', componentHeight).css('width', '100%');

                    new GMaps({
                        div: '#dashboard-map',
                        lat: 0,
                        lng: 0,
                        zoom: 1
                    });
                });
            });
        </script>
    </body>
</html>