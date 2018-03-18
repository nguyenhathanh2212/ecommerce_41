@extends ('templates.admin.master')

@section ('content')
    <h5 class="tit"><i class="fa fa-align-right"></i>  @lang('lang.order')</h5>
    @include ('notice.notice')
    <div class="panel top-admin-panel">
        <div class="panel-body">
            <div class="col-md-12 padding-0">
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('.status_order').change(function(event) {
                            var status = $(this).val();

                            $.ajax({
                                url: route('admin.order.showbystatus'),
                                type: 'POST',
                                data: {
                                    status:status,
                                },
                                success: function(data) {
                                    $('.content-order').html(data);
                                }
                            });
                        });

                        $('.content-order').on('click', '.pagination a',function(event) {
                            event.preventDefault();
                            $('li').removeClass('active');
                            $(this).parent('li').addClass('active');
                            var myurl = $(this).attr('href');
                            var page=$(this).attr('href').split('page=')[1];
                            getData(page);
                        });
                        function getData(page){
                            var status = $('.status_order').val();
                            $.ajax({
                                url: route('admin.order.showbystatus') +'?page=' + page,
                                type: 'post',
                                data: {
                                    status: status,
                                },
                                success: function success(data) {
                                    $('.content-order').html(data);
                                }
                            });
                        }
                    });
                </script>
                <div class="col-md-6">
                    {{ Form::open() }}
                        {{ Form::select('status', [config('setting.processing') => trans('lang.processing'), config('setting.delivering') => trans('lang.delivering'), config('setting.closed') => trans('lang.closed')], '', ['class' => 'form-control status_order']) }}
                    {{ Form::close() }}
                </div>
                <div class="col-md-6">
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
    <div class="content-order">
        @include ('admin.order.contentindex')
    </div>
@endsection
