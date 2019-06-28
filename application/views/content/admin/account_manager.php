  
  <link href="<?php echo base_url().'assets/datatables/css/jquery.datatables.min.css?123'?>" rel="stylesheet" type="text/css"/>
  <link href="<?php echo base_url().'assets/datatables/css/dataTables.bootstrap.css?123'?>" rel="stylesheet" type="text/css"/>
  <link href="<?php echo base_url().'assets/datatables/css/rowReorder.dataTables.min.css'?>" rel="stylesheet" type="text/css"/>
  <link href="<?php echo base_url().'assets/datatables/css/responsive.dataTables.min.css'?>" rel="stylesheet" type="text/css"/>
  <style type="text/css">
  .lemari-bg{
    width: 100%;
     position: absolute;
    display: block;
    z-index: 0;
  }
  .tool{
    width: 100%;
    position: absolute;
    z-index: 1;
  }
  .relbox{
    position: relative;
  }

  .dataTables_filter {
    float: left;
  }

  .float-right {
    display: absolute !important;
    float: right !important;
  }

  $errorMsgColor: #ff0000;

  .error {
    color: red !important;
  }

  @media screen and (max-width: 767px) {
    li.paginate_button.previous {
        display: inline;
    }
 
    li.paginate_button.next {
        display: inline;
    }
 
    li.paginate_button {
        display: none;
    }
  }
</style>    

  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="card ">
      <div class="card-header">
        <h5 class="card-title">Semua User</h5>
      </div>
      <div class="card-body">
          <table class="table table-striped table-responsive" id="mytable" style="width:100% !important;">
            <thead>
              <tr>
                <th style="">No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Tanggal dibuat</th>
                <th>Terakhir Login</th>
                <th>Action</th>
              </tr>
            </thead>
          </table>
      </div>
    </div>
  </div>

  <div class="modal fade" id="tambahUser" role="dialog">
    <div class="modal-dialog modal-md text-left">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="margin-top: 0px">Tambah user</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open_multipart('insert_user', 'id="insertUser"'); ?>
          <div class="">
              <label for="name">Nama :</label>
              <input type="text" class="form-control" id="name" placeholder="" name="name" autocomplete="off">
              <label class="error" for="name" style="color : red; display: none"></label>
          </div>
          <div class="">
              <label for="username">Username :</label>
              <input type="text" class="form-control" id="username" placeholder="" name="username" autocomplete="off">
              <label class="error" for="username" style="color : red; display: none"></label>
          </div>
          <div class="">
              <label for="password">Password :</label>
              <input type="password" class="form-control" id="password" placeholder="" name="password" autocomplete="off">
              <label class="error" for="password" style="color : red; display: none"></label>
          </div>
          <div class="">
              <label for="repassword">Ulangi Password :</label>
              <input type="password" class="form-control" id="repassword" placeholder="" name="repassword" autocomplete="off">
              <label class="error" for="repassword" style="color : red; display: none"></label>
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
          <?php echo form_close() ?>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="updateUser" role="dialog">
    <div class="modal-dialog modal-md text-left">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="margin-top: 0px">Edit user</h4>
        </div>
        <div class="modal-body" id="modal-body">
          <?php echo form_open_multipart('update_user', 'id="upUser"'); ?>
          <div class="">
              <label for="rename">Nama :</label>
              <input type="text" class="form-control" id="rename" placeholder="" name="rename" autocomplete="off">
              <label class="error" for="rename" style="color : red; display: none"></label>
          </div>
          <div class="">
              <label for="reusername">Username :</label>
              <input type="text" class="form-control" id="reusername" placeholder="" name="reusername" autocomplete="off">
              <label class="error" for="reusername" style="color : red; display: none"></label>
          </div>
          <div class="">
              <label for="repassword1">Password :</label>
              <input type="password" class="form-control" id="repassword1" placeholder="" name="repassword1" autocomplete="off">
              <label class="error" for="repassword1" style="color : red; display: none"></label>
          </div>
          <div class="">
              <label for="repassword2">Ulangi Password :</label>
              <input type="password" class="form-control" id="repassword2" placeholder="" name="repassword2" autocomplete="off">
              <label class="error" for="repassword2" style="color : red; display: none"></label>
          </div>
              <input id="reid" placeholder="" name="reid" hidden disabled>
          <button type="submit" class="btn btn-default">Submit</button>
          <?php echo form_close() ?>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="confirmModal" role="dialog">
    <div class="modal-dialog modal-sm text-left">
      <div class="modal-content text-center">        
        <div class="modal-header">
          <h5 class="modal-title" style="margin-top: 0px">Konfirmasi untuk menghapus user ini?</h5>
        </div>
        <div class="modal-body" id="modal-body">
          <button type="button" class="btn btn-danger" id="confirmYes">Yes</button> | 
          <button type="button" class="btn btn-default" id="confirmNo">No</button>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

