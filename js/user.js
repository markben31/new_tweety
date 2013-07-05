/*
$(document).ready(function(){

   $('#loginBtn').click(function(){
       var email = $('#email').val();
       var pass = $('#pass').val();

       //some changes here :)
       if(email == "" || email == null){
           alert("All fields are required!");
           $('#email').focus().css({"box-shadow": "0px 0px 4px red"});
           return false;
       }else if(pass == "" || pass == null){
           alert("Password is empty!");
           $('#pass').focus().css({"box-shadow": "0px 0px 4px red"});
           $('#email').css({"box-shadow": "inset 0 0 5px rgba(0,0,0,0.1), inset 0 3px 2px rgba(0,0,0,0.1)"});
           return false;
       }else{
           return true;
       }
   });



});
    function checkSpace(){
        var email = $('#email').val();

        validRegExp = /^[^@]+@[^@]+.[a-z]{2,}$/i;
        strEmail = document.forms[0].email.value;

        if(email == ""){
            $('#email').focus().css({"box-shadow": "inset 0 0 5px rgba(0,0,0,0.1), inset 0 3px 2px rgba(0,0,0,0.1)"});
            return false;
        }else if(strEmail.search(validRegExp) == -1){
            $('#email').focus().css({"box-shadow": "0px 0px 4px red"});
            return false;
        }else{
            $('#email').focus().css({"box-shadow": "inset 0 0 5px rgba(0,0,0,0.1), inset 0 3px 2px rgba(0,0,0,0.1"});
            return false;
        }

    }

    function checkEmail() {
        var email = document.getElementById('email');

        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if (!filter.test(email.value)) {
            alert("Please provide a valid email address!");
            $('#email').focus().css({"box-shadow": "0px 0px 4px red"});
            $('#pass').css({"box-shadow": "inset 0 0 5px rgba(0,0,0,0.1), inset 0 3px 2px rgba(0,0,0,0.1)"});
            return false;
        }
    }

    */
/*function isValidEmail(strEmail){
        validRegExp = /^[^@]+@[^@]+.[a-z]{2,}$/i;
        strEmail = document.forms[0].email.value;

        // search email text for regular exp matches
        if (strEmail.search(validRegExp) == -1)
        {
            alert('A valid e-mail address is required.\nPlease amend and retry');
            return false;
        }

    }*/

