@extends ('layouts.admin')
@section ('contenido')

	<div id="example1" class="row" 
	summary="Code page support in different versions of MS Windows." rules="groups" frame="hsides">
	<h3 class="text-center">COMPROBANTE DE COMPRA</h3><br>

		
		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
			<div class="form-group">
            	<label for="fecha">Fecha</label>
				<p>{{$ingreso->fecha_hora}}</p>
            </div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
            	<label for="proveedor">Proveedor</label>
				<p>{{$ingreso->nombre}}</p>
            </div>
		</div>
		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
			<div class="form-group">
				<label>Tipo de Documento</label>
				<p>{{$ingreso->tipo_comprobante}}</p>
			</div>
		</div>
		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
			<div class="form-group">
            	<label for="serie_comprobante">Serie del Documento</label>
            	<p>{{$ingreso->serie_comprobante}}</p>
            </div>
		</div>
		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
			<div class="form-group">
            	<label for="num_comprobante">Numero del Documento</label>
            	<p>{{$ingreso->num_comprobante}}</p>
			</div>
		</div>

		<div class="row">
			<div class="panel-body">
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
						<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">

							<thead style="background-color: #109DFA; color: white">
								
								<th>articulos</th>
								<th>cantidad</th>
								<th>precio compra</th>
								<th>precio venta</th>
								<th>sub-total</th>
							</thead>
							<tfoot>
								
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th><h4 id="total">{{$ingreso->total}}</h4></th>
							</tfoot>
							<tbody>
								@foreach($detalles as $det)
								<tr>
									<td>{{$det->articulo}}</td>
									<td>{{$det->cantidad}}</td>
									<td>{{$det->precio_compra}}</td>
									<td>{{$det->precio_venta}}</td>
									<td>{{$det->cantidad*$det->precio_compra}}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
				</div>	
			</div>
		</div>

	</div>

		
	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
		<div class="form-group">
            <a class="btn btn-danger" href="{{ url('/compras/ingreso') }}" >Atras</a>
         </div>
	</div>

	<div class=""> 
		<a onclick="tableToExcel('example1', 'W3C Example Table')"
		target="_blank" class="btn btn-danger" class="text-muted"><i class="fa fa-print"></i> IMPRIMIR COMPROBANTE DE COMPRA</a> 
	</div>


 @endsection