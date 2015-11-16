 $(function(){
  $.ajax({
    url:"common/getUserInfo.php",
    dataType:"json",
    async:false,
    success:function(data){
            // console.log(data.userid);
            var data = data.userid; 
            //console.log(data.userid);
            if(data==undefined || data=="" || data==null|| data=="-1" )
            {
              location.href="login.html";
            }
          }
        }) 
/*书签类别*/ 
   $.ajax({
    url:"common/gettype.php",
    dataType:"json",
    success:function(data){
         //console.log(data);
         $("#side-menu").html("");
         $("#qianfen").html("");
         $("#qianfen").append(" <option value='0'>=未分类=</option>");
         for (var i = data.length - 1; i >= 0; i--) {
          var  item = data[i];
          if(i == 0){
            getbiaoqianByType(item.id);
          }
          var temp = '<li><a href="javascript:testClick('+item.id+')"><i class="fa fa-tags"></i><span class="nav-label">'+item.name+"</span></a></li>";

          var temp2 = "<option value="+item.id+">"+item.name+"</option>";
            // var  item = data[i];
            // temp = item.id + item.title;
            $("#side-menu").append(temp);
            $("#qianfen").append(temp2);
          };
        }
    });

})

  function testClick (typeId) {
     getbiaoqianByType(typeId);
   }
   function getbiaoqianByType (typeId) {
     /*书签内容*/
    $.ajax({
    url:"common/getbiaoqian.php?typeId="+typeId,
    dataType:"json",
    success:function(data){
             //console.log(data);
             $("#allDataPanel").html("");
             if(data.length<1){
               $("#allDataPanel").html("<h1>暂时没有数据</h1>");
             }
             for (var i = data.length - 1; i >= 0; i--) {
              var  item = data[i];
              var temp =  '<tr class="read">'+
              '<td class="check-mail">'+
              // '<input type="checkbox" class="i-checks"></td>'+
              '<td class="mail-ontact">'+item.id+'</td>'+
              '<td class="mail-subject">'+item.title+'</td>'+
              '<td class=""><a href="'+item.contents+'" target="_blank">'+item.contents+'</a></td>'+
              '<td class="text-right mail-date">'+item.time+'</td>'+
              '<td class="text-right mail-date"><a href="javascript:deleteBookmark('+item.id+','+typeId+')" >删除</a></td></tr>';
                // var  item = data[i];
                // temp = item.id + item.title;
                $("#allDataPanel").append(temp);
              };
            }
      })
   }
   /*删除*/
   function deleteBookmark (bookmarkId,typeId) {
     $.ajax({
      url:"common/delete.php?bookmarkId="+bookmarkId,
      dataType:"json",
      success:function(data){
               //console.log("log from delete ***" +data);
               if(data.success){
                  getbiaoqianByType(typeId);
               }
             }
             
     })
   }

/*安全退出*/
 $(function(){ 
  $("#exit").click(function(e){
    $.ajax({
      url:"common/destroySession.php",
      type:"post",
      success:function(msg){

        location.href = "login.html";
        
      }
    })
  });


  $.ajax({
    url:"common/getUserInfo.php",
    dataType:"json",
    success:function(data){
      $("#login").text("欢迎您，"+data.username);
    }
  });
});

 /*添加书签分类*/
    $(function(){//文档加载结束
      $("#insert0").click(function(){
        if($("#name").val()=="")
        {
          swal("", "请确认信息的完整!", "error");
        //alert("请确认信息的完整");
        return;
      }  
      $.ajax({
        url:"common/inserttype.php",
        type:"post",
        data:{
          name:$("#name").val().trim()
        },
        success:function(msg){
            //console.log(msg);
            if(msg=="0"){
              //alert("");
              swal("", "添加失败！", "error");
            }
            if(msg=="1"){

              swal("", "添加成功！", "success");
              location.href="index.html";

            }
            if(msg=="-1"){

              swal("", "分类已经存在！", "error");
            }
          },
        })
    });    
    });


  /*添加书签内容*/
    $(function(){//文档加载结束
      $("#insert").click(function(){
        if($("#title").val()==""||$("#contents").val()==""||$("#qianfen").val()=="0")
        {
          swal("", "请确认信息的完整!", "error");
        //alert("请确认信息的完整");
        return;
      }
      
      $.ajax({
        url:"common/insert.php",
        type:"post",
        data:{
          title:$("#title").val().trim(),
          qianfen:$("#qianfen").val().trim(),
          contents:$("#contents").val().trim()
        },
        success:function(msg){
            //console.log(msg);
            if(msg=="0"){
              //alert("");
              swal("", "添加失败！", "error");
            }
            if(msg=="1"){

              swal("", "添加成功！", "success");
              location.href="index.html";

            }
            if(msg=="-1"){

              swal("", "书签已经存在！", "error");
            }
          },
        })
    });    
});
