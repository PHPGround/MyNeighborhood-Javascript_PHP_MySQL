$(document).ready(function() {
  







 $.ajax({
        type: "POST",
        url: "php/getuserdata.php",
    }).done(function(response) {

console.log(response)


    //FETCH ALL FEEDS AND UPDATE THE CORRESPONDING DIV
    var feed_spinner = new Spinner().spin()
    $('#all').append(feed_spinner.el);
    $.ajax({
        type: "POST",
        url: "php/allfeed.php",
    }).done(function(response) {

        //console.log(response);
        $("#all").html(response);
        feed_spinner.stop();
        $('.btn-reply').on("click", function() {
            onReplyButtonClick(this);
        });

        // BIND CLICK EVENT TO THE MAP ZOOM VIEW
        $('.zoom-map').click(function() {
            var pos = $(this).attr("name");
            //console.log(pos);
            setTimeout(function() {
                zoomMap(pos);
            }, 1000);
        })


    });


        //console.log(response);


        //FETCH HOOD MEMBERS AND UPDATE THE CORRESPONDING DIV
            var hoodmember_spinner = new Spinner().spin()
            $('#people').append(hoodmember_spinner.el);
        $.ajax({
            type: "POST",
            url: "php/gethoodmembers.php",
        }).done(function(response) {
        
            $("#hood-members").html(response);
            hoodmember_spinner.stop();
            $('.add-friend').on("click", function() {
                var friendUserId = $(this).attr('name');
                console.log("Sending friend request to " + friendUserId)
                $.post('php/sendfriendrequest.php', {
                    friendUserId: friendUserId
                }, function(response) {




                    if (response) {
                        toastr.success("Friend request sent to "+friendUserId);
                        $.ajax({
                            type: "POST",
                            url: "php/sendnotification.php",
                            data: {
                                toUserId: friendUserId,
                                message: "You have a received a new friend request!"
                            }
                        }).done(function(response) {
                            console.log(response);
                        });

                    } else {
                        toastr.error("There was some problem while sending friend request.");
                    }
                });
            });
            $('.add-neighbor').on("click", function() {
                var friendUserId = $(this).attr('name');
                console.log("adding neighbor " + friendUserId)
                $.post('php/addneighbor.php', {
                    friendUserId: friendUserId
                }, function(response) {

                    if (response) {
                        toastr.success("You just added a neighbor.");
                    } else {
                        toastr.error("There was some problem while sending friend request.");
                    }
                });
            });
        });

    });








    $.post('php/fetchuserdetails.php',function(d){
        var obj = JSON.parse(d);
        
        $('#welcome').html(obj.username);
    })


    $('[data-toggle="tooltip"]').tooltip();

    // $.ajax({
    //     type: "POST",
    //     url: "php/getsetting.php",
    // }).done(function(response) {
    //     console.log(response);
    //     var response = JSON.parse(response);
    //     if (response.prefName == "NOTIFICATION" && response.prefValue == 1) {
    //         $('#setting-email-alert').bootstrapToggle('on');
    //     } else {
    //         $('#setting-email-alert').bootstrapToggle('off');
    //     }

    // });

    $('.btn-setting-save').click(function() {
        var state = $('#setting-email-alert').prop("checked");
        var prefValue = state ? 1 : 0;
        $.ajax({
            type: "POST",
            url: "php/savesetting.php",
            data: {
                prefValue: prefValue
            }
        }).done(function(response) {
            console.log(response);
            var response = JSON.parse(response);
            if (response.status) {
                toastr.success("Your settings have been saved.");
                $('#settingsModal').modal('hide');
            } else {
                toastr.error("Problem encountered while saving your setting.")
            }

        });
    });


   






    // //FETCH HOOD FEEDS AND UPDATE THE CORRESPONDING DIV
    // $.ajax({
    //     type: "POST",
    //     url: "php/hoodfeed.php",
    // }).done(function(response) {
    //     $("#hood").html(response);
    //     $('.btn-reply').on("click", function() {
    //         onReplyButtonClick(this);
    //     });

    // });

    // //FETCH BLOCK FEEDS AND UPDATE THE CORRESPONDING DIV
    // $.ajax({
    //     type: "POST",
    //     url: "php/blockfeed.php",
    // }).done(function(response) {
    //     $("#block").html(response);
    //     $('.btn-reply').on("click", function() {
    //         onReplyButtonClick(this);
    //     });
    // });

    // //FETCH FRIEND FEEDS AND UPDATE THE CORRESPONDING DIV
    // $.ajax({
    //     type: "POST",
    //     url: "php/friendfeed.php",
    // }).done(function(response) {
    //     $("#friend").html(response);
    //     $('.btn-reply').on("click", function() {
    //         onReplyButtonClick(this);
    //     });
    // });

    // //FETCH NEIGHBOR FEEDS AND UPDATE THE CORRESPONDING DIV
    // $.ajax({
    //     type: "POST",
    //     url: "php/neighborfeed.php",
    // }).done(function(response) {
    //     $("#neighbor").html(response);
    //     $('.btn-reply').on("click", function() {
    //         onReplyButtonClick(this);
    //     });
    // });

    // //FETCH PERSONAL FEEDS AND UPDATE THE CORRESPONDING DIV
    // $.ajax({
    //     type: "POST",
    //     url: "php/personalfeed.php",
    // }).done(function(response) {
    //     $("#personal").html(response);
    //     $('.btn-reply').on("click", function() {
    //         onReplyButtonClick(this);
    //     });
    // });

    //NOTIFICATIONS
    $.ajax({
        type: "POST",
        url: "php/notify.php",
    }).done(function(response) {
        //console.log(response)
        $("#notifications").html(response);
        $('.accept-block-request').on("click", function() {
            var friendUserId = $(this).attr('name');
            console.log("adding Block Member" + friendUserId)
            $.post('php/acceptblockrequest.php', {
                friendUserId: friendUserId
            }, function(response) {

                if (response) {
                    toastr.success("Block Member request accepted.");
                    $.ajax({
                        type: "POST",
                        url: "php/notify.php",
                    }).done(function(response) {
                        //console.log(response)
                        $("#notifications").html(response);
                    });

                } else {
                    toastr.error("There was some problem while sending friend request.");
                }
            });
        });

    });




    // BIND CLICK EVENT TO THE POST NEW TOPIC
    $('#new-topic').click(function() {
        setTimeout(function() {
            topicMarker = [];
            initTopicMap();
        }, 1000);
    })



    // BIND CLICK EVENT TO THE FEED TABS
    $('.feed-tab li').click(function() {
        var href = $(this).children('a').attr("href");
        href = href.replace("#", "");

        $.ajax({
            type: "POST",
            url: "php/" + href + "feed.php",
        }).done(function(response) {
            $("#" + href + "").html(response);
            $('.btn-reply').on("click", function() {
                onReplyButtonClick(this);
            });

            $('.zoom-map').click(function() {
                var pos = $(this).attr("name");
                console.log(pos);
                setTimeout(function() {
                    zoomMap(pos);
                }, 1000);
            })

        });
    })

    $('.scrollbar-light').scrollbar();

    // BIND CLICK EVENT ON PEOPLE IN HOOD FOR DIRECT  MESSAGING
    $('.private-message img, .private-message span').click(function() {
        var name = $(this).attr("name");
        $("#privateMessageModal h4").html("Send message to <span class='text-danger'>" + name + "</span>");
        $("#privateMessageModal").modal();
    });


    // CALL FUNCTION ON CLICK OF REPLY BUTTON
    function onReplyButtonClick(ele) {
        console.log('CLICKED reply');
        var topicId = $(ele).attr("name");
        var userId = 17; //TO DO
        var message = $(ele).parent().parent().find("input").val();
        if (message.length > 0) {
            $.post('php/reply.php', {
                topicId: topicId,
                userId: userId,
                message: message
            }, function(response) {
                if (response) {
                    toastr.success("Your reply has been posted.");


                    var id = $(ele).closest(".tab-pane.active").attr('id');
                    var url = "php/" + id + "feed.php";
                    $.ajax({
                        type: "POST",
                        url: url,
                    }).done(function(response) {
                        $("#" + id + "").html(response);
                        $('.btn-reply').on("click", function() {
                                        onReplyButtonClick(this);
                                    });

                    });



                } else {
                    console.log(response);
                    toastr.error("There was some problem while posting your reply.");
                }
            });
        } else {
            toastr.warning("Nothing to reply.");
        }

    }


    // BIND CLICK EVENT ON SEARCH BUTTON
    $('.btn-search').click(function() {
        console.log('CLICKED search');
        var searchkey = $("#searchkey").val();
        if (searchkey.length > 0) {
            var modaldata =
                '<div class="modal-dialog" role="document">' +
                '<div class="modal-content">' +
                '<div class="modal-header">' +
                '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                '<h4 class="modal-title" id="myModalLabel"><small>Search results for </small>' + searchkey + '</h4>' +
                '</div>' +
                '<div class="modal-body">';

            $.ajax({
                type: "POST",
                url: "php/search.php",
                data: {
                    searchkey: searchkey
                }
            }).done(function(response) {
                // $.post('php/search.php',{searchkey:searchkey}, function(response){

                modaldata += response;
                modaldata +=
                    '</div>' +
                    '<div class="modal-footer">' +
                    '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>' +
                    '</div>' +
                    '</div>' +
                    '</div>';

                $("#searchModal").html(modaldata);
                $("#searchModal").modal();
                $('.btn-reply').on("click", function() {


                    var topicId = $(this).attr("name");
                    var userId = 17; //TO DO
                    var message = $(this).parent().parent().find("input").val();
                    if (message.length > 0) {
                        $.post('php/reply.php', {
                            topicId: topicId,
                            userId: userId,
                            message: message
                        }, function(response) {
                            if (response) {
                                toastr.success("Your reply has been posted.");


                                $('#searchModal').modal('hide');
                                var href = $('.feed-tab .active').children('a').attr("href");
                                href = href.replace("#", "");

                                $.ajax({
                                    type: "POST",
                                    url: "php/" + href + "feed.php",
                                }).done(function(response) {
                                    $("#" + href + "").html(response);
                                    $('.btn-reply').on("click", function() {
                                        onReplyButtonClick(this);
                                    });
                                });



                            } else {
                                console.log(response);
                                toastr.error("There was some problem while posting your reply.");
                            }
                        });
                    } else {
                        toastr.warning("Nothing to reply.");
                    }




                });

            });


        } else {
            toastr.warning("Enter a search key.");
        }

    });

    // BIND CLICK EVENT ON CHANGE OF RECIPIENT SELECTION
    $('#topic-recipient').change(function() {
        var recipient = $("#topic-recipient").val();
        if (recipient == "PERSONAL") {
            $('#select-recipient-users').show();
        } else {
            $('#select-recipient-users').hide();
        }

    });


    // BIND CLICK EVENT ON POST NEW TOPIC BUTTON
    $('.btn-post-topic').click(function() {
        console.log('CLICKED post');
        var recipient = "";
        var subject = $("#topic-subject").val();
        var message = $("#topic-message").val();
        var tagType = $("#topic-recipient").val();

        if (tagType == "PERSONAL") {
            recipient = $("#topic-recipient-users").val();
            if (recipient) {
                recipient = recipient.toString();
            }
        }

        if (subject.length <= 0) {
            $("#topic-subject").focus();
            toastr.warning("Subject cannot be empty.");
        } else if (message.length <= 0) {
            $("#topic-message").focus();
            toastr.warning("Message cannot be empty.");
        } else if (tagType.length <= 0) {
            $("#topic-recipient").focus();
            toastr.warning("Recipient cannot be empty.");
        } else if (tagType == "PERSONAL" && recipient == null) {
            $("#topic-recipient-users").focus();
            toastr.warning("Recipient cannot be empty.");
        } else {

            var pos="";
            try{
            var lat = topicMarker[0].position.lat();
            var lng = topicMarker[0].position.lng();
            pos = lat + "," + lng;
            }catch(e){
                console.log(e);
            }
            console.log(subject+" "+message+" "+tagType+" "+recipient+" "+pos);
            $.post('php/post.php', {
                subject: subject,
                message: message,
                tagType: tagType,
                recipient: recipient,
                location: pos
            }, function(response) {
                if (response) {
                    toastr.success("Your reply has been posted.");
                    $('#postTopicModal').modal('hide');
                    var href = $('.feed-tab .active').children('a').attr("href");
                    href = href.replace("#", "");

                    $.ajax({
                        type: "POST",
                        url: "php/" + href + "feed.php",
                    }).done(function(response) {
                        $("#" + href + "").html(response);
                        $('.btn-reply').on("click", function() {
                            onReplyButtonClick(this);
                        });
                    });
                } else {
                    console.log(response);
                    toastr.error("There was some problem while posting your reply.");
                }
            });
        }

    });

});
