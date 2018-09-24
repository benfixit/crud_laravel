$(document).ready(function () {
    $("form[name='post-comment']").validate({
        rules: {
            name: "required",
            comment: "required",
        },
        messages: {
            name: "Please enter your Name",
            comment: "Please enter some comments",
        },
        submitHandler: function(form) {
            waitingDialog.show("Sending...");
            $.ajax({
                type: 'POST',
                url: $("#post-comment").attr("action"),
                data: $("#post-comment").serialize(),
                success: function (response) {
                    waitingDialog.hide();
                    let message = "";
                    let btnType = "";

                    if(parseInt(response.status) === 1){
                        btnType = "btn-success";
                        message = prepMessage(response.message, "#009900", "fa-check", "Success");
                    }else{
                        btnType = "btn-danger";
                        message = prepMessage(response.message, "#d9534f", "fa-exclamation-triangle", "Error");
                    }
                    bootbox.alert(message, function () {
                        $("#post-comment")[0].reset();
                    }).find(".modal-footer .btn-primary").removeClass("btn-primary").addClass(btnType);
                }
            });
        }
    });

    var prepMessage = function (message, color, fontIcon, heading) {
        return "<h3 class='text-center' style='color: " + color + ";'><span class='fa " + fontIcon + "'></span>&nbsp;" + heading + " </h3><hr><p class='text-center' style='color: " + color + ";'>" + message + "</p>";
    };
});