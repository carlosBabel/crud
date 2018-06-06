<!-- index.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Página de contactos</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Fecha</th>
        <th>Email</th>
        <th>Número de Teléfono</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($passports as $passport)
      @php
        $date=date('Y-m-d', $passport['date']);
        @endphp
      <tr>
        <td>{{$passport['id']}}</td>
        <td>{{$passport['name']}}</td>
        <td>{{$date}}</td>
        <td>{{$passport['email']}}</td>
        <td>{{$passport['number']}}</td>
        <td>{{$passport['office']}}</td>
        
        <td><a href="{{action('PassportController@edit', $passport['id'])}}" class="btn btn-warning">Editar</a></td>
        <td>
          <form action="{{action('PassportController@destroy', $passport['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Eliminar</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>