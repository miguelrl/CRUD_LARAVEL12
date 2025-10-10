<!doctype html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 30px;
      background-color: #f2f2f2;
      overflow-x: hidden;
    }
  </style>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Mi pagina de prueba</title>
  <script src="http://cdn.tailwindcss.com"></script>
  </head>
  <body class="container">
              @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
              @endif
  <table  class="table table-hover ">
    <thead>

      <tr>
  <a title="Registrar" href="{{ route('create')}}" class="btn btn-info">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-diff" viewBox="0 0 16 16">
      <path d="M8 5a.5.5 0 0 1 .5.5V7H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V8H6a.5.5 0 0 1 0-1h1.5V5.5A.5.5 0 0 1 8 5m-2.5 6.5A.5.5 0 0 1 6 11h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5"/>
      <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
    </svg>
  </a>
      </tr>
    <tr>
        <th colspan='7'><h3>Lista de empleados</h3></th>
    </tr>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Área</th>
        <th scope="col">N° Empleado</th>
        <th scope="col">Dirección</th>
        <th scope="col">Email</th>
        <th scope="col">Acciones </th>
      </tr>
    </thead>
    <tbody>
      @foreach($usuarios as $usu)
      <tr>
        
        <td>{{ $loop->index+1 }}</td> 
        <td>{{$usu->name}}</td>
        <td>{{$usu->area}}</td>
        <td>{{$usu->employee_number}}</td>
        <td>{{$usu->address}}</td>
        <td>{{$usu->email}}</td>
        <td>
            
            <p>
              <a title="Elimiar" href="{{ route('destroy', ['id' => $usu->id]) }}" class="btn btn-primary  btn-sm ">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-excel-fill" viewBox="0 0 16 16">
                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M5.884 6.68 8 9.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 10l2.233 2.68a.5.5 0 0 1-.768.64L8 10.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 10 5.116 7.32a.5.5 0 1 1 .768-.64"/>
              </svg>
            </a>
            <a  title="Modificar"  href="{{ route('edit', ['id' => $usu->id]) }}" class="btn btn-success  btn-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-richtext-fill" viewBox="0 0 16 16">
                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M7 6.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0m-.861 1.542 1.33.886 1.854-1.855a.25.25 0 0 1 .289-.047l1.888.974V9.5a.5.5 0 0 1-.5.5H5a.5.5 0 0 1-.5-.5V9s1.54-1.274 1.639-1.208M5 11h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1m0 2h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1"/>
              </svg>
            </a>
            </p>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
   {{$usuarios->links()}}
  </body>
</html>