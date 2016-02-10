/**
 * Created by guiminzhou on 15/02/15.
 */
(function(){
    var j = jQuery.noConflict();
    var SERVER_URL = 'http://api.cn.faceplusplus.com/v2/';
    var API_KEY = 'a774702fd3316577efb8b2f93f47b2f4';
    var API_SECRET = 'FkkS6T6mPbUofnQEle4PkUF9NitN8pNm';

    j(document).ready(function(){
        var video = j('video')[0];
        var canvas = j('canvas');

        j('form').submit(function(e){
            e.preventDefault();
            var username = j('form#register-form').find('input#name').val();
            var dataUrl = canvas.toDataURL();

            var image = new Image();
            image.src = canvas.toDataURL('image/jpeg');

            if(detect_face(image.src)) {
                var result = detect_face(image.src);
                j.ajax({
                    type: j('form').attr('method'),
                    url: j('form').attr('action'),
                    data:{image: dataUrl, username: username},
                    success: function(response) {
                        console.log(response);
                    }
                });
            }

            return false;
        });

        function detect_face(imageURI){
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'http://api.cn.faceplusplus.com/v2/' + 'detection/detect?api_key=' + 'a774702fd3316577efb8b2f93f47b2f4' + '&api_secret=' + 'FkkS6T6mPbUofnQEle4PkUF9NitN8pNm', true);
            var fd = new FormData();
            fd.append('img', dataURItoBlob(image.src));
            xhr.send(fd);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        var result = JSON.parse(xhr.responseText);
                        return result;
                    }
                }
            };
            return false;
        }

        video.addEventListener('loadedmetadata', function(){
            // Calculate the ratio of the video's width to height
            ratio = video.videoWidth / video.videoHeight;
            // Define the required width as 100 pixels smaller than the actual video's width
            w = video.videoWidth - 100;
            // Calculate the height based on the video's width and the ratio
            h = parseInt(w / ratio, 10);
            // Set the canvas width and height to the values just calculated
            canvas.width = w;
            canvas.height = h;
        }, false);

        /**
         * Reference: http://stackoverflow.com/questions/4998908/convert-data-uri-to-file-then-append-to-formdata
         */
        function dataURItoBlob(dataURI) {
            var binary = atob(dataURI.split(',')[1]);
            var array = [];
            for(var i = 0; i < binary.length; i++) {
                array.push(binary.charCodeAt(i));
            }
            return new Blob([new Uint8Array(array)], { type: 'image/jpeg' });
        }

        if (navigator.getUserMedia) {
            navigator.getUserMedia (
                // constraints
                {
                    video: true
                },
                // successCallback
                function(localMediaStream) {
                    var video = document.querySelector('video');
                    video.src = window.URL.createObjectURL(localMediaStream );

                    // Do something with the video here, e.g. video.play()
                },
                // errorCallback
                function(err) {
                    console.log("The following error occured: " + err);
                }
            );
        } else {
            console.log("getUserMedia not supported");
        }

        j('#screenshot-button').click(function(e){
            ctx.fillRect(0, 0, w, h);
            ctx.drawImage(video, 0, 0, w, h);
        });
    });
})();