$(document).ready(function(){


    $('#sign_upSUbBtn').click(function(){

        var lname = $('#lname').val();
        var fname = $('#fname').val();
        var address = $('#address').val();
        var contactNum = $('#contactNum').val();
        var gender = $('#gender').val();
        var age = $('#age').val();
        var email = $('#email').val();
        var pass = $('#password').val();
        var re_pass = $('#re-pass').val();

        if(lname == "" && fname == "" && address == "" && contactNum == "" && gender == "" && age == "" && email == "" && pass == "" && re_pass == ""){
            //alert("Lastname can't be empty!");
            alert("All fields must be filled out!");
            return false;
        }

        if(lname == "" || lname == null){
            $('#error_lname').show();
            return false;

        }else if(fname == "" || fname == null){
            $('#error_fname').show();
            return false;
        }else if(address == "" || address == null){
            $('#error_address').show();
            return false;
        }else if(contactNum == "" | contactNum == null){
            $('#error_contact').show();
            return false;
        }else if(gender == "" || gender == null){
            $('#error_gender').show();
            return false;
        }else if(age == "" || age == null){
            $('#error_age').show();
            return false;
        }else if(email == "" || email == null){
            $('#error_email').show();
            return false;
        }else if(pass == "" || pass == null){
            $('#error_pass').show();
            return false;
        }else if(pass != re_pass){
            $('#error_re_pass').show();
            return false;
        }

        alert("You're successfully registered! " + fname + " " + lname);
        return true;
    });


    /*//validation of signing in
     $('#sign_upSUbBtn').click(function(){

     var lname = $('#lname').val();
     var fname = $('#fname').val();
     var address = $('#address').val();
     var contactNum = $('#contactNum').val();
     var gender = $('#gender').val();
     var age = $('#age').val();
     var email = $('#email').val();
     var pass = $('#pass').val();
     var re_pass = $('#re-pass').val();

     if(lname == "" || fname == "" || address == "" || contactNum == "" || gender == "" || age == "" || email == "" || pass == "" || re_pass == ""){
     //alert("Lastname can't be empty!");
     alert("All fields must be filled out!");
     return false;
     }else{
     alert("You're successfully registered! " + fname + " " + lname);

     $.ajax({
     type:"POST",
     url:"php_func/add_user.php",
     data:{"users_info":JSON.stringify($("#users_info").serializeArray())},
     success:function(){

     },
     error:function(){
     console.log("error!!!");
     }
     });

     return true;
     }
     return true;
     });*/

   /* $.ajax({
        type:"POST",
        url:"php_func/retrieve_accounts.php",
        success: function(data){

            // alert(data);

            //noinspection JSValidateTypes
            var obj= JSON.parse(data);


            $("input[name='edit_user_id']").val(obj.edit_user_id);
            $("input[name='edit_lastName']").val(obj.edit_lastName);
            $("input[name='edit_firstName']").val(obj.edit_firstName);
            $("input[name='edit_contact']").val(obj.edit_contact);
            $("input[name='edit_address']").val(obj.edit_address);
            $("input[name='edit_username']").val(obj.edit_username);
            $("input[name='edit_emailaddress']").val(obj.edit_emailaddress);

            $("#username").val(obj.edit_username);
        },
        error: function(data){
            alert(JSON.stringify(data));
        }
    });*/

    $('#a_link_edit').click(function(){
        $('.tffot_uploader').show("fade");
    });

    $('#edit_prof_set_Btn').click(function(){
        var h_pass = $('#h_pass').val();
        var pass = $('#pass').val();

        if(h_pass != pass){
            var msg = "Password didn't match!";

            $("#error_pass").html(msg);

            return false;
        }
        return true;
    });

    $('#edit_email_set_Btn').click(function(){
        var h_pass = $('#h_e_pass').val();
        var pass = $('#e_pass').val();

        if(h_pass != pass){
            var msg = "Password didn't match!";

            $("#error_email_pass").html(msg);

            return false;
        }
        return true;
    });

    $('#edit_pass_set_Btn').click(function(){
        var h_p_pass = $('#h_p_pass').val();
        var cur_pass = $('#edit_cur_pass').val();
        var new_pass = $('#edit_new_pass').val();
        var re_pass = $('#edit_re_pass').val();

        if(cur_pass != h_p_pass){
            var msg = "Password Error!";
            $("#error_h_pass").html(msg);

            return false;
        }else if(new_pass != re_pass){
            var msg = "Password didn't match!";

            $("#error_new_pass").html(msg);
            $("#error_h_pass").css({"display": "none"});

            return false;
        }
        return true;
    });

    //Viewing user profile pic
   /* $.ajax({
        type:"POST",
        url: "php_func/view_prof_pic.php",
        success: function(data){
            // alert(data);
            $("#td_user_prof_pic").html(data);
            $(".td_user_prof_edit").html(data);
        },
        error: function(data){
            alert("view online friends" + data);
        }
    });*/

    //count online tweeters
   /* $.ajax({
        type:"POST",
        url: "php_func/count_online.php",
        success: function(data){

            $(".ontweeter_count_on").html(data);
        },
        error: function(data){
            alert("view online friends" + data);
        }
    });*/

    /*//Viewing friends
     $.ajax({
     type:"POST",
     url: "php_func/view_friends.php",
     success: function(data){

     $("#tbody_frndlist").html(data);
     },
     error: function(data){
     alert("Viewing friends" + data);
     }
     });*/

    //Viewing user tweets
    /*$.ajax({
        type:"POST",
        url: "php_func/view_tweets.php",
        success: function(data){
            //   alert(data);
            $(".tbody_view_tweets").html(data);
        },
        error: function(data){
            alert("Viewing user tweets" + data);
        }
    });*/

    $('#my_tweetsBtn').click(function(){
        // alert("wew!");
        $('#my_tweetsBtn').hide();
        $('#other_tweetsBtn').fadeIn(1);

        $('.tbody_view_tweets').fadeOut(1);
        $('.tbody_view_my_tweets').fadeIn(1);
    });

    $('#other_tweetsBtn').click(function(){

        $('.tbody_view_my_tweets').hide();
        $('.tbody_view_tweets').fadeIn(1);

        $('#other_tweetsBtn').hide();
        $('#my_tweetsBtn').fadeIn(1);
        //Viewing user tweets

       /* $.ajax({
            type:"POST",
            url: "php_func/view_tweets.php",
            success: function(data){
                //   alert(data);
                $(".tbody_view_tweets").html("");
                $(".tbody_view_tweets").html(data);
            },
            error: function(data){
                alert("Viewing user tweets" + data);
            }
        });*/

    });

    //count user following
    /*$.ajax({
        type:"POST",
        url: "php_func/count_following.php",
        success: function(data){
            //some success code to display

            //    alert(data);

            $(".fg_num").append(data);
        },
        error: function(data){
            alert("Error: " + data);
        }
    });

    //count user follower
    $.ajax({
        type:"POST",
        url: "php_func/count_follower.php",
        success: function(data){
            //some success code to display

            //    alert(data);

            $(".fr_num").append(data);
        },
        error: function(data){
            alert("Error: " + data);
        }
    });*/


    /* //others comments
     $.ajax({
     type:"POST",
     url: "php_func/other_comments.php",
     success: function(data){
     //some success code to display

     //  alert(data);

     $("").append(data);
     },
     error: function(data){
     alert("Error: " + data);
     }
     });*/

    $("#srchBtn").click(function(){
        $value = $("input[name = 'nameToSearch']").val();

        if($value != ""){
            var searchObj = {"nameToSearch" : $("input[name = 'nameToSearch']").val()};
            $.ajax({
                type:"POST",
                url: "php_func/search_all.php",
                data: searchObj,
                success: function(data){

                    $("#tbody_frndlist").html(data);
                },
                error: function(data){
                    alert("Error: " + data);
                }
            });

        }else{
            window.alert("Nothing to search!");
        }

    });

    //$('.error_login').show("fade").fadeIn(100000);

    $('#loginBtn').click(function(){
        $('.preloader').show().fadeIn(15000);
    });

    function preloader(){
        $(window).load(function() { // makes sure the whole site is loaded
            $("#status").fadeOut(10000); // will first fade out the loading animation
            $("#preloader").delay(350).fadeOut("slow"); // will fade out the white DIV that covers the website.
        });
    }

    $('.preloader').hide();

    $('#txt_content').css({"height":"20px"});
    $('.txt_footer').css({"display":"none"});

    $('#txt_content').click(function() {
        $('.txt_footer').fadeIn(1);
        $('#txt_content').css({"height":"75px", "border-radius": "2px"});
        $('#tblUserContents tbody tr td').css({"padding-top": "7px"});

    });

    /*$('.divUserContents').mouseleave(function() {
     showStat();
     });

     function showStat(){
     $('.txt_footer').fadeOut(1);
     $('#txt_content').css({"height":"20px", "border-radius": "2px"});
     $('#tblUserContents tbody tr td').css({"padding-top": "3px"});

     }

     $('#updating_stat').click(function(){
     $('#div_tweets').hide();
     $('#div_tweets').fadeIn(1);

     });*/

    $('#a_edit_prof').click(function(){
        $('.tbody_edit_set').fadeIn(1);
        $('.tfoot_prof_set').fadeIn(1);
        $('.tbody_edit_email_set').fadeOut(1);
        $('.tfoot_email_set').fadeOut(1);
        $('.tbody_edit_pass_set').fadeOut(1);
        $('.tfoot_pass_set').fadeOut(1);

    });

    $('#a_edit_email').click(function(){
        $('.tbody_edit_email_set').fadeIn(1);
        $('.tfoot_email_set').fadeIn(1);
        $('.tbody_edit_set').fadeOut(1);
        $('.tfoot_prof_set').fadeOut(1);
        $('.tbody_edit_pass_set').fadeOut(1);
        $('.tfoot_pass_set').fadeOut(1);
    });

    $('#a_edit_pass').click(function(){
        $('.tbody_edit_pass_set').fadeIn(1);
        $('.tfoot_pass_set').fadeIn(1);
        $('.tbody_edit_email_set').fadeOut(1);
        $('.tfoot_email_set').fadeOut(1);
        $('.tbody_edit_set').fadeOut(1);
        $('.tfoot_prof_set').fadeOut(1);
    });

    $('#rtweets_btn').hide();

    $('.tbody_view_tweets tr.tr_upper td div a#xpnd_btn').click(function(){
        alert("weew");
        $('.tr_user_post_com').fadeIn(1);
    });



});


