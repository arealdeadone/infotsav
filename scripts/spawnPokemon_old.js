<<<<<<< HEAD
<<<<<<< HEAD
/**
 * Created by ARVIND on 08-Aug-16.
*/


var call = function(){
    $.ajax({
        url: "getcoord.php?main",
        type: "get",
        datatype: "json",
        success: function(data) {
            for(i=0; i<6; i++)
            {
                var pkm = document.createElement('div');
                pkm.className = "flowers r" + parseInt(16+i);
                pkm.style.zIndex = "54";
                pkm.style.backgroundPosition = "-37.5px -74px";
                pkm.style.top = data[i].y + "px";
                pkm.style.left = data[i].x + "px";
                pkm.style.visibility = "hidden";
                document.getElementById("mainRoad").appendChild(pkm);
                console.log(pkm);
            }
        }
    });

    $.ajax({
        url: "getcoord.php?coordside",
        type: "get",
        datatype: "json",
        success: function (data) {

            for(i=0; i<2; i++)
            {
                var pkm = document.createElement('div');
                pkm.className = "flowers r" + parseInt(22+i);
                pkm.style.zIndex = "54";
                pkm.style.backgroundPosition = "-37.5px -74px";
                pkm.style.top = data[0][i].y + "px";
                pkm.style.left = data[0][i].x + "px";
                pkm.style.visibility = "hidden";
                document.getElementById("aboutRoad").appendChild(pkm);
                console.log(pkm);
            }

            for(i=0; i<2; i++)
            {
                var pkm = document.createElement('div');
                pkm.className = "flowers r" + parseInt(24+i);
                pkm.style.zIndex = "54";
                pkm.style.backgroundPosition = "-37.5px -74px";
                pkm.style.top = data[1][i].y + "px";
                pkm.style.left = data[1][i].x + "px";
                pkm.style.visibility = "hidden";
                document.getElementById("servicesRoad").appendChild(pkm);
                console.log(pkm);
            }

            for(i=0; i<2; i++)
            {
                var pkm = document.createElement('div');
                pkm.className = "flowers r" + parseInt(26+i);
                pkm.style.zIndex = "54";
                pkm.style.backgroundPosition = "-37.5px -74px";
                pkm.style.top = data[2][i].y + "px";
                pkm.style.left = data[2][i].x + "px";
                pkm.style.visibility = "hidden";
                document.getElementById("portfolioRoad").appendChild(pkm);
                console.log(pkm);
            }

            for(i=0; i<2; i++)
            {
                var pkm = document.createElement('div');
                pkm.className = "flowers r" + parseInt(28+i);
                pkm.style.zIndex = "54";
                pkm.style.backgroundPosition = "-37.5px -74px";
                pkm.style.top = data[3][i].y + "px";
                pkm.style.left = data[3][i].x + "px";
                pkm.style.visibility = "hidden";
                document.getElementById("sponsorsRoad").appendChild(pkm);
                console.log(pkm);
            }

            for(i=0; i<2; i++)
            {
                var pkm = document.createElement('div');
                pkm.className = "flowers r" + parseInt(30+i);
                pkm.style.zIndex = "54";
                pkm.style.backgroundPosition = "-37.5px -74px";
                pkm.style.top = data[4][i].y + "px";
                pkm.style.left = data[4][i].x + "px";
                pkm.style.visibility = "hidden";
                document.getElementById("techRoad").appendChild(pkm);
                console.log(pkm);
            }

            for(i=0; i<2; i++)
            {
                var pkm = document.createElement('div');
                pkm.className = "flowers r" + parseInt(32+i);
                pkm.style.zIndex = "54";
                pkm.style.backgroundPosition = "-37.5px -74px";
                pkm.style.top = data[5][i].y + "px";
                pkm.style.left = data[5][i].x + "px";
                pkm.style.visibility = "hidden";
                document.getElementById("abinfotsavRoad").appendChild(pkm);
                console.log(pkm);
            }

        }
    });
}

