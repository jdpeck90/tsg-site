jQuery(document).ready(function($) {

        var video = document.getElementById("myVideo");
        var btn = document.getElementById("myBtn");

        function myFunction() {
          if (video.paused) {
            video.play();
            btn.innerHTML = "Pause";
          } else {
            video.pause();
            btn.innerHTML = "Play";
          }
        }

       $('#fullpage').fullpage({
         
        //Navigation
        menu: '#menu',
        //Add more anchors if required, but i think that 10 will do for the most projects :)
        sectionsColor: ['transparent', 'transparent', 'transparent', 'transparent', 'transparent'],
                anchors: ['design', 'innovation', 'development', 'sourcing', 'sixth', 'seventh', 'timeline' ],
                menu: '#menu',
                scrollingSpeed: 2700,
                navigation: true,
                navigationPosition: 'right',
                navigationTooltips:  ['Design', 'Innovation', 'Development', 'Sourcing', 'sixth', 'seventh', 'timeline'],
                showActiveTooltip: true,
                slidesNavigation: true,
                slidesNavPosition: 'bottom',
        
            //Scrolling
        css3: true,
        scrollingSpeed: 1400,
        responsiveSlides: true,
        autoScrolling: true,
        fitToSection: true,
        fitToSectionDelay: 2000,
        scrollBar: true,

        //Accessibility
        keyboardScrolling: true,

        //Design
        controlArrows: true,
        paddingTop: '0',
        paddingBottom: '0',
        fixedElements: '#header',
        responsiveWidth: 0,
        responsiveHeight: 0,
        afterLoad: function(anchorLink, index){
        console.log('​index', index);
        console.log('​anchorLink', anchorLink);
          
          var loadedSection = $(this);
      
          //using index
          if(anchorLink == 'timeline'){
            console.log('this from timeline --->',this)
            var currentSlide = 0,
            totalSlides  = $(".tl-item").length - 1;
            console.log('​totalSlides', totalSlides);
            
            $('.timeline__next').html('<svg version="1.1" id="Layer_1" class="timeline__next-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="57.502px" height="33.152px" viewBox="0 0 57.502 33.152" enable-background="new 0 0 57.502 33.152" xml:space="preserve"> <path fill="#FF6C2C" d="M28.755,9.746c10.764,13.617,24.77,22.969,25.405,23.389l3.342-4.615 c-0.159-0.107-15.966-10.658-26.307-25.145L28.788,0l-2.434,3.357C15.865,17.84,0.206,28.408,0.001,28.549H0l3.365,4.604 C3.993,32.73,17.869,23.389,28.755,9.746"/></svg>')
            $('.timeline__prev').html('<svg version="1.1" id="Layer_1" class="timeline__prev-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="57.502px" height="33.152px" viewBox="0 0 57.502 33.152" enable-background="new 0 0 57.502 33.152" xml:space="preserve"> <path fill="#FF6C2C" d="M28.755,9.746c10.764,13.617,24.77,22.969,25.405,23.389l3.342-4.615 c-0.159-0.107-15.966-10.658-26.307-25.145L28.788,0l-2.434,3.357C15.865,17.84,0.206,28.408,0.001,28.549H0l3.365,4.604 C3.993,32.73,17.869,23.389,28.755,9.746"/></svg>')
            

          
          }

          
        
        }

    
   });
});

jQuery(document).ready(function($) {
if ($(window).width() < 960) {
     $('.menu-trigger').click(function() {
    $('nav ul').slideToggle(500);
  });//end slide toggle
   $('nav li').click(function() {
    $('nav ul').slideToggle(100);
  });//end slide toggle
}
else {
   
}
});//end ready
