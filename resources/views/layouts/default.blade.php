<!doctype html>

<html>

<head>

   @include('includes.head')

</head>

<body>

<div class="container">

   <header class="row">

       @include('includes.header')

   </header>

   <div id="main" class="row">

           @yield('content')

   </div>

   <footer class="row">
   <script type="text/javascript">
    $( document ).ready(function() {
        $('.date').datepicker({ dateFormat: 'yy-mm-dd' });
    });
    </script>
   </footer>

</div>

</body>

</html>
