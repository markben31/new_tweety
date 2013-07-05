<?php
    session_start();
    include '../process/UserDAO.php';
    include '../process/MicropostDAO.php';
    include '../process/CommentDAO.php';

    if( !isset($_SESSION['emailadd']) && !isset($_SESSION['password'])){
        header('Location: ../home.php');
    }
    else{
        //UserDAO blocks
        $email = $_SESSION['emailadd'];

        $info = new UserDAO();
        $user = $info->viewUserInfo($email);
        $lname = $user->getLastName();
        $fname = $user->getFirstName();
        $address = $user->getAddress();
        $contact = $user->getContactNum();
        $gender = $user->getGender();
        $age = $user->getGender();
        $username = $user->getUsername();
        $profile_pic = $user->getImage();

    }
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="../images/t_logos.jpg"/>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/jquery-ui.js"></script>
    <script type="text/javascript" src="../js/user.js"></script>
    <script type="text/javascript" src="../js/sample.js"></script>
    <link rel="stylesheet"href="../css/header.css" type="text/css"/>
    <link rel="stylesheet"href="../css/footer.css" type="text/css"/>
    <link rel="stylesheet"href="../css/indexTmp.css" type="text/css"/>

    <link href="../css/bootstrap.css" rel="stylesheet">
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/jquery.shorten.1.0.js"></script>

    <style>
        .comment {
            width: 462px;
            padding: 2px;
            margin: 10px;
        }

        a.morelink {
            text-decoration: none;
            color: rgba(0,180,220,50);
            font-size: 10px;
            font-weight: normal;
            cursor: pointer;
            font-family: Nimbus Sans L, helvetica, segoe, serif;
        }

        a.morelink:hover {
            text-decoration:none;
            color: rgba(0,180,220,50);
            cursor: pointer;
            font-size: 10px;
            font-weight: normal;
            cursor: pointer;
            font-family: Nimbus Sans L, helvetica, segoe, serif;
        }
        .morecontent span {
            display: none;

        }

        .moreelipses{
            color: rgba(0,180,220,50);
        }
    </style>
    <script type="text/javascript">
        /*function string_shorten($text, $char) {
            $text = substr($text, 0, $char); //First chop the string to the given character length
            if(substr($text, 0, strrpos($text, ' '))!='')
                $text = substr($text, 0, strrpos($text, ' ')); //If there exists any space just before the end of the chopped string take up to that portion only.
            //In this way we remove any incomplete word from the paragraph
            $text = $text.'...'; //Add continuation ... sign
            return $text; //Return the value
        }*/
        $(document).ready(function(){
            var showChar = 250;
            var ellipsestext = "...";
            var moretext = "<br/>See more";

            $('.comment').each(function() {
                var content = $(this).html();

                if(content.length > showChar) {

                    var c = content.substr(0, showChar);
                    var h = content.substr(showChar, content.length - showChar);

                    var html = c + '<span class="moreelipses"> '+ellipsestext+'</span><span class="morecontent"><span>'+ h +'</span><a class="morelink">'+moretext+'</a></span>';

                    $(this).html(html);
                }

            });

            $('.morelink').click(function(){
                $(this).hide();
                $(this).parent().prev().toggle();
                $(this).prev().toggle();
                return false;
            });

        });
    </script>
    <style type="text/css">
        .edit_image {
            position: relative;
        }

        .edit_image_link {
            position: absolute;
            display: none;
            cursor: pointer;
        }

        .edit_image:hover .edit_image_link{
            left:93px;
            float:right;
            display:inline;
            top:5px;
            padding: 5px;
            background-color: rgba(20,20,20,0.60);
        }
    </style>

    <script type="text/javascript">
        var refreshId = setInterval(function() {
            updateComment();
        }, 1000);

        function updateComment(){
            $.ajax({
                 url: '../controller/comment.php',
                 type: 'GET',
                 dataType: 'json',
                 success: function(obj){
                     for(var i=0; i<obj.length; i++){
                         console.log(obj[i].firstName);
                         $("#view_all_comments"+obj[i].post_id).append(
                             "<tr>"+
                                 "<td>"+
                                     "<div align='left' style='width: 505px; font-size: 80%; height: auto; border-bottom: 1px solid rgba(200,200,200,.10); margin-bottom: 1px; padding-top: 2px; padding-bottom: 2px; ' class='div_view_tweet' id='div_all_comments'>"+
                                     "<img src='../php_func/" + obj[i].images +"' style='width:30px; height:30px;'/>"+
                                     "<a style='cursor: pointer; font-size: 90%; color: rgb(200,200,200);'>" + obj[i].firstName + " " + obj[i].lastName + "</a>:"+
                                     "<span style='border: solid 1px green; margin-left: 3px; color: rgb(100,200,100);' align='left' name='view_txt_content'>" + obj[i].comments + "</span>"+
                                     "</div>"+
                                 "</td>"+
                             "</tr>"
                         );
                     }

                 }, error: function(obj) {
                    alert("Error");
                 }
             });
        }


    </script>

    <title>Tweety </title>
