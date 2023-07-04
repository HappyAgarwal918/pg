<?php   
if (Request::segment(1) == 'search') {
    $segment = Request::segment(1);
}else{
    $segment = Request::segment(2);
}
?>

<!-- Example single danger button -->
<div class="btn-group">
  <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    Sort By
  </button>
  <ul class="dropdown-menu dropdown-menu-end">
    <li><a class="dropdown-item seg" href="#" data-val="{{ $segment }}" onclick="sortBy('default')">Default</a></li>
    <li><a class="dropdown-item seg" href="#" data-val="{{ $segment }}" onclick="sortBy('latest')">Latest</a></li>
    <!-- <li><a class="dropdown-item" href="#" onclick="sortBy('lowprice')">Price Low to High</a></li>
    <li><a class="dropdown-item" href="#" onclick="sortBy('highprice')">Price High to Low</a></li> -->
  </ul>
</div>

<script type="text/javascript">
    function sortBy(id){
        var dataval = $('.seg').attr("data-val");
        console.log(dataval)
        $.ajax({
            url: "{{ route('sortby') }}",
            type: "POST",
            data: {id:id, dataval:dataval, _token: '{{csrf_token()}}'},

            success: function(property){
                Success = true;
                 $('#property').html(property);
            },
            error: function(err){
                Success = false;
                if (err.status == 401) {
                    window.location.href = "login";
                }
            } 
        });
    }
</script>