@section('head-scripts')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="{{ asset('/portal-os/js/lib/core.js') }}"></script>
@endsection
@section('footer-scripts')
    <script class="page" src="{{asset('/portal-os/js/layouts.js')}}"></script>
    @if($page && isset($page))
        @if(trim($page)!=='')
            <script class="page" id="{{$page}}" src="{{ asset('/portal-os/js/pages/'.$page.'.js') }}"></script>
        @endif
    @endif
@endsection
