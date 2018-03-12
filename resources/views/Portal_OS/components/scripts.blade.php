@section('head-scripts')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="{{ asset('/portal-os/js/lib/core.js') }}"></script>
@endsection
@section('footer-scripts')
    @if($modules && isset($modules))
        @foreach($modules as $module)
            <script src="{{ asset('/portal-os/js/lib/'.$module.'.js') }}"></script>
        @endforeach
    @endif
@endsection
