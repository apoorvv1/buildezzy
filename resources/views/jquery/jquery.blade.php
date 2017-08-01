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
              <div style="display: none;"><input type="text" name="id" id="id" /></div>
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
                         <label for="address" class="col-md-4 control-label">Select Role</label>
                        <div class="col-md-6">
                          <select class="form-control" name="role_id" id='role_id'>
                                    @foreach ($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                        </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            
                                <button type="submit" class="btn btn-primary validate">
                                    Save
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
                 <div class='table-responsive'>
 <div class="form-group">
            <label>Date range:</label>

            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right" id="reservation">

                <span class="input-group-btn">
                    <button class="btn btn-default" type="button" id="range"><i class="fa fa-search"></i></button>
                </span>
            </div>
          </div>
                  <form method=""  id='alldell' name='alldell'>
 {{ csrf_field() }}
                 <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Select</th>
                <th>ID</th>
                <th>Full Name</th>
                <th>fname</th>
                <th>lname</th>
                <th>CNO</th>
                <th>Email</th>
                <th>Address</th>
                <th>Role</th>
                
                <th>Created At</th>
                <th>Action</th>
             </tr>
        </thead>
    </table>
    <input type="button"  value='Delete Selected' class="btn btn-danger btn-sm btn-alldell" >
  </form>
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
                        success.find('ul').append('<li>Record Successfully Saved</li>');
                      
                      success.slideDown();
                      // console.log(data);           

                        $('#frm-insert')[0].reset();
                
                  window.userstable.draw();       
                    }
                  
                  }
                 
                   });

               });
//----------------------For select delete--------------------------------------------------//


         $(document).ready(function(){
                     
                    $.ajaxSetup({
                   headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    });
                    });
                   

                   //$('#frm-alldell').on('submit',function(e){
                   $(document).on('click','.btn-alldell',function(e){
                    //var data = $("#ids").val();
                    if (confirm('Are you sure you want to Delete Selected Records ?')==true) {
                    //$("[type=checkbox]:checked").each ( function() {
                    //console.log($(this).val());
                   // var data = $(this).attr('name');
                    //});
                    var form = document.alldell;

                  var data = $(form).serialize();

                    console.log(data);
                     $.ajax({
                  type : 'post',
                  url : '{{url('alldeleteByAjax')}}',
                  data :  data,
                  dataType:'json',
                  success:function(data){

                   // console.log(data)
                 }
               });
                   alert("Records was successfully Deleted.");
               window.userstable.draw();
                   //console.log(['data']);
                     //$("[type=checkbox]:checked").each ( function() {
                      //console.log($(this).val());
                      }else{
  
                    }
              
              });
//---------------------- select delete END----------------------------------------//     

//----------------------For delete--------------------------------------------------//
                   
                   $(document).on('click','.btn-dell',function(e){

    if (confirm('Are you sure you want to Delete ?')==true) {
                    var id=$(this).attr('rowid');
                    console.log(id);
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
               window.userstable.draw();
                }else{
  
                    }

                    });
  
                    
//---------------------------------------For edit--------------------------------------------//
                   $(document).on('click','.btn-edit',function(e){
                    
                    var id = $(this).attr('rowid');
                      //console.log(id);
                     $.ajax({
                      type : 'get',
                      url : '{{url('editByAjax')}}',
                      data :{id:id},
                      dataType: 'json',
                      success:function(data){
                        console.log(data);
                        var frmupdate = $('#frm-insert');
                        frmupdate.find('#id').val(data[0].id);
                        frmupdate.find('#fname').val(data[0].fname);
                        frmupdate.find('#lname').val(data[0].lname);
                        frmupdate.find('#cno').val(data[0].cno);
                        frmupdate.find('#email').val(data[0].email);
                        frmupdate.find('#address').val(data[0].address);
                        frmupdate.find('#role_id').val(data[0].role_id);
                        //$('#popup-update').modal('show');
                         
                      }
                    });
                    
                  });
                    
//---------------------------------------Endedit--------------------------------------------//                   
//------------------------------------------show Data table-------------------------------//


  $(document).ready(function(){
  window.userstable= $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        dom: 'Bfrtip',
        ajax: '{{url ('/readByAjax')}}',
        buttons: [
            'print'
        ],
        columns: [
            { "data": function(data){
       return '<input type="checkbox" id="id[]" name="id[]" value="'+ data.id +'" />';
    }, "orderable": false, "searchable":false, "name":"id" },
        
             {data: 'id', name: 'learns.id'},
             {data: 'mergeColumn', name: 'mergeColumn', searchable: false, sortable : false, visible:true},
            {data: 'fname', name: 'learns.fname' , searchable: true, sortable : true, visible:false},
            {data: 'lname', name: 'learns.lname' , searchable: true, sortable : true, visible:false},
           // {data: 'fname', name: 'fname'} , 
            //{data: 'lname', name: 'lname'},
            {data: 'cno', name: 'learns.cno'},
            {data: 'email', name: 'learns.email'},
            {data: 'address', name: 'learns.address'},
            {data: 'rolename', name: 'roles.name'},
            
            {data: 'created_at', name: 'learns.created_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
           
         ]
    });
window.userstable.draw();

});


    $(document).ready(function(){
        $('#reservation').daterangepicker();
        });

     $('#reservation').on('apply.daterangepicker', function(ev, picker) {
  //var data =$(this).serialize();
  //console.log(picker.startDate.format('YYYY-MM-DD'));
  //console.log(picker.endDate.format('YYYY-MM-DD'));
var stdate=picker.startDate.format('YYYY-MM-DD');
var edate=picker.endDate.format('YYYY-MM-DD');
 
 $.ajax({
                      type : 'post',
                      url : '{{url('readByAjax')}}',
                      data : {stdate:stdate,edate:edate},
                      dataType:'json',
                      success:function(data){
                       console.log(data);
                      
                      }
                    });

//console.log(stdate);
//console.log(edate);
    });
        

//------------------------------------------End Data table-------------------------------//

                 
                 </script>
@endsection

