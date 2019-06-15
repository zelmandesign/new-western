{{--  Menu Modal  --}}
<div class="modal fade full-menu-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">
            @include('partials.menu')
          </div>
        </div>
        <div class="modal-footer">
          <center><button type="button" class="btn btn-lg btn-outline-dark" data-dismiss="modal">Close</button></center>
        </div>
    </div>
  </div>
</div>