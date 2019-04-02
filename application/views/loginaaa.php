<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$tittle?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
</head>

<body>
  <div class="container" style="margin-top: 15%;">
    <div class="row">
      <div class="col-md-4 col-md-offset-4" style="border: grey solid 4px">
        <div class="panel-heading">
          <h3 class="panel-title">Sign In To Continue</h3>
        </div>
        <div class="panel-body">
          <form role="form" method="post" action="<?=site_url('login/')?>">
            <fieldset>
              <div class="form-group">
                <input class="form-control" placeholder="Username" name="username" id="username">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Password" name="password" id="password" type="password" value="">
              </div>
              <div class="checkbox">
                <label>
                  <input name="remember" type="checkbox" value="yes">Remember Me
                </label>
              </div>
              <!-- Change this to a button or input when using this as a form -->
              <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>