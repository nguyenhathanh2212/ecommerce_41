<div class="responsive-table">
    <table class="table table-striped table-bordered" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>@lang('lang.stt')</th>
            <th>@lang('lang.name')</th>
            <th>@lang('lang.email')</th>
            @if (Auth::user()->id == config('setting.num1'))
                <th>@lang('lang.isadmin')</th>
                <th>@lang('lang.action')</th>
            @endif
          </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ ucwords($user->fullname) }}</td>
                    <td>{{ $user->email }}</td>
                    @if (Auth::user()->id == config('setting.num1'))
                        <td>
                            <input type="checkbox" {{ $user->is_admin ? 'checked' : '' }} name="is_admin" id="{{ $user->id }}" class="checkbox-input is_admin_checkbox" onclick="return confirm('@lang('lang.areYouSure')')" />
                        </td>
                        <td>
                            {{ Form::open(['route' => ['admin.user.destroy', $user->id], 'class' => 'button-form col-md-6']) }}
                                {{ method_field('DELETE') }}
                                {{ Form::button('<i class="fa fa-trash"></i> ' . trans('lang.deleteBtn'), ['type' => 'submit', 'onclick' => 'return confirm("' . trans('lang.msgDel') . '")', 'class' => 'btn btn-danger']) }}
                            {{ Form::close() }}
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="col-md-12">
    {{ $users->links() }}
</div>
{{ Html::script(asset('templates/admin/js/admin.js')) }}
