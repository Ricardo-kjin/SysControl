@extends('layouts.panel')

@section('styles')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection

@section('content')
<div class="row">
  <div class="col-12">
      <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                  <h6 class="text-white text-capitalize ps-3">Editar SubGrupo: {{$subgrupo->nombre_subgrupo}}</h6>
              </div>
          </div>
          <div class="card-body">
              @if ($errors->any())
                  @foreach ($errors->all() as $error)
                      <div class="alert alert-danger alert-dismissible text-white fade show" role="alert">
                          <span class="alert-icon align-middle">
                              <span class="material-icons text-md">
                                  warning
                              </span>
                          </span>
                          <span class="alert-text"><strong>Por favor!!</strong> {{ $error }}</span>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                  @endforeach
              @else
              @endif
              <form method="POST" action="{{ url('/subgrupos/' . $subgrupo->id) }}">
                @method('PUT')
                @csrf
                  <div class="form-control">
                      <div class="input-group input-group-static mb-4">
                          <label for="nombre">NOMBRE DEL SUBGRUPO</label>
                          <input type="text" name="nombre" class="form-control" value="{{ old('nombre',$subgrupo->nombre_subgrupo) }}"
                              id="nombre" required>
                      </div>
                  </div>
                  <div class="form-control">
                      <div class="input-group input-group-static mb-4">
                          <label for="descripcion">DESCRIPCION</label>
                          <input type="text" name="descripcion" class="form-control" value="{{ old('descripcion',$subgrupo->descripcion) }}"
                              id="descripcion" required>
                      </div>
                  </div>
                  <div class="form-control">
                    <div class="input-group input-group-static mb-4">
                      <label for="grupo" class="ms-0">SELECCIONAR GRUPO</label>
                      <select class="form-control" id="grupo" name="grupo">
                        @foreach ($grupos as $grupo)
                            <option value="{{ $grupo->id }}" @if ($grupo->id==$subgrupo->grupo->id) selected @endif > {{ $grupo->nombre_grupo }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div>
                      <button type="submit" class="btn bg-gradient-primary">Guardar</button>
                      <a href="{{ url('/subgrupos') }}" type="button" class="btn btn-outline-success"
                          title="Regresar"><i class="material-icons">arrow_back</i> Regresar</a>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>

@endsection
@section('scripts')
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    {{-- <script>
        $(document).ready(()=>{});
        $('#users').selectpicker('val',@json($users_ids));
    </script> --}}
@endsection
