<script type="text/javascript" src="{{ asset('assets/backend') }}/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/backend') }}/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/backend') }}/bower_components/popper.js/dist/umd/popper.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/backend') }}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script type="text/javascript" src="{{ asset('assets/backend') }}/bower_components/jquery-slimscroll/jquery.slimscroll.js"></script>

<script type="text/javascript" src="{{ asset('assets/backend') }}/bower_components/modernizr/modernizr.js"></script>

<script type="text/javascript" src="{{ asset('assets/backend') }}/bower_components/chart.js/dist/Chart.js"></script>

<script src="{{ asset('assets/backend') }}/pages/widget/amchart/amcharts.js"></script>
<script src="{{ asset('assets/backend') }}/pages/widget/amchart/serial.js"></script>
<script src="{{ asset('assets/backend') }}/pages/widget/amchart/light.js"></script>
<script src="{{ asset('assets/backend') }}/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/backend') }}/js/SmoothScroll.js"></script>
<script src="{{ asset('assets/backend') }}/js/pcoded.min.js"></script>

<script src="{{ asset('assets/backend') }}/js/vartical-layout.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/backend') }}/pages/dashboard/custom-dashboard.js"></script>
<script type="text/javascript" src="{{ asset('assets/backend') }}/js/script.min.js"></script>

<!-- Toastr-->
{{-- <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script> --}}
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
<!-- sweetalert2-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Logout confirmation-->
<script>
    $(document).ready(function() {
        $('#logout').on('click', function(event) {
            event.preventDefault();
            var link = $(this).attr('href');
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, logout!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link;
                }
            });
        });
    });
</script>

<!-- Page Specific Js-->
@stack('admin_script')
