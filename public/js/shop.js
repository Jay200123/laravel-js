$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "/api/items/all",
        dataType: 'json',
        success: function (data) {
            console.log(data);
            $.each(data, function (key, value) {
                // console.log(key);
                id = value.item_id;
                var item = "<div class='items'><div class='itemDetails'><div class='itemImage'><img src="+"/storage/" + value.imagePath + " width='200px', height='200px'/></div><div class='itemText'><p class='price-container'>Price: Php <span class='price'>" + value.sell_price + "</span></p><p>" + value.description + "</p></div><input type='number' class='qty' name='quantity' min='1' max='5'><p class='itemId'>" + value.item_id + "</p>      </div><button type='button' class='btn btn-primary add' >Add to cart</button></div>";
                $("#items").append(item);

            });

        },
        error: function () {
            console.log('AJAX load did not work');
            alert("error");
        }
    });

    
})