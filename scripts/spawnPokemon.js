 var call_main = function(passdata) {
    $.ajax({
        url: "getcoord.php?main",
        type: "get",
        async: false,
        datatype: "json",
        success: function (data) {
            //var data=JSON.parse(data);
            //alert(data[0].x);
            passdata(data);
        }
    });
};
var call_side = function(passdata) {
    $.ajax({
        url: "getcoord.php?coordside",
        type: "get",
        async: false,
        datatype: "json",
        success: function (data) {
            passdata(data);
        }
    });
};