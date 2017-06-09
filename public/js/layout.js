$(document).ready(function(){

    // 使用所有的material js
    $.material.init();

    // google calendar
    $(document).on('click', '.trigger-iframe', function (event) {
        event.preventDefault();
        $('#gcalendar').iziModal('open', this); // Use "this" to get URL href or option 'iframeURL'
    });
    var gcalendar_url = "https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%23FFFFFF&src=ncufreshweb%40gmail.com&color=%232952A3&ctz=Asia%2FTaipei";
    $("#gcalendar").iziModal({
        theme: 'light',
        headerColor: '#fff',
        icon: 'fa fa-google',
        iconColor: '#000',
        title: '新生知訊網 Google 日曆',
        subtitle: "<a href='" + gcalendar_url + "' target='_blank'>開新視窗瀏覽</a>",
        history: false,
        fullscreen: true,
        iframe: true,
        iframeURL: gcalendar_url,
        onOpening: function(){
              $('.navbar-ncufresh, #totop').css('display','none');
        },
        onClosing: function(){{
              $('.navbar-ncufresh').css('display','block');
              if ( $(window).width() > 991 ) {
                  $('#totop').css('display','inline');
              }
        }},
    });

    // ajax csrf-token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // 平滑 自定義的連結跟footer的連結
    $("a[href='#about'], a[href='#news'], a[href='#app-layout']").on('click', function(event) {
        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();
            // Store hash
            var hash = this.hash;
            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
              scrollTop: $(hash).offset().top
            }, 900, function(){
                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
        } // End if
    });

})
