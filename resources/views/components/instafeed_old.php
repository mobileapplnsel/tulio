
    <script src="scripts/instafeed.min.js"></script>
    <script type="text/javascript">
        var userFeed = new Instafeed({
            type: 'image',
            get: 'user',
            target: "instafeed-container",
            template: '<a target="_blank" href="{{link}}"><img class="img-responsive insta-img" src="{{image}}" /></a>',
            resolution: 'standard_resolution',
            limit: 9,
            filter: function(image) {
                if (image.type === "video") {
                return false;
                }
                return true;
            },
            accessToken: 'IGQVJVanVZAakxMaWRyVWxiUjBYQkthWmJLZAHk5WXBmR1JCaWdjMVRBNlVOZAlk4enRrU054QlBESmh4bXNxclVUUkhfSE5GdnNmbkVQMTdIZA2VaUnRmdlRCU2NEclJHUk5RYmlYZAkNrcnNDTHpnWnJUSAZDZD'

        });
        userFeed.run();
    </script>


