        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('startup.nav.back.administration') }}</div>

                <div class="admin-sidebar">    
                    <div class="admin-usermenu">
					<ul class="nav">
					    @can('access-backend')
						<li class="{{ set_active(['admin', 'admin']) }}">
							<a href="{{ url('/admin') }}">
							<i class="fa fa-dashboard"></i>
							{{ trans('startup.nav.back.dashboard') }} </a>
						</li>
						@endcan
						@can('manage-users')
						<li class="{{ set_active(['admin/users', 'admin/users/*']) }}">
							<a href="{{ url('/admin/users') }}">
							<i class="fa fa-users"></i>
							{{ trans('startup.nav.back.users') }} </a>
						</li>
						@endcan
						@can('manage-roles')
						<li class="{{ set_active(['admin/roles', 'admin/roles/*']) }}">
							<a href="{{ url('/admin/roles') }}">
							<i class="fa fa-unlock"></i>
						{{ trans('startup.nav.back.roles') }} </a>
						</li>
						@endcan
						@can('manage-permissions')
						<li class="{{ set_active(['admin/permissions', 'admin/permissions/*']) }}">
							<a href="{{ url('/admin/permissions') }}">
							<i class="fa fa-key"></i>
							{{ trans('startup.nav.back.permissions') }} </a>
						</li>
						@endcan
						@can('manage-uploads')
						<li class="{{ set_active(['admin/upload', 'admin/upload/*']) }}">
							<a href="{{ url('/admin/upload') }}">
							<i class="fa fa-file"></i>
						{{ trans('startup.nav.back.uploads') }} </a>
						</li>
						@endcan						
						@can('manage-settings')
						<li class="{{ set_active(['admin/settings', 'admin/settings/*']) }}">
							<a href="{{ url('/admin/settings') }}">
							<i class="fa fa-cog"></i>
							{{ trans('startup.nav.back.settings') }} </a>
						</li>
						@endcan
						
					</ul>
					</div>
                </div>
            </div>
        </div> 