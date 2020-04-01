@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-xs-12">
			<h3 class="text-center"><strong>Editar Proveedor:</strong> {{ $persona->nombre}}</h3><br>
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

			{!!Form::model($persona,['method'=>'PATCH','route'=>['compras.proveedor.update',$persona->idpersona]])!!}
            {{Form::token()}}
			<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre"  required value="{{$persona->nombre}}" class="form-control" placeholder="Nombre del Proveedor">
            </div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
            	<label for="direccion">Direccion</label>
            	<input type="text" name="direccion"  required value="{{$persona->direccion}}" class="form-control" placeholder="Ingrese Direccion">
            </div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="">Documento</label>
				<select name="tipo_documento" id="" class="form-control">
					@if ($persona->tipo_documento='Factura')
					<option value="factura" selected>Factura</option>
					<option value="comprobante">Comprobante</option>
					@elseif ($persona->tipo_documento='Comprobante')
					<option value="factura">Factura</option>
					<option value="comprobante" selected>Comprobante</option>
					@endif
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
            	<label for="num_documento">Numero de documento</label>
            	<input type="text" name="num_documento"  required value="{{$persona->num_documento}}" class="form-control" placeholder="Numero de documento">
            </div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
            	<label for="telefono">Telefono</label>
            	<input type="text" name="telefono"  value="{{$persona->telefono}}" class="form-control" placeholder="Numero de telefono">
            </div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
            	<label for="email">Correo</label>
            	<input type="text" name="email"  value="{{$persona->email}}" class="form-control" placeholder="Correo Electronico">
            </div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
            	<a class="btn btn-danger" href="{{ url('/compras/proveedor') }}" >Cancelar</a>
            </div>
		</div>

	</div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection