@extends(config("piplmodules.back-view-layout-location"))

@section("meta")

<title>Create Admin user</title>

@endsection

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="{{url('admin/dashboard')}}">Dashboard</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{url('admin/admin-users')}}">Manage Admin Users</a>
                <i class="fa fa-circle"></i>

            </li>
            <li>
                <a href="#">Create Admin User</a>

            </li>
        </ul>
        @if (session('create-role-status'))
        <div class="alert alert-success">
            {{ session('create-role-status') }}
            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
        </div>
        @endif

        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Create Admin User
                </div>

            </div>
            <div class="portlet-body form">
                <form role="form" class="form-horizontal"  method="post" >
                    <input type='hidden' name='user_type' id='user_type' value='1'>
                    {!! csrf_field() !!}
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">    
                                <div class="col-md-8">     
                                    <div class="form-group ">
                                        <label class="col-md-6 control-label ">First Name:<sup>*</sup></label>

                                        <div class="col-md-6">     
                                            <input name="first_name" type="text" class="form-control" id="first_name" value="{{old('first_name')}}">
                                            @if ($errors->has('first_name'))
                                            <span class="text-danger  help-block ">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="form-group ">
                                        <label class="col-md-6 control-label">Last Name:<sup>*</sup></label>
                                        <div class="col-md-6">         
                                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{old('last_name')}}">

                                            @if ($errors->has('last_name'))
                                            <span class="text-danger help-block">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="col-md-6 control-label">Email:<sup>*</sup></label>
                                        <div class="col-md-6">      
                                            <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                                            @if ($errors->has('email'))
                                            <span class="text-danger help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="col-md-6 control-label">Password:<sup>*</sup></label>
                                        <div class="col-md-6">    
                                            <input type="Password" class="form-control" id="password" name="password" value="{{old('password')}}">
                                            @if ($errors->has('password'))
                                            <span class="text-danger help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="col-md-6 control-label">Confirm Password:<sup>*</sup></label>
                                        <div class="col-md-6">    
                                            <input type="Password" class="form-control" id="password_confirmation" name="password_confirmation" value="{{old('password_confirmation')}}">
                                            @if ($errors->has('password_confirmation'))
                                            <span class="text-danger help-block">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Gender <sup style='color:red;'>*</sup> </label>
                                        <div class="col-md-6">    
                                            <select class="form-control" name="gender" id="gender">
                                                <option value=""  >--Select--</option>
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>

                                            </select>

                                            @if ($errors->has('gender'))
                                            <span class="text-danger help-block">
                                                <strong>{{ $errors->first('gender') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Mobile:</label>
                                        <div class="col-md-6">  
                                            <input type="text" class="form-control" id="user_mobile" name="user_mobile" value="{{old('user_mobile')}}">
                                            @if ($errors->has('user_mobile'))
                                            <span class="text-danger help-block">
                                                <strong>{{ $errors->first('user_mobile') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Role:<sup>*</sup></label>
                                        <div class="col-md-6">  
                                            <select class="form-control" name='role' id="role" >
                                                @foreach($roles as $role)

                                                @if($role->slug!='registered.user')
                                                <option value="{{$role->id}}" >{{$role->name}}</option>

                                                @endif

                                                @endforeach
                                            </select>



                                            @if ($errors->has('role'))
                                            <span class="text-danger help-block">
                                                <strong>{{ $errors->first('role') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">   
                                            <button type="submit" id="submit" class="btn btn-primary  pull-right">Create User</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection