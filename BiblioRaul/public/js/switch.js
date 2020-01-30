$("li.topbar-dropdown").on("click", function(event) {
    $(this).toggleClass("show");
    $(this)
        .children()
        .attr("aria-expanded", "true");
    $("div.topbar-dropdown").toggleClass("show");
});

$("body").on("click", function(e) {
    if (
        !$("li.dropdown").is(e.target) &&
        $("li.dropdown").has(e.target).length === 0 &&
        $(".open").has(e.target).length === 0
    ) {
        $("li.dropdown").removeClass("open");
    }
});
