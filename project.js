// index//

// 導覽列在上滑時會有背景色
$(window).scroll(function () {
  var myScrolltop = $(this).scrollTop(); //取得卷軸現在的高度
  if (myScrolltop > 0) {
    // console.log( myScrolltop )
    $('.dropDown-menu').addClass('navChange');
    $('.dropDown-menu a ').attr('id', 'navChangeA');
    $('#iconnav').attr("src", "./img/slogo-light.png"); 

    ;
  } else {
    $('.dropDown-menu').removeClass('navChange');
    $('.dropDown-menu').addClass('navReturn');
    $('.dropDown-menu a ').removeAttr('id', 'navChangeA');
    $('#iconnav').attr("src", "./img/slogo-normal.png"); 
  }

})


// 當點選到 下圖about標題會顯示對應介紹(其他隱藏)
// function showscript1() {
//   var key = document.getElementById('Aa1'); 
//   key.style.display = "block";

// } 
// function showscript2() {
// var key1 = document.getElementById('Aa2'); 
// key1.style.display = "block";

// }
// function showscript3() {

// var key2 = document.getElementById('Aa3'); 
// key2.style.display = "block";
// }

window.onload = function () {

  var mybutton = document.getElementById("A1");
  var mybutton1 = document.getElementById("A2");
  var mybutton2 = document.getElementById("A3");
  var showDiv = document.getElementById("Aa1");
  var showDiv1 = document.getElementById("Aa2");
  var showDiv2 = document.getElementById("Aa3");
  // console.log(mybutton);
  // console.log(showDiv);


  //改
  mybutton.onclick = function () { 
    if (showDiv.style.display == "none") {
      showDiv.style.display = "block";
      showDiv1.style.display = "none";
      showDiv2.style.display = "none";

    }
    else {
      showDiv.style.display = "none";

    }
  }
  mybutton1.onclick = function () {
    if (showDiv1.style.display == "none") {
      showDiv1.style.display = "block";
      showDiv.style.display = "none";
      showDiv2.style.display = "none";
   
    }
    else {
      showDiv1.style.display = "none";
 
    }
  }
  mybutton2.onclick = function () {
    if (showDiv2.style.display == "none") {
      showDiv2.style.display = "block";
      showDiv.style.display = "none";
      showDiv1.style.display = "none";

    }
    else {
      showDiv2.style.display = "none";
 
      
    }
  }
}

// var mybutton = document.getElementById("A1");
// var showDiv = document.getElementById("Aa1");
// mybutton.onclick = function() {
//     let mySrc = myImage.getAttribute('src');
//     if(mySrc === 'Copperplate') {
//       myImage.setAttribute ('src','images/firefox2.png');
//     } else {
//       myImage.setAttribute ('src','images/firefox-icon.png');
//     }
// }


//About頁js



