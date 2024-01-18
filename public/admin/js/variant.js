$(document).ready(function(){
    $('#display-type').change(function(event) {
       $('#input-color').css('display',  event.target.value == 2 ?  'block' : 'none');
       if(event.target.value == 1){
        $('#input-value').val($('#input-name').val().toLowerCase());
       }
    });

    $('#input-color').change(function(event) {
        $('#input-value').val(event.target.value);
    })
})