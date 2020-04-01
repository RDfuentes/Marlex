@extends ('layouts.admin')
@section ('contenido')

	<div class="row">
		<div class="col-xs-12">
			<a class="btn btn-danger" href="{{ url('/compras/ingreso') }}" >Cancelar Ingreso</a>
			<h3 class="text-center"><strong>Nuevo Ingreso</strong></h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>
			{!!Form::open(array('url'=>'compras/ingreso','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

	<div class="row">
		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
			<div class="form-group">
            	<label for="proveedor">Proveedor</label>
            	<select name="idproveedor" id="idproveedor" class="form-control selectpicker" data-live-search="true">
					@foreach($personas as $persona)
					<option value="{{$persona->idpersona}}">{{$persona->nombre}}</option>
					@endforeach
				</select>
            </div>
		</div>
		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
			<div class="form-group">
				<label>Tipo de Documento</label>
				<select name="tipo_comprobante" class="form-control">
					<option value="factura">Factura</option>
					<option value="comprobante">Comprobante</option>
				</select>
			</div>
		</div>
		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
			<div class="form-group">
            	<label for="serie_comprobante">Serie del Documento</label>
            	<input type="text" name="serie_comprobante"   value="{{old('serie_comprobante')}}" class="form-control" placeholder="Serie del documento">
            </div>
		</div>
		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
			<div class="form-group">
            	<label for="num_comprobante">Numero del Documento</label>
            	<input type="text" name="num_comprobante"  required value="{{old('num_comprobante')}}" class="form-control" placeholder="Numero del documento">
            </div>
		</div>
	</div>

	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-body">
				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						<label>Articulo</label> <!-- selectpicket, es resultado de un css y js en la carpeta layouts->admin.blade.php -->
						<select name="pidarticulo" id="pidarticulo" class="form-control selectpicker" data-live-search="true">
							@foreach($articulos as $articulo)
							<option value="{{$articulo->idarticulo}}">{{$articulo->articulo}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<label for="cantidad">Cantidad</label>
						<input type="number" name="pcantidad" id="pcantidad" class="form-control" placeholder="Cantidad">
					</div>
				</div>
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<label for="precio_compra">Precio de compra</label>
						<input type="number" name="pprecio_compra" id="pprecio_compra" class="form-control" placeholder="Precio de compra">
					</div>
				</div>
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<label for="precio_venta">Precio de venta</label>
						<input type="number" name="pprecio_venta" id="pprecio_venta" class="form-control" placeholder="Precio de venta">
					</div>
				</div>

				<!-- BOTON PARA AGREGAR EL PRODUCTO Y OTROS -->
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<button type="button" id="btn_agregar" class="btn btn-primary">AGREGAR</button> 
					</div>
				</div>

				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
						<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
							<thead style="background-color: #109DFA; color: white">
								<th>Opciones</th>
								<th>articulos</th>
								<th>cantidad</th>
								<th>precio compra</th>
								<th>precio venta</th>
								<th>sub-total</th>
							</thead>
							<tfoot>
								<th>TOTAL</th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th><h4 id="total">Q. 0.00</h4></th>
							</tfoot>
							<tbody>
							
							</tbody>
						</table>
				</div>
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
			<div class="form-group">
				<input name="_token"  value="{{ csrf_token()  }}" type="hidden">
				<button class="btn btn-primary" type="submit">Guardar</button>
            	<a class="btn btn-danger" href="{{ url('/compras/ingreso') }}" >Cancelar</a>
            </div>
		</div>
	</div>
			{!!Form::close()!!}	

@push ('scripts')

<script>

//despues de llenar el formulario, al darle guardar dejamos los campos vacios 
function limpiar()
{
	$("#pcantidad").val("");
	$("#pprecio_compra").val("");
	$("#pprecio_venta").val("");
}

// variable total 
total=0;

// funcion para no guardar un ingreso que no tenga detalles (mostrar y ocultar boton)
function evaluar()
{
	if (total>0)
	{
		$("#guardar").show();
	}
	else
	{
		$("#guardar").hide();
	}
}


// cada ves que se haga click en el boton agregar llame a la funcion  	
$(document).ready(function(){
	$('#btn_agregar').click(function(){
		agregar();
	});
});


var contador=0;
total=0;
subtotal=[ ]; // almacenar todos los subtotales de los productos 
$("#guardar").hide();

function agregar()
{
	idarticulo=$("#pidarticulo").val();
	articulo=$("#pidartiulo option:selected").text();
	cantidad=$("#pcantidad").val();
	precio_compra=$("#pprecio_compra").val();
	precio_venta=$("#pprecio_venta").val();

	//if (idarticulo!="" and cantidad!="" and catidad>0 and precio_compra!="" and precio_venta!="")
	if (idarticulo!="")
	{
		subtotal[contador]=(cantidad*precio_compra);
		total=total+subtotal[contador];

		var fila='<tr class="selected" id="fila'+contador+'">  <td><button type="button" class="btn btn-warning" onclick="eliminar('+contador+');">X</button></td>  <td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td>  <td><input type="number" name="cantidad[]" value="'+cantidad+'"></td>  <td><input type="number" name="precio_compra[]" value="'+precio_compra+'"></td>    <td><input type="number" name="precio_venta[]" value="'+precio_venta+'"></td>  <td>'+subtotal[contador]+'</td> </tr>';
		contador ++;
		limpiar();
		$("#total").html("Q. " + total);
		evaluar();
		$('#detalles').append(fila);
	}
	else
	{
		alert("error al ingresar los detalles de ingreso, revise los detalles de ingreso");
	}

}

//funcion para recibir un paremetro y volver a hacer los costos
function eliminar(index)
{
	total=total-subtotal[index]; //tengo problemas con mostrar la cantidad despues de quitar un producto
	$("#total").html("Q. " + total);
	$("#fila" + index).remove();
	evaluar();	
}

</script>
@endpush
	
@endsection