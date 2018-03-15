@extends ('templates.admin.master')

@section ('content')
    <h5 class="tit">
        <i class="fa fa-product-hunt"></i>  @lang('lang.product')
    </h5>
    @include ('notice.notice')
    <div class="col-sm-offset-1">
        <h3>@lang('lang.import')</h3>
        {{ Form::open(['route' => 'admin.product.importfile', 'files'=>'true']) }}
            {{ Form::file('file', ['required' => '']) }}
            <br><hr><br>
            {{ Form::submit(trans('lang.addBtn'), ['class' => 'btn btn-default']) }}
        {{ Form::close() }}
    </div>
@endsection
