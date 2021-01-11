@csrf
<div class="card-body">
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Tags</label>
        <div class="col-sm-9">
            <input type="text" class="form-control is-warning" name="txt_knowledge_document_tags" placeholder="Tags">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Title</label>
        <div class="col-sm-9">
            <input type="text" class="form-control is-warning" placeholder="Some Title .." name="txt_knowledge_document_title">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Document</label>
        <div class="col-sm-9">
            <div class="dropzone" id="upload-document"></div>
            <input type="hidden" name="txt_knowledge_document_document" id="document">
            <label class="text-danger">Only PDF can be Uploaded ..</label>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $('#upload-document').dropzone({
            dictDefaultMessage: "Drop file to upload ..",
            paramName: "document",
            addRemoveLinks: true,
            maxFiles: 1,
            timeout: 0,
            renameFile: function (file) {
                var fileType;

                if (file.type === 'application/pdf') {
                    fileType = '.pdf';
                }

                var randStr = Math.random().toString(36).substring(8);
                var newFileName = 'Document' + '_' + new Date().getTime() + '_' + randStr + fileType;

                $("#document").val(newFileName);

                return newFileName;
            },
            init: function() {
                this.on('addedfile', function(file) {
                    if (this.files.length > 1) {
                        this.removeFile(this.files[0]);
                    }

                    $("#document").val(file.upload.filename);

                });
                this.on("removedfile", function(file) {
                    $("#document").val('');
                });
            },
            acceptedFiles: ".pdf",
            url: "{!! route('knowledge-document.upload') !!}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'post',
            success : function(file, response){
                var fileName = file.upload.filename;
                console.log(fileName);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url : '{{ route('knowledge-document.check-document') }}',
                    type : 'POST',
                    data : {
                        fileName : fileName
                    },
                    success : function(data) {
                        setTimeout(function(){
                            var obj = jQuery.parseJSON(JSON.stringify(data));

                            if (obj.status == 'success') {
                                alert(obj.message);
                            } else {
                                this.removeFile(this.files[0]);
                                alert(obj.message);
                            }
                        }, 500);
                    },
                    error: function(xhr) {
                        alert("Something wrong, please try again ..");
                        btn.button('reset');
                    }
                });
            },
            error: function(file, message) {
                this.removeFile(this.files[0]);
                alert("Failed to upload,please try again ..");
            }
        });
    })
</script>