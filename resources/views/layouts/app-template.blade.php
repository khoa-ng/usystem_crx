<!DOCTYPE html> 
<html>
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">  

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- @if (!empty($__env->yieldContent('title')))
          @yield('title')
      @else
          <title>Slack State</title>
      @endif -->
      <title>@yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset("/image/sq_favicon.png") }}" .pngtype="image/png"> 
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset("/bower_components/AdminBSB/plugins/bootstrap/css/bootstrap.css") }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset("/bower_components/AdminBSB/plugins/node-waves/waves.css") }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset("/bower_components/AdminBSB/plugins/animate-css/animate.css") }}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{ asset("/bower_components/AdminBSB/plugins/morrisjs/morris.css") }}" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="{{ asset("/bower_components/AdminBSB/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css") }}" rel="stylesheet">

    <!-- Colorpicker Css -->
    <link href="{{ asset("/bower_components/AdminBSB/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css") }}" rel="stylesheet" />

    <!-- Dropzone Css -->
    <link href="{{ asset("/bower_components/AdminBSB/plugins/dropzone/dropzone.css") }}" rel="stylesheet">

    <!-- Multi Select Css -->
    <link href="{{ asset("/bower_components/AdminBSB/plugins/multi-select/css/multi-select.css") }}" rel="stylesheet">

    <!-- Bootstrap Spinner Css -->
    <link href="{{ asset("/bower_components/AdminBSB/plugins/jquery-spinner/css/bootstrap-spinner.css") }}" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="{{ asset("/bower_components/AdminBSB/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css") }}" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="{{ asset("/bower_components/AdminBSB/plugins/bootstrap-select/css/bootstrap-select.css") }}" rel="stylesheet" />
    
    <!-- noUISlider Css -->
    <link href="{{ asset("/bower_components/AdminBSB/plugins/nouislider/nouislider.min.css") }}" rel="stylesheet" />

    <!-- Sweetalert Css -->
    <link href="{{ asset("/bower_components/AdminBSB/plugins/sweetalert/sweetalert.css") }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset("/bower_components/AdminBSB/css/style.css") }}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->

    <link href="{{ asset("/bower_components/AdminBSB/css/themes/all-themes.css") }}" rel="stylesheet" />
    <link href="{{ asset("css/site.css") }}" rel="stylesheet">

      <!-- Jquery Core Js -->
      <script src="{{ asset ("/bower_components/AdminBSB/plugins/jquery/jquery.min.js") }}"></script>
    <style>
        .sidebar-menu-closed {
            width:15px;
        }

        section.sidebar-closed {
            margin-left:20px;
        }
    </style>
  </head> 

  <body class="theme-blue">
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <div class="overlay"></div>

    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>

    <!-- Main Header -->
    @include('layouts.header')
    <!-- Sidebar -->
    <a href="#" class="right-icon" style="position:absolute; top:95%; z-index: 999;display: none;" id="open_menu"><img src="{{asset('image/right1.png')}}" style="width: 40px;"></a>
    <section>
    @include('layouts.sidebar')
    @include('layouts.rightsidebar')
    </section>
    @yield('content')
    <!-- /.content-wrapper -->
    <!-- Footer -->
    @include('layouts.footer')
    <!-- ./wrapper -->
    <!-- REQUIRED JS SCRIPTS -->

    <!-- Bootstrap Core Js -->
    <script src="{{ asset ("/bower_components/AdminBSB/plugins/bootstrap/js/bootstrap.js") }}"></script>

    <!-- Jquery Validation Js-->
    <script src="{{ asset ("/bower_components/AdminBSB/plugins/jquery-validation/jquery.validate.js") }}"></script>

    <!-- Jquery steps plugin js -->
    <script src="{{ asset ("/bower_components/AdminBSB/plugins/jquery-steps/jquery.steps.js") }}"></script>

    <!-- Select Plugin Js -->
    <script src="{{ asset ("/bower_components/AdminBSB/plugins/bootstrap-select/js/bootstrap-select.js") }}"></script>

    <!-- Bootstrap Colorpicker Js -->
    <script src="{{ asset ("/bower_components/AdminBSB/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js") }}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset ("/bower_components/AdminBSB/plugins/jquery-slimscroll/jquery.slimscroll.js") }}"></script>

    <!-- Bootstrap Notify Plugin Js -->
    <script src="{{ asset ("/bower_components/AdminBSB/plugins/bootstrap-notify/bootstrap-notify.js") }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset ("/bower_components/AdminBSB/plugins/node-waves/waves.js") }}"></script>

    <!-- Dropzone Plugin Js -->
    <script src="{{ asset ("/bower_components/AdminBSB/plugins/dropzone/dropzone.js") }}"></script>

    <!-- Input Mask Plugin Js -->
    <script src="{{ asset ("/bower_components/AdminBSB/plugins/jquery-inputmask/jquery.inputmask.bundle.js") }}"></script>

    <!-- Multi Select Plugin Js -->
    <script src="{{ asset ("/bower_components/AdminBSB/plugins/multi-select/js/jquery.multi-select.js") }}"></script>

    <!-- Jquery Spinner Plugin Js -->
    <script src="{{ asset ("/bower_components/AdminBSB/plugins/jquery-spinner/js/jquery.spinner.js") }}"></script>

    <!-- Bootstrap Tags Input Plugin Js -->
    <script src="{{ asset ("/bower_components/AdminBSB/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js") }}"></script>

    <!-- noUISlider Plugin Js -->
    <script src="{{ asset ("/bower_components/AdminBSB/plugins/nouislider/nouislider.js") }}"></script> 
     


    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset ("/bower_components/AdminBSB/plugins/jquery-datatable/jquery.dataTables.js") }}"></script>
    <script src="{{ asset ("/bower_components/AdminBSB/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js") }}"></script>
    <script src="{{ asset ("/bower_components/AdminBSB/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js") }}"></script>
    <script src="{{ asset ("/bower_components/AdminBSB/plugins/jquery-datatable/extensions/export/buttons.flash.min.js") }}"></script>
    <script src="{{ asset ("/bower_components/AdminBSB/plugins/jquery-datatable/extensions/export/jszip.min.js") }}"></script>
    <script src="{{ asset ("/bower_components/AdminBSB/plugins/jquery-datatable/extensions/export/pdfmake.min.js") }}"></script>
    <script src="{{ asset ("/bower_components/AdminBSB/plugins/jquery-datatable/extensions/export/vfs_fonts.js") }}"></script>
    <script src="{{ asset ("/bower_components/AdminBSB/plugins/jquery-datatable/extensions/export/buttons.html5.min.js") }}"></script>
    <script src="{{ asset ("/bower_components/AdminBSB/plugins/jquery-datatable/extensions/export/buttons.print.min.js") }}"></script>

     
    <!-- Jquery CountTo Plugin Js -->
    <script src="{{ asset ("/bower_components/AdminBSB/plugins/jquery-countto/jquery.countTo.js") }}"></script>

   <!-- Morris Plugin Js -->

   <script src="{{ asset ("/bower_components/AdminBSB/plugins/raphael/raphael.min.js") }}"></script>
   <script src="{{ asset ("/bower_components/AdminBSB/plugins/morrisjs/morris.js") }}"></script>
 
    <!-- ChartJs -->
    <script src="{{ asset ("/bower_components/AdminBSB/plugins/chartjs/Chart.bundle.js") }}"></script>
   

    <!-- Flot Charts Plugin Js -->
    <script src="{{ asset ("/bower_components/AdminBSB/plugins/flot-charts/jquery.flot.js") }}"></script>
    <script src="{{ asset ("/bower_components/AdminBSB/plugins/flot-charts/jquery.flot.resize.js") }}"></script>
    <script src="{{ asset ("/bower_components/AdminBSB/plugins/flot-charts/jquery.flot.pie.js") }}"></script>
    <script src="{{ asset ("/bower_components/AdminBSB/plugins/flot-charts/jquery.flot.categories.js") }}"></script>
    <script src="{{ asset ("/bower_components/AdminBSB/plugins/flot-charts/jquery.flot.time.js") }}"></script>

      <!-- Sparkline Chart Plugin Js -->
      <script src="{{ asset ("/bower_components/AdminBSB/plugins/jquery-sparkline/jquery.sparkline.js") }}"></script>

      <!-- SweetAlert Plugin Js -->
    <script src="{{ asset ("/bower_components/AdminBSB/plugins/sweetalert/sweetalert.min.js") }}"></script>

      

   
    <!-- Custom Js -->
    <script src="{{ asset ("/bower_components/AdminBSB/js/admin.js") }}"></script>
    <script src="{{ asset ("/bower_components/AdminBSB/js/pages/forms/form-validation.js") }}"></script>  
    <script src="{{ asset ("/bower_components/AdminBSB/js/pages/tables/jquery-datatable.js") }}"></script>
    <script src="{{ asset ("/bower_components/AdminBSB/js/pages/ui/modals.js") }}"></script>   

    <!-- Demo Js -->
    <script src="{{ asset ("/bower_components/AdminBSB/js/demo.js") }}"></script>  


    <script src="{{ asset ("/js/jquery.form.js") }}"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
    <script>

        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var mytable;
        $(document).ready(function() {        
            // $('#log_date').datepicker({
            //   autoclose: true,
            //   format: 'yyyy/mm/dd'
            // });
            mytable = $("#DataTables_Table_0").DataTable();

            $('.js-modal-buttons .btn').on('click', function () {
                var color = $(this).data('color');
                $('#mdModal .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
                $('#mdModal').modal('show');
            });

            $("#close_menu").click(function(e){
                e.preventDefault();
                $(".sidebar").addClass('sidebar-menu-closed');
                $(".content").addClass('sidebar-closed');
                $(this).hide();
                $(".right-icon").show(500);

            });

            $("#open_menu").click(function(e){
                e.preventDefault();
                $(".sidebar").removeClass('sidebar-menu-closed');
                $(".content").removeClass('sidebar-closed');
                $(this).hide();
                $('#close_menu').show();
            });

            $(document).trigger('after_ready');
        }); 
</script>
<script src="{{ asset('js/site.js') }}"></script>
@yield('project-scripts')
@yield('slack-chat-scripts')
@yield('slack-chat-pair-scripts')
@yield('slack-chat-group-scripts')
@yield('allocation-scripts')
@yield('message-templates-scripts')
  </body>
</html>