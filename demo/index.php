<!DOCTYPE>
<html>
<head>
    <title>Ajaxish File Upload Demo</title>
    <style type="text/css">
    #imagePreview img {
        width: 140px; 
    }
    #loading img {
        width: 100px; 
    }
    </style>
</head>
<body>
    <h1>Ajaxish File Upload Demo</h1>
    <p>We're not actually going to upload a file, a dummy image will be used in the response so don't be confused. How your server side script handles file uploads isn't within the scope of this demo.</p>
    <button id="uploadIt">Upload Image</button>
    <div id="loading" style="display:none"><img src="ajax-loader.gif" /></div>
    <div id="imagePreview"></div>
    <br />
    <hr />
    <br />
    <h2>Ajaxish Initialization</h2>
    <code>
        <pre>
&lt;script type="text/javascript"&gt;
$(function(){
    $("#uploadIt").ajaxish({
        callback: function(res){
            var img = $("&lt;img /&gt;").attr("src", res.image_url);
            var h3 = $("&lt;h3 /&gt;").text("You're in business!");    
            $("#imagePreview").append(h3);
            $("#imagePreview").append(img);
        },
        loadingStart: function(ele){
            $("#loading").show();
        },
        loadingStop: function(ele){
            $("#loading").hide();
        }
    });
});
&lt;/script&gt;
        </pre>
    </code>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="ajaxish-jquery-upload.js"></script>
    <script type="text/javascript">
    $(function(){
        $("#uploadIt").ajaxish({
            callback: function(res){
                var img = $("<img />");
                img.attr("src", res.image_url);
                $("#imagePreview").append("<h3>You're in business!</h3>");
                $("#imagePreview").append(img);
            },
            loadingStart: function(ele){
                $("#loading").show();
            },
            loadingStop: function(ele){
                $("#loading").hide();
            }
        });
    });
    </script>
</body>
</html>
