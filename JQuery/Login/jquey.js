$(document).ready(function(){
	$("#subBtn").click(function(){
        // alert("welcome");
        var name = $("#uname").val();
        var pass = $("#upass").val();

        var data = "uname=" + name + "&upass=" + pass;
	    $.ajax({
	    	method: "post",
	    	url: "qry.php",
	    	data: data,
	    	success: function(data)
	    	{
                $("#error").html(data);
	    	}
	    });

	}); 
});