</head>
<body>

<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true" style="width: 500px; margin: 110px -220px;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 id="myModalLabel">Change User Profile Picture</h4>
    </div>
    <div class="modal-body">
        <form enctype='multipart/form-data' id='form_upload' method='POST' action='php_func/uploadFile.php'>
            <input type="file" name="photo"/>
            <button type="submit" class="btn btn-primary pull-right"><i class="icon-upload icon-white"></i> Change Photo</button>
        </form>
    </div>
    <div class="modal-footer">
    </div>
</div>

<?php include '../layout/header.php'; ?>

<div class="outer" align="center">
    <div class="body">
        <div class="inner-body">

            <div class="wrapper-menus"> <!-- Menus -->
                <div class="topmenus">
                    <ul>
                        <li>
                            <div class="div_find_friend">
                                <a id="link_find_friend" href="account_setting.php"><img src="../images/settings.png" style="height: 14px;"/> Account Setting</a>
                            </div>
                        </li>
                        <li><div><a id="link_prof" href="../pages/profile.php"><i class="icon-user icon-white"></i>My Profile</a></div></li>
                        <li><div><a id="link_home" href="" ><i class="icon-home icon-white" ></i> Home</a></div></li>
                    </ul>
                </div>
            </div>

            <div class="div_leftSide" >
                <div class="user_info">
                    <table id="tbl_user_info">
                        <tbody id="<?php echo $email; ?>">
                        <tr class="tr_img">
                            <td colspan="2" align="center" class="td_user_prof_pic" id="td_user_prof_pic">

                                <div class='edit_image'> <!--Editing profile pics-->
                                    <img class='img-polaroid' src='../php_func/<?php echo $profile_pic; ?>' style='width:180px; height:180px;' />

                                    <div class='edit_image_link'>
                                        <div>
                                             <a style='font-size: 100%; color: rgba(0,180,220,50);' href='#myModal' data-toggle='modal'>Change Photo</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="tr_name">
                            <td align="center" colspan="2">

                                <a href="" disabled="disabled" name="user_name" id="user_name" /><?php echo $fname . ' ' . $lname;?></a><br/>
                                <a name="username" id="username"><span style='color: rgba(200,200,200,.50); font-size: 12px;'>@</span><?php echo $username; ?></a><br/>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <table id="tbl_info" >
                        <tbody >
                        <tr>
                            <td><span class="ontweeter_count_on label label-info">34</span>&nbsp;&nbsp;<a href="" class="span_txt">Tweets</a> </td>
                        </tr>
                        <tr>
                            <td><span class="fg_num label label-info">12</span>&nbsp;&nbsp;<a href="" class="span_txt">Following</a> </td>
                        </tr>
                        <tr>
                            <td><span class="fr_num label label-info">34</span>&nbsp;&nbsp;<a href=""  class="span_txt">Followers</a> </td>
                        </tr>
                        </tbody>
                    </table>

                    <!--<table id="tbl_actions">
                        <tbody>
                            <tr>
                                <td align="left"><span class="span_count_on"></span>&nbsp;<span class="span_txt">Online Friends</span></td>
                            </tr>

                        </tbody>
                    </table>-->

                    <table id="tbl_footer">
                        <tbody>
                        <tr>
                            <td>
                                <div><span class="copy_name" >Copyright</span> <span class="copy">&copy;</span><span class="copy_name"> All Right Reserved 2012 by: MAL Inc. Powered by: <a href="" class='founder' >E2Ps Property</a></span></div>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>

            <div class="div_rightSide">
                <div class="div_align_center" align="center">

                    <div class="user_action" align="left">
                        <table >
                            <thead>
                            <tr>
                                <td><a id="updating_stat" class="updating_stat">Update Status</a></td><td><span class="liner">/</span></td>
                                <td><a class="a_link_friends">Photos Gallery</a></td>
                            </tr>
                            </thead>
                        </table>
                    </div><br/><br/>

                    <div class="divUserContents_wrapper" id="div_tweets">
                        <div class="divUserContents" align="center">
                            <table id="tblUserContents" cellpadding="3">
                                <tbody >
                                <tr>
                                    <td>
                                        <div class="div_user_txt">
                                            <input type="hidden" id="username" value="<?php echo $u_name; ?>" />
                                            <input type="hidden" name="name" id="name" value="<?php echo $name; ?>"/>
                                            <textarea cols="1" rows="1" draggable="false" id="txt_content" name="txt_content" onkeyup="checkSpaceinTxtarea();" placeholder="Write something..." spellcheck="true" ></textarea>

                                            <div class="txt_footer" align="right">
                                                <button type="submit" id="tweetBtn" onclick="submitPost();" class="btn btn-primary btn-small disabled"><i class="icon-bullhorn icon-white"></i> Tweet</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="div_liner" style="width: 95%;" align="right" >
                        <button style="display: none;" class="btn btn-primary btn-small" id="other_tweetsBtn" ><i class="icon-list-alt icon-white"></i> All Tweets</button>
                        <button class="btn btn-primary btn-small" id="my_tweetsBtn" ><i class="icon-list-alt icon-white"></i> My Tweets</button>
                    </div>

                    <div class="div_liner" style="width: 95%; margin-top: 4px; border-bottom: solid 1px black;" ></div>

                    <div class="div_user_view_tweets">
                        <table id="tbl_view_tweets" style="border-spacing: inherit;" >
                            <!--View all tweets-->

                            <tbody class="tbody_view_tweets">
                                <tr>
                                    <td>
                                        <?php

                                            //Comments block
                                            $comments = new CommentDAO();

                                            //Micropost blocks
                                            $post = new MicropostDAO();
                                            $result = $post->viewtweets($email);
                                            $json = json_decode($result, true);

                                            $ctr = 1;
                                            foreach($json as $item){
                                                $disp_comments = $comments->viewComments($item['post_id']);
                                                $comment_result = json_decode($disp_comments, true);

                                                echo "<table id='tbl_user_post'>";
                                                echo "<tr class='tr_upper'>";
                                                echo "<td ><input type='hidden' name='m_id' id='m_id' value='" . $item['post_id'] ."' />";
                                                echo "<div class='div_view_tweet' align='left' style='padding: 3px;'>";
                                                echo "<img class='img-polaroid'  src='../php_func/" . $item['images'] ."' style='width: 50px; height:50px;'/>";
                                                echo "<a href='' style='color:yellowgreen; font-weight: bold; font-size: 15px;'  >" . ucwords(strtolower( $item['firstName'])) . ' ' . ucwords(strtolower( $item['lastName'])) . "</a><a style='text-decoration: none; color: rgba(200,200,200,.50); font-size: 12px; '>" . "<span style='color: rgba(200,200,200,.50); font-size: 12px margin-left: 2px; '>@</span>" .strtolower($item['username']) ."</a> <br/>";
                                                echo " <div class='comment more' align='left' style='width: 462px; padding: 2px; margin-left: 28px;'>" . nl2br(htmlentities($item['contents'])) ."</div>";
                                                echo "</div>";
                                                echo "</td>";
                                                echo "</tr>";

                                                echo "<tr>";
                                                echo "<td>";
                                                echo "<div style='margin-left: 30px; width: 470px; '>";
                                                echo "<div style='background-color: rgba(200,200,200,.10); margin-bottom: 0px;padding: 0px 5px; border-top: 1px solid rgba(200,200,200,.15); border-bottom: 1px solid rgba(200,200,200,.15);' align='left'>";
                                                echo "<a id='com_id' href='#user_in_post'>Comment</a>";
                                                echo "</div>";
                                                echo "<table id='view_all_comments". $item['post_id']."' style=' background-color: rgba(200,200,200,.10);'>";

                                                /*--comment start---*/

                                                foreach($comment_result as $comment_items) {
                                                echo "<tr >";
                                                echo "<td>";
                                                echo "<div align='justify' style=' margin-left: 4px; margin-top: 0px; padding-right: 3px; width: 461px; font-size: 80%; height: auto; margin-bottom: 0px; padding-top: 2px; padding-bottom: 3px; border-bottom: solid 1px rgba(100,100,100,.50); ' class='div_view_comments' id='div_all_comments'>";
                                                echo "<img src='../php_func/" . $comment_items['images'] ."' style='width:30px; height:30px;'/>";
                                                echo "<a style='margin-left: 3px; cursor: pointer; font-size: 90%; color: rgb(200,200,200);'>" . ucwords(strtolower( $comment_items['firstName'])) . ' ' . ucwords(strtolower( $comment_items['lastName'] )) ."</a> :";
                                                echo " <span style='margin-left: 3px; color: rgb(100,250,100);' align='left' name='view_txt_content'>" . nl2br(htmlentities($comment_items['comments'])) ."</span>";
                                                echo "</div>";
                                                echo "</td>";
                                                echo "</tr>";
                                                }

                                                /*--comment end---*/

                                                echo "</table>";
                                                echo "</div>";
                                                echo "</td>";
                                                echo "</tr>";

                                                echo "<tr class='tr_user_post_com'>";
                                                echo "<td>";
                                                echo "<div align='left' class='div_view_tweet_actions' id='' style='margin-left: 30px; margin-left: 30px; margin-top: 10px; background-color: rgba(20,20,20,0.14); padding: 5px; border-top: solid 1px rgba(200,200,200,.15); border-bottom: solid 1px rgba(200,200,200,.15); '>";
                                                echo "<input type='hidden' value='" . $item['id'] ."' name='user_m_post' id='user_m_post' />";
                                                echo "<img src='../php_func/" . $profile_pic ."' style='width:30px; height: 30px; ' />";
                                                echo "<textarea name='user_in_post' onkeyup='AutoGrowTextArea(" . $item['id'] .",". $ctr .", this)' id='user_in_post" . $ctr . "' class='post". $ctr." postka' placeholder='Write a comment..'></textarea> ";

                                                echo "<button id='replyBtn". $item['id']."' class='hoigana btn btn-primary btn-small disabled' onclick='submitComments(".$item['id'].", ". $ctr.");'><i class='icon-comment icon-white'></i> Reply</button>";
                                                echo "</div>";
                                                echo "</td>";
                                                echo "</tr>";
                                                echo"</table>";

                                                $ctr++;
                                                }
                                                ?>
                                    </td>
                                </tr>
                            </tbody>

                            <!--View my tweets-->
                            <tbody hidden="hidden" class="tbody_view_my_tweets">
                                <tr>
                                    <td>
                                        <?php

                                        //Comments block
                                        $comments = new CommentDAO();

                                        //Micropost blocks
                                        $post = new MicropostDAO();
                                        $result = $post->viewmytweets($email);
                                        $json = json_decode($result, true);

                                        $ctr = 1;
                                        foreach($json as $item){
                                            $disp_comments = $comments->viewmyComments($item['post_id']);
                                            $comment_result = json_decode($disp_comments, true);

                                            echo "<table id='tbl_user_post'>";
                                            echo "<tr class='tr_upper'>";
                                            echo "<td ><input type='hidden' name='m_id' id='m_id' value='" . $item['post_id'] ."' />";
                                            echo "<div class='div_view_tweet' align='left' style='padding: 3px;'>";
                                            echo "<img class='img-polaroid'  src='../php_func/" . $item['images'] ."' style='width: 50px; height:50px;'/>";
                                            echo "<a href='' style='color:yellowgreen; font-weight: bold; font-size: 15px;'  >" . ucwords(strtolower( $item['firstName'])) . ' ' . ucwords(strtolower( $item['lastName'])) . "</a><a style='text-decoration: none; color: rgba(200,200,200,.50); font-size: 12px; '>" . "<span style='color: rgba(200,200,200,.50); font-size: 12px margin-left: 2px; '>@</span>" .strtolower($item['username']) ."</a> <br/>";
                                            echo " <div class='comment more' align='left' style='width: 462px; padding: 2px; margin-left: 28px;'>" . nl2br(htmlentities($item['contents'])) ."</div>";
                                            echo "</div>";
                                            echo "</td>";
                                            echo "</tr>";

                                            echo "<tr>";
                                            echo "<td>";
                                            echo "<div style='margin-left: 30px; width: 470px; '>";
                                            echo "<div style='background-color: rgba(200,200,200,.10); margin-bottom: 0px;padding: 0px 5px; border-top: 1px solid rgba(200,200,200,.15); border-bottom: 1px solid rgba(200,200,200,.15);' align='left'>";
                                            echo "<a id='com_id' href='#user_in_post'>Comment</a>";
                                            echo "</div>";
                                            echo "<table id='view_all_comments". $item['post_id']."' style=' background-color: rgba(200,200,200,.10);'>";

                                            /*--comment start---*/

                                            foreach($comment_result as $comment_items) {
                                            echo "<tr >";
                                            echo "<td>";
                                            echo "<div align='justify' style=' margin-left: 4px; margin-top: 0px; padding-right: 3px; width: 461px; font-size: 80%; height: auto; margin-bottom: 0px; padding-top: 2px; padding-bottom: 3px; border-bottom: solid 1px rgba(100,100,100,.50); ' class='div_view_comments' id='div_all_comments'>";
                                            echo "<img src='../php_func/" . $comment_items['images'] ."' style='width:30px; height:30px;'/>";
                                            echo "<a style='margin-left: 3px; cursor: pointer; font-size: 90%; color: rgb(200,200,200);'>" . ucwords(strtolower( $comment_items['firstName'])) . ' ' . ucwords(strtolower( $comment_items['lastName'] )) ."</a> :";
                                            echo " <span style='margin-left: 3px; color: rgb(100,250,100);' align='left' name='view_txt_content'>" . nl2br(htmlentities($comment_items['comments'])) ."</span>";
                                            echo "</div>";
                                            echo "</td>";
                                            echo "</tr>";
                                            }

                                            /*--comment end---*/

                                            echo "</table>";
                                            echo "</div>";
                                            echo "</td>";
                                            echo "</tr>";

                                            echo "<tr class='tr_user_post_com'>";
                                            echo "<td>";
                                            echo "<div align='left' class='div_view_tweet_actions' id='' style='margin-left: 30px; margin-left: 30px; margin-top: 10px; background-color: rgba(20,20,20,0.14); padding: 5px; border-top: solid 1px rgba(200,200,200,.15); border-bottom: solid 1px rgba(200,200,200,.15); '>";
                                            echo "<input type='hidden' value='" . $item['id'] ."' name='user_m_post' id='user_m_post' />";
                                            echo "<img src='../php_func/" . $profile_pic ."' style='width:30px; height: 30px; ' />";
                                            echo "<textarea name='user_in_post' onkeyup='AutoGrowTextArea(" . $item['id'] .",". $ctr .", this)' id='user_in_post" . $ctr . "' class='post". $ctr." postka' placeholder='Write a comment..'></textarea> ";

                                            echo "<button id='replyBtn". $item['id']."' class='hoigana btn btn-primary btn-small disabled' onclick='submitComments(".$item['id'].", ". $ctr.");'><i class='icon-comment icon-white'></i> Reply</button>";
                                            echo "</div>";
                                            echo "</td>";
                                            echo "</tr>";
                                            echo"</table>";

                                            $ctr++;
                                            }
                                            ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                </div>

            </div>


        </div>
    </div>
</div>

<!--<div class='comment more' align='left' style='width: 462px; padding: 2px; margin-left: 28px;'> okkay na ba kha aheheheheheh ni wat. ?????? </div>-->
</body>
</html>
