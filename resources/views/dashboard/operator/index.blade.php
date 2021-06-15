@extends('dashboard.master')
@section('content')

<a class="btn btn-success mt-3 mb-3" href="{{route('operator.create')}}">Crear</a>
<table class="table table-hover table-condensed table-bordered">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellidos</th>
      <th scope="col">correo</th>
      <th scope="col">Usuario</th>
      <th scope="col">Contraseña</th>
      <th scope="col">Created</th>
      <th scope="col">Updated</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  @foreach($operators as $operator)
  <tbody>
    <tr>
      <th scope="row">{{$operator->id}}</th>
      <td>{{$operator->name}}</td>
      <td>{{$operator->last_name}}</td>
      <td>{{$operator->email}}</td>
      <td>{{$operator->user}}</td>
      <td>{{$operator->password}}</td>
      <td>{{$operator->created_at->format('d-m-Y')}}</td>
      <td>{{$operator->updated_at->format('d-m-Y')}}</td>
      <td><a href="{{ route('operator.show', $operator->id) }}" class="btn btn-primary">Ver</a></td>
      <td><a href="{{ route('operator.edit', $operator->id) }}" class="btn btn-primary">Editar</a></td>
      <td>
        
        <button data-toggle="modal" data-target="#deleteModal" data-id="{{ $operator->id }}" class="btn btn-danger" type="submit">Eliminar</button>        
        
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

  <div class"mt-3">{{ $operators->links() }}</div>

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
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <form id="formDelete" action="{{route('operator.destroy', 0)}}"  data-action="{{route('operator.destroy', 0)}}" method="POST">
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
        modal.find('.modal-title').text('Eliminar el operador: ' + id)
      })
    }
    
  </script>
@endsection