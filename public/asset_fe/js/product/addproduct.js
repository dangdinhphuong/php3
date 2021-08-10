function addproduct(route,id,token,count=1) {
 
    $.ajax({
        url: route,
        type: "POST",
        data: {
            id: id,
            count: count,
            _token: token,

        },
        success: function (response) {
            let id = response.id;
            console.log(response);
            // $('#message_error').remove();
            if (response["success"]) {
                console.log(response["success"]);
                swal(response["success"], {
                            icon: "success",
                            timer: 1000,
                        });
            }
            else {
                swal(response["errors"], {
                    icon: "error",
                    timer: 1300,
                });
            
            }

        },

    });


};
function updatecate(route,id,token,count) {
 
    $.ajax({
        url: route,
        type: "POST",
        data: {
            id: id,
            count: count,
            _token: token,

        },
        success: function (response) {
            let id = response.id;
            console.log(response);
            // $('#message_error').remove();
            if (response["success"]) {
               // console.log(response["success"]);
                // swal(response["success"], {
                //             icon: "success",
                //             timer: 1000,
                //         });
            }
            else {
                swal(response["errors"], {
                    icon: "error",
                    timer: 1300,
                });
            
            }

        },

    });


};
function delete_cart(route,id,token) {
 
    $.ajax({
        url: route,
        type: "POST",
        data: {
            id: id,
            _token: token,

        },
        success: function (response) {
            let id = response.id;
            console.log(response);
            // $('#message_error').remove();
            if (response["success"]) {
               console.log(response["success"]);
                swal(response["success"], {
                            icon: "success",
                            timer: 1000,
                        });
                        location.reload();
            }
            else {
                swal(response["errors"], {
                    icon: "error",
                    timer: 1300,
                });
            
            }

        },

    });


};