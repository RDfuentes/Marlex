@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Usuarios <a href="usuario/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('seguridad.usuario.search')
	</div>
</div>

<div class="col-xs-2">
<a onclick="tableToExcel('example1', 'W3C Example Table')" 
target="_blank" class="btn btn-danger" class="text-muted"><i class="fa fa-print"></i> IMPRIMIR EXCEL</a> 
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table id="example1" class="table table-striped table-bordered table-condensed table-hover"
			summary="Code page support in different versions of MS Windows." rules="groups" frame="hsides">
			<caption class="text-center">LISTADO DE USUARIOS MARLEX</caption>

				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Correo/Usuario</th>
					<th>Opciones</th>
				</thead>
               @foreach ($usuarios as $usu)
				<tr>
					<td>{{ $usu->id}}</td>
					<td>{{ $usu->name}}</td>
					<td>{{ $usu->email}}</td>
					<td>
						<a href="{{URL::action('UsuarioController@edit',$usu->id)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$usu->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('seguridad.usuario.modal')
				@endforeach
			</table>
		</div>
		{{$usuarios->render()}}
	</div>
</div>

@endsection