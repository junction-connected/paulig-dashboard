
class oneDay {

    static postDate() {
        let selectedDate = $('#one-day-date').val();
        $('<form action="' + rootPath + '/one-day/index' + '" method="POST">' +
            '<input type="hidden" name="orderTime" value="' + selectedDate + '">' +
            '</form>').appendTo($(document.body)).submit();
    }
}