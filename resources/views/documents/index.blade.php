<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('/assets/brand/logo.jpg')}}">

    <title>Resource Pack</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('/assets/css/style.css')}}" rel="stylesheet">
  </head>

  <body>
    <div class="deals-detail-wrapper">
   
    <div class="text-center">
    <h2 class="mb-3">List of Documents</h2>	 
      <img class="mb-4 " src="./assets/brand/logo.jpg" alt="" width="72" height="72">	
    </div>
      <ul>
          @foreach($documents as $document)
              <li><a href="{{ asset('/assets/documents/' . $document['path']) }}" download>{{ $document['name'] }}</a></li>
          @endforeach
      </ul>
    </div>

    
</body>
</html>
