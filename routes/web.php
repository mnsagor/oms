<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Hospital Mediscan
    Route::delete('hospital-mediscans/destroy', 'HospitalMediscanController@massDestroy')->name('hospital-mediscans.massDestroy');
    Route::post('hospital-mediscans/media', 'HospitalMediscanController@storeMedia')->name('hospital-mediscans.storeMedia');
    Route::post('hospital-mediscans/ckmedia', 'HospitalMediscanController@storeCKEditorImages')->name('hospital-mediscans.storeCKEditorImages');
    Route::post('hospital-mediscans/parse-csv-import', 'HospitalMediscanController@parseCsvImport')->name('hospital-mediscans.parseCsvImport');
    Route::post('hospital-mediscans/process-csv-import', 'HospitalMediscanController@processCsvImport')->name('hospital-mediscans.processCsvImport');
    Route::resource('hospital-mediscans', 'HospitalMediscanController');

    // Modality
    Route::delete('modalities/destroy', 'ModalityController@massDestroy')->name('modalities.massDestroy');
    Route::post('modalities/media', 'ModalityController@storeMedia')->name('modalities.storeMedia');
    Route::post('modalities/ckmedia', 'ModalityController@storeCKEditorImages')->name('modalities.storeCKEditorImages');
    Route::resource('modalities', 'ModalityController');

    // Procedure Type
    Route::delete('procedure-types/destroy', 'ProcedureTypeController@massDestroy')->name('procedure-types.massDestroy');
    Route::resource('procedure-types', 'ProcedureTypeController');

    // Procedure
    Route::delete('procedures/destroy', 'ProcedureController@massDestroy')->name('procedures.massDestroy');
    Route::resource('procedures', 'ProcedureController');

    // Hms
    Route::delete('hms/destroy', 'HmsController@massDestroy')->name('hms.massDestroy');
    Route::post('hms/media', 'HmsController@storeMedia')->name('hms.storeMedia');
    Route::post('hms/ckmedia', 'HmsController@storeCKEditorImages')->name('hms.storeCKEditorImages');
    Route::post('hms/parse-csv-import', 'HmsController@parseCsvImport')->name('hms.parseCsvImport');
    Route::post('hms/process-csv-import', 'HmsController@processCsvImport')->name('hms.processCsvImport');
    Route::resource('hms', 'HmsController');

    // Price Agreement Policy
    Route::delete('price-agreement-policies/destroy', 'PriceAgreementPolicyController@massDestroy')->name('price-agreement-policies.massDestroy');
    Route::post('price-agreement-policies/parse-csv-import', 'PriceAgreementPolicyController@parseCsvImport')->name('price-agreement-policies.parseCsvImport');
    Route::post('price-agreement-policies/process-csv-import', 'PriceAgreementPolicyController@processCsvImport')->name('price-agreement-policies.processCsvImport');
    Route::resource('price-agreement-policies', 'PriceAgreementPolicyController');

    // Config Cr Machine
    Route::delete('config-cr-machines/destroy', 'ConfigCrMachineController@massDestroy')->name('config-cr-machines.massDestroy');
    Route::post('config-cr-machines/parse-csv-import', 'ConfigCrMachineController@parseCsvImport')->name('config-cr-machines.parseCsvImport');
    Route::post('config-cr-machines/process-csv-import', 'ConfigCrMachineController@processCsvImport')->name('config-cr-machines.processCsvImport');
    Route::resource('config-cr-machines', 'ConfigCrMachineController');

    // Config Dr Machine
    Route::delete('config-dr-machines/destroy', 'ConfigDrMachineController@massDestroy')->name('config-dr-machines.massDestroy');
    Route::post('config-dr-machines/parse-csv-import', 'ConfigDrMachineController@parseCsvImport')->name('config-dr-machines.parseCsvImport');
    Route::post('config-dr-machines/process-csv-import', 'ConfigDrMachineController@processCsvImport')->name('config-dr-machines.processCsvImport');
    Route::resource('config-dr-machines', 'ConfigDrMachineController');

    // Config Mammography Machine
    Route::delete('config-mammography-machines/destroy', 'ConfigMammographyMachineController@massDestroy')->name('config-mammography-machines.massDestroy');
    Route::post('config-mammography-machines/parse-csv-import', 'ConfigMammographyMachineController@parseCsvImport')->name('config-mammography-machines.parseCsvImport');
    Route::post('config-mammography-machines/process-csv-import', 'ConfigMammographyMachineController@processCsvImport')->name('config-mammography-machines.processCsvImport');
    Route::resource('config-mammography-machines', 'ConfigMammographyMachineController');

    // Config Ct Machine
    Route::delete('config-ct-machines/destroy', 'ConfigCtMachineController@massDestroy')->name('config-ct-machines.massDestroy');
    Route::post('config-ct-machines/parse-csv-import', 'ConfigCtMachineController@parseCsvImport')->name('config-ct-machines.parseCsvImport');
    Route::post('config-ct-machines/process-csv-import', 'ConfigCtMachineController@processCsvImport')->name('config-ct-machines.processCsvImport');
    Route::resource('config-ct-machines', 'ConfigCtMachineController');

    // Config Mri Machine
    Route::delete('config-mri-machines/destroy', 'ConfigMriMachineController@massDestroy')->name('config-mri-machines.massDestroy');
    Route::post('config-mri-machines/parse-csv-import', 'ConfigMriMachineController@parseCsvImport')->name('config-mri-machines.parseCsvImport');
    Route::post('config-mri-machines/process-csv-import', 'ConfigMriMachineController@processCsvImport')->name('config-mri-machines.processCsvImport');
    Route::resource('config-mri-machines', 'ConfigMriMachineController');

    // Hospital Hr
    Route::delete('hospital-hrs/destroy', 'HospitalHrController@massDestroy')->name('hospital-hrs.massDestroy');
    Route::post('hospital-hrs/media', 'HospitalHrController@storeMedia')->name('hospital-hrs.storeMedia');
    Route::post('hospital-hrs/ckmedia', 'HospitalHrController@storeCKEditorImages')->name('hospital-hrs.storeCKEditorImages');
    Route::post('hospital-hrs/parse-csv-import', 'HospitalHrController@parseCsvImport')->name('hospital-hrs.parseCsvImport');
    Route::post('hospital-hrs/process-csv-import', 'HospitalHrController@processCsvImport')->name('hospital-hrs.processCsvImport');
    Route::resource('hospital-hrs', 'HospitalHrController');

    // Machine Status Profile
    Route::delete('machine-status-profiles/destroy', 'MachineStatusProfileController@massDestroy')->name('machine-status-profiles.massDestroy');
    Route::post('machine-status-profiles/parse-csv-import', 'MachineStatusProfileController@parseCsvImport')->name('machine-status-profiles.parseCsvImport');
    Route::post('machine-status-profiles/process-csv-import', 'MachineStatusProfileController@processCsvImport')->name('machine-status-profiles.processCsvImport');
    Route::resource('machine-status-profiles', 'MachineStatusProfileController');

    // Hospital Mentor
    Route::delete('hospital-mentors/destroy', 'HospitalMentorController@massDestroy')->name('hospital-mentors.massDestroy');
    Route::post('hospital-mentors/media', 'HospitalMentorController@storeMedia')->name('hospital-mentors.storeMedia');
    Route::post('hospital-mentors/ckmedia', 'HospitalMentorController@storeCKEditorImages')->name('hospital-mentors.storeCKEditorImages');
    Route::post('hospital-mentors/parse-csv-import', 'HospitalMentorController@parseCsvImport')->name('hospital-mentors.parseCsvImport');
    Route::post('hospital-mentors/process-csv-import', 'HospitalMentorController@processCsvImport')->name('hospital-mentors.processCsvImport');
    Route::resource('hospital-mentors', 'HospitalMentorController');

    // Hospital Five C Network
    Route::delete('hospital-five-c-networks/destroy', 'HospitalFiveCNetworkController@massDestroy')->name('hospital-five-c-networks.massDestroy');
    Route::post('hospital-five-c-networks/media', 'HospitalFiveCNetworkController@storeMedia')->name('hospital-five-c-networks.storeMedia');
    Route::post('hospital-five-c-networks/ckmedia', 'HospitalFiveCNetworkController@storeCKEditorImages')->name('hospital-five-c-networks.storeCKEditorImages');
    Route::post('hospital-five-c-networks/parse-csv-import', 'HospitalFiveCNetworkController@parseCsvImport')->name('hospital-five-c-networks.parseCsvImport');
    Route::post('hospital-five-c-networks/process-csv-import', 'HospitalFiveCNetworkController@processCsvImport')->name('hospital-five-c-networks.processCsvImport');
    Route::resource('hospital-five-c-networks', 'HospitalFiveCNetworkController');

    // Radiologist Mediscan
    Route::delete('radiologist-mediscans/destroy', 'RadiologistMediscanController@massDestroy')->name('radiologist-mediscans.massDestroy');
    Route::post('radiologist-mediscans/media', 'RadiologistMediscanController@storeMedia')->name('radiologist-mediscans.storeMedia');
    Route::post('radiologist-mediscans/ckmedia', 'RadiologistMediscanController@storeCKEditorImages')->name('radiologist-mediscans.storeCKEditorImages');
    Route::post('radiologist-mediscans/parse-csv-import', 'RadiologistMediscanController@parseCsvImport')->name('radiologist-mediscans.parseCsvImport');
    Route::post('radiologist-mediscans/process-csv-import', 'RadiologistMediscanController@processCsvImport')->name('radiologist-mediscans.processCsvImport');
    Route::resource('radiologist-mediscans', 'RadiologistMediscanController');

    // Radiologist Mentor
    Route::delete('radiologist-mentors/destroy', 'RadiologistMentorController@massDestroy')->name('radiologist-mentors.massDestroy');
    Route::post('radiologist-mentors/media', 'RadiologistMentorController@storeMedia')->name('radiologist-mentors.storeMedia');
    Route::post('radiologist-mentors/ckmedia', 'RadiologistMentorController@storeCKEditorImages')->name('radiologist-mentors.storeCKEditorImages');
    Route::post('radiologist-mentors/parse-csv-import', 'RadiologistMentorController@parseCsvImport')->name('radiologist-mentors.parseCsvImport');
    Route::post('radiologist-mentors/process-csv-import', 'RadiologistMentorController@processCsvImport')->name('radiologist-mentors.processCsvImport');
    Route::resource('radiologist-mentors', 'RadiologistMentorController');

    // Radiologist Five C
    Route::delete('radiologist-five-cs/destroy', 'RadiologistFiveCController@massDestroy')->name('radiologist-five-cs.massDestroy');
    Route::post('radiologist-five-cs/media', 'RadiologistFiveCController@storeMedia')->name('radiologist-five-cs.storeMedia');
    Route::post('radiologist-five-cs/ckmedia', 'RadiologistFiveCController@storeCKEditorImages')->name('radiologist-five-cs.storeCKEditorImages');
    Route::post('radiologist-five-cs/parse-csv-import', 'RadiologistFiveCController@parseCsvImport')->name('radiologist-five-cs.parseCsvImport');
    Route::post('radiologist-five-cs/process-csv-import', 'RadiologistFiveCController@processCsvImport')->name('radiologist-five-cs.processCsvImport');
    Route::resource('radiologist-five-cs', 'RadiologistFiveCController');

    // Visited Hospital
    Route::delete('visited-hospitals/destroy', 'VisitedHospitalController@massDestroy')->name('visited-hospitals.massDestroy');
    Route::post('visited-hospitals/media', 'VisitedHospitalController@storeMedia')->name('visited-hospitals.storeMedia');
    Route::post('visited-hospitals/ckmedia', 'VisitedHospitalController@storeCKEditorImages')->name('visited-hospitals.storeCKEditorImages');
    Route::post('visited-hospitals/parse-csv-import', 'VisitedHospitalController@parseCsvImport')->name('visited-hospitals.parseCsvImport');
    Route::post('visited-hospitals/process-csv-import', 'VisitedHospitalController@processCsvImport')->name('visited-hospitals.processCsvImport');
    Route::resource('visited-hospitals', 'VisitedHospitalController');

    // Upcoming Connection List
    Route::delete('upcoming-connection-lists/destroy', 'UpcomingConnectionListController@massDestroy')->name('upcoming-connection-lists.massDestroy');
    Route::resource('upcoming-connection-lists', 'UpcomingConnectionListController');

    // Leave
    Route::delete('leaves/destroy', 'LeaveController@massDestroy')->name('leaves.massDestroy');
    Route::post('leaves/media', 'LeaveController@storeMedia')->name('leaves.storeMedia');
    Route::post('leaves/ckmedia', 'LeaveController@storeCKEditorImages')->name('leaves.storeCKEditorImages');
    Route::resource('leaves', 'LeaveController');

    // Leave History
    Route::delete('leave-histories/destroy', 'LeaveHistoryController@massDestroy')->name('leave-histories.massDestroy');
    Route::resource('leave-histories', 'LeaveHistoryController');

    // Task Status
    Route::delete('task-statuses/destroy', 'TaskStatusController@massDestroy')->name('task-statuses.massDestroy');
    Route::resource('task-statuses', 'TaskStatusController');

    // Task Tag
    Route::delete('task-tags/destroy', 'TaskTagController@massDestroy')->name('task-tags.massDestroy');
    Route::resource('task-tags', 'TaskTagController');

    // Task
    Route::delete('tasks/destroy', 'TaskController@massDestroy')->name('tasks.massDestroy');
    Route::post('tasks/media', 'TaskController@storeMedia')->name('tasks.storeMedia');
    Route::post('tasks/ckmedia', 'TaskController@storeCKEditorImages')->name('tasks.storeCKEditorImages');
    Route::resource('tasks', 'TaskController');

    // Tasks Calendar
    Route::resource('tasks-calendars', 'TasksCalendarController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Inventory
    Route::delete('inventories/destroy', 'InventoryController@massDestroy')->name('inventories.massDestroy');
    Route::post('inventories/media', 'InventoryController@storeMedia')->name('inventories.storeMedia');
    Route::post('inventories/ckmedia', 'InventoryController@storeCKEditorImages')->name('inventories.storeCKEditorImages');
    Route::post('inventories/parse-csv-import', 'InventoryController@parseCsvImport')->name('inventories.parseCsvImport');
    Route::post('inventories/process-csv-import', 'InventoryController@processCsvImport')->name('inventories.processCsvImport');
    Route::resource('inventories', 'InventoryController');

    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
