// const { url } = require("inspector");
// const { get } = require("http");

$("#tbl-students").DataTable();
$(document).on("click", ".btn-allot-modal", function(){
    var student_id = $(this).attr("data-id");
    $("#student_id").val(student_id);
});
$(document).on("change", "#dd_college", function() {
    var college_id = $(this).val();
    var postdata = "college_id="+college_id;
    $.ajax({
        type: 'post',
        url: "/admin/allot-college",
        data:postdata,
        success:function(response){
            data = JSON.parse(response);
            if(data.status){
            
                var branchHtml = "<option value=\'\'>Choose College</option>";
                
                $.each(data.branches, function(index, item){
                    
                    branchHtml += "<option value='"+item.id+"'>"+item.name+"</option>";
                    
                });
                // if ($("#dd_branch").html().length > 0)
                // {
                //     $("#dd_branch").html("");
                // }
                $("#dd_branch").html(branchHtml);
            }
        },
        error: function(){
            alert('error');
        }

    });
    // $.get("/admin/allot-college", postdata, function(response){
     
    //     var data = JSON.parse(response);

    //     if(data.status){
            
    //         var branchHtml = "";
            
    //         $.each(data.branches, function(index, item){
                
    //             branchHtml += "<option value='"+item.id+"'>"+item.name+"</option>";
                
    //         });
            
    //         $("#dd_branch").append(branchHtml);
    //     }
    // }); 
});