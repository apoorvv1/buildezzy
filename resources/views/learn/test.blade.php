            if($r->ajax())
            {
                $learn =new Learn();
                $learn['fname']=$req->fname;
                $learn['lname']=$req->lname;
                $learn['cno']=$req->cno;
                $learn['email']=$req->email;
                $learn['address']=$req->address;
                if($learn->save())
                {
                    return response(['msg'=>'inserted successfull']);
                }
        
}


  //----------------------------
                   //readByAjax();
                   //---------------------
                 function readByAjax(){
                  $.ajax({
                    type : 'get',
                    url : "{{url('readByAjax')}}",
                    dataType : 'html',
                    success:function(data){
                      $('.table-responsive').html(data);
                    }
                  })
                 }