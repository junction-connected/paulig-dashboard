
class oneDay {

    static postDate() {
        let selectedDate = $('#one-day-date').val();
        $.post(rootPath + '/one-day/index', {"orderTime": selectedDate});
    }
}