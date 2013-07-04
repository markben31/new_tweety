/*
$(document).ready(function(){

    $.ajax({
        url:"../php_func/retrieve_accounts.php",
        type:"POST",
        dataType: "json",

        success: function(data){
            for (i=0; i < data.length; i++) {
              //  alert(i + " " + obj.firstName + " " + obj.lastName + ", Image Link: " + obj.images + " Comments: " + obj.contents );

                var post = "";
                post += "<tr  class='tr_upper'>";
                post += "<td ><input type='hidden' name='m_id' id='m_id' value='" + data[i].id +"' />";
                post += "<div class='div_view_tweet' align='left' style='padding: 3px;'>";
                post += "<img class='img-polaroid'  src='../images/aboutus.png'style='width: 50px; height:50px;'/>";
                post += "<img hidden='hidden' id='p' src='../php_func/" + data[i].images +"' style='width: 50px; height:50px;'/>";
                post += "<a href='' style='color:yellowgreen; font-weight: bold; font-size: 15px;'  >" + data[i].firstName + ' ' + data[i].lastName + "</a>";
                post += "<a style='text-decoration: none; color: rgba(200,200,200,.50); font-size: 12px; '><span style='color: rgba(200,200,200,.50); font-size: 12px; margin-left: 2px; '>@</span>" + data[i].username +"</a> <br/>";
                post += "<div class='comment more' align='left' style='width: 462px; padding: 2px; margin-left: 28px;'>" + data[i].contents + "</div>";
                post += " </div>";
                post += "</td>";
                post += "</tr>";
                post += "</table>";

                post += "<tr>";
                post += "<td>";
                post += "<div style='margin-left: 30px; width: 470px; '>";
                post += "<div style='background-color: rgba(200,200,200,.10); margin-bottom: 0px;padding: 0px 5px; border-top: 1px solid rgba(200,200,200,.15); border-bottom: 1px solid rgba(200,200,200,.15);' align='left'>";
                post += "<a id='com_id' href='#user_in_post'>Comment</a>";
                post += "</div>";
                post += "<table id='view_all_comments"+ i +"' style=' background-color: rgba(200,200,200,.10);'>";
                post += " </table>";
                post += "</div>";
                post += "</td>";
                post += "</tr>";
                post += "<tr class='tr_user_post_com'>";
                post += " <td>";
                post += "<div align='left' class='div_view_tweet' id='' style='margin-left: 30px; margin-left: 30px; margin-top: 10px; background-color: rgba(20,20,20,0.14); padding: 5px; border-top: solid 1px rgba(200,200,200,.15); border-bottom: solid 1px rgba(200,200,200,.15); '>";
                post += " <input type='hidden' value='" + data[i].id +"' name='user_m_post' id='user_m_post' />";
                post += "<textarea name='user_in_post' onkeyup='AutoGrowTextArea("+ i +" postka' placeholder='Write a comment..'></textarea>";

                post += "<button id='replyBtn"+ data[i].id +"' class='hoigana btn btn-primary btn-small disabled' onclick='submitComments("+ data[i].id +", " + i +");'><i class='icon-comment icon-white'></i> Reply</button>";
                post += "</div>";
                post += "</td>";
                post += "</tr>";

                //alert(post);
                $(".tbody_view_tweets").append(post);
            }

        },
        error: function(data){
            alert(JSON.stringify(data));
        }
    });
});*/
