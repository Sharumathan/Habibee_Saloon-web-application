
      function view() {
        document.getElementById("menu").style.left = "0";
        document.getElementById("page").style.marginLeft = "250px";
        document.getElementById("hideLogo").style.opacity = "0";
        document.getElementById("pageDetails").style.opacity = "0";
      }
      function closee() {
        document.getElementById("menu").style.left = "-250px";
        document.getElementById("page").style.marginLeft = "0px";
        document.getElementById("hideLogo").style.opacity = "100%";
        document.getElementById("pageDetails").style.opacity = "100%";
      }