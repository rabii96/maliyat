@if(count($errors) > 0)
    <div id="message" class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
        </button>
        @foreach($errors->all() as $error)
            <p dir="ltr" style="text-align: center;">
                {{$error}}
            </p>
        @endforeach
    </div>
@endif

@if(session('success'))
    <div id="message" class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
        </button>
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div id="message" class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
        </button>
        {{session('error')}}
    </div>
@endif
<script>
    $(document).ready (function(){
            $("#message").fadeTo(3000, 500).slideUp(600, function(){
                $("#message").slideUp(600);
            });   
    });
</script>
