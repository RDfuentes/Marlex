@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-xs-11">
		<a href="articulo/create"><button class="btn btn-success">Nuevo Producto</button></a>
		<h3 class="text-center"><strong>Listado de Productos</strong></h3>
		@include('almacen.articulo.search')
	</div>
</div>

<div class="col-xs-2">
<a onclick="tableToExcel('example1', 'W3C Example Table')" 
target="_blank" class="btn btn-danger" class="text-muted"><i class="fa fa-print"></i> IMPRIMIR EXCEL</a> 
</div>



<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive"><br>
			<table id="example1" class="table table-striped table-bordered table-condensed table-hover"
			summary="Code page support in different versions of MS Windows." rules="groups" frame="hsides">
			<caption class="text-center">LISTADO DE PRODUCTOS MARLEX</caption>

				<thead>
					<th>Id</th>
					<th>Categoria</th>
					<th>Nombre</th>
					<th>Codigo</th>
					<th>Talla</th>
					<th>Stock</th>
					<!--<th>Imagen</th>-->
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
               @foreach ($articulos as $art)
				<tr>
					<td>{{ $art->idarticulo}}</td>
					<td>{{ $art->categoria}}</td>
					<td>{{ $art->nombre}}</td>
					<td>{{ $art->codigo}}</td>
					<td>{{ $art->descripcion}}</td>
					<td>{{ $art->stock}}</td>
					<!--<td>
						<img src="{{asset('imagenes/articulos/'.$art->imagen)}}" alt="{{$art->nombre}}" height="100px" width="100px" class="img-thumbnail">
					</td>-->
					<td>{{ $art->estado}}</td>
					<td>
						<a href="{{URL::action('ArticuloController@edit',$art->idarticulo)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$art->idarticulo}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('almacen.articulo.modal')
				@endforeach
			</table>
		</div>
		{{$articulos->render()}}
	</div>
</div>

@endsection