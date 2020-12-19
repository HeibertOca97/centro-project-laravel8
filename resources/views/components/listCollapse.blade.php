@if (preg_match("/crear/i", $accion) && !$permission)
  @foreach ($permissions as $key=>$value)
    @if (preg_match("/$modulo/i", $value)) 
      <tr class="collapse" id="{{$collapseName}}">
        <td>
          <input type="checkbox" name="permission[]" id="{{$modulo}}_{{$key}}" value="{{$value->name}}" @if (is_array(old('permission')) && in_array("$value->name",old('permission'))) checked @endif>
          <label for="{{$modulo}}_{{$key}}">{{$value->name}}</label></td>
        <td>@foreach ($value->descriptions() as $item) {{$item->nombre}}@endforeach</td>
      </tr>
    @endif
  @endforeach
@else
  @foreach ($permissions as $key=>$value)
    @if (preg_match("/$modulo/i", $value)) 
      <tr class="collapse" id="{{$collapseName}}">
        <td>
          <input type="checkbox" name="permission[]" id="{{$modulo}}_{{$key}}" value="{{$value->name}}" @if (is_array(old('permission')) && in_array("$value->name",old('permission'))) checked @elseif(is_array($permission) && in_array("$value->name",$permission)) checked @endif>
          <label for="{{$modulo}}_{{$key}}">{{$value->name}}</label></td>
        <td>@foreach ($value->descriptions() as $item) {{$item->nombre}}@endforeach</td>
      </tr>
    @endif
  @endforeach
@endif
