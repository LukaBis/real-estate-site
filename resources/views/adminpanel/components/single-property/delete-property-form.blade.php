<form id="deletePropertyForm" action="/home/property" method="POST">
  @csrf
  @method('DELETE')
  <input name="id" value="{{ $property->id }}" style="display:none">
</form>
