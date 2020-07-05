$( document ).ready(function() {
    console.log( "ready!" );
});

$( ".track_click" ).click(function() {
    $.post("downloads_tracking.php",
        {
            user_id: $(this).data( "user-id" ),
            wallpaper_id: $(this).data( "wallpaper-id" )
        });
});
