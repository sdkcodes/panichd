<!-- Modal Dialog -->
<div class="modal fade" id="modalDepartmentUser" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">{{ trans('ticketit::lang.flash-x') }}</button>
		<h4 class="modal-title">{{ trans('ticketit::admin.btn-create-new-deptsuser') }}</h4>
		</div>
		<div class="modal-body">
		{!! CollectiveForm::open([
			'route' => [$setting->grab('admin_route').'.deptsuser.create'],
			'method' => 'PATCH',
			'class' => 'form-horizontal',
			'data-route-create' => $setting->grab('admin_route').'.deptsuser.store',
			'data-route-update' => $setting->grab('admin_route').'.deptsuser.update'
			]) !!}
	
		<div class="form-group">
			{!! CollectiveForm::label('user_id', trans('ticketit::lang.user') . trans('ticketit::lang.colon'), [
				'class' => 'control-label col-lg-3',
			]) !!}
			
			<div class="col-lg-9">
				<select name="user_id" id="user_select2" class="form_select2 form-control" style="xdisplay: none; xwidth: 100%">
				@foreach (App\User::orderBy('name')->get() as $user)
					<option value="{{ $user->id }}">{{ ($user->ticketit_department ? trans('ticketit::lang.department-shortening').trans('ticketit::lang.colon'):'').$user->name }}</option>
				@endforeach
				</select>
			</div>
		</div>
		
		<div class="form-group">
			{!! CollectiveForm::label('department_id', trans('ticketit::lang.department') . trans('ticketit::lang.colon'), [
				'class' => 'control-label col-lg-3',
			]) !!}
		
			<div class="col-lg-9">
				<select name="department_id" id="department_select2" class="form_select2 form-control" style="xdisplay: none; xwidth: 100%">
				<?php $department = $a_depts[0]->deptName(); ?>
				<optgroup label="{{ $department }}">				
				@foreach ($a_depts as $dept)
					@if ($dept->deptName() != $department)
						</optgroup>
						<?php $department = $dept->deptName();?>
						<optgroup label="{{ $department }}">
					@endif
					<option value="{{ $dept->id }}">{{ $dept->resume() }}</option>
				@endforeach
				</optgroup>
				</select>
			</div>
		</div>
		 
		</div>
		<div class="modal-footer">
		<button type="submit" class="btn btn-danger">{{ trans('ticketit::lang.btn-change') }}</button>
		</div>
		{!! CollectiveForm::close() !!}
    </div>
  </div>
</div>
