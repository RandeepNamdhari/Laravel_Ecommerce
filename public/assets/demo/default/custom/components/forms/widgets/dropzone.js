//== Class definition

var DropzoneDemo = function () {    
    //== Private functions
    var demos = function () {
        // single file upload
        Dropzone.options.mDropzoneOne = {
            paramName: "product_file", // The name that will be used to transfer the file
            maxFiles: 1,
            uploadMulitple:false,
            maxFilesize: 5, // MB
            addRemoveLinks: true,
            acceptedFiles:'image/*',
            accept: function(file, done) {
                if (file.name == "justinbieber.jpg") {
                    done("Naha, you don't.");
                } else { 
                    done(); 
                    //alert('hello');
                }
            },

              init: function () {
           this.on("removedfile", function (file) {
            $.post({
                url: $BASE__URL+'/delete_product_image',
                data: {id: $('#product_image_single').val()},
                dataType: 'json',
                success: function (data) {
                    if(data.file_source==$('#product_image_single').val()){
                    $('#product_image_single').val('');
                }
                }
            });
        });

    this.on("error", function(file, message, xhr) {
    var header = xhr.status+": "+xhr.statusText;
    $(file.previewElement).find('.dz-error-message').text(header);
  });
    if($('#image_drop_value').val()){
    var mockFile = { name: "current.jpg", size: 12345 };
   
    this.options.addedfile.call(this, mockFile);
    this.options.thumbnail.call(this, mockFile, $('#image_drop_value').val());
    this.emit("complete", mockFile);
}
    },
    success: function (file, done) {
       data=JSON.parse(done);
       $('#product_image_single').val(data.file_name_real.trim());
    }  
        };

        // multiple file upload
        Dropzone.options.mDropzoneTwo = {
             paramName: "product_file", // The name that will be used to transfer the file
            maxFiles: 10,
            uploadMulitple:false,
            maxFilesize: 15, // MB
            addRemoveLinks: true,
            acceptedFiles:'image/*',
            accept: function(file, done) {
                if (file.name == "justinbieber.jpg") {
                    done("Naha, you don't.");
                } else { 
                    done(); 
                    //alert('hello');
                }
            },

              init: function () {
           this.on("removedfile", function (file) {

            $.post({
                url: $BASE__URL+'/delete_product_image',
                data: {id: $('#'+file.upload.uuid).val()},
                dataType: 'json',
                success: function (data) {
                    $('#'+file.upload.uuid).remove();
                }
            });
        });

    this.on("error", function(file, message, xhr) {
    var header = xhr.status+": "+xhr.statusText;
    $(file.previewElement).find('.dz-error-message').text(header);
  });
    
    //var mockFile = { name: "banner2.jpg", size: 12345 };
   
    //this.options.addedfile.call(this, mockFile);
    //this.options.thumbnail.call(this, mockFile, "http://localhost/test/drop/uploads/banner2.jpg");

    },
    success: function (file, done) {
       data=JSON.parse(done);
       data.file_name_real=data.file_name_real.split(" ");
      
       $('#uncommonDIv').append("<input type=hidden name=product_images_array[] id="+file.upload.uuid+" value="+data.file_name_real+" />");
       
    }    
        };

        // file type validation
        Dropzone.options.mDropzoneThree = {
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 10,
            maxFilesize: 10, // MB
            addRemoveLinks: true,
            acceptedFiles: "image/*,application/pdf,.psd",
            accept: function(file, done) {
                if (file.name == "justinbieber.jpg") {
                    done("Naha, you don't.");
                } else { 
                    done(); 
                }
            }   
        };
    }

    return {
        // public functions
        init: function() {
            demos(); 
        }
    };
}();

DropzoneDemo.init();