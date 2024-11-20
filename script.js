jQuery(document).ready(function($) {
    const images = [
        'ghost-1.webp',
        'ghost-2.webp',
        'ghost-3.webp'
    ];

    function getRandomPosition() {
        const x = Math.random() * $(window).width();
        const y = Math.random() * $(window).height();
        return { x, y };
    }

    function createghosts() {
        const img = images[Math.floor(Math.random() * images.length)];
        const $ghosts = $('<img>', {
            src: pluginUrl + img,
            class: 'ghosts-image'
        });

        const position = getRandomPosition();
        $ghosts.css({
            position: 'absolute',
            left: position.x,
            top: position.y
        });

        $('body').append($ghosts);

        $ghosts.animate({
            left: position.x + (Math.random() * 100 - 50),
            top: position.y + (Math.random() * 100 - 50)
        }, 2000, function() {
            $(this).remove();
        });
    }

    // Create ghosts every 500 milliseconds
    setInterval(createghosts, 500);
});
