<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Modificar Datos del Empleado</title>
  
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 30px;
      background-color: #f2f2f2;
    }
    form {
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      max-width: 500px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    label {
      display: block;
      margin-top: 15px;
    }
    input[type="text"],
    input[type="email"],
    textarea {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    button {
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    button:hover {
      background-color: #45a049;
    }
  </style>
  </head>
  <body>
    <div style="position:relative; right:-500">
        <h2>Registrar Datos del Empleado        &nbsp;&nbsp;&nbsp;     <a  href="{{ route('operaciones') }}" class="btn btn-primary   btn-sm">
                      X </a></h2>
        <!--@if($errors->any())
        <div>
          <h2>Errores:</h2>
          <ul>
            @foreach($errors->all() as $error)
              <li>
                  {{$error}}
              </li>

            @endforeach
          </ul>
        </div>
        @endif
        -->
        @if (session('success'))
            <div style="color: green;">{{ session('success') }}</div>
        @endif

        <form action="{{ route('store') }}" method="POST">
            @csrf

            <label for="name">Nombre Completo:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" >
            @error('name')
              <p class="alert alert-danger" >{{$message}}</p>
            @enderror

            <label for="area">Área:</label>
            <input type="text" name="area" id="area" value="{{ old('area') }}" >
            @error('area')
              <p  class="alert alert-danger" >{{$message}}</p>
            @enderror

            <label for="employee_number">Número de Empleado:</label>
            <input type="text" name="employee_number" id="employee_number" value="{{ old('employee_number') }}" >
            @error('employee_number')
              <p  class="alert alert-danger" >El número de empleado es incorrecto (solo enteros, deben ser 5 enteros)</p>
            @enderror

            <label for="address">Dirección:</label>
            <textarea name="address" id="address" >{{ old('address') }}</textarea>
            @error('address')
              <p  class="alert alert-danger" >{{$message}}</p>
            @enderror

            <label for="email">Correo Electrónico:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" >
            @error('email')
              <p  class="alert alert-danger" >Correo incorrecto</p>
            @enderror

            <p>
            <button type="submit" class="btn btn-primary  btn-sm">GUARDAR</button>
            </p>

        </form>
    </div>  
</body>
</html>
