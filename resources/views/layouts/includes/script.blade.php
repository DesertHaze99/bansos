<!-- Core JS files -->
<script src="{{ asset('limitless/Template/global_assets/js/main/jquery.min.js') }}"></script>
<script src="{{ asset('limitless/Template/global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('limitless/Template/global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
<!-- /core JS files -->

<!-- Theme JS files -->
<script src="{{ asset('limitless/Template/global_assets/js/plugins/visualization/d3/d3.min.js') }}"></script>
<script src="{{ asset('limitless/Template/global_assets/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
<script src="{{ asset('limitless/Template/global_assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
<script src="{{ asset('limitless/Template/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
<script src="{{ asset('limitless/Template/global_assets/js/plugins/ui/moment/moment.min.js') }}"></script>
<script src="{{ asset('limitless/Template/global_assets/js/plugins/pickers/daterangepicker.js') }}"></script>

<script src="{{ asset('limitless/Template/layout_3/LTR/default/full/assets/js/app.js') }}"></script>
<script src="{{ asset('limitless/Template/global_assets/js/demo_pages/dashboard.js') }}"></script>

@yield('librariesJS')

@yield('script')
@stack('script')