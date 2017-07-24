@extends('learn.base')
@section('action-content')
    <!-- Main content -->
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">List of Records</h3>
        </div>
        <div class="col-sm-4">
          <a class="btn btn-primary" href="/create">Add new user</a>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
     
          <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th width="20%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1"  aria-label="Email: activate to sort column ascending">First Name</th>
                <th width="10%" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"  aria-label="Name: activate to sort column descending" aria-sort="ascending">Contact NO.</th>
                <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1"  aria-label="Email: activate to sort column ascending">Email</th>
               
                <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($learns as $learn)
                <tr role="row" class="odd">
                  <td class="sorting_1">{{ $learn->fname }}</td>
                  <td>{{ $learn->cno }}</td>
                  <td class="hidden-xs">{{ $learn->email }}</td>
                  
                  <td>
                  <a href="{{ url ('edit', ['id' => $learn->id]) }}" class="btn btn-warning col-sm-3 col-xs-5 btn-margin">
                        Update
                        </a>
                       <form class="row" method="POST" action="{{ action('LearnController@mydelete')}}" onsubmit = "return confirm('Are you sure?') ">
                       
                        
                        {{ csrf_field() }} 
                       <input type="hidden" name="id" id="id" value="{{ $learn->id }}" />
                        
                         <button type="submit" class="btn btn-danger col-sm-3 col-xs-5 btn-margin">
                          Delete
                        </button>
                       
                    </form>
                    
                  </td>
              </tr>
            @endforeach
            </tbody>
            
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-5">
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($learns)}} of {{count($learns)}} entries</div>
        </div>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            
          </div>
        </div>
      </div>
    </div>
  </div>

     
   
  
  <!-- /.box-body -->

</div>
  
    </section>
    <!-- /.content -->
  
@endsection