function checkSpaceinTxtarea() {

    var post = $('#txt_content').val();

    if(post == "" || post.match(/^\s*$/)){
        $('#tweetBtn').addClass('disabled');
        return false;
    } else {
        $('#tweetBtn').removeClass('disabled');
        return true;
    }

}

function submitPost(){
    var post = $('#txt_content').val();
    var picture = $('#user_pics').val();
    var username = $('#username').val();
    var name = $('#name').val();

    if(post == "" || post.match(/^\s*$/)){
    } else {
        $.ajax({
            url: 'php_func/add_tweets.php',
            type: 'POST',
            data:{"txt_content": post},

            success: function(){
                var post = "";
                post += "<tr id='' class='tr_upper'>";
                post += "<td>";
                post += "<div class='div_view_tweet' align='left' style='padding: 3px;'>";
                post += "<img src='php_func/" + picture +"' style='width: 50px; height:50px;'/>";
                post += "<a href='' style='color:yellowgreen; font-weight: bold; font-size: 15px;'  >" + name + "</a><a href='' style='color: rgba(200,200,200,.50); font-size: 12px; '>" + "<span style='color: rgba(200,200,200,.50); font-size: 12px; margin-left: 2px; '>@</span>" + username + "</a> <br/>";
                post += " <div class='' align='justify' style='width: 462px; padding: 2px;margin-left: 28px;'>" + post + "</div>";
                post += "</div>";
                post += "</td>";
                post += "</tr>";

                $('#tbl_user_post').append(post);
                $('#txt_content').val("").css({"height":"20px"});
                $('.txt_footer').css({"display":"none"});
                $('#tweetBtn').addClass('disabled');

            }, error: function(){
                alert('Eror');
            }
        });
        return true;
    }

}

