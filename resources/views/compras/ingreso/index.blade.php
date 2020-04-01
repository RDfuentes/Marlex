@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-xs-12">
		<a href="ingreso/create"><button class="btn btn-success">Ingresar nuevos productos</button></a>
		<h3 class="text-center"><strong>Listado de Ingresos de Productos</strong></h3>
		@include('compras.ingreso.search')
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
			<caption class="text-center">PRODUCTOS EXISTENTES</caption>

				<thead>
					<th>Id</th>
					<th>Fecha</th>
					<th>Proveedor</th>
					<th>Tipo Documento</th>
					<th>Serie Documento</th>
					<th>Numero Documento</th>
					<th>Impuesto</th>  
					<th>Total</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
               @foreach ($ingresos as $ing)
				<tr>
					<td>{{ $ing->idingreso}}</td>
					<td>{{ $ing->fecha_hora}}</td>
					<td>{{ $ing->nombre}}</td>
					<td>{{ $ing->tipo_comprobante}}</td>
					<td>{{ $ing->serie_comprobante}}</td>
					<td>{{ $ing->num_comprobante}}</td>
					<td>{{ $ing->impuesto}}</td>
					<td>{{ $ing->total}}</td>
					<td>{{ $ing->estado}}</td>
					<td>
						<a href="{{URL::action('IngresoController@show',$ing->idingreso)}}"><button class="btn btn-primary">Detalles</button></a>
                         <a href="" data-target="#modal-delete-{{$ing->idingreso}}" data-toggle="modal"><button class="btn btn-danger">Anular Ingreso</button></a>
					</td>
				</tr>
				@include('compras.ingreso.modal')
				@endforeach
			</table>
		</div>
		{{$ingresos->render()}}
	</div>
</div>

@endsection