const slider = () => {
   const slides  = Array.from(document.querySelectorAll('.text_view'));
   const tabs    = Array.from(document.querySelectorAll('.tabletka_icon'));
   
   let activeSlide = 0;
 
   slides[activeSlide].classList.add('text_view_active');
   tabs[activeSlide].classList.add('tabletka_icon_active');
  
   tabs.forEach((item, i) => {
     item.addEventListener('mouseenter', () => {
       slides[activeSlide].classList.remove('text_view_active');
       tabs[activeSlide].classList.remove('tabletka_icon_active');
 
       activeSlide = i;
 
       slides[activeSlide].classList.add('text_view_active');
       tabs[activeSlide].classList.add('tabletka_icon_active');
     });
   });
 }
 
 
 slider()