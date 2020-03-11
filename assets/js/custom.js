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
  $.ajax({
    url: $(element).data("href"),
    data: { id: $(element).data("id") },
    type: "POST",
    dataType: "json",
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
        swal("Maaf !", res["msg"], "error");
      }
    },
    error: function(err) {
      swal("Maaf !", "Terjadi Kesalahan !", "error");
    }
  });
};

const edit_data = element => {
  let modalId = $(element).data("target");
  $(modalId).on("show.bs.modal", function(e) {
    $.get(
      $(element).data("href"),
      { id: $(element).data("id") },
      function(res) {
        if (res["status"]) {
          Object.entries(res["msg"]).forEach(([id, element]) => {
            $(e.currentTarget)
              .find('[name="' + id + '"]')
              .val(element);
          });
        } else {
          swal("Maaf !", res["msg"], "error");
        }
      },
      "json"
    );
  });
};