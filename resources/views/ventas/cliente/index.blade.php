@extends ('layouts.admin')
@section ('contenido')
<div class="row"> 
	<div class="col-xs-12">
	<a href="cliente/create"><button class="btn btn-success">Nuevo Cliente</button></a>
	<h3 class="text-center"><strong>Listado de Clientes</strong> </h3><br>
		@include('ventas.cliente.search')
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
			<caption class="text-center">LISTADO DE CLIENTES</caption>

				<thead>
					<th>Id</th>
					<th>Nombres y Apellidos</th>
					<th>Tipo de documento</th>
					<th>Numero de documento</th>
					<th>Telefono</th>
					<th>Email</th> 
					<th>Opciones</th>
				</thead>
               @foreach ($personas as $per)
				<tr>
					<td>{{ $per->idpersona}}</td>
					<td>{{ $per->nombre}}</td>
					<td>{{ $per->tipo_documento}}</td>
					<td>{{ $per->num_documento}}</td>
					<td>{{ $per->telefono}}</td>
					<td>{{ $per->email}}</td>

					<td>
						<a href="{{URL::action('ClienteController@edit',$per->idpersona)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$per->idpersona}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('ventas.cliente.modal')
				@endforeach
			</table>
		</div>
		{{$personas->render()}}
	</div>
</div>

@endsection