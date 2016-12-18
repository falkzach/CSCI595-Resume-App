@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h1 class="display-3">Look at the console!</h1>
    </div>
@endsection

@section('javascript')
    <script>
        $(function() {
            console.log('hello world');

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: '/api/school',
                data: {_token: CSRF_TOKEN},
                dataType: 'JSON',
                success: function (data) {
                    console.log(data);
                    console.log('successully called api!');
                }
            });

            console.log('goodbye world');
        });
    </script>
@endsection
