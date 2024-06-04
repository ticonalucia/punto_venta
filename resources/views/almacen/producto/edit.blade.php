@extends('layouts.admin')
@section('contenido')
    <div class="col-md-6">
        <div class="card card-primary">
           <div class="card-header">
              <h3 class="card-title">Editar producto: {{ $producto->nombre }}</h3>
           </div>
        <form action="{{ route('producto.update', $producto->id_producto) }}" method="POST" enctype="multipart/form-data" id="myForm">
         @csrf
         @method('PUT')
         <div class="card-body">
        <div class="row">
          <div class="col-md-6 col-12">
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input type="text" class="form-control" name="nombre" value="{{ $producto->nombre }}" placeholder="Ingrese el nombre del producto">
            </div>
          </div>
                  
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label>Categoría</label>
                        <select name="id_categoria" class="form-control" id="id_categoria">
                    @foreach ($categorias as $cat)
                    @if ($cat->id_categoria == $producto->id_categoria)
                        <option value="{{ $cat->id_categoria }}" selected>{{ $cat->categoria }}</option>
                    @else
                        <option value="{{ $cat->id_categoria }}">{{ $cat->categoria }}</option>
                    @endif
                    @endforeach   
                        </select>
                    </div>
                </div>
               <div class="col-md-6 col-12">
            <div class="form-group">
              <label for="codigo">Código</label>
              <input type="text" class="form-control" name="codigo" value="{{ $producto->codigo }}" placeholder="Ingrese el código del producto">
            </div>
          </div>
                <div class="col-md-6 col-12">
                 <div class="form-group">
                  <label for="stock">Stock</label>
                   <input type="number" class="form-control" name="stock" value="{{ $producto->stock }}" placeholder="Ingrese el stock del producto">
            </div>
          </div>

                <div class="col-md-6 col-12">
            <div class="form-group">
              <label for="descripcion">Descripción</label>
              <input type="text" class="form-control" name="descripcion" value="{{ $producto->descripcion }}" placeholder="Ingrese la descripción del producto">
            </div>
          </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="imagen">Imagen</label>
                        <input type="file"  class="form-control" name="imagen" id="imagen" >
                        @if ($producto->imagen != "")
              <img src="/PUNTOVENTAluciaticona/public/imagenes/productos/{{ $producto->imagen }}" height="100px" width="100px">
              @endif
                      
                    </div>
                </div>
                    </div>
                </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success me-1 mb-1">Guardar</button>
                 <button type="reset" class="btn btn-danger me-1 mb-1">Cancelar</button>
            </div>
        </div>
     </div>
    </form>
  </div>
    </div> 

@endsection
