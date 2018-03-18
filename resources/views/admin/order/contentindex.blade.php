<div class="responsive-table">
    <table class="table table-striped table-bordered" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>@lang('lang.stt')</th>
            <th>@lang('lang.orderer')</th>
            <th>@lang('lang.numberphone')</th>
            <th>@lang('lang.orderDate')</th>
            <th>@lang('lang.action')</th>
          </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{ route('admin.order.show', $order->id) }}">{{ $order->fullname }}</a></td>
                    <td>{{ $order->numberphone }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>
                        {{ Form::open(['route' => ['admin.order.destroy', $order->id], 'class' => 'button-form col-md-6']) }}
                            {{ method_field('DELETE') }}
                            {{ Form::button('<i class="fa fa-trash"></i> ' . trans('lang.deleteBtn'), ['type' => 'submit', 'onclick' => 'return confirm("' . trans('lang.msgDel') . '")', 'class' => 'btn btn-danger']) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="col-md-12">
    {{ $orders->links() }}
</div>
{{ Html::script(asset('templates/admin/js/admin.js')) }}
