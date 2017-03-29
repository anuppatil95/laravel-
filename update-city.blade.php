@extends(config("piplmodules.back-view-layout-location"))

@section("meta")

<title>Update City</title>

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
					<a href="{{url('admin/cities')}}">Manage Cities</a>
                                        <i class="fa fa-circle"></i>
					
				</li>
				<li>
					<a href="javascript:void(0);">Update City</a>
					
				</li>
                        </ul>
      <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box blue">
             <div class="portlet-title">
                        <div class="caption">
                                <i class="fa fa-gift"></i> Update city
                        </div>

             </div>
             <div class="portlet-body form">
  	  <form class="form-horizontal" role="form" action="" method="post" >
            
                 {!! csrf_field() !!}
                 <div class="form-body">
                   <div class="row">
                        <div class="col-md-12">    
                        <div class="col-md-8">  
                         <div class="form-group">
                          <label class="col-md-6 control-label">Name<sup>*</sup></label>
                            <div class="col-md-6">     
                            <input name="name" type="text" class="form-control" id="name" value="{{old('name',$city_info->name)}}">
                            @if ($errors->has('name'))
                              <span class="help-block">
                                  <strong class="text-danger">{{ $errors->first('name') }}</strong>
                              </span>
                              @endif
                          </div>
                       
                      </div>
                        <div class="form-group">
                          <label class="col-md-6 control-label">Choose Country<sup>*</sup></label>
                       
                            <div class="col-md-6">     
                                <select name="country" id="country" onchange="getAllStates(this.value)" class="form-control">
                                    <option value="" selected="">--Select--</option>
                            @foreach($countries as $country)
                                <option value="{{$country->id}}" @if($country->id==$city->country_id) selected @endif>{{$country->name}}</option>
                            @endforeach
                            </select>
                            @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('country') }}</strong>
                                    </span>
                            @endif
                          </div>
                       
                      </div>
<!--                          <div class="form-group">
                          <label class="col-md-6 control-label">Choose State<sup>*</sup></label>
                       
                            <div class="col-md-6">     
                            <select name="state" id="state" class="form-control">
                               <option value="">--Select--</option>
                                @foreach($states as $state)
                                <option value="{{$state->id}}" @if($state->id==$city->state_id) selected @endif>{{$state->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('state') }}</strong>
                                    </span>
                            @endif
                          </div>
                       
                      </div>-->
                            <div class="form-group">
                         <div class="col-md-12">   
                            <button type="submit" id="submit" class="btn btn-primary  pull-right">Update</button>
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
        <style>
            .submit-btn{
                padding: 10px 0px 0px 18px;
            }
        </style>
        <script>
            
        function getAllStates(country_id)
        {
            if(country_id!='' && country_id!=0)
            {
                $.ajax({
                   url:"{{url('/admin/states/getAllStates')}}/"+country_id,
                   method:'get',
                   success:function(data)
                   {

                        $("#state").html(data);

                   }

                });
            }
        }
 </script>
        
 @endsection
  