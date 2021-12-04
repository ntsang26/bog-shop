Dropzone.autoDiscover = false;
$(document).ready(function(){
    // $('#priceInput').inputmask("numeric", {
    //     radixPoint: ",",
    //     groupSeparator: ".",
    //     digits: 0,
    //     autoGroup: true,
    //     rightAlign: false,
    //     step: '10000',
    //     removeMaskOnSubmit: true,
    // });
    var _dropzone = new Dropzone("#dropzone",{ 
        url: "/product/uploader" ,
        maxFilesize: 4,
        addRemoveLinks: true,
        acceptedFiles: 'image/*',
        dictRemoveFile: 'Xóa ảnh',
        processing: function(file){
            $("button[type=submit]").attr("disabled", "disabled");
        },
        removedfile: function(file){
            var server_file = $(file.previewTemplate).children('.server_file').text();
            file.previewElement.remove();
            // call server to remove file
            $.ajax({
                url: "/product/delete-image/"+server_file,
            });

            // update list id image of product
            let txtImageId = $("#imgId").val();
            let arrImageId = txtImageId.split(",");
            let indexRemove = arrImageId.indexOf(server_file);
            if(indexRemove >= 0) arrImageId.splice(indexRemove, 1);
            $("#imgId").val(arrImageId.toString());
        },
        success: function(file, response){
            if(response.uploaded == 1){
                $(file.previewTemplate).append('<span class="server_file hidden">'+response.img_id+'</span>');
                txtImageId = $("#imgId").val();
                if(txtImageId && txtImageId != ''){
                    txtImageId = txtImageId + ',' + response.img_id;
                }else{
                    txtImageId = response.img_id;
                }
                $("#imgId").val(txtImageId);
            }
        },
        queuecomplete: function(){
            $("button[type=submit]").removeAttr("disabled");
        }
    });

    $("a.img_product").click(function(event) {
        event.preventDefault();
        let deleteUrl = $(this).attr('href');
        $(this).closest('.dz-preview').remove();
        $.ajax({
            url: deleteUrl,
        });
    });
    $('input[type="checkbox"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass   : 'iradio_minimal-blue'
    }).on('ifChecked',function () {
        $('.avatar').show();
    }).on('ifUnchecked',function () {
        $('.avatar').hide();
    });

});
