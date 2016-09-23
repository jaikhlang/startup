        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('startup.nav.profile.settings') }}</div>

                <div class="admin-sidebar">    
                    <div class="admin-usermenu">
					<ul class="nav">
						<li class="{{ set_active(['profile', 'profile']) }}">
							<a href="{{ url('/profile') }}">
							<i class="fa fa-user"></i>
							{{ trans('startup.nav.profile.profile') }} </a>
						</li>
						<li class="{{ set_active(['profile/security', 'profile/security']) }}">
							<a href="{{ url('/profile/security') }}">
							<i class="fa fa-key"></i>
							{{ trans('startup.nav.profile.security') }} </a>
						</li>	
						<li class="{{ set_active(['profile/messages*', 'profile/messages*']) }}">
							<a href="{{ url('/profile/messages') }}">
							<i class="fa fa-comments"></i>
							{{ trans('startup.nav.profile.messages') }} @include('messenger.unread-count')</a>
						</li>						
					</ul>
					</div>
                </div>
            </div>
        </div> 