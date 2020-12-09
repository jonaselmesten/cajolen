<?php

/*
Jonas Elmesten
Webbprogrammering 7,5hp - Projekt
Datateknik HT18
*/

//Database-related information and all the querys

define("SERVER_DB", "studentmysql.miun.se");
define("USERNAME_DB", "joel1803");
define("PW_DB", "nvs9c3gb");
define("NAME_DB", "joel1803");

$attemptLoginSQL = 
"SELECT user_id, user_name, e_mail, password FROM joel1803.user WHERE user_name = ? ";

$registerUserSQL = 
"INSERT INTO joel1803.user (user_name, first_name, e_mail, password) VALUES(?,?,?,?) ";

$checkUsernameSQL = 
"SELECT user_id password FROM joel1803.user WHERE user_name = ? ";

$checkEmailSQL = 
"SELECT user_id password FROM joel1803.user WHERE e_mail = ? ";

$addNewPostSQL =
"INSERT INTO joel1803.post (forum_id, created_by_user_id, post_title)
    VALUES(?,?,?); ";

$addNewEntrySQL =
"INSERT INTO joel1803.post_entry (forum_id, author_user_id, post_id, text, date_created)
    VALUES(?,?,?,?,?); ";

$getAllPostsSQL = 
"SELECT
    P.post_id,
    ANY_VALUE(post_title) AS CAPTION,
    ANY_VALUE(user_name) AS AUTHOR, 
    MAX(date_created) AS LATEST, 
    COUNT(entry_id) AS POSTS,
    (SELECT COUNT(*) FROM joel1803.post_entry WHERE author_user_id = ? AND post_id = P.post_id) AS WRITTEN

FROM joel1803.post P
INNER JOIN joel1803.user U ON P.created_by_user_id = U.user_id
INNER JOIN joel1803.post_entry PE ON PE.post_id = P.post_id
    WHERE PE.forum_id = ?
        GROUP BY P.post_id
        ORDER BY LATEST DESC ";

$getPostTitleSQL = 
"SELECT post_title FROM joel1803.post
    WHERE forum_id = ? AND post_id = ? ";

$getAllEntriesSQL = 
"SELECT user_name, text, date_created FROM joel1803.post_entry PE
    INNER JOIN joel1803.user U ON U.user_id = PE.author_user_id
        WHERE forum_id = ? AND post_id = ?
        ORDER BY date_created ASC ";

$getForumPostSQL =
"(SELECT P.post_id, P.forum_id, P.post_title, PE.date_created FROM joel1803.post P
    INNER JOIN joel1803.post_entry PE ON P.forum_id = PE.forum_id
    WHERE P.forum_id = 1
    ORDER BY date_created DESC
    LIMIT 3)
UNION ALL
(SELECT P.post_id, P.forum_id, P.post_title, PE.date_created FROM joel1803.post P
    INNER JOIN joel1803.post_entry PE ON P.forum_id = PE.forum_id
    WHERE P.forum_id = 2
    ORDER BY date_created DESC
    LIMIT 3)
UNION ALL
(SELECT P.post_id, P.forum_id, P.post_title, PE.date_created FROM joel1803.post P
    INNER JOIN joel1803.post_entry PE ON P.forum_id = PE.forum_id
    WHERE P.forum_id = 3
    ORDER BY date_created DESC
    LIMIT 3)
UNION ALL
(SELECT P.post_id, P.forum_id, P.post_title, PE.date_created FROM joel1803.post P
    INNER JOIN joel1803.post_entry PE ON P.forum_id = PE.forum_id
    WHERE P.forum_id = 4
    ORDER BY date_created DESC
    LIMIT 3) ";

?>