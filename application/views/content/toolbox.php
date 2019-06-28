  
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
  .tool-last{
    position: relative; 
    width: 100%; 
    z-index: 2
  }
  .relbox{
    position: relative;
  }
  .lblKembali{
    padding-right: 10px;
  }
  .top-border{
    border-style: none;
    border-top: solid black-grey;
  }
  .no-margin {
    margin-bottom: 0px !important;
  }
  .mg-right-20 {
    margin-right: 20px !important;
  }

  @media screen and (min-width: 767px) {
    ul.pagination {
      white-space: nowrap !important;
    }
  }

  @media screen and (max-width: 769px) {
    li.paginate_button.previous {
        display: inline;
    }
 
    li.paginate_button.next {
        display: inline;
    }
 
    li.paginate_button {
        display: none;
    }
    .ckPinjam, .ckKembali, .ckRusak, .ckKRusak{
      width: 20px;
      height: 20px;
    }
    .radio {
      width: 20px;
      height: 20px;
    }
  }
</style>    

<div class="row">
  <div class="col-md-6">
    <div class="card ">
      <div class="card-header ">
        <h5 class="card-title">Status <?=$lemari->b_nama?></h5>
      </div>
      <div class="card-body ">
        <div class="relbox">
          <?php if (count($alat) > 0){
            $class = "lemari-bg";
          } else {            
            $class = "tool-last";
          }
          ?>
          <img class="<?=$class?>" src="<?=base_url('assets/images/backgrounds/'.$lemari->b_background.'?dasd')?>">
          
          <?php 
          $i=1;
          foreach($alat as $a){ 

            
                if($jml_alat > $i){
                ?>
                <img class="tool" src="<?=base_url('assets/images/tools/'.$a->t_gambar.'?asd')?>">
              <?php } else { ?>
                <img class="tool-last" src="<?=base_url('assets/images/tools/'.$a->t_gambar.'?asd')?>">
              <?php } ?>


          <?php $i++; } ?>



          <i class="fa fa-circle text-warning"></i> Tidak dilemari / tidak dapat digunakan
        </div>
      </div>
      <div class="card-footer ">
        <div class="legend" style="display: none;">
        </div>
          <?php if($this->session->userdata('u_username') == 'admin'){?>
          <div class="text-center">
            <a data-url="<?=base_url('reset/'.$lemari->b_id)?>" class="btn btn-default" id="reset">Reset</a>
          </div>
          <?php }?>
        <hr>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card card-chart">
      <div class="card-header">
        <h5 class="card-title">Pilih aksi di bawah</h5>
        <p class="card-category" style="display: none">Line Chart with Points</p>
      </div>
      <div class="card-body">
            <?php
            function kondisi($k){
              if($k == 0){
                return '<i class="fa fa-circle text-success"></i>';
              } else if($k == 1){
                return '<i class="fa fa-circle text-danger"></i>';
              }
            }
            function cond($k){
              if($k == 0){
                return 'Baik';
              } else if($k == 1){
                return 'Rusak';
              }
            }
            $i = 1;
            ?>
            <?php if (count($alat) > 0) { ?>
              <div class="text-center border-top"><h5 class="no-margin">Peminjaman</h5></div>
              <label for="aid">Pilih alat:</label><br/>
              <div class="row">
                <?php foreach($alat as $al){ ?>
                  <div class="col-xs-6 col-sm-6">
                    <div class="form-inline">
                      <label for="ckPinjam<?=$al->t_id?>">
                        <input class="ckPinjam" type="checkbox" name="ckPinjam" id="ckPinjam<?=$al->t_id?>" value="<?=$al->t_id?>" data-code="<?=$al->t_kode?>" data-kond="<?=$al->t_kondisi?>" data-cond="<?=cond($al->t_kondisi)?>"><span><?=kondisi($al->t_kondisi)?> <?=$al->t_nama?></span>
                      </label>
                    </div>
                  </div>
                <?php $i++; } ?>
              </div>
              <div class="text-center">
                <button href="#" class="btn btn-info btn-act" data-act="2" data-mdl="Pinjam">Pinjam</button>
              </div>
            <?php } ?>

            <?php if (count($rusak_alat) > 0) { ?>
              <div class="text-center border-top"><h5 class="no-margin">Perbaikan</h5></div>
              <label for="aid">Pilih alat:</label><br/>
              <div class="row">
                <?php foreach($rusak_alat as $ral){ ?>
                  <div class="col-xs-6 col-sm-6">
                    <div class="form-inline">
                      <label for="ckRusak<?=$ral->t_id?>">
                        <input class="ckRusak" type="checkbox" name="ckRusak" id="ckRusak<?=$ral->t_id?>" value="<?=$ral->t_id?>" data-code="<?=$ral->t_kode?>" data-kond="<?=$ral->t_kondisi?>" data-cond="<?=cond($ral->t_kondisi)?>"><span><?=kondisi($ral->t_kondisi)?> <?=$ral->t_nama?></span>
                      </label>
                    </div>
                  </div>
                <?php $i++; } ?>
              </div>
              <div class="text-center">
                <button href="#" class="btn btn-warning btn-act" data-act="2" data-mdl="Rusak">Perbaiki</button>
              </div>
            <?php } ?>        

            <?php if (count($kembali_alat) > 0) { ?>
              <div class="text-center border-top"><h5 class="no-margin">Pengembalian</h5></div>
              <label for="aid2">Pilih alat:</label>
              <div class="row">
              <?php foreach($kembali_alat as $kal){ ?>
                      <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-inline">
                          <label for="ckKembali<?=$kal->t_id?>" class="lblKembali">
                            <input class="ckKembali" type="checkbox" name="ckKembali" id="ckKembali<?=$kal->t_id?>" value="<?=$kal->t_id?>" data-code="<?=$kal->t_kode?>"><span><?=kondisi($kal->t_kondisi)?> <?=$kal->t_nama?></span>
                          </label>
                          <label for="ckKembali" class="lblKembali">
                            <input type="radio" class="radio" name="<?=$kal->t_kode?>" value="0" data-cond="Baik" checked><b>Baik</b>
                            <input type="radio" class="radio" name="<?=$kal->t_kode?>" value="1" data-cond="Rusak"><b>Rusak</b>
                          </label>
                          </div>
                      </div>
              <?php } ?>
              </div>
              <div class="text-center">
                <button href="#" class="btn btn-danger btn-act" data-act="4" data-mdl="Kembalikan">Kembalikan</button>
              </div>
            <?php } ?>

            <?php if (count($kembali_rusak_alat) > 0) { ?>
              <div class="text-center border-top"><h5 class="no-margin">Pengembalian Perbaikan</h5></div>
              <label for="aid">Pilih alat:</label><br/>
              <div class="row">
                <?php foreach($kembali_rusak_alat as $kral){ ?>
                  <div class="col-xs-6 col-sm-6">
                    <div class="form-inline">
                      <label for="ckKRusak<?=$kral->t_id?>">
                        <input class="ckKRusak" type="checkbox" name="ckKRusak" id="ckKRusak<?=$kral->t_id?>" value="<?=$kral->t_id?>" data-code="<?=$kral->t_kode?>" data-kond="<?=$kral->t_kondisi?>" data-cond="<?=cond($kral->t_kondisi)?>"><span><?=kondisi($kral->t_kondisi)?> <?=$kral->t_nama?></span>
                      </label>
                    </div>
                  </div>
                <?php $i++; } ?>
              </div>
              <div class="text-center">
                <button href="#" class="btn btn-danger btn-act" data-act="4" data-mdl="KembaliRusak">Kembalikan</button>
              </div>
            <?php } ?>
       
        <div class="error" id="notif">
        </div>


      </div>

      <div class="card-footer">
        <div class="chart-legend">Kondisi: 
          <i class="fa fa-circle text-success"></i> Baik
          <i class="fa fa-circle text-danger"></i> Rusak
        </div>
        <hr/>
        <div class="card-stats" style="display: none">
          <i class="fa fa-check"></i> Data information certified
        </div>
      </div>
    </div>
  </div>


  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="card ">
      <div class="card-header">
        <h5 class="card-title">History <?=$lemari->b_nama?></h5>
      </div>
      <div class="card-body">
      <table class="table table-striped table-responsive" id="mytable" style="width:100% !important;">
        <thead>
          <tr>
            <th style="width: 130px">Tanggal</th>
            <th>Users</th>
            <th>Lemari</th>
            <th>Alat</th>
            <th>Status</th>
            <th>Kondisi</th>
          </tr>
        </thead>
      </table>
      </div>
    </div>
  </div>

  <div class="modal fade" id="process" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm text-center">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="margin-top: 0px">Process...</h4>
        </div>
        <div class="modal-body">          
          <p class="writeNotif">Tunggu sebentar, kunci magnet akan terbuka</p>
          <div class="process text-center"></div>
          <div id="notif2"></div>

          <p class="readyNotif">Setelah ambil/taruh alat, tutup lemari dan tekan tombol selesai</p>
            <text id="allLemari" class="allLemari" hidden></text>
            <text id="allToolFalse" class="allToolFalse" type="text" hidden></text>
            <text id="allId" class="allId" type="text" hidden></text>
            <text id="allKond" class="allKond" type="text" hidden></text>
          <button type="button" class="btn btn-success" id="done">Selesai</button>
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
          <h5 class="modal-title" style="margin-top: 0px">Konfirmasi untuk mereset database?</h5>
        </div>
        <div class="modal-body" id="modal-body">
          <a href="<?=base_url('reset/'.$lemari->b_id)?>">
          <button type="button" class="btn btn-danger" id="confirmYes">Yes</button>
          </a>
           | 
          <button type="button" class="btn btn-default" id="confirmNo">No</button>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

