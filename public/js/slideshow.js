function SlideShow(c) {
    var a = document.getElementById("slideContainer"), f = document.getElementById("search1").getElementsByTagName("li"), h = document.getElementById("side_search1"), n = h.getElementsByTagName("li"), d = f.length, c = c || 3000, e = lastI = 0, j, m;
    function b() {
        m = setInterval(function () {
            e = e + 1 >= d ? e + 1 - d : e + 1;
            g()
        }, c)
    }
    function k() {
        clearInterval(m)
    }
    function g() {
        f[lastI].style.display = "none";
        n[lastI].className = "";
        f[e].style.display = "block";
        n[e].className = "on";
        lastI = e
    }
    f[e].style.display = "block";
    a.onmouseover = k;
    a.onmouseout = b;
    h.onmouseover = function (i) {
        j = i ? i.target : window.event.srcElement;
        if (j.nodeName === "LI") {
            e = parseInt(j.innerHTML, 10) - 1;
            g()
        }
    };
    b()
}
;
function SlideShow2(c) {
    var a2 = document.getElementById("slideContainer2"), f2 = document.getElementById("search2").getElementsByTagName("li"), h2 = document.getElementById("side_search2"), n2 = h2.getElementsByTagName("li"), d2 = f2.length, c2 = c2 || 3000, e2 = lastI2 = 0, j2, m2;
    function b2() {
        m2 = setInterval(function () {
            e2 = e2 + 1 >= d2 ? e2 + 1 - d2 : e2 + 1;
            g2()
        }, c2)
    }
    function k2() {
        clearInterval(m2)
    }
    function g2() {
        f2[lastI2].style.display = "none";
        n2[lastI2].className = "";
        f2[e2].style.display = "block";
        n2[e2].className = "on";
        lastI2 = e2
    }
    f2[e2].style.display = "block";
    a2.onmouseover = k2;
    a2.onmouseout = b2;
    h2.onmouseover = function (i) {
        j2 = i ? i.target : window.event.srcElement;
        if (j2.nodeName === "LI") {
            e2 = parseInt(j2.innerHTML, 10) - 1;
            g2()
        }
    };
    b2()
}
;