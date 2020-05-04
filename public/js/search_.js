$(document).ready(function(){
    $("#searchBox").click(function(){
        var keyWord=$("#key").val();
        if($("#key").val()==""){}
        else{
            $("#key").val("");
            $.post("search.php",{name:keyWord},function(information){
                $("#main_left").html(information);
                return false;
            })
        }              
    })
})