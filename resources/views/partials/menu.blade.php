<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <select class="searchable-field form-control">

                </select>
            </li>
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('audit_log_access')
                            <li class="{{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                <a href="{{ route("admin.audit-logs.index") }}">
                                    <i class="fa-fw fas fa-file-alt">

                                    </i>
                                    <span>{{ trans('cruds.auditLog.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('hospital_hr_access')
                            <li class="{{ request()->is("admin/hospital-hrs") || request()->is("admin/hospital-hrs/*") ? "active" : "" }}">
                                <a href="{{ route("admin.hospital-hrs.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.hospitalHr.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('user_alert_access')
                <li class="{{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "active" : "" }}">
                    <a href="{{ route("admin.user-alerts.index") }}">
                        <i class="fa-fw fas fa-bell">

                        </i>
                        <span>{{ trans('cruds.userAlert.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('setting_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.setting.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('procedure_type_access')
                            <li class="{{ request()->is("admin/procedure-types") || request()->is("admin/procedure-types/*") ? "active" : "" }}">
                                <a href="{{ route("admin.procedure-types.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.procedureType.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('modality_access')
                            <li class="{{ request()->is("admin/modalities") || request()->is("admin/modalities/*") ? "active" : "" }}">
                                <a href="{{ route("admin.modalities.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.modality.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('procedure_access')
                            <li class="{{ request()->is("admin/procedures") || request()->is("admin/procedures/*") ? "active" : "" }}">
                                <a href="{{ route("admin.procedures.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.procedure.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('price_agreement_policy_access')
                            <li class="{{ request()->is("admin/price-agreement-policies") || request()->is("admin/price-agreement-policies/*") ? "active" : "" }}">
                                <a href="{{ route("admin.price-agreement-policies.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.priceAgreementPolicy.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('machine_configuration_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.machineConfiguration.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('config_cr_machine_access')
                            <li class="{{ request()->is("admin/config-cr-machines") || request()->is("admin/config-cr-machines/*") ? "active" : "" }}">
                                <a href="{{ route("admin.config-cr-machines.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.configCrMachine.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('config_dr_machine_access')
                            <li class="{{ request()->is("admin/config-dr-machines") || request()->is("admin/config-dr-machines/*") ? "active" : "" }}">
                                <a href="{{ route("admin.config-dr-machines.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.configDrMachine.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('config_mammography_machine_access')
                            <li class="{{ request()->is("admin/config-mammography-machines") || request()->is("admin/config-mammography-machines/*") ? "active" : "" }}">
                                <a href="{{ route("admin.config-mammography-machines.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.configMammographyMachine.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('config_ct_machine_access')
                            <li class="{{ request()->is("admin/config-ct-machines") || request()->is("admin/config-ct-machines/*") ? "active" : "" }}">
                                <a href="{{ route("admin.config-ct-machines.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.configCtMachine.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('config_mri_machine_access')
                            <li class="{{ request()->is("admin/config-mri-machines") || request()->is("admin/config-mri-machines/*") ? "active" : "" }}">
                                <a href="{{ route("admin.config-mri-machines.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.configMriMachine.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('machine_status_profile_access')
                            <li class="{{ request()->is("admin/machine-status-profiles") || request()->is("admin/machine-status-profiles/*") ? "active" : "" }}">
                                <a href="{{ route("admin.machine-status-profiles.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.machineStatusProfile.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('hospital_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.hospitalManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('hospital_mediscan_access')
                            <li class="{{ request()->is("admin/hospital-mediscans") || request()->is("admin/hospital-mediscans/*") ? "active" : "" }}">
                                <a href="{{ route("admin.hospital-mediscans.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.hospitalMediscan.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('hospital_mentor_access')
                            <li class="{{ request()->is("admin/hospital-mentors") || request()->is("admin/hospital-mentors/*") ? "active" : "" }}">
                                <a href="{{ route("admin.hospital-mentors.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.hospitalMentor.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('hospital_five_c_network_access')
                            <li class="{{ request()->is("admin/hospital-five-c-networks") || request()->is("admin/hospital-five-c-networks/*") ? "active" : "" }}">
                                <a href="{{ route("admin.hospital-five-c-networks.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.hospitalFiveCNetwork.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('hms_client_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.hmsClient.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('hm_access')
                            <li class="{{ request()->is("admin/hms") || request()->is("admin/hms/*") ? "active" : "" }}">
                                <a href="{{ route("admin.hms.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.hm.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('radiologist_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.radiologistManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('radiologist_mediscan_access')
                            <li class="{{ request()->is("admin/radiologist-mediscans") || request()->is("admin/radiologist-mediscans/*") ? "active" : "" }}">
                                <a href="{{ route("admin.radiologist-mediscans.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.radiologistMediscan.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('radiologist_mentor_access')
                            <li class="{{ request()->is("admin/radiologist-mentors") || request()->is("admin/radiologist-mentors/*") ? "active" : "" }}">
                                <a href="{{ route("admin.radiologist-mentors.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.radiologistMentor.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('radiologist_five_c_access')
                            <li class="{{ request()->is("admin/radiologist-five-cs") || request()->is("admin/radiologist-five-cs/*") ? "active" : "" }}">
                                <a href="{{ route("admin.radiologist-five-cs.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.radiologistFiveC.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('marketing_department_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.marketingDepartment.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('visited_hospital_access')
                            <li class="{{ request()->is("admin/visited-hospitals") || request()->is("admin/visited-hospitals/*") ? "active" : "" }}">
                                <a href="{{ route("admin.visited-hospitals.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.visitedHospital.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('upcoming_connection_list_access')
                            <li class="{{ request()->is("admin/upcoming-connection-lists") || request()->is("admin/upcoming-connection-lists/*") ? "active" : "" }}">
                                <a href="{{ route("admin.upcoming-connection-lists.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.upcomingConnectionList.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('employee_leave_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.employeeLeave.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('leave_access')
                            <li class="{{ request()->is("admin/leaves") || request()->is("admin/leaves/*") ? "active" : "" }}">
                                <a href="{{ route("admin.leaves.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.leave.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('leave_history_access')
                            <li class="{{ request()->is("admin/leave-histories") || request()->is("admin/leave-histories/*") ? "active" : "" }}">
                                <a href="{{ route("admin.leave-histories.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.leaveHistory.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('task_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-list">

                        </i>
                        <span>{{ trans('cruds.taskManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('task_status_access')
                            <li class="{{ request()->is("admin/task-statuses") || request()->is("admin/task-statuses/*") ? "active" : "" }}">
                                <a href="{{ route("admin.task-statuses.index") }}">
                                    <i class="fa-fw fas fa-server">

                                    </i>
                                    <span>{{ trans('cruds.taskStatus.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('task_tag_access')
                            <li class="{{ request()->is("admin/task-tags") || request()->is("admin/task-tags/*") ? "active" : "" }}">
                                <a href="{{ route("admin.task-tags.index") }}">
                                    <i class="fa-fw fas fa-server">

                                    </i>
                                    <span>{{ trans('cruds.taskTag.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('task_access')
                            <li class="{{ request()->is("admin/tasks") || request()->is("admin/tasks/*") ? "active" : "" }}">
                                <a href="{{ route("admin.tasks.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.task.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('tasks_calendar_access')
                            <li class="{{ request()->is("admin/tasks-calendars") || request()->is("admin/tasks-calendars/*") ? "active" : "" }}">
                                <a href="{{ route("admin.tasks-calendars.index") }}">
                                    <i class="fa-fw fas fa-calendar">

                                    </i>
                                    <span>{{ trans('cruds.tasksCalendar.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('inventory_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.inventoryManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('inventory_access')
                            <li class="{{ request()->is("admin/inventories") || request()->is("admin/inventories/*") ? "active" : "" }}">
                                <a href="{{ route("admin.inventories.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.inventory.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="{{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}">
                        <a href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>
    </section>
</aside>