$(document).ready(function() {
  $(document).on('click',".file-upload",function () {
      $('#btn_file').click();
  });
});

function upload(obj){
    $('#btn_upload').val(obj.value);
    $('#btn_upload').click();
}

