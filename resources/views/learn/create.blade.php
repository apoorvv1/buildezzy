@extends('learn.base')

@section('action-content')
<section class="content">
      <div class="box">
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new user</div>
                <div class="panel-body">
                    <!--form start-->
          <form class="form-horizontal" role="form" data-parsley-validate="" method="POST" action="{{ action('LearnController@storeadd') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="fname" class="col-md-4 control-label">First Name</label>
                        <div class="col-md-6">
                        <input id="fname" type="text" class="form-control" name="fname" data-parsley-length="[3, 20]"   value="{{ old('fname') }}" autofocus required>
                                @if($errors->has('fname'))<p>{{$errors->first('fname')}}</p>@endif
                        </div>
                        </div>
                         <div class="form-group">
                            <label for="lname" class="col-md-4 control-label">last Name</label>
                        <div class="col-md-6">
                        <input id="lname" type="text" data-parsley-length="[3, 20]"  class="form-control" name="lname" value="{{ old('lname') }}" autofocus required>
                         @if($errors->has('lname'))<p>{{$errors->first('lname')}}</p>@endif
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="cno" class="col-md-4 control-label">Contact No</label>
                        <div class="col-md-6">
                        <input id="cno" value="{{ old('cno') }}" type="text" class="form-control" name="cno"  data-parsley-length="[10, 10]" data-parsley-type="digits" autofocus required>
                         @if($errors->has('cno'))<p>{{$errors->first('cno')}}</p>@endif
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>
                        <div class="col-md-6">
                        <input id="email" type="email" class="form-control" required name="email" value="{{ old('email') }}">
                          @if($errors->has('email'))<p>{{$errors->first('email')}}</p>@endif
                         </div>
                        </div>
                        <div class="form-group">
                         <label for="address" class="col-md-4 control-label">Address</label>
                        <div class="col-md-6">
                         <input id="address" type="text" data-parsley-length="[3, 20]"  class="form-control" value="{{ old('address') }}" name="address"  required>
                         @if($errors->has('address'))<p>{{$errors->first('address')}}</p>@endif
                        </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            
                                <button type="submit" class="btn btn-primary validate">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                    <!--form end-->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>
@endsection

