<!-- Bootstrap JS -->
<script src="{{ asset('assets/backend') }}/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="{{ asset('assets/backend') }}/js/jquery.min.js"></script>
<script src="{{ asset('assets/backend') }}/plugins/simplebar/js/simplebar.min.js"></script>
<script src="{{ asset('assets/backend') }}/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="{{ asset('assets/backend') }}/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="{{ asset('assets/backend') }}/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="{{ asset('assets/backend') }}/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="{{ asset('assets/backend') }}/plugins/chartjs/js/chart.js"></script>
<script src="{{ asset('assets/backend') }}/js/index.js"></script>
<!--app JS-->
<script src="{{ asset('assets/backend') }}/js/app.js"></script>
<script>
    new PerfectScrollbar(".app-container")
</script>
<!-- jQuery-->
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
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
