<!DOCTYPE html>
<html lang="en">

@include('users.partials._head')

<!-- WRAPPER -->
<div id="wrapper">

    
@include('users.partials._navbar')
    
@include('users.partials._sidebar')

  <!-- Main Content -->
    <div class="container-fluid">
        @yield('content')
    </div>
    
  

@include('users.partials._footer')

@include('users.partials._script')
</html>