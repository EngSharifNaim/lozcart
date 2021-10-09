@if ($message = Session::get('success'))
    <script>
        Toast.fire({
            icon: 'success',
            title: '{!! $message !!}'
        })
    </script>
@endif


@if ($message = Session::get('error'))
<script>
    Toast.fire({
        icon: 'error',
        title: '{!! $message !!}'
    })
</script>
@endif

@if(session()->has('message'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
        <strong></strong>
</div>

<script>
    Toast.fire({
        icon: 'error',
        title: '{!! session()->get('message') !!}'
    })
</script>
@endif

@if ($errors->any())

<script>
    @foreach ($errors->all() as $key => $error)
    Toast.fire({
        icon: 'error',
        title: '{!! $error !!}'
    })
    @endforeach

</script>
@endif




@if ($message = Session::get('warning'))
    <script>
        Toast.fire({
            icon: 'warning',
            title: '{!! $message !!}'
        })
    </script>
@endif


@if ($message = Session::get('info'))
<script>
    Toast.fire({
        icon: 'info',
        title: '{!! $message !!}'
    })
</script>
@endif


