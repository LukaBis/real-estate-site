<form id="deleteTestemonialForm" action="/home/testemonial" method="POST">
  @csrf
  @method('DELETE')
  <input name="id" value="{{ $testemonial->id }}" style="display:none">
</form>
