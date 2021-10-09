require('./bootstrap');



window.Echo.private('App.Models.Admin.Market.' + userId)
.notification(function(e){
    // alert(e.title)
    var notificationsWrapper = $('.dropdown-notification');
    var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
    var notificationsCountElem = notificationsToggle.find('span[data-count]');
    var notificationsCount = parseInt(notificationsCountElem.data('count'));
    var notifications = notificationsWrapper.find('li.scrollable-container');


    var existingNotifications = notifications.html();
    var newNotificationHtml =
    '<a class="d-flex" href="http://lozcart.com/market/order/show/'+e.order_id+'">'+
    '<div class="media d-flex align-items-start">'+
        '<div class="media-left">'+
            '<div class="avatar">'+
                '<img src="http://lozcart.com/market/public/photo/box-1.svg" alt="avatar" width="32" height="32">'+
           ' </div>'+
        '</div>'+
       ' <div class="media-body">'+
           ' <p class="media-heading">'+
                '<span class="font-weight-bolder">'+e.title+'</span>'+

            '</p>'+
            '<small class="notification-text">'+ e.time+'</small>'+
        '</div>'+
   ' </div>'+
    '</a>';
    notifications.html(newNotificationHtml + existingNotifications);
    notificationsCount += 1;
    notificationsCountElem.text('data-count', notificationsCount);
    notificationsWrapper.find('.count').text(notificationsCount);
    notificationsWrapper.show();
    $('#notify')[0].play();

})
