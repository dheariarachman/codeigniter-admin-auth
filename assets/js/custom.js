/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";
$(document).ready(function(e) {
  $("#table-data").DataTable({});
  $(".dataTables_filter").addClass("float-right");
  $(".dataTables_paginate").addClass("float-right");
});

$("#modal-form-add").on("show.bs.modal", function(evt) {
  let attr = $(evt.relatedTarget);
  let element = attr.data("action");
  if (element === "edit") {
    $.get(
      $(attr).data("href"),
      { id: $(attr).data("id") },
      function(res) {
        console.log(res);
        if (res["status"]) {
          Object.entries(res["msg"]).forEach(([id, value]) => {
            $(evt.currentTarget)
              .find('[name="' + id + '"]')
              .val(value);
          });
        } else {
          swal("Maaf !", res["msg"], "error");
        }
      },
      "json"
    );
  } else if (element === "add") {
    $(this)
      .find("form")[0]
	  .reset();
	$(this).find('input[type="hidden"]').val("");
  }
});

const save_data = id => {
  let formId = "#" + id;
  $(formId).ajaxSubmit({
    url: $(this).attr("action"),
    data: $(this).serialize(),
    dataType: "json",
    success: function(res) {
      if (res["status"]) {
        swal({
          title: "Data Berhasil Disimpan",
          icon: "success"
        }).then(willDelete => {
          if (willDelete) {
            $("#modal-form-add").modal("toggle");
            location.reload(true);
          }
        });
      } else {
        swal("Maaf !", res["msg"], "error");
      }
    },
    error: function(e) {
      swal("Maaf !", "Terjadi Kesalahan !", "error");
    }
  });
};

const delete_data = element => {
  swal({
    title: "Apakah Anda Yakin Akan Menghapus?",
    icon: "warning",
    buttons: true,
    dangerMode: true
  }).then(willDelete => {
    if (willDelete) {
      $.ajax({
        url: $(element).data("href"),
        data: { id: $(element).data("id") },
        type: "POST",
        dataType: "json",
        success: function(res) {
          if (res["status"]) {
            swal({
              text: res["msg"],
              icon: "success"
            }).then(willDelete => {
              if (willDelete) {
                $("#modal-form-add").modal("toggle");
                location.reload(true);
              }
            });
          } else {
            swal("Maaf !", res["msg"], "error");
          }
        },
        error: function(err) {
          swal("Maaf !", "Terjadi Kesalahan !", "error");
        }
      });
    }
  });
};