setInterval(call,600000);
=======
=======
>>>>>>> master
/**
 * Created by ARVIND on 08-Aug-16.
*/


var call = function(){
    $.ajax({
        url: "getcoord.php?main",
        type: "get",
        datatype: "json",
        success: function(data) {
            for(i=0; i<6; i++)
            {
                var pkm = document.createElement('div');
                pkm.className = "flowers r" + parseInt(16+i);
                pkm.style.zIndex = "54";
                pkm.style.backgroundPosition = "-37.5px -74px";
                pkm.style.top = data[i].y + "px";
                pkm.style.left = data[i].x + "px";
                pkm.style.visibility = "hidden";
                document.getElementById("mainRoad").appendChild(pkm);
                console.log(pkm);
            }
        }
    });

    $.ajax({
        url: "getcoord.php?coordside",
        type: "get",
        datatype: "json",
        success: function (data) {

            for(i=0; i<2; i++)
            {
                var pkm = document.createElement('div');
                pkm.className = "flowers r" + parseInt(22+i);
                pkm.style.zIndex = "54";
                pkm.style.backgroundPosition = "-37.5px -74px";
                pkm.style.top = data[0][i].y + "px";
                pkm.style.left = data[0][i].x + "px";
                pkm.style.visibility = "hidden";
                document.getElementById("aboutRoad").appendChild(pkm);
                console.log(pkm);
            }

            for(i=0; i<2; i++)
            {
                var pkm = document.createElement('div');
                pkm.className = "flowers r" + parseInt(24+i);
                pkm.style.zIndex = "54";
                pkm.style.backgroundPosition = "-37.5px -74px";
                pkm.style.top = data[1][i].y + "px";
                pkm.style.left = data[1][i].x + "px";
                pkm.style.visibility = "hidden";
                document.getElementById("servicesRoad").appendChild(pkm);
                console.log(pkm);
            }

            for(i=0; i<2; i++)
            {
                var pkm = document.createElement('div');
                pkm.className = "flowers r" + parseInt(26+i);
                pkm.style.zIndex = "54";
                pkm.style.backgroundPosition = "-37.5px -74px";
                pkm.style.top = data[2][i].y + "px";
                pkm.style.left = data[2][i].x + "px";
                pkm.style.visibility = "hidden";
                document.getElementById("portfolioRoad").appendChild(pkm);
                console.log(pkm);
            }

            for(i=0; i<2; i++)
            {
                var pkm = document.createElement('div');
                pkm.className = "flowers r" + parseInt(28+i);
                pkm.style.zIndex = "54";
                pkm.style.backgroundPosition = "-37.5px -74px";
                pkm.style.top = data[3][i].y + "px";
                pkm.style.left = data[3][i].x + "px";
                pkm.style.visibility = "hidden";
                document.getElementById("sponsorsRoad").appendChild(pkm);
                console.log(pkm);
            }

            for(i=0; i<2; i++)
            {
                var pkm = document.createElement('div');
                pkm.className = "flowers r" + parseInt(30+i);
                pkm.style.zIndex = "54";
                pkm.style.backgroundPosition = "-37.5px -74px";
                pkm.style.top = data[4][i].y + "px";
                pkm.style.left = data[4][i].x + "px";
                pkm.style.visibility = "hidden";
                document.getElementById("techRoad").appendChild(pkm);
                console.log(pkm);
            }

            for(i=0; i<2; i++)
            {
                var pkm = document.createElement('div');
                pkm.className = "flowers r" + parseInt(32+i);
                pkm.style.zIndex = "54";
                pkm.style.backgroundPosition = "-37.5px -74px";
                pkm.style.top = data[5][i].y + "px";
                pkm.style.left = data[5][i].x + "px";
                pkm.style.visibility = "hidden";
                document.getElementById("abinfotsavRoad").appendChild(pkm);
                console.log(pkm);
            }

        }
    });
}

setInterval(call,600000);
<<<<<<< HEAD
>>>>>>> 36e619b23cf335f7df6d199ac3dc0a5e2a4103f4
=======
>>>>>>> master
