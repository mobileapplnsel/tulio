
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
            accessToken: 'IGQVJVRVBncG9Wb1RsWVVSOXU1WW1RLXA4TXpZAWDJFZAHVqY0xVbjFtSVhKdDNiX3pPZAUYwN09pRWxJQTlnemwtdy1vQmJkWVVESTV2WHVOaG8xbTdRZADJvZA3ctSk5ZAUGdaM0lLNlFPZAXd4d2pFYzB6QwZDZD'

        });
        userFeed.run();
    </script>


