<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::post('users/media', 'UsersApiController@storeMedia')->name('users.storeMedia');
    Route::apiResource('users', 'UsersApiController');

    // Hospital Mediscan
    Route::post('hospital-mediscans/media', 'HospitalMediscanApiController@storeMedia')->name('hospital-mediscans.storeMedia');
    Route::apiResource('hospital-mediscans', 'HospitalMediscanApiController');

    // Modality
    Route::post('modalities/media', 'ModalityApiController@storeMedia')->name('modalities.storeMedia');
    Route::apiResource('modalities', 'ModalityApiController');

    // Procedure Type
    Route::apiResource('procedure-types', 'ProcedureTypeApiController');

    // Procedure
    Route::apiResource('procedures', 'ProcedureApiController');

    // Hms
    Route::post('hms/media', 'HmsApiController@storeMedia')->name('hms.storeMedia');
    Route::apiResource('hms', 'HmsApiController');

    // Price Agreement Policy
    Route::apiResource('price-agreement-policies', 'PriceAgreementPolicyApiController');

    // Config Cr Machine
    Route::apiResource('config-cr-machines', 'ConfigCrMachineApiController');

    // Config Dr Machine
    Route::apiResource('config-dr-machines', 'ConfigDrMachineApiController');

    // Config Mammography Machine
    Route::apiResource('config-mammography-machines', 'ConfigMammographyMachineApiController');

    // Config Ct Machine
    Route::apiResource('config-ct-machines', 'ConfigCtMachineApiController');

    // Config Mri Machine
    Route::apiResource('config-mri-machines', 'ConfigMriMachineApiController');

    // Hospital Hr
    Route::post('hospital-hrs/media', 'HospitalHrApiController@storeMedia')->name('hospital-hrs.storeMedia');
    Route::apiResource('hospital-hrs', 'HospitalHrApiController');

    // Machine Status Profile
    Route::apiResource('machine-status-profiles', 'MachineStatusProfileApiController');

    // Hospital Mentor
    Route::post('hospital-mentors/media', 'HospitalMentorApiController@storeMedia')->name('hospital-mentors.storeMedia');
    Route::apiResource('hospital-mentors', 'HospitalMentorApiController');

    // Hospital Five C Network
    Route::post('hospital-five-c-networks/media', 'HospitalFiveCNetworkApiController@storeMedia')->name('hospital-five-c-networks.storeMedia');
    Route::apiResource('hospital-five-c-networks', 'HospitalFiveCNetworkApiController');

    // Radiologist Mediscan
    Route::post('radiologist-mediscans/media', 'RadiologistMediscanApiController@storeMedia')->name('radiologist-mediscans.storeMedia');
    Route::apiResource('radiologist-mediscans', 'RadiologistMediscanApiController');

    // Radiologist Mentor
    Route::post('radiologist-mentors/media', 'RadiologistMentorApiController@storeMedia')->name('radiologist-mentors.storeMedia');
    Route::apiResource('radiologist-mentors', 'RadiologistMentorApiController');

    // Radiologist Five C
    Route::post('radiologist-five-cs/media', 'RadiologistFiveCApiController@storeMedia')->name('radiologist-five-cs.storeMedia');
    Route::apiResource('radiologist-five-cs', 'RadiologistFiveCApiController');

    // Visited Hospital
    Route::post('visited-hospitals/media', 'VisitedHospitalApiController@storeMedia')->name('visited-hospitals.storeMedia');
    Route::apiResource('visited-hospitals', 'VisitedHospitalApiController');

    // Leave
    Route::post('leaves/media', 'LeaveApiController@storeMedia')->name('leaves.storeMedia');
    Route::apiResource('leaves', 'LeaveApiController');
});
