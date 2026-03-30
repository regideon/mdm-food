document.querySelectorAll('.fi-sidebar *').forEach(el => {
    const bg = window.getComputedStyle(el).backgroundColor;
    if (bg !== 'rgba(0, 0, 0, 0)') {
        console.log(el.tagName + ' | ' + el.className + ' | ' + bg);
    }
});