</div>


<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
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

<script src="<?php echo base_url().'assets/table2excel/jquery.table2excel.js'?>"></script>

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

    var table = $("#mytable").dataTable({
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
        ajax: {"url": "<?php echo base_url().'get_json_history/1'?>", "type": "POST"},
          columns: [
            {"data": "h_tanggal"},
            {"data": "u_nama"},
            {"data": "b_nama"},
            {"data": "t_nama"},
            {
              "mData": "h_action",
              "mRender": function (data, type, row) {
                  return stringAction(row.h_action);
              },
              "searchable": true
            },
            {
              "mData": "t_kondisi",
              "mRender": function (data, type, row) {
                  return stringKondisi(row.t_kondisi);
              },
              "searchable": true
            }
          ],
          order: [[0, 'desc']],
          rowCallback: function(row, data, iDisplayIndex) {
              var info = this.fnPagingInfo();
              var page = info.iPage;
              var length = info.iLength;
              $('td:eq(0)', row).html();
          },
          lengthMenu: [ [10,25,50,-1], ['10','25','50','All'] ],
          //dom: 'Blfrtip',  
          dom: '<"float-left mg-right-20"f><"mg-right-20"l><"float-right mg-right-20"B>rt<"row"<"col-sm-3"i><"col-sm-9"p>>',
  
          buttons: 
          [
            // {
            //   extend: 'excelHtml5',
            //   title: 'History_<?=$lemari->b_nama?>_<?=date("d_m_Y")?>',
            //   filename: 'History_<?=$lemari->b_nama?>_<?=date("d_m_Y")?>',
            //   exportOptions: {
            //     columns: [ 0, 1, 2, 3, 4, 5 ]
            //   }
            // },
            {
              text: 'EXCEL',
              action: function ( e, dt, button, config ) {
                var data = dt.buttons.exportData();
                var header = (data.header);
                var body = (data.body);
                $.ajax(
                {
                  type:"post",
                  url: "<?=base_url()?>export/history.xlsx",
                  data:{ header:data.header, body:data.body},
                  success:function(response)
                  {
                    console.log(response);
                    window.location.href = "<?=base_url()?>History.xlsx";
                  },
                  error: function() 
                  {
                    var msg = '<b>Error</b> - Terjadi kesalahan pada server [Err 0004]';
                    isError2(msg);
                  }
                });

              }
            }
          ]

    });

    $( ".btn-act" ).click(function(event)
    {
      //ekstract data from HTML
      event.preventDefault();
      var img = '<img src="<?=base_url()?>assets/img/others/blink2.gif" width="100" id="imgLoading">';
      $('.process').append(img);
      $("#process").modal('show');
                $('.writeNotif').show(2000);
                $('.readyNotif').hide();
      $('.btn-act').attr('disabled',true);
      $('#done').attr('disabled', true);

      var act = $(this).data('act');
      var modul = $(this).data('mdl');
      //end ekstract data from HTML
      if(act == "2"){
        var mdl = "Pinjam";
      } else if (act = "4"){
        var mdl = "Kembalikan";
      }

      //create an array addres for API
      if (act == "2"){
        //var aid = $('#aid').val();
        if (modul == "Pinjam"){
          var ckLed = [];
          var ckTool= [];
          var ckToolFalse= [];
          var ckLemari= [];
          var ckId= [];
          var ckKond= [];
          $.each($("input[name='ckPinjam']:checked"), function(){
            var led = "tooling.<?=$lemari->b_kode?>."+$(this).data("code")+".Led";
            var toolAddr = "tooling.<?=$lemari->b_kode?>."+$(this).data("code")+"."+mdl;
            var toolKond = "tooling.<?=$lemari->b_kode?>."+$(this).data("code")+"."+$(this).data("cond");
            var lemari = "tooling.<?=$lemari->b_kode?>."+$(this).data("code")+".Lemari";
            var oneTool = '{"id":"' + toolAddr + '","v":' + true + '},{"id":"' + toolKond + '","v":' + true + '}';
            var oneToolFalse = '{"id":"' + toolAddr + '","v":' + false + '},{"id":"' + toolKond + '","v":' + false + '}';
            var Id = $(this).val();
            var kond = $(this).data('kond');
            ckLed.push(led);
            ckTool.push(oneTool);
            ckToolFalse.push(oneToolFalse);
            ckLemari.push(lemari);
            ckId.push(Id);
            ckKond.push(kond);
          });
        } else if (modul == "Rusak"){
          var ckLed = [];
          var ckTool= [];
          var ckToolFalse= [];
          var ckLemari= [];
          var ckId= [];
          var ckKond= [];
          $.each($("input[name='ckRusak']:checked"), function(){
            var led = "tooling.<?=$lemari->b_kode?>."+$(this).data("code")+".Led";
            var toolAddr = "tooling.<?=$lemari->b_kode?>."+$(this).data("code")+"."+mdl;
            var toolKond = "tooling.<?=$lemari->b_kode?>."+$(this).data("code")+"."+$(this).data("cond");
            var lemari = "tooling.<?=$lemari->b_kode?>."+$(this).data("code")+".Lemari";
            var oneTool = '{"id":"' + toolAddr + '","v":' + true + '},{"id":"' + toolKond + '","v":' + true + '}';
            var oneToolFalse = '{"id":"' + toolAddr + '","v":' + false + '},{"id":"' + toolKond + '","v":' + false + '}';
            var Id = $(this).val();
            var kond = $(this).data('kond');
            ckLed.push(led);
            ckTool.push(oneTool);
            ckToolFalse.push(oneToolFalse);
            ckLemari.push(lemari);
            ckId.push(Id);
            ckKond.push(kond);
          });
        }
      } else if (act == "4"){
        if (modul == "Kembalikan"){
          var ckLed = [];
          var ckTool= [];
          var ckToolFalse= [];
          var ckLemari= [];
          var ckId= [];
          var ckKond= [];
          $.each($("input[name='ckKembali']:checked"), function(){
            var led = "tooling.<?=$lemari->b_kode?>."+$(this).data("code")+".Led";
            var toolAddr = "tooling.<?=$lemari->b_kode?>."+$(this).data("code")+"."+mdl;
            var toolKond = "tooling.<?=$lemari->b_kode?>."+$(this).data("code")+"."+$('input[name="'+$(this).data("code")+'"]:checked').data('cond');
            var lemari = "tooling.<?=$lemari->b_kode?>."+$(this).data("code")+".Lemari";
            var oneTool = '{"id":"' + toolAddr + '","v":' + true + '},{"id":"' + toolKond + '","v":' + true + '}';
            var oneToolFalse = '{"id":"' + toolAddr + '","v":' + false + '},{"id":"' + toolKond + '","v":' + false + '}';
            var Id = $(this).val();
            var kond = $('input[name="'+$(this).data("code")+'"]:checked').val();
            ckLed.push(led);
            ckTool.push(oneTool); 
            ckToolFalse.push(oneToolFalse);
            ckLemari.push(lemari);
            ckId.push(Id);
            ckKond.push(kond);
            // console.log(oneTool);
          });
        } else if (modul == "KembaliRusak"){
          var ckLed = [];
          var ckTool= [];
          var ckToolFalse= [];
          var ckLemari= [];
          var ckId= [];
          var ckKond= [];
          $.each($("input[name='ckKRusak']:checked"), function(){
            var led = "tooling.<?=$lemari->b_kode?>."+$(this).data("code")+".Led";
            var toolAddr = "tooling.<?=$lemari->b_kode?>."+$(this).data("code")+"."+mdl;
            var toolKond = "tooling.<?=$lemari->b_kode?>."+$(this).data("code")+".Baik";
            var lemari = "tooling.<?=$lemari->b_kode?>."+$(this).data("code")+".Lemari";
            var oneTool = '{"id":"' + toolAddr + '","v":' + true + '},{"id":"' + toolKond + '","v":' + true + '}';
            var oneToolFalse = '{"id":"' + toolAddr + '","v":' + false + '},{"id":"' + toolKond + '","v":' + false + '}';
            var Id = $(this).val();
            var kond = "0";
            ckLed.push(led);
            ckTool.push(oneTool); 
            ckToolFalse.push(oneToolFalse);
            ckLemari.push(lemari);
            ckId.push(Id);
            ckKond.push(kond);
            // console.log(oneTool);
          });
        }
        // var aid = $('#aid2').val();
        // var acode = $('#aid2').find(':selected').data('code');
        // var akond = $('input[name=kondisi]:checked').val();
      }

      allLed = '["'+ckLed.join('", "')+'"]';
      allTool = '['+ckTool.join(', ')+']';
      allToolFalse = '['+ckToolFalse.join(', ')+']';
      allLemari = '["'+ckLemari.join('", "')+'"]';
      allId = ckId.join(',');
      allKond = ckKond.join(',');
      console.log(allLed);
      console.log(allTool);
      console.log(allToolFalse);
      console.log(allLemari);
      console.log(allId);
      console.log(allKond);
      if(ckLed.length == 0){
        var msg = '<b>Error</b> - Pilih alat terlebih dahulu [Err 0008]';
        isError(msg);
      } else {
      //end array API
        $('#done').data('act', act);
        $.ajax(
        {
          type:"POST",
          url: "http://192.168.3.41:39320/iotgateway/read",
          data: allLed,
          contentType:"application/json",
          processData: false,
          success:function(data)
          {
            var ledbol = data.readResults;
            console.log(ledbol);
            if(modul == "Pinjam") {
              var compare = (data.readResults).every(ckLedPinjam);
            } else if(modul == "Kembalikan") {
              var compare = (data.readResults).every(ckLedKembalikan);
            } else if(modul == "Rusak") {
              var compare = (data.readResults).every(ckLedRusak);
            } else if(modul == "KembaliRusak") {
              var compare = (data.readResults).every(ckLedKembaliRusak);
            }
            //cek syncronization
            console.log(compare);
            if (compare)
            {
              //send an input to PLC
              //console.log(addr);
              //console.log(kond);
              $.ajax(
              {
                type:"POST",
                url: "http://192.168.3.41:39320/iotgateway/write",
                data: allTool,
                contentType:"application/json",
                processData: false,
                success:function(response)
                {
                  // console.log(response);
                  $('#done').attr('disabled', false);
                  $('#allLemari').html(allLemari);
                  $('#allToolFalse').html(allToolFalse);
                  $('#allId').html(allId);
                  $('#allKond').html(allKond);
                  $('.writeNotif').hide();
                  $('.readyNotif').show();
                },
                error: function() 
                {
                  // console.log(response);
                  var msg = '<b>Error</b> - Terjadi kesalahan pada koneksi IoT gateway [Err 0001]';
                  isError(msg);
                }
              });
              //end input PLC
            } else {
              var msg = '<b>Error</b> - Periksa keadaan lemari fisik [Err 0002]';
              isError(msg);
            }
          },
          //end syncronization
          error: function(response) 
          {
            // console.log(response);
            var msg = '<b>Error</b> - Terjadi kesalahan pada koneksi IoT gateway [Err 0003]';
            isError(msg);
          }
        });
      }
      //end process ajax #1
    });

    $('#done').click(function(event){
      var kode = $('#done').data('kode');
      var id = $('#done').data('id');
      var act = $('#done').data('act');
      var kondisi = $('#done').data('kondisi');
	      // var debug = kode+id+act;
	      // console.log(debug);
      var lemariAddr = $('#allLemari').html();
      var allToolFalse = $('#allToolFalse').html();
      var ids = ($('#allId').html()).split(',');
      var konds = ($('#allKond').html()).split(',');
      $.ajax(
      {
        type:"POST",
        url: "http://192.168.3.41:39320/iotgateway/read",
        data:lemariAddr,
        contentType:"application/json",
        processData: false,
        success:function(data)
        {
          var lemariStat = (data.readResults).every(ckLemari);
          if(lemariStat){
            // var oneAddr = "tooling.<?=$lemari->b_kode?>."+kode+".";
            $.ajax(
            {
              type:"POST",
              url: "http://192.168.3.41:39320/iotgateway/write",
              data:allToolFalse,

              contentType:"application/json",
              processData: false,
              success:function(response)
              {
                // console.log(response);
                for (i = 0; i <= ids.length; i++) {
                  if (i == (ids.length)){
                    setTimeout(function() {
                      $('#imgLoading').remove();
                      $('#process').modal('hide');
                      isError2("Selesai", "success");
                      $('.btn-act').attr('disabled',false);  
                    }, 500);
                    setTimeout(function() {
                      window.location.replace("<?=base_url('lemari/'.$lemari->b_id)?>"); 
                    }, 1000);
                  } else {
                    $.ajax(
                    {
                      type:"post",
                      url: "<?=base_url()?>action",
                      data:{ act:act, bid:<?=$lemari->b_id?>, aid:ids[i], kondisi:konds[i]},
                      success:function(response)
                      {

                      },
                      error: function() 
                      {
                        var msg = '<b>Error</b> - Terjadi kesalahan pada server [Err 0004]';
                        isError2(msg);
                      }
                    });
                  }
                }
              },
              error: function() 
              {
                var msg = '<b>Error</b> - Terjadi kesalahan pada koneksi IoT gateway [Err 0005]';
                isError2(msg);
              }
            });
          } else {
            var msg = '<b>Error</b> - Selesaikan proses peminjaman/pengembalian terlebih dahulu [Err 0006]';
            isError2(msg);
          }
        },
        error: function() 
        {
          var msg = '<b>Error</b> - Terjadi kesalahan pada koneksi IoT gateway [Err 0007]';
          isError2(msg);
        }
      });
    });

    $('#reset').click(function(event){
      $('#confirmModal').modal('show');
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

    function isError (msg, alert = 'danger'){      
            var msgErr = '<div class="alert alert-'+alert+' alert-dismissible fade show" id="warn">'+
              '<button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">'+
                '<i class="nc-icon nc-simple-remove"></i>'+
              '</button>'+
              '<span id="msgErr">'+msg+'</span>'+
            '</div>';

            $('#notif').append(msgErr);
            setTimeout(function() {
              $('#imgLoading').remove();
              $('#process').modal('hide');
            }, 500);
            $('.btn-act').attr('disabled',false);
            setTimeout(function(){ $('#warn').remove(); }, 3000);
          }

    function isError2 (msg, alert = 'danger'){      
            var msgErr = '<div class="alert alert-'+alert+' alert-dismissible fade show" id="warn2">'+
              '<button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">'+
                '<i class="nc-icon nc-simple-remove"></i>'+
              '</button>'+
              '<p id="msgErr">'+msg+'</p>'+
            '</div>';

            $('#notif2').append(msgErr);            
            setTimeout(function(){ $('#warn2').remove(); }, 3000);
          }

    function stringAction(intg){
      if(intg == 1){
        var act = "Ambil";
      } else if(intg == 2){
        var act = "Pinjam";
      } else if(intg == 3){
        var act = "taruh";
      } else if(intg == 4){
        var act = "Kembalikan";
      }
      return act;
    };

    function cleanMyResult(result) {
	    const cleanResult = Object.assign({}, result); // this will preserve your original object, but it costs some performance
	    delete cleanResult.t;
	    delete cleanResult.r;
	    return cleanResult;
	}

    function stringKondisi(intg){
      if(intg == 0){
        var cond = "Baik";
      } else if(intg == 1){
        var cond = "Rusak";
      }
      return cond;
    };

    function ckLedPinjam(led) {
      return led.v == 0;
    }
    function ckLedKembalikan(led) {
      return led.v == 1;
    }
    function ckLedRusak(led) {
      return led.v == 1;
    }
    function ckLedKembaliRusak(led) {
      return led.v == 1;
    }
    function ckLemari(mag) {
      return mag.v == 1;
    }


  });

  // $(document).ready(function() {
  //     // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
  //     demo.initChartsPages();
      
  //   });


  function download(filename, text) {
                file = new Blob( [ JSON.stringify( text ) ] );
                var url = URL.createObjectURL(file);
    var pom = document.createElement('a');
    pom.setAttribute('href', url);
    pom.setAttribute('download', filename);
    pom.click();

    // if (document.createEvent) {
    //     var event = document.createEvent('MouseEvents');
    //     event.initEvent('click', true, true);
    //     pom.dispatchEvent(event);
    // }
    // else {
    //     pom.click();
    // }
}

// download('test.txt', 'Hello world!');
  </script>
</body>

</html>