<form id="deleteAgentForm" action="/home/agent" method="POST">
  @csrf
  @method('DELETE')
  <input name="id" value="{{ $agent->id }}" style="display:none">
</form>
