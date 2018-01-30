jQuery(document).ready(function($) {
       $('#fullpage').fullpage({
        //Navigation
        menu: '#menu',
        //Add more anchors if required, but i think that 10 will do for the most projects :)
        sectionsColor: ['transparent', '#4BBFC3', '#7BAABE', 'whitesmoke', '#ccddff'],
                anchors: ['Design', 'Innovation', 'Development', 'Sourcing'],
                menu: '#menu',
                scrollingSpeed: 2700,
                navigation: true,
                navigationPosition: 'right',
                navigationTooltips:  ['Design', 'Innovation', 'Development', 'Sourcing'],
                showActiveTooltip: true,
                slidesNavigation: true,
                slidesNavPosition: 'top',
        
            //Scrolling
        css3: true,
        scrollingSpeed: 1400,
        autoScrolling: true,
        fitToSection: true,
        fitToSectionDelay: 2000,
        scrollBar: false,

        //Accessibility
        keyboardScrolling: true,

        //Design
        controlArrows: true,
        paddingTop: '3em',
        paddingBottom: '10px',
        fixedElements: '#header, .footer',
        responsiveWidth: 0,
        responsiveHeight: 0,
      
    
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