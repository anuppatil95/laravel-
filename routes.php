<?php

Route::group(array('module'=>'Admin', 'namespace' => 'App\PiplModules\admin\Controllers','middleware'=>'web','as'=>'admin::'), function() {
    //Your routes belong to this module.
	// Admin Login Profile and logout
    

	Route::get("/admin/login","AdminController@showLogin");
	Route::get("/admin","AdminController@showLogin");
        Route::get("/admin/password/reset","AdminController@showPasswordReset");
        Route::get("/admin/password/reset/{id}","AdminController@showPasswordResetPost");

	Route::get("/admin/dashboard","AdminController@showDashboard")->middleware('level:1');
        Route::get("/admin/profile","AdminController@adminProfile")->middleware('level:1');
        Route::post("/admin/update-profile-post","AdminController@updateProfile");
        Route::post("/admin/update-admin-email","AdminController@updateEmailInfo");
        Route::get('admin/verify-user-email/{id}', ['uses' => 'AdminController@verifyUserEmail']);
        Route::post('admin/change-password-post', ['uses' => 'AdminController@updatePasswordInfo']);
        Route::get('admin/logout', ['uses' => 'AdminController@logout']);
        Route::post("/admin/change_status", "AdminController@changeUserStatus");
	Route::get("/admin/update-user/{user_id}","AdminController@editUser")->middleware('permission:update.registered-users');
	Route::post("/admin/update-user/{user_id}","AdminController@editUser")->middleware('permission:update.registered-users');
	
	Route::post("/admin/update-user-password/{user_id}","AdminController@editUserPassword")->middleware('permission:update.registered-users');
	Route::post("/admin/update-user-status/{user_id}","AdminController@editUserStatus")->middleware('permission:update.registered-users');
	//-------------- Admin Login Profile and logout end
        
        //Manage roles
	Route::get("/admin/manage-roles","AdminController@listRoles")->middleware('permission:view.roles');
	Route::get("/admin/manage-roles-data","AdminController@listRolesData")->middleware('permission:view.roles');
	Route::get("/admin/update-role/{role_id}","AdminController@updateRole")->middleware('permission:update.roles');
	Route::post("/admin/update-role/{role_id}","AdminController@updateRole")->middleware('permission:update.roles');
	Route::get("/admin/roles/create","AdminController@createRole")->middleware('permission:create.roles');
	Route::post("/admin/roles/create","AdminController@createRole")->middleware('permission:create.roles');
	Route::get("/admin/roles/permissions/{role_id}","AdminController@updateRolePermissions")->middleware('permission:update.roles');
	Route::post("/admin/roles/permissions/{role_id}","AdminController@updateRolePermissions")->middleware('permission:update.roles');
	
	Route::delete("/admin/delete-role/{role_id}","AdminController@deleteRole")->middleware('permission:delete.roles');
	Route::delete("/admin/delete-role-select-all/{role_id}","AdminController@deleteRoleFromSelectAll")->middleware('permission:delete.roles');
	
        //Manage roles ends here
        
        
        //Manage Global Settings
	Route::get("/admin/global-settings","AdminController@listGlobalSettings")->middleware('permission:view.global-settings');
	Route::get("/admin/global-settings-data","AdminController@listGlobalSettingsData")->middleware('permission:view.global-settings');
	
	Route::get("/admin/update-global-setting/{setting_id}","AdminController@updateGlobalSetting")->middleware('permission:update.global-settings');
	Route::post("/admin/update-global-setting/{setting_id}","AdminController@updateGlobalSetting")->middleware('permission:update.global-settings');
	//Manage Global Settings end
        
        //Manage admin and registered users users
        Route::get("/admin/manage-users","AdminController@listRegisteredUsers")->middleware('permission:view.registered-users');
        Route::get("/admin/list-registered-users-data","AdminController@listRegisteredUsersData")->middleware('permission:view.registered-users');
	Route::delete("/admin/delete-user/{user_id}","AdminController@deleteRegisteredUser")->middleware('permission:delete.registered-users');
	Route::delete("/admin/delete-selected-user/{user_id}","AdminController@deleteSelectedRegisteredUser")->middleware('permission:delete.registered-users');
	Route::get("/admin/update-registered-user/{user_id}","AdminController@updateRegisteredUser")->middleware('permission:update.registered-users');
	Route::post("/admin/update-registered-user/{user_id}","AdminController@updateRegisteredUser")->middleware('permission:update.registered-users');
	Route::post("/admin/update-registered-user-email/{user_id}","AdminController@updateRegisteredUserEmailInfo")->middleware('permission:update.registered-users');
	Route::post("/admin/update-registered-user-password/{user_id}","AdminController@updateRegisteredUserPasswordInfo")->middleware('permission:update.registered-users');
	Route::get("/admin/create-registered-user","AdminController@createRegisteredUser")->middleware('permission:update.registered-users');
	Route::post("/admin/create-registered-user","AdminController@createRegisteredUser")->middleware('permission:update.registered-users');
	
        
      
	Route::get("/admin/admin-users","AdminController@listAdminUsers")->middleware('permission:view.admin-users');
	Route::get("/admin/admin-users-data","AdminController@listAdminUsersData")->middleware('permission:view.admin-users');
	Route::get("/admin/update-admin-user/{user_id}","AdminController@updateAdminUser")->middleware('permission:update.admin-users');
	Route::post("/admin/update-admin-user/{user_id}","AdminController@updateAdminUser")->middleware('permission:update.admin-users');
	Route::post("/admin/update-admin-user-email/{user_id}","AdminController@updateAdminUserEmailInfo")->middleware('permission:update.admin-users');
	Route::post("/admin/update-admin-user-password/{user_id}","AdminController@updateAdminUserPasswordInfo")->middleware('permission:update.admin-users');
	Route::get("/admin/create-user/{is_admin?}","AdminController@createUser")->middleware('permission:create.admin-users');
	Route::post("/admin/create-user/{is_admin?}","AdminController@createUser")->middleware('permission:create.admin-users');
	Route::delete("/admin/delete-admin-user/{user_id}","AdminController@deletAdminUser")->middleware('permission:delete.admin-users');
	Route::delete("/admin/delete-admin-selected-user/{user_id}","AdminController@deletSelectedAdminUser")->middleware('permission:delete.admin-users');
	//Manage admin users end
        
	
        //Manage counries
	Route::get("/admin/countries/list","AdminController@listCountries")->middleware('permission:view.manage-countries');
	Route::get("/admin/countries-data/list","AdminController@listCountriesData")->middleware('permission:view.manage-countries');
	Route::get("/admin/countries/update-language/{country_id}/{locale}","AdminController@updateCountryLanguage")->middleware('permission:update.countries');
	Route::post("/admin/countries/update-language/{country_id}/{locale}","AdminController@updateCountryLanguage")->middleware('permission:update.countries');
	
	Route::get("/admin/countries/update/{country_id}","AdminController@updateCountry")->middleware('permission:update.countries');
	Route::post("/admin/countries/update/{country_id}","AdminController@updateCountry")->middleware('permission:update.countries');
	
	Route::get("/admin/countries/create","AdminController@createCountry")->middleware('permission:create.countries');
	Route::post("/admin/countries/create","AdminController@createCountry")->middleware('permission:create.countries');

        Route::delete("/admin/countries/delete/{country_id}","AdminController@deleteCountry")->middleware('permission:delete.countries');
	Route::delete("/admin/countries/delete-selected/{country_id}","AdminController@deleteCountrySelected")->middleware('permission:delete.countries');
	//Manage counries end
        
	//Manage states
	Route::get("/admin/states/list","AdminController@listStates")->middleware('permission:view.manage-states');
	Route::get("/admin/states-data/list","AdminController@listStatesData")->middleware('permission:view.manage-states');
	Route::get("/admin/states/update-language/{state_id}/{locale}","AdminController@updateStateLanguage")->middleware('permission:update.states');
	Route::post("/admin/states/update-language/{state_id}/{locale}","AdminController@updateStateLanguage")->middleware('permission:update.states');
	Route::get("/admin/states/getAllStates/{country_id}","AdminController@getAllStatesByCountry")->middleware('permission:view.manage-cities');
	
	Route::get("/admin/states/update/{state_id}","AdminController@updateState")->middleware('permission:update.states');
	Route::post("/admin/states/update/{state_id}","AdminController@updateState")->middleware('permission:update.states');
	
	Route::get("/admin/states/create","AdminController@createState")->middleware('permission:create.states');
	Route::post("/admin/states/create","AdminController@createState")->middleware('permission:create.states');
	
	Route::delete("/admin/states/delete/{state_id}","AdminController@deleteState")->middleware('permission:delete.states');
	Route::delete("/admin/states/delete-selected/{state_id}","AdminController@deleteStateSelected")->middleware('permission:delete.states');
	//Manage states end
        
	//Manage cities
	Route::get("/admin/cities","AdminController@listCities")->middleware('permission:view.manage-cities');
	Route::get("/admin/cities/list","AdminController@listCities")->middleware('permission:view.manage-cities');
	Route::get("/admin/cities-data/list","AdminController@listCitiesData")->middleware('permission:view.manage-cities');
	Route::get("/admin/cities/update-language/{city_id}/{locale}","AdminController@updateCityLanguage")->middleware('permission:update.cities');
	Route::post("/admin/cities/update-language/{city_id}/{locale}","AdminController@updateCityLanguage")->middleware('permission:update.cities');
	
	Route::get("/admin/cities/update/{city_id}","AdminController@updateCity")->middleware('permission:update.cities');
	Route::post("/admin/cities/update/{city_id}","AdminController@updateCity")->middleware('permission:update.cities');
	
	Route::get("/admin/cities/create","AdminController@createCity")->middleware('permission:create.cities');
	Route::post("/admin/cities/create","AdminController@createCity")->middleware('permission:create.cities');
	
	Route::delete("/admin/cities/delete/{city_id}","AdminController@deleteCity")->middleware('permission:delete.cities');
	Route::delete("/admin/cities/delete-selected/{city_id}","AdminController@deleteCitySelected")->middleware('permission:delete.cities');
	//Manage cities end here	
});
