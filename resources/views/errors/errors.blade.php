@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <h3 class="light red"><i class="fa fa-times-circle"></i> {{ $error }}</h3>
    @endforeach
@endif
