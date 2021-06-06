$("#tbl-staffs").DataTable();
$(document).on("click", ".btn-allot-modal", function(){
    var staff_id = $(this).attr("data-id");
    $("#staff_id").val(staff_id);
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
});