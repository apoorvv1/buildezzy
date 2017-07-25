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
          <form class="form-horizontal" role="form" id='frm-insert' data-parsley-validate="" method="POST" action="/postjquery">
                        {{ csrf_field() }}

              <div class='alert alert-danger info' style="display: none;">
                <button type="button" class="close" data-dismiss="alert">x</button><ul></ul> 
              </div>
              <div class='alert alert-success success' style="display: none;">
                <button type="button" class="close" data-dismiss="alert">x</button><ul></ul>
              </div>
                        <div class="form-group">
                            <label for="fname" class="col-md-4 control-label">First Name</label>
                        <div class="col-md-6">
                        <input id="fname" type="text" class="form-control" name="fname" data-parsley-length="[3, 20]"  value="{{ old('fname') }}" autofocus required>
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
                         <input id="address" type="text" data-parsley-length="[3, 250]"  class="form-control" value="{{ old('address') }}" name="address"  required>
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
                @include('jquery.update')


               
            </div>
        </div>
    </div>
</div>
                 <div class='table-responsive'><table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>last name</th>
                <th>CNO</th>
                <th>Email</th>
                <th>Address</th>
                <th>Action</th>
                
            </tr>
        </thead>
    </table>
  
</div>

</div>
</section>
  <script type="text/javascript">

//----------------------For ADD--------------------------------------------------//


                   $(document).ready(function(){
                    var info = $('.info');
                    $.ajaxSetup({
                   headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    });
                   });

                   $('#frm-insert').on('submit',function(e){
                    e.preventDefault();
                    var url = $(this).attr('action');
                    var post =$(this).attr('method');
                    var data =$(this).serialize();
                 var info = $('.info');
                 var success = $('.success');
                    
                 $.ajax({
                  type : 'post',
                  url : url,
                  data : data,
                  dataType:'json',
                  success:function(data){
                    info.hide().find('ul').empty();
                    if(!data.success){
                      $.each(data.errors,function(jquery,error){
                        info.find('ul').append('<li>' + error + '</li>');
                      });
                      info.slideDown();
                      }else{
                        success.find('ul').append('<li>Record Added Successfully</li>');
                      
                      success.slideDown();
                      // console.log(data);           

                        $('#frm-insert')[0].reset();
                  readByAjax();       
                    }
                  
                  }
                 
                   });

               });
//----------------------For delete--------------------------------------------------//
                   
                   $(document).on('click','.btn-dell',function(e){

    if (confirm('Are you sure you want to Delete ?')==true) {
                    var id=$(this).val();
                     $.ajax({
                      type : 'post',
                      url : '{{url('deleteByAjax')}}',
                      data : {id:id},
                      dataType:'json',
                      success:function(data){
                        $('tbody tr#id'+id).remove();
                      
                      }
                    });
                   
                   
                   alert("This Record was successfully Deleted.");
                }else{
  
                    }
                    });
  
                    
//---------------------------------------For edit--------------------------------------------//
                   $(document).on('click','.btn-edit',function(e){
                    
                    var id = $(this).val();

                     alert(id);
                    
                  });
                    
                    $(document).ready(function(){
                    
                    $.ajaxSetup({
                   headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    });
                   });
                   $('#frm-update').on('submit',function(e){
                    e.preventDefault();
                    var url = $(this).attr('action');
                    var post =$(this).attr('method');
                    var data =$(this).serialize();
                     var info = $('.info');
                 var success = $('.success');
                    
                 $.ajax({
                  type : 'post',
                  url : url,
                  data : data,
                  dataType :'json',
                  
                  success:function(data){
                   info.hide().find('ul').empty();
                    if(!data.success){
                      $.each(data.errors,function(jquery,error){
                        info.find('ul').append('<li>' + error + '</li>');
                      });
                      info.slideDown();
                      }else{
                        success.find('ul').append('<li>Record Updated Successfully</li>');
                      
                      success.slideDown();
                      
                      
                   // console.log(data);           
                      $('#frm-update')[0].reset();
                        $('#popup-update').modal('hide');
                    
                   readByAjax();
                  }
                   console.log(data);
                }
                   });

               });

//------------------------------------------show Data table-------------------------------//
$(function readByAjax() {
  $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{url ('/readByAjax')}}',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'fname', name: 'fname'},
            {data: 'lname', name: 'lname'},
            {data: 'cno', name: 'cno'},
            {data: 'email', name: 'email'},
            {data: 'address', name: 'address'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
         ]
    });

});


                 
                 </script>
@endsection

