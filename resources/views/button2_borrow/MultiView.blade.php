<!DOCTYPE html>
 
<html>
<head>
    <title>Demo</title>
    
    <script type="text/javascript">
       $("#close1_open2").click(function() {
    $("#modal1").modal('hide');
    $("#modal2").modal('show');
});
    </script>
    <style>
       
    </style> 
</head>
<body>
   <button class="btn btn-primary" data-toggle="modal" data-target="#modal1">modal 1</button>

<div id="modal1" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-body">
            <p>this is modal no. 1</p>
            <button id="close1_open2" type="button" class="btn btn-primary">close & open modal 2</button>
        </div>
    </div>
  </div>
</div>

<button class="btn btn-primary" data-toggle="modal" data-target="#modal2">modal 2</button>

<div id="modal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-body">
            <p>this is modal no. 2</p>
        </div>
    </div>
  </div>
</div>
</body>
</html>