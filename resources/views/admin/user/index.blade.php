@extends ('templates.admin.master')

@section ('content')
    <h5 class="tit"><i class="fa fa-user"></i>  @lang('lang.user')</h5>
    @include ('notice.notice')
    <div class="panel top-admin-panel">
        <div class="panel-body">
            <div class="col-md-12 padding-0">
                <div class="col-md-6 col-md-offset-6">
                    <div class="input-group">
                        {{ Form::open() }}
                            {{ Form::text('search', '', ['class' => 'form-control search-users', 'aria-label' => '...']) }}
                        {{ Form::close() }}
                        <div class="input-group-btn">
                            {{ Form::button(trans('lang.search'), ['class' => 'btn btn-default btn-search-user']) }}
                        </div><!-- /btn-group -->
                    </div><!-- /input-group -->
                </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
        </div>
    </div>
    <div class="content-user">
        @include ('admin.user.contentindex')
    </div>
@endsection
