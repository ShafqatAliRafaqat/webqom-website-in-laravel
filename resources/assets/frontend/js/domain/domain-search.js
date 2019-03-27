$(document).ready(function(){

   $('.input_submit').click(function(e){
      e.preventDefault();
      $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
         }
     });
      $.ajax({
         url: $("input[name=ajax_domain_search_route]").val(),
         method: 'GET',
         data: {
            search_domain: $("input[name=search_domain]").val()
         },
         success: function(result){
             console.log(2);
            $('.search_results').html(result.content);
            $("input[name=search_domain]").val(result.filteredDomain)
         }});
      });

});

$(document).bind('ajaxStart', function(){
    console.log(1);
    $('.loader').show();
}).bind('ajaxStop', function(){
    $('.loader').hide();
});
