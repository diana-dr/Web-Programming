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
</header>

<% }%>
</body>
</html>
