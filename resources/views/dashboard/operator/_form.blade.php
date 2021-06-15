@csrf 
        <div class="form-group">
          <label for="Name">Nombre</label>
          <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" value="{{ old('name', $operator->name)}}">
        </div>
        <div class="form-group">
          <label for="last_name">Apellido</label>
          <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Apellido" value="{{ old('last_name', $operator->last_name)}}">
        </div>
        <div class="form-group">
          <label for="Email">Correo</label>
          <input type="text" class="form-control" name="email" id="email" placeholder="Correo" value="{{ old('email', $operator->email)}}">
        </div>
        <div class="form-group">
          <label for="User">Usuario</label>
          <input type="text" class="form-control" name="user" id="user" placeholder="Usuario" value="{{ old('user', $operator->user)}}">
        </div>
        <div class="form-group">
          <label for="Password">Contraseña</label>
          <input type="text" class="form-control" name="password" id="password" placeholder="Contraseña" value="{{ old('password', $operator->password)}}">
        </div>
        
        <button type="submit" class="btn btn-primary">Enviar</button>