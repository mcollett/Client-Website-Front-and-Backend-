$(function() {

    $('.customer').on('click', function(e) {
        var $customer = $(e.currentTarget);
        var position = $customer.data('position');
        var userID = $customer.data('userID');
        var $availableSpot = $('td.' + position + '-spot:empty');
        if(!$availableSpot || $availableSpot.length == 0) {
            alert('No space for that position!');
            return;
        }
        $availableSpot.first().html($customer.html());
    });

    $('.staff').on('click', function(e) {
        var $staff = $(e.currentTarget);
        var position = $staff.data('position');
        var $availableSpot = $('td.' + position + '-spot:empty');
        if(!$availableSpot || $availableSpot.length == 0) {
            alert('No space for that position!');
            return;
        }
        $availableSpot.first().html($customer.html());
    });

    $('.remove').on('click', function(e) {
        var $row = $(e.currentTarget).closest('tr');
        var $spot = $($row.find('[class$=spot]'));
        $spot.html('');
    });
});