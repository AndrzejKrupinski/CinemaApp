$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $('#sidebar').toggleClass('col-md-3');
        $('#main-space').toggleClass('col-md-9');
        $('#main-space').toggleClass('col-md-11');
    });
});
