@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-xs-12">
			<h3 class="text-center"> <strong>Editar Articulo:</strong> {{ $articulo->nombre}}</h3><br>
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

			{!!Form::model($articulo,['method'=>'PATCH','route'=>['almacen.articulo.update',$articulo->idarticulo],'files'=>'true'])!!}
            {{Form::token()}}
			<div class="row">
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" name="nombre"  required value="{{$articulo->nombre}}" class="form-control">
					</div>
				</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="">Categoria</label>
						<select name="idcategoria" id="" class="form-control">
							@foreach ($categorias as $cat)
								@if($cat->idcategoria==$articulo->idcategoria)
								<option value="{{$cat->idcategoria}}" selected>{{$cat->nombre}}</option>
								@else
								<option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
								@endif
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="codigo">Codigo</label>
						<input type="text" name="codigo"  required value="{{$articulo->codigo}}" class="form-control">
					</div>
				</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="stock">Stock</label>
						<input type="text" name="stock"  required value="{{$articulo->stock}}" class="form-control">
					</div>
				</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="descripcion">Talla</label>
						<select name="descripcion" id="" class="form-control selectpicker" data-live-search="true">
							<option value="Talla 27">Talla 27</option>
							<option value="Talla 28">Talla 28</option>
							<option value="Talla 29">Talla 29</option>
							<option value="Talla 30">Talla 30</option>
							<option value="Talla 31">Talla 31</option>
							<option value="Talla 32">Talla 32</option>
							<option value="Talla 33">Talla 33</option>
							<option value="Talla 34">Talla 34</option>
							<option value="Talla 35">Talla 35</option>
							<option value="Talla 36">Talla 36</option>
							<option value="Talla 37">Talla 37</option>
							<option value="Talla 38">Talla 38</option>
							<option value="Talla 39">Talla 39</option>
							<option value="Talla 40">Talla 40</option>
							<option value="Talla 14">Talla 14</option>
							<option value="Talla 14.5">Talla 14.5</option>
							<option value="Talla 15">Talla 15</option>
							<option value="Talla 15.5">Talla 15.5</option>
							<option value="Talla 16">Talla 16</option>
							<option value="Talla 16.5">Talla 16.5</option>
						</select>
					</div>
				</div>

				<!--<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="descripcion">Descripcion</label>
						<input type="text" name="descripcion"  value="{{$articulo->descripcion}}" class="form-control">
					</div>
				</div> -->

				<!--<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="imagen">Imagen</label>
						<input type="file" name="imagen" class="form-control">
						@if (($articulo->imagen)!="") // diferente de vacio
							<img src="{{asset('imagenes/articulos/'.$articulo->imagen)}}" height="100px" width="100px">
						@endif
					</div> -->
				</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<button class="btn btn-primary" type="submit">Guardar</button>
						<a class="btn btn-danger" href="{{ url('/almacen/articulo') }}" >Cancelar</a>
					</div> 
				</div>

			</div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection