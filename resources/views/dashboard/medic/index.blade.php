@extends('dashboard.master')
@section('content')

<a class="btn btn-success mt-3 mb-3" href="{{route('medic.create')}}">Crear</a>
<table class="table table-hover table-condensed table-bordered">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Cédula</th>
      <th scope="col">Representante de venta</th>
      <th scope="col">correo</th>
      <th scope="col">Usuario</th>
      <th scope="col">Contraseña</th>
      <th scope="col">Created</th>
      <th scope="col">Updated</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  @foreach($medics as $medic)
  <tbody>
    <tr>
      <th scope="row">{{$medic->id}}</th>
      <td>{{$medic->name}}</td>
      <td>{{$medic->last_name}}</td>
      <td>{{$medic->id_card}}</td>
      <td>{{$medic->sales_rep}}</td>
      <td>{{$medic->email}}</td>
      <td>{{$medic->user}}</td>
      <td>{{$medic->password}}</td>
      <td>{{$medic->created_at->format('d-m-Y')}}</td>
      <td>{{$medic->updated_at->format('d-m-Y')}}</td>
      <td><a href="{{ route('medic.show', $medic->id) }}" class="btn btn-primary">Ver</a></td>
      <td><a href="{{ route('medic.edit', $medic->id) }}" class="btn btn-primary">Editar</a></td>
      <td>
        
        <button data-toggle="modal" data-target="#deleteModal" data-id="{{ $medic->id }}" class="btn btn-danger" type="submit">Eliminar</button>        
        
        {{--<form action="{{route('post.destroy', $post->id)}}" method="POST">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger" type="submit">Eliminar</button>
        </form>--}}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

  <div class"mt-3">{{ $medics->links() }}</div>

  <div class="modal fade" id="deleteModal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel"></h5>
          
        </div>
        <div class="modal-body">
          <p>Estás seguro de borrar el registro seleccionado?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <form id="formDelete" action="{{route('medic.destroy', 0)}}"  data-action="{{route('medic.destroy', 0)}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">Eliminar</button>
          </form>
        </div>
      </div>
    </div>  
  </div>

  <script>
    window.onload = function(){
      $("#deleteModal").on('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = $(event.relatedTarget);
        var id = button.data('id');

        action = $('#formDelete').attr('data-action').slice(0, -1);
        action += id;

        $('#formDelete').attr('action',action);

        var modal = $(this);
        modal.find('.modal-title').text('Eliminar el medico: ' + id)
      })
    }
    
  </script>
@endsection