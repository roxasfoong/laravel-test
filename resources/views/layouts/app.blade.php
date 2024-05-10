<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/sweetalert2.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap5.min.css')}}">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('js/jquery-3.7.1.min.js')}}"></script>
        <script src="{{asset('js/sweetalert2.min.js')}}"></script>
        <script src="{{asset('js/dataTables.bootstrap5.min.js')}}"></script>
        <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
       
		<script>
			$(document).ready(function() {
				$('#example').DataTable();
			  } );
		</script>
		<script>
			$(document).ready(function() {
				var table = $('#example2').DataTable( {
					lengthChange: false,
					buttons: [ 'copy', 'excel', 'pdf', 'print']
				} );
			 
				table.buttons().container()
					.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
			} );
		</script>
		<!--app JS-->
    </body>
</html>
