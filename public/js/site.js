function loadItems(element, path, selectInputClass) {
  var selectedVal = $(element).val();

  // select all
  if (selectedVal == -1) {
    return;
  }

  $.ajax({
  type: 'GET',
  url: path + selectedVal,
  success: function (datas) {
    if (!datas || datas.length === 0) {
       return;
    }

    for (var  i = 0; i < datas.length; i++) {
      $(selectInputClass).append($('<option>', {
        value: datas[i].id,
        text: datas[i].name
    }));
    }
  },
  error: function (ex) {
  }
  });
}

function loadStates(element) {
  $('.js-states').empty().append('<option value="-1">Please select your state</option>');
  $('.js-cities').empty().append('<option value="-1">Please select your city</option>');
  loadItems(element, '../api/states/', '.js-states');
}

function loadCities(element) {
  $('.js-cities').empty().append('<option value="-1">Please select your city</option>');;
  loadItems(element, '../api/cities/', '.js-cities');
}

function registerEvents() {
  $('.js-country').change(function() {
    loadStates(this);
  });

  $('.js-states').change(function() {
    loadCities(this);
  });
}

function onViewTrackDetail(val){
  $( "#task_" ).parent('.form-line').addClass("focused");
  $( "#update_" ).parent('.form-line').addClass("focused");
  $( "#track_" ).parent('.form-line').addClass("focused");

  task_.value   = $('#member_log_table > #detail_content > #' + val + ' > td:nth-of-type(1)').text(); 
  update_.value = $('#member_log_table > #detail_content > #' + val + ' > td:nth-of-type(2)').text(); 
  track_.value  = $('#member_log_table > #detail_content > #' + val + ' > td:nth-of-type(3)').text(); 
  
	return false; 
} 
 
$("document").on('click', '.save_track_detail', function (e) {  
  
	var task_     = $("#task_").val();
	var update_   = $("#update_").val();
	var track_    = $("#track_").val();  
  var memberid_ = member_id.value;    
    
	$('#defaultModal').modal('hide');  

	var $tableBody = $('#detail_content');
	var htmlString = " <tr id='"+ detail_id +"'><td>"+ task_ +"</td><td>"+update_+"</td><td>"+track_+"</td><td></td><td><button  class='btn btn-danger waves-effect delete-btn-mem'>Delete</button></td></tr> ";
	$tableBody.append(htmlString); 

	wholeResult($('#member_log_table > #detail_content > tr').length);

	return false; 

});    



$(document).on('click', '.delete-btn-mem', function (e) { 
  var $el   = $(e.currentTarget); 
  var $row  = $el.closest('tr'); 
  var count = $('#member_log_table > #detail_content > tr').length;  
  $row.remove();    
  var detail_id = e.currentTarget.closest('tr').getAttribute("id"); 
  $.ajax({
      url     : '/member-log/log_detail_delete' ,
      method  : 'post',
      data    :  {   'id' : detail_id   }, 
      success : function(response){ 
          if(response == 'yes'){  }
          else alert("Error!!"); 
      }
  });  
  wholeResult(count); 
  return false; 
});  

function wholeResult(val){ 
  task.value        = '';
  summary.value     = '';
  track_hour.value  = '';	
 
  $( "#task" ).parent('.form-line').addClass("focused");
  $( "#summary" ).parent('.form-line').addClass("focused");
  $( "#track_hour" ).parent('.form-line').addClass("focused");

  for(var i=1; i<=val;i++){ 
    task.value        += $('#member_log_table > #detail_content > tr:nth-of-type('+i+') > td:nth-of-type(1)').text() + ' ';
    summary.value     += $('#member_log_table > #detail_content > tr:nth-of-type('+i+') > td:nth-of-type(2)').text() + ' ';
    track_hour.value  = track_hour.value*1 + $('#member_log_table > #detail_content > tr:nth-of-type('+i+') > td:nth-of-type(3)').text()*1; 
  }  
}

function showConfirmMessage() {
  swal({
      title: "Are you sure?",
      text: "You will not be able to recover this!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes, delete it!",
      closeOnConfirm: false
  }, function () {  
      $("#mem_index_delete").submit(); 
      
  });
}
 

/**
 * 
 * when img clicks , display modal 
 */ 

// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
 
var modalImg    = document.getElementById("modalImg");
var captionText = document.getElementById("caption"); 

$(".img-thumbnail-small-width").click(function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
});

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
if(typeof span !== 'undefined'){
    span.onclick = function() {
        modal.style.display = "none";
    }
}


function init() {
  registerEvents();
} 

init();

$('select.forum_project').on('change', function() {

});

$(document).ready(function () {
    $('body .user_1_list').hide();
    $('body .user_1_list.ws_'+$('select.workspace_1').val()).show();
    $('body select[name="user_id_1"]').val($('body .user_1_list.ws_'+$('select.workspace_1').val()).first().val());
    $('body select[name="user_id_1"]').selectpicker('render');


    $('body').on('change', 'select.workspace_1', function () {
        $('body .user_1_list').hide();
        $('body .user_1_list.ws_'+$(this).val()).show();
        $('body select[name="user_id_1"]').val($('body .user_1_list.ws_'+$(this).val()).first().val());
        $('body select[name="user_id_1"]').selectpicker('render');

    });

    $('body .user_2_list').hide();
    $('body .user_2_list.ws_'+$('select.workspace_2').val()).show();
    $('body select[name="user_id_2"]').val($('body .user_2_list.ws_'+$('select.workspace_2').val()).first().val());
    $('body select[name="user_id_2"]').selectpicker('render');


    $('body').on('change', 'select.workspace_2', function () {
        $('body .user_2_list').hide();
        $('body .user_2_list.ws_'+$(this).val()).show();
        $('body select[name="user_id_2"]').val($('body .user_2_list.ws_'+$(this).val()).first().val());
        $('body select[name="user_id_2"]').selectpicker('render');

    });
});
