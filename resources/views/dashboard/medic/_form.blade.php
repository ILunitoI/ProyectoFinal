@csrf 
        <div class="form-group">
          <label for="Name">Nombre</label>
          <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" value="{{ old('name', $medic->name)}}">
        </div>
        <div class="form-group">
          <label for="last_name">Apellidos</label>
          <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Apellido" value="{{ old('last_name', $medic->last_name)}}">
        </div>
        <div class="form-group">
          <label for="id_card">Cédula</label>
          <input type="text" class="form-control" name="id_card" id="id_card" placeholder="Cédula" value="{{ old('id_card', $medic->id_card)}}">
        </div>
        <div class="form-group">
          <label for="sales_rep">Representate de venta</label>
          <input type="text" class="form-control" name="sales_rep" id="sales_rep" placeholder="Representante" value="{{ old('sales_rep', $medic->sales_rep)}}">
        </div>
        <div class="form-group">
          <label for="Email">Correo</label>
          <input type="text" class="form-control" name="email" id="email" placeholder="Correo" value="{{ old('email', $medic->email)}}">
        </div>
        <div class="form-group">
          <label for="User">Usuario</label>
          <input type="text" class="form-control" name="user" id="user" placeholder="Usuario" value="{{ old('user', $medic->user)}}">
        </div>
        <div class="form-group">
          <label for="Password">Contraseña</label>
          <input type="text" class="form-control" name="password" id="password" placeholder="Contraseña" value="{{ old('password', $medic->password)}}">
        </div>
        
        <button type="submit" class="btn btn-primary">Enviar</button>