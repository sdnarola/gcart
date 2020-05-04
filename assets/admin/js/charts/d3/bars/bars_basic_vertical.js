/* ------------------------------------------------------------------------------
 *
 *  # D3.js - vertical bar chart
 *
 *  Demo d3.js vertical bar chart setup with .tsv data source
 *
 *  Version: 1.0
 *  Latest update: August 1, 2015
 *
 * ---------------------------------------------------------------------------- */

$(function() {

    // Initialize chart
    barVertical('#d3-bar-vertical', 300);

    // Chart setup
    function barVertical(element, height) {


        // Basic setup
        // ------------------------------

        // Define main variables
        var d3Container = d3.select(element),
            margin = {
                top: 5,
                right: 10,
                bottom: 20,
                left: 40
            },
            width = d3Container.node().getBoundingClientRect().width - margin.left - margin.right,
            height = height - margin.top - margin.bottom - 5;



        // Construct scales
        // ------------------------------

        // Horizontal
        var x = d3.scale.ordinal()
            .rangeRoundBands([0, width], .1, .5);

        // Vertical
        var y = d3.scale.linear()
            .range([height, 0]);

        // Color
        var color = d3.scale.category20c();

        var formatxAxis = d3.format(',.0f');



        // Create chart
        // ------------------------------

        // Add SVG element
        var container = d3Container.append("svg");

        // Add SVG group
        var svg = container
            .attr("width", width + margin.left + margin.right)
            .attr("height", height + margin.top + margin.bottom)
            .append("g")
            .attr("transform", "translate(" + margin.left + "," + margin.top + ")");



        // Load data
        // ------------------------------

        d3.tsv(BASE_URL + '/admin/dashboard/sale', function(error, data) {
            // Pull out values
            data.forEach(function(d) {
                d.sale = +d.sale;
            });

            // Create axes
            // ------------------------------
            // Horizontal
            var xAxis = d3.svg.axis()
                .scale(x)
                .orient("bottom");

            // Vertical
            var yAxis = d3.svg.axis()
                .scale(y)
                .orient("left")
                .tickFormat(formatxAxis)
                .ticks(d3.max(data, function(d) {
                    return d.sale;
                }));

            // Set input domains
            // ------------------------------

            // Horizontal
            x.domain(data.map(function(d) {
                return d.day;
            }));

            // Vertical
            y.domain([0, d3.max(data, function(d) {
                return d.sale;
            })]);


            //
            // Append chart elements
            //

            // Append axes
            // ------------------------------

            // Horizontal
            svg.append("g")
                .attr("class", "d3-axis d3-axis-horizontal d3-axis-strong")
                .attr("transform", "translate(0," + height + ")")
                .call(xAxis);

            // Vertical
            var verticalAxis = svg.append("g")
                .attr("class", "d3-axis d3-axis-vertical d3-axis-strong")
                .call(yAxis);

            // Add text label
            verticalAxis.append("text")
                .attr("transform", "rotate(-90)")
                .attr("y", 10)
                .attr("dy", ".71em")
                .style("text-anchor", "end")
                .style("fill", "#999")
                .style("font-size", 12)
                .text("Sale");


            // Add bars
            svg.selectAll(".d3-bar")
                .data(data)
                .enter()
                .append("rect")
                .attr("class", "d3-bar")
                .attr("x", function(d) {
                    return x(d.day);
                })
                .attr("width", x.rangeBand())
                .attr("y", function(d) {
                    return y(d.sale);
                })
                .attr("height", function(d) {
                    return height - y(d.sale);
                })
                .style("fill", function(d) {
                    return color(d.day);
                });
        });



        // Resize chart
        // ------------------------------

        // Call function on window resize
        $(window).on('resize', resize);

        // Call function on sidebar width change
        $('.sidebar-control').on('click', resize);

        // Resize function
        // 
        // Since D3 doesn't support SVG resize by default,
        // we need to manually specify parts of the graph that need to 
        // be updated on window resize
        function resize() {

            // Layout variables
            width = d3Container.node().getBoundingClientRect().width - margin.left - margin.right;


            // Layout
            // -------------------------

            // Main svg width
            container.attr("width", width + margin.left + margin.right);

            // Width of appended group
            svg.attr("width", width + margin.left + margin.right);


            // Axes
            // -------------------------

            // Horizontal range
            x.rangeRoundBands([0, width], .1, .5);

            // Horizontal axis
            svg.selectAll('.d3-axis-horizontal').call(xAxis);


            // Chart elements
            // -------------------------

            // Line path
            svg.selectAll('.d3-bar').attr("x", function(d) {
                return x(d.day);
            }).attr("width", x.rangeBand());
        }
    }
});