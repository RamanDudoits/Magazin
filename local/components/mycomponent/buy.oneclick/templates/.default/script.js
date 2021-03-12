$(function(){
    $(".btn-one-click").click(function(){
        $(".one-click").show();
        $(this).hide();
    })

    $(".buy-one-click").click(function(){
        var path;
        if($(".buy-one-click").attr("data-params-object") === "basket")
        {
            path = "buyBasket";
        }else{
            path = "buyProduct";
        }
        var request = BX.ajax.runComponentAction('mycomponent:buy.oneclick', path, {
            mode:'class',
            data: {
                phone: $(".phone").val(),
                id_element: $(this).attr("data-id"),
            }
        });
        request.then(function (response) {
                if (response.status === "success" && response.data.error.length === 0)
                {
                    $(".status").html("Заказ оформлен!");
                    $(".one-click").hide();
                    $(".error").hide();
                    $(".btn-one-click").hide();
            } else
                {
                    $(".error").text("Заказ не оформлен! " + response.data.error).show();
                    $(".one-click").show();
                    $(".btn-one-click").hide();
                }
        });
    })
});