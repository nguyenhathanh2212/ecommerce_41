@extends ('templates.admin.master')

@section ('content')
	<h5 class="tit"><i class="fa fa-product-hunt"></i>  @lang('lang.product')</h5>
    @include ('notice.notice')
	<div class="panel top-admin-panel">
        <div class="panel-body">
            <div class="col-md-12 padding-0" style="padding-bottom:20px;">
                <div class="col-md-2" style="padding-left:10px;">
                    <input type="checkbox" id="checkAll" class="icheck pull-left checkbox-input" name="checkbox1"/>
                    <a href="" id="btn-del-product" onclick="return confirm('{{ trans('lang.msgDel') }}')" class="btn btn-danger">@lang('lang.deleteBtn')</a>
                </div>
                <div class="header-content row col-md-2">
                    {{ Form::open(['route' => 'admin.product.create', 'method' => 'GET', 'class' => 'col-xs-7']) }}
                        {{ Form::button('<i class="fa fa-plus"></i> ' . trans('lang.addBtn'), array('type' => 'submit', 'class' => 'btn btn-default')) }}
                    {{ Form::close() }}
                </div>
                <div class="header-content row col-md-2">
                    <a href="{{ route('admin.product.importfile') }}" class="btn btn-default">@lang('lang.import')</a>
                </div>
                <div class="col-md-6">
                    <div class="col-sm-6 padding-0">
                    </div>
                    <div class="col-sm-6 padding-0">
                        <div class="input-group">
                            {{ Form::open() }}
                                {{ Form::text('search', '', ['class' => 'form-control search-product', 'aria-label' => '...']) }}
                            {{ Form::close() }}
                            <div class="input-group-btn">
                                {{ Form::button(trans('lang.search'), ['class' => 'btn btn-default']) }}
                            </div><!-- /btn-group -->
                        </div><!-- /input-group -->
                    </div>
                </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
        </div>
    </div>
    <div class="content-product">
        @include ('admin.product.contentindex')
    </div>
@endsection
