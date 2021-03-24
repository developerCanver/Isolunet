<!DOCTYPE html>
<html lang="es"{{--  dir="rtl" class="rtl" --}}>
  <head>
    <!-- Required meta tags -->
    @include('layouts.assets.meta')
    <title>{{env('APP_VAR_TITLE_HEADER', 'Laravel')}}</title>

    <!-- vendor css -->
    @include('layouts.assets.head')
    @stack('css')
    
    @livewireStyles
  </head>

<body class="{{ !empty($body_class) ? $body_class : '' }}">
   @include('sweet::alert')

    <!-- ########## START: LEFT PANEL ########## -->
<div class="br-logo"><a href=""><span>[</span><i>{{env('APP_VAR_ONE_TITLE', 'Laravel')}}</i><span>]</span></a></div>
 @include('layouts.menu.menu_principal')   
    
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="br-header">
      
      <div class="br-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="input-group hidden-xs-down wd-170 transition">
         
        </div><!-- input-group -->
      </div><!-- br-header-left -->

@include('layouts.includes.header_menu')
      
    </div><!-- br-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
@include('layouts.includes.header_menu2')
    <!-- br-sideright -->
    <!-- ########## END: RIGHT PANEL ########## --->

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      
      @yield('content') 



     
  @include('layouts.includes.footer')

    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

  @include('layouts.assets.footer')

  
  @stack('scripts')
  <script type="text/javascript">
    $(document).ready(function() {
      $('.select2').select2();
      
      $('.numerico_partes').on('input', function () { 
          this.value = this.value.replace(/[^0-5]/g,'');
      });

       $('.numerico').on('input', function () { 
          this.value = this.value.replace(/[^0-9]/g,'');
      });
    
    });
  </script>
@livewireScripts
  </body>
</html>