// Add Comments

function AutoGrowTextArea(id, ctr, textField) {
    if (textField.clientHeight < textField.scrollHeight) {
        textField.style.height = textField.scrollHeight + "px";

        if (textField.clientHeight < textField.scrollHeight) {
            textField.style.height = (textField.scrollHeight * 2 - textField.clientHeight) + "px";

        }
    }

    var post = $('.post'+ctr).val();

    if(post == "" || post.match(/^\s*$/)){
        $('#replyBtn'+id).addClass('disabled');
        $('.post'+ctr).css({"height":"17px"});
        return false;
    } else {
        $('#replyBtn'+id).removeClass('disabled');
        return true;
    }
}

function submitComments(id, ctr){
    var post = $('.post'+ctr).val();
    var picture = $('#prof_pic_name').val();
    var user_name = $('#account_name').val();

    if(post.length >= 58){
        //    alert("wew!");

        $('#user_in_post').css({"wordBreak": "wordBreak", "height":"51px"});

    }

    if (post == "" || post.match(/^\s*$/)){

    } else {
        $.ajax({
            url: 'php_func/saved_comments.php',
            type: 'POST',
            data:{"id": id, "post": post},

            success: function(){
                var comments = "";
                comments += "<tr>";
                comments += "<td>";
                comments += "<div align='left' style='margin-left: 4px; margin-top: 0px; padding-right: 3px; width: 461px; font-size: 80%; height: auto; margin-bottom: 0px; padding-top: 2px; padding-bottom: 3px; border-bottom: solid 1px rgba(100,100,100,.50); ' class='div_view_tweet' id='div_all_comments'>";
                comments += "<img src='php_func/"+ picture +"' style='width: 30px; height: 30px;'/>";
                comments += "<a style='cursor: pointer; font-size: 90%; color: rgb(200,200,200);'>" + user_name + "</a> :";
                comments += " <span style='margin-left: 3px; font-size: 90%;  color: rgb(100,250,100);' align='left' name='view_txt_content'>"+ post +"</span>";
                comments += "</div>";
                comments += "</td>";
                comments += "</tr>";
                $('#view_all_comments'+ctr).append(comments);
                $('.post'+ctr).val("");
                $('.post'+ctr).css({"height": "17px"});
                $('#replyBtn'+id).addClass('disabled');

            }, error: function(){
                alert('Eror');
            }
        });
        return true;
    }
}

