<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - {{ $title }}</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('blog') }}/assets/write.png" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('admin') }}/css/styles.css" rel="stylesheet" />
        {{-- datatable --}}
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css">
        {{-- bootstrap tokenfield --}}
        <link href="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.css">
    {{-- Font Awesome--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    {{-- ckeditor --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
    {{-- my css --}}
    <link rel="stylesheet" href="{{ asset('mystyle.css') }}">
    <style>
        .ck-editor__editable{
            min-height: 100px;
        }
    </style>
    </head>
    <body>
        <div class="d-flex" id="wrapper">
             <!-- Sidebar-->
           @include('dashboard.layout.sidebar')
            <!-- Page content wrapper-->
            <div id="page-content-wrapper" style="background-color: #ECECEC">
                <!-- Top navigation-->
                @include('dashboard.layout.navbar')
                <!-- Page content-->
              @yield('content')
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('admin') }}/js/scripts.js"></script>

        <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

        <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>

        {{-- tokenfield js --}}
        <script type="text/javascript" src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>

        <script>
            function tampilGambar(){
                let gambar = document.getElementById('gambar');
                let tampilGambar = document.querySelector('.tampil-gambar');

                tampilGambar.style.display = 'block';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(gambar.files[0]);

                oFReader.onload = function (oFREvent) {
                    tampilGambar.src = oFREvent.target.result;
                }
            }

            ClassicEditor
		.create( document.querySelector( '#editor' ) )
		.catch( error => {
			console.error( error );
		} );

        new DataTable('#myTable');

        </script>

@if ($title == 'About' || $title == 'Artikel')
        <script>
            $('#tokenfield').tokenfield({
                autocomplete: {
                    source: [{!! $source !!}],
                    delay: 100
             },
                showAutocompleteOnFocus: true
         })
        </script>
@endif

    </body>
</html>
