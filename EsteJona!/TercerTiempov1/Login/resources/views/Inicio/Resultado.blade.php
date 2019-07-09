

@foreach($empleado as $emp)
{{ $emp->TipoUsuario->TipoUsuario}}
{{ $emp->Nombre}}

@endforeach
