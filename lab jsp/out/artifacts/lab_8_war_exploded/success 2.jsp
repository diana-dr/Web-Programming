<%@ page import="domain.User" %>
<%--
  Created by IntelliJ IDEA.
  User: dianadragos
  Date: 09/05/2020
  Time: 19:20
  To change this template use File | Settings | File Templates.
--%>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<html>
<head>
    <title>Success</title>
    <script src="js/ajax-utils.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="js/jquery-2.0.3.js"></script>
</head>
<body>
<header>
<%! User user; %>
<%  user = (User) session.getAttribute("user");
    if (user != null) {
        out.println("Welcome " + user.getUsername() + "!");
%>
</header>
<section>
    <nav>
      <ul id="topics"></ul>
    </nav>
    <article>
    <ul id="comments" style="list-style-type:none;"></ul>
    </article>
</section>
<script>
    $(document).ready(function(){
            getAllTopics( function(topics) {
                console.log(topics);
                $("#topics").html("");
                $("#topics").append("<h2>Topics<h2>");
                for(var name in topics) {
                    $("#topics").append("<li onclick='getComments("+ topics[name].id +")'><a>" + topics[name].name + "</a></li>");
                }
            })
    });

    function getComments(id) {
        getCommentsByTopic(id, function (comments) {
            console.log(comments);
            $("#comments").html("");
            $("#comments").append("<h2>Comments</h2>");
            for(var name in comments) {
                $("#comments").append("<li>" + comments[name].body
                    + "<br><br>by " + comments[name].username + "</li>");
               $("#comments").append("<button id='updatebtn' value='"+ comments[name].userid+"'>Update</button>");
            }
        })
    }

    $("#updatebtn").click(function() {
        const fired_button = $("#updatebtn").val();
        console.log(fired_button);
    })
</script>

<% } %>
</body>
</html>