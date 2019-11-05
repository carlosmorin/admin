
const ROUTER = URL + "CONTROLLERS/AJAX_CONTROLLERS/router.php";  

function get_user(obj) {
	event.preventDefault();
	var id = $(obj).attr('href'); 
    var url = ROUTER+"?action=get_user&id="+id;

	$.get(url, function(data, status){
        alert("exito");
        console.log(data);
	});
	

}