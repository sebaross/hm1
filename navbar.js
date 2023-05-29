window.addEventListener('DOMContentLoaded', function() {
    const navbar = document.querySelector('.navbar');
    const underline = document.querySelector('.underline');
    const navItems = navbar.querySelectorAll('li');
  
    function handleNavHover() {
      const activeItem = navbar.querySelector('.active');
  
      if (activeItem) {
        const activeLink = activeItem.querySelector('a');
        const activeWidth = activeLink.offsetWidth;
        const activeOffsetLeft = activeLink.offsetLeft;
  
        underline.style.width = activeWidth + 'px';
        underline.style.transform = `translateX(${activeOffsetLeft}px)`;
      }
    }
  
    navItems.forEach(function(item) {
      item.addEventListener('mouseenter', handleNavHover);
      item.addEventListener('mouseleave', handleNavHover);
    });
  });