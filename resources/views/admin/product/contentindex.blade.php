<div class="responsive-table">
    <table class="table table-striped table-bordered" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>@lang('lang.choose')</th>
            <th>@lang('lang.stt')</th>
            <th>@lang('lang.name')</th>
            <th>@lang('lang.preview')</th>
            <th>@lang('lang.price')</th>
            <th>@lang('lang.quanlity')</th>
            <th>@lang('lang.picture')</th>
            <th>@lang('lang.action')</th>
          </tr>
        </thead>
        <tbody>
            @if (count($products))
                @foreach ($products as $product)
                    <tr>
                        <td><input type="checkbox" name="checkbox-item" id="{{ $product->id }}" class="checkbox-item icheck checkbox-input" name="checkbox1" /></td>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ ucwords(str_limit($product->name, 20, '...')) }}</td>
                        <td>{{ str_limit($product->preview, 20, '...') }}</td>
                        <td>{{ number_format($product->price, 0, ',', '.') }}</td>
                        <td>{{ $product->quanlity }}</td>
                        <td>{{ count($product->pictures) ? Html::image($product->pictures()->first()->picture, '', ['height' => '80em']) : trans('lang.noFoundImage') }}</td>
                        <td >
                            {{ Form::open(['route' => ['admin.product.edit', $product->id], 'method' => 'GET', 'class' => 'button-form col-md-6'])}}
                                {{ Form::button('<i class="fa fa-pencil"></i> ' . trans('lang.editBtn'), ['type' => 'submit', 'class' => 'btn btn-info']) }}
                            {{ Form::close() }}

                            {{ Form::open(['route' => ['admin.product.destroy', $product->id], 'class' => 'button-form col-md-6']) }}
                                {{ method_field('DELETE') }}
                                {{ Form::button('<i class="fa fa-trash"></i> ' . trans('lang.deleteBtn'), ['type' => 'submit', 'onclick' => 'return confirm("' . trans('lang.msgDel') . '")', 'class' => 'btn btn-danger']) }}
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
<div class="col-md-12">
    {{ $products->links() }}
</div>
