 <form class="form-horizontal" role="form" name='frm-update' id='frm-update' data-parsley-validate="" method="POST" action="/updateByAjax">
                        {{ csrf_field() }}
                        <div class='alert alert-danger info' style="display: none;">
                <ul></ul>
              </div>
                        <div class="form-group">
                            <label for="id" class="col-md-4 control-label">ID</label>
                        <div class="col-md-6">
                        <input id="id" type="text" class="form-control" name="id"    disabled>
                                @if($errors->has('fname'))<p>{{$errors->first('fname')}}</p>@endif
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="fname" class="col-md-4 control-label">First Name</label>
                        <div class="col-md-6">
                        <input id="fname" type="text" class="form-control" name="fname" data-parsley-length="[3, 20]"   autofocus required>
                                @if($errors->has('fname'))<p>{{$errors->first('fname')}}</p>@endif
                        </div>
                        </div>
                         <div class="form-group">
                            <label for="lname" class="col-md-4 control-label">last Name</label>
                        <div class="col-md-6">
                        <input id="lname" type="text" data-parsley-length="[3, 20]"  class="form-control" name="lname"  autofocus required>
                         @if($errors->has('lname'))<p>{{$errors->first('lname')}}</p>@endif
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="cno" class="col-md-4 control-label">Contact No</label>
                        <div class="col-md-6">
                        <input id="cno"  type="text" class="form-control" name="cno"  data-parsley-length="[10, 10]" data-parsley-type="digits" autofocus required>
                         @if($errors->has('cno'))<p>{{$errors->first('cno')}}</p>@endif
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>
                        <div class="col-md-6">
                        <input id="email" type="email" class="form-control" required name="email" >
                          @if($errors->has('email'))<p>{{$errors->first('email')}}</p>@endif
                         </div>
                        </div>
                        

                        <div class="form-group">
                         <label for="address" class="col-md-4 control-label">Address</label>
                        <div class="col-md-6">
                         <input id="address" type="text" data-parsley-length="[3, 250]"  class="form-control"  name="address"  required>
                         @if($errors->has('address'))<p>{{$errors->first('address')}}</p>@endif
                        </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                             
                                <button type="submit" class="btn btn-primary validate">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>