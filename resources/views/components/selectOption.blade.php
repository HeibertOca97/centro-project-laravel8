@if ($action == 'create')
  @if(!$returnValue)
    <option value="">Seleccione un usuario ....</option>
  @endif
  @foreach ($users as $user)
    @if ($user->nombres && $user->apellidos)
      @if ("{$user->id}" === $returnValue)
        <option value="{{$user->id}}">{{$user->nombres}} {{$user->apellidos}}</option>
        @foreach (App\Models\User::where('id','!=',$returnValue)->get() as $item)
          <option value="{{$item->id}}">{{$item->nombres}} {{$item->apellidos}}</option>
        @endforeach
      @elseif(!$returnValue)
        <option value="{{$user->id}}">{{$user->nombres}} {{$user->apellidos}}</option>
      @endif
    @endif
  @endforeach
@endif

@if($action == 'edit')
  @if(!$returnValue)
    <option value="{{$miembro->id}}">{{$miembro->nombres}} {{$miembro->apellidos}}</option>
  @endif
  @foreach ($users as $user)
    @if ($user->nombres && $user->apellidos)
      @if ("{$user->id}" === $returnValue)
        <option value="{{$user->id}}">{{$user->nombres}} {{$user->apellidos}}</option>
        @foreach (App\Models\User::where('id','!=',$returnValue)->get() as $item)
          <option value="{{$item->id}}">{{$item->nombres}} {{$item->apellidos}}</option>
        @endforeach
      @elseif(!$returnValue)
        <option value="{{$user->id}}">{{$user->nombres}} {{$user->apellidos}}</option>
      @endif
    @endif
  @endforeach
  
@endif