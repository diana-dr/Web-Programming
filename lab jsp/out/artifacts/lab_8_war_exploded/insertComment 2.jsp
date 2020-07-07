<%@ page import="domain.User" %><%--
  Created by IntelliJ IDEA.
  User: dianadragos
  Date: 10/05/2020
  Time: 22:33
  To change this template use File | Settings | File Templates.
--%>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<html>
<head>
    <title>Insert new Comment</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form action="CommentsController" method="post" class="form1">
    <input type="hidden" name="operation" value="add"/>
    <input type="hidden" name="userID" value="<%=session.getAttribute("userID")%>"/>
    <input type="hidden" name="topicID" value="<%=request.getParameter("topicID")%>"/>
    <input type="text" id="field" name="body" placeholder="Body"/>
    <input type="submit" class="submit" value="add"/>
</form>
<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
        // window.close();
    }
</script>
</body>
</html>
