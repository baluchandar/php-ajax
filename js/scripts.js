    $('body').on('click', function (e) {
    //did not click a popover toggle or popover
    if ($(e.target).data('toggle') !== 'popover'
        && $(e.target).parents('.popover.in').length === 0) { 
        $('[data-toggle="popover"]').popover('hide');
    }
});
        
        $(document).ready(function () {
             $("[data-toggle=popover]").popover({
    html: true, 
	content: function() {
          var i_val = $(this).attr('data-id');
          return $('#popover-content_'+i_val).html();
        }
});
             
        });

        $(function () {
            var minPrice = parseInt($('#min_price').val());
            var maxPrice = parseInt($('#max_price').val());
            $("#slider-range").slider({
                range: true,
                min: minPrice,
                max: maxPrice,
                values: [minPrice,maxPrice],
                slide: function (event, ui) {
                    $("#priceFrom").val(ui.values[ 0 ]);
                    $("#priceTo").val(ui.values[ 1 ]);
                    searchFilter();
                }
            });
            
            $("#priceFrom").val($("#slider-range").slider("values", 0));
            $("#priceTo").val($("#slider-range").slider("values", 1));
        });
        
        
   function searchFilter(page_num) {
    page_num = page_num?page_num:0;
    var filterColor=[];
    var filterBrand=[];
    var filterDesign=[];
    var filterSize = $('#filter-size').val();
    var priceFrom = $('#priceFrom').val();
    var priceTo = $('#priceTo').val();
     $("input[name='filter-color[]']:checked").each( function (){  filterColor.push(this.value); });
     $("input[name='filter-brand[]']:checked").each( function (){  filterBrand.push(this.value); });
     $("input[name='filter-design[]']:checked").each( function (){  filterDesign.push(this.value); });
     $("input[name='filter-size[]']:checked").each( function (){  filterSize.push(this.value); });
    
    var searchKey = $('#search-keyword').val();
    $.ajax({
        type: 'POST',
        url: 'get_ajax_data.php',
        data:'page='+page_num+'&searchKey='+searchKey+'&size='+filterSize+'&filter_brand='+filterBrand+'&filter_design='+filterDesign+'&filter_color='+filterColor+'&price_from='+priceFrom+'&price_to='+priceTo,
        beforeSend: function () {
            $('.loading_img').show();
        },
        success: function (html) {
            $('#display_products').html(html);
            $('.loading_img').fadeOut(1000);
             $("[data-toggle=popover]").popover({
                html: true, 
                content: function() {
                var i_val = $(this).attr('data-id');
                return $('#popover-content_'+i_val).html();
                } });
        }
    });
}

//produc form.php 
function add_new_option(){
         $.ajax({
        url: 'get_ajax_options.php',
        success: function (html) {
            $('.ajax_options').append(html);
        }
    });
    }
    
    function remove_option_row(e){
       $(e.target).closest('.response_row').remove();
    }