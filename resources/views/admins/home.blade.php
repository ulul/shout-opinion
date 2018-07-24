@extends('layouts.admin')

@section('sidebar')
	@include('admins.partials.sidebar')
@endsection

@section('content')
	<main class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="form-group col-md-12">
                        <h1>Welcome Administrator</h1>
                        <p></p>

                    </div>
                </div>
  
                <hr>
                
            </div>
    </main>
@endsection

@section('script')
	<script type="text/javascript">
		jQuery(function ($) {

		    $(".sidebar-dropdown > a").click(function () {
		        $(".sidebar-submenu").slideUp(200);
		        if ($(this).parent().hasClass("active")) {
		            $(".sidebar-dropdown").removeClass("active");
		            $(this).parent().removeClass("active");
		        } else {
		            $(".sidebar-dropdown").removeClass("active");
		            $(this).next(".sidebar-submenu").slideDown(200);
		            $(this).parent().addClass("active");
		        }

		    });

		    $("#toggle-sidebar").click(function () {
		        $(".page-wrapper").toggleClass("toggled");
		    });
		   
		   
		});
	</script>
@endsection