@extends($master)
@section('page', trans('panichd::admin.status-edit-title', ['name' => ucwords($status->name)]))

@include('panichd::shared.common')
@include('panichd::shared.colorpicker', [
	'include_colorpickerplus_script' => true,
	'input_color' => $status->color
])

@section('content')
    <div class="well bs-component">
        {!! CollectiveForm::model($status, [
                                    'route' => [$setting->grab('admin_route').'.status.update', $status->id],
                                    'method' => 'PATCH',
                                    'class' => 'form-horizontal'
                                    ]) !!}
        <legend>{{ trans('panichd::admin.status-edit-title', ['name' => ucwords($status->name)]) }}</legend>
        @include('panichd::admin.status.form', ['update', true])
        {!! CollectiveForm::close() !!}
    </div>
@stop