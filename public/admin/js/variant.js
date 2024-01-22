function deleteCate(id) {
    const url = '/cp-admin/variant/delete/' + id;
    // console.log(url);
    swal({
        title: "Bạn có chắc không?",
        text: "Sau khi bị xóa, bạn sẽ không thể khôi phục tệp này! ",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "get",
                    url: url,
                    success: function (res) {
                        console.log(res.status)
                        if (res.status == 200) {
                            swal("Tệp của bạn đã bị xóa!", {
                                icon: "success",
                            }).then(function () {
                                $("#var-" + id).remove();
                            });
                        } else if (res.status == 401) {
                            swal(res.message, {
                                icon: "error",
                            });
                        }
                    }
                });

            } else {
                swal("Tệp của bạn an toàn!!");
            }
        });
}

$(document).ready(function () {
    $('#display-type').change(function (event) {
        $('#input-color').css('display', event.target.value == 1 ? 'block' : 'none');
        if (event.target.value == 0) {
            $('#input-value').val($('#input-name').val().toLowerCase());
        }
    });

    $('#input-color').change(function (event) {
        $('#input-value').val(event.target.value);
    })
})