function editStudent(id) {
    $.ajax({
        url: "/ptitweb/controller/StudentController/getStudentByID.php",
        data: { 'id': id },
        type: 'post',
        success: function (response) {
            let item = JSON.parse(response);
            $("#modalImg").attr('src', item.photo);
            $("#modalID").val(item.id);
            $("#modalName").val(item.name);
            $("#modalGender").val(item.gender);
            $("#modalStudentID").val(item.studentID);
            $("#modalClassID").val(item.classID);
            $("#modalEmail").val(item.email);
            $("#modalAddress").val(item.address);
            $("#modalPhone").val(item.phone);
            $("#editStudent").modal('show');
        },
        error: function(err){
            console.log(err);
        }
    });
}

function updateStudent() {
  var formData = new FormData(document.getElementById("formUpdateStudent"));
  $.ajax({
    type: 'post',
    url: "/ptitweb/controller/StudentController/updateStudent.php",
    data: formData,
    processData: false,
    contentType:false,
    success: function (response) {
      $("#editStudent").modal('hide');
      Swal.fire({
        title: 'Sửa thông tin thành công!',
        timer: 1000,
        timerProgressBar: true,
        willClose: () => {
          location.reload();
        }
      })
    },
  });
}

function deleteStudent(id){
    Swal.fire({
      title: "Bạn có chắc chắn muốn xóa?",
      text: "Bạn sẽ không thể lấy lại được dữ liệu này!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Xác nhận",
      cancelButtonText: "Hủy",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "/ptitweb/controller/StudentController/deleteStudent.php",
          data: { id: id },
          type: "POST",
          success: function (response) {
              Swal.fire({
                title: 'Xóa thành công!',
                timer: 1000,
                timerProgressBar: true,
                willClose: () => {
                  location.reload();
                }
              })
            },
        });
      }
    });
}

function upImg(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
        $('#modalImg').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
}
}