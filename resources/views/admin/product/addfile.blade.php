@extends ('templates.admin.master')

@section ('content')
    <h5 class="tit">
        <i class="fa fa-product-hunt"></i>  @lang('lang.product')
    </h5>
    @include ('notice.notice')
    <div class="col-sm-offset-1">
        {{ Form::open(['route' => 'admin.product.importfile', 'files'=>'true']) }}
            <span>@lang('lang.import')</span>
            {{ Form::file('file', ['required' => '']) }}
            <br>
            {{ Form::submit(trans('lang.addBtn'), ['class' => 'btn btn-default']) }}
        {{ Form::close() }}
    </div>
@endsection
