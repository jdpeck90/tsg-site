window.$ = $;

jQuery(document).ready(function($) {
    var script = document.createElement("script");
    script.setAttribute("src", "https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js");
    script.addEventListener('load', function() {
        var script = document.createElement("script");
        document.body.appendChild(script);
    }, false);
    document.body.appendChild(script);



    $('.slide__brand-logo').on('click', function() {
        console.log('this from brand logo', this)
        $(this).siblings('.slide__brand-modal').css('display','block');
      });

    $('.close').on('click', function() {
        $(this).siblings('.slide__brand-description').css('visibility','hidden');
    });
    //hide brandModal
    $('.slide__brand-modal').click(function() { $(this).hide() })


    //make vertical paragraph slider
    var arrow = '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="57.502px" height="33.152px" viewBox="0 0 57.502 33.152" enable-background="new 0 0 57.502 33.152" xml:space="preserve"> <path fill="#FF6C2C" d="M28.755,9.746c10.764,13.617,24.77,22.969,25.405,23.389l3.342-4.615 c-0.159-0.107-15.966-10.658-26.307-25.145L28.788,0l-2.434,3.357C15.865,17.84,0.206,28.408,0.001,28.549H0l3.365,4.604 C3.993,32.73,17.869,23.389,28.755,9.746"/></svg>';

    $('.section').each(function(idx,e){ 
        let index = idx + 1;
        let sectionID = $('#section'+index);
        let sectionChildren = $(sectionID).find('.section__content--wizzy').children().length;
        if(sectionChildren > 1 ) {
            let finalWizzyContent = $(sectionID).find('.section__content--wizzy').children().slice(-1);
			console.log('finalWizzyContent', finalWizzyContent)
            let otherWizzyContent = $(sectionID).find('.section__content--wizzy').children().slice(1);
            console.log('otherWizzyContent', otherWizzyContent)
           
            otherWizzyContent.hide()
            $('.section__content--arrow-up').html('<svg version="1.1" id="Layer_1" class="section__content--up-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="57.502px" height="33.152px" viewBox="0 0 57.502 33.152" enable-background="new 0 0 57.502 33.152" xml:space="preserve"> <path fill="#FF6C2C" d="M28.755,9.746c10.764,13.617,24.77,22.969,25.405,23.389l3.342-4.615 c-0.159-0.107-15.966-10.658-26.307-25.145L28.788,0l-2.434,3.357C15.865,17.84,0.206,28.408,0.001,28.549H0l3.365,4.604 C3.993,32.73,17.869,23.389,28.755,9.746"/></svg>')
            $('.section__content--arrow-down').html('<svg version="1.1" id="Layer_1" class="section__content--down-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="57.502px" height="33.152px" viewBox="0 0 57.502 33.152" enable-background="new 0 0 57.502 33.152" xml:space="preserve"> <path fill="#FF6C2C" d="M28.755,9.746c10.764,13.617,24.77,22.969,25.405,23.389l3.342-4.615 c-0.159-0.107-15.966-10.658-26.307-25.145L28.788,0l-2.434,3.357C15.865,17.84,0.206,28.408,0.001,28.549H0l3.365,4.604 C3.993,32.73,17.869,23.389,28.755,9.746"/></svg>')
            
            
            //Toggle Text Down
            $('.section__content--down-icon').on('click', function(i,e) {
                let hiddenContent = $(this).closest('.section__content--arrow-down').siblings('.section__content--wizzy').find('p:hidden');
                //if all content is hidden, show first p tag
                if(sectionChildren < hiddenContent.length){
                    $(hiddenContent).first().slideToggle();
                } else {
                    $('.section__content--wizzy p:visible').slideToggle().next().slideToggle();
                }
            });            
            
            //Toggle Text Up
            $('.section__content--up-icon').on('click', function() {
                let hiddenContent = $(this).closest('.section__content--arrow-up').siblings('.section__content--wizzy').find('p:hidden');
                console.log('hiddenContentUp',hiddenContent)

                if(sectionChildren < hiddenContent.length){
                    $(hiddenContent).first().slideToggle();
                } else {
                    $('.section__content--wizzy p:visible').slideToggle().prev().slideToggle();
                }
            });
        }})


       

    })
