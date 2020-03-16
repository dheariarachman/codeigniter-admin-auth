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
  //   $(".summernote").summernote({
  //     height: 10,
  //     minHeight: null,
  //     maxHeight: null
  //   });
});

$("#modal-form-add").on("show.bs.modal", function(evt) {
  let attr = $(evt.relatedTarget);
  let element = attr.data("action");
  switch (element) {
    case "edit":
      $.get(
        $(attr).data("href"),
        { id: $(attr).data("id") },
        function(res) {
          if (res["status"]) {
            Object.entries(res["msg"]).forEach(([id, value]) => {
              if (value !== "") {
                switch (
                  $(evt.currentTarget).find('[name="' + id + '"]')[0].type
                ) {
                  case "checkbox":
                    if (value == 1) {
                      $(evt.currentTarget)
                        .find('[name="' + id + '"]')
                        .prop("checked", true);
                    }
                    break;
                  case "select":
                    // $(evt.currentTarget)
                    //   .find('[name="' + id + '"]')
                    //   .val([]);
                    break;
                  default:
                    $(evt.currentTarget)
                      .find('[name="' + id + '"]')
                      .val(value);
                    break;
                }
              }
            });
          } else {
            swal("Maaf !", res["msg"], "error");
          }
        },
        "json"
      );
      break;
    case "add":
      $(this)
        .find("form")[0]
        .reset();
      $(this)
        .find('input[type="hidden"]')
        .val("");
      break;

    default:
      break;
  }
});

const save_data = id => {
  let formId = "#" + id;
  $(formId).submit(function(e) {
    let data = $(this).serializeArray();
    let urlAction = $(this).attr("action");
    e.preventDefault();
    $(this).ajaxSubmit({
      url: urlAction,
      data: data,
      dataType: "json",
      cache: false,
      success: function(res) {
        if (res["status"]) {
          swal({
            title: res["msg"],
            icon: "success"
          }).then(willDelete => {
            if (willDelete) {
              $("#modal-form-add").modal("toggle");
              location.reload(true);
            }
          });
        } else {
          swal("Maaf !", "error", "error");
        }
      },
      error: function(err) {
        swal("Maaf !", err, "error");
      }
    });
    return false;
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
