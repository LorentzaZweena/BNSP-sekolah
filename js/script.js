$(document).ready(function() {
    function isInViewport(element) {
        const rect = element.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }
    
    function animateCounter() {
        $('.counter-value').each(function() {
            const $this = $(this);
            if (isInViewport(this) && !$this.hasClass('animated')) {
                $this.addClass('animated');
                
                const countTo = parseInt($this.attr('data-count'));
                
                $({ countNum: 0 }).animate({
                    countNum: countTo
                }, {
                    duration: 2000,
                    easing: 'swing',
                    step: function() {
                        $this.text(Math.floor(this.countNum));
                    },
                    complete: function() {
                        $this.text(this.countNum);
                    }
                });
            }
        });
    }
    $(window).on('scroll load', animateCounter);
});

document.getElementById('sidebar-toggle').addEventListener('click', function() {
    document.querySelector('.sidebar').classList.toggle('active');
});