</div>


<script src="<?php echo base_url().'assets/js/jquery.validate.min.js'?>"></script>
<script src="<?php echo base_url().'assets/datatables/js/jquery.datatables.min.js?123'?>"></script>
<script src="<?php echo base_url().'assets/datatables/js/dataTables.responsive.min.js'?>"></script>
<script src="<?php echo base_url().'assets/datatables/js/dataTables.rowReorder.min.js'?>"></script>
<script src="<?php echo base_url().'assets/datatables/js/dataTables.bootstrap.js'?>"></script>
<script src="<?php echo base_url().'assets/datatables/js/bootstrap.js'?>"></script>

<script src="<?php echo base_url().'assets/datatables/js/dataTables.buttons.min.js'?>"></script>
<script src="<?php echo base_url().'assets/datatables/js/buttons.bootstrap.min.js'?>"></script>

<script type="text/javascript" src="<?php echo base_url()?>assets/datatables/js/pdfmake.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/datatables/js/jszip.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/datatables/js/vfs_fonts.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/datatables/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/datatables/js/buttons.colVis.min.js"></script>
<script type="text/javascript">
  $( document ).ready(function() {
    // Setup datatables
    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
    {
        return {
            "iStart": oSettings._iDisplayStart,
            "iEnd": oSettings.fnDisplayEnd(),
            "iLength": oSettings._iDisplayLength,
            "iTotal": oSettings.fnRecordsTotal(),
            "iFilteredTotal": oSettings.fnRecordsDisplay(),
            "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
            "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
        };
    };

    var table = $("#mytable").dataTable(
    {
      responsive: true,
      initComplete: function() {
          var api = this.api();
          $('#mytable_filter input')
              .off('.DT')
              .on('input.DT', function() {
                  api.search(this.value).draw();
          });
      },
          oLanguage: {
          sProcessing: "loading..."
      },
      processing: true,
      serverSide: true,
      ajax: {"url": "<?php echo base_url().'get_json_users'?>", "type": "POST"},
      columns: [
            {
              "data": null,
                      "orderable": false
            },
            {"data": "u_nama"},
            {"data": "u_username"},
            {"data": "u_created"},
            {"data": "u_last_login"},
            {
              "mRender": function (data, type, row) {
                  return stringKondisi(row.u_id);
                  // return '<button class="modalUpdate btn btn-sm btn-warning nc-icon nc-settings-gear-65" data-id="'+row.u_id+'"></button> '+
                  //     '<button class="deleteUser btn btn-sm btn-danger nc-icon nc-simple-remove" data-id="'+row.u_id+'" onClick="test();"></button>';
              },
              "searchable": false,
              "orderable": false
            }
      ],               
      columnDefs: 
      [
        {
          "searchable": false,
          "orderable": false,
          "targets": 0
            
        },
      ] ,
      order: [[3, 'asc']],
      rowCallback: function(row, data, iDisplayIndex) {
          var info = this.fnPagingInfo();
          var page = info.iPage;
          var length = info.iLength;
          var index = page * length + (iDisplayIndex + 1);
          $('td:eq(0)', row).html(index);
      },
      dom: '<"float-left mg-right-20"f><"mg-right-20"l><"float-right mg-right-20"B>rt<"row"<"col-sm-3"i><"col-sm-9"p>>',
      buttons: 
      [
        {
          //extend: 'Create',
          text: 'Tambah Users',
          className: 'btn btn-info btn-md',
          action: function ( e, dt, button, config ) {
            $('#tambahUser').modal('show');
          }          
        },
        // {
        //   extend: 'excel',
        //   title: 'User_<?=date("d_m_Y")?>',
        //   filename: 'User_<?=date("d_m_Y")?>',
        //   exportOptions: {
        //     columns: [ 1, 2, 3, 4 ]
        //   }
        // },
        {
          text: 'EXCEL',
          exportOptions: {
            columns: [ 1, 2, 3, 4 ]
          },
          action: function ( e, dt, button, config ) {
            var data = dt.buttons.exportData();
            var header = (data.header);
            var body = (data.body);
            $.ajax(
            {
              type:"post",
              url: "<?=base_url()?>export/user.xlsx",
              data:{ header:data.header, body:data.body},
              success:function(response)
              {
                console.log(response);
                window.location.href = "<?=base_url()?>User.xlsx";
              },
              error: function() 
              {
                alert( '<b>Error</b> - Terjadi kesalahan pada server [Err 0004]');
              }
            });

          }
        }
      ]
    });


    jQuery.validator.addMethod("alphanumeric", function(value, element) {
      return this.optional(element) || /^[\w.]+$/i.test(value);
    }, "Letters, numbers, and underscores only please");

    jQuery.validator.addMethod("alphanumerics", function(value, element) {
      return this.optional(element) || /^[\w.\s]+$/i.test(value);
    }, "Letters, numbers, and underscores only please");


    $('#insertUser').validate(
    {
      rules: {
        name: 
        {
          required: true,
          alphanumerics: true,
        },
        username: 
        {
          required: true,
          alphanumeric: true,
          minlength: 6,
          remote: {
            url: "<?=base_url()?>username_check",
            type: "post",
            data:
            {
              username: function()
              {
                  return $('#insertUser :input[name="username"]').val();
              }
            }
          }
        },
        password: 
        {
          required: true,
          minlength: 8
        },
        repassword: 
        {
          equalTo: "#password",
        }
      },
      messages: 
      {
        name: {
          required: "nama wajib diisi",
          alphanumerics: "nama mengandung karakter yang tidak diijinkan",
        },
        username: {
          required: "username wajib diisi",
          alphanumeric: "username mengandung karakter yang tidak diijinkan",
          minlength: "username harus lebih dari 6 karakter",
          remote: jQuery.validator.format("'{0}' sudah digunakan")
        },
        password: {
          required: "password wajib diisi",
          minlength: "password harus lebih dari 8 karakter"
        },
        repassword: {
          equalTo: "password harus sama",
        },
      },
      submitHandler: function(form) {
        form.submit();
      }
    });

    $('#upUser').validate(
    {
      rules: {
        rename: 
        {
          required: true,
          alphanumerics: true,
        },
        reusername: 
        {
          required: true,
          alphanumeric: true,
          minlength: 6,
          remote: {
            url: "<?=base_url()?>reusername_check/",
            type: "post",
            data:
            {
              id: function()
              {
                  return $('#upUser :input[name="reid"]').val();
              },
              username: function()
              {
                  return $('#upUser :input[name="reusername"]').val();
              }
            },
          }
        },
        repassword1: 
        {
          required: true,
          minlength: 8
        },
        repassword2: 
        {
          equalTo: "#repassword1",
        }
      },
      messages: 
      {
        rename: {
          required: "nama wajib diisi",
          alphanumerics: "nama mengandung karakter yang tidak diijinkan",
        },
        reusername: {
          required: "username wajib diisi",
          alphanumeric: "username mengandung karakter yang tidak diijinkan",
          minlength: "username harus lebih dari 6 karakter",
          remote: jQuery.validator.format("'{0}' sudah digunakan")
        },
        repassword1: {
          required: "password wajib diisi",
          minlength: "password harus lebih dari 8 karakter"
        },
        repassword2: {
          equalTo: "password harus sama",
        },
      },
      submitHandler: function(form) {
        form.submit();
      }
    });

    $('#mytable tbody').on('click', 'button.modalUpdate', function (e) {
      var id = $(this).val();
      $.ajax(
      {
        type:"POST",
        url: "<?=base_url()?>get_user",
        data: {id:id},
        success:function(response)
        {
          // console.log(response);
          $('#upUser').attr({action : '<?=base_url("update_user/")?>'+response.u_id
          });
          $('#rename').val(response.u_nama);
          $('#reusername').val(response.u_username);
          $('#reid').val(response.u_id);
          $('#updateUser').modal('show');
        },
        error: function(response) 
        {
          console.log(response);
        }
      });
    });

    $('#mytable tbody').on('click', 'button.deleteUser', function (e) {
      var id = $(this).val();
      $('#confirmModal').modal('show');
      $('#confirmYes').data('url', "<?=base_url()?>delete_user/"+id);
      console.log($('#confirmYes').data('url'));
      // if(confirm('Yakin mau dihapus?')){
      //   window.location.replace("<?=base_url()?>delete_user/"+id);
      // }
    });

    $('#confirmYes').click(function(){
      var url = $(this).data('url');
      window.location.replace(url);
    });

    $('#confirmNo').click(function(){
      $('#confirmModal').modal('hide');
    });

    function stringKondisi(intg){
      if(intg == 1){
        var buttonAct = '<button class="btn btn-sm btn-warning nc-icon nc-settings-gear-65" disabled></button> '+
        '<button class="btn btn-sm btn-danger nc-icon nc-simple-remove" disabled></button>';
      }else {
        var buttonAct = '<button class="modalUpdate btn btn-sm btn-warning nc-icon nc-settings-gear-65" value="'+intg+'"></button> '+
        '<button class="deleteUser btn btn-sm btn-danger nc-icon nc-simple-remove" value="'+intg+'"></button>';        
      }
      return buttonAct;
    };

    $('.dt-buttons').addClass('col-md-8');
    $('.dataTables_filter').addClass('col-md-4');


  });

  </script>
</body>

</html>