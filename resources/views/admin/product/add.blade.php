@extends ('templates.admin.master')

@section ('content')
    <h5 class="tit"><i class="fa fa-product-hunt"></i>  @lang('lang.product')</h5>
    @include ('notice.notice')
    {{ Form::open(['route' => 'admin.product.store', 'files' => true]) }}
        {{ Form::label('left', trans('lang.name') . ': (*)', ['class' => 'left-login']) }}
        <div class="right-login">
            {{ Form::text('name', '', ['class' => 'input-right', 'required' => '']) }}
            <br/><br/>
        </div>
        <div class="clr"></div>
        {{ Form::label('left', trans('lang.preview') . ': (*)', ['class' => 'left-login']) }}
        <div class="right-login">
            {{ Form::text('preview', '', ['class' => 'input-right', 'required' => '']) }}
            <br/><br/>
        </div>
        <div class="clr"></div>
        {{ Form::label('left', trans('lang.description') . ': (*)', ['class' => 'left-login']) }}
        <div class="right-login">
            {{ Form::textarea('description', '', ['class' => 'input-right text-area', 'required' => '']) }}
            <br/><br/>
        </div>
        <div class="clr"></div>
        {{ Form::label('left', trans('lang.category') . ': (*)', ['class' => 'left-login']) }}
        <div class="right-login row">
            <div class="col-md-6">
                {{ Form::select('parent_id', $parentCategries, '', ['class' => 'parent-category']) }}
            </div>
            <div class="col-md-6">
                {{ Form::select('category_id', $subCategries, '', ['class' => 'sub-category']) }}
            </div>
        </div>
        <div class="clr"></div>
        {{ Form::label('left', trans('lang.quanlity') . ': (*)', ['class' => 'left-login']) }}
        <div class="right-login">
            {{ Form::number('quanlity', '', ['class' => 'input-right', 'required' => '']) }}
            <br/><br/>
        </div>
        <div class="clr"></div>
        {{ Form::label('left', trans('lang.price') . ': (*)', ['class' => 'left-login']) }}
        <div class="right-login">
            {{ Form::number('price', '', ['class' => 'input-right', 'required' => '']) }}
            <br/><br/>
        </div>
        <div class="clr"></div>
        {{ Form::label('left', trans('lang.discount'), ['class' => 'left-login']) }}
        <div class="right-login">
            {{ Form::number('discount_percent', '', ['class' => 'input-right', 'required' => '']) }}
            <br/><br/>
        </div>
        <div class="clr"></div>
        {{ Form::label('left', trans('lang.pictures') . ': (*)', ['class' => 'left-login']) }}
        <div class="right-login">
            {{ Form::file('pictures[]', ['class' => 'input-right', 'multiple' => '', 'required' => '']) }}
        </div>
        <div class="clr"></div> 
        {{ Form::submit(trans('lang.addBtn'), ['class' => 'button']) }}
    {{ Form::close() }}
@endsection
