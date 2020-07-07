<%@ page import="domain.User" %>
<%@ page import="java.util.Collection" %>
<%@ page import="java.util.Enumeration" %>
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
    <title>Forum</title>
    <script src="js/ajax-utils.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="js/jquery-2.0.3.js"></script>
</head>
<body>
<header>
<%! User user; %>
<%  user = (User) session.getAttribute("user");
    session.setAttribute("userID", user.getId());
    if (user != null) {
        out.println("Welcome " + user.getUsername() + "!");
%>
    <a href="LogoutController" id="btn">Logout</a>
    <a href="#" id="btn" onClick="MyWindow=window.open('insertTopic.jsp','MyWindow','width=600,height=300'); return false;">Add Topic</a>
</header>
<section>
    <nav>
      <ul id="topics"></ul>
    </nav>
    <article>
        <ul id="comments" style="list-style-type:none;"></ul>
    </article>
    <section id="update-result-section"></section>
    <div id="updateDiv">
        <table id="updateForm">
            <tr><td><input type="text" id="newbody" name="newbody" placeholder="Comment..."></td></tr>
            <tr><td><button id="update-form">Update</button></td></tr>
        </table>
    </div>
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
        $("#comments").html("");
        $("#comments").append("<a href=\"#\" id='btn' onClick=\"MyWindow=window.open('insertComment.jsp?topicID= " + id + "','MyWindow','width=600,height=300'); return false;\">Add Comment</a>");
        $("#comments").append("<h2>Comments</h2>");
        getCommentsByTopic(id, function (comments) {
            console.log(comments);
            for(var name in comments) {
                $("#comments").append("<li>" + comments[name].body
                    + "<br><br>by " + comments[name].username + "</li>");

                const id = comments[name].username;
                const userid = '<%=user.getUsername()%>';

                if (id===userid) {
                    $("#comments").append("<button id='update' " +
                        "onclick=\"update('"+ comments[name].id + "','"
                        + comments[name].topicID +"')\" " +
                        "value='"+ comments[name].userID+"'>Update</button>");

                    $("#comments").append("<form action='CommentsController' " +
                        "onsubmit=\"return confirm('Are you sure you want to delete this comment?');\" " +
                        "method='post' id='deleteForm'>" +
                        "<input type=\"hidden\" name=\"operation\" value=\"delete\"/>" +
                        "<button type='submit' id='delete' name='commentID' value='"+
                        comments[name].id + "'>Delete</button></form>");
                }
            }
        })
    }

    function update(id, topicID) {
        document.getElementById('updateDiv').style.display = "block";
        document.getElementById('newbody').style.width="500px";
        $("#update-form").click(function() {
            updateComment(
                id,
                topicID,
                $("#update").val(),
                $("#newbody").val(),
                function(response) {
                    document.getElementById('updateDiv').style.display = "none";
                    alert("Comment updated successfully!");
                    $("#update-result-section").html(response);
                }
            )
        })
    }
</script>

<% }%>
</body>
</html>
