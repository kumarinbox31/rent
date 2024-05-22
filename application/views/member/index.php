<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=base_url('admin')?></title>
</head>
<body>
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-12" style="margin-top:5%">
          <div  class="text-center">
            <a href="<?=base_url('member/tenant/')?>add">
              <img src="<?=base_url('theme')?>/assets/icon/lease.gif" style="max-width: 50%;border-radius: 50%;">
              <p class="text-center">Add Tenant</p>
            </a>
          </div>
            
        </div>
        <div class="col-md-4 col-sm-12" style="margin-top:5%">
          <div class="text-center">
            <a href="<?=base_url('member/property/')?>add">
              <img src="<?=base_url('theme')?>/assets/icon/property.gif" style="max-width: 50%;border-radius: 50%;">
              <p class="text-center">Add Property</p>
            </a>
          </div>
            
        </div>
        <div class="col-md-4 col-sm-12" style="margin-top:5%">
          <div  class="text-center">
            <a href="<?=base_url('member/room/')?>add">
              <img src="<?=base_url('theme')?>/assets/icon/roomkey.gif" style="max-width: 50%;border-radius: 50%;">
              <p class="text-center">Add Room</p>
            </a>
          </div>
            
        </div>
      </div>
    </div>
</body>
</html>