<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>vivifyblog</title>
</head>
<body>
  <div class="container">
    @include('templates.header')

    @yield('content')

    <div><!--ovo ovde je samo simbol za sidebar, ovako mozemo prikazati sve tagove u sidebaru -->
      <!-- Tagove ucitavamo u master, jer zelimo tagove da budu dostupni svugde. AppServiceProvider namestamo sve.-->
      @foreach($tags as $tag)
        <a href="/posts/tags/{{ $tag->name }}">{{ $tag->name }}</a>
      @endforeach
    </div>
  
  </div>



</body>
</html>







