(function($) {
    $(function() {

        $(document).on('submit', 'form', function(e){
            e.preventDefault();

            var that = $(this);

            var rawData = that.serializeArray();
            var readyData = {};
            for (i in rawData){
                readyData[rawData[i].name] = rawData[i].value;
            }

            $.post(that.attr('action'), readyData,
                function(data){
                    if (data.content) {
                        alert(data.content);
                        that.trigger('reset');
                    }
                }, "json");
            return false;
        });

        $('.jcarousel').jcarousel({
            wrap: 'both'
        });

        //$('.slider-wrapper>.jcarousel').jcarouselAutoscroll({
        //    interval: 5000
        //});

        $('.jcarousel-control-prev')
            .on('jcarouselcontrol:active', function() {
                $(this).removeClass('inactive');
            })
            .on('jcarouselcontrol:inactive', function() {
                $(this).addClass('inactive');
            })
            .jcarouselControl({
                target: '-=1'
            });

        $('.jcarousel-control-next')
            .on('jcarouselcontrol:active', function() {
                $(this).removeClass('inactive');
            })
            .on('jcarouselcontrol:inactive', function() {
                $(this).addClass('inactive');
            })
            .jcarouselControl({
                target: '+=1'
            });


    });

})(jQuery);
