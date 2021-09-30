<!-- Update pop up -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{__('Delete')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{ __('Are you sure you want to delete?') }}
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">{{__('Close')}}</button>
          <button
            type="button"
            onclick="event.preventDefault(); document.getElementById('deleteTestemonialForm').submit();"
            class="btn btn-danger">
            {{__('Delete')}}
          </button>
      <div>
    </div>
  </div>
</div>
