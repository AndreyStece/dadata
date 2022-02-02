window.onload = function() {
  onsole.log('The page has fully loaded');
};

function find_geo_ip() {
  var data = $('#geo_ip').serialize();
  $.ajax({
   type: 'POST',
   url: 'dadata.php',
   data: data,
   success: function(result) {
    document.getElementsByClassName('print-success')[0].style= "display: none";
    document.getElementsByClassName('print-error')[0].style= "display: none";
    if (result == "Ошибка: Неверный формат IP") {
      document.getElementsByClassName('print-error')[0].style= "display: block";
    }
    else {
      answer = document.getElementById("result");
      answer.textContent="";
      txt = document.createTextNode(result);
      answer.appendChild(txt);
      document.getElementsByClassName('print-success')[0].style= "display: block";
    }
   },
   error: function(xhr, str) {
    alert('Возникла ошибка: ' + xhr.responseCode);
   }
  });
}

function find_auto_hint() {
  var data = $('#auto_hint').serialize();
  $.ajax({
   type: 'POST',
   url: 'dadata.php',
   data: data,
   success: function(result) {
    var list = document.getElementById("address_list");
    list.innerHTML = "";
    var array = jQuery.parseJSON(result);
    var options = '';
    for(i in array) {
      options += '<option value="' + array[i] + '" />';
      // var option = document.createElement('option');
      // option.value = array[i];
      // list.appendChild(option);
    }
    list.innerHTML = options;
   },
   error: function(xhr, str) {
    alert('Возникла ошибка: ' + xhr.responseCode);
   }
  });
}
