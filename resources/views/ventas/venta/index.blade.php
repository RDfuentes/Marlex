@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-xs-12">
		<a href="venta/create"><button class="btn btn-success">Ingresar nueva venta</button></a>
		<h3 class="text-center"><strong>Listado de Ventas</strong></h3>
		@include('ventas.venta.search')
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
			<caption class="text-center">LISTADO DE VENTAS</caption>

				<thead>
					<th>Fecha</th>
					<th>Cliente</th>
					<th>Comprobante</th>
					<th>Impuesto</th>
					<th>Total</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
               @foreach ($ventas as $ven)
				<tr>
					<td>{{ $ven->fecha_hora}}</td>
					<td>{{ $ven->nombre}}</td>
					<td>{{ $ven->tipo_comprobante.':'.$ven->serie_comprobante.':'.$ven->num_comprobante}}</td>
					<td>{{ $ven->impuesto}}</td>
					<td>{{ $ven->total_venta}}</td>
					<td>{{ $ven->estado}}</td>
					
					<td>
						<a href="{{URL::action('VentaController@show',$ven->idventa)}}"><button class="btn btn-primary">Detalles</button></a>
                         <a href="" data-target="#modal-delete-{{$ven->idventa}}" data-toggle="modal"><button class="btn btn-danger">Anular Ingreso</button></a>
					</td>
				</tr>
				@include('ventas.venta.modal')
				@endforeach
			</table>
		</div>
		{{$ventas->render()}}
	</div>
</div>

@endsection