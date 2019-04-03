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
</style>


<div class="row">
  <div class="col-md-6">
    <div class="card ">
      <div class="card-header ">
        <h5 class="card-title">Status <?=$lemari->b_nama?></h5>
      </div>
      <div class="card-body ">
        <div class="relbox">
          <img class="lemari-bg" src="<?=base_url('assets/images/backgrounds/'.$lemari->b_background)?>">

          <?php 
          $i=1;
          foreach($alat as $a){ 

            
                if($jml_alat > $i){
                ?>
                <img class="tool" src="<?=base_url('assets/images/tools/'.$a->t_gambar)?>">
              <?php } else { ?>
                <img class="tool-last" style="position: relative; width: 100%; z-index: 2" src="<?=base_url('assets/images/tools/'.$a->t_gambar)?>">
              <?php } ?>


          <?php $i++; } ?>






        </div>
      </div>
      <div class="card-footer ">
        <div class="legend">
          <i class="fa fa-circle text-primary"></i> Opened
          <i class="fa fa-circle text-warning"></i> Read
          <i class="fa fa-circle text-danger"></i> Deleted
          <i class="fa fa-circle text-gray"></i> Unopened
        </div>
        <hr>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card card-chart">
      <div class="card-header">
        <h5 class="card-title">NASDAQ: AAPL</h5>
        <p class="card-category">Line Chart with Points</p>
      </div>
      <div class="card-body">
        <div class="text-center">
          <a href="<?=base_url()?>" class="btn btn-info btn-act">Pinjam</a>
          <a href="#" class="btn btn-warning btn-act">Kembalikan</a>
        </div>
        <div class="text-center process">

        </div>
      </div>
      <div class="card-footer">
        <div class="chart-legend">
          <i class="fa fa-circle text-info"></i> Tesla Model S
          <i class="fa fa-circle text-warning"></i> BMW 5 Series
        </div>
        <hr/>
        <div class="card-stats">
          <i class="fa fa-check"></i> Data information certified
        </div>
      </div>
    </div>
  </div>
</div>



<script type="text/javascript">
  $('.btn-act').click(function(event) {
    event.preventDefault();
    $(window).bind('beforeunload', function(){
      return false;
    });
    var img = '<img src="<?=base_url()?>assets/img/others/blink2.gif" width="100">';
    $('.process').append(img);
    $('.btn-act').attr('disabled', 'disabled');
  });

  $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();

      
    });
  </script>
</body>

</html>