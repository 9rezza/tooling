
<style type="text/css">
  .listLemari {
    margin-left: 20px
  }
  .listLemari a {
    text-decoration:none; 
    color:grey;
  }
  .listLemari a:hover {
    text-decoration:none; 
    color:black;
  }
</style>
<div class="row">
  <div class="col-md-6">
    <div class="card ">
      <div class="card-header ">
        <h5 class="card-title">Pilih Lemari</h5>
      </div>
      <div class="card-body">
        <div class="relbox">
          <ul class="nav">
          <?php
            foreach ($list_lemari as $l) {
              ?>
              <li class="listLemari"><a href="<?=base_url('lemari/'.$l->b_id)?>"><h5><i class="nc-icon nc-settings"></i> <?=$l->b_nama?></h5></a></li>
          <?php
            }
          ?>            
          </ul>
        </div>
      </div>
      <div class="card-footer">
        <div class="legend" style="display: none">
          <i class="fa fa-circle text-primary"></i> Opened
          <i class="fa fa-circle text-warning"></i> Read
          <i class="fa fa-circle text-danger"></i> Deleted
          <i class="fa fa-circle text-gray"></i> Unopened
        </div>
        <hr>
        <div class="stats">
          <i class="fa fa-circle"></i> Pilih lemari untuk diakses
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card card-chart" style="display: none;">
      <div class="card-header">
        <h5 class="card-title">NASDAQ: AAPL</h5>
        <p class="card-category">Line Chart with Points</p>
      </div>
      <div class="card-body">
        <canvas id="speedChart" width="400" height="100"></canvas>
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
