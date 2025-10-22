VirtualSelect.init({
    ele: '.multiSelect',
    setValueAsArray: true,
    selectedValue: '',
});
$('#filtered').css("display", "none");
$('#View-All').css("display", "unset");

//Filter
$('#restaurant-select, #type-select, #catagory-select, #location-select, #rating-select, #minPrice, #maxPrice, #search-field, .radio').on('change', function () {
    res = $('#restaurant-select').val();
    type = $('#type-select').val();
    cat = $('#catagory-select').val();
    loc = $('#location-select').val();
    console.log(loc);
    rate = $('#rating-select').val();
    minP = $('#minPrice').val();
    maxP = $('#maxPrice').val();
    sort = $('.input-box').attr("id");
    searchVal = $('#search-field').val();

    if (maxP != '' && minP != '') {
        if (maxP - minP < 0) {
            temp = $('#minPrice').val(); //160
            $('#minPrice').val(maxP); //100
            $('#maxPrice').val(temp); //160
        };
    }
    minVal = $('#minPrice').val();
    maxVal = $('#maxPrice').val();

    if (res != '' || type != '' || cat != '' || loc != '' || rate != '' || minP != '' || maxP != '' || searchVal != '') {
        $('#filtered').css("display", "block");
        $('#View-All').css("display", "none");
        $('#filtered').load("filter-result.php", { restaurant: res, type: type, catagory: cat, location: loc, rating: rate, minPrice: minVal, maxPrice: maxVal, search: searchVal, sort: sort });
    }
    else {
        $('#filtered').css("display", "none");
        $('#View-All').css("display", "unset");
    }
});


// Search