// my tweets

// Add Comments


function myAutoGrowTextArea(id, ctr, textField) {

    if (textField.clientHeight < textField.scrollHeight) {
        textField.style.height = textField.scrollHeight + "px";

        if (textField.clientHeight < textField.scrollHeight) {
            textField.style.height = (textField.scrollHeight * 2 - textField.clientHeight) + "px";

        }else{
            textField.style.height = (textField.scrollHeight + textField.clientHeight ) / 2  + "px";
        }
    }

    var mypost = $('.mypost'+ctr).val();

    if(mypost == "" || mypost.match(/^\s*$/)){
        $('#myreplyBtn'+id).addClass('disabled');
        $('.mypost'+ctr).css({"height": "17px"});
        return false;
    } else {
        $('#myreplyBtn'+id).removeClass('disabled');
        return true;
    }

}

function submitmyComments(id, ctr){
    var mypost = $('.mypost'+ctr).val();
    var picture = $('#prof_pic_name').val();
    var user_name = $('#account_name').val();

    if(mypost == "" || mypost.match(/^\s*$/)){

    }else{
        $.ajax({
            url: 'php_func/saved_comments.php',
            type: 'POST',
            data:{"id": id, "post": mypost},

            success: function(){
                var comments = "";
                comments += "<tr>";
                comments += "<td>";
                comments += "<div align='left' style='margin-left: 4px; margin-top: 0px; padding-right: 3px; width: 461px; font-size: 80%; height: auto; margin-bottom: 0px; padding-top: 2px; padding-bottom: 3px; border-bottom: solid 1px rgba(100,100,100,.50); ' class='div_view_tweet' id='div_all_comments'>";
                comments += "<img src='php_func/"+ picture +"' style='width: 30px; height: 30px;'/>";
                comments += "<a style='cursor: pointer; font-size: 90%; color: rgb(200,200,200);'>" + user_name + "</a> :";
                comments += " <span style='margin-left: 3px;  color: rgb(100,250,100);' align='left' name='view_txt_content'>"+ mypost +"</span>";
                comments += "</div>";
                comments += "</td>";
                comments += "</tr>";
                $('#view_all_my_comments'+ctr).append(comments);
                $('.mypost'+ctr).val("");
                $('.mypost'+ctr).css({"height": "17px"});
                $('#myreplyBtn'+id).addClass('disabled');

            }, error: function(){
                alert('Error');
            }
        });
        return true;
    }

}
