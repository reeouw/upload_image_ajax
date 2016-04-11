<!DOCTYPE html>
<html>
    <head>
        <title>Laravel Form</title>
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#uploading").hide();
                $("button").click(function(){
                    $("#uploading").show();                    
                    var fd = new FormData(document.getElementById("lara-form"));
                    $.ajax({
                        url: "upload",
                        type: "post",
                        data: fd,
                        enctype: 'multipart/form-data',
                        processData: false,  // tell jQuery not to process the data
                        contentType: false,   // tell jQuery not to set contentType
                    }).done(function() {
                        document.getElementById("lara-form").reset();
                        $("#output").html("Uploaded");
                        $("#uploading").hide();
                    });
                });        
            });
        </script>
    </head>
    <body>
        <form id="lara-form" action="/upload" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="file" name="image"></input> <br>
            <button type="button">Upload</button>
        </form>
        <div id="uploading">Uploading...</div>
        <div id="output"></div>
    </body>
</html>
