@section('head-scripts')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="{{ asset('/portal-os/js/lib/core.js') }}"></script>
@endsection
@section('footer-scripts')
    @if($modules && isset($modules))
        @foreach($modules as $module)
            @if(trim($module)!=='')
                <script src="{{ asset('/portal-os/js/lib/'.$module.'.js') }}"></script>
            @endif
        @endforeach
    @endif
    @if($page && isset($page))
        @if(trim($page)!=='')
            <script src="{{ asset('/portal-os/js/pages/'.$page.'.js') }}"></script>
        @endif
    @endif
@endsection
