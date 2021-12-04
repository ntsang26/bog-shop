var countDownDate = new Date("Feb 12, 2021 00:00:00").getTime();

var x = setInterval(function() {
    var now = new Date().getTime();

    var distance = countDownDate - now;

    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("day").innerText = days;

    document.getElementById("hour").innerHTML = hours;
    document.getElementById("minute").innerHTML = minutes;
    document.getElementById("second").innerHTML = seconds;

    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "Happy New Year";
    }
}, 1000);

var swiper = new Swiper('.swiper-container', {
    // Optional parameters
    loop: true,
    slidesPerView: 4,
    centeredSlides: true,
    spaceBetween: 30,
  
    // Navigation arrows
    navigation: {
      nextEl: '.fa-arrow-circle-right',
      prevEl: '.fa-arrow-circle-left',
    },
  
    // And if we need scrollbar
    scrollbar: {
      el: '.swiper-scrollbar',
    },
  })

